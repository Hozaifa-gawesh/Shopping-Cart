<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable = ['phone_1', 'phone_2', 'email_1', 'email_2', 'facebook', 'twitter',
            'youtube', 'instagram', 'address', 'logo', 'favicon', 'map_link'];
}
