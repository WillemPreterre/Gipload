<main>

    <form action="" method="POST">

        <section>
            <div class="form_field">
                <label require class="color--green" for="username">GIF :</label>
                <input class="form_input" type="text" id="username" name="username">
            </div>
            <div class="form_field">
                <input class="form_btn" type="submit" value="Create" name="gif_submit">
            </div>
        </section>

    </form>
    <div class="categorie">
        <div class="categorie_link">
            <?php foreach ($categorieSelectAll as $categorieUnique) : ?>

                <a href="?page=search/<?php echo $categorieUnique["category_id"] ?>" class="categorie_link_btn" value="<?php echo $categorieUnique["category_id"] ?>"><?php echo $categorieUnique["category_name"] ?></a>
            <?php endforeach ?>
        </div>


    </div>

</main>