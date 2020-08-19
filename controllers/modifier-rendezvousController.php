<?php
$patients = new patients();
$patientsList = $patients->getPatientsList();
$formErrors = array(); 
$appointmentsArray = array('08:00:00'=>'8h00', '09:00:00'=>'9h00', '10:00:00'=>'10h00','11:00:00'=>'11h00', '12:00:00'=>'12h00', '14:00:00'=>'14h00','15:00:00'=>'15h00','16:00:00'=>'16h00', '17:00:00'=>'17h00', '18:00:00'=>'18h00');
$appointments = new appointments();
if(isset($_GET['id'])){
    $appointments->id = htmlspecialchars($_GET['id']);
    if($appointments->checkAppointmentExistById()){
        $appointmentInfo = $appointments->getAppointmentInfo(); 
    }else {
        $message = 'Erreur: Impossible de récupérer les informations du rendez-vous';
    }
}else {
    $message = 'Erreur: Aucun rendez-vous sélectionné';
}
if(isset($_POST['modifyAppointment'])){
    if(!empty($_POST['patient'])){
        $patients->id = htmlspecialchars($_POST['patient']);
        if($patients->checkIdPatientExist()){
            $appointments->idPatients = $patients->id;
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
        $appointments->dateHour = $date . ' ' . $hour;
        //verifier grace a la méthode checkAppointmentExist si le rdv existe
        if($appointments->checkAppointmentExist()){
        //si il existe dej, renvoyer une erreur
            $message = '<span style="color:red">Ce crénau horaire n\'est pas libre</span>';
        //si il n'existe pas, appliquer la méthode qui va ajouter le rdv a la data base 
        }else {
            $appointments->updateAppointment();
            $message = 'Le rendez-vous a bien été modifié';
        }   
    }
}