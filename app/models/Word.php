<?php

class Word extends Eloquent {
protected $guarded = array('id', 'created_at', 'updated_at');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'words';

}
