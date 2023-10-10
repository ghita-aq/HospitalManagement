<div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
    <!-- CHERCHER DES PATIENTS -->
    <form class="d-flex mx-auto" action="?chercher" method="get" class="d-inline-block">
        <input type="text" name="idPatient" class="form-control rounded-pill" placeholder="Chercher patient par ID">
        <input type="submit" name="action" class="ms-2 btn rounded-pill btn-warning" value="chercher">
    </form>
    <!-- FILTRER LA LISTE -->
    <form class="d-flex mx-auto" action=?Filtrer method="get" role="search">
        <form action=?Filtrer method="get">
            <select name="patients" class="form-select rounded-pill" id="">
                <option value="1" <?php if (isset($_GET["patients"]) && $_GET["patients"] == 1) echo "selected" ?>>Tout patients</option>
                <option value="2" <?= (isset($_GET["patients"]) && $_GET["patients"] == 2) ? "selected" : "" ?>>patients Hospitalisés</option>
                <input type="submit" name="action" class="ms-2 btn btn-success rounded-pill" value="Filtrer" />
        </form>
    </form>
</div>
<br>
<?php
$today = date('Y-m-d');
if ($tab_Patients) :
?>
    <table class="text-center">
        <thead>
            <tr>
                <th>ID Patient</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Dossier Medical</th>
                <?php
                if ($_SESSION["login"] == 'chargé de réception') {
                    echo '<th>Chambre</th>';
                } else if ($_SESSION["login"] == 'Medecin') {
                    echo '<th>Examination</th>';
                }
                ?>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($tab_Patients as $Patiente) : ?>
                <tr>
                    <td><?= $Patiente->id_Patient ?> </td>
                    <td><?= $Patiente->Nom ?> </td>
                    <td><?= $Patiente->Prenom ?> </td>
                    <td>
                        <form action="?action=afficherdm&id=<?= $Patiente->id_Patient ?>" method="post">
                            <input type="submit" class="btn btn-secondary" name="action" value='Dossier Medicale'>
                        </form>
                    </td>
                    <?php if ($_SESSION["login"] == 'chargé de réception') : ?>
                        <td>
                            <form action="" method="get">
                                <input type="hidden" name="id" value="<?= $Patiente->id_Patient ?>">
                                <input type="hidden" name="id_hos" value="<?= $Patiente->id_hospitalisation ?>">
                                <?php
                                if ($Patiente->etat == 'non hospitalisé' || $Patiente->etat == null) {
                                    echo '<input type="submit" class="btn btn-success" name="action" value="Affecter Chambre">';
                                } else {
                                    echo '<input type="submit" class="btn btn-warning" name="action" value="Désaffecter Chambre">';
                                }
                                ?>
                            </form>
                        </td>
                    <?php elseif ($_SESSION["login"] == 'Medecin') : ?>
                        <td>
                            <form action="?action=Examiner" method="get">
                                <input type="hidden" name="id_hos" value="<?= $Patiente->id_hospitalisation ?>">
                                <?php
                                if ($Patiente->etat == 'non hospitalisé' || $Patiente->etat == null) {
                                    echo '';
                                } else {
                                    echo '<input type="submit" class="btn btn-warning" name="action" value="Examiner">';
                                }
                                ?>
                            </form>
                        </td>
                    <?php endif; ?>
                <?php endforeach; ?>
                </tr>
        </tbody>
    </table>
<?php endif; ?>