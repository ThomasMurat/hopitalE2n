<?php 
include_once 'models/appointments.php';
include 'controllers/liste-rendezvousController.php'; ?>

   
<!-- Start your project here-->
<table class="table table-striped text-center container">
   <thead>
       <tr>
           <th scope="col">Nom :</th>
           <th scope="col">Prénom :</th>
           <th scope="col">Date du RDV :</th>
           <th scope="col">Lien :</th>
       </tr>
   </thead>
   <tbody><?php 
    foreach($appointmentList as $appointment){ ?>
       <tr>
           <td><?= $appointment->lastname ?></td>
           <td><?= $appointment->firstname ?></td>
           <td><?= $appointment->dateHour ?></td>
           <td><button type="button" class="btn btn-primary"><a class="text-white" href="index.php?content=rendezvous&id=<?= $appointment->id ?>">Voir le RDV</a></button></td>
       </tr><?php
    } ?>
   </tbody>
</table>