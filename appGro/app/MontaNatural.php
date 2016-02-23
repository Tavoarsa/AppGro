<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class MontaNatural extends Model {

	protected $table ='monta_naturals';
	protected $fillable=['idAnimal','padre','madre'];
	protected $guarded = ['id'];

	
	  public function animals()
    {
        return $this->belongsTo('App\MontaNatural', 'idAnimal');
    }


}
