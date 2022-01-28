<main>
    <?php pretty_print_r($allInformationGif) ?>
    <?php pretty_print_r($user_name) ?>
    <!-- <?php pretty_print_r($tag_get) ?> -->

    <div class="gif_info">
        <h2 class="gif_info_title color--green"><?php echo ucfirst($allInformationGif["gif_name"])  ?></h2>

        <div class="gif_info_container">
            <img class="gif_info_container_img" value="<?php echo $allInformationGif["gif_id"] ?>" src="../../assets/gifs/<?php echo $allInformationGif["gif_url"] ?>">

        </div>
        <div class="gif_info_user">
            <a href="?page=usergifs/<?php echo $user_name['user_id'] ?>"> <span><?php echo $user_name['user_name'] ?></span></a>

        </div>

        <div class="gif_info_btn">
        </div>

        <div class="gif_info_tag">

            <h3 class="color--blue">Tags</h3>
            <?php foreach ($tag_get as $tag) : ?>
                <?php $name = $tag_info->getTagName($tag['tag_id']); ?>
                <div class="gif_info_tag_name"><?php echo $name[0]['tag_name'] ?></div>

                <?php  ?>
            <?php endforeach ?>





        </div>
        <h3 class="color--orange">Details</h3>

        <div class="gif_info_details">
                <span>Creation date : <?php echo $allInformationGif['gif_date'] ?></span>
                <span>Size : <?php echo $allInformationGif['gif_size'] / 1000000 ?>MO</span>
        </div>

        <div class="gifs_info_categorie">
        <h3 class="color--pink">Related's GIF's</h3>

            <?php pretty_print_r($user_gifs) ?>
            <?php foreach ($user_gifs as $user_gif) : ?>
                <div class="gif">
                    <img class="gif_img" value="<?php echo $user_gif["gif_id"] ?>" src="../../assets/gifs/<?php echo $user_gif["gif_url"] ?>">
                </div>

            <?php endforeach ?>
        </div>
    </div>



</main>