<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $titre; ?></title>

        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="https://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>

        <style type="text/css">
            <!--
            html {
                margin:0;
            }

            body {
                width:80%;
                margin-left:auto;
                margin-right:auto;
                background-color:white;
                color:black;
            }

            .file {
                border:solid 1px gray;
                padding:10px;
            }

            .ok {
                color:#04ee46;
            }

            .title {
                color:#EE2222;
            }

            .author {
                color:red;
                background-color:white;
                float:right;
                padding:0 5px 0 5px;
            }
            -->
        </style>

    </head>
    <body>
        <div data-role="page">

            <div data-role="header">
                <h1><?php echo $titre; ?></h1>
                <a href="#right-panel" data-icon="bars" data-iconpos="left" data-shadow="false" data-iconshadow="false" class="ui-btn-right">Options</a>
                <div class="ui-btn-left">Connecté en tant que <?php echo $user; ?></div>
            </div>

            <div data-role="content">
                <div class="article">
