<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cntech
 */
global $fort_redux;
?>

<div class="footer-form">
            <div class="wrapper">
                <div class="footer-form-desc">
                    <div class="footer-form-desc__text">
                        Оставьте заявку, чтобы
                        узнать стоимость решения —
                        подготовим смету за 3 часа
                    </div>
                    <div class="footer-form-desc__info">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/talking.png" alt="icon">
                        <div class="call-you"><span>Ответим в течении дня, с <strong>9:00</strong> до <strong>18:00</strong></span></div>
                    </div>
                </div>
                <div class="footer-form-form">
                    <?php echo do_shortcode('[contact-form-7 id="246" title="Форма в подвале сайта"]'); ?>
                </div>
            </div>
        </div>
    </main>
    <footer class="site-footer">
        <div class="wrapper">
            <div class="footer-container">
                <div class="footer-item">
                    <div class="logo"><a href="/"><img src="<?php echo $fort_redux['logo-img']['url']; ?>" alt="logo"></a></div>
                    <div class="footer-desc"><?php echo $fort_redux['text-name']; ?></div>

                    <div class="social-icons">

                        <?php foreach($fort_redux['opt-slides-footer'] as $slide){ ?>
                        <a href="<?php echo $slide['url']; ?>">
                            <div class="social-icons__item"><img src="<?php echo $slide['image']; ?>" alt="icon"></div>
                        </a>
                        <?php } ?>

                    </div>

                </div>
                <div class="footer-item footer-item-contacts">
                    <div class="footer-item__title">Контакты</div>
                    <div>
                        <div>e-mail: <strong><?php echo $fort_redux['text-email'] ?></strong></div>
                        <div>телефон: <strong><?php echo $fort_redux['text-phone'] ?></strong></div>
                        <?php foreach($fort_redux['opt-slides'] as $slide){ ?>
                            <div><?php echo $slide['title'] ?>: <strong><?php echo $slide['description'] ?></strong></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="footer-item footer-item-keyses">
                    <div class="footer-item__title">Наши кейсы</div>
                    <div>

                        <?php $query = new WP_Query('post_type=keyses&posts_per_page=5');
                            while( $query->have_posts() ) : $query->the_post(); ?>
                                <div><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                        <?php endwhile; wp_reset_postdata(); ?>

                    </div>
                </div>
                <div class="footer-item footer-item-info">
                    <div class="footer-item__title">Информация для клиентов</div>
                    <?php
                    wp_nav_menu( [
                        'theme_location'  => 'menu-1',
                        'container'       => 'nav',
                    ] );
                    ?>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="wrapper">
                <div>© 2019—<?php echo date('Y'); ?> CnTechPro.com - оборудование из Китая. Все права защищены. </div>
                <div><a href="<?php echo get_the_permalink(348); ?>">Политика конфиденциальности</a></div>
            </div>
        </div>
    </footer>
    <div id="video-popup" class="white-popup mfp-hide">
        <iframe src="" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div id="img-popup" class="white-popup mfp-hide">
        <img src="<?php echo get_template_directory_uri(); ?>/img/webchat.svg" alt="popup">
    </div>
    <div id="contacts-popup" class="white-popup mfp-hide popup-form">
        <div class="popup-form__title">Наши контакты</div>
        <?php render_social_icons(); ?>
        <div class="popup-form__contacts">
            <span>
                <img src="<?php echo get_template_directory_uri(); ?>/img/phone-white.png" alt="icon" /><?php echo $fort_redux['text-phone'] ?>
            </span>
            <span>
                <img src="<?php echo get_template_directory_uri(); ?>/img/message-white.png" alt="icon" /><?php echo $fort_redux['text-email'] ?>
            </span>
        </div>
        <div class="btn open-request-popup">Отправить запрос</div>
        <div class="call-manager-block">
            <img src="<?php echo get_template_directory_uri(); ?>/img/talking.png" alt="icon">
            <div class="call-manager">Онлайн-чат с менеджером</div>
        </div>
    </div>
    <div id="request-popup" class="white-popup mfp-hide popup-form">
        <div class="popup-form__title">Заполните форму</div>
        <?php echo do_shortcode('[contact-form-7 id="304" title="Форма заявки"]'); ?>
    </div>
    <div id="error-popup" class="white-popup mfp-hide popup-form">
        Вы должны согласиться на обработку персональных данных
    </div>
    </div>
    <?php wp_footer(); ?>

</body>
</html>
