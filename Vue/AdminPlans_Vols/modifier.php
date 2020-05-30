<?php $this->titre = "Le Blogue du prof - " . $this->nettoyer($plans_vol['titre']); ?>

<header>
    <h1 id="titreReponses">Modifier un plans_vol de l'utilisateur 1 :</h1>
</header>
<form action="Adminplans_vols/miseAJour" method="post">
    <h2>Modifier un plans_vol</h2>
    <p>
        <label for="auteur">Titre</label> : <input type="text" name="titre" id="titre" value="<?= $this->nettoyer($plans_vol['titre']) ?>" /> <br />
        <label for="sous_titre">Sous-titre</label> :  <input type="text" name="sous_titre" id="sous_titre" value="<?= $this->nettoyer($plans_vol['sous_titre']) ?>" /><br />
        <label for="texte">Texte de l'plans_vol</label> :  <textarea name="texte" id="texte" ><?= $this->nettoyer($plans_vol['texte']) ?></textarea><br />
        <label for="type">Sujet</label> : <input type="text" name="type" id="auto" value="<?= $this->nettoyer($plans_vol['type']) ?>" /> <br />
        <input type="hidden" name="utilisateur_id" value="<?= $idUtilisateur ?>" /><br />
        <input type="hidden" name="id" value="<?= $this->nettoyer($plans_vol['id']) ?>" /><br />
        <input type="submit" value="Modifier" />
    </p>
</form>


