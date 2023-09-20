<main class="d-flex jc-center wrap w-1200 m-auto">

    <form action="/ctrl/auth/sign-up.php" method="post" class="border-ra p-45 light-blue m-5">
        <h2 class="text-center"> S'inscrire</h2>

        <div class="d-grid m-10">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" class="input">
        </div>

        <div class="d-grid m-10">
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" class="input">
        </div>

        <div class="d-grid">
            <label for="email">E-mail :</label>
            <input type="text" name="email" id="email" class="input">
        </div>

        <div class="d-grid m-10">
            <label for="mdp">Mot de passe :</label>
            <input type="password" name="mdp" id="mdp" class="input">
        </div>

        <button class="border-ra button m-10"> S'inscrire </button>

    </form>

</main>