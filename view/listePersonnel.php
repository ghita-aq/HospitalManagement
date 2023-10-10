<?php if ($tab_personnels) : ?>
    <div class="d-flex justify-content-center">
        <table class="text-center">
            <thead>
                <tr>
                    <th>ID Personnel </th>
                    <th>Nom </th>
                    <th>Prenom </th>
                    <th>Rôle </th>
                    <th>Email </th>
                    <th>Telephone</th>
                    <th>Adresse </th>
                    <th>Date Naissance</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tab_personnels as $personnel) : ?>
                    <tr>
                        <td><?= $personnel->id_Personnel ?></td>
                        <td><?= $personnel->nom ?></td>
                        <td><?= $personnel->prenom ?></td>
                        <td><?= $personnel->rôle ?></td>
                        <td><?= $personnel->email  ?></td>
                        <td><?= $personnel->telephone ?></td>
                        <td><?= $personnel->adresse ?></td>
                        <td style="padding: 5px;"><?= $personnel->date_naissance ?></td>
                        <td>
                            <?php if ($personnel->rôle != 'Administrateur') : ?>
                                <form action="?action=SupprimerPersonnel" method="post">
                                    <input type="hidden" name="id_Personnel" value="<?= $personnel->id_Personnel ?>">
                                    <input type="submit" class="btn btn-danger rounded-pill" name="action" value="Supprimer">
                                </form>
                            <?php else : echo '';
                            endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>