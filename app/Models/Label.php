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
        'user_id'
    ];

    /**
     * Get all the contacts with this label.
     */
    public function contacts()
    {
        return $this->belongsToMany(Contact::class, 'contacts_labels');
    }
}
