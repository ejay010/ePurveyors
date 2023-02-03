<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'island',
        'marina',
        'list_file',
        'customerName',
        'customerEmail',
        'customerTelPhone',
        'user_id',
    ];

    protected $appends = [
        'list_file'
    ];

    protected function listFile(): Attribute
    {
        return new Attribute(fn($value) => url($value));
    }

    function user() {
        return $this->belongsTo(User::class);
    }

}
