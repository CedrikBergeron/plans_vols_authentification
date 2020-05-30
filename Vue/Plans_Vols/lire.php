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
        <p>
            <?= $this->nettoyer($aeroport['date']) ?>, <?= $this->nettoyer($aeroport['auteur']) ?> dit :<br/>
            <strong><?= $this->nettoyer($aeroport['titre']) ?></strong><br/>
            <?= $this->nettoyer($aeroport['texte']) ?>
        </p>
<?php endforeach; ?>

<form action="Aeroports/ajouter" method="post">
    <h2>Ajouter un aeroport</h2>
    <p>
        <label for="auteur">Courriel de l'auteur (xxx@yyy.zz)</label> : <input type="text" name="auteur" id="auteur" /> 
        <?= ($erreur == 'courriel') ? '<span style="color : red;">Entrez un courriel valide s.v.p.</span>' : '' ?> 
        <br />
        <label for="texte">Titre</label> :  <input type="text" name="titre" id="titre" /><br />
        <label for="texte">Aeroport</label> :  <textarea type="text" name="texte" id="texte" >Écrivez votre aeroport ici</textarea><br />
        <label for="prive">Privé?</label><input type="checkbox" name="prive" />
        <input type="hidden" name="plans_vol_id" value="<?= $this->nettoyer($plans_vol['id']) ?>" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>


