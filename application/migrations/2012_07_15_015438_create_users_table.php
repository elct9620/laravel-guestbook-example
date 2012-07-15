<?php

class Create_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::create('users', function($table){
      $table->increments('ID');
      $table->string('username');
      $table->string('password');
      $table->string('nickname');
      $table->timestamps();

      $table->unique('username');
    });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
    Schema::drop('users');
	}

}
