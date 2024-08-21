<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Nasabah extends Authenticatable
{
    use Notifiable;

    protected $table = 'nasabah';

    protected $fillable = [
        'username',
        'password',
        'pin',
        'saldo',
    ];

    protected $hidden = [
        'password', 'pin',
    ];

    public function getAuthIdentifierName()
    {
        return 'username';
    }
}

