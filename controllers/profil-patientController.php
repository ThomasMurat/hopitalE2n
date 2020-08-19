<?php
if(isset($_GET['id'])){
    $patient = new patients();
    $patient->id = $_GET['id'];
    $patientInfo = $patient->getProfilPatient();   
}
