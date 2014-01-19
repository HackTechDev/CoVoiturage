<?php
// Variables locales
$decalage = date('N', strtotime("01-" . $numMois . "-" . $annee)); // Decalage du 1er jour dans la 1er semaine du mois 
$nbJourMois = cal_days_in_month(CAL_GREGORIAN, $numMois, $annee); // Nombre de jour dans le mois
$numJour = 1; // Numero du jour dans le mois
$nbTrajetSemaine = 0; // Nombre de trajet par semaine
$nbTrajetMois = 0; // Nombre de trajet par mois
$nbSemaine = (( (($decalage + $nbJourMois)-1)  - ((($decalage + $nbJourMois)-1) % 7) ) / 7 ) + 1; // Nombre de semaine dans un mois
?>
<br/>
Calendrier du mois de <?php echo lcfirst($moisTab[$numMois]); ?> <br/>
<br/>
<table border="1">
    <tr>
        <th class="nomJourSemaine">
            &nbsp;
        </th>
        <th class="nomJourSemaine">
            Lundi
        </th>
        <th class="nomJourSemaine">
            Mardi
        </th>            
        <th class="nomJourSemaine">
            Mercredi
        </th>        
        <th class="nomJourSemaine">
            Jeudi
        </th>        
        <th class="nomJourSemaine">
            Vendredi
        </th>
        <th class="nomJourSemaine">
            Trajets
        </th>
    </tr> 
<?php
for($compteurSemaine=1; $compteurSemaine<=$nbSemaine; $compteurSemaine++) {
    if ($compteurSemaine == 1 && ($decalage == 6 || $decalage == 7)) {
        $style = "display: none;";      
    } else {
        $style = "";
    }
?>
    <tr style="<?php echo $style; ?>">
        <td class="colonne">
            Semaine <?php echo $numSemaine + $compteurSemaine; ?>
        </td>
    <?php
        for($compteurJour=1;$compteurJour<=$nbJour;$compteurJour++) {
            // Calcule le decalage 
            // 1er ligne = Cellule blanche
            //                                                         Derniere ligne = Cellule blanche
            if(($compteurSemaine == 1 && $compteurJour < $decalage) || $numJour > $nbJourMois) { 
    ?>
                <td >
                    <div class="colonne">
                        <div class="matin">
                           &nbsp; 
                        </div>
                        <div class="date">
                            
                        </div>
                        <div class="soir">
                          &nbsp;  
                        </div>
                    </div>
                </td>
   <?php
            } else {
                // Ligne normale
   ?>
                <td >
                    <div class="colonne">
                        <div class="matin">
                            <?php
                                // 1 => Matin, 3 => Matin et Soir
                                if ($trajet[$numMois][$numJour] == 1 || $trajet[$numMois][$numJour] == 3) {
                                    echo "M";
                                    $nbTrajetSemaine++;
                                } else {
                                    echo "&nbsp;";
                                }
                            ?>
                        </div>
                        <div class="date">
                            <?php 
                                echo $numJour; 
                            ?>
                        </div>
                        <div class="soir">
                            <?php
                                // 2 => Soir, 3 => Matin et Soir
                                if ($trajet[$numMois][$numJour] == 2 || $trajet[$numMois][$numJour] == 3) {
                                    echo "S";
                                    $nbTrajetSemaine++;
                                } else {
                                    echo "&nbsp;";
                                }
                            ?>
                        </div>
                    </div>
                </td>
    <?php
                $numJour++;           
                }
            }
    ?>
        <td >
            <div class="colonne">
                <div class="trajet">
                   <?php
                        if($nbTrajetSemaine == 0 ) {
                            echo "&nbsp;";
                        } else {
                            echo $nbTrajetSemaine;
                        }
                        $nbTrajetMois += $nbTrajetSemaine;
                        $nbTrajetSemaine = 0;
                   ?>
            </div>
        </td>

    </tr>
<?php
    // Avance de 2 jours : Week-end
    $numJour +=2;
}
?>
<td colspan="6">
</td>
<td class="trajet">
    <?php
        if($nbTrajetMois == 0) {
            echo "&nbsp;";
        } else {
            echo $nbTrajetMois;
        }
        $numSemaine += $nbSemaine - 1;
    ?>
</td>

</table>           
