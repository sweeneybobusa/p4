<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanceTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		# Create artist table
		Schema::create('artists', function($table) {

			# AI, PK
			$table->increments('id');

			# adding Create_on and updated_at columns
			$table->timestamps();
			
			# General data
			$table->string('artist_name');
						
        	# setting foreign keys
						
		});
						
		# create song table 
		Schema::create('songs', function($table) {
		
			# AI, PK
			$table->increments('id');
			 
        	# adding Create_on and updated_at columns
			$table->timestamps();

			# General data
			$table->string('song_title');
			$table->integer('artist_id')->unsigned();
        	$table->string('album');
        	$table->integer('year');
        	$table->integer('bpm');
        	$table->string('music_link');
        	$table->string('video_url');
        				
			# setting foreign keys
			$table->foreign('artist_id')->references('id')->on('artists');
			
		});
			
		# Create dance tags table
		Schema::create('tags', function($table) {

			# AI, PK
			$table->increments('id');
			
        	# adding Create_on and updated_at columns
			$table->timestamps();

			# General data
			$table->string('name', 64);
			
			# setting foreign keys
			
		});

		# create pivot table in an attempt to connect artist, album, dance, and song ids
		
		Schema::create('song_tag', function($table) {
					
			# general data
			$table->integer('song_id')->unsigned();
			$table->integer('tag_id')->unsigned();
			
			# define foreign keys
			$table->foreign('song_id')->references('id')->on('songs');
			$table->foreign('tag_id')->references('id')->on('tags');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('song_tag', function($table){
			$table->dropForeign('song_tag_song_id_foreign');
			$table->dropForeign('song_tag_tag_id_foreign');
		});

		Schema::table('songs', function($table){
			$table->dropForeign('songs_artist_id_foreign');
		});
		
		Schema::dropifexists('artists');
		Schema::dropifexists('dances');
		Schema::dropifexists('songs');
		Schema::dropifexists('tags');
		Schema::dropifexists('song_tag');
	
	}

}
