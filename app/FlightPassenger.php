<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FlightBooking;
use App\FlightPayment;

class FlightPassenger extends Model
{
    protected $table = 'flight_passenger';

    //Relationship
    public static function payment($related_flight_id)
    {
    	return FlightPayment::where('related_flight_id', '=', $related_flight_id )->first();
    }
    
    public static function booking($flight_booking_id)
    {
    	return FlightBooking::where('flight_booking_id', '=', $flight_booking_id )->get();
    }
    
}

/*

CREATE TABLE `flight_passenger` (
  `id` int(11) NOT NULL,
  `related_flight_id` varchar(255) NOT NULL,
  `people_name` varchar(255) NOT NULL,
  `people_passport` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `flight_passenger`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `flight_passenger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `flight_passenger` ADD `flight_booking_id` INT(11) NOT NULL AFTER `related_flight_id`;

ALTER TABLE `flight_passenger` ADD `seat` VARCHAR(255) NULL DEFAULT NULL AFTER `people_passport`;

 */

