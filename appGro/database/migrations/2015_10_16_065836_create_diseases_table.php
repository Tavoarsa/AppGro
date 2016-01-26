<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiseasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diseases', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idUser');
			$table->foreign('idUser')->references('id')->on('users');
			$table->integer('idFarm');
		    $table->foreign('idFarm')->references('id')->on('farms');	
			$table->string ('name');			
			$table->string ('description');
			$table->string('symptom');
			$table->string ('vaccinationAge');
			$table->string ('boosterInjection');	
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
		Schema::drop('diseases');
	}

}
