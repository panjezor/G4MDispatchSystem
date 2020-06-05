<?php

namespace App;
require_once("Main.php");
echo "<pre>";
$main = new Main();
$main->startBatch(["CourierRM", "CourierANC"]);
$main->addConsignment("CourierRM", ["color" => "blue"]);
$main->addConsignment("CourierANC", ["color" => "red"]);
$main->addConsignment("CourierANC", ["color" => "green"]);
$main->addConsignment("CourierRM", ["color" => "black"]);
$main->addConsignment("CourierRM", ["color" => "yellow"]);
$main->addConsignment("CourierRM", ["color" => "blue"]);
$main->addConsignment("CourierANC", ["color" => "blue"]);
$main->endBatch();
echo "done";