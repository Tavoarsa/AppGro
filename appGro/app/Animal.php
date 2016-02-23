<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FertilizacionInvitro;

class Animal extends Model {

	protected $table ='animals';
	protected $fillable=['idUser','idFarm','numeroAnimal','raza','genero',
						'fechaNacimiento','fechaMuerte','caracteristicas','image'];
	protected $guarded = ['id'];

	public function procedencia()
	{
		return $this->hasMany('App\Animal', 'idAnimal');

	}
	

	


}



