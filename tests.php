<?php
if (isset($_GET['test'])) {
    if ($_GET['test'] == 'modelePlans_vol') {
        require 'Tests/Modeles/testPlans_vol.php';
    } else if ($_GET['test'] == 'modeleAeroport') {
        require 'Tests/Modeles/testAeroport.php';
    } else if ($_GET['test'] == 'vuePlans_vols') {
        require 'Tests/Vues/testVuePlans_vols.php';
    } else if ($_GET['test'] == 'vueConfirmer') {
        require 'Tests/Vues/testVueConfirmer.php';
    } else if ($_GET['test'] == 'vueErreur') {
        require 'Tests/Vues/testVueErreur.php';
    } else {
        echo '<h3>Test inexistant!!!</h3>';
    }
}
?>
<h3>Tests de Modèles</h3>
<ul>
    <li>
        <a href="tests.php?test=modelePlans_vol">Plans_vol</a>
    </li>
    <li>
        <a href="tests.php?test=modeleAeroport">Aeroport</a>
    </li>
</ul>
<h3>Tests de Vues</h3>
<ul>
    <li>
        <a href="tests.php?test=vuePlans_vols">Plans_vols</a>
    </li>
    <li>
        <a href="tests.php?test=vueConfirmer">Confirmer</a>
    </li>
    <li>
        <a href="tests.php?test=vueErreur">Erreur</a>
    </li>
</ul>
