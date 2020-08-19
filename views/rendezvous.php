<?php
include_once 'models/appointments.php';
include 'controllers/rendezvousController.php'; ?>
<!-- Card -->
<div class="card">

  <!-- Card content -->
  <div class="card-body">

    <!-- Title -->
    <h4 class="card-title">Fiche Rendez-vous</h4>
    <!-- Text -->
    <?php if(isset($appointmentInfo)){ ?>
        <p class="card-text">Prénom :<?= $appointmentInfo->firstname ?></p>
        <p class="card-text">Nom : <?= $appointmentInfo->lastname ?></p>
        <p class="card-text">Date du rendez-vous : <?= $appointmentInfo->dateHour ?></p>
        <p class="card-text">Numero de téléphone : <?= $appointmentInfo->phone ?></p>
        <p class="card-text">Adresse mail : <?= $appointmentInfo->mail ?></p><?php
    }else { ?>
     <p class="card-text"><?= $message ?></p><?php
    } ?>
    <button><a href="index.php?content=modifier-profil&id=<?= $appointments->id ?>">Modifier le rendez-vous</a></button>
  </div>

</div>
<!-- Card -->