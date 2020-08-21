<?php
$appointments = new appointments;
$appointmentList = $appointments->getAppointmentList();
if(!empty($_GET['idDelete'])){
    $appointments->id = htmlspecialchars($_GET['idDelete']);
}else if(!empty($_POST['idDelete'])){
    $appointments->id = htmlspecialchars($_POST['idDelete']);
}else {
    $message = 'Aucun rendez-vous n\'a été sélectionné';
}
if(isset($_POST['confirmDelete'])){
    if($appointments->checkAppointmentExistById()){
        $appointments->deleteAppointment();
        header('Location: liste-rendezvous.php'); 
    }else {
        $message = 'erreur';
    }   
}