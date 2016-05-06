<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends Request
{

    protected $attrs = [

        'nama'     => 'nama',
        'email'    => 'email',
        'password' => 'passsword',
        'no_hp'    => 'no_hp',
    ];

    public function rules()
    {
        return [
            'nama'     => 'required',
            'email'    => 'required|email',
            'password' => 'between:5,25',
            'no_hp'    => 'required',
        ];
    }

    public function validator($validator)
    {
        return $validator->make($this->all(), $this->container->call([$this, 'rules']), $this->messages(), $this->attrs);
    }

    protected function formatErrors(validator $validator)
    {
        $message = $validator->errors();
        return [
            'success'    => false,
            'validation' => [
                'nama'     => $message->first('nama'),
                'email'    => $message->first('email'),
                'password' => $message->first('password'),
                'no_hp'    => $message->first('no_hp'),
            ],
        ];
    }
}
