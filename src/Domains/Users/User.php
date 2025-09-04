<?php
declare(strict_types=1);

namespace ERM\Domains\Users;

use ERM\App\Models\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email'
    ];
}
