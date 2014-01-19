<html>
    <head>
        <title>
            Co-voiturage 2014
        </title>
        <style type="text/css">
            body {
                color: black;
            }
            .nomJourSemaine {
                width: 100px;
            }   
            .matin {
                float: left;
                text-align: left;
                width: 40px;
                margin-left: 10px;
            }
            .soir {
                float: right;
                text-align: right;
                margin-right: 10px;
            }
            .date {
                float: left;
                opacity: 0.25;
            }
            .trajet {
                float: left;
                text-align: center;
                width: 100px;
            }
            .colonne {
                width: 100px;
            }
        </style>
    </head>
    <body>   
<h1>Co-voiturage 2014</h1>
<?php

error_reporting(0);

// Aucun trajet = 0
// Matin = 1
// Soire = 2
// Matin et Soir =3
$db = "covoiturage.csv";

$trajet = array();

if (($handle = fopen($db, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $trajet[$data[0]][$data[1]] = $data[2];
    }
    fclose($handle);
}
?>

<p style="font-size: 10px">
L&eacute;gendes : 
M = Matin / S = Soir<br/>
</p>
<br/>
<?php
// Variables globales
$jourTab = array("", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");
$moisTab = array("", "Janvier", "F&eacute;vrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Ao&uirc;t", 
            "Septembre", "Octobre", "Novembre", "D&eacute;cembre");
$annee = 2014; // Annee du calendrier a afficher
$nbJour = 5; // Nombre de jour max dans 1 semaine
$numSemaine = 0; // Numero de la semaine dans l'annee
?>

Nous somme le <?php echo $jourTab[date("N")] . " " . date("j") . " " . lcfirst($moisTab[date("n")]) . " " . date("Y"); ?>

<br/>
<?php
$numMois = 1; // Numero du mois a afficher
include("mois.pat.php");

$numMois = 2;
include("mois.pat.php");

$numMois = 3;
include("mois.pat.php");

$numMois = 4; 
include("mois.pat.php");

?>

</body>
