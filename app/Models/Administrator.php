<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrator extends Authenticatable
{
    use HasFactory;

    use Notifiable;

    protected $fillable = [
        'email',
        'name',
        'password',
    ];

    protected $hidden = [
        'password'
    ];
}
