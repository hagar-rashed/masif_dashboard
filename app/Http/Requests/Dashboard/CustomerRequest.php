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
        $rules = [
            'name'      => 'required|string|max:255',
            'user_name' => 'required|string|max:255',
            'email'     => 'required|email|max:255|unique:users,email,' . $this->route('client'),
            'code'      => 'required|string|max:20',
        ];

        if ($this->isMethod('post')) {
            // Creating a new client
            $rules['password'] = 'required|string|min:8';
            $rules['image'] = 'required|image|mimes:png,jpg,jpeg|max:2048';
        } else if ($this->isMethod('put') || $this->isMethod('patch')) {
            // Editing an existing client
            $rules['password'] = 'nullable|string|min:8';
            $rules['image'] = 'nullable|image|mimes:png,jpg,jpeg|max:2048';
        }

        return $rules;
    }

    /**
     * Get the custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'      => 'The Name field is required.',
            'user_name.required' => 'The User Name field is required.',
            'email.required'     => 'The Email field is required.',
            'email.email'        => 'Please enter a valid Email address.',
            'email.unique'       => 'This Email address is already taken.',
            'password.required'  => 'The password field is required.',
            'password.min'       => 'The Password must be at least 8 characters.',
            'code.required'      => 'The Code field is required.',
            'image.image'        => 'The file must be an image.',
            'image.mimes'        => 'The image must be a file of type: png, jpg, jpeg.',
            'image.max'          => 'The image may not be greater than 2048 kilobytes.',
            'image.required'     => 'The image field is required.',
        ];
    }
}
