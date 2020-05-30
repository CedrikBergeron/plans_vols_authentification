<?php

require_once 'Framework/Vue.php';
$aeroport = [
        'id' => '999',
        'plans_vol_id' => '111',
        'date' => '2017-12-31',
        'auteur' => 'auteur Test',
        'prive' => '1',
        'titre' => 'titre Test',
        'texte' => 'texte Test',
    ];
$vue = new Vue('Confirmer', 'AdminAeroports');
$vue->generer(['aeroport' => $aeroport], null);

