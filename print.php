<html>
<head>
    <meta charset="utf-8">
</head>

<body style="width:80%; margin-left:auto; margin-right:auto; border:solid 1px gray; padding:10px;">
<?php

if (!isset($_GET['saison']) || !isset($_GET['lieu'])) {
    $titre = "Pense-bête : Veuillez choisir la saison et le lieu.";
} else {
    $saison = ($_GET['saison'] == "ete") ? "Ete" : "Hiver";
    $lieu = ($_GET['lieu'] == "plage") ? "Plage" : "Montagne";
    $titre = "Pense-bête : " . $saison . " - " . $lieu;
}

echo "<h1>$titre</h1>\n";

$fichier = strtolower($saison) . "/" . strtolower($lieu) . "/pb.txt";

// Affichage du contenu du fichier avec mise en forme
$handle = @fopen($fichier, "r");
$contents = "";
if ($handle) {
    echo "      <form>\n";
    $collaspible = FALSE;
    $ligne_std = TRUE;
    while (!feof($handle)) {
        $ligne = fgets($handle, 4096);
        $contents .= $ligne;
        if (preg_match('/^\* /', $ligne)) { // Ligne "titre", on prépare un collaspible
            $ligne_std = FALSE;
            if ($collapsible) // S'il y en avait déjà un d'ouvert, on le ferme
                echo "          </div> <!-- /collapsible -->\n";
            echo "              <div data-role='collapsible' class='openMe'>\n";
            $collapsible = TRUE;
            echo "                      <h3>" . preg_replace('/\\n/', '', preg_replace('/^\* /', '', $ligne)) . "</h3>\n"; // on affiche le titre
        }
        else if (preg_match('/\- /', $ligne)) {
            $ligne_std = FALSE;
            echo '                              <input type="checkbox"' . preg_replace('/\\n/', '', preg_replace('/\- /', ' checked="checked"> ', $ligne)) . "\n";
        } else if (preg_match('/Auteur \: /', $ligne)) {
            $ligne_std = FALSE;
            $auteur = preg_replace('/\\n/', '', preg_replace('/Auteur \: /', '', $ligne));
        }   
        echo ($ligne_std) ? ("                          <input type=\"checkbox\"> " . preg_replace('/\\n/', '', $ligne) . "\n") : "";
        $ligne_std = TRUE;
    }   
    fclose($handle);
    echo "              </div> <!-- /collapsible -->\n";
    echo "      </form>\n";
} else { 
    echo "<p>Veuillez choisir la saison et le lieu avec le menu de droite.</p>\n";
}   
?>

</body>
</html>
