<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Aeroport.php';

class ControleurAdminAeroports extends ControleurAdmin {

    private $aeroport;

    public function __construct() {
        $this->aeroport = new Aeroport();
    }

// L'action index n'est pas utilisée mais pourrait ressembler à ceci 
// en ajoutant la fonctionnalité de faire afficher tous les aeroports
    public function index() {
        $aeroports = $this->aeroport->getAeroports();
        $this->genererVue(['aeroports' => $aeroports]);
    }
  
// Confirmer la suppression d'un aeroport
    public function confirmer() {
        $id = $this->requete->getParametreId("id");
        // Lire le aeroport à l'aide du modèle
        $aeroport = $this->aeroport->getAeroport($id);
        $this->genererVue(['aeroport' => $aeroport]);
    }

// Supprimer un aeroport
    public function supprimer() {
        $id = $this->requete->getParametreId("id");
        // Lire le aeroport afin d'obtenir le id de l'plans_vol associé
        $aeroport = $this->aeroport->getAeroport($id);
        // Supprimer le aeroport à l'aide du modèle
        $this->aeroport->deleteAeroport($id);
        //Recharger la page pour mettre à jour la liste des aeroports associés
        $this->rediriger('Adminplans_vols', 'lire/' . $aeroport['plans_vol_id']);
    }

    // Rétablir un aeroport
    public function retablir() {
        $id = $this->requete->getParametreId("id");
        // Lire le aeroport afin d'obtenir le id de l'plans_vol associé
        $aeroport = $this->aeroport->getAeroport($id);
        // Supprimer le aeroport à l'aide du modèle
        $this->aeroport->restoreAeroport($id);
        //Recharger la page pour mettre à jour la liste des aeroports associés
        $this->rediriger('Adminplans_vols', 'lire/' . $aeroport['plans_vol_id']);
    }

}
