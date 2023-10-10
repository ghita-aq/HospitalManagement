<div>
    <form action="?action=AjouterHospitalisation&ip=<?= $id_patient ?>" method="post" class="formAff">
        <h3 class="titel p-3 text-dark text-center">Affecter une chambre au patient <?= $id_patient ?></h3>
        <div class="d-flex justify-content-evenly p-5">
            <div class=" m-2 form-floating w-50">
                <textarea class="form-control" placeholder="Motif d'entré" name="motif_entre" id="motif_entre"></textarea>
                <label for="motif_entre">Motif d'entré</label>
            </div>

            <div class="m-2 w-50 form-floating">
                <input type="date" class="form-control" name="date" id="date">
                <label for="date">Date Sortie</label>
            </div>
        </div>
        <div class="d-flex justify-content-center py-3">
            <label for="chambre" class="fw-bold align-item-center mt-1">Chambre</label>
            <select name="chambre" id="chambre" class="form-select w-25 mx-3">
                <?php if ($tab_chambre) :
                    foreach ($tab_chambre as $chambre) : ?>
                        <option class="text-center text-primary fw-bold" value="<?= $chambre->id_chambre ?>"><?= $chambre->numéro ?></option>
                <?php endforeach;
                endif; ?>
            </select>
            <button type="submit" name="action" class="subBtn text-light">Submit</button>
        </div>

    </form>
</div>