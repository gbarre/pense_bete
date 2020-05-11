</div> <!-- /article -->
</div>  <!-- /content -->

<div data-role="panel" id="right-panel" data-display="overlay" data-position="right" data-theme="a">

    <ul data-role="listview" data-theme="a">
        <li data-icon="delete" data-mini="true"><a href="#" data-rel="close">Fermer</a></li>
        <li data-role="list-divider" data-mini="true">Menu</li>
    </ul>
    <div data-role="collapsible-set" data-inset="false" data-iconpos="left" data-theme="b" data-content-theme="d">
        <div data-role="collapsible">
            <h3>Été</h3>
            <ul data-role="listview">
                <li data-role="data-url"><a href="./?saison=ete&amp;lieu=montagne" data-ajax="false">Montagne</a></li>
                <li data-role="data-url"><a href="./?saison=ete&amp;lieu=plage" data-ajax="false">Plage</a></li>
            </ul>
        </div>

        <div data-role="collapsible">
            <h3>Hiver</h3>
            <ul data-role="listview">
                <li data-role="data-url"><a href="./?saison=hiver&amp;lieu=montagne" data-ajax="false">Montagne</a></li>
                <li data-role="data-url"><a href="./?saison=hiver&amp;lieu=plage" data-ajax="false">Plage</a></li>
            </ul>
        </div>
    </div>

    <div>
        Formattage de l'édition :<br />
        <pre>* POUR UNE SECTION</pre>
        <pre>- pour un produit prêt</pre>
        Pensez aussi à mettre l'auteur en première ligne du fichier :
        <pre>Auteur : Nom de l'auteur</pre>
    </div>

    <div>
        <a href="#" data-role="button" id="openAll">Tout afficher</a>
        <a href="#" data-role="button" id="closeAll">Tout masquer</a>
<?php	
echo "	<a href=\"./print.php?saison=" . strtolower($saison) . "&lieu=" . strtolower($lieu) . "\" data-role=\"button\" data-ajax=\"false\">Imprimer</a>\n";
?>
    </div>
</div>

<div data-role="footer">
    <h1><?php echo $titre; ?></h1>
    <?php
    if ($editable) {
        echo '			<div class="ui-btn-left">Dernière modification par : ' . $auteur . '</div>
			<a href="./?saison=' . strtolower($saison) . '&amp;lieu=' . strtolower($lieu) . '&amp;form=aff" data-icon="gear" data-iconpos="left" data-shadow="false" data-iconshadow="false" class="ui-btn-right">Éditer</a>
';
    }
    ?>
</div>
</div>  <!-- /page -->
<script type="text/javascript">
$('#openAll').on('click', function() {
        $(".ui-collapsible-heading").removeClass("ui-collapsible-heading-collapsed");
        $(".ui-collapsible-content").removeClass("ui-collapsible-content-collapsed");
        $(".ui-collapsible-heading a").addClass("ui-icon-minus").removeClass("ui-icon-plus");

});

$('#closeAll').on('click', function() {
        $(".ui-collapsible-heading").addClass("ui-collapsible-heading-collapsed");
        $(".ui-collapsible-content").addClass("ui-collapsible-content-collapsed");
        $(".ui-collapsible-heading a").removeClass("ui-icon-minus").addClass("ui-icon-plus");

});
</script>
</body>
</html>
