<?php $this->titre = "Le Blogue du prof - Reservations" ?>

<header>
    <h1 id="titreReponses">Reservations du Blogue du prof :</h1>
</header>
<?php
foreach ($reservations as $reservation):
    ?>
    <?php 
        ?>
        <p>Réservation #<?= $this->nettoyer($reservation['id']) ?>
            Pour le vol <strong><?= $this->nettoyer($reservation['vol']) ?></strong>
             de <?= $this->nettoyer($reservation['nombre_personne']) ?> personne(s) en classe 
                <?= $this->nettoyer($reservation['classe']) ?><br />
            <!-- Vers Adminplans_vols si utilisateur en session -->
            <a href="<?= ($utilisateur != '') ? 'Admin' : '' ?>Plans_vols/lire/<?= $this->nettoyer($reservation['vol']) ?>" >
                [écrit pour l'plans_vol <i><?= $this->nettoyer($reservation['titrePlans_vol']) ?></i>]</a>
        </p>
<?php endforeach; ?>