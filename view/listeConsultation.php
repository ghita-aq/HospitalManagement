<?php if ($tab_consultation) : ?>
    <table class="text-center">
        <thead>
            <tr>
                <th>ID Consultation</th>
                <th>Date</th>
                <th>Medecin</th>
                <th>Patient</th>
                <th>Id Patient</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tab_consultation as $consultation) : ?>
                <tr>
                    <td><?= $consultation->id_consultation ?></td>
                    <td><?= $consultation->date_consultation ?></td>
                    <td><?= $consultation->nomMedcin ?></td>
                    <td><?= $consultation->nomPatient ?></td>
                    <td><?= $consultation->id_patient ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>