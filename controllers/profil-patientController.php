<?php
if(isset($_GET['id'])){
    $patient = new patients();
    $patient->id = htmlspecialchars($_GET['id']);
    if($patient->checkIdPatientExist()){
        $patientInfo = $patient->getProfilPatient(); 
    }else {
        $message = 'Une erreur s\'est produite';
    }
}
