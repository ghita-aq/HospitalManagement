<div>
    <form action="?action=reserverConsulattion" method="post" class="formAff">
        <div class="d-flex justify-content-evenly p-5">
            <div class=" m-2 form-floating w-50">
                <input type="text" class="form-control" placeholder="ID patient" name="id_patient" id="id_patient">
                <label for="id_patient">ID patient</label>
            </div>
            <div class="m-2 w-50 form-floating">
                <input type="date" class="form-control" name="date" id="date">
                <label for="date">Date Consultation</label>
            </div>
        </div>
        <div class="d-flex justify-content-center pb-3">
            <label for="id_medecin" class="fw-bold align-item-center mt-2">Medecin</label>
            <select name="id_medecin" id="id_medecin" class="form-select w-25 mx-3">
                <?php if ($tab_medecin) :
                    foreach ($tab_medecin as $medecin) : ?>
                        <option value="<?= $medecin->id_medecin ?>"><?= strtoupper($medecin->nom . ' ' . $medecin->prenom); ?></option>
                <?php endforeach;
                endif; ?>
            </select>

            <button type="submit" name="action" class="subBtn text-light">Réserver</button>
        </div>
    </form>

    <div class="mt-5">
        <h3 class="text-center titel fs-3 border border-4 rounded-3 py-2">Les prochaines Consultations</h3><br>

        <?php if ($tab_consultation) : ?>
            <table class="text-center">
                <thead>
                    <tr>
                        <th>ID Consultation</th>
                        <th>Date</th>
                        <th>Medecin</th>
                        <th>Patient</th>
                        <th>Id Patient</th>
                        <th>Modifier Consultation</th>
                        <th>Supprimer Consultation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tab_consultation as $consultation) : ?>
                        <tr>
                            <td><?= $consultation->id_consultation ?></td>
                            <td style="width: 120px;"><?= $consultation->date_consultation ?></td>
                            <td><?= $consultation->nomMedcin ?></td>
                            <td><?= $consultation->nomPatient ?></td>
                            <td><?= $consultation->id_patient ?></td>
                            <td>
                                <form action="?action=Modifier" method="post">
                                    <input type="hidden" name="id_consultation" value="<?= $consultation->id_consultation ?>">
                                    <input type="submit" class="btn btn-success" name="action" value="Modifier">
                                </form>
                            </td>
                            <td>
                                <form action="?action=Supprimer" method="post">
                                    <input type="hidden" name="id_consultation" value="<?= $consultation->id_consultation ?>">
                                    <input type="submit" class="btn btn-danger" name="action" value="Supprimer">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>