<table class="text-center mt-5" style="height:fit-content;">
    <thead>
        <th>Nombre des patients</th>
        <th>Nomber des hospitalisations</th>
        <th>Nombre des infirmiers</th>
        <th>Nombre des medecins</th>
    </thead>
    <tr>
        <td><?php if (isset($nb_patients->total)) {
                echo $nb_patients->total;
            } else {
                echo '0';
            } ?>
        </td>
        <td><?php if (isset($nb_hospitalisation->total)) {
                echo $nb_hospitalisation->total;
            } else {
                echo '0';
            } ?></td>
        <td><?php if (isset($nb_infirmier->total)) {
                echo $nb_infirmier->total;
            } else {
                echo '0';
            } ?></td>
        <td><?php if (isset($nb_medecin->total)) {
                echo $nb_medecin->total;
            } else {
                echo '0';
            } ?></td>
    </tr>
</table>