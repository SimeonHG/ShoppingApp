<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'expiration_date', 'price', 'provider_id'];


    public function provider()
    {
        return $this->belongsTo(User::class);
    }

    public function shops()
    {
        return $this->belongsToMany(Shop::class);
    }

}
