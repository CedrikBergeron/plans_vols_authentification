<?php $titre = 'Le Blogue du prof version 1.0.0.1'; ?>

<ul>
    <li>Cédrik Bergeron</li>

    <li>420-4A4 MO Web et Bases de données</li>
    <li>Hiver 2020, Collège Montmorency</li>
</ul>
<h3>Le Blogue du prof</h3>
<ul>
    <li>L'application "Le Blogue du prof" permet de composer et de
        diffuser des plans_vols sur des sujets variés.</li>
    <li>La page d'Accueil présente la liste des titres des plans_vols
        avec la date et le nom de l'auteur :</li>
    <ul>
        <li>Cette version n'offre pas encore la gestion des auteurs.
            Les auteurs doivent être entrées manuellement dans la base de données.<br>
        </li>
        <li>
            Pour fin de démonstration, cette version offre la possibilité de changer de contrôleur d'accueil.<br/>
            L'accueil présente alors plutôt la liste de tous les reservations à l'accueil :
            <ul>
                <li>
                    Chaque reservation indique alors le titre de l'plans_vol pour lequel il a été écrit, avec un lien vers cet plans_vol.
                </li>
                <li>
                    Cela peut vous être utile si vous désirez présenter à l'accueil le côté n de la relation 1 à n pour votre application.
                </li>
            </ul>
        </li>
        <li>
            <form action="<?= $utilisateur != '' ? 'Admin' : ''; ?>reservations" method="post">
                <input type="submit" value="Changer de controleur d'accueil">
            </form>
        </li>
    </ul>
    <li>Si un utilisateur est en session : </li>
    <ul>
        <li>on retrouve un lien pour créer un nouvel plans_vol :
            <ul>
                <li>
                    L'plans_vol créé est attribué à l'utilisateur en session
                </li>
                <li>
                    La page de création d'un plans_vol offre de spécifier le sujet traité par
                    l'plans_vol (type) par autocomplétion.<br>(par http seulement ; ne fonctionne pas avec https pour l'instant)
                </li>
            </ul>
        </li>
        <li>
            Les actions pour effacer/rétablir un reservation sont affichées ;
        </li>
        <li>
            Les reservations privés sont affichés ;
        </li>
        <li>
            Il n'est plus possible d'ajouter un reservation pour un plans_vol.
        </li>
    </ul>
    <li>Les lecteurs du blogue peuvent cliquer sur le titre d'un
        plans_vol pour lire le texte complet de l'plans_vol :<br>
    </li>
    <ul>
        <li>À la suite du texte de l'plans_vol on offre la possibilité de
            laisser un reservation sur l'plans_vol ;</li>
        <li>La personne qui veut laisser un reservation doit
            s'identifier à l'aide d'un courriel valide :</li>
        <ul>
            <li>Un message est affiché si le courriel est invalide et le
                reservation n'est pas enregistré.<br>
            </li>
        </ul>
        <li>On peut spécifier s'il s'agit d'un reservation privé destiné
            seulement à l'auteur de l'plans_vol :</li>
        <ul>
            <li>Pour l'instant cette fonctionnalité n'est pas encore
                implantée et tous les reservations sont affichés.</li>
        </ul>
        <li>On peut effacer un reservation après confirmation (par l'auteur de l'plans_vol dans une prochaine version).</li>
        <li>Un reservation effacé peut être rétabli (par l'auteur de l'plans_vol dans une prochaine version).</li>
        <li>Un reservation ne peut pas être modifié.<br>
        </li>
    </ul>
</ul>
<br>

<table>
    <tr>
        <td>
            <h4>Base de données utilisée par l'application :</h4>
            <object data="Contenu/images/Blogue-vers-MVC-v1_1_0_1.svg" type="image/svg+xml" height="500" width="800">
                <img src="Contenu/images/blogue_phpmyadmin.jpg" alt=""/>
            </object><br/>
        </td>
    </tr>
    <tr>
        <td>
            <h4>Basé sur ce modèle original :</h4>
            <a href="http://www.databaseanswers.org/data_models/big_data_hadoop/index.htm" >
                <img src="Contenu/images/data_model.gif" alt=""/><br/>
                Blog as a "Real Life example :</a>
        </td>
    </tr>
</table>