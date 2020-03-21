<?php

include_once 'config.php';

$tweets_controller = new TweetsController();
$years = array(2014,2015,2016,2017,2018,2019,2020);
foreach($years as $year){
    echo "START Working on ".$year."<br>";
    $tweets_controller->importTweetsToDbByYear($year);
    echo "END ".$year."<br><br>";
    sleep(2);
}

?>