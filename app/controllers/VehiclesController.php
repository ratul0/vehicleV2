<?php

class VehiclesController extends \BaseController {


	public function search(){
		$data = Met_make_lkup::orderBy('make_nm', 'DESC')->lists('make_nm', 'id');
		return View::make('vehicles.search')
					->with('make',$data);
	}

	public function doSearch(){

		$data = Input::all();
		Session::push('vehicle.make', Met_make_lkup::getMake($data['make']));
		$vehicles = DB::table('vehicle')
					->join('account', 'vehicle.seller_id', '=', 'account.id')
					->where('vehicle.STATE_STATUS','=',Vehicle::STATE_STATUS_ENABLED)
					->where('account.STATE_STATUS','=',Account::STATE_STATUS_ENABLED)
					->where('vehicle.make', '=', Met_make_lkup::getMake($data['make']))
					->where('vehicle.public_at', '<', date('Y-m-d H:i:s'))
					->select('vehicle.make', 'vehicle.model', 'vehicle.year');

		if($data['model'] && !$data['year'] && !$data['zip'] ){
			$vehicles->where('vehicle.model', '=', Met_model_lkup::getModel($data['model']));
			Session::push('vehicle.model', Met_model_lkup::getModel($data['model']));
		}elseif(!$data['model'] && $data['year'] && !$data['zip'] ){
			$vehicles->where('vehicle.year','=',$data['year']);
			Session::push('vehicle.year',$data['year']);
		}elseif(!$data['model'] && !$data['year'] && $data['zip']){
			$vehicles->where('account.zip','=',$data['zip']);
			Session::push('vehicle.zip',$data['zip']);
		}elseif($data['model'] && $data['year'] && !$data['zip']){
			$vehicles->where('vehicle.model', '=', Met_model_lkup::getModel($data['model']));
			$vehicles->where('vehicle.year','=',$data['year']);

			Session::push('vehicle.model', Met_model_lkup::getModel($data['model']));
			Session::push('vehicle.year',$data['year']);
		}elseif(!$data['model'] && $data['year'] && $data['zip']){
			$vehicles->where('account.zip','=',$data['zip']);
			$vehicles->where('vehicle.year','=',$data['year']);

			Session::push('vehicle.zip',$data['zip']);
			Session::push('vehicle.year',$data['year']);
		}elseif($data['model'] && !$data['year'] && $data['zip']){
			$vehicles->where('account.zip','=',$data['zip']);
			$vehicles->where('vehicle.model', '=', Met_model_lkup::getModel($data['model']));

			Session::push('vehicle.zip',$data['zip']);
			Session::push('vehicle.model', Met_model_lkup::getModel($data['model']));
		}

		$result = $vehicles->get();
		//print_r(DB::getQueryLog());

		//all previous search data is stored in session this should fulfill your new criteria.
		print_r(Session::all());
		$paginate = Paginator::make($result, count($result), 16);
		return View::make('vehicles.index')
					->with('vehicles',$paginate);
	}

}
