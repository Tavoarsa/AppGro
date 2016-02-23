<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrasferenciaEmbrionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trasferencia_embriones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idAnimal');
			$table->foreign('idAnimal')->references('id')->on('animals');
			$table->string ('padre')->nullable();				
			$table->string ('madre_donadora')->nullable();
			$table->string ('madre_receptora')->nullable();
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
		Schema::drop('trasferencia_embriones');
	}

}
