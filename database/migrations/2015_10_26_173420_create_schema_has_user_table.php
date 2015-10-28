<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchemaHasUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schema_has_user', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamps();
			$table->softDeletes();
			$table->integer('schema_id')->default(0)->index('schema_id');
			$table->integer('user_id')->default(0)->index('user_id');
			$table->boolean('is_maintainer_for')->nullable()->default(1);
			$table->boolean('is_registrar_for')->nullable()->default(1);
			$table->boolean('is_admin_for')->nullable()->default(1);
			$table->text('languages', 65535)->nullable();
			$table->char('default_language', 6)->default('en');
			$table->char('current_language', 6)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('schema_has_user');
	}

}
