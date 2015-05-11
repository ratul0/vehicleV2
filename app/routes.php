<?php

Route::get('/',function(){
	return Redirect::route('vehicle.search');

});

Route::get('search', ['as' => 'vehicle.search', 'uses' => 'VehiclesController@search']);
Route::post('search', ['as' => 'vehicle.doSearch', 'uses' => 'VehiclesController@doSearch']);


Route::get('api/dropdown', function(){
	$input = Input::get('id');
	$model = Met_model_lkup::getModels($input);
	return Response::json($model);
});

Route::get('test',function(){

	Session::flush();
	return DB::table('vehicle')
				->join('account', 'vehicle.seller_id', '=', 'account.id')
				->where('vehicle.STATE_STATUS','=',Vehicle::STATE_STATUS_ENABLED)
				->where('account.STATE_STATUS','=',Account::STATE_STATUS_ENABLED)
				->select('vehicle.make', 'vehicle.model', 'vehicle.year')
				->get();



});

