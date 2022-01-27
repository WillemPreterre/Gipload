<main>

    <form action="" method="POST">

        <section>
            <div class="form_field">
                <label require class="color--green" for="username">GIF :</label>
                <input class="form_input" type="text" id="username" name="username">
            </div>

            <div class="form_link"> <a class="link_connect" rel="stylesheet" href="../controllers/userConnection.php">Se connecter</a></div>
        </section>

    </form>
    <div class="categorie">
        <div class="categorie_link">
            <?php foreach ($categorieSelectAll as $categorieUnique) : ?>

                <a href="" class="categorie_link_btn" value="<?php echo $categorieUnique["category_id"] ?>"><?php echo $categorieUnique["category_name"] ?></a>
            <?php endforeach ?>
        </div>

    </div>

</main>