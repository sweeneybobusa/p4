<?php

class SongSeeder extends Seeder {
	
	
	public function run() {
		
		# Clear the tables to a blank slate
		DB::statement('SET FOREIGN_KEY_CHECKS=0'); # Disable FK constraints so that all rows can be deleted, even if there's an associated FK
		DB::statement('TRUNCATE songs');
		DB::statement('TRUNCATE artists');
		DB::statement('TRUNCATE tags');
		DB::statement('TRUNCATE song_tag');
		DB::statement('TRUNCATE users');
		DB::statement('TRUNCATE words');
		
		# Artists
		$parton = new Artist;
		$parton->artist_name = 'Dolly Parton';
		$parton->save();
		
		$plain_white_ts = new Artist;
		$plain_white_ts->artist_name = 'Plain White T&rsquo;s';
		$plain_white_ts->save();
		
		$chesney = new Artist;
		$chesney->artist_name = 'Kenny Chesney';
		$chesney->save();
		
		# Tags (Created using the Model Create shortcut method)
		# Note: Tags model must have `protected $fillable = array('name');` in order for this to work
		$two_step		= Tag::create(array('name' => 'Two step'));
		$cha_cha		= Tag::create(array('name' => 'Cha Cha'));
		$waltz			= Tag::create(array('name' => 'Waltz'));
		$west_coast		= Tag::create(array('name' => 'West coast swing'));
		$east_coast		= Tag::create(array('name' => 'East coast swing'));
		$linedance 		= Tag::create(array('name' => 'Line dance'));
		$polka 			= Tag::create(array('name' => 'polka - the dance of love'));
		$barndance		= Tag::create(array('name' => 'barndance'));
		
		# Songs		
		$kids = new Song;
		$kids->song_title	= 'American Kids';
		$kids->album	= 'American Kids Single';
		$kids->year		= 2014;
		$kids->bpm		= 85;
		$kids->music_link = 'https://itunes.apple.com/us/album/american-kids-single/id887991756';
		$kids->video_url = 'http://www.youtube.com/watch?v=de1aPKXBdAE';
		
		# Associate has to be called *before* the song is created (save()) 
		$kids->artist()->associate($chesney);
		$kids->save();
		
		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$kids->tags()->attach($two_step); 
		$kids->tags()->attach($linedance); 
		
		$nine = new Song;
		$nine->song_title = '9 to 5';
		$nine->album = '9 to 5 and Odd Jobs';
		$nine->year = 1981;
		$nine->bpm 	= 104;
		$nine->music_link = 'https://itunes.apple.com/us/album/9-to-5-odd-jobs/id309065624';
		$nine->video_url = 'http://www.youtube.com/watch?v=LwDMFOLIHxU';
		
		# Associate has to be called *before* the song is created (save()) 
		$nine->artist()->associate($parton);
		$nine->save();
		
		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$nine->tags()->attach($two_step); 
		$nine->tags()->attach($linedance); 
		
		$delilah = new Song;
		$delilah->song_title = 'Hey There Delilah';
		$delilah->album = 'All That We Need';
		$delilah->year = 2005;
		$delilah->bpm 	= 104;
		$delilah->music_link = 'https://itunes.apple.com/us/album/all-that-we-needed/id75500242';
		$delilah->video_url = 'http://www.youtube.com/watch?v=h_m-BjrxmgI';
		
		# Associate has to be called *before* the song is created (save()) 
		$delilah->artist()->associate($parton);
		$delilah->save();
		
		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$delilah->tags()->attach($two_step); 
		$delilah->tags()->attach($linedance); 
		
		
		$user = new User;
		$user->email = 'sweeneybobusa@gmail.com';
		$user->password = Hash::make('fabulous');
		$user->nickname = 'bob';
		$user->save();
		
	
	}
	
}