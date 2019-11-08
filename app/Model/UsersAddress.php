<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UsersAddress extends Model
{
    protected $table = 'users_addresses';

    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'city_id', 'district_id', 'address', 'address_type', 'phone', 'telephone'
    ];
}
