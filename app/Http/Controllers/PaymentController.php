<?php

namespace App\Http\Controllers;

use App\Models\User;
use Omnipay\Omnipay;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\NouvelleReservation;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {
        $reservation = Reservation::find($request->id);
        $reservation->paid = true;

        if ($reservation->save()) {
            $admins = User::where('admin', true)->get();
            foreach ($admins as $admin) {
                $admin->notify(new NouvelleReservation());
            }
            Alert::toast("Réservation payé", 'success');
            // return redirect()->route('reservation.index');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }

        try {

            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                return $response->getMessage();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('payerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('payerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $arr = $response->getData();

                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];

                $payment->save();

                return "Payment is Successfull. Your Transaction Id is : " . $arr['id'];
            } else {
                return $response->getMessage();
            }
        } else {
            return 'Payment declined!!';
        }
    }

    public function error()
    {
        return 'User declined the payment!';
    }
}
