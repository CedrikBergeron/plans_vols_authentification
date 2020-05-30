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
<?= ($aeroports->rowCount() == 0) ? '<p class="message">Pas encore de aeroports pour cet plans_vol.</p>' : '' ?>
<?php
foreach ($aeroports as $aeroport):
    ?>
    <?php if ($aeroport['efface'] == '0') : ?>
        <?= $this->nettoyer($aeroport['prive']) ? '<p class="prive">' : '<p>'; ?>
        <a href="AdminAeroports/confirmer/<?= $this->nettoyer($aeroport['id']) ?>" >
            [Effacer]</a>
        <?= $this->nettoyer($aeroport['date']) ?>, <?= $this->nettoyer($aeroport['auteur']) ?> dit : <?= $this->nettoyer($aeroport['prive']) ? '(EN PRIVÉ)' : '' ?><br/>
        <strong><?= $this->nettoyer($aeroport['titre']) ?></strong><br/>
        <?= $this->nettoyer($aeroport['texte']) ?>
        </p>
    <?php else : ?>
        <p class="efface"><a href="AdminAeroports/retablir/<?= $this->nettoyer($aeroport['id']) ?>" >
                [Rétablir]</a>
            Aeroport du <?= $this->nettoyer($aeroport['date']) ?>, par <?= $this->nettoyer($aeroport['auteur']) ?> <?= $this->nettoyer($aeroport['prive']) ? '(EN PRIVÉ)' : '' ?> effacé!
        </p>
    <?php endif; ?>
<?php endforeach; ?>



