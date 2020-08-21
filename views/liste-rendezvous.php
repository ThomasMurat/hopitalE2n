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
           <td>
                <button type="button" class="btn btn-primary btn-sm"><a class="text-white" href="rendezvous.php?&id=<?= $appointment->id ?>">Voir le RDV</a></button>
                <button type="button" class="btn btn-danger btn-sm"><a class="text-white" href="liste-rendezvous.php?&idDelete=<?= $appointment->id ?>">Supprimer</a></button>
           </td>
           
        </tr><?php
        if(isset($_GET['idDelete']) && $appointment->id == $_GET['idDelete']){ ?>
            <div class="alert text-center alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h1 class="h4">Voulez-vous supprimer ce rendez-vous?</h1>
                <form class="text-center" method="POST" action="liste-rendezvous.php">
                    <input type="hidden" name="idDelete" value="<?= $appointments->id ?>" />
                    <button type="submit" class="btn btn-primary btn-sm" name="confirmDelete">OUI</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Non</button>
                <form>
            </div><?php
        }
    } ?>
   </tbody>
</table>
<?php include 'footer.php';