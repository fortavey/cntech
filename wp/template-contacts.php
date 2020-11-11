<?php
/*
 *
 * Template name: Contacts
 *
 */
get_header();
?>

<div class="wrapper">
            <div class="contacts-container">
                <div class="cont-page-form">
                    <h2 class="main-h2">Форма обратной связи</h2>
                    <?php echo do_shortcode('[contact-form-7 id="10" title="Форма на странице контакты"]'); ?>
                </div>
                <div class="cont-page-contacts">
                    <h2 class="main-h2">Контакты</h2>
                    <div class="cont-item">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/location.png" alt="icon" /><?php echo $fort_redux['text-adress'] ?>
                    </div>
                    <div class="cont-item">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/message.png" alt="icon" /><?php echo $fort_redux['text-email'] ?>
                    </div>
                    <div class="cont-item">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/phone.png" alt="icon" /><?php echo $fort_redux['text-phone'] ?>
                    </div>

                    <?php foreach($fort_redux['opt-slides'] as $slide){ ?>
                        <div class="cont-item"><strong><?php echo $slide['title'] ?>: </strong><?php echo $slide['description'] ?></div>
                    <?php } ?>

                    <?php render_social_icons(); ?>
                </div>
            </div>
        </div>
        <div class="wrapper contact-map">
            <?php echo get_field('map'); ?>
        </div>

<?php
get_footer();