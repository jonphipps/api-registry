<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reg_agent', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id', true);
			$table->dateTime('created_at');
			$table->dateTime('last_updated');
			$table->dateTime('deleted_at');
			$table->string('org_email', 255);
			$table->string('org_name', 255);
			$table->string('ind_affiliation', 255);
			$table->string('ind_role', 255);
			$table->string('address1', 255);
			$table->string('address2', 255);
			$table->string('city', 255);
			$table->string('state', 255);
			$table->string('postal_code', 255);
			$table->string('country', 255);
			$table->string('phone', 255);
			$table->string('web_address', 255);
			$table->string('type', 255);
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
		Schema::drop('reg_agent');
	}

}
