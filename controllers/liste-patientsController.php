<?php
$patients = new patients();
$appointments = new appointments();
if(isset($_GET['sendSearch'])){
    $patients->search = htmlspecialchars($_GET['search']);
    $patients->resultNumber = count($patients->searchPatientsListByName());
    if($patients->resultNumber == 0){
        $searchMessage = 'Aucun resultat ne correspond à votre recherche';
        
    }else{
        $searchMessage = 'Il y a ' . $patients->resultNumber . ' résultats';
        $patientsList = $patients->searchPatientsListByName();
        $link = 'liste-patients.php?search=' . $_GET['search'] . '&sendSearch=';
    }
}else{
    $patientsList = $patients->getPatientsList();
    $patients->resultNumber = count($patientsList);
    $searchMessage = 'Il y a ' . $patients->resultNumber . ' patients';
    $link = 'liste-patients.php?';
}



if(!empty($_GET['idDelete'])){
    $patients->id = htmlspecialchars($_GET['idDelete']);
}else if(!empty($_POST['idDelete'])){
    $patients->id = htmlspecialchars($_POST['idDelete']);
}else {
    $deleteMessage = 'Aucun patient n\'a été sélectionné';
}
if(isset($_POST['confirmDelete'])){
    if($patients->checkIdPatientExist()){
        $appointments->idPatients = $patients->id;
        if($appointments->checkAppointmentExistByIdPatients()){
            if($appointments->deleteAppointmentByIdPatients()){
                $patients->deletePatient();
                header('Location: liste-patients.php'); 
            }else {
                $message = 'une erreur est survenue lors de la suppression des rendez-vous';
            }
        }else {
            $patients->deletePatient();
            header('Location: liste-patients.php');  
        }
        
    }else {
        $message = 'erreur';
    }   
}

$resultLimit = 5;
$pageLimit = ceil($patients->resultNumber / $resultLimit);
$page = 0;
if(isset($_GET['page'])){
    $page = $_GET['page'] * $resultLimit;
}

