<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegSchemaPropertyCopyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reg_schema_property_copy', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamps();
			$table->softDeletes();
			$table->integer('created_user_id')->nullable()->index('created_user_id');
			$table->integer('updated_user_id')->nullable()->index('updated_user_id');
			$table->integer('schema_id')->index('schema_id');
			$table->string('name')->default('');
			$table->string('label')->default('');
			$table->text('definition', 65535)->nullable();
			$table->text('comment', 65535)->nullable();
			$table->enum('type', array('property','subproperty','class','subclass'))->default('property');
			$table->integer('is_subproperty_of')->nullable()->index('subproperty_id');
			$table->string('parent_uri')->nullable();
			$table->string('uri')->default('')->index('reg_schema_property_idx1');
			$table->integer('status_id')->default(1)->index('status_id');
			$table->string('language', 6)->default('');
			$table->text('note', 65535)->nullable();
			$table->string('domain')->nullable();
			$table->string('orange')->nullable();
			$table->boolean('is_deprecated')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reg_schema_property_copy');
	}

}
