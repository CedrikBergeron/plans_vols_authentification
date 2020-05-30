<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux plans_vols 
 * 
 * @author André Pilon
 */
class Plans_vol extends Modele {

// Renvoie la liste de tous les plans_vols, triés par identifiant décroissant avec le nom de l'utilisateus lié
    public function getPlans_vols() {
//        $sql = 'select plans_vols.id, titre, sous_titre, utilisateur_id, date, texte, type, nom from plans_vols, utilisateurs'
//                . ' where plans_vols.utilisateur_id = utilisateurs.id order by ID desc';
        $sql = 'SELECT p.numero_vol,'
                . ' p.code_cie_aerienne,'
                . ' p.code_type_avion,'
                . ' p.code_aeroport_depart,'
                . ' p.code_aeroport_arrive,'
                . ' p.heure_depart,'
                . ' p.heure_arrive,'
                . ' u.nom,'
                . ' u.identifiant'
                . ' FROM plans_vols p'
                . ' INNER JOIN utilisateurs u'
                . ' ON p.utilisateur_id = u.id'
                . ' ORDER BY id desc';
        $plans_vols = $this->executerRequete($sql);
        return $plans_vols;
    }

// Renvoie la liste de tous les plans_vols, triés par identifiant décroissant
    public function setPlans_vol($plans_vol) {
        $sql = 'INSERT INTO plans_vols ('
                . ' titre,'
                . ' sous_titre,'
                . ' utilisateur_id,'
                . ' date,'
                . ' texte,'
                . ' type)'
                . ' VALUES(?, ?, ?, NOW(), ?, ?)';
        $result = $this->executerRequete($sql, [
            $plans_vol['titre'],
            $plans_vol['sous_titre'],
            $plans_vol['utilisateur_id'],
            $plans_vol['texte'],
            $plans_vol['type']
                ]
        );
        return $result;
    }

// Renvoie les informations sur un plans_vol avec le nom de l'utilisateur lié
    function getPlans_vol($idPlans_vol) {
        $sql = 'SELECT a.id,'
                . ' a.titre,'
                . ' a.sous_titre,'
                . ' a.utilisateur_id,'
                . ' a.date,'
                . ' a.texte,'
                . ' a.type,'
                . ' u.nom'
                . ' FROM plans_vols a'
                . ' INNER JOIN utilisateurs u'
                . ' ON a.utilisateur_id = u.id'
                . ' WHERE a.id=?';
        $plans_vol = $this->executerRequete($sql, [$idPlans_vol]);
        if ($plans_vol->rowCount() == 1) {
            return $plans_vol->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun plans_vol ne correspond à l'identifiant '$idPlans_vol'");
        }
    }

// Met à jour un plans_vol
    public function updatePlans_vol($plans_vol) {
        $sql = 'UPDATE plans_vols'
                . ' SET titre = ?,'
                . ' sous_titre = ?,'
                . ' utilisateur_id = ?,'
                . ' date = NOW(),'
                . ' texte = ?,'
                . ' type = ?'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [
            $plans_vol['titre'],
            $plans_vol['sous_titre'],
            $plans_vol['utilisateur_id'],
            $plans_vol['texte'],
            $plans_vol['type'],
            $plans_vol['id']
                ]
        );
        return $result;
    }

}
