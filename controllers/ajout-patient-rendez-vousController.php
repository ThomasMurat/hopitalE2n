<?php
$formErrors = array();
$patients = new patients();
$patientsList = $patients->getPatientsList();
$appointmentsArray = array('08:00:00'=>'8h', '09:00:00'=>'9h', '10:00:00'=>'10h','11:00:00'=>'11h', '12:00:00'=>'12h', '14:00:00'=>'14h','15:00:00'=>'15h','16:00:00'=>'16h', '17:00:00'=>'17h', '18:00:00'=>'18h');
$appointment = new appointments();
//verification formulaire pour ajouter un patient
if(isset($_POST['addPatientAppointment'])){
    //instancier notre requete de la class patients
    if (!empty($_POST['mail'])) {
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $patients->mail = htmlspecialchars($_POST['mail']);
        }else {
            $formErrors['mail'] = 'Votre mail n\'est pas valide, veuillez utiliser le format : kamel.dupond@gmail.com';
        }
    }else {
        $formErrors['mail'] = 'Veuillez entrer votre adresse mail.';
    }
    if (!empty($_POST['lastname'])) {
        //si une valeur existe, verifier qu'elle soit en accord avec la regexp
        if (filter_var($_POST['lastname'], FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => $regexpName)))) {
            //si tout est ok, stocker la valeur dans dans une variable
            $patients->lastname = htmlspecialchars($_POST['lastname']);
        //si une valeur existe mais qu'elle est non conforme a la regexp, afficher le message d'erreur suivant : 
        }else {
            $formErrors['lastname'] = 'Votre Nom n\'est pas valide.';
        }
        //si aucune valeur n'est entrée, afficher le message d'erreur suivant :
    }else {
        $formErrors['lastname'] = 'Veuillez entrer votre Nom.';
    }
    if (!empty($_POST['firstname'])) {
        //si une valeur existe, verifier qu'elle soit en accord avec la regexp
        if (filter_var($_POST['firstname'], FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => $regexpName)))) {
            //si tout est ok, stocker la valeur dans dans une variable
            $patients->firstname = htmlspecialchars($_POST['firstname']);
        //si une valeur existe mais qu'elle est non conforme a la regexp, afficher le message d'erreur suivant : 
        }else {
            $formErrors['firstname'] = 'Votre Prénom n\'est pas valide.';
        }
        //si aucune valeur n'est entrée, afficher le message d'erreur suivant :
    }else {
        $formErrors['firstname'] = 'Veuillez entrer votre Prénom.';
    }
    if (isset($_POST['phone'])) {
        //si une valeur existe, verifier qu'elle soit en accord avec la regexp
        if (filter_var($_POST['phone'], FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => $regexpPhone)))) {
            //si tout est ok, stocker la valeur dans dans une variable
            $patients->phone = htmlspecialchars($_POST['phone']);
        //si une valeur existe mais qu'elle est non conforme a la regexp, afficher le message d'erreur suivant : 
        }else if(empty($_POST['phone'])) {
            $patients->phone = NULL;
        }else {
            $formErrors['phone'] = 'Votre numéro de telephone n\'est pas valide.';
        }
        //si aucune valeur n'est entrée, afficher le message d'erreur suivant :
    }
    if (!empty($_POST['birthdate'])) {
        //si une valeur existe, verifier qu'elle soit en accord avec la regexp
        if (filter_var($_POST['birthdate'], FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => $regexpDate)))) {
            //si tout est ok, stocker la valeur dans dans une variable
            $patients->birthDate = htmlspecialchars($_POST['birthdate']);
        //si une valeur existe mais qu'elle est non conforme a la regexp, afficher le message d'erreur suivant : 
        }else {
            $formErrors['birthdate'] = 'Votre date de naissance n\'est pas valide.';
        }
        //si aucune valeur n'est entrée, afficher le message d'erreur suivant :
    }else {
        $formErrors['birthdate'] = 'Veuillez entrer votre date de naissance.';
    }
    if(!empty($_POST['date'])){
        if(preg_match($regexpDate, $_POST['date'])){
            $date = htmlspecialchars($_POST['date']);
        }else {
            $formErrors['date'] = 'Date invalide';
        }
    }else {
        $formErrors['date'] = 'Vous n\'avez pas spécifié de date';
    }
    if(!empty($_POST['hour'])){
        if(isset($appointmentsArray[$_POST['hour']])){
            $hour = htmlspecialchars($_POST['hour']);
        }else {
            $formErrors['hour'] = 'Ce crénau horaire n\'est pas valide';
        }
    }else {
        $formErrors['hour'] = 'Vous n\'avez pas choisie d\'horaire';
    }
    if(empty($formErrors)){
        $appointment->dateHour = $date . ' ' . $hour;
        if(!$patients->checkPatientExist()){
            try {
                $patients->beginTransaction();
                $patients->addPatient();
                $appointment->idPatients = $patients->getLastInsertId();
                $appointment->addAppointment();
                $patients->commit();
            }catch(Exception $e) {
                $patients->rollBack();
            }
        }else {
            $idPatient = $patients->getPatientId()->id;
            header('Location:ajout-rendezvous.php?id='. $idPatient);
            exit;
        }
    }
}