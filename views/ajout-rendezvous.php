<?php 
include 'header.php';
include_once '../models/appointments.php';
include_once '../models/patients.php';
include '../controllers/ajout-rendezvousController.php'; 
?>
<div class="content" id="ajout-patient">
    <form class="offset-4 col-4" action="ajout-rendezvous.php" method="POST">
        <div class="form-group">
            <label for="patient">Patient :</label>
            <select id="patient" name="patient">
            <option selected disabled>Choisissez le patient :</option><?php
            foreach($patientsList as $patient){ ?>
                <option value="<?= $patient->id ?>"><?= $patient->lastname . ' ' . $patient->firstname ?></option><?php
            } ?>
            </select>
            <p class="errorForm"><?= isset($formErrors['patient']) ? $formErrors['patient'] : '' ?></p>
        </div>
        <div class="form-group">
            <label for="date">Date du rendez-vous :</label>
            <input id="date" class="form-control" type="date" name="date" />
            <p class="errorForm"><?= isset($formErrors['dateHour']) ? $formErrors['dateHour'] : '' ?></p>
        </div>
        <div class="form-group">
            <label for="hour">Heure :</label>
            <select id="hour" name="hour">
            <option selected disabled>Choisissez l'heure du rendez-vous :</option><?php
            foreach($appointmentsArray as $appointment => $hour){ ?>
                <option value="<?= $appointment ?>"><?= $hour ?></option><?php
            } ?>
            </select>
            <p class="errorForm"><?= isset($formErrors['hour']) ? $formErrors['hour'] : '' ?></p>
        </div>
        <input type="submit" class="btn btn-primary" name="addAppointment" value="Enregistrer"></input>
        <p class="formOk"><?= isset($message) ? $message : '' ?></p>
    </form>
</div>
<?php include 'footer.php';