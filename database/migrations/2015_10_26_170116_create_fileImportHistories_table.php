<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileImportHistoriesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reg_file_import_history', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id', true);
			$table->dateTime('created_at');
			$table->text('map');
			$table->integer('user_id');
			$table->integer('vocabulary_id');
			$table->integer('schema_id');
			$table->string('file_name', 255);
			$table->string('source_file_name', 255);
			$table->string('file_type', 255);
			$table->integer('batch_id');
			$table->text('results');
			$table->integer('total_processed_count');
			$table->integer('error_count');
			$table->integer('success_count');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reg_file_import_history');
	}

}
