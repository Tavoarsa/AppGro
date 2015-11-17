<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model {

	protected $table ='medicines';
	protected $fillable=['idUser','idProvider','nameProduct','size','price','price_ml','due_date'];
	protected $guarded = ['id'];


}
