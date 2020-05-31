<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Plans_vol.php';
require_once 'Modele/Reservation.php';

class ControleurAdminPlans_vols extends ControleurAdmin {

    private $plans_vol;
    private $reservation;

    public function __construct() {
        $this->plans_vol = new Plans_vol();
        $this->reservation = new Reservation();
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
        $reservations = $this->reservation->getReservations($idPlans_vol);
        $this->genererVue(['plans_vol' => $plans_vol, 'reservations' => $reservations, 'erreur' => $erreur]);
    }

    public function ajouter() {
        $vue = new Vue("Ajouter");
        $this->genererVue();
    }

// Enregistre le nouvel plans_vol et retourne à la liste des plans_vols
    public function nouvelPlans_vol() {
        if ($this->requete->getSession()->getAttribut("env") == 'prod') {
            $this->requete->getSession()->setAttribut("message", "Ajouter un plans_vol n'est pas permis en démonstration");
        } else {
            $plans_vol['utilisateur_id'] = $this->requete->getParametreId('utilisateur_id');
            $plans_vol['titre'] = $this->requete->getParametre('titre');
            $plans_vol['sous_titre'] = $this->requete->getParametre('sous_titre');
            $plans_vol['texte'] = $this->requete->getParametre('texte');
            $plans_vol['type'] = $this->requete->getParametre('type');
            $this->plans_vol->setPlans_vol($plans_vol);
            $this->executerAction('index');
        }
    }

// Modifier un plans_vol existant    
    public function modifier() {
        $id = $this->requete->getParametreId('id');
        $plans_vol = $this->plans_vol->getPlans_vol($id);
        $this->genererVue(['plans_vol' => $plans_vol]);
    }

// Enregistre l'plans_vol modifié et retourne à la liste des plans_vols
    public function miseAJour() {
        if ($this->requete->getSession()->getAttribut("env") == 'prod') {
            $this->requete->getSession()->setAttribut("message", "Modifier un plans_vol n'est pas permis en démonstration");
        } else {
            $plans_vol['id'] = $this->requete->getParametreId('id');
            $plans_vol['utilisateur_id'] = $this->requete->getParametreId('utilisateur_id');
            $plans_vol['titre'] = $this->requete->getParametre('titre');
            $plans_vol['sous_titre'] = $this->requete->getParametre('sous_titre');
            $plans_vol['texte'] = $this->requete->getParametre('texte');
            $plans_vol['type'] = $this->requete->getParametre('type');
            $this->plans_vol->updatePlans_vol($plans_vol);
            $this->executerAction('index');
        }
    }

}
