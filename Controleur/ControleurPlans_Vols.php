<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Plans_vol.php';
require_once 'Modele/Aeroport.php';

class ControleurPlans_vols extends Controleur {

    private $plans_vol;
    private $aeroport;

    public function __construct() {
        $this->plans_vol = new Plans_vol();
        $this->aeroport = new Aeroport();
    }

// Affiche la liste de tous les plans_vols du blog
    public function index() {
        $plans_vols = $this->plans_vol->getPlans_vols();
        $this->genererVue(['plans_vols' => $plans_vols]);
    }

// Affiche les détails sur un plans_vol
    public function lire() {
        $idPlans_vol = $this->requete->getParametreId("id");
        $plans_vol = $this->plans_vol->getPlans_vol($idPlans_vol);
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $aeroports = $this->aeroport->getAeroportsPublics($idPlans_vol);
        $this->genererVue(['plans_vol' => $plans_vol, 'aeroports' => $aeroports, 'erreur' => $erreur]);
    }

}
