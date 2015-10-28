<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArcId2valTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('arc_id2val', function(Blueprint $table)
		{
			$table->integer('id')->unsigned()->index('id_2');
			$table->boolean('misc')->default(0);
			$table->text('val', 65535)->index('v');
			$table->boolean('val_type')->default(0);
			$table->unique(['id','val_type'], 'id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('arc_id2val');
	}

}
