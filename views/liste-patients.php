<?php 
include 'header.php';
include_once '../models/appointments.php';
include_once '../models/patients.php';
include '../controllers/liste-patientsController.php'; 


    if(isset($_GET['idDelete'])){ ?>
        <div class="alert text-center alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h1 class="h4">Voulez-vous supprimer ce patient et ses rendez-vous?</h1>
            <form class="text-center" method="POST" action="<?= $_SERVER['REQUEST_URI'] ?>">
                <input type="hidden" name="idDelete" value="<?= $patients->id ?>" />
                <button type="submit" class="btn btn-primary btn-sm" name="confirmDelete">OUI</button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="alert">Non</button>
            </form>
        </div><?php
    } ?>
<form method="GET" action="liste-patients.php" class="form-inline justify-content-center">
    <input id="search" name="search" type="text" placeholder="rechercher un patient" />
    <button type="submit" class="btn btn-sm btn-primary" name="sendSearch">Rechercher</button>
</form><?php
if($patients->resultNumber == 0){ ?>
        <p class="text-center m-5"><?= $searchMessage ?></p><?php
}else { ?>
    <p class="text-center m-5"><?= $searchMessage ?></p>
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
        for($i = 0 + $page ; $i < ($resultLimit + $page); $i++){ 
            if($i < $patients->resultNumber){ ?>
                <tr>
                        <td><?= $patientsList[$i]->lastname ?></td>
                        <td><?= $patientsList[$i]->firstname ?></td>
                        <td><?= $patientsList[$i]->birthDateFr ?></td>
                        <td><?= $patientsList[$i]->mail ?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm"><a class="text-white" href="profil-patient.php?&id=<?= $patientsList[$i]->id ?>">Voir le profil</a></button>
                            <button type="button" class="btn btn-danger btn-sm"><a class="text-white" href="<?= ($_SERVER['REQUEST_URI'] == '/views/liste-patients.php') ? 'liste-patients.php?' : $link ; ?>&page=<?= $page / $resultLimit ?>&idDelete=<?= $patientsList[$i]->id ?>">Supprimer</a></button>
                        </td>
                </tr><?php
            }
        } ?>
    </tbody>
    </table><?php
    for($i = 0; $i < $pageLimit; $i++){ ?>
        <a href="<?= ($_SERVER['REQUEST_URI'] == '/views/liste-patients.php') ? 'liste-patients.php?' : $link ; ?>&page=<?= $i ?>"><?= $i + 1 ?></a><?php
    }
} 
include 'footer.php';