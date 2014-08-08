<?php

class WordController extends \BaseController {

	/*-------------------------------------------------------------------------------------------------
	check if authorized user
	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		
		# Make sure BaseController construct gets called
		parent::__construct();		
		
		# Only logged in users should have access to this controller
		$this->beforeFilter('auth', array('only' => array('create','store','edit','delete','update')));
		
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		# check for query
		$query = Input::get('query');
		# default message - if query it is filled, else it is null
		$message = '';
		
		if('query') {
			$message = " was successful! I found it in ";
			$words = Word::Where('dance_term', 'LIKE', "%$query%")
				->orWhere('abbreviation', 'LIKE', "%$query%")
				->orderBy('dance_term')
				->get();
			if(count($words) == 0) {
				$message = " had no results, perhaps you can find it in the following ";
				$words = Word::whereNotNull('dance_term')
					->orderBy('dance_term')
					->get();
				}
			}
		
		
		#if no query get full database
		else {
				$message = "Take a gander at all the vocabulary words we know: all ";
				$words = Word::whereNotNull('dance_term')
				->orderBy('dance_term')
				->get();
			}
		
		return View::make('word_index')
				->with('words', $words)
				->with('message', $message)
				->with('query', $query);
			

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('word_create');
	
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		# Instantiate the word model
		$word = new Word();
		$word->fill(Input::all());
		$word->save();
		
		# Magic: Eloquent
		$word->save();
		
		return Redirect::action('WordController@index')->with('flash_message','Your word has been added.');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
	
		try {
			$word = Word::findOrFail($id);
			}
			
		catch(Exception $e) {
			return Redirect::to('/word')->with('flash_message', 'Word not found');
			}

		return View::make('word_index')->with('word', $word);
		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 
	public function edit($id) {

		# check if id is there
		$word = Word::findOrFail($id);
		
		# else {return 
		return View::make('word_edit')
			->with('word', $word);
			

	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{	
		$word = Word::findOrFail($id);
		$word->fill(Input::all());
		$word->save();
		return Redirect::action('WordController@index')->with('flash_message','Your word changes have been saved.');	
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
			try {
			$word = Word::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/word')->with('flash_message', 'Word not found');
		}
		$word_deleted = "The word, " . $word->dance_term . ", has been deleted.";
		# Note there's a `deleting` Model event which makes sure song_tag entries are also destroyed
		Word::destroy($id);
				
		return Redirect::action('WordController@index')->with('flash_message', $word_deleted);

	}


}
