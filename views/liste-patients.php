<?php 
include 'header.php';
include_once '../models/patients.php';
include '../controllers/liste-patientsController.php'; 
?>

   
<!-- Start your project here-->
<table class="table table-striped text-center container">
   <thead>
       <tr>
           <th scope="col">Nom :</th>
           <th scope="col">Prénom :</th>
           <th scope="col">Date de naissance :</th>
           <th scope="col">Adresse mail :</th>
           <th scope="col">Lien :</th>
       </tr>
   </thead>
   <tbody><?php 
    foreach($patientsList as $patientDetails){ ?>
       <tr>
           <td><?= $patientDetails->lastname ?></td>
           <td><?= $patientDetails->firstname ?></td>
           <td><?= $patientDetails->birthDateFr ?></td>
           <td><?= $patientDetails->mail ?></td>
           <td><button type="button" class="btn btn-primary"><a class="text-white" href="profil-patient.php?&id=<?= $patientDetails->id ?>">Voir le profil</a></button></td>
       </tr><?php
    } ?>
   </tbody>
</table>
<?php include 'footer.php';