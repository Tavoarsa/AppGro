<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TrasferenciaEmbriones extends Model {

	protected $table ='trasferencia_embriones';
	protected $fillable=['idAnimal','padre','madre_donadora','madre_receptora'];
	protected $guarded = ['id'];

	
	  public function animals()
    {
        return $this->belongsTo('App\TrasferenciaEmbriones', 'idAnimal');
    }


}
