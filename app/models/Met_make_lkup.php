<?php

class Met_make_lkup extends \Eloquent {
	protected $fillable = [];
	protected $table = 'met_make_lkup';

	public static function getMake( $make_id ){
		//    Return the make name given the key

		$make_name = Self::where('id', '=', $make_id)->first();
		if( $make_name ) {
			return $make_name->make_nm;
		}
	}
}