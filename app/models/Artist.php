<?php 

class Artist extends Eloquent { 


	/**
	* Relationship method
	*/
    public function songs() {
    
    	# Artist has many songs
	    return $this->hasMany('Song');
    }
    
	/**
	* Gets the artists as a id -> name key value pair. Useful for building selects.
	*/
	public static function getIdNamePair() {
		
		$artists    = Array();
		
		$collection = Artist::all();	
	
		foreach($collection as $artist) {
			$artists[$artist->id] = $artist->artist_name;
		}	
		
		return $artists;	
	}

}