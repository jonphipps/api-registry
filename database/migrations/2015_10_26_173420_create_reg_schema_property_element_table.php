<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegSchemaPropertyElementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reg_schema_property_element', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamps();
			$table->softDeletes();
			$table->integer('created_user_id')->nullable()->index('created_user_id');
			$table->integer('updated_user_id')->nullable()->index('updated_user_id');
			$table->integer('schema_property_id')->index('schema_property_id');
			$table->integer('profile_property_id')->index('profile_property_id');
			$table->boolean('is_schema_property')->nullable();
			$table->text('object', 65535)->index('reg_schema_property_element_idx1');
			$table->integer('related_schema_property_id')->nullable()->index('related_property_id');
			$table->char('language', 6);
			$table->integer('status_id')->nullable()->default(1)->index('status_id');
			$table->boolean('is_generated')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reg_schema_property_element');
	}

}
