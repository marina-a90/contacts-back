<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email'
    ];

    // ili - jedno drugo iskljucuju, ne treba oba
    // protected $guarded = [
    //     'id'
    // ]
}
