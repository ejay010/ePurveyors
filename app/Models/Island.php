<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Island extends Model
{
    use HasFactory;

    use Notifiable;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'is_open',
    ];

    public function marinas()
    {
        return $this->hasMany(Marina::class);
    }

    
}
