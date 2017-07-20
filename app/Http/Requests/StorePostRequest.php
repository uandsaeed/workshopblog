<?php

namespace App\Http\Requests;

//use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends Request
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
        return [
            'name' => 'required',
            'form_id' => 'required',
            'status' => 'required',
        ];
    }

    /**
     * @return mixed
     */
    public function messages()
    {
        return [
            'name.required' => 'Please select "Type of Ad"'
        ];
    }
}
