<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class FertilizacionInvitro extends Model {

	protected $table ='fertilizacion_invitros';
	protected $fillable=['idAnimal','padre','madre_donadora','madre_receptora'];
	protected $guarded = ['id'];

	
	  public function animals()
    {
        return $this->belongsTo('App\FertilizacionInvitro', 'idAnimal');
    }

}
