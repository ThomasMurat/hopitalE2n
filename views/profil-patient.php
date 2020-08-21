<?php
include 'header.php';
include_once '../models/patients.php';
include_once '../models/appointments.php';
include '../controllers/profil-patientController.php'; 
 ?>
<!-- Card -->
<div class="card text-center">

  <!-- Card content -->
  <div class="card-body">

    <!-- Title -->
    <h4 class="card-title">Fiche Patient</h4>
    <!-- Text -->
    <?php if(isset($patientInfo)){ ?>
        <p class="card-text">Prénom :<?= $patientInfo->firstname ?></p>
        <p class="card-text">Nom : <?= $patientInfo->lastname ?></p>
        <p class="card-text">Date de naissance : <?= $patientInfo->birthDate ?></p>
        <p class="card-text">Numero de téléphone : <?= $patientInfo->phone ?></p>
        <p class="card-text">Adresse mail : <?= $patientInfo->mail ?></p><?php
    }else { ?>
     <p class="card-text"><?= $message ?></p><?php
    } ?>
    <button><a href="modifier-profil.php?&id=<?= $patient->id ?>">Modifier le profile</a></button>
  </div>

</div>
<table class="table table-striped text-center container">
  <h4 class="text-center mt-5">Liste des rendez-vous</h4>
   <thead>
       <tr>
           <th scope="col">Date du RDV :</th>
           <th scope="col">Heure du RDV :</th>
       </tr>
   </thead>
   <tbody><?php 
    foreach($appointmentList as $appointment){ ?>
       <tr>
           <td><?= $appointment->dateFr ?></td>
           <td><?= $appointment->hour ?></td>
       </tr><?php
    } ?>
   </tbody>
</table>
<?php include 'footer.php';