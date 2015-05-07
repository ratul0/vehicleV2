<?php

class Account extends \Eloquent {
	protected $guarded = ['id'];
	protected $table = 'account';

	//    state_type column values
	const STATE_TYPE_BUYER = 'BUYER';                  // Member who intends to buy a vehicle
	const STATE_TYPE_SELLER = 'SELLER';                // Member who intends to sell a vehicle
	const STATE_TYPE_BUYER_SELLER = 'BUYER_SELLER';    // Member who intends to buy and sell a vehicle
	const STATE_TYPE_LENDER = 'LENDER';                // Loan Officer / Portfolio Manager
	const STATE_TYPE_AUTO_TECH = 'AUTO_TECH';          // Auto Technician
	const STATE_TYPE_SERVICE_REP = 'SERVICE_REP';      // Customer Service
	const STATE_TYPE_ADMIN = 'ADMIN';                  // System Administration

	//    state_stage column values
	const STATE_STAGE_INACTIVE = 'INACTIVE';           // Has not logged in - UID token in query string has not been Activated ( or 6 failed Sign In attempts)
	const STATE_STAGE_ACTIVE = 'ACTIVE';               // Has logged in - UID token in query string has been Activated
	const STATE_STAGE_PROFILED = 'PROFILED';           // Has a valid profile (check zip)

	//    state_status column values
	const STATE_STATUS_ENABLED = 'ENABLED';            //
	const STATE_STATUS_DISABLED = 'DISABLED';          //
	const STATE_STATUS_ARCHIVED = 'ARCHIVED';          //
}