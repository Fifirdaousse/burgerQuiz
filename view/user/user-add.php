<main class="d-flex jc-center wrap m-1200 m-auto ">


    <form action="../user/user-add.php" method="post" class="border-ra p-45 light-blue">
        <h2 class="text-center"> Ajouter un utilisateur</h2>

        <div class="d-grid">
            <label for="nom" class="m-10">Nom :</label>
            <input type="text" name="nom" id="nom" class="input">
        </div>

        <div class="d-grid">
            <label for="prenom" class="m-10">Prénom :</label>
            <input type="text" name="prenom" id="prenom" class="input">
        </div>

        <div class="d-grid">
            <label for="email" class="m-10">E-mail :</label>
            <input type="text" name="email" id="email" class="input">
        </div>

        <div class="d-grid">
            <label for="mdp" class="m-10">Mot de passe :</label>
            <input type="password" name="mdp" id="mdp" class="input">
        </div>

        <select name="role" id="">
            <option value=""></option>
            <option value="gestionnaire" name="gestionnaire">Gestionnaire</option>
            <option value="membre">Membre</option>
        </select>

        <button class="border-ra button m-10"> Ajouter </button>

    </form>
</main>