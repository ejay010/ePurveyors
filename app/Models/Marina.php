<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marina extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'is_open',
        'description',
        'island_id',
    ];

    public function island()
    {
        return $this->belongsTo(Island::class);
    }
}
