<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    function open() {
        $this->update(['is_open' => true]);
    }

    function close() {
        $this->update(['is_open' => false]);
    }

    protected function isOpen(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if ($value) {
                    return "Open";
                }
                return "Closed";
            }
        );
    }
}
