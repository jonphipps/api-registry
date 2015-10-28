<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArcS2valTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('arc_s2val', function(Blueprint $table)
		{
			$table->integer('id')->unsigned()->unique('id');
			$table->integer('cid')->unsigned()->index('cid');
			$table->boolean('misc')->default(0);
			$table->text('val', 65535)->index('v');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('arc_s2val');
	}

}
