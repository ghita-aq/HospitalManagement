<form action="?action=Ajouter" method="post" class="formAff p-5">
    <!-- <div class="d-flex justify-content-center"> -->
    <div class="form-floating text-dark w-75 mx-auto">
        <textarea id="ajouter_dec" name="decision" style="height: 20vh;" placeholder=" " class="form-control"></textarea>
        <label for="ajouter_dec">Ajouter une Decision</label>
    </div>
    <input type="hidden" name="id_hospitalisation" value="<?= $id_hospitalisation ?>">
    <input type="hidden" name="id_medecin" value="<?= $id_medecin ?>">
    <div class="d-flex justify-content-center pt-4">
        <input type="submit" class="subBtn px-5" name="action" value="Ajouter" />
    </div>
</form>