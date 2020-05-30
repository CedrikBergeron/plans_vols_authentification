<?php $this->titre = 'Le Blogue du prof'; ?>

<a href="Adminplans_vols/ajouter">
    <h2 class="titrePlans_vol">Ajouter un plans_vol</h2>
</a>
<?php foreach ($plans_vols as $plans_vol):
    ?>

    <plans_vol>
        <header>
            <a href="Adminplans_vols/lire/<?= $this->nettoyer($plans_vol['id']) ?>">
                <h1 class="titrePlans_vol"><?= $this->nettoyer($plans_vol['titre']) ?></h1>
            </a>
            <strong class=""><?= $this->nettoyer($plans_vol['sous_titre']) ?></strong><br>
            par <?= $this->nettoyer($plans_vol['nom']) ?><br>
            <time><?= $this->nettoyer($plans_vol['date']) ?></time><br>
            <a href="Adminplans_vols/modifier/<?= $this->nettoyer($plans_vol['id']) ?>"> [modifier l'plans_vol]</a>
        </header>
    </plans_vol>
    <hr />
<?php endforeach; ?>    
