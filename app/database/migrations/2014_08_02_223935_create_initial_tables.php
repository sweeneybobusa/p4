<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
	
		# create users table (based on foobooks example and trying honeypot authentication
		Schema::create('users', function($table) {
			# AI, PK
			$table->increments('id');
			
			# adding Create_on and updated_at columns
			$table->timestamps();

			# General data
			$table->string('username')->unique();
			$table->string('name');
			$table->string('nickname');
			$table->string('email')->unique();
			$table->string('password');
			$table->date('birth_date');
			$table->boolean('remember_token');
			$table->text('about_me');
			
			# for use with honeypot's user authentication -- not sure if I need to but I'll put it in
			$table->string('my_name'); 
			$table->string('my_time');
			
			# eventually putting favorites foreign keys for songs and line dances here

		});
		
		# create dance glossary table
		Schema::create('words', function($table) {
			# AI, PK
			$table->increments('id');

        	# adding Create_on and updated_at columns
			$table->timestamps();
			
			# General data
			$table->string('dance_term')->index();
			$table->string('abbreviation');
        	$table->text('definition');
        	
		});
		
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropifexists('users');
		Schema::dropifexists('words');
	}

}
