<?php
if(!empty($_GET['id'])){
    $patient = new patients();
    $patient->id = htmlspecialchars($_GET['id']);
    if($patient->checkIdPatientExist()){
        $appointments = new appointments();
        $appointments->idPatients = $patient->id;
        $appointmentList = $appointments->getAppointmentListById();
        $patientInfo = $patient->getProfilPatient(); 
    }else {
        $message = 'Une erreur s\'est produite';
    }
}
