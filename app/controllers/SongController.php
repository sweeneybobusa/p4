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
		Index page
	-------------------------------------------------------------------------------------------------*/
	public function getIndex() {
			
		$query  = Input::get('query');
		$message = "";
		# If there is a query, search the library with that query
		if($query) {
		
			$message = " was successfull!";
			# Eager load tags and artist
	 		$songs = Song::with('tags','artist')
	 			->whereHas('artist', function($q) use($query) {
			    	$q->where('artist_name', 'LIKE', "%$query%");
					}
				)
				->orWhereHas('tags', function($q) use($query) {
			    	$q->where('name', 'LIKE', "%$query%");
					}
				)
				->orWhere('song_title', 'LIKE', "%$query%")
				->orWhere('year', 'LIKE', "%$query%")
				->orderBy('song_title')
				->get();
				
		}
		# Otherwise, just fetch all songs
		else {
			# Eager load tags and artist
			$songs = Song::with('tags','artist')
				->orderBy('song_title')
				->get();
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

