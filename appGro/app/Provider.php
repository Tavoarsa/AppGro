<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model {

	protected $table ='providers';
	protected $fillable=['idUser','idFarm','name','address','email','phone','service','observation'];
	protected $guarded = ['id'];


}
