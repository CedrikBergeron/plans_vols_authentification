<?php $this->titre = "Effacer - " . $this->nettoyer($reservation['titre']); ?>

<plans_vol>
    <header>
        <p><h1>
            Effacer?
        </h1>
        <?= $this->nettoyer($reservation['date']) ?>, <?= $this->nettoyer($reservation['auteur']) ?> dit : (privé? <?= $this->nettoyer($reservation['prive']) ?>)<br/>
        <strong><?= $this->nettoyer($reservation['titre']) ?></strong><br/>
        <?= $this->nettoyer($reservation['texte']) ?>
        </p>
    </header>
</plans_vol>

<form action="AdminReservations/supprimer" method="post">
    <input type="hidden" name="id" value="<?= $this->nettoyer($reservation['id']) ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="Adminplans_vols/lire" method="post" >
    <input type="hidden" name="id" value="<?= $this->nettoyer($reservation['plans_vol_id']) ?>" />
    <input type="submit" value="Annuler" />
</form>


