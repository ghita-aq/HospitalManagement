<div>
    <form action="?action=ModifierHospitalisation" method="post" class="formAff p-4">
        <input type="hidden" name='id_hos' value="<?= $id_hospitalisation ?>">
        <div class="form-floating w-75 mx-auto">
            <textarea class="form-control" style="height: 100px;" placeholder=" " name="motif_sortie" id="motif_sortie"></textarea>
            <label for="motif_sortie">Motif de Sortie</label>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <button type="submit" name="action" class="subBtn">Submit</button>
        </div>
    </form>
</div>