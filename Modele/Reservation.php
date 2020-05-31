<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class Reservation extends Modele {

    // Renvoie la liste des reservations associés à un plans_vol
    public function getReservations($idPlans_vol = NULL) {
        if ($idPlans_vol == NULL) {
            $sql = 'SELECT r.id,'
                    . ' r.vol,'
                    . ' r.nombre_personne,'
                    . ' r.classe'
                    //. ' c.efface,'
                    . ' FROM reservations r'
                    . ' INNER JOIN plans_vols p'
                    . ' ON r.vol = p.id'
                    //. ' WHERE r.efface = 0 AND r.prive = 0'
                    . ' ORDER BY id desc';
        } else {
           $sql = 'SELECT * FROM reservations'
                    . ' WHERE vol = ?' 
                    //. ' AND efface = 0 AND prive = 0'
                    . ' ORDER BY id desc';;
        }
        $reservations = $this->executerRequete($sql, [$idPlans_vol]);
        return $reservations;
    }

    // Renvoie la liste des reservations publics associés à un plans_vol
    public function getReservationsPublics($idPlans_vol = NULL) {
        if ($idPlans_vol == NULL) {
            $sql = 'SELECT r.id,'
                    . ' r.vol,'
                    . ' r.nombre_personne,'
                    . ' r.classe'
                    //. ' c.efface,'
                    . ' FROM reservations r'
                    . ' INNER JOIN plans_vols p'
                    . ' ON r.vol = p.id'
                    //. ' WHERE r.efface = 0 AND r.prive = 0'
                    . ' ORDER BY id desc';
        } else {
            $sql = 'SELECT * FROM reservations'
                    . ' WHERE vol = ?' 
                    //. ' AND efface = 0 AND prive = 0'
                    . ' ORDER BY id desc';;
        }
        $reservations = $this->executerRequete($sql, [$idPlans_vol]);
        return $reservations;
    }

// Renvoie un reservation spécifique **pas sur
    public function getReservation($id) {
        $sql = 'SELECT * FROM reservations'
                . ' WHERE vol = ?';
        $reservation = $this->executerRequete($sql, [$id]);
        if ($reservation->rowCount() == 1) {
            return $reservation->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucune reservation ne correspond au vol '$id'");
        }
    }

// Supprime un reservation
    public function deleteReservation($id) {
        $sql = 'UPDATE reservations'
                . ' SET efface = 1'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

    // Réactive un reservation
    public function restoreReservation($id) {
        $sql = 'UPDATE reservations'
                . ' SET efface = 0'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

// Ajoute un reservation associés à un plans_vol
    public function setReservation($reservation) {
        $sql = 'INSERT INTO reservations ('
                . 'plans_vol_id,'
                . ' date,'
                . ' auteur,'
                . ' titre,'
                . ' texte,'
                . ' prive)'
                . ' VALUES(?, NOW(), ?, ?, ?, ?)';
        $result = $this->executerRequete($sql, [
            $reservation['plans_vol_id'],
            $reservation['auteur'],
            $reservation['titre'],
            $reservation['texte'],
            $reservation['prive']
                ]
        );
        return $result;
    }

}
