<?php
if ($tab_examinations) :
?>
    <table class="text-center">
        <thead>
            <tr>
                <th>Id Patient</th>
                <th>Nom Complet</th>
                <th>Chambre</th>
                <th>Date Examination</th>
                <th>Decision</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tab_examinations as $examination) : ?>
                <tr>
                    <td><?= $examination->id_patient ?> </td>
                    <td><?= $examination->nomcomplet ?> </td>
                    <td><?= $examination->id_chambre ?></td>
                    <td><?= $examination->date_exam ?></td>
                    <td>
                        <?php if ($examination->decision != null) {
                            echo $examination->decision;
                        } else { ?>
                            <form action="?action=Ajouterdecision" method="post">
                                <input type="hidden" name="id_hospitalisation" value="<?= $examination->id_hospitalisation ?>">
                                <input type="hidden" name="id_medecin" value="<?= $examination->id_medecin ?>">
                                <input type="submit" class="btn btn-danger rounded-pill" name="action" value="Ajouter Decision">
                            </form>
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>