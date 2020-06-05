<?php

namespace App;

require_once("ICourier.php");

class CourierRM implements ICourier
{


    /** Function that returns a valid ID for their system, we assume this function to be either a straight function call or a curl request for ID on API.
     * @return int
     */
    public static function getConsignmentID(): int
    {
        return rand(100, 500);
    }

    /** Return the name of the courier company.
     * Side-note: this could be omitted, and just kept as "classname"::static for name return, it's just a preference to have it written down somewhere.
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
        var_dump("RM", $orders);
        return true;
    }
}