<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/style.css">
    <title><?= $titre; ?></title>
</head>

<body>
    <header>
        <a href="index.php"><img class="logo" src="assets/img/caspio.png" alt="logo"></a>
        <nav>
            <?php if ($_SESSION["login"] == 'chargé de réception') : ?>
                <ul class="nav_links">
                    <li><a href="?action=versPageAjouterPatient">Ajouter Patient</a></li>
                    <li><a href="?action=afficherlistepatient">Liste Patients</a></li>
                    <li><a href="?action=versReserverConsultation">Réserver Consultation</a></li>
                    <li><a href="?action=versPageListeChambre">Liste Chambre</a></li>
                </ul>
            <?php elseif ($_SESSION["login"] == 'infirmier') : ?>
                <ul class="nav_links">
                    <li><a href="?action=afficherlistepatient">Liste Patients</a></li>
                </ul>
            <?php elseif ($_SESSION["login"] == 'Medecin') : ?>
                <ul class="nav_links">
                    <li><a href="?action=afficherlistepatient">Liste Patients</a></li>
                    <li><a href="?action=versListeConsultation">Liste Consultation</a></li>
                    <li><a href="?action=versListeExamination">Liste Examinations</a></li>
                </ul>
            <?php elseif ($_SESSION["login"] == 'Administrateur') : ?>
                <ul class="nav_links">
                    <li><a href="?action=versListePersonnels">Liste Personnels</a></li>
                    <li><a href="?action=versAjouterpersonnel">Ajouter Personnel</a></li>
                    <li><a href="?action=versStatistiques">Statistiques</a></li>
                </ul>
            <?php endif; ?>
        </nav>
        <a class="logout" href="?action=deconnexion"><button>Se deconnecte</button></a>
    </header>

    <div class="container">
        <h3 class="text-center titel mt-3 border border-4 rounded-3 py-2 text-dark fs-3"><?= $titre; ?></h3>
        <div style="min-height: 100vh;padding-block:5vh;">
            <!-- start content section -->
            <?= $contenu ?>
            <!-- end content section -->
        </div>
    </div>

    <!-- <footer class="text-center">
        <span class="small text-muted">Créer par</span><br />
    </footer> -->
    <footer>
        <div class="waves">
            <div class="wave" id="wave01"></div>
            <div class="wave" id="wave02"></div>
            <div class="wave" id="wave03"></div>
            <div class="wave" id="wave04"></div>
        </div>
        <img class='bg-img mb-3 mx-auto' alt='logo' style="width:250px;" src="assets/img/caspio.png" />
        <ul class="menu">
            <li><a href="#">+212 67 998 5401</a></li>
            <li><a href="#">universkills@gmail.com</a></li>
            <li><a href="#">www.universkills.com</a></li>
        </ul>
        <p>Tous droits réservés © 2022</p>
    </footer>
    <script src="assets/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
</body>

</html>