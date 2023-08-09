<main>
    <div class="text-center">
        <h1>Vous avez <br>
        <?php echo $args['score'] ; ?> %<br>
        de bonnes réponses
        </h1>

        <h3><?php echo $args['message']; ?></h3>


        <a href="/ctrl/quiz/list.php" class="button border-ra text-deco p-5">Rejouer !</a>
    </div>
</main>

