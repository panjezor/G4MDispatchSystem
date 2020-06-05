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
        // Check for Couriers being already in the array. If it is it might already have some orders.
        if (isset($this->orders[$courierName])) {
            throw new \Exception("This courier is already there.");
        }
        // create a new holder for the courier and return this for object chaining.
        $this->orders[$courierName] = [];
        return $this;
    }

    /** Add a new order. Requires a couriername, courierpath and the data as an array.
     * final version wouldnt require courierpath, but heck - autoloader.
     * @param String $courierName
     * @param String $courierPath
     * @param array $data
     */
    public function addOrder(String $courierName, String $courierPath, array $data = [])
    {
        //initialize order and set the data.
        $order = new Order();
        $order->data = $data;
        /** @var ICourier $courierPath */
        $consID = $courierPath::getConsignmentID();
        $this->orders[$courierName][$consID] = $order;
    }

    /** Get all orders
     * @return array
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /** get the array of parcels
     * @param String $courierName
     * @return mixed
     */
    public function getOrdersByCourier(String $courierName)
    {
        return $this->orders[$courierName];
    }


}