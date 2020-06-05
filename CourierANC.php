<?php

namespace App;

require_once("ICourier.php");

class CourierANC implements ICourier
{
    /** Function that returns a valid ID for their system, we assume this function to be either a straight function call or a curl request for ID on API.
     * @return int
     */
    public static function getConsignmentID(): int
    {
        return rand(10, 50);
    }

    /** Return the name of the courier company.
     * @return String
     */
    public static function getName(): String
    {
        return static::class;
    }


    /** Send consignment IDs to the Courier's API SOMEHOW.
     * @param array $orders
     * @return boolean
     */
    public function sendConsignmentList(array $orders): bool
    {
        //foreach order in orders send the key over to the courier
        var_dump("ANC", $orders);
        return true; //if sent then true, if not then false.
    }
}