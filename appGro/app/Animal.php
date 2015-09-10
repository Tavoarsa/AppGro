<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model {

	protected $table ='animals';
	protected $fillable=['idUser','numeroAnimal','nombre','idPadre','idMadre','raza','genero',
						'fechaNacimiento','pesoNacimiento','fechaMuerte','observaciones'];
	protected $guarded = ['id'];



/*public static function getPadre()

	{

		

			$sql = 'select id,nombre	
					From animals a '		
				
				return DB::select($sql);
	}
*/
	public static function uploadImages(){

		$sql= 'select a.id,a.image,a.nombre
				from
				animals a';

		return DB::select($sql);



	}
}



