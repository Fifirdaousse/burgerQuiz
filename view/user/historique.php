<main class="text-center d-grid jc-center ">
    <h2><?= $args['pageTitle'] ?></h2>

    <table class="border-ra light-blue p-5 m-auto">
        <tr class="border">
            <th>Nom</th>
            <th>Prénom</th>
            <th>Score en %</th>
        </tr>

        <?php foreach ($args['listScore'] as $score) : ?>
            <tr>
                <td><?= $score['nom'] ?></td>
                <td><?= $score['prenom'] ?></td>
                <td><?= $score['score'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</main>