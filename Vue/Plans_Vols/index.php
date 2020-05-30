<?php $this->titre = 'Le Blogue du prof'; ?>

<?php foreach ($plans_vols as $plans_vol):
    ?>
    <plans_vol>
        <header>
            <a href="Plans_vols/lire/<?= $this->nettoyer($plans_vol['numero_vol']) ?>">
                <h1 class="titrePlans_vol"><?= $this->nettoyer($plans_vol['numero_vol']) ?></h1>
            </a>
            <strong class=""><?= $this->nettoyer($plans_vol['code_cie_aerienne']) ?></strong><br>
            DE <?= $this->nettoyer($plans_vol['code_aeroport_depart']) ?><br>
            VERS <time><?= $this->nettoyer($plans_vol['code_aeroport_arrive']) ?></time>
        </header>
    </plans_vol>
    <hr />
<?php endforeach; ?>    
