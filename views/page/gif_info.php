<main>
    <?php pretty_print_r($allInformationGif) ?>


    <h2 class="gif_title color--pink"><?php echo $allInformationGif["gif_name"]  ?></h2>

    <div class="gif">
        <div class="gif_container">
            <img class="gif_container_img" value="<?php echo $allInformationGif["gif_id"] ?>" src="../../assets/gifs/<?php echo $allInformationGif["gif_url"] ?>">
        </div>
    </div>
</main>
<!-- //explode -->