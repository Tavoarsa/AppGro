<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Finca extends Model {

	protected $table ='fincas';
	protected $fillable=['nombre','direcion','representante','certficadoOperacion','explotacion'];
	protected $guarded = ['id'];

}
