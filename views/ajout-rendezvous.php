<?php 
include_once 'models/appointment.php';
include 'views/ajout-rendezvousController.php'; ?>
<div class="content" id="ajout-patient">
    <form class="offset-4 col-4" action="index.php?content=ajout-patient" method="POST">
        <div class="form-group">
            <label for="patient">Patient :</label>
            <select id="patient" name="patient">
                <option></option>
            </select>
            <p class="errorForm"><?= isset($formErrors['patient']) ? $formErrors['patient'] : '' ?></p>
        </div>
        <div class="form-group">
            <label for="dateHour">Date et heure du rendez-vous :</label>
            <input id="dateHour" class="form-control <?= count($formErrors) > 0 ? (isset($formErrors['dateHour']) ? 'is-invalid' : 'is-valid') : '' ?>" value="<?= isset($_POST['dateHour']) ? $_POST['dateHour'] : '' ?>" type="datetime" name="dateHour" />
            <!--message d'erreur-->
            <p class="errorForm"><?= isset($formErrors['dateHour']) ? $formErrors['dateHour'] : '' ?></p>
        </div>
        <input type="submit" class="btn btn-primary" name="addAppointment" value="Enregistrer"></input>
        <p class="formOk"><?= isset($addPatientMessage) ? $addPatientMessage : '' ?></p>
    </form>
</div>