<?php $this->titre = "Le Blogue du prof - " . $this->nettoyer($plans_vol['id']); ?>

<plans_vol>
    <header>
        <h1 class="titrePlans_vol"><?= $this->nettoyer($plans_vol['id']) ?></h1>
        par <?= $this->nettoyer($plans_vol['cie_nom']) ?><br/>
        Départ à <?= $this->nettoyer($plans_vol['heure_depart']) ?><br/>
        Arrivé à <?= $this->nettoyer($plans_vol['heure_arrive']) ?>
    </header>
    <p>Type d'appareil: <?= $this->nettoyer($plans_vol['code_type_avion']) ?></p>
</plans_vol>
<hr />
<header>
    <h1 id="titreReponses">Réservations pour le vol <?= $this->nettoyer($plans_vol['id']) ?> :</h1>
</header>
<?= ($reservations->rowCount() == 0) ? '<p class="message">Pas encore de reservations pour ce vol</p>' : '' ?>
<?php
foreach ($reservations as $reservation):
    ?>
        <p>
            Réservation <?= $this->nettoyer($reservation['id']) ?> fait par <?= $this->nettoyer($plans_vol['nomUtil']) ?> :<br/>
            Pour <strong><?= $this->nettoyer($reservation['nombre_personne']) ?></strong> personne(s) en classe 
            <strong><?= $this->nettoyer($reservation['classe']) ?></strong>
        </p>
<?php endforeach; ?>

<form action="Reservations/ajouter" method="post">

</form>


