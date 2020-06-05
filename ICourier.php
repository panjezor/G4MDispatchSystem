<?php


namespace App;

/** Interface for every courier to implement.
 * This could be done dynamically, however requires blueprinting every possible way of sending consingnment IDs over, therefore not sustainable for this project.
 * Interface ICourier
 */
interface ICourier
{

    /** Function that returns a valid ID for their system, we assume this function to be either a straight function call or a curl request for ID on API.
     * @return int
     */
    public static function getConsignmentID(): int;

    /** Return the name of the courier company.
     * Side-note: this could be omitted, and just kept as "classname"::static for name return, it's just a preference to have it written down somewhere.
     * @return String
     */
    public static function getName(): String;

    /** Send consignment IDs to the Courier's API SOMEHOW.
     * @param array $orders
     * @return boolean
     */
    public function sendConsignmentList(array $orders): bool;

}