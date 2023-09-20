<main class="d-flex jc-center">
    <form action="/ctrl/quiz/quiz-result.php" method="post" class="w-70 w-1000 w-360 m-5">
        <?php foreach ($args['listQuiz'] as $key => $question) : ?>
            <div class="border-ra light-blue text-center p-5 m-b-35 ">
                <!-- Questions -->
                <div class="border-ra bgc-w  ">
                    <h3 class="black"><?= $key . '. ' . $question['intituleQuestion'] ?> </h3>

                </div>

                <!-- Réponses -->
                <?php foreach ($question['propositions'] as $keyProp => $proposition) : ?>
                    <div class="border-ra  bgc-w m-15 black">
                        <input type="radio" name="proposition<?= $key ?>" id="proposition<?= $key . '-' . $keyProp ?>" value="<?= $proposition['estBonneReponse'] ?>">
                        <label for="proposition<?= $key . '-' . $keyProp ?>"><?= $proposition['lettre'] . ' - ' . $proposition['intitule'] ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

        <button class="button border-ra">Valider</button>
    </form>
</main>