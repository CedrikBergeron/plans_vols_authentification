<?php $this->titre = "Le Blogue du prof - Aeroports" ?>

<header>
    <h1 id="titreReponses">Aeroports du Blogue du prof :</h1>
</header>
<?php
foreach ($aeroports as $aeroport):
    ?>
    <?php 
        ?>
        <p><?= $this->nettoyer($aeroport['date']) ?>, <?= $this->nettoyer($aeroport['auteur']) ?> dit <?= $this->nettoyer($aeroport['prive']) ? '(EN PRIVÉ)' : '' ?> : <br/>
            <strong><?= $this->nettoyer($aeroport['titre']) ?></strong><br/>
            <?= $this->nettoyer($aeroport['texte']) ?><br />
            <!-- Vers Adminplans_vols si utilisateur en session -->
            <a href="<?= ($utilisateur != '') ? 'Admin' : '' ?>Plans_vols/lire/<?= $this->nettoyer($aeroport['plans_vol_id']) ?>" >
                [écrit pour l'plans_vol <i><?= $this->nettoyer($aeroport['titrePlans_vol']) ?></i>]</a>
        </p>
<?php endforeach; ?>