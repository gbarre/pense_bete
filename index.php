<?php

if (!isset($_GET['saison']) || !isset($_GET['lieu'])) {
    $editable = FALSE;
    $titre = "Pense-bête : Veuillez choisir la saison et le lieu.";
} else {
    $saison = ($_GET['saison'] == "ete") ? "Ete" : "Hiver";
    $lieu = ($_GET['lieu'] == "plage") ? "Plage" : "Montagne";
    $titre = "Pense-bête : " . $saison . " - " . $lieu;
    $editable = TRUE;
}

$user = ucfirst($_SERVER['REDIRECT_REMOTE_USER']);

$fichier = strtolower($saison) . "/" . strtolower($lieu) . "/pb.txt";
include_once('traitement.php');

include_once('head.php');

echo $msg;

// Affichage du contenu du fichier avec mise en forme
$handle = @fopen($fichier, "r");
$contents = "";
if ($handle) {
    echo "			<div data-role='collapsible-set' data-theme='a' data-content-theme='b'>\n";
    $collaspible = FALSE;
    $ligne_std = TRUE;
    while (!feof($handle)) {
        $ligne = fgets($handle, 4096);
        $contents .= $ligne;
        if (preg_match('/^\* /', $ligne)) { // Ligne "titre", on prépare un collaspible
            $ligne_std = FALSE;
            if ($collapsible) // S'il y en avait déjà un d'ouvert, on le ferme
                echo "				</div> <!-- /collapsible -->\n";
            echo "                              <div data-role='collapsible' class='openMe'>\n";
            $collapsible = TRUE;
            echo "					<h3>" . preg_replace('/\\n/', '', preg_replace('/^\* /', '', $ligne)) . "</h3>\n"; // on affiche le titre
        }
        else if (preg_match('/\- /', $ligne)) {
            $ligne_std = FALSE;
            echo '					<div class="ok">' . preg_replace('/\\n/', '', preg_replace('/\- /', 'OK -> ', $ligne)) . "</div>\n";
        } else if (preg_match('/Auteur \: /', $ligne)) {
            $ligne_std = FALSE;
            $auteur = preg_replace('/\\n/', '', preg_replace('/Auteur \: /', '', $ligne));
            //echo '					<div class="author">' . preg_replace('/\\n/', '', preg_replace('/Auteur \: /', '', $ligne)) . "</div>\n";
        }
        echo ($ligne_std) ? ("					<div>" . preg_replace('/\\n/', '', $ligne) . "</div>\n") : "";
        $ligne_std = TRUE;
    }
    fclose($handle);
    echo "				</div> <!-- /collapsible -->\n";
    echo "			</div><!-- /collapsible-set -->\n";
} else {
    echo "			<p>Veuillez choisir la saison et le lieu avec le menu de droite.</p>\n";
}
//echo "			<br /><hr />\n";
// Affichage du textarea contenant ce ficher
if ($_GET['form'] == 'aff' && $editable) {
    echo "			<form action='./?saison=" . strtolower($saison) . "&amp;lieu=" . strtolower($lieu) . "' method='post' data-ajax='false' >\n";
    echo "				<p style='text-align:center'><textarea name='content' rows='20' cols='80'>" . htmlspecialchars($contents) . "</textarea><br />\n";
    echo "				<input type='submit' name='submit' accesskey='s' value='Mettre-&agrave;-jour' /></p>\n";
    echo "			</form>";
}

include_once('foot.php');
?>
