<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class BarangRequest extends Request
{

    protected $attrs = [


        'nama_barang' => 'nama_barang',
        'jumlah'      => 'jumlah',
        'status'      => 'status',
    ];

    public function rules()
    {
        return [
            'nama_barang' => 'required',
            'jumlah'      => 'required',
            'status'      => 'required',
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
                'nama_barang' => $message->first('nama_barang'),
                'jumlah'      => $message->first('jumlah'),
                'status'      => $message->first('status')
            ],
        ];
    }
}
