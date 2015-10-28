<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegRdfNamespaceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reg_rdf_namespace', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('schema_id')->index('schema_id');
			$table->dateTime('created_at')->nullable();
			$table->softDeletes();
			$table->integer('created_user_id')->nullable();
			$table->integer('updated_user_id')->nullable();
			$table->string('token')->default('');
			$table->text('note', 65535)->nullable();
			$table->string('uri')->default('');
			$table->string('schema_location')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reg_rdf_namespace');
	}

}
