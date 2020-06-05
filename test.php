<?php

namespace App;
require_once("Main.php");
echo "<pre>";
//initialize main container
$main = new Main();
// begin the day
$main->startBatch(["CourierRM", "CourierANC"]);
// add consingnments
$main->addConsignment("CourierRM", ["color" => "blue"]);
$main->addConsignment("CourierANC", ["color" => "red"]);
$main->addConsignment("CourierANC", ["color" => "green"]);
$main->addConsignment("CourierRM", ["color" => "black"]);
$main->addConsignment("CourierRM", ["color" => "yellow"]);
$main->addConsignment("CourierRM", ["color" => "blue"]);
$main->addConsignment("CourierANC", ["color" => "blue"]);
//end the day
$main->endBatch();
echo "done";