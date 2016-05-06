<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

class User extends Entities
{
    //


    /**
     * @var string
     */

    protected $table = 'users';

    /**
     * @var array
     */

    protected $fillable = ['nama', 'email','password','no_hp'];


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
