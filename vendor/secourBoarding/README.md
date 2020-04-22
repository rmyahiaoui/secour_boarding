# Installation et exection:
1-Créé un nouveau dossier qui representera la nouveau project de test.<br/>
2-Créé un fichier de test exemple (runBoarding.php).<br/>
1-Créé un dossier vendor.<br/>
2-Coller L'API secour_boarding dans le dossier vendor.<br/>
3-Ajouter les lignes suivantes dans le fichier test:<br/>
    
    <?php
    require_once 'vendor/secourBoarding/load.php';

    $secourBoarding = new SecourBoarding('boarding.csv');
    echo $secourBoarding->getItinerary();

4-Coller le fichier boarding.csv dans la racine du projet.<br/>
5-executé la commande php runBoarding.php<br/>
6-Resultat obtenue:<br/>
    -1 Take train 35A from nice to marseille. Sit in seat 78A.<br/>
    -2 From marseille Airport, take flight 1985A to barcelone. Gate 45B, Sit in seat 24A. Baggage drop at ticket counter 344.<br/>
    -3 Take the airport bus from barcelone to madrid Airport. No seat assignment.<br/>
    -4 From madrid Airport, take flight 1988A to alicante. Gate 46B, Sit in seat 24A. Baggage drop at ticket counter 500.<br/>
    -5 From alicante Airport, take flight 1954A to canari. Gate 47B, Sit in seat 24A.Baggage will we automatically transferred from your        last leg.<br/>
    You have arrived at your final destination.<br/>