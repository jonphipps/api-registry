<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVsDatabaseDiagramsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vs_database_diagrams', function(Blueprint $table)
		{
			$table->char('name', 80)->nullable();
			$table->text('diadata', 65535)->nullable();
			$table->string('comment', 1022)->nullable();
			$table->text('preview', 65535)->nullable();
			$table->char('lockinfo', 80)->nullable();
			$table->timestamp('locktime')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->char('version', 80)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vs_database_diagrams');
	}

}
