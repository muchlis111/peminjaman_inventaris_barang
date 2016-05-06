<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

class barang extends Entities
{
    //


    /**
     * @var string
     */

    protected $table = 'barang';

    /**
     * @var array
     */

    protected $fillable = ['nama_barang','jumlah','status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    protected $primaryKey = 'id';

    /**
     * @var string
     */

    public static $tags = 'user';

    /**
     * @var array
     */

    protected $hidden = [

        'created_at',

        'updated_at',

        'user_creator',

        'user_updater'

    ];
}
