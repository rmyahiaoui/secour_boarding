<?php
/**
 * Created by redouane YAHIAOUI.
 * Date: 23/04/2020
 * Time: 10:00
 */

require_once 'vendor/secourBoarding/load.php';

$secourBoarding = new SecourBoarding('boarding.json');
echo $secourBoarding->getItinerary();