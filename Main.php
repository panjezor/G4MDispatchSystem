<?php

namespace App;

use Exception;

//that wouldnt be required if I had an autoloader.
// I am really not used to this old-school way of programming as we can see.
require_once("CourierANC.php");
require_once("CourierRM.php");
require_once("OrderList.php");

class Main
{
    // Variable for holding orders
    public \App\OrderList $orderList;
    // Variable for holding all the couriers with paths.
    public $couriers;
    // Start the day and prepare what you have to.


    /** Initialize the orderlist for today
     * @throws Exception
     */
    public function startBatch(array $couriers): void
    {
        //this would rather create a new "day" in the database per se.
        // this particular case keeps it in a variable for simplicity of the task.
        $this->orderList = new \App\OrderList();
        foreach ($couriers as $courier) {
            $this->couriers[$courier] = "App\\" . $courier;
            $this->orderList->addCourier($courier);
        }
    }

    /** Add a new order to the list for the appropriate courier and use the algorithm based on them.
     * @param String $courier
     * @param array $data
     */
    public function addConsignment(String $courier, array $data = []): void
    {
        // check if the day has been started.
        $this->orderList->addOrder($courier, $this->couriers[$courier], $data);
    }

    // Finish the day, send all the batches to the appropriate couriers
    public function endBatch(): void
    {
        // check if the day has been started

        $couriers = $this->couriers;
        foreach ($couriers as $key => $courier) {
            /** @var ICourier $courierObj */
            $courierObj = new $courier();
            $orders = $this->orderList->getOrdersByCourier($key);
            $courierObj->sendConsignmentList($orders);
        }

    }
}