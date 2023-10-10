<form action="?action=ChercherChambre" method="post" id="formRecherche">
    <div class="d-flex justify-content-center">
        <input type="text" name="numéro" class="form-control w-50 mx-2" placeholder="Rechercher par numéro " />
        <input type="submit" name="action" class="subBtn text-light" value="Chercher" />
    </div>
</form>

<?php
if ($tab_chambres) :
?>
    <form action="?action=FiltrerChambre" method="get">
        <div class="d-flex justify-content-center my-4">
            <select name="etat" class="form-select w-25 mx-3" id="">
                <option value="disponible" <?php if (isset($_GET["etat"]) && $_GET["etat"] == 'disponible') echo "selected" ?>>Chambre Disponible</option>
                <option value="nondisponible" <?= (isset($_GET["etat"]) && $_GET["etat"] == 'nondisponible') ? "selected" : "" ?>>Chambre NonDisponible</option>
            </select>
            <input type="submit" name="action" class="btn btn-warning rounded-pill" value="FiltrerChambre" />
        </div>
    </form>

    <table class="text-center">
        <thead>
            <tr>
                <th>ID Chambre</th>
                <th>Type Chambre</th>
                <th> Numéro</th>
                <th>Etat</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tab_chambres  as $chambre) : ?>
                <tr>
                    <td><?= $chambre->id_chambre ?> </td>
                    <td><?= $chambre->type_chambre ?> </td>
                    <td><?= $chambre->numéro ?> </td>
                    <td><?= $chambre->état ?> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>