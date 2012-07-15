<?php

class Add_User_Column_To_Comment {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::table('comments', function($table){
      $table->integer('user_id');
    });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
    Schema::table('comments', function($table){
      $table->drop_column('user_id');
    });
	}

}
