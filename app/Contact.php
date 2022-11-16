<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = false;
    protected $table = 'contacts';

    protected $fillable = ['full_name','email','phone','country','contact_reason','message','datetime','privacy_policy','is_receiving_info'];
}
