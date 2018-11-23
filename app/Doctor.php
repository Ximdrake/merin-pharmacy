<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';
    protected $fillable = array(
		'firstname',
		'middlename',
		'lastname',
		'clinic_location',
		'license_number',
		'contact_number',
		'specialty',
    );
    public $timestamps = true;
}
