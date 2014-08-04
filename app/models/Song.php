<?php 

class Song extends Eloquent { 

	# The guarded properties specifies which attributes should *not* be mass-assignable
	protected $guarded = array('id', 'created_at', 'updated_at');

	# Relationship method...
    public function artist() {
    
    	# Books belongs to Artist
	    return $this->belongsTo('Artist');
    }
    
    # Relationship method...
    public function tags() {
    
    	# Books belong to many Tags
        return $this->belongsToMany('Tag');
    }
    
    # Quick and dirty debugging method for dumping out the Book collection
    # Used in the various demo routes
    public static function pretty_debug($songs) {

		# If it's an array...
		if(count($songs) > 1) {
			foreach($songs as $song) {
				echo $song->song_title."<br>";
			}
		}
		# If it's a string...
		else {
			echo $songs->song_title;
		}
	}


	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public static function search($query) {

		# If there is a query, search the library with that query
		if($query) {

			# Eager load tags and author
	 		$Songs = Song::with('tags','artist')
	 		->whereHas('artist', function($q) use($query) {
			    $q->where('artist_name', 'LIKE', "%$query%");
			})
			->orWhereHas('tags', function($q) use($query) {
			    $q->where('dance_tag', 'LIKE', "%$query%");
			})
			->orWhere('song_title', 'LIKE', "%$query%")
			->get();

		}
		# Otherwise, just fetch all books
		else {
			# Eager load tags and author
			$songs = Song::with('tags','artist')->get();
		}

		return $songs;	
	}


}