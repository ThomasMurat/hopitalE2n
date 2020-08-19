<?php
include_once 'models/patients.php';
include 'controllers/profil-patientController.php'; ?>
<!-- Card -->
<div class="card">

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
     <p class="card-text"><?= 'message' ?></p><?php
    } ?>
    <button><a href="index.php?content=modifier-profil&id=<?= $patient->id ?>">Modifier le profile</a></button>
  </div>

</div>
<!-- Card -->