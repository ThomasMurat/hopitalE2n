<?php
include 'header.php';
include_once '../models/dataBase.php';
include_once '../models/appointments.php';
include_once '../models/patients.php';
include '../controllers/ajout-patient-rendez-vousController.php'; 
?>
<div class="content" id="ajout-patient-rendez-vous">
    <form class="offset-4 col-4" action="ajout-patient-rendez-vous.php" method="POST">
        <div class="form-group">
            <label for="lastname">Nom :</label>
            <input id="lastname" class="form-control <?= count($formErrors) > 0 ? (isset($formErrors['lastname']) ? 'is-invalid' : 'is-valid') : '' ?>" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" type="text" name="lastname" />
            <!--message d'erreur-->
            <p class="errorForm"><?= isset($formErrors['lastname']) ? $formErrors['lastname'] : '' ?></p>
        </div>
        <div class="form-group">
            <label for="firstname">Prénom :</label>
            <input id="firstname" class="form-control <?= count($formErrors) > 0 ? (isset($formErrors['firstname']) ? 'is-invalid' : 'is-valid') : '' ?>" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" type="text" name="firstname" />
            <!--message d'erreur-->
            <p class="errorForm"><?= isset($formErrors['firstname']) ? $formErrors['firstname'] : '' ?></p>
        </div>
        <div class="form-group">
            <label for="birthdate">Date de naissance :</label>
            <input id="birthdate" type="date" name="birthdate" class="form-control <?= count($formErrors) > 0 ? (isset($formErrors['birthdate']) ? 'is-invalid' : 'is-valid') : '' ?>" value="<?= isset($_POST['birthdate']) ? $_POST['birthdate'] : '' ?>" />
            <!--message d'erreur-->
            <p class="errorForm"><?= isset($formErrors['birthdate']) ? $formErrors['birthdate'] : '' ?></p>
        </div>
        <div class="form-group">
            <label for="phone">Numéros de téléphone :</label>
            <input id="phone" class="form-control <?= count($formErrors) > 0 ? (isset($formErrors['phone']) ? 'is-invalid' : 'is-valid') : '' ?>" value="<?= isset($_POST['phone']) ? $_POST['phone'] : '' ?>" type="tel" name="phone" />
            <!--message d'erreur-->
            <p class="errorForm"><?= isset($formErrors['phone']) ? $formErrors['phone'] : '' ?></p>
        </div>
        <div class="form-group">
            <label for="mail">E-mail :</label>
            <input id="mail" class="form-control <?= count($formErrors) > 0 ? (isset($formErrors['mail']) ? 'is-invalid' : 'is-valid') : '' ?>" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>" type="email" name="mail" />
            <!--message d'erreur-->
            <p class="errorForm"><?= isset($formErrors['mail']) ? $formErrors['mail'] : '' ?></p>
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
        <input type="submit" class="btn btn-primary" name="addPatientAppointment" value="Enregistrer"></input>
        <p class="formOk"><?= isset($addPatientAppointmentMessage) ? $addPatientAppointmentMessage : '' ?></p>
    </form>
</div>
<?php include 'footer.php';