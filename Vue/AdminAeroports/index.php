<?php $this->titre = "Le Blogue du prof - Aeroports" ?>

<header>
    <h1 id="titreReponses">Aeroports du Blogue du prof :</h1>
</header>
<?php
foreach ($aeroports as $aeroport):
    ?>
    <?php if ($aeroport['efface'] == '0') : ?>
        <p><a href="AdminAeroports/confirmer/<?= $this->nettoyer($aeroport['id']) ?>" >
                [Effacer]</a>
            <?= $this->nettoyer($aeroport['date']) ?>, <?= $this->nettoyer($aeroport['auteur']) ?> dit <?= $this->nettoyer($aeroport['prive']) ? '(EN PRIVÉ)' : '' ?> : <br/>
            <strong><?= $this->nettoyer($aeroport['titre']) ?></strong><br/>
            <?= $this->nettoyer($aeroport['texte']) ?><br />
            <a href="Adminplans_vols/lire/<?= $this->nettoyer($aeroport['plans_vol_id']) ?>" >
                [écrit pour l'plans_vol <i><?= $this->nettoyer($aeroport['titrePlans_vol']) ?></i>]</a></a>
        </p>
    <?php else : ?>
        <p class="efface"><a href="AdminAeroports/retablir/<?= $this->nettoyer($aeroport['id']) ?>" >
                [Rétablir]</a>
            Aeroport du <?= $this->nettoyer($aeroport['date']) ?>, par <?= $this->nettoyer($aeroport['auteur']) ?> <?= $this->nettoyer($aeroport['prive']) ? '(EN PRIVÉ)' : '' ?> EFFACÉ!
        </p>
    <?php endif; ?>
<?php endforeach; ?>