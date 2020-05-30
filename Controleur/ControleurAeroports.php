<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Aeroport.php';

class ControleurAeroports extends Controleur {

    private $aeroport;

    public function __construct() {
        $this->aeroport = new Aeroport();
    }

// L'action index n'est pas utilisée mais pourrait ressembler à ceci 
// en ajoutant la fonctionnalité de faire afficher tous les aeroports
    public function index() {
        $aeroports = $this->aeroport->getAeroportsPublics();
        $this->genererVue(['aeroports' => $aeroports]);
    }

// Ajoute un aeroport à un plans_vol
    public function ajouter() {
        $aeroport['plans_vol_id'] = $this->requete->getParametreId("plans_vol_id");
        $aeroport['auteur'] = $this->requete->getParametre('auteur');
        $validation_courriel = filter_var($aeroport['auteur'], FILTER_VALIDATE_EMAIL);
        if ($validation_courriel) {
            if ($this->requete->getSession()->getAttribut("env") == 'prod') {
                $this->requete->getSession()->setAttribut("message", "Ajouter un aeroport n'est pas permis en démonstration");
            } else {
                $aeroport['titre'] = $this->requete->getParametre('titre');
                $aeroport['texte'] = $this->requete->getParametre('texte');
                // Ajuster la valeur de la case à cocher
                $aeroport['prive'] = $this->requete->existeParametre('prive') ? 1 : 0;
                // Ajouter le aeroport à l'aide du modèle
                $this->aeroport->setAeroport($aeroport);
            }
            // Éliminer un code d'erreur éventuel
            if ($this->requete->getSession()->existeAttribut('erreur')) {
                $this->requete->getsession()->setAttribut('erreur', '');
            }
            //Recharger la page pour mettre à jour la liste des aeroports associés
            $this->rediriger('Plans_vols', 'lire/' . $aeroport['plans_vol_id']);
        } else {
            //Recharger la page avec une erreur près du courriel
            $this->requete->getSession()->setAttribut('erreur', 'courriel');
            $this->rediriger('Plans_vols', 'lire/' . $aeroport['plans_vol_id']);
        }
    }

}
