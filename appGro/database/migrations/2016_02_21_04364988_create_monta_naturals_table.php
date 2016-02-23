<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMontaNaturalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('monta_naturals', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idAnimal');
			$table->foreign('idAnimal')->references('id')->on('animals');			
			$table->string ('madre')->nullable();
			$table->string ('padre')->nullable();
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
		Schema::drop('monta_naturals');
	}

}
