    <!-- some css to make table section equal 😁👍 -->
    <style>
        #tableColsult td,
        #tableColsult th {
            min-width: 33%;
        }

        #tableInfo td,
        #tableInfo th {
            min-width: 25%;
        }
    </style>
    <div class="border border-2 rounded-3">
        <?php
        if ($DM) :
            $dateNaissance = explode("-", $DM->date_naissance);
            $age = (date("md", date("U", mktime(0, 0, 0, $dateNaissance[1], $dateNaissance[2], $dateNaissance[0]))) > date("md") ? ((date("Y") - $dateNaissance[0]) - 1) : (date("Y") - $dateNaissance[0]));
        ?>
            <table class="table text-center table-bordered" id="tableInfo">
                <tr class="table-primary">
                    <th colspan="4"><b>IDENTIFICATION PATIENT</b></th>
                </tr>
                <tr>
                    <th class="bg-warning">NOM : </th>
                    <td><?= $DM->Nom ?></td>
                    <th class="bg-warning">PRENOM : </th>
                    <td><?= $DM->Prenom ?></td>
                </tr>
                <tr>
                    <th class="bg-warning">DATE DE NAISANCE : </th>
                    <td><?= $DM->date_naissance ?></td>
                    <th class="bg-warning">AGE : </th>
                    <td><?= $age ?></td>
                </tr>
                <tr>
                    <th class="bg-warning">SEXE :</th>
                    <td>
                        <label for="homme">H</label>
                        <input id="homme" type="radio" readonly name='sexe' <?php if ($DM->Sexe == 'M') echo 'checked' ?>>
                        <label for="famme">F</label>
                        <input id="famme" type="radio" readonly name='sexe' <?php if ($DM->Sexe == 'F') echo 'checked' ?>>
                    </td>
                    <th class="bg-warning">CIN : </th>
                    <td><?= $DM->Cin ?></td>
                </tr>
                <tr>
                    <th></th>
                    <th class="bg-warning">TELEPHONE : </th>
                    <td>0<?= $DM->Telephone ?></td>
                    <td></td>
                </tr>
                <tr class="table-primary">
                    <th colspan="2"><b>ANTECEDENTS</b></th>
                    <th colspan="2"><b>MALADIES</b></th>
                </tr>
                <tr>
                    <td colspan="2"><?= $DM->Antécédents ?></td>
                    <td colspan="2"><?= $DM->Maladies ?></td>
                </tr>
                <tr class="table-primary">
                    <th colspan="4"><b>SENSIBILITES</b></th>
                </tr>
                <tr>
                    <td colspan="4"><?= $DM->Sensibilité ?></td>
                </tr>
            </table>
            <!-- ancienn colsultations -->
            <?php if ($Cons) : ?>
                <hr class="text-warning py-2">
                <h2 class="text-center fw-bold my-3">CONUSLTATIONS</h2>
                <!-- colsultations table -->
                <table class="table text-center" id="tableColsult">
                    <thead>
                        <tr class="table-primary">
                            <th>Date Consultataion</th>
                            <th>Traitement Demandé</th>
                            <th>Medecin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($Cons as $obj) : ?>
                            <tr>
                                <td><?= $obj->date_consultation ?></td>
                                <td><?= $obj->traitement_demandé ?></td>
                                <td><?= ucfirst($obj->nom) ?> <?= ucfirst($obj->prenom) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
            <!-- ancienn hospitalisation -->
            <?php if ($Hos) : ?>
                <hr class="text-warning py-2">
                <h2 class="text-center fw-bold my-3">HOSPITALISATIONS</h2>
                <table class="table text-center" id="tableHospitali">
                    <thead>
                        <tr class="table-primary">
                            <th class="col-2">Date Entrée</th>
                            <th class="col-2">Date Sortie</th>
                            <th class="col-2">Motif d'entrée</th>
                            <th class="col-2">Motif de sortie</th>
                            <th class="col-2">Numéro chambre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($Hos as $obj) : ?>
                            <tr>
                                <td class="col-2"><?= $obj->date_entre ?></td>
                                <td class="col-2"><?= $obj->date_sortie ?></td>
                                <td class="col-2"><?= $obj->motif_entre ?> </td>
                                <td class="col-2"><?= $obj->motif_sortie ?> </td>
                                <td class="col-2"><?= $obj->id_chambre ?> </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        <?php endif; ?>
    </div>