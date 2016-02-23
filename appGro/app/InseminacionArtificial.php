<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class InseminacionArtificial extends Model {

	protected $table ='inseminacion_artificials';
	protected $fillable=['idAnimal','padre','madre'];
	protected $guarded = ['id'];

	
	  public function animals()
    {
        return $this->belongsTo('App\InseminacionArtificial', 'idAnimal');
    }

}
