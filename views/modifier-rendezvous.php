<?php 
include 'header.php';
include_once '../models/appointments.php';
include_once '../models/patients.php';
include '../controllers/modifier-rendezvousController.php'; 
?>
<div class="content" id="modifier-rendezvous"><?php
if(isset($_GET['id'])){ ?>
    <form class="offset-4 col-4" action="modifier-rendezvous.php?id=<?= $appointments->id ?>" method="POST">
        <div class="form-group">
            <label for="patient">Patient :</label>
            <select id="patient" name="patient"><?php
            foreach($patientsList as $patient){ 
                if(isset($_POST['patient'])) {?>
                    <option value="<?= $patient->id ?>"<?= ($patient->id == $_POST['patient']) ? 'selected': ''; ?>><?= $patient->lastname . ' ' . $patient->firstname ?></option><?php
                }else { ?>
                    <option value="<?= $patient->id ?>"<?= ($patient->id == $appointmentInfo->idPatients) ? 'selected': ''; ?>><?= $patient->lastname . ' ' . $patient->firstname ?></option><?php
                }
            } ?>
            </select>
            <p class="errorForm"><?= isset($formErrors['patient']) ? $formErrors['patient'] : '' ?></p>
        </div>
        <div class="form-group">
            <label for="date">Date du rendez-vous :</label>
            <input id="date" class="form-control" type="date" name="date" value="<?= isset($_POST['date']) ? $_POST['date'] : $appointmentInfo->date ?>" />
            <p class="errorForm"><?= isset($formErrors['date']) ? $formErrors['date'] : '' ?></p>
        </div>
        <div class="form-group">
            <label for="hour">Heure :</label>
            <select id="hour" name="hour"><?php
            foreach($appointmentsArray as $appointment => $hourSlot){ 
                if(isset($_POST['hour'])) {?>
                    <option value="<?= $appointment ?>"<?= ($appointment == $_POST['hour']) ? 'selected': ''; ?>><?= $hourSlot ?></option><?php
                }else { ?>
                    <option value="<?= $appointment ?>"<?= ($hourSlot == $appointmentInfo->hour) ? 'selected': ''; ?>><?= $hourSlot ?></option><?php
                }
            } ?>
            </select>
            <p class="errorForm"><?= isset($formErrors['hour']) ? $formErrors['hour'] : '' ?></p>
        </div>
        <input type="submit" class="btn btn-primary" name="modifyAppointment" value="Enregistrer"></input>
        <p class="formOk"><?= isset($message) ? $message : '' ?></p>
    </form><?php
}else {

} ?>
</div>
<?php include 'footer.php';