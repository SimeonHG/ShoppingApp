<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        'contact_id'
    ];

    /**
     * Get the contact that owns the label.
     */
    public function post()
    {
        return $this->belongsTo(Contact::class);
    }
}
