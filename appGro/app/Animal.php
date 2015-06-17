<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model {

	protected $table ='animals';
	protected $fillable=['idUser','numeroAnimal','nombre','idPadre','idMadre','raza','genero',
						'fechaNacimiento','pesoNacimiento','fechaMuerte','observaciones','image'];
	protected $guarded = ['id'];



/*public static function getPadre()

	{

		

			$sql = 'select id,nombre	
					From animals a '		
				
				return DB::select($sql);
	}
*/
}



