<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class PeminjamanRequest extends Request
{

    protected $attrs = [

        'nama_peminjam' => 'nama_peminjam',
        'kelas'         => 'kelas',
        'jurusan'       => 'jurusan',
        'id_barang'     => 'id_barang',
        'tgl_pinjam'    => 'tgl_pinjam',
        'tgl_kembali'   => 'tgl_kembali',
        'status'        => 'status',
    ];

    public function rules()
    {
        return [
            'nama_peminjam' => 'required',
            'kelas'         => 'required',
            'jurusan'       => 'required',
            'id_barang'     => 'required',
            'tgl_pinjam'    => '',
            'tgl_kembali'   => '',
            'status'        => '',

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
                'nama_peminjam' => $message->first('nama_peminjam'),
                'kelas'         => $message->first('kelas'),
                'jurusan'       => $message->first('jurusan'),
                'id_barang'     => $message->first('id_barang'),
                'tgl_pinjam'    => $message->first('tgl_pinjam'),
                'tgl_kembali'   => $message->first('tgl_kembali'),
                'status'        => $message->first('status'),
            ],
        ];
    }
}
