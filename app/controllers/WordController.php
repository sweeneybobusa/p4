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
	
		$query = Input::get('query');
		$words = Word::Where('dance_term', 'LIKE', $query)
			->orWhere('abbreviation', 'LIKE', $query)
			->orderBy('dance_term')
			->get();
			
		return View::make('word_index')
				->with('words', $words)
				->with('query', $query);
			
/*		$words = DB::table('words')->get();
		$query = Input::get('query');
		
		$words = Word::search($query);
		
		return View::make('word_index')
				->with('words', $words)
				->with('query', $query);
				
*/
				
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('word_create')
			->with('word', $word);}


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
	public function show($id)
	{
		try {
			$word = Word::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/word')->with('flash_message', 'Word not found');
		}

		return View::make('word_show')->with('word', $word);
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$word = Word::findOrFail($id);
						
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
		//
	}


}
