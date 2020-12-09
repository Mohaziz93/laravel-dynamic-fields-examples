<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'title' => 'required'
        ];

        if($this->request->get('emails')){
            foreach($this->request->get('emails') as $key => $val)
            {
                $rules['emails.'.$key] = 'required|email';
            }
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'title.required' => 'Task title is required',
        ];

        if($this->request->get('emails')){
            foreach($this->request->get('emails') as $key => $val)
            {
                $messages['emails.' . $key .'.required'] = 'This email field is required';
                $messages['emails.' . $key .'.email'] = 'This email field is invalid email format';
            }
        }

        // return [
        //     'title.required' => 'Task title is required',
        //     'emails.*.required' => 'This email field is required',
        //     'emails.*.email' => 'This email field is invalid email format',
        // ];

        return $messages;

    }
}
