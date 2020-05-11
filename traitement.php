<?php

$msg = "";

// Traitement du formulaire
if ($_POST['submit']) {
    $filename = $fichier;
    $somecontent = $_POST['content'];

    // sauvegarde intégrale du fichier avant enregistrement du nouveau
    $suffixe = date('Y-m-d_H-i-s');
    $bak = strtolower($saison) . "/" . strtolower($lieu) . '/pb_' . $suffixe . '.txt';
    if (!rename($filename, $bak)) {
        echo "La copie du fichier $filename n'a pas r&eacute;ussi...\n";
        exit;
    }

    if (!$handle = fopen($filename, 'a')) {
        echo "Impossible d'ouvrir le fichier ($filename)";
        exit;
    }

    // Mise-à-jour du fichier
    if (fwrite($handle, $somecontent) === FALSE) {
        echo "Impossible d'&eacute;crire dans le fichier ($filename)";
        exit;
    }

    $msg = "$filename bien &eacute;t&eacute; mis-&agrave;-jour !<br /><hr /><br />\n";
    fclose($handle);
}
?>
