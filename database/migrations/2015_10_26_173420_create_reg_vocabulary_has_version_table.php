<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegVocabularyHasVersionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reg_vocabulary_has_version', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name')->default('')->index('name');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('created_user_id')->nullable()->index('created_user_id');
			$table->integer('vocabulary_id')->nullable()->index('vocabulary_id');
			$table->dateTime('timeslice')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reg_vocabulary_has_version');
	}

}
