<?php
/*
 *
 * Template name: Homepage
 *
 */
get_header();
?>

<div class="main-text-after-header">
            <div class="wrapper">
                <?php the_content(); ?>
            </div>
        </div>


        <section class="main-catalog" id="main-catalog">
            <div class="wrapper">
                <h2 class="main-h2">Каталог оборудования</h2>
                <div class="main-categorys">

                <?php

                  $categories = get_categories( [
                    'taxonomy'     => 'category',
                    'type'         => 'post',
                    'hide_empty'   => 0,
                    'exclude'      => 1,
                    // полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
                  ] );

                  if( $categories ){
                    foreach( $categories as $cat ){

                      // получаем ID термина на странице термина
                      $term_id = $cat->term_id;

                      // получим ID картинки из метаполя термина
                      $image_id = get_term_meta( $term_id, '_thumbnail_id', 1 );

                      // ссылка на полный размер картинки по ID вложения
                      $image_url = wp_get_attachment_image_url( $image_id, 'full' ); ?>

                        <div class="main-categry-item" data-src="<?php echo $image_url; ?>">
                            <a href="<?php echo get_term_link($cat->term_id); ?>">
                                <div class="main-categry-item__title"><?php echo $cat->name; ?></div>
                            </a>
                        </div>

                    <?php }} ?>

                </div>
            </div>
        </section>
        <section class="main-how" id="main-how">
            <div class="wrapper">
                <h2 class="main-h2"><?php echo get_field('how-block-title'); ?></h2>
                <div class="main-how-list">

                    <?php for($i = 1; $i < 11; $i++){
                        if(get_field("point_$i")){ ?>
                    <div class="main-how-item">
                        <div class="main-how-item__number"><?php echo $i; ?></div>
                        <div class="main-how-item__text">
                            <p>
                                <?php echo get_field("point_$i"); ?>
                            </p>
                        </div>
                    </div>
                    <?php }} ?>

                </div>
            </div>
        </section>
        <section class="main-control">
            <div class="wrapper">
                <div class="main-control-container">
                    <div class="main-control__text">
                        <h2 class="main-h2"><?php echo get_field("control-title"); ?></h2>
                        <?php echo get_field("control-text"); ?>
                    </div>
                    <div class="main-control__img"><img data-src="<?php echo get_template_directory_uri(); ?>/img/control.png" src="<?php echo get_template_directory_uri(); ?>/fake.png" alt="control"></div>
                </div>
            </div>
        </section>
        <section class="main-delivery" id="main-delivery">
            <div class="wrapper">
                <h2 class="main-h2"><?php echo get_field("delivery-title"); ?></h2>
                <div class="outer-p">
                    <?php echo get_field("delivery-text"); ?>
                </div>
            </div>
            <img data-src="<?php echo get_template_directory_uri(); ?>/img/delivery.png" src="<?php echo get_template_directory_uri(); ?>/fake.png" alt="delivery" class="main-delivery__img">
            <div class="wrapper">
                <div class="delivery-transport">
                    <div class="col-50">
                        <h3><?php echo get_field("delivery-subtitle-1"); ?></h3>
                        <?php echo get_field("delivery-subtext-1"); ?>
                    </div>
                    <div class="col-50">
                        <h3><?php echo get_field("delivery-subtitle-2"); ?></h3>
                        <?php echo get_field("delivery-subtext-2"); ?>
                    </div>
                    <div class="col-100">
                        <h3><?php echo get_field("delivery-subtitle-3"); ?></h3>
                        <?php echo get_field("delivery-subtext-3"); ?>
                    </div>
                </div>
            </div>
        </section>
        <div class="main-banner">
            <div class="wrapper">
                <div class="main-banner-container">
                    <div class="banner-left">
                        <img data-src="<?php echo get_template_directory_uri(); ?>/img/img_man.png" src="<?php echo get_template_directory_uri(); ?>/fake.png" alt="manager" class="man-manager">
                        Подберем качественное
                        оборудование по низкой
                        цене из Китая
                    </div>
                    <div class="banner-right">
                        <img data-src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" src="<?php echo get_template_directory_uri(); ?>/fake.png" alt="arrow" class="banner-arrow">
                        <div class="banner-right__text">
                            Наши специалисты помогут выбрать идеальный вариант
                        </div>
                        <div class="btn open-request-popup">Отправить запрос</div>
                    </div>
                </div>
            </div>
        </div>
        <section class="main-tech" data-src="<?php echo get_template_directory_uri(); ?>/img/bg_4.png" data-src-mobile="<?php echo get_template_directory_uri(); ?>/img/bg_4-mobile.png" id="main-tech">
            <div class="wrapper">
                <h2 class="main-h2"><?php echo get_field("tech-title"); ?></h2>
                <div class="main-tech-container">
                    <div class="main-tech-item">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/tech-icon1.png" alt="icon">
                        <div>
                            <?php echo get_field("tech-point-1"); ?>
                        </div>
                    </div>
                    <div class="main-tech-item">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/tech-icon2.png" alt="icon">
                        <div>
                            <?php echo get_field("tech-point-2"); ?>
                        </div>
                    </div>
                    <div class="main-tech-item">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/tech-icon3.png" alt="icon">
                        <div>
                            <?php echo get_field("tech-point-3"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="main-parts" id="main-parts">
            <div class="wrapper">
                <div class="main-parts-container">
                    <div class="main-parts-left">
                        <h2 class="main-h2"><?php echo get_field('parts-title'); ?></h2>
                        <?php echo get_field('parts-text-1'); ?>
                        <img data-src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" src="<?php echo get_template_directory_uri(); ?>/fake.png" alt="arrow" class="parts-arrow">
                    </div>
                    <div class="main-parts-right">
                        <img data-src="<?php echo get_template_directory_uri(); ?>/img/parts.png" src="<?php echo get_template_directory_uri(); ?>/fake.png" alt="parts">
                        <div>
                            <?php echo get_field('parts-text-2'); ?>
                            <div class="btn open-request-popup">Отправить запроc</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php
get_footer();