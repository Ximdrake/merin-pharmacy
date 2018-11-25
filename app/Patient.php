<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Hashidable;


class Patient extends Model
{
	use Hashidable;
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


    private function getModel($model, $routeKey)
{
    $id = \Hashids::connection($model)->decode($routeKey)[0] ?? null;
    $modelInstance = resolve($model);

    return  $modelInstance->findOrFail($id);
}

}
