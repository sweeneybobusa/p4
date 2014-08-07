<?php

class WordController extends BaseController {


	/*-------------------------------------------------------------------------------------------------
	check if authorized user
	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		
		# Make sure BaseController construct gets called
		parent::__construct();		
		
		# Only logged in users should have access to this controller
		$this->beforeFilter('guest', array('only' => array('getSearch','postSearch')));
		
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	search for word
	-------------------------------------------------------------------------------------------------*/
	public function getIndex() {
				
			$query="";
			$words = Word::all();
		
		return View::make('word_index')
				->with('words', $words)
				->with('query', $query);
				
		
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	http://localhost/word/search
	-------------------------------------------------------------------------------------------------*/
	public function postSearch() {
		
		$query  = Input::get('query');
		
		# Do the actual query
	    $words  = Word::search($query);
	        
		$results = '';	        
		foreach($words as $word) {
				# Created a "stub" of a view called word_search_result.php; all it is is a stub of code to display a word
			# For each word, we'll add a new stub to the results
			$results .= View::make('word_search_result')->with('words', $words)->render();   
		}
	        
		# Return results.
		return $results;
	}

	
	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function getEdit($id) {
		
		$word = Word::findOrFail($id);
									
		return View::make('word_edit')
			->with('word', $word);
		
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	Post Edit
	-------------------------------------------------------------------------------------------------*/
	public function postEdit($id) {
		
		$word = Word::findOrFail($id);
		$word->fill(Input::all());
		$word->save();
		
		return Redirect::action('WordController@getIndex')->with('flash_message','Your word changes have been saved.');
		
	}
	
	/*-------------------------------------------------------------------------------------------------
	Get Create
	-------------------------------------------------------------------------------------------------*/
	public function getCreate() {
	
		return View::make('word_create')
			->with('word', $word);
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function postCreate() {
		
		# Instantiate the word model
		$word = new Word();
		
		$word->fill(Input::all());
		$word->save();
		
		# Magic: Eloquent
		$word->save();
		
		return Redirect::action('WordController@getIndex')->with('flash_message','Your word has been added.');

	}
	
}
