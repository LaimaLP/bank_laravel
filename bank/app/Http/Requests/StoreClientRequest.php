<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    { 
        return [   // kad butina/jis stringas/min reiksmes/kiek max
            'name' => 'required|string|min:3|max:64|alpha:ascii',
            'surname'=>'required|string|min:3|max:64|alpha:ascii',
            'personalNumber'=>'required|regex:/^\d{11}$/',
        ];
    }

    public function messages(): array
    {
        return [
            

        ];
 
    }
}
