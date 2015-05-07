<?php

class Vehicle extends \Eloquent {

	protected $guarded = ['id'];
	protected $table = 'vehicle';

	//    state_stage column values
	const STATE_STAGE_NEW		= 'NEW';                   // Created (Make / Model / Year [Seller Email]) Stub
	const STATE_STAGE_VALIDATED	= 'VALIDATED';             // Make / Model / Year / VIN / Mileage / Title (Title, VIN and Odometer) image assets
	const STATE_STAGE_COMMITTED	= 'COMMITTED';             // Price is agreed (see offer transaction for amount)
	const STATE_STAGE_SOLD		= 'SOLD';                  // Sold via CarsYours.com
	const STATE_STAGE_RECEIVED	= 'RECEIVED';              // Buyer has possession
	const STATE_STAGE_DISPUTED	= 'DISPUTED';              // Buyer is disputing the condition of vehicle
	const STATE_STAGE_OBSOLETE	= 'OBSOLETE';              // No longer for sale
	//    Model Config
	const CNF_MAX_VEH_PER_MBR	= 8;						// Maximum number of vehicles per member (by seller_id)

	//  Vehicle State status

	const STATE_STATUS_ENABLED = 'ENABLED';            //
	const STATE_STATUS_DISABLED = 'DISABLED';          //
	const STATE_STATUS_ARCHIVED = 'ARCHIVED';          //

}