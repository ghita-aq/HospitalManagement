<form action="?action=AjoutePersonnel" method="post" class="formAff p-4">
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
            <input type="text" class="form-control" id="email" name="email" placeholder="votre email ...">
            <label for="email">Email</label>
        </div>
        <div class="form-floating w-50 m-2">
            <input type="text" class="form-control" id="motpass" name="motpass" placeholder="votre mot de pass ...">
            <label for="motpass">Mot de Passe</label>
        </div>
        <div class="form-floating m-2 w-50">
            <input type="date" class="form-control" id="naissance" name="naissance" placeholder="votre date_naissance ...">
            <label for="naissance">Date Naissance</label>
        </div>
    </div>

    <div class="d-flex justify-content-evenly">
        <div class="form-floating m-2 w-50">
            <textarea id="adresse" class="form-control" name="adresse" placeholder="votre adresse..."></textarea>
            <label for="adresse">Adresse</label>
        </div>
    </div>

    <div class="d-flex justify-content-evenly">
        <div class="form-floating m-2 w-50">
            <select type="text" class="form-control" id="rôle" name="rôle" placeholder="votre rôle ...">
            <option value="infirmier">Infirmier</option>
                <option value="Medecin">Medecin</option>
                <option value="chargé de réception">Chargé De Réception</option>
                <option value="Administrateur">Administrateur</option>
            </select>
            <label for="rôle">Rôle</label>
        </div>
        <div class="form-floating w-50 m-2">
            <input type="text" class="form-control" id="specialité" name="specialité" placeholder="votre specialité ...">
            <label for="specialité">Specialité</label>
        </div>
        <div class="form-floating m-2 w-50">
            <input type="date" class="form-control" id="date_debut_de_travail" name="date_debut_de_travail" placeholder="votre date_debut_de_travail ...">
            <label for="date_debut_de_travail">Date de début du travail</label>
        </div>
    </div>
    <div class="text-center mt-3">
        <input type="submit" name="action" value="Ajouter" class="subBtn text-light w-50">
    </div>

</form>

<script>
    specialite=document.getElementById("specialité")
    s=document.querySelector("select")
    v=s.options[s.selectedIndex].value
    if(v!='Medecin'){
        specialite.setAttribute('disabled', '')
    }
    s.addEventListener('change', function(event){
        if(event.target.value!='Medecin'){
            specialite.setAttribute('disabled', '')
    }else{
        specialite.removeAttribute('disabled')
    } 
    });
</script>