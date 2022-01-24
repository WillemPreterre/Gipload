<main>

    <h2><?php echo $user_edit["user_name"]  ?></h2>

    <div class="gifs">

        <?php foreach ($user_gifs as $user_gif) : ?>
            <div class="gif">
                <img value="<?php echo $user_gif["gif_id"] ?>" src="../../assets/gifs/<?php echo $user_gif["gif_url"] ?>">
            </div>

        <?php endforeach ?>

    </div>

</main>