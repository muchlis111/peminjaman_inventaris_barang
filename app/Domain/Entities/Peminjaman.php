<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Entities
{
    //


    /**
     * @var string
     */

    protected $table = 'peminjaman';

    /**
     * @var array
     */

    protected $fillable = ['nama_peminjam', 'kelas', 'jurusan', 'id_barang', 'tgl_pinjam', 'tgl_kembali','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    protected $primaryKey = 'id';

    /**
     * @var string
     */

    public static $tags = 'peminjaman';

    /**
     * @var array
     */

    protected $hidden = [

        'created_at',

        'updated_at',

        'user_creator',

        'user_updater',

    ];

    protected $with = ['barang'];

    public function barang()
    {
        return $this->belongsTo('App\Domain\Entities\Barang', 'id_barang');
    }
}
