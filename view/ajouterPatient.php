<form action="?action=AjoutePatient" method="post" class="formAff p-4">
    <div class="d-flex justify-content-evenly">
        <div class="form-floating w-50 m-2">
            <input type="text" class="form-control" id="nom" name="nom" placeholder="votre nom ...">
            <label for="nom">Nom</label>
        </div>
        <div class="form-floating m-2 w-50">
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="votre prenom ...">
            <label for="prenom">Prenom</label>
        </div>
        <div class="form-floating w-50 m-2">
            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="votre telephone ...">
            <label for="telephone">Telephone</label>
        </div>
    </div>

    <div class="d-flex justify-content-evenly">
        <div class="form-floating m-2 w-50">
            <input type="text" class="form-control" id="cin" name="cin" placeholder="votre cin ...">
            <label for="cin">CIN</label>
        </div>
        <div class="p-3 w-50 text-center d-flex align-items-center">
            <label class="fw-bold me-4">Sexe :</label>

            <label for="homme">H</label>
            <input id="homme" class="form-check-input mx-2" type="radio" name='sexe' value="H">
            <label for="famme">F</label>
            <input id="famme" class="form-check-input mx-2" type="radio" name='sexe' value="F">
        </div>
        <div class="form-floating m-2 w-50">
            <input type="date" class="form-control" id="naissance" name="naissance" placeholder="votre date_naissance ...">
            <label for="naissance">Date Naissance</label>
        </div>
    </div>

    <div class="d-flex justify-content-evenly">
        <div class="form-floating m-2 w-50">
            <textarea id="antécédents" class="form-control" name="antécédents" placeholder="votre antécédents..."></textarea>
            <label for="antécédents">Antécédents</label>
        </div>
    </div>

    <div class="d-flex justify-content-evenly">
        <div class="form-floating m-2 w-50">
            <textarea id="maladies" class="form-control" name="maladies" placeholder="votre antécédents..."></textarea>
            <label for="maladies">Maladies</label>
        </div>
        <div class="form-floating m-2 w-50">
            <textarea id="sensibilité" class="form-control" name="sensibilité" placeholder="votre antécédents..."></textarea>
            <label for="sensibilité">Sensebilité</label>
        </div>
    </div>
    <div class="text-center mt-3">
        <input type="submit" name="action" value="Ajouter" class="subBtn text-light w-50">
    </div>

</form>