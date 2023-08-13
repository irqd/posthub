<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'birthday',
        'phone_number',
        'address_1',
        'address_2',
        'city',
        'zip_code',
        'province',
        'country',
        'profile_picture'
    ];

    protected $casts = [
        'birthday' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
