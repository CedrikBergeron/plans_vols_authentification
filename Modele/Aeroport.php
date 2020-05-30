<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class Aeroport extends Modele {

    // Renvoie la liste des aeroports associés à un plans_vol
    public function getAeroports($idPlans_vol = NULL) {
        if ($idPlans_vol == NULL) {
            $sql = 'SELECT a.code,'
                    . ' a.nom,'
                    . ' a.localisation,'
                    . ' a.latitude,'
                    . ' a.longitude,'
                    . ' a.elevation,'
                    . ' a.details,'
                    //. ' a.efface,'
                    //. ' a.titre as titrePlans_vol'
                    . ' FROM aeroports a'
                    . ' INNER JOIN plans_vols p'
                    . ' ON a.plans_vol_id = p.numero_vol'
                    . ' ORDER BY code desc';;
        } else {
            $sql = 'SELECT * from aeroports'
                    . ' WHERE plans_vol_id = ?'
                    . ' ORDER BY id desc';;
        }
        $aeroports = $this->executerRequete($sql, [$idPlans_vol]);
        return $aeroports;
    }

    // Renvoie la liste des aeroports publics associés à un plans_vol
    public function getAeroportsPublics($idPlans_vol = NULL) {
        if ($idPlans_vol == NULL) {
            $sql = 'SELECT c.id,'
                    . ' c.plans_vol_id,'
                    . ' c.date,'
                    . ' c.auteur,'
                    . ' c.titre,'
                    . ' c.texte,'
                    . ' c.prive,'
                    . ' c.efface,'
                    . ' a.titre as titrePlans_vol'
                    . ' FROM aeroports c'
                    . ' INNER JOIN plans_vols a'
                    . ' ON c.plans_vol_id = a.id'
                    . ' WHERE c.efface = 0 AND c.prive = 0'
                    . ' ORDER BY id desc';
        } else {
            $sql = 'SELECT * FROM aeroports'
                    . ' WHERE plans_vol_id = ? AND efface = 0 AND prive = 0'
                    . ' ORDER BY id desc';;
        }
        $aeroports = $this->executerRequete($sql, [$idPlans_vol]);
        return $aeroports;
    }

// Renvoie un aeroport spécifique
    public function getAeroport($id) {
        $sql = 'SELECT * FROM aeroports'
                . ' WHERE id = ?';
        $aeroport = $this->executerRequete($sql, [$id]);
        if ($aeroport->rowCount() == 1) {
            return $aeroport->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun aeroport ne correspond à l'identifiant '$id'");
        }
    }

// Supprime un aeroport
    public function deleteAeroport($id) {
        $sql = 'UPDATE aeroports'
                . ' SET efface = 1'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

    // Réactive un aeroport
    public function restoreAeroport($id) {
        $sql = 'UPDATE aeroports'
                . ' SET efface = 0'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

// Ajoute un aeroport associés à un plans_vol
    public function setAeroport($aeroport) {
        $sql = 'INSERT INTO aeroports ('
                . 'plans_vol_id,'
                . ' date,'
                . ' auteur,'
                . ' titre,'
                . ' texte,'
                . ' prive)'
                . ' VALUES(?, NOW(), ?, ?, ?, ?)';
        $result = $this->executerRequete($sql, [
            $aeroport['plans_vol_id'],
            $aeroport['auteur'],
            $aeroport['titre'],
            $aeroport['texte'],
            $aeroport['prive']
                ]
        );
        return $result;
    }

}
