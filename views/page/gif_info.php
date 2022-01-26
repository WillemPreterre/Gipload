<main>
    <?php pretty_print_r($allInformationGif) ?>

    <div class="gif">
        <h2 class="gif_title color--green"><?php echo ucfirst($allInformationGif["gif_name"])  ?></h2>

        <div class="gif_container">
            <img class="gif_container_img" value="<?php echo $allInformationGif["gif_id"] ?>" src="../../assets/gifs/<?php echo $allInformationGif["gif_url"] ?>">
            <div class="gif_container_tag">

            <h3>Tags</h3>
                
            </div>
        </div>
    </div>



</main>
<!-- //explode -->