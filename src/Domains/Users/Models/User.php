<?php

namespace ERM\Domains\Users\Models;

use ERM\App\Models\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [];
}