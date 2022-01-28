<main>

    <h2 class="gifs_title color--pink">GIF</h2>

    <div class="gifs">


        <?php foreach ($user_gifs as $user_gif) : ?>
            <div class="gif">


                   <a  href="?page=gifinfo/<?php echo $user_gif["gif_id"] ?>">
                <img class="gif_img" value="<?php echo $user_gif["gif_id"] ?>" src="../../assets/gifs/<?php echo $user_gif["gif_url"] ?>">
                </a>
            </div>

        <?php endforeach ?>

    </div>

</main>