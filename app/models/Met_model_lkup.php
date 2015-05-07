<?php

class Met_model_lkup extends \Eloquent {
	protected $fillable = [];
	protected $table = 'met_model_lkup';

	public static function getModels($make_id){
		//    Produce JSON
		$mu  = '<option value="' . '"></option>';
		$mods = Self::where('make_id', '=', $make_id)->lists('model_nm',"id");
		if($mods) {		
			/*foreach ($mods as $mod) {
				$mu  .= '<option value="';
				$mu  .= $mod->id;
				$mu  .= '">';
				$mu  .= $mod->model_nm;
				$mu  .= '</option>';
			}*/
			//return json_encode(array('mods' => $mu));
			return json_encode($mods);
		} else {
			return "ERROR";
		}
	}

	public static function getModel( $model_id ){
		//    Return the model name given the key

		$model_name = Self::where('id', '=', $model_id)->first();
		if( $model_name ) {
			return $model_name->model_nm;
		}
	}
}