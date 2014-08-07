<?php

class SongController extends BaseController {


	/*-------------------------------------------------------------------------------------------------
	Check if authenticated
	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		
		# Make sure BaseController construct gets called
		parent::__construct();		
		
		# Only logged in users should have access to this controller
		$this->beforeFilter('auth');
		
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	Search for songs
	-------------------------------------------------------------------------------------------------*/
	public function getSearch() {
				
		return View::make('song_search');
		
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	http://localhost/song/search
	-------------------------------------------------------------------------------------------------*/
	public function postSearch() {
		
		if(Request::ajax()) {
		
			$query  = Input::get('query');
			
			# Do the actual query
	        $songs  = Song::search($query)
	        	->orderBy('song_title')
	        ;
	        
	        # loop through the results building the HTML View we'll return
		 	$results = '';	        
			foreach($songs as $song) {
				
				# Created a "stub" of a view called song_search_result.php; all it is is a stub of code to display a song
				# For each song, we'll add a new stub to the results
				$results .= View::make('song_search_result')->with('song', $song)->render();   
				
				return $results;

		}
		}
	}


	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function getIndex() {
			
		$query  = Input::get('query');
		
		# If there is a query, search the library with that query
		if($query) {
		
			# Eager load tags and artist
	 		$songs = Song::search($query);
		
			$songs = Song::with('tags','artist')
	 		->whereHas('artist', function($q) use($query) {
			    $q->where('artist_name', 'LIKE', "%$query%");
			})
			->orWhereHas('tags', function($q) use($query) {
			    $q->where('name', 'LIKE', "%$query%");
			})
			->orWhere('song_title', 'LIKE', "%$query%")
			->orWhere('year', 'LIKE', "%$query%")
			->get();
					 		   	 		   		
		}
		# Otherwise, just fetch all songs
		else {
			# Eager load tags and artist
			$songs = Song::with('tags','artist')->get();
		}
		
		return View::make('song_index')
				->with('songs', $songs)
				->with('query', $query);
		
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	Get Edit
	-------------------------------------------------------------------------------------------------*/
	public function getEdit($id) {
		
		$song = Song::with('artist')->findOrFail($id);
				
		$artists = Artist::getIdNamePair();
						
		return View::make('song_edit')
			->with('song', $song)
			->with('artists', $artists);
		
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	Post Edit
	-------------------------------------------------------------------------------------------------*/
	public function postEdit($id) {
		
		$song = Song::findOrFail($id);
		$song->fill(Input::all());
		$song->save();
		
		return Redirect::action('SongController@getIndex')->with('flash_message','Your changes have been saved.');
		
	}
	
	/*-------------------------------------------------------------------------------------------------
	Get Create
	-------------------------------------------------------------------------------------------------*/
	public function getCreate() {
	
		$artists = Artist::getIdNamePair();
	
		return View::make('song_create')->with('artists', $artists);
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	Post Create
	-------------------------------------------------------------------------------------------------*/
	public function postCreate() {
		
		# Instantiate the song model
		$song = new Song();
		
		$song->fill(Input::all());
		$song->save();
		
		# Magic: Eloquent
		$song->save();
		
		return Redirect::action('SongController@getIndex')->with('flash_message','Your song has been added.');

	}
	
}

