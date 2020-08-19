<?php 
if(isset($_GET['id'])){
    $appointments = new appointments();
    $appointments->id = htmlspecialchars($_GET['id']);
    if($appointments->checkAppointmentExistById()){
        $appointmentInfo = $appointments->getAppointmentInfo();
    }else{
        $message = 'Le rendez-vous n\'existe pas';
    }
}else{
    $message = 'Une erreur s\'est produite';
}