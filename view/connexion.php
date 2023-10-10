<!-- formulaire d'anthetification -->
<style>
    header,
    footer {
        display: none;
    }
</style>
<h1 class="text-center p-3 text-capitalize">Authentification</h1>
<form class="w-50 mx-auto border border-primary p-3 rounded" id="connecter" method="post" action="?action=connexion">
    <div class=" mb-3">
        <label for="login" class="form-label">Email address</label>
        <input type="email" name="login" required class="form-control" id="login" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="motPass" class="form-label">Password</label>
        <input type="password" class="form-control" id="motPass" name="motPass">
    </div>
    <div class="mb-3 form-check ms-2">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="subBtn w-50 rounded-pill" name="action">Connecter</button>
    </div>
</form>