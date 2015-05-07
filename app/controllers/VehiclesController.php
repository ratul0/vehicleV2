<?php

class VehiclesController extends \BaseController {


	public function search(){
		$data = Met_make_lkup::lists('make_nm', 'id');
		return View::make('vehicles.search')
					->with('make',$data);
	}

	public function doSearch(){
		//return Input::all();
		$vehicles = DB::table('vehicle')
					->join('account', 'vehicle.seller_id', '=', 'account.id')
					->where('vehicle.make','=',Met_make_lkup::getMake(Input::get('make')))
					->where('vehicle.model','=',Met_model_lkup::getModel(Input::get('model')))
					->where('vehicle.year','=',Input::get('year'))
					->where('account.zip','=',Input::get('zip'))
					->where('vehicle.STATE_STATUS','=',Vehicle::STATE_STATUS_ENABLED)
					->where('account.STATE_STATUS','=',Account::STATE_STATUS_ENABLED)
					->select('vehicle.make', 'vehicle.model', 'vehicle.year')
					->get();
		$paginate = Paginator::make($vehicles, count($vehicles), 16);
		return View::make('vehicles.index')
					->with('vehicles',$paginate);
	}

}
