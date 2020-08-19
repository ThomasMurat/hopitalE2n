<?php 
include 'header.php';
include_once '../models/appointments.php';
include '../controllers/liste-rendezvousController.php'; 
?>

   
<!-- Start your project here-->
<table class="table table-striped text-center container">
   <thead>
       <tr>
           <th scope="col">Nom :</th>
           <th scope="col">Prénom :</th>
           <th scope="col">Date du RDV :</th>
           <th scope="col">Heure du RDV :</th>
           <th scope="col">Lien :</th>
       </tr>
   </thead>
   <tbody><?php 
    foreach($appointmentList as $appointment){ ?>
       <tr>
           <td><?= $appointment->lastname ?></td>
           <td><?= $appointment->firstname ?></td>
           <td><?= $appointment->dateFr ?></td>
           <td><?= $appointment->hour ?></td>
           <td><button type="button" class="btn btn-primary"><a class="text-white" href="rendezvous.php?&id=<?= $appointment->id ?>">Voir le RDV</a></button></td>
       </tr><?php
    } ?>
   </tbody>
</table>
<?php include 'footer.php';