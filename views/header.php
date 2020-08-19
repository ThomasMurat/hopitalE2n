<?php
$regexpName = '/^[a-zA-ZÀ-ÖØ-öø-ÿ\'\ \-\_]+$/';
$regexpPhone = '/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/';
$regexpDate = '/^(19((0[4|8])|([1|3|5|7|9][2|6])|([2|4|6|8][0|4|8]))[ \-\/]02[ \-\/]((0[1-9])|([1|2][0-9])))|((20((0[0|4|8])|(1[2|6])|20))[ \-\/]02[ \-\/]((0[1-9])|([1|2][0-9])))|((19[0-9][0-9])|(20([0-1][0-9])|20))[ \-\/]((((0[4|6|9])|11)[ \-\/]((0[1-9])|([1|2][0-9])|30))|(((0[1|3|5|7|8])|1([0|2]))[ \-\/]((0[1-9])|([1|2][0-9])|3([0-1]))))$/';

$pageList = array('../index' => 'Accueil'
                ,'liste-patients' => 'Liste des patients'
                ,'ajout-patient' =>  'Ajouter un patient'
                ,'liste-rendezvous' => 'Liste des rendez-vous'
                ,'ajout-rendezvous' => 'Ajouter un rendez-vous'
                ,'ajout-patient-rendez-vous' => 'Ajouter un patient avec un rendez-vous');
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <meta http-equiv="x-ua-compatible" content="ie=edge">
       <title>Material Design for Bootstrap</title>
       <!-- Font Awesome -->
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
       <!-- Google Fonts Roboto -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
       <!-- Bootstrap core CSS -->
       <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
       <!-- Material Design Bootstrap -->
       <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
       <!-- Your custom styles (optional) -->
       <link rel="stylesheet" href="<?= ($_SERVER['REQUEST_URI'] == '/index.php') ? '' : '../'; ?>assets/css/style.css">
   </head>
   <body>
        <nav class="navbar navbar-expand-lg navbar-dark ">
            <a class="navbar-brand" href="#"><img alt="logo chu" title="le logo du chu LA MANU" src="assets/img/logo.png" /></a>
            <button class="navbar-toggler btn-primary" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <!-- mettre foreach ici -->
                <ul class="navbar-nav m-auto"><?php
                    foreach($pageList as $page => $pageName){ ?>
                        <li class="nav-item"><a class="nav-link" href="<?= ($_SERVER['REQUEST_URI'] == '/index.php') ? '' : '../'; ?>views/<?= $page ?>.php"><?= $pageName ?></a></li><?php      
                    } ?>
                </ul>
            </div>
        </nav>