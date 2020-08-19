<?php
$patients = new patients();
$patientsList = $patients->getPatientsList();
$formErrors = array(); 
$appointmentsArray = array('08:00:00'=>'8h', '09:00:00'=>'9h', '10:00:00'=>'10h','11:00:00'=>'11h', '12:00:00'=>'12h', '14:00:00'=>'14h','15:00:00'=>'15h','16:00:00'=>'16h', '17:00:00'=>'17h', '18:00:00'=>'18h');
$appointment = new appointments();
if(isset($_POST['addAppointment'])){
    if(!empty($_POST['patient'])){
        $patients->id = htmlspecialchars($_POST['patient']);
        if($patients->checkIdPatientExist()){
            $appointment->idPatients = $patients->id;
        }else {
            $formErrors['patient'] = 'Une erreur s\'est produite';
        }
    }else {
        $formErrors['patient'] = 'Vous n\'avez pas sélectionné de patient';
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
    if(isset($date) && isset($hour)){
        //concatenation des variable $date et $hour
        $appointment->dateHour = $date . ' ' . $hour;
        //verifier grace a la méthode checkAppointmentExist si le rdv existe
        if($appointment->checkAppointmentExist()){
        //si il existe dej, renvoyer une erreur
            $message = '<span style="color:red">Ce crénau horaire n\'est pas libre</span>';
        //si il n'existe pas, appliquer la méthode qui va ajouter le rdv a la data base 
        }else {
            $appointment->addAppointment();
            $message = 'Le rendez-vous a bien été enregistré';
        }   
    }
}