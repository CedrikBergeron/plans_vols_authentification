<?php

require_once 'Modele/Plans_vol.php';

$tstPlans_vol = new Plans_vol;
$plans_vols = $tstPlans_vol->getPlans_vols();
echo '<h3>Test getPlans_vols : </h3>';
var_dump($plans_vols->rowCount());

echo '<h3>Test getPlans_vol : </h3>';
$plans_vol =  $tstPlans_vol->getPlans_vol(1);
var_dump($plans_vol);