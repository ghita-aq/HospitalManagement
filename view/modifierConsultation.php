<div>
    <?php if ($consultation) : ?>
        <form action="?action=ModifierConsultation" class="formAff" method="post">
            <div class="d-flex justify-content-evenly p-5">
                <div class=" m-2 form-floating w-50">
                    <input type="text" class="form-control" placeholder="ID parient" name="id_patient" value="<?= $consultation->id_patient ?>" id="id_patient">
                    <label for="id_patient">ID patient</label>
                </div>
                <div class="m-2 w-50 form-floating">
                    <input type="date" value="<?= $consultation->date_consultation ?>" class="form-control" name="date" id="date">
                    <label for="date">Date Consultation</label>
                </div>
            </div>
            <div class="d-flex justify-content-center pb-3">
                <label for="id_medecin" class="fw-bold align-item-center mt-2">Medecin</label>
                <select name="id_medecin" class="form-select w-25 mx-3" id="id_medecin">
                    <?php if ($tab_medecin) :
                        foreach ($tab_medecin as $medecin) : ?>
                            <option value="<?= $medecin->id_medecin; ?>" <?php if ($medecin->id_medecin == $consultation->id_medecin) echo 'selected' ?>><?= strtoupper($medecin->nom . ' ' . $medecin->prenom); ?></option>
                    <?php endforeach;
                    endif; ?>
                </select>
                <br>
                <input type="hidden" name="id_consultation" value="<?= $consultation->id_consultation ?>">
                <button type="submit" name="action" class="subBtn text-light">Modifier</button>
            </div>
        </form>
    <?php endif; ?>
</div>