<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('farms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idUser');
                        $table->foreign('idUser')->references('id')->on('users');
			$table->string('name');
			$table->string('address');			
			$table->string('agent')->nullable();		
			$table->string('operationCertificate')->nullable();
			$table->string('exploitation')->nullable();
			$table->string('patent')->nullable();			
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
		Schema::drop('farms');
	}

}
