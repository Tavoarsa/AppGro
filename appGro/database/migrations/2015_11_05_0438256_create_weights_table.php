<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeightsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('weights', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idUser');
			$table->foreign('idUser')->references('id')->on('users');
			$table->integer('idAnimal');
			$table->foreign('idAnimal')->references('id')->on('animals');
			$table->integer('idFarm');
		    $table->foreign('idFarm')->references('id')->on('farms');		    
			$table->string('weight');
			$table->string('dateWeight');
			$table->double('value')->nullable();
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
		Schema::drop('weights');
	}

}
