<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFincasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fincas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idUser');
		    $table->foreign('idUser')->references('id')->on('users');
			$table->string('nombre');
			$table->string('direcion');
			$table->double('latitud');
			$table->double('longitud');
			$table->string('representante');			
			$table->string('certficadoOperacion');
			$table->string('explotacion');
			$table->string('marca');			
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fincas');
	}

}
