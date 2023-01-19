<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    //име, фамилия, име на фирма, адрес,телефонен номер, имейл адрес, номер на факс, номер на мобилен телефон,коментар
    protected $fillable = [
        'fname',
        'lname',
        'firmName',
        'adress',
        'phoneNumber',
        'mobileNumber', 
        'email',
        'fax', 
        'comment',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}