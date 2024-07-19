<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch (request()->method()) {
            case 'PATCH':
                return [
                    'image' => 'nullable|image|mimes:png,jpg',
                    'password' => 'nullable|string|min:8', // Optional password update
                    
                ];
                break;

            default:
                return [
                    'name' => 'required|string|max:255',
                    'user_name' => 'required|string|max:255',
                    'email'     => 'required|email|max:255|unique:users,email',
                    'password'  => 'required|string|min:8',
                    'code'      => 'required|string|max:20', // Adjust max length as needed
                    'image'     => 'required|image|mimes:png,jpg',
                    
                ];
                break;
        }
    }
}
