<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reg_status', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('display_order')->nullable()->index('display_order');
			$table->string('display_name')->nullable();
			$table->string('uri')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reg_status');
	}

}
