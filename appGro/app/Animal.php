<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model {

	protected $table ='animals';
	protected $fillable=['idUser','idFarm','numeroAnimal','raza','genero',
						'fechaNacimiento','fechaMuerte','caracteristicas','image'];
	protected $guarded = ['id'];

}



