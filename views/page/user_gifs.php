<main>

    <h2 class="gifs_title color--pink"><?php echo $user_edit["user_name"]  ?></h2>

    <div class="gifs">

        <?php if ($user_gifs == null) {
            echo "No gif find upload one !";
        } ?>

        <?php foreach ($user_gifs as $user_gif) : ?>
            <div class="gif">


                   <a  href="UserInfoGif.php?id=<?php echo $user_gif["gif_id"] ?>">
                <img class="gif_img" value="<?php echo $user_gif["gif_id"] ?>" src="../../assets/gifs/<?php echo $user_gif["gif_url"] ?>">
                </a>
            </div>

        <?php endforeach ?>

    </div>

</main>