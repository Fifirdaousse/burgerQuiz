<main class="text-center d-grid jc-center align-center">
    <div class="d-flex align-center">
        <h2><?= $args['pageTitle'] ?></h2>
        <td><a href="/ctrl/user/user-add-display.php" class="m-10">Ajouter</a></td>
    </div>

    <table class="border-ra light-blue p-5 m-10 m-auto">
        <tr class="border">
            <th>Nom</th>
            <th>Prénom</th>
            <th>Role</th>
            <th>Score en %</th>
        </tr>

        <?php foreach ($args['listUsers'] as $key => $user) : ?>
            <tr>
                <td><?= $user['nom'] ?></td>
                <td><?= $user['prenom'] ?></td>
                <td><?= $user['role'] ?></td>
                <td><?= $user['score'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</main>