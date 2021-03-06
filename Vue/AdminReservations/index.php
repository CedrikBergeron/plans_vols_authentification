<?php $this->titre = "Le Blogue du prof - Reservations" ?>

<header>
    <h1 id="titreReponses">Reservations du Blogue du prof :</h1>
</header>
<?php
foreach ($reservations as $reservation):
    ?>
    <?php if ($reservation['efface'] == '0') : ?>
        <p><a href="AdminReservations/confirmer/<?= $this->nettoyer($reservation['id']) ?>" >
                [Effacer]</a>
            <?= $this->nettoyer($reservation['date']) ?>, <?= $this->nettoyer($reservation['auteur']) ?> dit <?= $this->nettoyer($reservation['prive']) ? '(EN PRIVÉ)' : '' ?> : <br/>
            <strong><?= $this->nettoyer($reservation['titre']) ?></strong><br/>
            <?= $this->nettoyer($reservation['texte']) ?><br />
            <a href="Adminplans_vols/lire/<?= $this->nettoyer($reservation['plans_vol_id']) ?>" >
                [écrit pour l'plans_vol <i><?= $this->nettoyer($reservation['titrePlans_vol']) ?></i>]</a></a>
        </p>
    <?php else : ?>
        <p class="efface"><a href="AdminReservations/retablir/<?= $this->nettoyer($reservation['id']) ?>" >
                [Rétablir]</a>
            Reservation du <?= $this->nettoyer($reservation['date']) ?>, par <?= $this->nettoyer($reservation['auteur']) ?> <?= $this->nettoyer($reservation['prive']) ? '(EN PRIVÉ)' : '' ?> EFFACÉ!
        </p>
    <?php endif; ?>
<?php endforeach; ?>