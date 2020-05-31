<?php $this->titre = "Le Blogue du prof - " . $this->nettoyer($plans_vol['titre']); ?>

<plans_vol>
    <header>
        <h1 class="titrePlans_vol"><?= $this->nettoyer($plans_vol['titre']) ?></h1>
        <time><?= $this->nettoyer($plans_vol['date']) ?></time>, par <?= $this->nettoyer($plans_vol['nom']) ?>
        <h3 class=""><?= $this->nettoyer($plans_vol['sous_titre']) ?></h3>
    </header>
    <p><?= $this->nettoyer($plans_vol['texte']) ?></p>
    <p><?= $this->nettoyer($plans_vol['type']) ?></p>
</plans_vol>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $this->nettoyer($plans_vol['titre']) ?> :</h1>
</header>
<?= ($reservations->rowCount() == 0) ? '<p class="message">Pas encore de reservations pour cet plans_vol.</p>' : '' ?>
<?php
foreach ($reservations as $reservation):
    ?>
    <?php if ($reservation['efface'] == '0') : ?>
        <?= $this->nettoyer($reservation['prive']) ? '<p class="prive">' : '<p>'; ?>
        <a href="AdminReservations/confirmer/<?= $this->nettoyer($reservation['id']) ?>" >
            [Effacer]</a>
        <?= $this->nettoyer($reservation['date']) ?>, <?= $this->nettoyer($reservation['auteur']) ?> dit : <?= $this->nettoyer($reservation['prive']) ? '(EN PRIVÉ)' : '' ?><br/>
        <strong><?= $this->nettoyer($reservation['titre']) ?></strong><br/>
        <?= $this->nettoyer($reservation['texte']) ?>
        </p>
    <?php else : ?>
        <p class="efface"><a href="AdminReservations/retablir/<?= $this->nettoyer($reservation['id']) ?>" >
                [Rétablir]</a>
            Reservation du <?= $this->nettoyer($reservation['date']) ?>, par <?= $this->nettoyer($reservation['auteur']) ?> <?= $this->nettoyer($reservation['prive']) ? '(EN PRIVÉ)' : '' ?> effacé!
        </p>
    <?php endif; ?>
<?php endforeach; ?>



