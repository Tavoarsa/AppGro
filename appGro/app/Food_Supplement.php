<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Food_Supplement extends Model {

		protected $table 	= 'food__supplements';
		protected $fillable = ['idUser','idProvider','typeProduct','nameProduct','weight','price','price_kg','due_date'];
		protected $guarded  = ['id'];

}
