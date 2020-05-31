<?php $this->titre = 'Gestion de plans de vols'; ?>

<?php foreach ($plans_vols as $plans_vol):
    ?>
    <plans_vol>
        <header>
            <a href="Plans_vols/lire/<?= $this->nettoyer($plans_vol['id']) ?>">
                <h1 class="titrePlans_vol"><?= $this->nettoyer($plans_vol['id']) ?></h1>
            </a>
            Oppéré par: <strong class=""><?= $this->nettoyer($plans_vol['cie_nom']) ?></strong><br>
            DE <?= $this->nettoyer($plans_vol['code_aeroport_depart']) ?><br>
            VERS <time><?= $this->nettoyer($plans_vol['code_aeroport_arrive']) ?></time>
        </header>
    </plans_vol>
    <hr />
<?php endforeach; ?>    
