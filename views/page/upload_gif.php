<main>
    <?php if ($_COOKIE['name'] == null || !isset($_COOKIE)) :  ?>
        <div class="popup">
            <div class="popup_message">
                <div class="popup_message_title">
                    <h2>Create an account and
                        upload all the GIF you
                        want</h2>
                </div>
                <div class="popup_message_gif">
                    <img src="../../assets/img/happy-emotional.gif">
                </div>
                <div class="popup_message_btn">
                    <a href="../../controllers/UserConnection.php">Log in now</a>
                </div>
                <div class="popup_message_text">
                    <span>All your data will never be use
                        somewhere else than you website</span>
                </div>

            </div>
        </div>
    <?php else : ?>

        <div class="form_container">
            <h2 class="form_title">Upload Gif</h2>
            <form class="form" method="POST" enctype="multipart/form-data" action="../../controllers/gif_traitement.php">
                <span class="form_describe color--pink"> Find GIF and download here for all !</span>
                <section>
                    <div class="form_field">
                        <label class=" form_upload_message color--green" for="gif_upload">Upload Gif here</label>
                        <input class="form_input" type="file" id="gif_upload" name="gif_upload">
                    </div>

                    <div class="form_field">
                        <label class="color--orange" for="form_gifName">Name :</label>
                        <input class="form_input" type="text" id="form_gifName" name="form_gifName" required>
                    </div>

                    <div class="form_field">
                        <label class="color--green" for="form_gifTag">Tag :</label>
                        <span class="popuptext" id="myPopup">Space create new Tag</span></i>

                        <input placeholder="One Tag minimum " class="form_input" type="text" id="form_gifTag" name="form_gifTag" required>
                    </div>

                    <div class="form_field">
                        <label class="color--blue" for="form_gifCategorie">Categorie :</label>
                        <select required name="form_gifCategorie" id="form_gifCategorie">
                            <option value="">--Please choose an categorie--</option>
                            <?php
                            pretty_print_r($categorieSelectAll);
                            foreach ($categorieSelectAll as $categorieUnique) : ?>
                                <option value="<?php echo $categorieUnique["category_id"] ?>"><?php echo $categorieUnique["category_name"] ?></option>


                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form_field">
                        <input class="form_btn" type="submit" value="Create" name="gif_submit">
                    </div>

                </section>
            </form>
        </div>

    <?php endif; ?>
</main>