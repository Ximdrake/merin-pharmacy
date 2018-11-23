<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';
    protected $fillable = array(
		'doc_id',
		'firstname',
		'middlename',
		'lastname',
		'birthdate',
		'gender',
		'contact_number',
		'address',
		'image_ext',
		'status',
		'image',
    );
    public $timestamps = true;
}
