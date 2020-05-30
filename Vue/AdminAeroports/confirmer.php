<?php $this->titre = "Effacer - " . $this->nettoyer($aeroport['titre']); ?>

<plans_vol>
    <header>
        <p><h1>
            Effacer?
        </h1>
        <?= $this->nettoyer($aeroport['date']) ?>, <?= $this->nettoyer($aeroport['auteur']) ?> dit : (privé? <?= $this->nettoyer($aeroport['prive']) ?>)<br/>
        <strong><?= $this->nettoyer($aeroport['titre']) ?></strong><br/>
        <?= $this->nettoyer($aeroport['texte']) ?>
        </p>
    </header>
</plans_vol>

<form action="AdminAeroports/supprimer" method="post">
    <input type="hidden" name="id" value="<?= $this->nettoyer($aeroport['id']) ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="Adminplans_vols/lire" method="post" >
    <input type="hidden" name="id" value="<?= $this->nettoyer($aeroport['plans_vol_id']) ?>" />
    <input type="submit" value="Annuler" />
</form>


