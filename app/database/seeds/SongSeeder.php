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
		
		$solveig = new Artist;
		$solveig->artist_name = "Martin Solveig";
		$solveig->save();
		
		$musgraves = new Artist;
		$musgraves->artist_name = "Kacey Musgraves";
		$musgraves->save();
		
		$iconapop = new Artist;
		$iconapop->artist_name = "Icona Pop";
		$iconapop->save();
		
		$redcat = new Artist;
		$redcat->artist_name = "Marie & the redCat";
		$redcat->save();
		
		$cjarvis = new Artist;
		$cjarvis->artist_name = "Cosmo Jarvis";
		$cjarvis->save();
		
		$cdubelugas = new Artist;
		$cdubelugas->artist_name = "Club des Belugas";
		$cdubelugas->save();
		
		$weemann = new Artist;
		$weemann->artist_name = "Walter Weemann&rsquo;s Brass & Singers";
		$weemann->save();
		
		$dittybops = new Artist;
		$dittybops->artist_name = "The Ditty Bops";
		$dittybops->save();
		
		$ekitt = new Artist;
		$ekitt->artist_name = "Eartha Kitt";
		$ekitt->save();
		
		$duptribe = new Artist;
		$duptribe->artist_name = "Duptribe";
		$duptribe->save();
		
		$bcrosby = new Artist;
		$bcrosby->artist_name = "Bing Crosby";
		$bcrosby->save();
		
		$mpotter = new Artist;
		$mpotter->artist_name = "Mike Potter, James Day & Justin Langlands";
		$mpotter->save();
		
		$zarif = new Artist;
		$zarif->artist_name = "Zarif";
		$zarif->save();
		
		$maze = new Artist;
		$maze->artist_name = "Maze";
		$maze->save();
		
		$pcline = new Artist;
		$pcline->artist_name = "Patsy Cline";
		$pcline->save();
		
		$moving_violations = new Artist;
		$moving_violations->artist_name = "Moving Violations";
		$moving_violations->save();
		
		$efitzgerald = new Artist;
		$efitzgerald->artist_name = "Ella Fitzgerald";
		$efitzgerald->save();
		
		$tkeith = new Artist;
		$tkeith->artist_name = "Toby Keith";
		$tkeith->save();
		
		$belaflick = new Artist;
		$belaflick->artist_name = "Bela Fleck and the Flecktones";
		$belaflick->save();
		
		$ttrischka = new Artist;
		$ttrischka->artist_name = "Tony Trischka";
		$ttrischka->save();
		
		$csmith = new Artist;
		$csmith->artist_name = "Carl Smith";
		$csmith->save();
		
		$gabin = new Artist;
		$gabin->artist_name = "Gabin";
		$gabin->save();
		
		$cupid = new Artist;
		$cupid->artist_name = "Cupid";
		$cupid->save();
		
		$scooter_lee = new Artist;
		$scooter_lee->artist_name = "Scooter Lee";
		$scooter_lee->save();
		
		$stingily = new Artist;
		$stingily->artist_name = "Byron Stingily";
		$stingily->save();
		
		$nouve_vague = new Artist;
		$nouve_vague->artist_name = "Nouvelle Vague";
		$nouve_vague->save();
		
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
		$twostep_tag	= Tag::create(array('name' => 'Two step'));
		$chacha_tag		= Tag::create(array('name' => 'Cha Cha'));
		$waltz_tag		= Tag::create(array('name' => 'Waltz'));
		$westcoast_tag	= Tag::create(array('name' => 'West coast swing'));
		$eastcoast_tag	= Tag::create(array('name' => 'East coast swing'));
		$linedance_tag	= Tag::create(array('name' => 'Line dance'));
		$polka_tag		= Tag::create(array('name' => 'Polka - The Dance of Love'));
		$barndance_tag	= Tag::create(array('name' => 'Barndance'));
		
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
		$kids->tags()->attach($twostep_tag); 
		$kids->tags()->attach($linedance_tag); 
		
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
		$nine->tags()->attach($twostep_tag); 
		$nine->tags()->attach($linedance_tag); 
		
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
		$delilah->tags()->attach($twostep_tag); 
		$delilah->tags()->attach($linedance_tag); 
		
		#---------------------
		$boys_n_girls = new Song;
		$boys_n_girls->song_title = 'Boys & Girls';
		$boys_n_girls->album = 'Boys & Girls (feat. Dragonette)';
		$boys_n_girls->year = 2009;
		$boys_n_girls->bpm 	= 128;
		$boys_n_girls->music_link = 'https://itunes.apple.com/us/album/all-that-we-needed/id75500242';
		$boys_n_girls->video_url = 'http://www.youtube.com/watch?v=h_m-BjrxmgI';
		
		# Associate has to be called *before* the song is created (save()) 
		$boys_n_girls->artist()->associate($solveig);
		$boys_n_girls->save();
		
		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$boys_n_girls->tags()->attach($barndance_tag); 
		
		
		#---------------------
		$follow_your_arrow = new Song;
		$follow_your_arrow->song_title = 'Follow Your Arrow';
		$follow_your_arrow->album = 'Same Trailer Different Park';
		$follow_your_arrow->year = 2013;
		$follow_your_arrow->bpm 	= 256;
		$follow_your_arrow->music_link = 'https://itunes.apple.com/us/album/all-that-we-needed/id75500242';
		$follow_your_arrow->video_url = 'http://www.youtube.com/watch?v=h_m-BjrxmgI';
		
		# Associate has to be called *before* the song is created (save()) 
		$follow_your_arrow->artist()->associate($musgraves);
		$follow_your_arrow->save();

		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$follow_your_arrow->tags()->attach($twostep_tag); 
		
		
		#---------------------
		$i_love_it = new Song;
		$i_love_it->song_title = 'I Love It (feat. Charli XCX)';
		$i_love_it->album = 'Iconic - EP';
		$i_love_it->year = 2012;
		$i_love_it->bpm 	= 256;
		$i_love_it->music_link = 'https://itunes.apple.com/us/album/all-that-we-needed/id75500242';
		$i_love_it->video_url = 'http://www.youtube.com/watch?v=h_m-BjrxmgI';
		
		# Associate has to be called *before* the song is created (save()) 
		$i_love_it->artist()->associate($iconapop);
		$i_love_it->save();
		
		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$i_love_it->tags()->attach($barndance_tag); 
		
		
		#---------------------
		$beautiful_day = new Song;
		$beautiful_day->song_title = 'Beautiful Day';
		$beautiful_day->album = 'Home';
		$beautiful_day->year = 2012;
		$beautiful_day->bpm 	= 256;
		$beautiful_day->music_link = 'https://itunes.apple.com/us/album/all-that-we-needed/id75500242';
		$beautiful_day->video_url = 'http://www.youtube.com/watch?v=h_m-BjrxmgI';
		
		# Associate has to be called *before* the song is created (save()) 
		$beautiful_day->artist()->associate($redcat);
		$beautiful_day->save();
		
		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$beautiful_day->tags()->attach($westcoast_tag); 
		
		
		#---------------------
		$gay_pirates = new Song;
		$gay_pirates->song_title = 'Gay Pirates';
		$gay_pirates->album = 'Is the World Strange or Am I Strange?';
		$gay_pirates->year = 2011;
		$gay_pirates->bpm 	= 256;
		$gay_pirates->music_link = 'https://itunes.apple.com/us/album/all-that-we-needed/id75500242';
		$gay_pirates->video_url = 'http://www.youtube.com/watch?v=h_m-BjrxmgI';
		
		# Associate has to be called *before* the song is created (save()) 
		$gay_pirates->artist()->associate($cjarvis);
		$gay_pirates->save();
		
		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$gay_pirates->tags()->attach($linedance_tag); 
		
		
		#---------------------

		$straight_to_memphis = new Song;
		$straight_to_memphis->song_title = 'Straight to Memphis (feat. Brenda Boykin)';
		$straight_to_memphis->album = 'The Art of Electro Swing, Vol. 3';
		$straight_to_memphis->year = 2012;
		$straight_to_memphis->bpm 	= 256;
		$straight_to_memphis->music_link = 'https://itunes.apple.com/us/album/all-that-we-needed/id75500242';
		$straight_to_memphis->video_url = 'http://www.youtube.com/watch?v=h_m-BjrxmgI';
		
		# Associate has to be called *before* the song is created (save()) 
		$straight_to_memphis->artist()->associate($cdubelugas);
		$straight_to_memphis->save();
		
		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$straight_to_memphis->tags()->attach($linedance_tag); 
		
		
		#---------------------
		$this_old_house = new Song;
		$this_old_house->song_title = 'This Old House';
		$this_old_house->album = 'Electro Swing Deluxe';
		$this_old_house->year = 2013;
		$this_old_house->bpm 	= 256;
		$this_old_house->music_link = 'https://itunes.apple.com/us/album/all-that-we-needed/id75500242';
		$this_old_house->video_url = 'http://www.youtube.com/watch?v=h_m-BjrxmgI';
		
		# Associate has to be called *before* the song is created (save()) 
		$this_old_house->artist()->associate($weemann);
		$this_old_house->save();
		
		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$this_old_house->tags()->attach($eastcoast_tag); 
		
		
		#---------------------
		$four_left_feet = new Song;
		$four_left_feet->song_title = 'Four Left Feet';
		$four_left_feet->album = 'The Ditty Bops';
		$four_left_feet->year = 2004;
		$four_left_feet->bpm 	= 245;
		$four_left_feet->music_link = 'https://itunes.apple.com/us/album/all-that-we-needed/id75500242';
		$four_left_feet->video_url = 'http://www.youtube.com/watch?v=h_m-BjrxmgI';
		
		# Associate has to be called *before* the song is created (save()) 
		$four_left_feet->artist()->associate($dittybops);
		$four_left_feet->save();
		
		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$four_left_feet->tags()->attach($waltz_tag); 
		
		
		#---------------------
		$if_i_was_a_boy = new Song;
		$if_i_was_a_boy->song_title = 'If I Was A Boy';
		$if_i_was_a_boy->album = 'Legendary Eartha Kitt';
		$if_i_was_a_boy->year = 2001;
		$if_i_was_a_boy->bpm 	= 256;
		$if_i_was_a_boy->music_link = 'https://itunes.apple.com/us/album/all-that-we-needed/id75500242';
		$if_i_was_a_boy->video_url = 'http://www.youtube.com/watch?v=h_m-BjrxmgI';
		
		# Associate has to be called *before* the song is created (save()) 
		$if_i_was_a_boy->artist()->associate($ekitt);
		$if_i_was_a_boy->save();
		
		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$if_i_was_a_boy->tags()->attach($twostep_tag);
		
		
		#---------------------
		$welcome_2_mystery = new Song;
		$welcome_2_mystery->song_title = 'Welcome to Mystery';
		$welcome_2_mystery->album = 'Almost Alice (Music Inspired By the Motion Picture)';
		$welcome_2_mystery->year = 2010;
		$welcome_2_mystery->bpm 	= 256;
		$welcome_2_mystery->music_link = 'https://itunes.apple.com/us/album/all-that-we-needed/id75500242';
		$welcome_2_mystery->video_url = 'http://www.youtube.com/watch?v=h_m-BjrxmgI';
		
		# Associate has to be called *before* the song is created (save()) 
		$welcome_2_mystery->artist()->associate($plain_white_ts);
		$welcome_2_mystery->save();
		
		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$welcome_2_mystery->tags()->attach($linedance_tag); 
		
		
		#---------------------
		$back_babys_arms = new Song;
		$back_babys_arms->song_title = 'Back In Baby&rsquo;s Arms (Single Version)';
		$back_babys_arms->album = 'The Ultimate Collection: Patsy Cline (Disc 2)';
		$back_babys_arms->year = 1963;
		$back_babys_arms->bpm 	= 256;
		$back_babys_arms->music_link = 'https://itunes.apple.com/us/album/all-that-we-needed/id75500242';
		$back_babys_arms->video_url = 'http://www.youtube.com/watch?v=h_m-BjrxmgI';
		
		# Associate has to be called *before* the song is created (save()) 
		$back_babys_arms->artist()->associate($pcline);
		$back_babys_arms->save();
		
		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$back_babys_arms->tags()->attach($twostep_tag); 
		
		
		#---------------------
		$blackbird_song = new Song;
		$blackbird_song->song_title = 'Blackbird Song (feat. Ben Cocks)';
		$blackbird_song->album = 'H&ocirc;tel Costes: Vol. 14';
		$blackbird_song->year = 2010;
		$blackbird_song->bpm 	= 256;
		$blackbird_song->music_link = 'https://itunes.apple.com/us/album/all-that-we-needed/id75500242';
		$blackbird_song->video_url = 'http://www.youtube.com/watch?v=h_m-BjrxmgI';
		
		# Associate has to be called *before* the song is created (save()) 
		$blackbird_song->artist()->associate($duptribe);
		$blackbird_song->save();
		
		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$blackbird_song->tags()->attach($barndance_tag); 
		
		
		#---------------------
		$old_cowhand = new Song;
		$old_cowhand->song_title = 'I&rsquo;m an Old Cowhand';
		$old_cowhand->album = 'The Art of Electro Swing, Vol. 2';
		$old_cowhand->year = 2011;
		$old_cowhand->bpm 	= 256;
		$old_cowhand->music_link = 'https://itunes.apple.com/us/album/all-that-we-needed/id75500242';
		$old_cowhand->video_url = 'http://www.youtube.com/watch?v=h_m-BjrxmgI';
		
		# Associate has to be called *before* the song is created (save()) 
		$old_cowhand->artist()->associate($bcrosby);
		$old_cowhand->save();
		
		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$old_cowhand->tags()->attach($barndance_tag); 
		
		
		#---------------------
		$my_kinda_guy = new Song;
		$my_kinda_guy->song_title = 'My Kinda Guy';
		$my_kinda_guy->album = 'Vintage & Electro Swing';
		$my_kinda_guy->year = 2011;
		$my_kinda_guy->bpm 	= 256;
		$my_kinda_guy->music_link = 'https://itunes.apple.com/us/album/all-that-we-needed/id75500242';
		$my_kinda_guy->video_url = 'http://www.youtube.com/watch?v=h_m-BjrxmgI';
		
		# Associate has to be called *before* the song is created (save()) 
		$my_kinda_guy->artist()->associate($mpotter);
		$my_kinda_guy->save();
		
		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$my_kinda_guy->tags()->attach($twostep_tag); 
		
		
		#---------------------
		$box_of_secrets = new Song;
		$box_of_secrets->song_title = 'Box Of Secrets';
		$box_of_secrets->album = 'The Electro Swing Revolution Vol. 2';
		$box_of_secrets->year = 2011;
		$box_of_secrets->bpm 	= 256;
		$box_of_secrets->music_link = 'https://itunes.apple.com/us/album/all-that-we-needed/id75500242';
		$box_of_secrets->video_url = 'http://www.youtube.com/watch?v=h_m-BjrxmgI';
		
		# Associate has to be called *before* the song is created (save()) 
		$box_of_secrets->artist()->associate($zarif);
		$box_of_secrets->save();
		
		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$box_of_secrets->tags()->attach($eastcoast_tag); 
		
		
		#---------------------
		$jolene = new Song;
		$jolene->song_title = 'Jolene';
		$jolene->album = 'The Essential Dolly Parton Volume 2';
		$jolene->year = 1997;
		$jolene->bpm 	= 256;
		$jolene->music_link = 'https://itunes.apple.com/us/album/all-that-we-needed/id75500242';
		$jolene->video_url = 'http://www.youtube.com/watch?v=h_m-BjrxmgI';
		
		# Associate has to be called *before* the song is created (save()) 
		$jolene->artist()->associate($parton);
		$jolene->save();
		
		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$jolene->tags()->attach($twostep_tag); 
		
		
		#---------------------
		$hotta_chocolatta = new Song;
		$hotta_chocolatta->song_title = 'Hotta Chocolatta';
		$hotta_chocolatta->album = 'The Complete Verve Singles';
		$hotta_chocolatta->year = 2003;
		$hotta_chocolatta->bpm 	= 256;
		$hotta_chocolatta->music_link = 'https://itunes.apple.com/us/album/all-that-we-needed/id75500242';
		$hotta_chocolatta->video_url = 'http://www.youtube.com/watch?v=h_m-BjrxmgI';
		
		# Associate has to be called *before* the song is created (save()) 
		$hotta_chocolatta->artist()->associate($efitzgerald);
		$hotta_chocolatta->save();
		
		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$hotta_chocolatta->tags()->attach($chacha_tag); 
		
		
		#---------------------

		$waltz_to_the_miller = new Song;
		$waltz_to_the_miller->song_title = 'John&rsquo;s Waltz to the Miller';
		$waltz_to_the_miller->album = 'A Robot Plane Flies Over Arkansas';
		$waltz_to_the_miller->year = 1989;
		$waltz_to_the_miller->bpm 	= 256;
		$waltz_to_the_miller->music_link = 'https://itunes.apple.com/us/album/all-that-we-needed/id75500242';
		$waltz_to_the_miller->video_url = 'http://www.youtube.com/watch?v=h_m-BjrxmgI';
		
		# Associate has to be called *before* the song is created (save()) 
		$waltz_to_the_miller->artist()->associate($ttrischka);
		$waltz_to_the_miller->save();
		
		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$waltz_to_the_miller->tags()->attach($waltz_tag); 
		
		
		#---------------------
		$polka_on_the_banjo = new Song;
		$polka_on_the_banjo->song_title = 'Polka On The Banjo';
		$polka_on_the_banjo->album = 'The Bluegrass Sessions - Tales';
		$polka_on_the_banjo->year = 2000;
		$polka_on_the_banjo->bpm 	= 256;
		$polka_on_the_banjo->music_link = 'https://itunes.apple.com/us/album/all-that-we-needed/id75500242';
		$polka_on_the_banjo->video_url = 'http://www.youtube.com/watch?v=h_m-BjrxmgI';
		
		# Associate has to be called *before* the song is created (save()) 
		$polka_on_the_banjo->artist()->associate($belaflick);
		$polka_on_the_banjo->save();
		
		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$polka_on_the_banjo->tags()->attach($polka_tag); 
		
		
		#---------------------
		$cupid_shuffle = new Song;
		$cupid_shuffle->song_title = 'Cupid Shuffle';
		$cupid_shuffle->album = 'Time for a Change';
		$cupid_shuffle->year = 2007;
		$cupid_shuffle->bpm 	= 128;
		$cupid_shuffle->music_link = 'https://itunes.apple.com/us/album/all-that-we-needed/id75500242';
		$cupid_shuffle->video_url = 'http://www.youtube.com/watch?v=h_m-BjrxmgI';
		
		# Associate has to be called *before* the song is created (save()) 
		$cupid_shuffle->artist()->associate($cupid);
		$cupid_shuffle->save();
		
		# Attach has to be called *after* the song is created (save()), 
		# since resulting `song_id` is needed in the song_tag pivot table
		$cupid_shuffle->tags()->attach($linedance_tag); 
		
		
		
		
		# initializing User
		
		$user = new User;
		$user->email = 'sweeneybobusa@gmail.com';
		$user->password = Hash::make('funky');
		$user->nickname = 'bob';
		$user->save();
		
		
		# Filling the Word table

		$acknowledge = new Word;
		$acknowledge->dance_term = "Acknowledge";
		$acknowledge->abbreviation = "ack";
		$acknowledge->definition = "Recognize your partner with an implied &ldquo;thank you for gracing me with your company.&rdquo; One standard acknowledgement is an &ldquo;apart&#44; point.&rdquo; A bit more old-fashioned is the bow and curtsey. Nowadays&#44; we are seeing &ldquo;together&#44; touch&rdquo; or &ldquo;together and shape&rdquo; or &ldquo;gather her (the follower) to closed&rdquo; (which are much the same thing); box finish; and off we dance.";
		$acknowledge->save();
		
		$across = new Word;
		$across->dance_term = "Across";
		$across->abbreviation = "acrs";
		$across->definition = "Movement across the direction of dance. The step is taken in front of or behind the supporting foot (usually with &ldquo;contra&rdquo; body movement - see below).";
		$across->save();

		$action = new Word;
		$action->dance_term = "Action";
		$action->abbreviation = "";
		$action->definition = "A movement that does not involve a step or a change of weight&#44; such as a bow&#44; kick&#44; or hip twist.";
		$action->save();
		
		$adjust = new Word;
		$adjust->dance_term = "Adjust";
		$adjust->abbreviation = "adj";
		$adjust->definition = "Modifying the size of the step&#44; the amount of turn&#44; or any other feature in order to achieve grace and comfort. One adjusts to the movements of one&rsquo;s partner and in preparation for the next figure.";
		$adjust->save();
		
		$aerial = new Word;
		$aerial->dance_term = "Aerial";
		$aerial->abbreviation = "";
		$aerial->definition = "In the air. A position in which the foot is raised from the floor. Low = level with ankle; Medium = level with calf; High = level with knee.";
		$aerial->save();
		
		$aerial_ronde = new Word;
		$aerial_ronde->dance_term = "Aerial Ronde";
		$aerial_ronde->abbreviation = "";
		$aerial_ronde->definition = "Flex supporting knee&#44; extend free foot and point toe&#44; and move free foot forward or back in an arc above the floor. Rondes may be done low&#44; medium&#44; high (see above)&#44; or you can raise the foot as far off the floor as conditions allow.";
		$aerial_ronde->save();
		
		$ah = new Word;
		$ah->dance_term = "Ah";
		$ah->abbreviation = "a";
		$ah->definition = "In the timing of dance steps and actions&#44; an &ldquo;a&rdquo; represents only 1/4 beat. In a fast jive&#44; a basic rock is danced &ldquo;1&#44; 2&#44; 3/a&#44; 4; 1/a&#44; 2&#44; The third step (count 3) is quick&#44; only 3/4 of a beat&#44; but the fourth step (the &ldquo;a&rdquo;) really allows you to take only partial weight before you have to bounce off and into the fifth step (count 4). If an &ldquo;&&rdquo; is very quick (see below)&#44; then an &ldquo;a&rdquo; is very, very quick.";
		$ah->save();
		
		$alignment = new Word;
		$alignment->dance_term = "Alignment";
		$alignment->abbreviation = "";
		$alignment->definition = "The direction of a step or figure in relation to the room (e.g.&#44; LOD). Consider alignment in contrast to foot position&#44; which is the direction of a step in relation to the other foot (e.g.&#44; forward&#44; side&#44; back). ";
		$alignment->save();
		
		$allemande = new Word;
		$allemande->dance_term = "Allemande";
		$allemande->abbreviation = "";
		$allemande->definition = "(ahl-mahnd) A turn under raised joined hands. In Germany in the 1500s there was a popular dance called the Allemande that used these turns. Was this the source of our Alemana?";
		$allemande->save();
		
		$amalgamation = new Word;
		$amalgamation->dance_term = "Amalgamation";
		$amalgamation->abbreviation = "";
		$amalgamation->definition = "A sequence of two or more figures.";
		$amalgamation->save();
		
		$american_rhythm = new Word;
		$american_rhythm->dance_term = "American Rhythm";
		$american_rhythm->abbreviation = "";
		$american_rhythm->definition = "A category of American-style dances in ballroom competitions. It includes cha&#44; rumba&#44; swing&#44; bolero&#44; and mambo. This category loosely corresponds to the Latin category of International Style ballroom&#44; although the dances differ somewhat.";
		$american_rhythm->save();
		
		$american_smooth = new Word;
		$american_smooth->dance_term = "American Smooth";
		$american_smooth->abbreviation = "";
		$american_smooth->definition = "A category of American-style dances in ballroom competitions. It includes waltz&#44; tango&#44; foxtrot&#44; and Viennese waltz. This category loosely corresponds to the Ballroom (or Standard) category of International Style. However&#44; unlike ballroom&#44; it allows dancers to open and separate while dancing.";
		$american_smooth->save();
		
		$american_style = new Word;
		$american_style->dance_term = "American Style";
		$american_style->abbreviation = "";
		$american_style->definition = "A style of ballroom dancing developed in the United States that contrasts with International (or English) Style. It consists of two categories: American Smooth and American Rhythm.";
		$american_style->save();
		
		$tango_american = new Word;
		$tango_american->dance_term = "American Tango";
		$tango_american->abbreviation = "AT";
		$tango_american->definition = "One of the Smooth Rhythms";
		$tango_american->save();
		
		$and = new Word;
		$and->dance_term = "And";
		$and->abbreviation = "&";
		$and->definition = "In the timing of dance steps and actions&#44; an &ldquo;&&rdquo; represents half a beat. A cha measure might be danced 1&#44; 2&#44; 3/&&#44; 4; a step on an &ldquo;&&rdquo; count is very quick.";
		$and->save();
		
		$animal_dances = new Word;
		$animal_dances->dance_term = "Animal Dances";
		$animal_dances->abbreviation = "";
		$animal_dances->definition = "Bunny Hop (1953)<br>Bunny Hug (1911)<br>Chicken Scratch (1912)<br>Fish (1961)<br>Fox Trot (1913)<br>Grizzly Bear (1912)<br>Turkey Trot (1912)";
		$animal_dances->save();
		
		$apart = new Word;
		$apart->dance_term = "Apart";
		$apart->abbreviation = "apt";
		$apart->definition = "Step away from partner and shift weight to that foot without progression. (See Away)";
		$apart->save();
		
		$arch = new Word;
		$arch->dance_term = "Arch";
		$arch->abbreviation = "";
		$arch->definition = "A hand movement in which the man&rsquo;s (leader&rsquo;s) and woman&rsquo;s (follower&rsquo;s) designated hands are joined higher than the head in preparation for one or both partners to pass under the joined hands.";
		$arch->save();
		
		$tango_argentine = new Word;
		$tango_argentine->dance_term = "Argentine Tango";
		$tango_argentine->abbreviation = "AT";
		$tango_argentine->definition = "One of the Latin Rhythms";
		$tango_argentine->save();
				
		$around = new Word;
		$around->dance_term = "Around";
		$around->abbreviation = "arnd";
		$around->definition = "To continue a circular pattern in the direction of movement to a specified ending position and facing direction.";
		$around->save();
		
		$around_the_world = new Word;
		$around_the_world->dance_term = "Around the World";
		$around_the_world->abbreviation = "arnd …";
		$around_the_world->definition = "Lean outside your base of support and rotate the upper body in a broader arc than in a body roll.";
		$around_the_world->save();
		
		$away = new Word;
		$away->dance_term = "Away";
		$away->abbreviation = "awy";
		$away->definition = "An individual movement turning from the partner with some progression. (see Apart)";
		$away->save();
		
		$back = new Word;
		$back->dance_term = "Back ";
		$back->abbreviation = "bk";
		$back->definition = "(backward) Step in the direction opposite to that in which you are facing and shift weight to that foot. (In a facing position&#44; the woman (follower) would step forward.)";
		$back->save();
		
		$backward = new Word;
		$backward->dance_term = "Backward";
		$backward->abbreviation = "bkwd";
		$backward->definition = "(Back) Step in the direction opposite to that in which you are facing and shift weight to that foot. (In a facing position&#44; the woman (follower) would step forward.)";
		$backward->save();
		
		$ball = new Word;
		$ball->dance_term = "Ball";
		$ball->abbreviation = "B";
		$ball->definition = "The part of the foot just behind the toes. When dancing &ldquo;up&rdquo; one would step&#44; &ldquo;ball-flat.";
		$ball->save();
		
		$ball_change = new Word;
		$ball_change->dance_term = "Ball Change";
		$ball_change->abbreviation = "B chg";
		$ball_change->definition = "Quickly step on ball of free foot and close again on newly free foot; two changes of weight in one beat of music.";
		$ball_change->save();
		
		$balance = new Word;
		$balance->dance_term = "Balance";
		$balance->abbreviation = "bal";
		$balance->definition = "The correct distribution of the weight of the body when dancing. Standing or moving so that the body is carried in the most economical and graceful manner. (Also a figure used in various rhythms.)";
		$balance->save();
		
		$ballroom = new Word;
		$ballroom->dance_term = "Ballroom";
		$ballroom->abbreviation = "";
		$ballroom->definition = "Sometimes called Standard&#44; a category of International Style dances in ballroom competitions. It includes waltz&#44; tango&#44; foxtrot&#44; quickstep&#44; and Viennese waltz. This category loosely corresponds to the Smooth category of American Style&#44; although in Ballroom&#44; dancers are always in closed position.";
		$ballroom->save();
		
		$bandoneon = new Word;
		$bandoneon->dance_term = "Bandoneon";
		$bandoneon->abbreviation = "";
		$bandoneon->definition = "The Argentine accordion that accompanies many Argentine Tangos.";
		$bandoneon->save();
		
		$banjo_position = new Word;
		$banjo_position->dance_term = "Banjo Position";
		$banjo_position->abbreviation = "BJO";
		$banjo_position->definition = "Banjo is a closed position with the upper body turned just a bit to the right. You can think of turning so that your belly button no longer points in the direction you are going, but your left shoulder or left side leads your progression.  Or you can think of &ldquo;swinging&rdquo; or &ldquo;slicing&rdquo; the left shoulder forward (woman (follower&rsquo;s) right shoulder back).  Having made this upper body turn, your hips are still together, and your shoulders are still parallel with those of your partner, but when the man (leader) steps forward with his (the leader&rsquo;s) right foot, he can slide his (the leader&rsquo;s) foot to his (the leader&rsquo;s) left of her (the follower&rsquo;s) right foot.  He (the leader) steps not between her (the follower&rsquo;s) feet but outside.  Similarly, if he (the leader) stepped back with his (the leader&rsquo;s) left, she (the follower) would step forward with her (the follower&rsquo;s) right, to the outside of his (the leader&rsquo;s) right foot.  Any body turn that causes the opposite side to lead as a step is taken (e.g. left side lead as right foot steps forward) is called Contra Body Movement (CBM), and the position therefore is often called Contra Banjo.";
		$banjo_position->save();
		
		$bar = new Word;
		$bar->dance_term = "Bar";
		$bar->abbreviation = "meas";
		$bar->definition = "(or Measure) A short section of music in the regularly recurring rhythm&#44; usually marked by an initial stronger accent and then one&#44; two&#44; three&#44; or more lesser accents. For instance&#44; a waltz measure consists of one strong downbeat and two lesser beats: 1&#44; 2&#44; 3; 1&#44; 2&#44; 3;";
		$bar->save();
		
		$measure = new Word;
		$measure->dance_term = "Measure";
		$measure->abbreviation = "meas";
		$measure->definition = "(or Bar) A short section of music in the regularly recurring rhythm&#44; usually marked by an initial stronger accent and then one&#44; two&#44; three&#44; or more lesser accents. For instance&#44; a waltz measure consists of one strong downbeat and two lesser beats: 1&#44; 2&#44; 3; 1&#44; 2&#44; 3;";
		$measure->save();
		
		$beat = new Word;
		$beat->dance_term = "Beat";
		$beat->abbreviation = "bt";
		$beat->definition = "A beat or count is one unit or accent in the recurring rhythm of a piece of music. In most dance music&#44; you can count four instances of emphasis per measure. Waltz beats recur in groups of three.";
		$beat->save();
		
		$behind = new Word;
		$behind->dance_term = "Behind";
		$behind->abbreviation = "bhd";
		$behind->definition = "One foot or person crossing or standing in back of the other.";
		$behind->save();
		
		$blend = new Word;
		$blend->dance_term = "Blend";
		$blend->abbreviation = "blnd";
		$blend->definition = "Gently adjusting to a new dance position. For instance&#44; the cue might be &ldquo;back half box blending to sidecar.&rdquo; You would dance the half box in closed position and slightly adjust so that you end the figure in sidecar position.";
		$blend->save();
		
		$blending = new Word;
		$blending->dance_term = "Blending";
		$blending->abbreviation = "blndg";
		$blending->definition = "Gently adjusting to a new dance position. For instance&#44; the cue might be &ldquo;back half box blending to sidecar.&rdquo; You would dance the half box in closed position and slightly adjust so that you end the figure in sidecar position.";
		$blending->save();
		
		$blow_a_kiss = new Word;
		$blow_a_kiss->dance_term = "Blow a Kiss";
		$blow_a_kiss->abbreviation = "";
		$blow_a_kiss->definition = "Press the finger-tips to your lips&#44; and then move your hand toward your partner&#44; extending the fingers&#44; as if wafting the kiss toward them. An alternative acknowledgement at the end of a dance; from open position&#44; you might step side&#44; -&#44; and blow a kiss&#44; -;";
		$blow_a_kiss->save();
		
		$body_ripple = new Word;
		$body_ripple->dance_term = "Body Ripple";
		$body_ripple->abbreviation = "bdy ripple";
		$body_ripple->definition = "(also body wave) Lower your body by flexing your knees. This of course moves your knees forward. Next&#44; move your knees back&#44; and move your hips forward; bring your hips back&#44; and move your torso forward. Finally&#44; move the torso back&#44; and move your head forward slightly. This is kind of a tough one&#44; but it can look like a smooth ripple starting low at your feet and moving steadily up your body. I remember one teacher focusing on the middle part of the ripple and saying that you should pretend that you have backed up with your hips against the edge of a low shelf. Now&#44; raise your hips up as if you were trying to put them on the shelf&#44; and then slide them back off again. Another of our teachers suggested that the upper part of the ripple might look like you are spitting watermelon seeds. You lower&#44; rear back with your head&#44; and then throw your head forward&#44; as you try for good distance. But the head movement is very small&#44; and don&rsquo;t get carried away and make the spitting sound. Over one measure of music (1&#44;2&#44;3&#44;4;) you might gracefully present knees&#44; hips&#44; torso&#44; head; and then step into the next measure.";
		$body_ripple->save();
		
		$body_wave = new Word;
		$body_wave->dance_term = "Body Wave";
		$body_wave->abbreviation = "bdy wave";
		$body_wave->definition = "(also body ripple) Lower your body by flexing your knees. This of course moves your knees forward. Next&#44; move your knees back&#44; and move your hips forward; bring your hips back&#44; and move your torso forward. Finally&#44; move the torso back&#44; and move your head forward slightly. This is kind of a tough one&#44; but it can look like a smooth ripple starting low at your feet and moving steadily up your body. I remember one teacher focusing on the middle part of the ripple and saying that you should pretend that you have backed up with your hips against the edge of a low shelf. Now&#44; raise your hips up as if you were trying to put them on the shelf&#44; and then slide them back off again. Another of our teachers suggested that the upper part of the ripple might look like you are spitting watermelon seeds. You lower&#44; rear back with your head&#44; and then throw your head forward&#44; as you try for good distance. But the head movement is very small&#44; and don&rsquo;t get carried away and make the spitting sound. Over one measure of music (1&#44;2&#44;3&#44;4;) you might gracefully present knees&#44; hips&#44; torso&#44; head; and then step into the next measure.";
		$body_wave->save();
		
		$body_roll = new Word;
		$body_roll->dance_term = "Body Roll";
		$body_roll->abbreviation = "bdy roll";
		$body_roll->definition = "Lean outside your base of support and rotate the upper body in a broad arc.";
		$body_roll->save();
		
		$bolero = new Word;
		$bolero->dance_term = "Bolero";
		$bolero->abbreviation = "BL";
		$bolero->definition = "One of the five competition dances in American Rhythm; also considered Latin in round dancing. The first step is typically taken on the first beat and held during the second beat&#44; with two more steps falling on beats three and four. This dance is quite different from the other American Rhythm dances in that it requires not only Cuban motion but also rise and fall and contra-body movement&#44; more typically found in dances such as waltz. &mdash; For more&#44; see the navigation bar at the upper left of each page.";
		$bolero->save();
		
		$bolero_banjo_position = new Word;
		$bolero_banjo_position->dance_term = "Bolero Banjo Position";
		$bolero_banjo_position->abbreviation = "";
		$bolero_banjo_position->definition = "One of many possible dance positions.";
		$bolero_banjo_position->save();
		
		$bolero_position = new Word;
		$bolero_position->dance_term = "Bolero Position";
		$bolero_position->abbreviation = "";
		$bolero_position->definition = "One of many possible dance positions.";
		$bolero_position->save();
		
		$bolero_sidecar_position = new Word;
		$bolero_sidecar_position->dance_term = "Bolero Sidecar Position";
		$bolero_sidecar_position->abbreviation = "";
		$bolero_sidecar_position->definition = "One of many possible dance positions.";
		$bolero_sidecar_position->save();
		
		$bounce = new Word;
		$bounce->dance_term = "Bounce";
		$bounce->abbreviation = "";
		$bounce->definition = "A quick rising and falling movement&#44; usually on the beat or to a syncopated rhythm.";
		$bounce->save();
		
		$bow = new Word;
		$bow->dance_term = "Bow";
		$bow->abbreviation = "";
		$bow->definition = "The man (leader) stands with his (the leader&rsquo;) feet together&#44; toes slightly apart (1st position)&#44; hands at his (the leader&rsquo;) sides&#44; and inclines his (the leader&rsquo;) body gently toward the woman (follower). For a more polished bow&#44; step to the side with the left foot&#44; close right to left with right heel to left instep (3rd position)&#44; and draw the right arm across the body at waist level as you incline forward. Yet another style is to cross the left arm in front at the waist and the right arm in back.";
		$bow->save();
		
		$break = new Word;
		$break->dance_term = "Break";
		$break->abbreviation = "brk";
		$break->definition = "Release your position or hand hold.";
		$break->save();
		
		$bridge = new Word;
		$bridge->dance_term = "Bridge";
		$bridge->abbreviation = "brg";
		$bridge->definition = "A part of the dance routine&#44; not more than two measures&#44; connecting major parts of the dance.";
		$bridge->save();
		
		$broken_sway = new Word;
		$broken_sway->dance_term = "Broken Sway";
		$broken_sway->abbreviation = "brkn sway";
		$broken_sway->definition = "Lean or tilt the body from the waist upward.";
		$broken_sway->save();
		
		$brush = new Word;
		$brush->dance_term = "Brush";
		$brush->abbreviation = "";
		$brush->definition = "Touch the ball of the free foot to the floor and move it short distance toward supporting foot or move it against the supporting foot; no weight change. You may brush forward or back. You are stroking the free foot against the floor but also against the supporting foot.";
		$brush->save();
		
		$bump = new Word;
		$bump->dance_term = "Bump";
		$bump->abbreviation = "";
		$bump->definition = "Standing side by side&#44; roll your hips toward your partner and gently touch hip to hip. If you want to carefully preserve your balance&#44; you may come close but not actually touch.";
		$bump->save();
		
		$butterfly_position = new Word;
		$butterfly_position->dance_term = "Butterfly Position";
		$butterfly_position->abbreviation = "BFLY";
		$butterfly_position->definition = "One of many possible dance positions. See Dance Position and Connection Between Partners.";
		$butterfly_position->save();
		
		$buzz = new Word;
		$buzz->dance_term = "Buzz";
		$buzz->abbreviation = "";
		$buzz->definition = "Rotate on the ball of the supporting foot by pushing with the free foot. There is no weight change unless separately cued. May be done solo or as a couple.";
		$buzz->save();
		
		$canter = new Word;
		$canter->dance_term = "Canter";
		$canter->abbreviation = "";
		$canter->definition = "Particularly in waltz&#44; taking two steps in a three-beat measure&#44; usually step&#44; hold&#44; step.";
		$canter->save();
		
		$center = new Word;
		$center->dance_term = "Center";
		$center->abbreviation = "COH";
		$center->definition = "The direction to the left&#44; as one faces line of dance; toward the center of the room.";
		$center->save();
		
		$cha_cha = new Word;
		$cha_cha->dance_term = "Cha Cha";
		$cha_cha->abbreviation = "CH";
		$cha_cha->definition = "One of the five dances in both American Rhythm and Latin competitions. It is danced to the music of the same name introduced by Cuban composer and violinist Enrique Jorrin in 1953. This rhythm was developed from syncopation of the fourth beat: 234&1. In round dancing&#44; we dance 123&4. &mdash; For more&#44; see the navigation bar at the upper left of each page.";
		$cha_cha->save();
		
		$chaine_turn = new Word;
		$chaine_turn->dance_term = "Ch&acirc;in&eacute; Turn ";
		$chaine_turn->abbreviation = "";
		$chaine_turn->definition = "(pronounced shin-ay) Ch&acirc;in&eacute; turns are sharp&#44; repeated half turns taken on alternating steps and so progressing across the floor&#44; all turns to the left or all to the right&#44; and so describing something like the links of a chain. The basic movement in ballet is done en pointe and with alternating forward and closing steps. Of course&#44; round dancers will not be en pointe&#44; but we certainly should make use of foot rise so our turns can occur comfortably on the balls of the feet. The chaine turn is something like a riff turn in bolero&#44; sometimes like a quick&#44; underturned spiral turn&#44; and so is sharp and with less progression than a turn or roll that is spread more evenly over the three steps of a measure.Other combinations of forward and closing steps can also be used (e.g. close&#44; close&#44; forward).";
		$chaine_turn->save();
		
		$chair = new Word;
		$chair->dance_term = "Chair";
		$chair->abbreviation = "chr";
		$chair->definition = "A step in which you check your motion and lower into the supporting knee such that the thigh is close to horizontal.";
		$chair->save();
		
		$challenge_line = new Word;
		$challenge_line->dance_term = "Challenge Line";
		$challenge_line->abbreviation = "chal ln";
		$challenge_line->definition = "In Promenade position (semi-closed)&#44; step side and forward on the lead foot&#44; stretch trail side of body forcefully and so rise and sway toward supported foot&#44; lead arms up&#44; looking out. An aggressive Promenade Sway.";
		$challenge_line->save();
		
		$change_feet = new Word;
		$change_feet->dance_term = "Change Feet";
		$change_feet->abbreviation = "";
		$change_feet->definition = "The act of transferring weight from one foot to the other.";
		$change_feet->save();
		
		$change_weight = new Word;
		$change_weight->dance_term = "Change of Weight";
		$change_weight->abbreviation = "chg of wgt";
		$change_weight->definition = "Transfer body weight from one foot to the other. A &ldquo;touch&rdquo; is an action with one foot that does not involve a change of weight.";
		$change_weight->save();
		
		$change_point = new Word;
		$change_point->dance_term = "Change Point";
		$change_point->abbreviation = "chg pt";
		$change_point->definition = "Quickly close free foot and pont new free foot to side. Done as one movement in one beat of music.";
		$change_point->save();
		
		$change_sides = new Word;
		$change_sides->dance_term = "Change Sides";
		$change_sides->abbreviation = "chg sides";
		$change_sides->definition = "Partners exchange places to a desiganted position. Sometimes the change is quite precise&#44; putting each dancer exactly where the partner used to be. Sometimes progression is involved and dancers move from the inside of the circle to the outside and visa versa&#44; but this change could occur along the line of dance or along a diagonal. Sometimes&#44; the woman (follower) turns under joined hands during the change.";
		$change_sides->save();
		
		$change_sway = new Word;
		$change_sway->dance_term = "Change Sway";
		$change_sway->abbreviation = "chg sway";
		$change_sway->definition = "From any swayed position&#44; stretch the opposite side of the body&#44; tilt in the other direction&#44; change head position (look the other way)&#44; and usually rotate the body.";
		$change_sway->save();
		
		$chase = new Word;
		$chase->dance_term = "Chase";
		$chase->abbreviation = "chs";
		$chase->definition = "One partner pursues the other.";
		$chase->save();
		
		$chasse = new Word;
		$chasse->dance_term = "Chasse";
		$chasse->abbreviation = "";
		$chasse->definition = "(shah-say) Used in several different rhythms&#44; the chasse consists of three steps&#44; usually in two beats of music: side/close&#44; side. One foot &ldquo;chases&rdquo; the other. Often&#44; the chasse will be used as the last part of a full-measure figure consisting of one step and then the chasse. In foxtrot&#44; the timing would be&#44; slow&#44; -&#44; quick/&&#44; quick; In waltz&#44; the timing would be&#44; 1&#44; 2/&&#44; 3; In quickstep&#44; the Progressive Chasse is timed&#44; slow&#44; -&#44; quick&#44; quick; slow&#44; -&#44; over 1 1/2 measures. In paso doble&#44; the typical marching tempo renders the chasse as&#44; side&#44; close&#44; side&#44; close; or step in place&#44; side&#44; close&#44; side; More broadly&#44; a chasse is any step-close-step (not only to the side and facing partner). We sometimes speak of a forward chasse: fwd/cl&#44; fwd; or a back chasse: bk/cl&#44; bk. In cha&#44; we speak of the ronde chasse&#44; the hip-twist chasse&#44; and others.";
		$chasse->save();
		
		$check = new Word;
		$check->dance_term = "Check";
		$check->abbreviation = "ck";
		$check->definition = "A step in which you stop and prepare to change direction.";
		$check->save();
		
		$checking = new Word;
		$checking->dance_term = "Checking";
		$checking->abbreviation = "ckg";
		$checking->definition = "The process of stopping and getting ready to change direction; no additional step.";
		$checking->save();
		
		$choreographer = new Word;
		$choreographer->dance_term = "Choreographer";
		$choreographer->abbreviation = "";
		$choreographer->definition = "One who creates and arranges dance routines.";
		$choreographer->save();
		
		$choreography = new Word;
		$choreography->dance_term = "Choreography";
		$choreography->abbreviation = "";
		$choreography->definition = "The arrangement of steps&#44; figures&#44; and patterns into a routine to match the phrasing of a piece of music.";
		$choreography->save();
		
		$chug = new Word;
		$chug->dance_term = "Chug";
		$chug->abbreviation = "";
		$chug->definition = "With weight on both feet&#44; bend the knees and then straighten sharply&#44; causing the feet to slide back.";
		$chug->save();
		
		$circle = new Word;
		$circle->dance_term = "Circle";
		$circle->abbreviation = "circ";
		$circle->definition = "Move forward&#44; turning&#44; as on the circumference of a circle.";
		$circle->save();
		
		$clap = new Word;
		$clap->dance_term = "Clap";
		$clap->abbreviation = "";
		$clap->definition = "Bring the palms of your hands together to make a sharp sound. One might clap on certain beats of the music to mark time.";
		$clap->save();
		
		$clockwise = new Word;
		$clockwise->dance_term = "Clockwise";
		$clockwise->abbreviation = "CW";
		$clockwise->definition = "Turning to the right";
		$clockwise->save();
		
		$close = new Word;
		$close->dance_term = "Close";
		$close->abbreviation = "cl";
		$close->definition = "Bring the free foot to the supporting foot&#44; and step or take weight.";
		$close->save();
		
		$closed_head = new Word;
		$closed_head->dance_term = "Closed Head";
		$closed_head->abbreviation = "";
		$closed_head->definition = "Woman (follower) looks left over the man&rsquo;s (leader&rsquo;s) right shoulder. The man (leader) leads her (the follower) to &ldquo;close her (their) head&rdquo; with a little right sway.";
		$closed_head->save();
		
		$closed_position = new Word;
		$closed_position->dance_term = "Closed Position";
		$closed_position->abbreviation = "CP";
		$closed_position->definition = "One of many possible dance positions. See Dance Position and Connection Between Partners.";
		$closed_position->save();
		$closed_position->save();
		
		$closed_turn = new Word;
		$closed_turn->dance_term = "Closed Turn";
		$closed_turn->abbreviation = "cl trn";
		$closed_turn->definition = "A turn in which the second or third step is a closing step. Contributes to body &ldquo;fall;&rdquo; typical of waltz.";
		$closed_turn->save();
		
		$comma = new Word;
		$comma->dance_term = "Comma";
		$comma->abbreviation = "&#44;";
		$comma->definition = "In abbreviated descriptions of dance steps (as opposed to complete sentences)&#44; a comma indicates the end of one beat of music. For instance&#44; &ldquo;fwd&#44; fwd&#44; cl;&rdquo; represents three dance steps on three beats of music&#44; perhaps a waltz measure: step forward on the left foot&#44; forward right&#44; and then close left to right &mdash; a forward waltz.";
		$comma->save();
		
		$commence = new Word;
		$commence->dance_term = "Commence";
		$commence->abbreviation = "comm";
		$commence->definition = "To start or begin. Used when a turn or action is begun on one beat of music and completed during another beat.";
		$commence->save();
		
		$complete = new Word;
		$complete->dance_term = "Complete";
		$complete->abbreviation = "comp";
		$complete->definition = "To finish or end. Used when a turn or action is begun on one beat of music and finished during another beat.";
		$complete->save();
		
		$continue = new Word;
		$continue->dance_term = "Continue";
		$continue->abbreviation = "cont";
		$continue->definition = "To proceed or to keep going. Used when a turn or action is begun on one beat of music&#44; continues through at least one additional beat&#44; and ends during yet another beat.";
		$continue->save();
		
		$continuous = new Word;
		$continuous->dance_term = "Continuous";
		$continuous->abbreviation = "";
		$continuous->definition = "An adjective that usually means that steps have been added to the figure being defined and/or the figure is to be executed more quickly. A Continuous Hover Cross is a foxtrot figure that has two extra quicks in the middle of a normal Hover Cross&#44; making the figure 2 1/2 measures&#44; instead of two. In La Pura&#44; the Gosses used Countinuous Double Cubans&#44; which used the same two measures as a normal&#44; cha&#44; Double Cubans&#44; but it had one additional step in the middle (the last & in the first measure): 1&2&3&4&; 1&2&3&4; In Bailamos&#44; the DeFores used &ldquo;Continuous Doors&#44;&rdquo; which also take the normal two measures&#44; but instead of the two-step timeing of qqs; qqs; they used merengue timeing of qqqq; qqqq; (rk sd L&#44; rec R&#44; XLIF (W XRIF)&#44; rk sd R; rec L&#44; XRIF (W XLIF)&#44; sd L&#44; cls R;)";
		$continuous->save();
		
		$contra_banjo_position = new Word;
		$contra_banjo_position->dance_term = "Contra Banjo Position";
		$contra_banjo_position->abbreviation = "CBJO";
		$contra_banjo_position->definition = "Any body turn that causes the opposite side to lead as a step is taken (e.g. left side lead as right foot steps forward) is called Contra Body Movement (CBM), and the position therefore is often called Contra Banjo. Banjo is a closed position with the upper body turned just a bit to the right. You can think of turning so that your belly button no longer points in the direction you are going, but your left shoulder or left side leads your progression.  Or you can think of &ldquo;swinging&rdquo; or &ldquo;slicing&rdquo; the left shoulder forward (woman (follower&rsquo;s) right shoulder back).  Having made this upper body turn, your hips are still together, and your shoulders are still parallel with those of your partner, but when the man (leader) steps forward with his (the leader&rsquo;s) right foot, he can slide his (the leader&rsquo;s) foot to his (the leader&rsquo;s) left of her (the follower&rsquo;s) right foot.  He (the leader) steps not between her (the follower&rsquo;s) feet but outside.  Similarly, if he (the leader) stepped back with his (the leader&rsquo;s) left, she (the follower) would step forward with her (the follower&rsquo;s) right, to the outside of his (the leader&rsquo;s) right foot.";
		$contra_banjo_position->save();
		
		$contra_sidecar_position = new Word;
		$contra_sidecar_position->dance_term = "Contra Sidecar Position";
		$contra_sidecar_position->abbreviation = "CSCAR";
		$contra_sidecar_position->definition = "One of many possible dance positions. See Dance Position and Connection Between Partners.";
		$contra_sidecar_position->save();
		
		$contrary_body_movement = new Word;
		$contrary_body_movement->dance_term = "Contrary Body Movement";
		$contrary_body_movement->abbreviation = "CBM";
		$contrary_body_movement->definition = "(or Contra) Turning the body toward the moving foot. Think also of shoulder or hip leading&#44; but the whole body turns. When you step forward right&#44; turn right with left shoulder leading. When you step back right&#44; turn left with left shoulder back. CBM puts a twist in your body. It facilitates smooth turning movements. It also creates graceful body lines. Use CBM during a Natural Turn (compare CBMP below).";
		$contrary_body_movement->save();
		
		$contra_body_movement_position = new Word;
		$contra_body_movement_position->dance_term = "Contra Body Movement Position";
		$contra_body_movement_position->abbreviation = "CBMP";
		$contra_body_movement_position->definition = "(or Contrary) The static position in which one foot is forward or back and the opposite side of the body is turned in that direction. It is the position achieved when the moving foot is placed on or across the line occupied by the supporting foot. It is the position your body is in at the end of Contra Body Movement. Use CBMP during a Contra Check&mdash;you are not turning as a couple but are using M&rsquo;s right-side lead to create the contra body position. A thru step in SCP puts you in CBMP. There is no turn. We don&rsquo;t even use body rotation to achieve this position. The M&rsquo;s L shoulder is already leading in SCP&#44; so when we bring the R foot thru (W&rsquo;s R shoulder and L foot thru)&#44; that action alone gives us the CBMP body twist. The 3rd step of a Feather Finish to BJO and the 4th step of a Natural Hover Cross to SCAR also produce CBMP.";
		$contra_body_movement_position->save();
		
		$contra_body_movement = new Word;
		$contra_body_movement->dance_term = "Contra Body Movement";
		$contra_body_movement->abbreviation = "CBM";
		$contra_body_movement->definition = "(or Contrary) Turning the body toward the moving foot. Think also of shoulder or hip leading&#44; but the whole body turns. When you step forward right&#44; turn right with left shoulder leading. When you step back right&#44; turn left with left shoulder back. CBM puts a twist in your body. It facilitates smooth turning movements. It also creates graceful body lines. Use CBM during a Natural Turn (compare CBMP below).";
		$contra_body_movement->save();
		
		$contrary_body_movement_position = new Word;
		$contrary_body_movement_position->dance_term = "Contrary or Contra Body Movement Position";
		$contrary_body_movement_position->abbreviation = "CBMP";
		$contrary_body_movement_position->definition = "(or Contra) The static position in which one foot is forward or back and the opposite side of the body is turned in that direction. It is the position achieved when the moving foot is placed on or across the line occupied by the supporting foot. It is the position your body is in at the end of Contra Body Movement. Use CBMP during a Contra Check&mdash;you are not turning as a couple but are using M&rsquo;s right-side lead to create the contra body position. A thru step in SCP puts you in CBMP. There is no turn. We don&rsquo;t even use body rotation to achieve this position. The M&rsquo;s L shoulder is already leading in SCP&#44; so when we bring the R foot thru (W&rsquo;s R shoulder and L foot thru)&#44; that action alone gives us the CBMP body twist. The 3rd step of a Feather Finish to BJO and the 4th step of a Natural Hover Cross to SCAR also produce CBMP.";
		$contrary_body_movement_position->save();
		
		$core = new Word;
		$core->dance_term = "Core";
		$core->abbreviation = "";
		$core->definition = "Sometimes called &ldquo;center.&rdquo; The group of muscles in the center of the body&#44; encompassing the abdomen&#44; lower and upper back&#44; hips&#44; buttocks&#44; and inner thighs. In all dance movements&#44; the core must be engaged. Beginning dancers often have a hard time finding the core in their bodies and engaging it.";
		$core->save();
		
		$corte = new Word;
		$corte->dance_term = "Corte";
		$corte->abbreviation = "";
		$corte->definition = "In closed position&#44; the man (leader) steps back and to the side&#44; lowering into that knee and swaying to the right (&ldquo;dip&rdquo;). Leave the free leg extended.";
		$corte->save();
		
		$count = new Word;
		$count->dance_term = "Count";
		$count->abbreviation = "ct";
		$count->definition = "A count or beat is one unit or accent in the recurring rhythm of a piece of music. In most dance music&#44; you can count four instances of emphasis per measure. Waltz beats recur in groups of three. Also&#44; the beats per measure.";
		$count->save();
		
		$counter_clockwise = new Word;
		$counter_clockwise->dance_term = "Counter Clockwise";
		$counter_clockwise->abbreviation = "CCW";
		$counter_clockwise->definition = "Turning to the left";
		$counter_clockwise->save();
		
		$counter_promenade_position = new Word;
		$counter_promenade_position->dance_term = "Counter Promenade Position";
		$counter_promenade_position->abbreviation = "CPP";
		$counter_promenade_position->definition = "(Reverse Semi-Closed Position) One of many possible dance positions. See Dance Position and Connection Between Partners.";
		$counter_promenade_position->save();
		
		$counterpart = new Word;
		$counterpart->dance_term = "Counterpart";
		$counterpart->abbreviation = "";
		$counterpart->definition = "Refers to the woman&rsquo;s (follower&rsquo;s) part. Depending upon the dance position and footwork specified&#44; the woman (follower) uses the same or opposite foot as the man (leader) and moves in the same or opposite direction.";
		$counterpart->save();
		
		$couple = new Word;
		$couple->dance_term = "Couple";
		$couple->abbreviation = "";
		$couple->definition = "Two dancers who are partners in a round dance.";
		$couple->save();
		
		$cross = new Word;
		$cross->dance_term = "Cross";
		$cross->abbreviation = "crs";
		$cross->definition = "Step in front or behind the supporting foot and beyond the supporting foot such that the thighs cross; take weight.";
		$cross->save();
		
		$cross_back = new Word;
		$cross_back->dance_term = "Cross in Back";
		$cross_back->abbreviation = "XIB";
		$cross_back->definition = "Step in back of supporting foot and take weight.";
		$cross_back->save();
		
		$cross_front = new Word;
		$cross_front->dance_term = "Cross in Front";
		$cross_front->abbreviation = "XIF";
		$cross_front->definition = "Step in front of supporting foot and take weight.";
		$cross_front->save();
		
		$cross_left_back_right = new Word;
		$cross_left_back_right->dance_term = "Cross Left in Back Of Right";
		$cross_left_back_right->abbreviation = "XLIBR";
		$cross_left_back_right->definition = "Step with the left foot in back of the right foot and take weight.";
		$cross_left_back_right->save();
		
		$cross_left_front_right = new Word;
		$cross_left_front_right->dance_term = "Cross Left in Front Of Right";
		$cross_left_front_right->abbreviation = "XLIFR";
		$cross_left_front_right->definition = "Step with the left foot in front of the right foot and take weight.";
		$cross_left_front_right->save();
		
		$cross_right_back_left = new Word;
		$cross_right_back_left->dance_term = "Cross Right in Back Of Left";
		$cross_right_back_left->abbreviation = "XRIBL";
		$cross_right_back_left->definition = "Step with the right foot in back of the left foot and take weight.";
		$cross_right_back_left->save();
		
		$cross_right_front_left = new Word;
		$cross_right_front_left->dance_term = "Cross Right in Front Of Left";
		$cross_right_front_left->abbreviation = "XRIFL";
		$cross_right_front_left->definition = "Step with the right foot in front of the left foot and take weight.";
		$cross_right_front_left->save();
		
		$cross_walk = new Word;
		$cross_walk->dance_term = "Cross Walk";
		$cross_walk->abbreviation = "X wlk";
		$cross_walk->definition = "Step forward and place foot in front of the other&#44; crossing thighs and with a little swagger.";
		$cross_walk->save();
		
		$cuban_action = new Word;
		$cuban_action->dance_term = "Cuban Action";
		$cuban_action->abbreviation = "";
		$cuban_action->definition = "(or Cuban Motion) Move hips side and back as you step. You don&rsquo;t really move the hips. Instead&#44; step&#44; take weight&#44; straighten that leg and flex the now free leg; this foot and knee action is what moves the hips in the direction of the stepping foot.";
		$cuban_action->save();
		
		$cuban_motion = new Word;
		$cuban_motion->dance_term = "Cuban Motion";
		$cuban_motion->abbreviation = "";
		$cuban_motion->definition = "(or Cuban Action) Move hips side and back as you step. You don&rsquo;t really move the hips. Instead&#44; step&#44; take weight&#44; straighten that leg and flex the now free leg; this foot and knee action is what moves the hips in the direction of the stepping foot.";
		$cuban_motion->save();
		
		$cuddle = new Word;
		$cuddle->dance_term = "Cuddle";
		$cuddle->abbreviation = "";
		$cuddle->definition = "A dance position in which partners are facing&#44; the man&rsquo;s (leader&rsquo;s) hands are loosely on the sides of the woman&rsquo;s (follower&rsquo;s) waist or on her lower back&#44; and the woman&rsquo;s (follower&rsquo;s) hands are on the man&rsquo;s (leader&rsquo;s) shoulders&#44; neck&#44; or face.";
		$cuddle->save();
		
		$cue_sheet = new Word;
		$cue_sheet->dance_term = "Cue Sheet";
		$cue_sheet->abbreviation = "";
		$cue_sheet->definition = "The written description or instructions for a round dance routine.";
		$cue_sheet->save();
		
		$cuer = new Word;
		$cuer->dance_term = "Cuer";
		$cuer->abbreviation = "";
		$cuer->definition = "A person who prompts round dancers by naming the steps&#44; figures&#44; and other helpful information&#44; such as facing direction&#44; ending position&#44; and amount of turn&#44; as the dancers dance&#44; and doing so in a timely manner so that the dancer can hear the cue&#44; process the information&#44; and then execute the moves in time to the music. Analagous to the caller of a square dance.";
		$cuer->save();
		
		$cues = new Word;
		$cues->dance_term = "Cues";
		$cues->abbreviation = "";
		$cues->definition = "Abbreviated instructions&#44; written by a choreographer in a cue sheet or spoken by a cuer during the dance to help dancers remember a dance routine. Cues are ordinarily directed to the man&#44; with the woman (follower) doing the &ldquo;natural opposite&#44;&rdquo; if you are in closed or another facing position. Cues can also be directed to both&#44; for instance&#44; if you are in open position&#44; and cues can be directed to each (e.g.&#44; man (leader) chasse woman (follower) roll left to shadow).";
		$cues->save();
		
		$curl = new Word;
		$curl->dance_term = "Curl";
		$curl->abbreviation = "";
		$curl->definition = "Like a relaxed spiral to the left. The woman (follower) will have stepped forward on her (the follower&rsquo;s) right foot&#44; and the curl is a left-face turn 1/2 to 5/8; ends with the legs crossed&#44; left in front of the right and somewhat extended to the front.";
		$curl->save();
		
		$curtsey = new Word;
		$curtsey->dance_term = "Curtsey";
		$curtsey->abbreviation = "";
		$curtsey->definition = "In the Demi-Curtsy&#44; the woman (follower) (usually) places her (the follower&rsquo;s) left toe to the floor&#44; heel slightly raised&#44; behind the right foot&#44; and then relaxes both knees&#44; keeping body and head erect&#44; and perhaps flaring her (the follower&rsquo;s) skirt. In the Deep-Curtsy&#44; she (the follower) steps to the side with the left foot&#44; rondes the right in a little semi-circle and places it behind the left&#44; toes out (4th position)&#44; lowers well into both knees&#44; again with body and head erect&#44; looking at partner. Alternatively&#44; she (the follower) may lower into the right knee and extend the left leg to the front as she (the follower) lowers. The Prostrate Curtsy&#44; in which the woman (follower) lowers fully and places her (the follower&rsquo;s) face downward&#44; close to the floor&#44; has little place in ballroom dancing &mdash; maybe if your man (leader) is royally good. ";
		$curtsey->save();
		
		$curve = new Word;
		$curve->dance_term = "Curve";
		$curve->abbreviation = "crv";
		$curve->definition = "Dance in a small arc but maintain the initial forward or backward direction of dance. You might begin facing diagonal wall and dance forward&#44; curving&#44; to end facing diagonal center.";
		$curve->save();
		
		$cut = new Word;
		$cut->dance_term = "Cut";
		$cut->abbreviation = "";
		$cut->definition = "Cross the free foot around in front of and then back&#44; beyond the supporting foot so tightly that you must move that supporting foot back. A cut is like a lock in front&#44; but normally a cut is done on beat 1 (cut&#44; back) whereas a lock is done on beat 2 (back&#44; lock).";
		$cut->save();
		
		$dash = new Word;
		$dash->dance_term = "Dash";
		$dash->abbreviation = "-";
		$dash->definition = "In abbreviated descriptions of dance steps (as opposed to complete sentences)&#44; a dash usually represents a pause&#44; nothing happening during a beat of music&#44; at least no step. For instance&#44; a rumba half basic is &ldquo;fwd&#44; rec&#44; sd&#44; -;&rdquo; There are four beats in this measure (3 commas and 1 semi-colon) but only three steps. The third step (the side step) occurs over beats 3 and 4.";
		$dash->save();
		
		$hyphen = new Word;
		$hyphen->dance_term = "Hyphen";
		$hyphen->abbreviation = "-";
		$hyphen->definition = "In abbreviated descriptions of dance steps (as opposed to complete sentences)&#44; a hyphen usually represents a pause&#44; nothing happening during a beat of music&#44; at least no step. For instance&#44; a rumba half basic is &ldquo;fwd&#44; rec&#44; sd&#44; -;&rdquo; There are four beats in this measure (3 commas and 1 semi-colon) but only three steps. The third step (the side step) occurs over beats 3 and 4.";
		$hyphen->save();
		
		$develope = new Word;
		$develope->dance_term = "Develope";
		$develope->abbreviation = "";
		$develope->definition = "Bring either foot up the supporting leg to the outside of the supporting knee and then extend that free foot forward. It is a graceful &ldquo;knee&rdquo; and then &ldquo;kick.&rdquo;";
		$develope->save();
		
		$diagonal = new Word;
		$diagonal->dance_term = "Diagonal";
		$diagonal->abbreviation = "diag";
		$diagonal->definition = "A direction between two of the &ldquo;cardinal&rdquo; (line&#44; wall&#44; reverse&#44; center) directions on the dance floor. Dancing on the diagonal often flows more smoothly and looks better than dancing squared up.";
		$diagonal->save();
		
		$diagonal_center = new Word;
		$diagonal_center->dance_term = "Diagonal Center";
		$diagonal_center->abbreviation = "DLC";
		$diagonal_center->definition = "The direction 1/8 to the left&#44; as one faces line of dance; half way between line of dance and center.";
		$diagonal_center->save();
		
		$diagonal_reverse_n_center = new Word;
		$diagonal_reverse_n_center->dance_term = "Diagonal Reverse and Center";
		$diagonal_reverse_n_center->abbreviation = "DRC";
		$diagonal_reverse_n_center->definition = "The direction 1/8 to the right&#44; as one faces reverse line of dance; half way between reverse line of dance and center. &ldquo;On the diagonal&rdquo; means facing or moving along one of these four diagonal directions.";
		$diagonal_reverse_n_center->save();
		
		$diagonal_reverse_n_wall = new Word;
		$diagonal_reverse_n_wall->dance_term = "Diagonal Reverse and Wall";
		$diagonal_reverse_n_wall->abbreviation = "DRW";
		$diagonal_reverse_n_wall->definition = "The direction 1/8 to the left&#44; as one faces reverse line of dance; half way between reverse line of dance and wall.";
		$diagonal_reverse_n_wall->save();
		
		$diagonal_wall = new Word;
		$diagonal_wall->dance_term = "Diagonal Wall";
		$diagonal_wall->abbreviation = "DLW";
		$diagonal_wall->definition = "The direction 1/8 to the right&#44; as one faces line of dance; half way between line of dance and wall.";
		$diagonal_wall->save();
		
		$dig = new Word;
		$dig->dance_term = "Dig";
		$dig->abbreviation = "";
		$dig->definition = "With the free foot raised&#44; toe pointing down&#44; lower the foot to the floor and touch; no weight change. It is as if you are digging your toe into the beach sand.";
		$dig->save();
		
		$dip = new Word;
		$dip->dance_term = "Dip";
		$dip->abbreviation = "";
		$dip->definition = "In closed position&#44; the man (leader) steps back and to the side&#44; lowering into that knee&#44; swaying to the right&#44; and perhaps rotating a little to the left. Leave the free leg extended. This is a Lunge back.";
		$dip->save();
		
		$dishrag = new Word;
		$dishrag->dance_term = "Dishrag";
		$dishrag->abbreviation = "";
		$dishrag->definition = "Join hands&#44; opposite free feet&#44; raise joined hands&#44; and turn under and away.";
		$dishrag->save();
		
		$downbeat = new Word;
		$downbeat->dance_term = "Downbeat";
		$downbeat->abbreviation = "";
		$downbeat->definition = "The principally accented note of a measure of music.";
		$downbeat->save();
		
		$drag = new Word;
		$drag->dance_term = "Drag";
		$drag->abbreviation = "drg";
		$drag->definition = "In a stretched up body position&#44; touch the toe to the floor relatively far from the supporting foot and move it toward that foot; no weight.";
		$drag->save();
		
		$draw = new Word;
		$draw->dance_term = "Draw";
		$draw->abbreviation = "drw";
		$draw->definition = "Touch the toe to the floor relatively far from the supporting foot and move it toward that foot; no weight change. Normally&#44; one will have taken a side step prior to the draw (cued: &ldquo;side&#44; draw&rdquo; or &ldquo;side&#44; draw&#44; touch&rdquo;) but one could hear: &ldquo;point&#44; draw.&rdquo;";
		$draw->save();
		
		$drift_apart = new Word;
		$drift_apart->dance_term = "Drift Apart";
		$drift_apart->abbreviation = "drift apt";
		$drift_apart->definition = "An adjustment from a position close to partner to one where partners still have contact but are more separated&#44; usually";
		$drift_apart->save();
		
		$east_coast_swing = new Word;
		$east_coast_swing->dance_term = "East Coast Swing";
		$east_coast_swing->abbreviation = "";
		$east_coast_swing->definition = "Or simply Swing&#44; a triple Swing danced at a slower tempo than Jive. See Jive.";
		$east_coast_swing->save();
		
		$edge = new Word;
		$edge->dance_term = "Edge";
		$edge->abbreviation = "";
		$edge->definition = "The inner or outer side of the foot. A side step might be taken&#44; &ldquo;edge-flat&#44;&rdquo; especially in a Latin rhythm.";
		$edge->save();
		
		$ee = new Word;
		$ee->dance_term = "Ee";
		$ee->abbreviation = "e";
		$ee->definition = "In the timing of dance steps and actions&#44; an &ldquo;e&rdquo; (like the &ldquo;a&rdquo;) also represents 1/4 beat. It is not much used in round dancing&#44; but I&rsquo;ll include it here just for completeness. Where the &ldquo;a&rdquo; represents the fourth quarter of a beat&#44; the &ldquo;e&rdquo; represents the second quarter. The last two beats of a measure might then be segmented into a 3 - e - & - a&#44; 4 - e - & - a; and then we could talk about stepping on or holding any of these little quarter-beat moments. The timing of one Cha measure is commonly thought of as 123&4. With added precision&#44; we might explain that we dance the cha-cha-cha by stepping on the 3&#44; holding the e&#44; stepping on the &&#44; holding the a&#44; stepping on the 4&#44; and the a of that last beat.";
		$ee->save();
		
		$ending = new Word;
		$ending->dance_term = "Ending";
		$ending->abbreviation = "";
		$ending->definition = "The last steps&#44; figure&#44; or position taken at the end of a dance.";
		$ending->save();
		
		$explode = new Word;
		$explode->dance_term = "Explode";
		$explode->abbreviation = "";
		$explode->definition = "Step sharply away from partner&#44; usually with inside hands held&#44; to end in open or left open position. Arms may be swept up or out.";
		$explode->save();
		
		$extension = new Word;
		$extension->dance_term = "Extension";
		$extension->abbreviation = "";
		$extension->definition = "The exaggeration of any pose or posture&#44; involving lowering&#44; or stretching up&#44; or rotating a little more&#44; leaning back farther&#44; arching a bit more&#44; or extending the arms and fingers. Usually done to develop a particular body line and to use additional time at the end of a picture figure.";
		$extension->save();
		
		$extend = new Word;
		$extend->dance_term = "Extend";
		$extend->abbreviation = "xtnd";
		$extend->definition = "The exaggeration of any pose or posture&#44; involving lowering&#44; or stretching up&#44; or rotating a little more&#44; leaning back farther&#44; arching a bit more&#44; or extending the arms and fingers. Usually done to develop a particular body line and to use additional time at the end of a picture figure.";
		$extend->save();
		
		$face = new Word;
		$face->dance_term = "Face";
		$face->abbreviation = "fc";
		$face->definition = "The direction toward which the front of the body is turned (e.g.&#44; facing LOD). The cue &ldquo;to face&rdquo; means to step and then turn toward partner.";
		$face->save();
		
		$facing = new Word;
		$facing->dance_term = "Facing";
		$facing->abbreviation = "fcg";
		$facing->definition = "To have one&rsquo;s front in the direction of something else&#44; such as &ldquo;man facing wall.&rdquo; Also&#44; partners in front of each other&#44; front to front.";
		$facing->save();
		
		$fallaway = new Word;
		$fallaway->dance_term = "Fallaway";
		$fallaway->abbreviation = "falwy";
		$fallaway->definition = "Step back in semi-closed position. Outside foot moves back in CBMP. Also the name of the resulting dance position: SCP with the body angle a little wider than normal and the weighted foot having stepped back.";
		$fallaway->save();
		
		$fan = new Word;
		$fan->dance_term = "Fan";
		$fan->abbreviation = "";
		$fan->definition = "Flex supporting knee&#44; extend free foot and point toe&#44; and move free foot forward or back in an arc across the floor. Usually&#44; the toe will be brushing the floor. Note that &ldquo;fan&rdquo; is also the name of a dance position and a latin figure (or see index).";
		$fan->save();
		
		$feather = new Word;
		$feather->dance_term = "Feather";
		$feather->abbreviation = "fthr";
		$feather->definition = "A step outside partner while maintaining parallel shoulders&#44; usually with the right foot to a contra banjo&#44; but also with the left foot to a contra sidecar. Usually begun in closed position.";
		$feather->save();
		
		$feather_ending = new Word;
		$feather_ending->dance_term = "Feather Ending";
		$feather_ending->abbreviation = "";
		$feather_ending->definition = "A step outside partner to contra banjo&#44; having begun in semi-closed.";
		$feather_ending->save();
		
		$feather_finish = new Word;
		$feather_finish->dance_term = "Feather Finish";
		$feather_finish->abbreviation = "fthr fin";
		$feather_finish->definition = "Again&#44; a step outside partner to contra banjo&#44; having begun with a back step. For instance&#44; from closed position&#44; diagonal reverse and wall&#44; trail foot free&#44; step back turning LF&#44; side L turning&#44; and forward R to contra banjo diagonal line and wall.";
		$feather_finish->save();
		
		$fifth_foot_position = new Word;
		$fifth_foot_position->dance_term = "Fifth Foot Position";
		$fifth_foot_position->abbreviation = "";
		$fifth_foot_position->definition = "The heel of one foot is placed close to the toe of the other. The turned-out foot positions&#44; first through fifth&#44; go back to old-time dancing and ballet. Today&#44; we step straight forward or back (see &ldquo;parallel foot position&rdquo;).";
		$fifth_foot_position->save();
		
		$fifth_foot_position_rear = new Word;
		$fifth_foot_position_rear->dance_term = "Fifth Foot Position Rear";
		$fifth_foot_position_rear->abbreviation = "";
		$fifth_foot_position_rear->definition = "The toe of one foot is placed close to the heel of the other. The turned-out foot positions&#44; first through fifth&#44; go back to old time dancing and ballet. Today&#44; we step straight forward or back (see &ldquo;parallel foot position&rdquo;).";
		$fifth_foot_position_rear->save();
		
		$figure = new Word;
		$figure->dance_term = "Figure";
		$figure->abbreviation = "";
		$figure->definition = "A specific sequence of steps forming a set that is complete in itself&#44; often standardized and widely accepted and used as one component of a dance routine.";
		$figure->save();
		
		$figure_8 = new Word;
		$figure_8->dance_term = "Figure 8";
		$figure_8->abbreviation = "";
		$figure_8->definition = "Move on the floor in such a way that your path forms the shape of the numeral &ldquo;8.&rdquo; Depending on the momentum generated by the previous figure&#44; you might walk (or two step&#44; or waltz&#44; or cha …) in a small counter-clockwise circle&#44; back to your starting point (the top of the &ldquo;8&rdquo;)&#44; and then a small clockwise circle&#44; and back to the starting point again.";
		$figure_8->save();
		
		$first_foot_position = new Word;
		$first_foot_position->dance_term = "First Foot Position";
		$first_foot_position->abbreviation = "";
		$first_foot_position->definition = "The heels are together and the toes are turned out at the angle of 45 degrees from the direction you are facing. The turned-out foot positions&#44; first through fifth&#44; go back to old time dancing and ballet. Today&#44; we step straight forward or back (see &ldquo;parallel foot position&rdquo;)&#44; or we angle our step in the direction in which we intend to move. However&#44; the old&#44; formal foot positions can still add stability to a position&#44; where a straight foot position might make us feel as though we are &ldquo;balancing on a rail. &rdquo;";
		$first_foot_position->save();
		
		$flare = new Word;
		$flare->dance_term = "Flare";
		$flare->abbreviation = "flr";
		$flare->definition = "Flex supporting knee&#44; extend free foot and point toe&#44; and move free foot forward or back in an arc with the foot slightly off the floor. Compare to fan.";
		$flare->save();
		
		$flat = new Word;
		$flat->dance_term = "Flat";
		$flat->abbreviation = "F";
		$flat->definition = "The entire bottom of the foot. A forward step may be taken&#44; &ldquo;heel-flat.&rdquo; Also a sequence in which there is no rise or fall.";
		$flat->save();
		
		$flick = new Word;
		$flick->dance_term = "Flick";
		$flick->abbreviation = "flk";
		$flick->definition = "Move free foot sharply backward; no weight change. Pretend you have a pebble under your toe and you want to send it flying back. One can also flick across and in front of the supporting foot.";
		$flick->save();
		
		$flight = new Word;
		$flight->dance_term = "Flight";
		$flight->abbreviation = "";
		$flight->definition = "The appearance of smooth&#44; continuous&#44; elevated motion&#44; created by erect carriage and passing steps; prominent in foxtrot. Body flight softens the appearance of rise and fall.";
		$flight->save();
		
		$floor_craft = new Word;
		$floor_craft->dance_term = "Floor Craft";
		$floor_craft->abbreviation = "";
		$floor_craft->definition = "The ability to dance figures and amalgamations without running into other dancers. Don&rsquo;t insist on dancing the figures as you know they should be danced. Instead&#44; be considerate of your partner and other couples. Shorten your steps if you are overtaking others&#44; lengthen them if others are stacking up behind you&#44; and shift to an inner or outer circle as appropriate.";
		$floor_craft->save();
		
		$flourish = new Word;
		$flourish->dance_term = "Flourish";
		$flourish->abbreviation = "";
		$flourish->definition = "Spread the fingers wide and rotate the hand back and forth on the axis of the forearm.";
		$flourish->save();
		
		$follow = new Word;
		$follow->dance_term = "Follow";
		$follow->abbreviation = "";
		$follow->definition = "The act of responding to the leads (physical or visual) of the man (leader) and executing the actions&#44; steps&#44; and/or figures that he (the leader) suggests by his (the leader&rsquo;) lead. This is normally the woman&rsquo;s (follower&rsquo;s) responsibility.";
		$follow->save();
		
		$follower = new Word;
		$follower->dance_term = "Follower";
		$follower->abbreviation = "";
		$follower->definition = "The act of responding to the leads (physical or visual) of the man (leader) and executing the actions&#44; steps&#44; and/or figures that he (the leader) suggests by his (the leader&rsquo;) lead. This is normally the woman&rsquo;s (follower&rsquo;s) responsibility.";
		$follower->save();
		
		$foot_position = new Word;
		$foot_position->dance_term = "Foot Position";
		$foot_position->abbreviation = "";
		$foot_position->definition = "The direction of a step or action in relation to the other foot (e.g.&#44; forward&#44; diagonally forward&#44; side).";
		$foot_position->save();
		
		$footwork = new Word;
		$footwork->dance_term = "Footwork";
		$footwork->abbreviation = "";
		$footwork->definition = "The manner in which the foot contacts the floor (e.g.&#44; heel-toe&#44; toe&#44; toe-heel). The use of the heel&#44; ball&#44; or toes to maintain correct balance and control.";
		$footwork->save();
		
		$forward = new Word;
		$forward->dance_term = "Forward";
		$forward->abbreviation = "fwd";
		$forward->definition = "Step in the direction you are facing and shift weight to that foot. (In a facing position&#44; the woman (follower) would step back.)";
		$forward->save();
		
		$fourth_foot_position = new Word;
		$fourth_foot_position->dance_term = "Fourth Foot Position";
		$fourth_foot_position->abbreviation = "";
		$fourth_foot_position->definition = "Beginning in first position&#44; one foot is moved directly forward. Again&#44; it is the left foot that is placed in front of the right&#44; but fourth position is used to stabilize the third step of a telemark to semi and also in a contra check.";
		$fourth_foot_position->save();
		
		$foxtrot = new Word;
		$foxtrot->dance_term = "Foxtrot";
		$foxtrot->abbreviation = "FT";
		$foxtrot->definition = "One of only two competition dance rhythms invented in the United States. It is danced to 4/4 swing-band music with a SQQ or SSQQ rhythm. It is danced in both American Smooth and in International Ballroom&#44; although the tempo is slower in Ballroom. In round dancing&#44; we use the SQQ timing and slower International tempo. &mdash; For more&#44; see the navigation bar at the upper left of each page.";
		$foxtrot->save();
		
		$frame = new Word;
		$frame->dance_term = "Frame";
		$frame->abbreviation = "";
		$frame->definition = "The position of the upper body&#44; or topline&#44; the head&#44; neck&#44; shoulders&#44; arms&#44; and hands&#44; while in dance position. A good and toned frame&#44; along with proper position of the lower body (hips&#44; legs&#44; and feet) (good posture) is essential for good balance&#44; clear lead and follow&#44; smooth movement &mdash; essential for good dancing.";
		$frame->save();
		
		$free_foot = new Word;
		$free_foot->dance_term = "Free Foot";
		$free_foot->abbreviation = "free ft";
		$free_foot->definition = "The foot that is not supporting the body&rsquo;s weight.";
		$free_foot->save();
		
		$free_hand = new Word;
		$free_hand->dance_term = "Free Hand";
		$free_hand->abbreviation = "free hnd";
		$free_hand->definition = "The hand not in contact with the partner&#44; not resting on hip (man)&#44; not holding skirt (woman)";
		$free_hand->save();
		
		$freeze = new Word;
		$freeze->dance_term = "Freeze";
		$freeze->abbreviation = "";
		$freeze->definition = "Stop moving and hold fixed body and foot position.";
		$freeze->save();
		
		$front = new Word;
		$front->dance_term = "Front";
		$front->abbreviation = "frnt";
		$front->definition = "One foot or person crossing or standing ahead of the other.";
		$front->save();
		
		$glide = new Word;
		$glide->dance_term = "Glide";
		$glide->abbreviation = "";
		$glide->definition = "Move the free foot in a given direction with light contact with the floor and take weight. Same as Slide.";
		$glide->save();
		
		$half_close = new Word;
		$half_close->dance_term = "Half Close";
		$half_close->abbreviation = "";
		$half_close->definition = "In a closing step&#44; the free foot is brought to the supporting foot and weight is completely transferred. In a half closing step&#44; the free foot is brought almost to the supporting foot with partial weight on the ball of the foot resulting in a transfer of some weight to the free foot. Occurs on &ldquo;and&rdquo; and &ldquo;ah&rdquo; counts&#44; as in 3&4 or 1a2.";
		$half_close->save();
		
		$head_cues = new Word;
		$head_cues->dance_term = "Head Cues";
		$head_cues->abbreviation = "";
		$head_cues->definition = "The cue terms that are spoken by the cuer. They are on the cue sheets above the figure descriptions&#44; usually in 4-measure groups and in bold print. In the 3-column table cue-sheet format&#44; they are listed in column 2.";
		$head_cues->save();
		
		$heel = new Word;
		$heel->dance_term = "Heel";
		$heel->abbreviation = "H";
		$heel->definition = "Extend foot forward and touch back of heel to the floor; no weight.";
		$heel->save();
		
		$heel_lead = new Word;
		$heel_lead->dance_term = "Heel Lead";
		$heel_lead->abbreviation = "H ld";
		$heel_lead->definition = "A feature of a forward step in which the heel contacts the floor first&#44; followed by the rest of the foot.";
		$heel_lead->save();
		
		$heel_pivot = new Word;
		$heel_pivot->dance_term = "Heel Pivot";
		$heel_pivot->abbreviation = "H pvt";
		$heel_pivot->definition = "Turn on the heel of the supporting foot; no weight change.";
		$heel_pivot->save();
		
		$heel_pull = new Word;
		$heel_pull->dance_term = "Heel Pull";
		$heel_pull->abbreviation = "";
		$heel_pull->definition = "A type of heel turn in which strong pressure is used&#44; first with the heel and then with the inside edge of the moving foot&#44; knees soft&#44; and ending lowered and with the feet apart; one weight change.";
		$heel_pull->save();
		
		$heel_turn = new Word;
		$heel_turn->dance_term = "Heel Turn";
		$heel_turn->abbreviation = "H trn";
		$heel_turn->definition = "Step back and turn on the heel of that supporting foot&#44; feet together&#44; shift weight to heel of previously free foot&#44; then to toe of that foot; one weight change. The purpose of a heel turn is to change places; afterwards&#44; the man (leader) should be in the woman&rsquo;s (follower&rsquo;s) previous spot and she (the follower) should be in his (the leader&rsquo;). It is important not to change weight early&#44; because your partner will be moving through the unweighted side (as one pushes through a turnstyle) during the turn. If you have taken weight early&#44; your partner won&rsquo;t be able to push through that weighted hip. For instance&#44; the woman (follower) does a heel turn on step 2 of a foxtrot reverse turn. The man (leader) does a heel turn on step 2 of a closed impetus.";
		$heel_turn->save();
		
		$hesitation = new Word;
		$hesitation->dance_term = "Hesitation";
		$hesitation->abbreviation = "hes";
		$hesitation->definition = "Progression is temporarily suspended and the weight retained on one foot for more than one count. Where a freeze is quite still&#44; a hesitation usually involves continued body rotation&#44; slow sway&#44; or a drawing of the free foot&#44; in preparation for the next step. Again&#44; it is &ldquo;progression&rdquo; that is stopped&#44; not all movement.";
		$hesitation->save();
		
		$hip_rock = new Word;
		$hip_rock->dance_term = "Hip Rock";
		$hip_rock->abbreviation = "";
		$hip_rock->definition = "Step to the side and roll hip to the side and back.";
		$hip_rock->save();
		
		$hold = new Word;
		$hold->dance_term = "Hold";
		$hold->abbreviation = "-";
		$hold->definition = "A beat of music during which no step is taken. Also&#44; a dance position&#44; such as closed position.";
		$hold->save();
		
		$hook = new Word;
		$hook->dance_term = "Hook";
		$hook->abbreviation = "hk";
		$hook->definition = "Cross the free foot in front or in back of and near the supporting foot. Usually the hook does not involve a weight change&mdash;one will step during the following action (e.g.&#44; unwind)&#44; but a cue such as &ldquo;forward&#44; side&#44; hook behind&rdquo; might well intend a weight change during the &ldquo;hook. This term can also be used to direct one partner (usually the woman) to wrap one foot or leg behind the foot or leg of her (the follower&rsquo;s) partner.";
		$hook->save();
		
		$hop = new Word;
		$hop->dance_term = "Hop";
		$hop->abbreviation = "";
		$hop->definition = "With a soft knee&#44; straighten leg&#44; rise slightly off the floor&#44; and return to the floor on the same foot; no weight change. Often it is more gentle and elegant to power the hop not with extension of the supporting leg but with a slight lift of the free knee.";
		$hop->save();
		
		$hover_sway = new Word;
		$hover_sway->dance_term = "Hover Sway";
		$hover_sway->abbreviation = "hvr sway";
		$hover_sway->definition = "Lean or tilt the body from the ankle upward in a direction away from the supporting foot. Stretch the supported side of the body.";
		$hover_sway->save();
		
		$hovering_action = new Word;
		$hovering_action->dance_term = "Hovering Action";
		$hovering_action->abbreviation = "hvrg";
		$hovering_action->definition = "Check the moving or the turning of the body and rise a little. The feet remain stationary.";
		$hovering_action->save();
		
		$in = new Word;
		$in->dance_term = "In";
		$in->abbreviation = "";
		$in->definition = "Used to direct a dancer to approach or to face toward partner; also&#44; to refer to the direction toward center of hall.";
		$in->save();
		
		$in_place = new Word;
		$in_place->dance_term = "In Place";
		$in_place->abbreviation = "in pl";
		$in_place->definition = "Shifting weight from one foot to the other without progression in any direction.";
		$in_place->save();
		
		$inside_foot = new Word;
		$inside_foot->dance_term = "Inside Foot";
		$inside_foot->abbreviation = "insd ft";
		$inside_foot->definition = "The foot nearest the partner when not directly facing partner or directly facing away.";
		$inside_foot->save();
		
		$inside_hand = new Word;
		$inside_hand->dance_term = "Inside Hand";
		$inside_hand->abbreviation = "insd hnd";
		$inside_hand->definition = "The hand nearest the partner when not directly facing partner or directly facing away.";
		$inside_hand->save();
		
		$interlude = new Word;
		$interlude->dance_term = "Interlude";
		$interlude->abbreviation = "intld";
		$interlude->definition = "A part of the dance routine more than two measures long connecting major parts of the dance. A &ldquo;bridge&rdquo; is such a connection only one or two measures long.";
		$interlude->save();
		
		$international_style = new Word;
		$international_style->dance_term = "International Style";
		$international_style->abbreviation = "";
		$international_style->definition = "A style of ballroom dance used in competitions throughout the world. It consists of two categories&#44; Ballroom and Latin. The term is used in the United States to distinguish it from the American Style.";
		$international_style->save();
		
		$introduction = new Word;
		$introduction->dance_term = "Introduction";
		$introduction->abbreviation = "intro";
		$introduction->definition = "A short series of steps of figures preceding the main part of a dance routine.";
		$introduction->save();
		
		$jete = new Word;
		$jete->dance_term = "Jete";
		$jete->abbreviation = "";
		$jete->definition = "(jhettay) Lightly spring off one foot and land on the other.";
		$jete->save();
		
		$jive = new Word;
		$jive->dance_term = "Jive";
		$jive->abbreviation = "JV";
		$jive->definition = "One of the five competition Latin Rhythms. In competition&#44; it is danced at a speed of 44 bars per minute&#44; which makes it faster than its American Rhythm counterpart&#44; the Swing. The basic step is a six-beat pattern&#44; comprising eight weight changes: QQQ&QQ&Q. &mdash; For more&#44; see the navigation bar at the upper left of each page.";
		$jive->save();
		
		$jump = new Word;
		$jump->dance_term = "Jump";
		$jump->abbreviation = "";
		$jump->definition = "With a soft knee&#44; straighten leg&#44; rise higher off the floor than in a hop&#44; and return to the floor on the same foot; no weight change.";
		$jump->save();
		
		$kick = new Word;
		$kick->dance_term = "Kick";
		$kick->abbreviation = "kck";
		$kick->definition = "Raise knee straight up and then straighten leg with toe extended; no weight change.";
		$kick->save();
		
		$kick_n_dig = new Word;
		$kick_n_dig->dance_term = "Kick & Dig";
		$kick_n_dig->abbreviation = "";
		$kick_n_dig->definition = "A four-beat action in which you kick with one foot and then dig the toes of the other foot into the floor as you might do into beach sand. In the Easterdays&rsquo; Boogie Blues&#44; you are in left open postion facing line. You kick with the lead foot away from your partner&#44; step forward on that foot turning to face partner&#44; press the toe of the trail foot to the floor and touch free hands&#44; and then step fwd toward line on the trail foot.";
		$kick_n_dig->save();
		
		$knee = new Word;
		$knee->dance_term = "Knee";
		$knee->abbreviation = "";
		$knee->definition = "Raise knee straight up and across supporting leg; no weight change. The free foot points down and lies near the supporting leg&#44; at the calf or knee.";
		$knee->save();
		
		$lady = new Word;
		$lady->dance_term = "Lady";
		$lady->abbreviation = "W";
		$lady->definition = "We cue &ldquo;lady&rdquo; because &ldquo;woman&rdquo; could be heard as &ldquo;man&#44;&rdquo; but we abbreviate it &ldquo;W&rdquo; because &ldquo;L&rdquo; means &ldquo;left.&rdquo; In politically correct environments, you should use &ldquo;follower.&rdquo;";
		$lady->save();
		
		$lady_under = new Word;
		$lady_under->dance_term = "Lady Under";
		$lady_under->abbreviation = "";
		$lady_under->definition = "The woman (follower) moves from a designated position&#44; under joined hands&#44; to a designated position.";
		$lady_under->save();
		
		$latin_cross = new Word;
		$latin_cross->dance_term = "Latin Cross";
		$latin_cross->abbreviation = "Latin X";
		$latin_cross->definition = "Cross one leg in front or behind the other so that the toe of the back leg is turned out&#44; the knee of the back leg is just behind the knee of the front leg&#44; and the heel of the front leg is near the toe of the back leg. The two feet make a figure &ldquo;7.&rdquo;";
		$latin_cross->save();
		
		$latin_dance = new Word;
		$latin_dance->dance_term = "Latin Dance";
		$latin_dance->abbreviation = "";
		$latin_dance->definition = "One of the two sets of competition dances in International Style ballroom. It consists of cha&#44; samba&#44; rumba&#44; paso doble&#44; and jive.";
		$latin_dance->save();
		
		$latin_motion = new Word;
		$latin_motion->dance_term = "Latin Motion";
		$latin_motion->abbreviation = "";
		$latin_motion->definition = "A characteristic type of hip motion found in the technique of performing a step in Latin and in Rhythm dances. Although it is most visible in the hips&#44; much of the effect is created through the action of the feet and knees. One steps ball-flat&#44; straightens the knee&#44; and the hip shifts to that side.";
		$latin_motion->save();
		
		$lead = new Word;
		$lead->dance_term = "Lead";
		$lead->abbreviation = "ld";
		$lead->definition = "The act of directing the woman (follower) through a figure or a dance. It involves choosing appropriate steps to suit the music and leading by hand and body signals to complete the chosen steps smoothly and safely. If the dance is a choreographed routine&#44; as in round dancing&#44; the lead is still responsible for initiating each move&#44; which ensures smooth coordination between the two dancers. Lead is normally the man&rsquo;s (leader&rsquo;s) responsibility.";
		$lead->save();
		
		$leader = new Word;
		$leader->dance_term = "Leader";
		$leader->abbreviation = "ld";
		$leader->definition = "The act of directing the woman (follower) through a figure or a dance. It involves choosing appropriate steps to suit the music and leading by hand and body signals to complete the chosen steps smoothly and safely. If the dance is a choreographed routine&#44; as in round dancing&#44; the lead is still responsible for initiating each move&#44; which ensures smooth coordination between the two dancers. Lead is normally the man&rsquo;s (leader&rsquo;s) responsibility.";
		$leader->save();
		
		$lead_foot = new Word;
		$lead_foot->dance_term = "Lead Foot";
		$lead_foot->abbreviation = "ld ft";
		$lead_foot->definition = "Man&rsquo;s (Leader&rsquo;s) left&#44; woman&rsquo;s (follower&rsquo;s) right";
		$lead_foot->save();
		
		$lead_hand = new Word;
		$lead_hand->dance_term = "Lead Hand";
		$lead_hand->abbreviation = "ld hnd";
		$lead_hand->definition = "Man&rsquo;s (leader&rsquo;s) left&#44; woman&rsquo;s (follower&rsquo;s) right";
		$lead_hand->save();
		
		$lead_in = new Word;
		$lead_in->dance_term = "Lead In";
		$lead_in->abbreviation = "";
		$lead_in->definition = "The music that occurs before the dance introduction begins&#44; usually one or two measures.";
		$lead_in->save();
		
		$left_face = new Word;
		$left_face->dance_term = "Left Face";
		$left_face->abbreviation = "LF";
		$left_face->definition = "Turning to the left or counter-clockwise.";
		$left_face->save();
		
		$left_open_facing_position = new Word;
		$left_open_facing_position->dance_term = "Left Open Facing Position";
		$left_open_facing_position->abbreviation = "LOP-FCG";
		$left_open_facing_position->definition = "One of many possible dance positions. See Dance Position and Connection Between Partners.";
		$left_open_facing_position->save();
		
		$left_open_position = new Word;
		$left_open_position->dance_term = "Left Open Position";
		$left_open_position->abbreviation = "LOP";
		$left_open_position->definition = "One of many possible dance positions. See Dance Position and Connection Between Partners.";
		$left_open_position->save();
		
		$left_shadow = new Word;
		$left_shadow->dance_term = "Left Shadow";
		$left_shadow->abbreviation = "L SHDW";
		$left_shadow->definition = "A dance position in which partners are facing the same direction&#44; the woman (follower) to the left and a little in front of the man (lead). As in shadow position&#44; the man (lead) is &ldquo;shadowing&rdquo; the woman (follower)&#44; but she (the follower) is to his (the leader&rsquo;s) left. Right hands may be joined&#44; and the man&rsquo;s (leader&rsquo;s) left hand may be placed on the woman&rsquo;s (follower&rsquo;s) back&#44; to facilitate lead and follow.";
		$left_shadow->save();
		
		$left_side_lead = new Word;
		$left_side_lead->dance_term = "Left Side Lead";
		$left_side_lead->abbreviation = "L sd ld";
		$left_side_lead->definition = "Moving with the left side of the body ahead of the right. Sometimes referred to as a &ldquo;slicing&rdquo; movement.";
		$left_side_lead->save();
		
		$lift = new Word;
		$lift->dance_term = "Lift";
		$lift->abbreviation = "";
		$lift->definition = "Rise slightly on the ball of the supporting foot. Done while you are stepping forward or side&#44; but no weight change in itself. You might simultaneously stretch the body and raise the free leg. If you are stepping forward&#44; you would raise the free leg forward. If you are stepping to the side&#44; you would raise the free leg to the side&#44; away from your direction of movement. Keep the free leg straight and the toe pointed. Also&#44; when a dancer&rsquo;s feet (typically the woman&rsquo;s (follower&rsquo;s)) are both off the floor at the same time. Lifts are not permitted in ballroom competition&#44; except for cabaret and showdance events&#44; and are rarely seen in round dance choreography. ";
		$lift->save();
		
		$lilt = new Word;
		$lilt->dance_term = "Lilt";
		$lilt->abbreviation = "";
		$lilt->definition = "Step heel to toe&#44; giving a little rise to the body and earlier than usual.";
		$lilt->save();
		
		$limp = new Word;
		$limp->dance_term = "Limp";
		$limp->abbreviation = "";
		$limp->definition = "Step side and then cross behind with slight bending of both knees.";
		$limp->save();
		
		$lindy = new Word;
		$lindy->dance_term = "Lindy";
		$lindy->abbreviation = "LN";
		$lindy->definition = "One of the Latin Rhythms";
		$lindy->save();
		
		$line_o_dance = new Word;
		$line_o_dance->dance_term = "Line of Dance";
		$line_o_dance->abbreviation = "LOD";
		$line_o_dance->definition = "The line of dance is forward&#44; counter-clockwise&#44; around the dance floor. Generally&#44; the man (leader) directs the progression of dance. The center of the hall will be to his (the leader&rsquo;) left&#44; and the walls of the room will be to his (the leader&rsquo;) right. In both freestyle and rounds&#44; go with the flow and avoid interfering with other dancers.";
		$line_o_dance->save();
		
		$line_progression = new Word;
		$line_progression->dance_term = "Line of Progression";
		$line_progression->abbreviation = "line of prog";
		$line_progression->definition = "Direction the movement or flow of the dance is currently moving. May be line of dance or reverse line of dance. In general&#44; if the couple is in closed position or semi-closed position facing the wall or LOD then the line of progression is counter-clockwise or LOD.";
		$line_progression->save();
		
		$lock = new Word;
		$lock->dance_term = "Lock";
		$lock->abbreviation = "lk";
		$lock->definition = "Cross the free foot in front of or behind the supporting foot&#44; place it close so that ankles touch or almost touch&#44; and take weight. Progression is smoother if you rise on the ball of the supporting foot so that the locking foot can slip under the heel of the supporting foot.";
		$lock->save();
		
		$looking_circle = new Word;
		$looking_circle->dance_term = "Looking Circle";
		$looking_circle->abbreviation = "";
		$looking_circle->definition = "Partners facing center of hall&#44; the taller dancer standing behind and slightly to one side of his (the leader&rsquo;) partner to observe while instruction is being given. In a big group&#44; where there may be three concentric circles of dancers&#44; it is important to follow convention: the outer circle moves in and the inner circle moves out to join the middle circle. That way&#44; the instructors have some room to demonstrate but all can see. It is rude and disturbing for dancers to move to the wall&#44; sit in chairs there&#44; and then complain that they cannot see over the looking circle.";
		$looking_circle->save();
		
		$loose_closed_position = new Word;
		$loose_closed_position->dance_term = "Loose Closed Position";
		$loose_closed_position->abbreviation = "LCP";
		$loose_closed_position->definition = "One of many possible dance positions. See Dance Position and Connection Between Partners.";
		$loose_closed_position->save();
		
		$lower = new Word;
		$lower->dance_term = "Lower";
		$lower->abbreviation = "";
		$lower->definition = "(or Fall) Lower body with weight centered over the ball and toes of the supporting foot. Involves whole body: lower onto heel&#44; flex knee&#44; and compress upper body.";
		$lower->save();
		
		$fall = new Word;
		$fall->dance_term = "Fall";
		$fall->abbreviation = "";
		$fall->definition = "(or Lower) Lower body with weight centered over the ball and toes of the supporting foot. Involves whole body: lower onto heel&#44; flex knee&#44; and compress upper body.";
		$fall->save();
		
		$lunge = new Word;
		$lunge->dance_term = "Lunge";
		$lunge->abbreviation = "lun";
		$lunge->definition = "Step forward or side&#44; bending knee and checking the movement&#44; maintaining an upward poise in the torso and head.";
		$lunge->save();
		
		$mambo = new Word;
		$mambo->dance_term = "Mambo";
		$mambo->abbreviation = "MB";
		$mambo->definition = "Originally a priestess of voodoo in Haiti. A dance of Cuban origin and one of the five dances of the American Rhythm competition. Mambo music was invented in Havana in the 1930s by Cachao and his contemporaries and made popular around the world. The music was heavily influenced by the jazz musicians that were brought to entertain American customers in Cuban casinos. It is similar to salsa&#44; except that in mambo the dance pauses on the first step (pause&#44; 2&#44; 3&#44; 4;) whereas in salsa&#44; the pause is typically on the last step (1&#44; 2&#44; 3&#44; pause;). As in other Latin rhythms&#44; round dancers dance the pause at the end of the measure: QQS.";
		$mambo->save();
		
		$man_under = new Word;
		$man_under->dance_term = "Man Under";
		$man_under->abbreviation = "";
		$man_under->definition = "(or Leader Under) The man (leader) moves from a designated position&#44; under joined hands&#44; to a designated position.";
		$man_under->save();
		
		$mans_left_shadow = new Word;
		$mans_left_shadow->dance_term = "Man&rsquo;s Left Shadow";
		$mans_left_shadow->abbreviation = "M&rsquo;s L SHDW";
		$mans_left_shadow->definition = "(or Leader&rsquo;s Left Shadow) A dance position in which partners are facing the same direction&#44; the man (leader) to the left and a little in front of the woman (follower). Here the woman (follower) is &ldquo;shadowing&rdquo; (behind) the man (leader)&#44; but he (the leader) is to her (the follower&rsquo;) left.";
		$mans_left_shadow->save();
		
		$man_shadow = new Word;
		$man_shadow->dance_term = "Man&rsquo;s Shadow";
		$man_shadow->abbreviation = "M&rsquo;s SHDW";
		$man_shadow->definition = "(or Leader&rsquo;s Shadow) A dance position in which partners are facing the same direction&#44; the woman (follower) to the left and a little behind the man (leader). Note that the man (leader) &ldquo;has a shadow.&rdquo;";
		$man_shadow->save();
		
		$leader_under = new Word;
		$leader_under->dance_term = "Leader Under";
		$leader_under->abbreviation = "";
		$leader_under->definition = "(or Man Under) The man (leader) moves from a designated position&#44; under joined hands&#44; to a designated position.";
		$leader_under->save();
		
		$leaders_left_shadow = new Word;
		$leaders_left_shadow->dance_term = "Leader&rsquo;s Left Shadow";
		$leaders_left_shadow->abbreviation = "M&rsquo;s L SHDW";
		$leaders_left_shadow->definition = "(or Man&rsquo;s Left Shadow) A dance position in which partners are facing the same direction&#44; the man (leader) to the left and a little in front of the woman (follower). Here the woman (follower) is &ldquo;shadowing&rdquo; the man (leader) (is behind him)&#44; but he (the leader) is to her (the follower&rsquo;) left.";
		$leaders_left_shadow->save();
		
		$leaders_shadow = new Word;
		$leaders_shadow->dance_term = "Leader&rsquo;s Shadow";
		$leaders_shadow->abbreviation = "M&rsquo;s SHDW";
		$leaders_shadow->definition = "(or Man&rsquo;s Left Shadow) A dance position in which partners are facing the same direction&#44; the man (leader) to the left and a little in front of the woman (follower). Here the woman (follower) is &ldquo;shadowing&rdquo; (behind) the man (leader)&#44; but he (the leader) is to her (the follower&rsquo;) left.";
		$leaders_shadow->save();
		
		$maneuver = new Word;
		$maneuver->dance_term = "Maneuver";
		$maneuver->abbreviation = "manuv";
		$maneuver->definition = "Usually the man (leader) steps forward on his (the leader&rsquo;) right foot and turns right-face to face the woman (follower) and reverse line of dance in closed position. The figure in Waltz and Foxtrot are considered to consist of three steps&#44; but the &ldquo; maneuver&rdquo; action is only the one step. There , the full figure is sometimes cued, &ldquo;maneuver, side, close&rdquo;";
		$maneuver->save();
		
		$mark_time = new Word;
		$mark_time->dance_term = "Mark Time";
		$mark_time->abbreviation = "";
		$mark_time->definition = "Step in place to the music for a designated number of beats.";
		$mark_time->save();
		
		$maxixe = new Word;
		$maxixe->dance_term = "Maxixe";
		$maxixe->abbreviation = "";
		$maxixe->definition = "(Mah shee shee) A Brazilian dance of urban character&#44; in 2/4 time and rapid tempo with slight syncopation. Also a jive or latin figure; see index.";
		$maxixe->save();
		
		$bar = new Word;
		$bar->dance_term = "Bar";
		$bar->abbreviation = "meas";
		$bar->definition = "(or Measure) A short section of music in the regularly recurring rhythm&#44; usually marked by an initial stronger accent and then one&#44; two&#44; three&#44; or more lesser accents. For instance&#44; a waltz measure consists of one strong downbeat and two lesser beats: 1&#44; 2&#44; 3; 1&#44; 2&#44; 3;";
		$bar->save();
		
		$measure = new Word;
		$measure->dance_term = "Measure";
		$measure->abbreviation = "meas";
		$measure->definition = "(or Bar) A short section of music in the regularly recurring rhythm&#44; usually marked by an initial stronger accent and then one&#44; two&#44; three&#44; or more lesser accents. For instance&#44; a waltz measure consists of one strong downbeat and two lesser beats: 1&#44; 2&#44; 3; 1&#44; 2&#44; 3;";
		$measure->save();
		
		$merengue = new Word;
		$merengue->dance_term = "Merengue";
		$merengue->abbreviation = "MG";
		$merengue->definition = "One of the Latin Rhythms";
		$merengue->save();
		
		$milonga = new Word;
		$milonga->dance_term = "Milonga";
		$milonga->abbreviation = "";
		$milonga->definition = "A style of tango characterized (among other things) by a quick rhythm&#44; stepping on each beat (qqqq;). Also a place where the dancing is done.";
		$milonga->save();
		
		$mirror = new Word;
		$mirror->dance_term = "Mirror";
		$mirror->abbreviation = "";
		$mirror->definition = "A specific type of following in which one partner&#44; usually the woman (follower) dances the mirror image of her (the follower&rsquo;) partner&rsquo;s steps. So&#44; if he (the leader) steps back and the woman (follower) steps forward&#44; she (the follower) can be said literally to be &ldquo;following&rdquo; him. If he (the leader) dances back and she (the follower) dances back&#44; too&#44; if they step apart&#44; then she (the follower) is &ldquo;mirroring&rdquo; him. A vine is a mirrored figure; a twist vine is not. Jive involves more mirroring (the rock recover) and West Coast Swing more following (the man (leader) draws the woman (follower) forward).";
		$mirror->save();
		
		$mixed_rhythm_dance = new Word;
		$mixed_rhythm_dance->dance_term = "Mixed Rhythm Dance";
		$mixed_rhythm_dance->abbreviation = "MX";
		$mixed_rhythm_dance->definition = "A Rhythm or Mixed Rhythm dance is one that includes two or more different rhythms. Some Rhythm dances are simply step-cued&#44; with no reference to established dance figures. See the navigation bar at the upper left of each page.";
		$mixed_rhythm_dance->save();
		
		$mixer = new Word;
		$mixer->dance_term = "Mixer";
		$mixer->abbreviation = "";
		$mixer->definition = "A dance during which partners are exchanged. A dancer usually moves from one partner to the next&#44; repeatedly.";
		$mixer->save();
		
		$modification = new Word;
		$modification->dance_term = "Modification";
		$modification->abbreviation = "mod";
		$modification->definition = "A change to a standard figure or to a sequence.";
		$modification->save();
		
		$natural = new Word;
		$natural->dance_term = "Natural";
		$natural->abbreviation = "nat";
		$natural->definition = "Turning right face&#44; in a clockwise direction";
		$natural->save();
		
		$numbers = new Word;
		$numbers->dance_term = "Number(s)";
		$numbers->abbreviation = "#";
		$numbers->definition = "Numbers to the left of a description designate the measures being described. Numbers following cue terms designate the number of steps to be taken.";
		$numbers->save();
		
		$open_head = new Word;
		$open_head->dance_term = "Open Head";
		$open_head->abbreviation = "";
		$open_head->definition = "The woman (follower) looks right as in semi-closed position. The man (leader) leads her (the follower&rsquo;) to &ldquo;open her (the follower&rsquo;) head&rdquo; with a little left sway.";
		$open_head->save();
		
		$open_out = new Word;
		$open_out->dance_term = "Open Out";
		$open_out->abbreviation = "";
		$open_out->definition = "Change from a relatively &ldquo;closed&rdquo; or facing position to one that is more separated.";
		$open_out->save();
		
		$open_position = new Word;
		$open_position->dance_term = "Open Position";
		$open_position->abbreviation = "OP";
		$open_position->definition = "One of many possible dance positions. See Dance Position and Connection Between Partners.";
		$open_position->save();
		
		$open_turn = new Word;
		$open_turn->dance_term = "Open Turn";
		$open_turn->abbreviation = "op trn";
		$open_turn->definition = "A turn in which the third step is a passing step&#44; instead of a closing step. Contributes to &ldquo;flight&#44;&rdquo; typical of foxtrot.";
		$open_turn->save();
		
		$opposite_footwork = new Word;
		$opposite_footwork->dance_term = "Opposite Footwork";
		$opposite_footwork->abbreviation = "opp ftwk";
		$opposite_footwork->definition = "Stepping with opposite feet free&#44; for instance the man&rsquo;s (leader&rsquo;s) left and the woman&rsquo;s (follower&rsquo;s) right: both step with the lead&#44; then both with the trail.";
		$opposite_footwork->save();
		
		$opposition_points = new Word;
		$opposition_points->dance_term = "Opposition Points";
		$opposition_points->abbreviation = "opp pts";
		$opposition_points->definition = "In a facing position&#44; lower on supporting foot&#44; extend free foot to the side&#44; point toe&#44; and stretch supported side&#44; swaying toward pointed foot. Partner points in opposite direction&#44; thus man (leader) and woman (follower) are pointing the same foot&#44; usually the left.";
		$opposition_points->save();
		
		$out = new Word;
		$out->dance_term = "Out";
		$out->abbreviation = "";
		$out->definition = "Used to direct a dancer to separate from or to turn away from partner; also&#44; to refer to the direction toward the wall.";
		$out->save();
		
		$outside_foot = new Word;
		$outside_foot->dance_term = "Outside Foot";
		$outside_foot->abbreviation = "outsd ft";
		$outside_foot->definition = "The foot farthest from the partner when not directly facing partner or directly facing away.";
		$outside_foot->save();
		
		$outside_hand = new Word;
		$outside_hand->dance_term = "Outside Hand";
		$outside_hand->abbreviation = "ousd hnd";
		$outside_hand->definition = "The hand farthest from the partner when not directly facing partner or directly facing away.";
		$outside_hand->save();
		
		$outside_partner = new Word;
		$outside_partner->dance_term = "Outside Partner";
		$outside_partner->abbreviation = "";
		$outside_partner->definition = "A step taken not between partner&rsquo;s feet but to partner&rsquo;s right (e.g.&#44; banjo) or left (e.g.&#44; sidecar).";
		$outside_partner->save();
		
		$oversway = new Word;
		$oversway->dance_term = "Oversway";
		$oversway->abbreviation = "";
		$oversway->definition = "In semi&#44; line&#44; step side and forward on the lead foot&#44; stretch lead side of body and so sway toward free foot but look down line. Turn a bit to the left.";
		$oversway->save();
		
		$overturn = new Word;
		$overturn->dance_term = "Overturn";
		$overturn->abbreviation = "ovrtrn";
		$overturn->definition = "More than the normal amount of turn. If the spin turn takes you to the wall&#44; an overturn might take you to reverse and wall.";
		$overturn->save();
		
		$sixth_foot_position = new Word;
		$sixth_foot_position->dance_term = "Sixth Foot Position";
		$sixth_foot_position->abbreviation = "";
		$sixth_foot_position->definition = "(or Parallel Foot Position) The feet point straight forward instead of being turned out. The turned-out foot positions&#44; first through fifth&#44; go back to old time dancing and ballet. Today&#44; we mostly step straight forward or back in a parallel or &ldquo;sixth&rdquo; foot position.";
		$sixth_foot_position->save();
		
		$parallel = new Word;
		$parallel->dance_term = "Parallel Foot Position";
		$parallel->abbreviation = "";
		$parallel->definition = "(or Sixth Foot Position) The feet point straight forward instead of being turned out. The turned-out foot positions&#44; first through fifth&#44; go back to old time dancing and ballet. Today&#44; we mostly step straight forward or back in a parallel or &ldquo;sixth&rdquo; foot position.";
		$parallel->save();
		
		$pas_de_basque = new Word;
		$pas_de_basque->dance_term = "Pas-de-Basque";
		$pas_de_basque->abbreviation = "";
		$pas_de_basque->definition = "(p&alum;d-bask or pah-deh-bahsk) A step in which the dancer swings one foot to the side&#44; springs onto it&#44; and swings the other foot against it. Or more precisely &mdash; Slight CCW ronde movement with left foot and arched instep on &ldquo;and&rdquo; count and step side with slight hop&#44; ball-flat. Close R to L with right heel to left toe on the second &ldquo;and&#44;&rdquo; soften both knees and lift left heel on an &ldquo;a&rdquo; count&#44; and step L raising R slightly toe pointing down. Done over two beats of music. And finally a little more fancifully &mdash; Jeté to Second Position with Demi-Rondé. Assemblé to Fifth Position Front. Slight Plié and Coupé in place&#44; finishing in Fifth Position en l&rsquo;air with toe pointed down. (such music!) (from Silvester & Whitman&#44; 1967)";
		$pas_de_basque->save();
		
		$paso_doble = new Word;
		$paso_doble->dance_term = "Paso Doble";
		$paso_doble->abbreviation = "PD";
		$paso_doble->definition = "An International Latin dance. It is the Latin rhythm most resembling the Ballroom style&#44; in that forward steps are taken with the heel lead&#44; the frame is wider and more strictly kept up&#44; and there is significantly different and less hip movement. It actually originated in southern France but is modeled after the sound&#44; drama&#44; and movement of the Spanish bullfight. &mdash; For more&#44; see the navigation bar at the upper left of each page.";
		$paso_doble->save();
		
		$passing_step = new Word;
		$passing_step->dance_term = "Passing Step";
		$passing_step->abbreviation = "";
		$passing_step->definition = "Move the free foot past the supporting foot and then step or take weight.";
		$passing_step->save();
		
		$phrase = new Word;
		$phrase->dance_term = "Phrase";
		$phrase->abbreviation = "";
		$phrase->definition = "A passage of two or more measures of music. A phrase will be perceived as a specific tune or melody. Most pieces of dance music consist of two or more different phrases&#44; each designated by a capital letter. Any phrase can repeat within the piece&#44; so a whole piece might be designated: lead in&#44; intro&#44; A&#44; A&#44; B&#44; A&#44; C&#44; end.";
		$phrase->save();
		
		$phrasing = new Word;
		$phrasing->dance_term = "Phrasing";
		$phrasing->abbreviation = "";
		$phrasing->definition = "The fitting of the steps and figures of a dance to the recurring patterns of music. Each musical phrase is given its own specific choreography. Part A of the dance is performed to musical phrase A of the song. If phrase A recurs in the piece&#44; then part A of the choreography repeats at that point. When phrase B occurs&#44; part B of the choreography is performed&#44; and so on.";
		$phrasing->save();
		
		$pickup = new Word;
		$pickup->dance_term = "Pickup";
		$pickup->abbreviation = "pu";
		$pickup->definition = "Usually the woman (follower) steps forward on her (the follower&rsquo;) left foot and turns left-face to face the man (leader) and reverse line of dance in closed position. Both the figure (in Waltz) and the action consist of just the one step. But a Pickup seems so much like a &ldquo;woman&rsquo;s (follower&rsquo;s) maneuver&rdquo; that the cue sometimes is used as short for &ldquo;pickup&#44; side&#44; close.&rdquo;";
		$pickup->save();
		
		$picture_figure = new Word;
		$picture_figure->dance_term = "Picture Figure";
		$picture_figure->abbreviation = "";
		$picture_figure->definition = "An action or movement wher (the follower&rsquo;)e the majority of the activity centers around not the steps but the frame of the couples&rsquo; dance position.";
		$picture_figure->save();
		
		$pirouette = new Word;
		$pirouette->dance_term = "Pirouette";
		$pirouette->abbreviation = "";
		$pirouette->definition = "A spinning turn of the body while balanced on one foot. The free foot may be held gracefully at the knee of the supporting leg.";
		$pirouette->save();
		
		$pirouette_en_dedans = new Word;
		$pirouette_en_dedans->dance_term = "Pirouette en dedans";
		$pirouette_en_dedans->abbreviation = "";
		$pirouette_en_dedans->definition = "Spin in the direction toward the supporting leg.";
		$pirouette_en_dedans->save();
		
		$pirouette_en_dehors = new Word;
		$pirouette_en_dehors->dance_term = "Pirouette en dehors";
		$pirouette_en_dehors->abbreviation = "";
		$pirouette_en_dehors->definition = "Spin in the direction away from the supporting leg.";
		$pirouette_en_dehors->save();
		
		$pivot = new Word;
		$pivot->dance_term = "Pivot";
		$pivot->abbreviation = "pvt";
		$pivot->definition = "Usually as a couple&#44; step and rotate on the ball of the supporting foot by turning the upper body. Stepping forward R&#44; one would turn right. Stepping back L&#44; one would turn right. The free leg is extended forward or back. Amount of turn can be very little or 1/2 turn or more.";
		$pivot->save();
		
		$point = new Word;
		$point->dance_term = "Point";
		$point->abbreviation = "pt";
		$point->definition = "Extend foot forward side or back&#44; toe to floor&#44; ankle stretched and instep arched&#44; but do not step or take weight. Do not tap. Usually&#44; the inside or the outside edge of the ball of the foot will touch the floor.";
		$point->save();
		
		$poise = new Word;
		$poise->dance_term = "Poise";
		$poise->abbreviation = "";
		$poise->definition = "The correct (attractive&#44; on balance) carriage of the body.";
		$poise->save();
		
		$position = new Word;
		$position->dance_term = "Position";
		$position->abbreviation = "pos";
		$position->definition = "A standard couple relationship&#44; e.g.&#44; closed&#44; banjo&#44; sidecar.";
		$position->save();
		
		$press = new Word;
		$press->dance_term = "Press";
		$press->abbreviation = "";
		$press->definition = "Step forward on ball of foot&#44; but take partial weight only. Usually a brief pause with supporting leg straight and pressed leg bent but pressure into the floor&#44; forward poise to the body.";
		$press->save();
		
		$pretzel_wrap = new Word;
		$pretzel_wrap->dance_term = "Pretzel Wrap";
		$pretzel_wrap->abbreviation = "prtzl wrp";
		$pretzel_wrap->definition = "With a double hand hold&#44; wrap&#44; unwrap&#44; and/or rewrap one partner at a time using left and right turns. Details vary with the choreography.";
		$pretzel_wrap->save();
		
		$progressive = new Word;
		$progressive->dance_term = "Progressive";
		$progressive->abbreviation = "prog";
		$progressive->definition = "Movement forward or backward along line of dance. A progressive dance moves; a spot dance is mostly danced in one place on the floor.";
		$progressive->save();
		
		$promenade_position = new Word;
		$promenade_position->dance_term = "Promenade Position";
		$promenade_position->abbreviation = "PP";
		$promenade_position->definition = "(also Semi-Closed Position) One of many possible dance positions. See Dance Position and Connection Between Partners.";
		$promenade_position->save();
		
		$promenade_sway = new Word;
		$promenade_sway->dance_term = "Promenade Sway";
		$promenade_sway->abbreviation = "";
		$promenade_sway->definition = "In Promenade position (semi-closed)&#44; step side and forward on the lead foot&#44; stretch trail side of body and so sway toward supporting foot&#44; lead arms up&#44; looking out. With your lead wrist up&#44; you might be looking at your watch to check the time.";
		$promenade_sway->save();
		
		$quick = new Word;
		$quick->dance_term = "Quick";
		$quick->abbreviation = "Q&#44; q&#44; qk";
		$quick->definition = "A step taken on a single beat or on a fraction of a beat and followed by another (the follower&rsquo;) step without pause. Also used to disignate a figure to be performed more rapidly&#44; often with one more step than is standard&#44; as in Quick Open Reverse in Waltz.";
		$quick->save();
		
		$quickstep = new Word;
		$quickstep->dance_term = "Quickstep";
		$quickstep->abbreviation = "QS";
		$quickstep->definition = "An International Ballroom rhythm that follows a 4/4 time beat&#44; at about 50 bars per minute in competition. From its early beginning as a faster foxtrot&#44; the quickstep has become distinctive for its speed across the floor. It is danced to the fastest tempo of the Ballroom dances&#44; which necessitates that partners stay in closed position throughout the dance. One of our Smooth Rhythms";
		$quickstep->save();
		
		$recover = new Word;
		$recover->dance_term = "Recover";
		$recover->abbreviation = "rec";
		$recover->definition = "With the feet apart after a previous step&#44; return weight to the previous supporting foot. The foot may turn if required.";
		$recover->save();
		
		$releve = new Word;
		$releve->dance_term = "Releve";
		$releve->abbreviation = "";
		$releve->definition = "A ballet term signifying a dramatic lifting of the heel and rising to the ball of the supporting foot; again&#44; no weight change. In ballet&#44; a woman&rsquo;s (follower&rsquo;s) releve puts her (the follower&rsquo;) onto the tips of her (the follower&rsquo;) toes&#44; and a man&rsquo;s (leader&rsquo;s) releve puts him onto the ball of his (the leader&rsquo;) foot&#44; but of course&#44; in round dancing&#44; no one dances on pointe. The French school describes the releve as a steady rolling and rising from flat to ball. The Italian school recommends that the move be sharp and with a slight spring.";
		$releve->save();
		
		$replace = new Word;
		$replace->dance_term = "Replace";
		$replace->abbreviation = "rplc";
		$replace->definition = "Recover or return weight to previous supporting foot.";
		$replace->save();
		
		$returning_lady2_seat = new Word;
		$returning_lady2_seat->dance_term = "Returning the Lady to her Seat";
		$returning_lady2_seat->abbreviation = "";
		$returning_lady2_seat->definition = "After a dance is over&#44; the gentleman accompanies the woman (follower) back to her (the follower&rsquo;) chair or other place of origin&#44; usually with easy exclamations of pleasure and gratitude. He (the leader) does not end a dance with a quick &ldquo;thanks&#44;&rdquo; and then bound off toward the snack table&#44; leaving her (the follower&rsquo;) alone in the middle of the floor. Well&#44; I may have done that at times&#44; but I had to turn off my tape recorder. We should try not to desert or abandon our ladies.";
		$returning_lady2_seat->save();
		
		$reverse = new Word;
		$reverse->dance_term = "Reverse";
		$reverse->abbreviation = "rev";
		$reverse->definition = "Turning left face&#44; in a counterclockwise direction";
		$reverse->save();
		
		$reverse_develope = new Word;
		$reverse_develope->dance_term = "Reverse Develope";
		$reverse_develope->abbreviation = "";
		$reverse_develope->definition = "Swing either leg forward from the hip and then bring that foot to the supporting knee and slide the free foot down the supporting leg to touch the floor. Here the kick (really a swing) comes first and then the knee is bent.";
		$reverse_develope->save();
		
		$reverse_line_o_dance = new Word;
		$reverse_line_o_dance->dance_term = "Reverse Line of Dance";
		$reverse_line_o_dance->abbreviation = "RLOD";
		$reverse_line_o_dance->definition = "The direction opposite to line of dance&#44; in a direction clockwise around the dance floor.";
		$reverse_line_o_dance->save();
		
		$reverse_line_progression = new Word;
		$reverse_line_progression->dance_term = "Reverse Line of Progression";
		$reverse_line_progression->abbreviation = "rev line of prog";
		$reverse_line_progression->definition = "The opposite direction the movement or flow of the dance is currently moving. May be line of dance or reverse line of dance. In general&#44; if the couple is in closed position or semi-closed position facing the center of hall or reverse line of dance then the reverse line of progression is counter-clockwise or line of dance.";
		$reverse_line_progression->save();
		
		$reverse_semi_closed_position = new Word;
		$reverse_semi_closed_position->dance_term = "Reverse Semi-Closed Position";
		$reverse_semi_closed_position->abbreviation = "RSCP";
		$reverse_semi_closed_position->definition = "One of many possible dance positions. See Dance Position and Connection Between Partners.";
		$reverse_semi_closed_position->save();
		
		$rhythm = new Word;
		$rhythm->dance_term = "Rhythm";
		$rhythm->abbreviation = "";
		$rhythm->definition = "The three dominant elements in music are melody&#44; harmony&#44; and rhythm. We primarily dance to the rhythm&#44; the pattern of accented beats that recurs through the piece and that gives it its musical character&#44; the pulsation or throb that is felt under the melody or tune. In waltz&#44; the rhythm is123; 123; with a strong downbeat on the &ldquo;1.&rdquo;";
		$rhythm->save();
		
		$mixed_rhythm_dance = new Word;
		$mixed_rhythm_dance->dance_term = "Mixed Rhythm Dance";
		$mixed_rhythm_dance->abbreviation = "MX";
		$mixed_rhythm_dance->definition = "A Mixed Rhythm (or Rhythm) dance or is one that includes two or more different rhythms. Some Rhythm dances are simply step-cued&#44; with no reference to established dance figures. See the &ldquo;browse&rdquo; navigation bar at the upper left of each page.";
		$mixed_rhythm_dance->save();
		
		$rhythm = new Word;
		$rhythm->dance_term = "Rhythm";
		$rhythm->abbreviation = "MX";
		$rhythm->definition = "A Rhythm (or Mixed Rhythm) dance is one that includes two or more different rhythms. Some Rhythm dances are simply step-cued&#44; with no reference to established dance figures. See the &ldquo;browse&rdquo; navigation bar at the upper left of each page.";
		$rhythm->save();
		
		$right_face = new Word;
		$right_face->dance_term = "Right Face";
		$right_face->abbreviation = "RF";
		$right_face->definition = "Turning to the right or clockwise.";
		$right_face->save();
		
		$right_side_lead = new Word;
		$right_side_lead->dance_term = "Right Side Lead";
		$right_side_lead->abbreviation = "R sd ld";
		$right_side_lead->definition = "Moving with the right side of the body ahead of the left. Sometimes referred to as a &ldquo;slicing&rdquo; movement.";
		$right_side_lead->save();
		
		$ripple = new Word;
		$ripple->dance_term = "Ripple";
		$ripple->abbreviation = "";
		$ripple->definition = "In its simplest form&#44; a ripple is a tipping of the shoulders away from the direction of movement. In a ripple chasse&#44; one might do the chasse down line of dance while briefly inclining the shoulders toward reverrse with left side stretch.";
		$ripple->save();
		
		$rise = new Word;
		$rise->dance_term = "Rise";
		$rise->abbreviation = "";
		$rise->definition = "Elevate body with weight centered over the ball and toes of the supporting foot. Involves whole body: lifting heel off floor&#44; staightening knees&#44; and stretching upper body. Foot rise can be distinguished and separated from body rise.";
		$rise->save();
		
		$rock = new Word;
		$rock->dance_term = "Rock";
		$rock->abbreviation = "rk";
		$rock->definition = "Change weight to free foot with the intention of returning to the original supporting foot. In Latin dances (e.g.&#44; Rumba) the free leg is bent and straightens as weight is taken&#44; and this action moves that hip to the side (see Cuban Action).";
		$rock->save();
		
		$ronde = new Word;
		$ronde->dance_term = "Ronde";
		$ronde->abbreviation = "";
		$ronde->definition = "Flex supporting knee&#44; extend free foot and point toe&#44; and move free foot forward or back in an arc above the floor. Usually a bigger&#44; higher movement (an &ldquo;aerial ronde&rdquo;) than a flare or fan&#44; but one can do a &ldquo;floor ronde&#44;&rdquo; which is another name for a fan.";
		$ronde->save();
		
		$routine = new Word;
		$routine->dance_term = "Routine";
		$routine->abbreviation = "";
		$routine->definition = "The specific choreography created for a piece of music.";
		$routine->save();
		
		$rumba = new Word;
		$rumba->dance_term = "Rumba";
		$rumba->abbreviation = "RB";
		$rumba->definition = "Danced in both International Latin and American Rhythm competition&#44; it originated in Cuba based on rhythms brought over by slaves. The Latin version is slower than the Rhythm version. The rumba is considered the most romantic of the Latin dances and involves hip action over the standing leg. &mdash; For more&#44; see the navigation bar at the upper left of each page.";
		$rumba->save();
		
		$run = new Word;
		$run->dance_term = "Run";
		$run->abbreviation = "";
		$run->definition = "Sometimes&#44; a step taken on one beat of music; a quick.";
		$run->save();
		
		$running = new Word;
		$running->dance_term = "Running";
		$running->abbreviation = "rung";
		$running->definition = "Often&#44; used as an adjective to describe a figure executed with an extra step&#44; with syncopated timing&#44; such as 1&#44; 2/&&#44; 3; in waltz or S&#44; -&#44; Q/&&#44; Q; in foxtrot.";
		$running->save();
		
		$salsa = new Word;
		$salsa->dance_term = "Salsa";
		$salsa->abbreviation = "SA";
		$salsa->definition = "One of the Latin Rhythms";
		$salsa->save();
		
		$samba = new Word;
		$samba->dance_term = "Samba";
		$samba->abbreviation = "SB";
		$samba->definition = "A progressive Latin Rhythm of Brazilian origin in 2/4 time&#44; although round-dance cue sheets are usually written as though the music were 4/4. There are two major streams of samba that differ considerably: the modern ballroom samba and the traditional samba of Brazil. Traditional Brazilian samba includes a partner dance but is danced solo at carnivals. &mdash; For more&#44; see the navigation bar at the upper left of each page.";
		$samba->save();
		
		$same_footwork = new Word;
		$same_footwork->dance_term = "Same Footwork";
		$same_footwork->abbreviation = "";
		$same_footwork->definition = "Both partners using the same feet&#44; eg. both step with the left feet&#44; then both right.";
		$same_footwork->save();
		
		$second_foot_position = new Word;
		$second_foot_position->dance_term = "Second Foot Position";
		$second_foot_position->abbreviation = "";
		$second_foot_position->definition = "Either foot is placed to the side of the other. The turned-out foot positions&#44; first through fifth&#44; go back to old time dancing and ballet. Today&#44; we step straight forward or back (see &ldquo;parallel foot position&rdquo;).";
		$second_foot_position->save();
		
		$semi_closed_position = new Word;
		$semi_closed_position->dance_term = "Semi-Closed Position";
		$semi_closed_position->abbreviation = "SCP";
		$semi_closed_position->definition = "One of many possible dance positions. See Dance Position and Connection Between Partners.";
		$semi_closed_position->save();
		
		$semi_colon = new Word;
		$semi_colon->dance_term = "Semi-colon";
		$semi_colon->abbreviation = ";";
		$semi_colon->definition = "In abbreviated descriptions of dance steps (as opposed to complete sentences)&#44; a semi-colon represents the end of a measure of music. In a cue sheet&#44; one often finds two or more semi-colons together. This is a concise way of saying that the previous figure took two or more measures to execute. For instance&#44; in the sequence: &ldquo;waltz away; pickup; left turning box;;;;&rdquo; the first two figures took one measure apiece&#44; and the third figure took four measures to complete.";
		$semi_colon->save();
		
		$sequence = new Word;
		$sequence->dance_term = "Sequence";
		$sequence->abbreviation = "seq";
		$sequence->definition = "The order in which steps&#44; figures&#44; or dance actions are to be performed.";
		$sequence->save();
		
		$shadow = new Word;
		$shadow->dance_term = "Shadow";
		$shadow->abbreviation = "SHDW";
		$shadow->definition = "A dance position in which partners are facing the same direction&#44; one (usually the man) to the left and a little behind the woman (follower). The man (leader) is &ldquo;shadowing&rdquo; (behind) the woman (follower). Left hands may be joined&#44; and the man&rsquo;s (leader&rsquo;s) right hand may be placed on the woman&rsquo;s (follower&rsquo;s) back&#44; to facilitate lead and follow. See also left shadow and man&rsquo;s (leader&rsquo;s) shadow.";
		$shadow->save();
		
		$shake = new Word;
		$shake->dance_term = "Shake";
		$shake->abbreviation = "";
		$shake->definition = "A body movement usually described in more detail by the choreographer.";
		$shake->save();
		
		$shimmy = new Word;
		$shimmy->dance_term = "Shimmy";
		$shimmy->abbreviation = "";
		$shimmy->definition = "A body movement; usually a quick&#44; rotational&#44; forward-and-back movement of the shoulders.";
		$shimmy->save();
		
		$side = new Word;
		$side->dance_term = "Side";
		$side->abbreviation = "sd";
		$side->definition = "Step to the side (in the direction of the free foot) and shift weight to that foot.";
		$side->save();
		
		$sideward = new Word;
		$sideward->dance_term = "Sideward";
		$sideward->abbreviation = "swd";
		$sideward->definition = "Step to the side (in the direction of the free foot) and shift weight to that foot.";
		$sideward->save();
		
		$side_n_back = new Word;
		$side_n_back->dance_term = "Side and Back";
		$side_n_back->abbreviation = "sd & bk";
		$side_n_back->definition = "A step on the diagonal between a side step and a back step. Sometimes a distinction is made between &ldquo;side and back&rdquo; (a little more side) and &ldquo;back and side&rdquo; (a little more back).";
		$side_n_back->save();
		
		$side_n_forward = new Word;
		$side_n_forward->dance_term = "Side and Forward";
		$side_n_forward->abbreviation = "sd & fwd";
		$side_n_forward->definition = "A step on the diagonal between a side step and a forward step. Sometimes a distinction is made between &ldquo;side and forward&rdquo; (a little more side) and &ldquo;forward and side&rdquo; (a little more forward).";
		$side_n_forward->save();
		
		$side_by_side = new Word;
		$side_by_side->dance_term = "Side by Side";
		$side_by_side->abbreviation = "sd by sd";
		$side_by_side->definition = "Partners are beside each other and are usually facing the same direction.";
		$side_by_side->save();
		
		$sidecar_position = new Word;
		$sidecar_position->dance_term = "Sidecar Position";
		$sidecar_position->abbreviation = "SCAR";
		$sidecar_position->definition = "One of many possible dance positions. See Dance Position and Connection Between Partners.";
		$sidecar_position->save();
		
		$skate = new Word;
		$skate->dance_term = "Skate";
		$skate->abbreviation = "";
		$skate->definition = "Move in a stylized manner by swiveling on the weighted foot toward the free&#44; pushing off on that weighted foot&#44; sliding forward and taking weight&#44; and bringing the original weighted foot up to a touch position. With the left foot free&#44; one would swivel left&#44; &ldquo;skate&rdquo; diagonally or even side left&#44; and touch. Then one would probably swivel 1/4 or more right and skate right. The Two Step figure consists of this step left and then right.";
		$skate->save();
		
		$skaters_position = new Word;
		$skaters_position->dance_term = "Skaters Position";
		$skaters_position->abbreviation = "SKTRS";
		$skaters_position->definition = "One of many possible dance positions. See Dance Position and Connection Between Partners.";
		$skaters_position->save();
		
		$skip = new Word;
		$skip->dance_term = "Skip";
		$skip->abbreviation = "";
		$skip->definition = "Step forward and with a soft knee&#44; straighten leg&#44; rise slightly off the floor&#44; and return to the floor on the same foot. It is a step&#44; hop.";
		$skip->save();
		
		$slap = new Word;
		$slap->dance_term = "Slap";
		$slap->abbreviation = "";
		$slap->definition = "Quickly and momentarily touch the palm(s) of the hand(s) to your thigh(s) or other body part to make a sharp sound.";
		$slap->save();
		
		$slash = new Word;
		$slash->dance_term = "Slash";
		$slash->abbreviation = "/";
		$slash->definition = "In abbreviated descriptions of dance steps (as opposed to complete sentences)&#44; a slash is used to indicate a split beat of music&#44; two steps or actions occuring in a single beat&#44; a kind of syncopation. For instance a cha half basic is &ldquo;fwd&#44; rec&#44; sd/cl&#44; sd;&rdquo; In this 4-beat measure&#44; two things are happening on beat 3 (the &ldquo;side/close&rdquo;). The &ldquo;count&rdquo; is 1&#44; 2&#44; 3/&&#44; 4; The 3/&&#44; 4; is your &ldquo;cha-cha-cha.";
		$slash->save();
		
		$slide = new Word;
		$slide->dance_term = "Slide";
		$slide->abbreviation = "";
		$slide->definition = "Move the free foot in a given direction with light contact with the floor and take weight. Same as Glide.";
		$slide->save();
		
		$slingshot = new Word;
		$slingshot->dance_term = "Slingshot";
		$slingshot->abbreviation = "";
		$slingshot->definition = "In an L-position with the man (leader) maybe facing wall and the woman (follower) facing LOD&#44; the man (leader) lunges to the side L and extends his (the leader&rsquo;) arms to lead the woman (follower) to rock back R (this is pulling back the slingshot). Then both recover to their trail feet (releasing the slingshot). This move gives a little more propulsion or drama to the next figure&mdash;maybe a throwaway in jive or a throwout in west-coast&mdash;than a tamer entry&#44; such as a walk two or rock recover.";
		$slingshot->save();
		
		$slip = new Word;
		$slip->dance_term = "Slip";
		$slip->abbreviation = "slp";
		$slip->definition = "On lead foot and slightly lowered&#44; begin a small&#44; left-face body rotation&#44; rise&#44; slide free foot back&#44; and take weight so woman (follower) swivels LF and steps on her (the follower&rsquo;) left foot just outside man&rsquo;s (leader&rsquo;s) right foot&#44; ending in closed position. You can imagine a cord connecting his (the leader&rsquo;) right toe to her (the follower&rsquo;) left toe. As he (the leader) slips his (the leader&rsquo;) foot across the surface of the floor&#44; that motion draws her (the follower&rsquo;) foot forward. So&#44; it is important for the man (leader) to take a clear back step and so lead the woman&rsquo; (follower&rsquo;)slip&#44; but don&rsquo;t make it a lunge back such that you fall into a deep hole. If the man (leader) wants to turn the partnership more&#44; say&#44; 1/4 LF&#44; then he (the leader) will guide her (the follower&rsquo;) to step L between his (the leader&rsquo;) feet. This will allow him to turn LF and end in closed position. If she (the follower) had slipped outside his feet&#44; the turn would have put them in banjo&#44; which we don&rsquo;t usually want.";
		$slip->save();
		
		$slot = new Word;
		$slot->dance_term = "Slot";
		$slot->abbreviation = "";
		$slot->definition = "The rectangular area on the floor in which the couple dances. It is usually slightly wider than the woman&rsquo;s (follower&rsquo;s) shoulders and several feet long. West Coast Swing is a rhythm that makes conspicuous use of a slot. Jive is a more circular rhythm and does not confine either dancer in a slot.";
		$slot->save();
		
		$slow = new Word;
		$slow->dance_term = "Slow";
		$slow->abbreviation = "S&#44; s&#44; slo";
		$slow->definition = "A step taken on two beats of music (in 4/4 timing&#44; or one beat in 2/4); often danced as a step followed by a pause before the next step is taken. Also use conventionally to designate a figure performed over a longer time than is standard.";
		$slow->save();
		
		$slow_two_step = new Word;
		$slow_two_step->dance_term = "Slow Two Step";
		$slow_two_step->abbreviation = "ST or STS";
		$slow_two_step->definition = "One of the Latin Rhythms";
		$slow_two_step->save();
		
		$smile = new Word;
		$smile->dance_term = "Smile";
		$smile->abbreviation = "";
		$smile->definition = "The raising of the corners of the mouth.  NOTE: As the level of concentration increases&#44; this action may become more difficult to perform.";
		$smile->save();
		
		$snap = new Word;
		$snap->dance_term = "Snap";
		$snap->abbreviation = "";
		$snap->definition = "Slide your middle finger from the tip of that thumb to the base of the thumb in a way to make a sharp sound.";
		$snap->save();
		
		$solo = new Word;
		$solo->dance_term = "Solo";
		$solo->abbreviation = "";
		$solo->definition = "Dance the figure without contact with your partner.";
		$solo->save();
		
		$sombrero = new Word;
		$sombrero->dance_term = "Sombrero";
		$sombrero->abbreviation = "";
		$sombrero->definition = "A dance position in which partners face opposite directions with right hips adjacent&#44; with right arms in front of partner at waist level&#44; and with left arms curved up and inward&#44; with left hands above the head (like a hat).";
		$sombrero->save();
		
		$spin = new Word;
		$spin->dance_term = "Spin";
		$spin->abbreviation = "spn";
		$spin->definition = "Rotate on the ball of the supporting foot. The free leg is usually held under the body. The amount of turn varies up to a full turn and sometimes more. One of the stumbling blocks to a good spin is the tendency for the man (leader) to pull his woman (follower) to him in a desperate attempt to get far enough around. In both pivots and spins&#44; it feels as though you will be better off if you make yourselves as small as possible&#44; but the truth is that you need to extend yourselves and separate your top lines even more. Extra momentum will actually help you around. Also a solo action.";
		$spin->save();
		
		$spiral = new Word;
		$spiral->dance_term = "Spiral";
		$spiral->abbreviation = "sprl";
		$spiral->definition = "A solo action. Turn in place on ball of supporting foot in direction opposite to supporting foot (on left foot&#44; turn right). A full spiral is 7/8 turn; ends with the legs quite tightly twisted&#44; ankles together. Usually&#44; you will take a &ldquo;step/spiral.&rdquo; Don&rsquo;t make the mistake of anticipating the turn. Step&#44; get your body stably balanced over that supporting foot&#44; and only then sharply turn on that spot.";
		$spiral->save();
		
		$spot = new Word;
		$spot->dance_term = "Spot";
		$spot->abbreviation = "spt";
		$spot->definition = "Dance the figure on one point on the floor&#44; with no progression.";
		$spot->save();
		
		$spot_pivot = new Word;
		$spot_pivot->dance_term = "Spot Pivot";
		$spot_pivot->abbreviation = "spt pvt";
		$spot_pivot->definition = "As a couple&#44; pivot about one point; no progression. May involve any number of steps.";
		$spot_pivot->save();
		
		$spot_turn = new Word;
		$spot_turn->dance_term = "Spot Turn";
		$spot_turn->abbreviation = "spt trn";
		$spot_turn->definition = "As an individual (solo)&#44; turn or pivot about one point; no progression.";
		$spot_turn->save();
		
		$spotting = new Word;
		$spotting->dance_term = "Spotting";
		$spotting->abbreviation = "";
		$spotting->definition = "During turning actions&#44; holding the head steady&#44; with gaze fixed on a single spot&#44; until the last possible moment of the body&rsquo;s turn&#44; when the head whips around and the gaze focuses again on the dancer&rsquo;s &ldquo;spot.&rdquo; This snapping of the head not only prevents the dancer from getting dizzy but also gives multiple turns a pronounced rhythm .";
		$spotting->save();
		
		$spring = new Word;
		$spring->dance_term = "Spring";
		$spring->abbreviation = "";
		$spring->definition = "Take a step by moving suddenly and rapidly.";
		$spring->save();
		
		$staccato_action = new Word;
		$staccato_action->dance_term = "Staccato Action";
		$staccato_action->abbreviation = "";
		$staccato_action->definition = "Sharp&#44; rapid movement in the feet&#44; body&#44; or head.";
		$staccato_action->save();
		
		$stamp = new Word;
		$stamp->dance_term = "Stamp";
		$stamp->abbreviation = "";
		$stamp->definition = "Touch the flat of the foot to the floor sharply and then raise it&#44; but don&rsquo;t take weight. The amount of noise can vary.";
		$stamp->save();
		
		$standard_introduction = new Word;
		$standard_introduction->dance_term = "Standard Introduction";
		$standard_introduction->abbreviation = "";
		$standard_introduction->definition = "A two measure wait or lead in and two measures for (in the appropriate rhythm) a step apart&#44; point; step together to designated dance position and facing direction&#44; touch;";
		$standard_introduction->save();
		
		$starting_position = new Word;
		$starting_position->dance_term = "Starting Position";
		$starting_position->abbreviation = "";
		$starting_position->definition = "The position taken by a couple at the beginning of a dance or at the start of any figure in the dance.";
		$starting_position->save();
		
		$step = new Word;
		$step->dance_term = "Step";
		$step->abbreviation = "";
		$step->definition = "Move the free foot in a given direction and change weight to this foot; the basic unit of each dance figure.";
		$step->save();
		
		$stomp = new Word;
		$stomp->dance_term = "Stomp";
		$stomp->abbreviation = "";
		$stomp->definition = "Close the free foot sharply. The amount of sound made may vary.";
		$stomp->save();
		
		$stretch = new Word;
		$stretch->dance_term = "Stretch";
		$stretch->abbreviation = "";
		$stretch->definition = "The elongation of the body&#44; generally one side more than the other. Stretch is accomplished by raising one hip and rib cage without collapsing the other side. The shoulder on the stretched side rises&#44; but only as a consequence of stretch. One does not &ldquo;lift&rdquo; the shoulder. Right stretch produces left sway.";
		$stretch->save();
		
		$stroll = new Word;
		$stroll->dance_term = "Stroll";
		$stroll->abbreviation = "";
		$stroll->definition = "Walk in a stylized manner with upper body sway&mdash;fwd R with right-shoulder lead&#44; fwd L with left-shoulder lead. Maybe a little more easy-going than Strut.";
		$stroll->save();
		
		$strut = new Word;
		$strut->dance_term = "Strut";
		$strut->abbreviation = "";
		$strut->definition = "Step with a swaggering upper body sway&#44; proud&#44; marching feel. You might step fwd R with left-shoulder lead&#44; fwd L with right-shoulder lead.";
		$strut->save();
		
		$styling = new Word;
		$styling->dance_term = "Styling";
		$styling->abbreviation = "";
		$styling->definition = "The manner in which figures are danced. The details of movement and position that accompany the actual steps and that make the dancing more comfortable and more attractive.";
		$styling->save();
		
		$supporting_foot = new Word;
		$supporting_foot->dance_term = "Supporting Foot";
		$supporting_foot->abbreviation = "";
		$supporting_foot->definition = "The foot that is bearing the body&rsquo;s weight. One of the challenges in dance is to keep all your weight balanced over that foot. If you don&rsquo;t&#44; you will be pushing your partner off balance or asking him (the leader) or her (the follower) to support some of your weight&mdash;not good. Teachers talk about the body as a pile of boxes: the head&#44; torso&#44; hips&#44; legs&#44; and the need to keep the pile neatly aligned&#44; or it will topple. Unexpectedly&#44; the head is the heaviest box. Keep it up. Don&rsquo;t look around. Don&rsquo;t look down. You&rsquo;ll pull the pile over.";
		$supporting_foot->save();
		
		$sway = new Word;
		$sway->dance_term = "Sway";
		$sway->abbreviation = "";
		$sway->definition = "Lean or tilt the body from the ankle upward in a direction to the side. The hips lead the movement&#44; and then the upper body follows. Stretch the opposite side of the body. Commonly used during turns when one sways toward the center of the arc to counteract a falling away from the turn. Also used to create &ldquo;pictures&rdquo; &mdash; during a right lunge we sway right; during a promenade sway we sway left.  Broken Sway is sway from the hips up&#44; rather than from the ankles up. Rather than a smooth arc to the body&#44; there is a break or kink at the waist.";
		$sway->save();
		
		$swing = new Word;
		$swing->dance_term = "Swing";
		$swing->abbreviation = "";
		$swing->definition = "In general&#44; swing&#44; or body swing&#44; is any free movement around a fixed point. We can distinguish between &ldquo;pendular swing&rdquo; when the fixed point is at the top of the movement and &ldquo;metronomic swing&rdquo; when the fixed point is at the bottom.  A common example of swing (pendular) is movement of the free foot forward and up to a point about three inches above the floor&#44; keeping the leg straight; no weight change. (Compare to kick.) Also a dance rhythm&mdash;see Jive or West Coast Swing in the navigation bar at the upper left of each page.";
		$swing->save();
		
		$swivel = new Word;
		$swivel->dance_term = "Swivel";
		$swivel->abbreviation = "swvl";
		$swivel->definition = "A change of direction and position made while the weight is on the ball of the foot. Involves no weight change. The rotation can be slight or up to 1/2 turn or more.";
		$swivel->save();
		
		$swivel_walk = new Word;
		$swivel_walk->dance_term = "Swivel Walk";
		$swivel_walk->abbreviation = "swvl wlk";
		$swivel_walk->definition = "Step forward on ball of foot and rotate on that point of contact.";
		$swivel_walk->save();
		
		$syllabus = new Word;
		$syllabus->dance_term = "Syllabus";
		$syllabus->abbreviation = "";
		$syllabus->definition = "A collection of cue sheets and other educational material provided at a dance event.";
		$syllabus->save();
		
		$syncopation = new Word;
		$syncopation->dance_term = "Syncopation";
		$syncopation->abbreviation = "sync";
		$syncopation->definition = "Displacement of either the normal beat or the normal accent. &ldquo;Normal&rdquo; is the regularly recurring groups of 2 or 3 beats&#44; the first of each group being emphasized&#44; as in waltz (123; 123) or foxtrot (1234; 1234). If the listener or dancer feels any irregularity&#44; that is syncopation &mdash; e.g.&#44; use of eighth notes or rests&#44; or emphasis on the 2-count&#44; or a foxtrot measure danced QSQ. Most common&#44; it is stepping or acting between two beats of music&#44; on an & count&#44; such as 1&#44; 2/&&#44; 3; (in waltz) or S&#44; -&#44; Q/&&#44; Q; (in foxtrot). Syncopation is any kind of emphasis on a part of the measure not expected to be emphasized.";
		$syncopation->save();
		
		$tag_word = new Word;
		$tag_word->dance_term = "Tag";
		$tag_word->abbreviation = "";
		$tag_word->definition = "The last steps&#44; figure&#44; or position taken at the end of a dance.";
		$tag_word->save();
		
		$tandem_position = new Word;
		$tandem_position->dance_term = "Tandem Position";
		$tandem_position->abbreviation = "TNDM";
		$tandem_position->definition = "One of many possible dance positions. See Dance Position and Connection Between Partners.";
		$tandem_position->save();
		
		$tango_international = new Word;
		$tango_international->dance_term = "Tango (International)";
		$tango_international->abbreviation = "TG";
		$tango_international->definition = "An International Ballroom dance that branched away from its original Argentine roots by allowing European&#44; American&#44; Hollywood&#44; and competitive influences into the style and execution of the dance. Dance partners hold the classic dance position&#44; with top line held away and legs and hips held close&#44; unlike Argentine tango&#44; in which heads and bodies may be close and legs held away. One of our Smooth rhythms";
		$tango_international->save();
		
		$tap = new Word;
		$tap->dance_term = "Tap";
		$tap->abbreviation = "";
		$tap->definition = "Touch the toe to the floor sharply&#44; but do not step or take weight.";
		$tap->save();
		
		$tempo = new Word;
		$tempo->dance_term = "Tempo";
		$tempo->abbreviation = "";
		$tempo->definition = "The speed at which music is played; the number of measures or bars per minute. Sometimes given as beats per minute.";
		$tempo->save();
		
		$third_foot_position = new Word;
		$third_foot_position->dance_term = "Third Foot Position";
		$third_foot_position->abbreviation = "";
		$third_foot_position->definition = "The heel of one foot is placed against the instep of the other. The turned-out foot positions&#44; first through fifth&#44; go back to old time dancing and ballet. Today&#44; we step straight forward or back (see &ldquo;parallel foot position&rdquo;).";
		$third_foot_position->save();
		
		$third_foot_position_rear = new Word;
		$third_foot_position_rear->dance_term = "Third Foot Position Rear";
		$third_foot_position_rear->abbreviation = "";
		$third_foot_position_rear->definition = "The instep of one foot is placed close to the heel of the other. This position represents a nice tango closing step&#44; although we tend not to use this much turn-out.";
		$third_foot_position_rear->save();
		
		$through = new Word;
		$through->dance_term = "Through";
		$through->abbreviation = "thru";
		$through->definition = "With the free foot being the inner or the one nearer your partner&#44; bring that free foot between you and your partner and take weight. If you are in semi-closed position&#44; the man&rsquo;s (leader&rsquo;s) right foot will precede the woman&rsquo;s (follower&rsquo;s) left foot.";
		$through->save();
		
		$tilt = new Word;
		$tilt->dance_term = "Tilt";
		$tilt->abbreviation = "";
		$tilt->definition = "To lean or slant the body&#44; usually sideways. Compare to sway.";
		$tilt->save();
		
		$time = new Word;
		$time->dance_term = "Time";
		$time->abbreviation = "";
		$time->definition = "The number of beats per measure of music. Waltz music is 3/4 time or three quarter-notes per measure.";
		$time->save();
		
		$timing = new Word;
		$timing->dance_term = "Timing";
		$timing->abbreviation = "";
		$timing->definition = "The number of beats of music devoted to a dance step. The first step of most foxtrot figures is given two beats and is designated as a &ldquo;slow.&rdquo; The second step is usually given one beat and is designated as a &ldquo;quick.&rdquo; The second step of a chasse is given 1/2 beat and is designated as an &ldquo;&.&rdquo; The timing of this whole figure might be &ldquo;sq&q.&rdquo;";
		$timing->save();
		
		$tipple = new Word;
		$tipple->dance_term = "Tipple";
		$tipple->abbreviation = "";
		$tipple->definition = "A tipple is a tipping of the shoulders toward the direction of movement. In a tipple chasse&#44; one might do the chasse down line of dance while briefly inclining the shoulders toward line with right side stretch.";
		$tipple->save();
		
		$toe = new Word;
		$toe->dance_term = "Toe";
		$toe->abbreviation = "T";
		$toe->definition = "The most forward part of the foot. A backward step might be taken&#44; &ldquo;toe-flat.&rdquo; Also&#44; touch the toe to the floor; no weight change.";
		$toe->save();
		
		$toe_spin = new Word;
		$toe_spin->dance_term = "Toe Spin";
		$toe_spin->abbreviation = "T spn";
		$toe_spin->definition = "Rise to toe of supporting foot&#44; commence turn&#44; bring free foot to supporting foot&#44; continue turning on toes; one weight change. As in a heel turn&#44; delay the weight change. Counting the beats&#44; you will step heel to toe on beat 1&#44; spin on the right toe/ continue to spin on 2&#44; and close to left toe/ and finally step forward on right toe on 3;";
		$toe_spin->save();
		
		$together = new Word;
		$together->dance_term = "Together";
		$together->abbreviation = "tog";
		$together->definition = "From a position in which your are some distance from your partner&#44; step toward partner and shift weight to that foot. Also used to refer to multiple steps. In a Two Step&#44; you might &ldquo;circle away&rdquo; from your partner a short distance (3 weight changes). The cue &ldquo;together&rdquo; would ask you to two-step back toward partner&#44; completing the circle.";
		$together->save();
		
		$top_line = new Word;
		$top_line->dance_term = "Top Line";
		$top_line->abbreviation = "";
		$top_line->definition = "In a dance position&#44; the line created by the head&#44; neck&#44; shoulders&#44; arms&#44; and hands.";
		$top_line->save();
		
		$touch = new Word;
		$touch->dance_term = "Touch";
		$touch->abbreviation = "tch";
		$touch->definition = "Bring free foot to the supporting foot&#44; and touch the floor at the instep or ball of the supporting foot. Do not step or take weight.";
		$touch->save();
		
		$trail_foot = new Word;
		$trail_foot->dance_term = "Trail Foot";
		$trail_foot->abbreviation = "trl ft";
		$trail_foot->definition = "Man&rsquo;s (leader&rsquo;s) right&#44; woman&rsquo;s (follower&rsquo;s) left";
		$trail_foot->save();
		
		$trail_hand = new Word;
		$trail_hand->dance_term = "Trail Hand";
		$trail_hand->abbreviation = "trl hnd";
		$trail_hand->definition = "Man&rsquo;s (leader&rsquo;s) right&#44; woman&rsquo;s (follower&rsquo;s) left";
		$trail_hand->save();
		
		$transition = new Word;
		$transition->dance_term = "Transition";
		$transition->abbreviation = "trans";
		$transition->definition = "In a figure&#44; an extra step or one fewer steps by the man (leader) or woman (follower). A couple transitions from opposite footwork to same footwork or from same to opposite.";
		$transition->save();
		
		$traveling = new Word;
		$traveling->dance_term = "Traveling";
		$traveling->abbreviation = "trav";
		$traveling->definition = "Progressing or moving forward or in any direction. Sometimes used as an adjective to describe a figure executed with extra progression and/or with an extra step&#44; or with syncopated timing&#44; such as 1&#44; 2/&&#44; 3; in waltz or S&#44; -&#44; Q/&&#44; Q; in foxtrot (see &ldquo;running&rdquo;)";
		$traveling->save();
		
		$triple = new Word;
		$triple->dance_term = "Triple";
		$triple->abbreviation = "tripl";
		$triple->definition = "The portion of the standard timing of a rhythm consisting of three steps taken over two beats of music (Q&Q or QaQ) as is characteristic of Jive&#44; Cha Cha&#44; and other rhythms. Notice that the timing of these three steps is not even. The &ldquo;Q&&rdquo; divides one beat evenly&#44; leaving the second beat undivided for a time value of 1/8&#44; 1/8&#44; 1/4 (in 4/4 time). The &ldquo;a&rdquo; is a shorter interval&#44; and the time value of a &ldquo;QaQ&rdquo; triple is 3/16&#44; 1/16&#44; 1/4. Syncopations&#44; like the chasses in Waltz and Foxtrot&#44; are not considered to be triples.";
		$triple->save();
		
		$triplet = new Word;
		$triplet->dance_term = "Triplet";
		$triplet->abbreviation = "";
		$triplet->definition = "Three steps taken evenly over two beats of music. The time value of these three steps would be 2/3&#44; 2/3&#44; 2/3 (in 4/4 music). (See &ldquo;triple&rdquo; above.)";
		$triplet->save();
		
		$tumble = new Word;
		$tumble->dance_term = "Tumble";
		$tumble->abbreviation = "";
		$tumble->definition = "From a strong &ldquo;up&rdquo; or toe position&#44; slip small forward L (W bk R) turning LF to closed position with slight right sway. Lower dramatically and change to strong left sway&#44; checking. One weight change only.";
		$tumble->save();
		
		$turn = new Word;
		$turn->dance_term = "Turn";
		$turn->abbreviation = "trn";
		$turn->definition = "Step and change your facing direction&#44; specifically the direction in which your feet are pointing.";
		$turn->save();
		
		$turn_away = new Word;
		$turn_away->dance_term = "Turn Away";
		$turn_away->abbreviation = "trn awy";
		$turn_away->definition = "An individual movement involving a step and a turn away from partner.";
		$turn_away->save();
		
		$turn_in = new Word;
		$turn_in->dance_term = "Turn In";
		$turn_in->abbreviation = "trn in";
		$turn_in->definition = "An individual movement involving a step and a turn to partner.";
		$turn_in->save();
		
		$turn_out = new Word;
		$turn_out->dance_term = "Turn Out";
		$turn_out->abbreviation = "trn out";
		$turn_out->definition = "An individual movement involving a step and a turn away from partner.";
		$turn_out->save();
		
		$turn_toward = new Word;
		$turn_toward->dance_term = "Turn Toward";
		$turn_toward->abbreviation = "trn twd";
		$turn_toward->definition = "An individual movement involving a step and a turn to partner.";
		$turn->save();
		
		$twinkle = new Word;
		$twinkle->dance_term = "Twinkle";
		$twinkle->abbreviation = "twkl";
		$twinkle->definition = "Step in a given direction. Then close and step in another direction. A two-directional chasse and a 1/4 to 1/2 change of facing direction.";
		$twinkle->save();
		
		$twist = new Word;
		$twist->dance_term = "Twist";
		$twist->abbreviation = "twst";
		$twist->definition = "Turn the upper body; no weight change. Or rotate the hips independently of the upper body&mdash;puts a &ldquo;twist&rdquo; in the torso&mdash;as in a &ldquo;hip twist&rdquo; or a &ldquo;lunge and twist.&rdquo;";
		$twist->save();
		
		$two_step_term = new Word;
		$two_step_term->dance_term = "Two Step";
		$two_step_term->abbreviation = "TS";
		$two_step_term->definition = "One of the Smooth Rhythms";
		$two_step_term->save();
		
		$underturn = new Word;
		$underturn->dance_term = "Underturn";
		$underturn->abbreviation = "undrtrn";
		$underturn->definition = "Less than the normal amount of turn.";
		$underturn->save();
		
		$unwind = new Word;
		$unwind->dance_term = "Unwind";
		$unwind->abbreviation = "";
		$unwind->definition = "An individual action. Beginning with legs crossed and weight on the heel of the forward foot and on the ball of the back foot&#44; rotate the body to uncross the legs. The specified weight distribution causes the feet to end parallel and together. Generally&#44; you will change weight to the foot that initially moved to the crossed position. Also a couple action. Usually&#44; the man (leader) will be in the hooked position&#44; in banjo or sidecar&#44; and the woman (follower) will walk around him&#44; &ldquo;unwinding&rdquo; him.";
		$unwind->save();
		
		$unwrap = new Word;
		$unwrap->dance_term = "Unwrap";
		$unwrap->abbreviation = "unwrp";
		$unwrap->definition = "From wrapped position&#44; woman (follower) in front&#44; release lead hands&#44; and the woman (follower) turns right face to a designated position.";
		$unwrap->save();

		$up_beat = new Word;
		$up_beat->dance_term = "Up beat";
		$up_beat->abbreviation = "";
		$up_beat->definition = "An unaccented beat in a musical measure&#44; especially the last beat of the measure.";
		$up_beat->save();

		$modification_word = new Word;
		$modification_word->dance_term = "Modification";
		$modification_word->abbreviation = "mod";
		$modification_word->definition = "A change to a standard figure or to a sequence.";
		$modification_word->save();

		$variation_word = new Word;
		$variation_word->dance_term = "Variation";
		$variation_word->abbreviation = "mod";
		$variation_word->definition = "A change to a standard figure or to a sequence.";
		$variation_word->save();

		$viennese_waltz = new Word;
		$viennese_waltz->dance_term = "Viennese Waltz";
		$viennese_waltz->abbreviation = "VW";
		$viennese_waltz->definition = "The original form of the waltz&#44; it was the first ballroom dance performed in the closed hold or &ldquo;waltz&rdquo; position. It is danced at about 60 measures per minute&#44; much faster than the waltz&#44; at only 30. One of our Smooth Rhythms";
		$viennese_waltz->save();

		$walk = new Word;
		$walk->dance_term = "Walk";
		$walk->abbreviation = "";
		$walk->definition = "Sometimes&#44; a step taken on two beats of music; a slow.";
		$walk->save();

		$wall = new Word;
		$wall->dance_term = "Wall";
		$wall->abbreviation = "WALL";
		$wall->definition = "The direction to the right&#44; as one faces line of dance; toward the near wall of the room.";
		$wall->save();

		$waltz_word = new Word;
		$waltz_word->dance_term = "Waltz";
		$waltz_word->abbreviation = "WZ";
		$waltz_word->definition = "One of the Smooth Rhythms";
		$waltz_word->save();

		$weight = new Word;
		$weight->dance_term = "Weight";
		$weight->abbreviation = "wgt";
		$weight->definition = "To change weight or to take weight is to transfer the weight of the body from one foot to the other. The alternative is to &ldquo;touch&#44;&rdquo; to place the foot or a part of the foot but not transfer weight to that foot. One can also take partial weight&#44; usually on one beat&#44; preparatory to taking full weight on the next beat.";
		$weight->save();

		$west_coast_swing = new Word;
		$west_coast_swing->dance_term = "West Coast Swing";
		$west_coast_swing->abbreviation = "WC or WCS";
		$west_coast_swing->definition = "Derived from the Lindy Hop&#44; it is characterized by a distinctive elastic look that results from its basic extension-compression technique of partner connection&#44; and it is danced primarily in a slotted area on the dance floor. At clubs&#44; the dance allows for both partners to improvise steps while dancing together. Typically the follower walks into new patterns&#44; traveling forward on counts 1 and 2 of each basic pattern&#44; rather than rocking back&#44; as in East Coast Swing and Jive. One of the Latin Rhythms";
		$west_coast_swing->save();

		$wiggle = new Word;
		$wiggle->dance_term = "Wiggle";
		$wiggle->abbreviation = "";
		$wiggle->definition = "Move the hips rapidly side to side or in a figure-eight movement.";
		$wiggle->save();

		$wrap = new Word;
		$wrap->dance_term = "Wrap";
		$wrap->abbreviation = "wrp";
		$wrap->definition = "In an open or butterfly position&#44; the woman (follower) turns left face to face the same direction as the man (leader). Hold trail hands&#44; so the man&rsquo;s (leader&rsquo;s) right arm is wrapped around her (the follower&rsquo;s) back&#44; and the woman&rsquo;s (follower&rsquo;s) left arm is wrapped in front of her (the follower&rsquo;s) body. Join the free lead hands in front about chest height. This is Wrapped Position.";
		$wrap->save();
	
	}
	
}