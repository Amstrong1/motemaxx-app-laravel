<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class ChatController extends Controller
{
    function index(Request $request)
    {
        $data = null;
        if ($request->method() == 'POST') {
            // dd($request->prompt);
            // Replace this with your OpenAI API key
            $openaiApiKey = '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';

            // API endpoint
            $apiUrl = 'https://api.openai.com/v1/chat/completions';

            // Request payload
            $requestData = [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => $request->prompt],
                ],
                'temperature' => 0.7,
            ];

            // Request headers
            $headers = [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $openaiApiKey,
            ];

            // Initialize Guzzle client
            $client = new Client();

            // Make the API request
            $response = $client->post($apiUrl, [
                'headers' => $headers,
                'json' => $requestData,
            ]);

            // Get the response body
            $responseBody = $response->getBody()->getContents();

            // Decode the JSON response
            $data = json_decode($responseBody, true);

            return view('chat', compact('data'));
        }

        return view('chat');

        // Now $data contains the response from the OpenAI API

    }
}
