<?php
$regexpName = '/^[a-zA-ZÀ-ÖØ-öø-ÿ\'\ \-\_]+$/';
$regexpPhone = '/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/';
$regexpDate = '/^(19((0[4|8])|([1|3|5|7|9][2|6])|([2|4|6|8][0|4|8]))[ \-\/]02[ \-\/]((0[1-9])|([1|2][0-9])))|((20((0[0|4|8])|(1[2|6])|20))[ \-\/]02[ \-\/]((0[1-9])|([1|2][0-9])))|((19[0-9][0-9])|(20([0-1][0-9])|20))[ \-\/]((((0[4|6|9])|11)[ \-\/]((0[1-9])|([1|2][0-9])|30))|(((0[1|3|5|7|8])|1([0|2]))[ \-\/]((0[1-9])|([1|2][0-9])|3([0-1]))))$/';

$pageList = array('Accueil' => 'accueil'
                ,'liste-patients' => 'Liste des patients'
                ,'ajout-patient' =>  'Ajouter un patient'
                ,'liste-rendezvous' => 'Liste des rendez-vous'
                ,'ajout-rendezvous' => 'Ajouter un rendez-vous'
                ,'ajout-patient-rendez-vous' => 'Ajouter un patient avec un rendez-vous'
                ,'profil-patient' => 'Profil du patient'
                ,'rendezvous' => 'Fiche rendez vous' 
                ,'modifier-profil' => 'Modifier le profil'
                ,'modifier-rendezvous' => 'Modifier le rendez-vous');

//si la valeur content existe et que sa valeur est egale a une des clés associativent du tableau $pageList
if(isset($_GET['content']) && (isset($pageList[$_GET['content']]))) {
            $title = $pageList[$_GET['content']];
            $page = htmlspecialchars($_GET['content']);
            $content = 'views/' . $page . '.php';
} else {
    $title = 'Accueil';
    $content = 'views/accueil.php';
}