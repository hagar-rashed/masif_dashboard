<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class QRCodeRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust if you need authorization logic
    }

    public function rules()
    {
        return [
           
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:qrcodes,email,' . $this->route('qrcode'),
            'phone' => 'required|string|max:20',
            'photo' => 'nullable|image',
            'village_name' => 'required|string|max:255',
            'date' => 'required|date',
            'expiration_date' => 'required|date|after_or_equal:date',
            
        ];
    }
}