<?php

namespace App\Http\Requests;

use App\Models\Recommendation;
use Illuminate\Foundation\Http\FormRequest;

class StoreRecommendationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'day' => 'required|unique:'.Recommendation::class,
            'breakfast' => 'required|string',
            'lunch' => 'required|string',
            'dinner' => 'required|string',
        ];
    }
}
