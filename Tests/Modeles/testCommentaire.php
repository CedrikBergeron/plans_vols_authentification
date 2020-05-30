<?php

require_once 'Modele/Aeroport.php';

$tstAeroport = new Aeroport;
$aeroports = $tstAeroport->getAeroports(1);
echo '<h3>Test getAeroports : </h3>';
var_dump($aeroports->rowCount());

$aeroport = $tstAeroport->getAeroport(5);
echo '<h3>Test getAeroport : </h3>';
var_dump($aeroport);