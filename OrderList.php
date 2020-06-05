<?php

namespace App;

require_once("Order.php");

/** Class equivalent of the database.
 * Class OrderList
 * @package App
 */
class OrderList
{
    /** @var array of Orders, grouped by Couriers */
    private $orders;

    /** initialize orders array.
     * OrderList constructor.
     */
    public function __construct()
    {
        $this->orders = [];
    }

    /** Add a courier.
     * @param $courierName
     * @return $this
     * @throws \Exception
     */
    public function addCourier($courierName)
    {
        // Check for Couriers being already in the array.
        if (isset($this->orders[$courierName])) {
            throw new \Exception("This courier is already there.");
        }
        // create a new holder for the courier and return this for object chaining.
        $this->orders[$courierName] = [];
        return $this;
    }

    public function addOrder(String $courierName, String $courierPath, array $data)
    {
        //initialize order and set the data.
        $order = new Order();
        $order->data = $data;
        /** @var ICourier $courierPath */
        $consID = $courierPath::getConsignmentID();
        $this->orders[$courierName][$consID] = $order;
    }

    public function getOrders()
    {
        return $this->orders;
    }

    public function getOrdersByCourier(String $courierName)
    {
        return $this->orders[$courierName];
    }


}