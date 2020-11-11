<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cntech
 */
global $fort_redux;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header"

				<?php if(is_archive()){
					$term_id = get_queried_object_id();
					$image_id = get_term_meta( $term_id, '_thumbnail_id', 1 );
					$cat_img_url = wp_get_attachment_image_url( $image_id, 'full' ); ?>

					data-src="<?php echo $cat_img_url; ?>"
				<?php }else if(is_search() || is_404() || is_page(348) || get_post_type(get_the_ID()) === 'keyses'){
					$image_id = get_post_thumbnail_id( 11 );
					$cat_img_url = wp_get_attachment_image_url( $image_id, 'full' ); ?>

					data-src="<?php echo $cat_img_url; ?>"
				<?php }else if(is_single()){
					$image_id = get_term_meta( get_the_category()[0]->term_id, '_thumbnail_id', 1 );
					$cat_img_url = wp_get_attachment_image_url( $image_id, 'full' ); ?>

					data-src="<?php echo $cat_img_url; ?>"
				<?php }else { ?>

					data-src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
					data-src-mobile="<?php echo wp_get_attachment_image_url( get_field('mobile-img'), 'full' ); ?>"

				<?php } ?>
>
        <div class="top-line">
            <div class="wrapper">

								<?php
								wp_nav_menu( [
									'theme_location'  => 'menu-1',
									'container'       => 'nav',
								] );
								?>

                <div class="mobile-blue">
                    <div class="mobile-blue__text">
                        <?php echo $fort_redux['text-name']; ?>
                    </div>

										<?php render_social_icons(); ?>

                </div>
                <div class="top-search">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/search.svg" alt="icon" class="button-active search-open">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/search-close.svg" alt="icon" class="search-close">
                    <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
												<input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" />
                        <div class="btn" type="submit">Поиск</div>
                    </form>
                </div>
                <div class="btn open-request-popup">Отправить запрос</div>
            </div>
        </div>
        <div class="wrapper">
            <div class="middle-line">
                <div class="logo"><a href="/"><img src="<?php echo $fort_redux['logo-img']['url']; ?>" alt="logo"></a></div>
                <div class="support">
                    <div class="open-menu"><span></span><span></span><span></span></div>
                    <div class="hide-text"> Для связи с нами:</div> <span class="click-support open-contact-form"><span><img
                                src="<?php echo get_template_directory_uri(); ?>/img/support.png" alt="support"></span></span>
                </div>
						</div>

						<?php if(is_front_page()){ ?>

							<h1 class="main-h1"><?php echo $fort_redux['text-name']; ?></h1>
							<div class="main-btn">
									<div class="main-btn__top f-line"><span></span><span></span></div>
									<div class="main-btn__text open-request-popup">Отправить запрос</div>
									<div class="main-btn__bottom f-line"><span></span><span></span></div>
							</div>

						<?php } else { ?>

							<div class="breadcrumbs">
									<a href="/">Главная</a> /
									<?php if(is_archive()){ ?>
										<span>Каталог оборудования</span>
										<?php }else if(get_post_type(get_the_ID()) === 'keyses'){ ?>
											<a href="<?php echo get_the_permalink(458); ?>">Наши кейсы</a> / <span><?php the_title(); ?></span>
										<?php }else if(is_single()){ ?>
											<a href="/#main-catalog">Каталог оборудования</a> / <span><?php the_title(); ?></span>
										<?php }else if(is_search()){ ?>
											<span>Результаты поиска</span>
										<?php }else if(is_404()){ ?>
											<span>Ошибка 404</span>
										<?php }else{ ?>
											<span><?php the_title(); ?></span>
									<?php } ?>
							</div>
							<div class="bottom-line">
									<div class="page-info">

											<?php if(is_archive()){
												echo "<h1 class='page-info__title'>" . get_queried_object()->name . "</h1>";
											}else if(get_post_type(get_the_ID()) === 'keyses') {
												echo "<h2 class='page-info__title'>" . get_the_title() . "</h2>";
											}else if(is_single()) {
												echo "<h2 class='page-info__title'>" . get_the_category()[0]->name . "</h2>";
											}else if(is_search()) {
												echo "<h2 class='page-info__title'>Результаты поиска</h2>";
											}else if(is_404()) {
												echo "<h2 class='page-info__title'>Ошибка 404</h2>";
											}else {
												echo "<h1 class='page-info__title'>" . get_the_title() . "</h1>";
											} ?>

											<div class="page-info__desc">
													<?php echo get_queried_object()->description; ?>
													<?php echo get_field('excerpt'); ?>
											</div>
									</div>
									<div class="page-icon-desc">
											<div class="page-icon-desc-item">
													<img src="<?php echo get_template_directory_uri(); ?>/img/client.svg" alt="icon" />
													<div>Более <strong>120</strong> довольных клиентов</div>
											</div>
											<div class="page-icon-desc-item">
													<img src="<?php echo get_template_directory_uri(); ?>/img/production.svg" alt="icon" />
													<div>
															<strong>145</strong> станков доставлено под нашим четким
															надзором
													</div>
											</div>
									</div>
							</div>

						<?php } ?>

				</div>

				<?php if(is_front_page()){ ?>

					<div class="header-else">
							<div class="wrapper">
									<div class="header-else-container">

										<?php for($i = 1; $i < 5; $i++){ ?>
											<div class="header-else-item">
													<div class="f-plus"><span></span><span></span></div>
													<div class="header-else-item__text">
															<?php echo get_field("tekst_$i"); ?>
													</div>
											</div>
										<?php } ?>

									</div>
							</div>
							<img class="fake-mouse" src="<?php echo get_template_directory_uri(); ?>/img/fake-mouse.png" alt="mouse">
					</div>

					<?php } ?>

		</header>
		<main class="site-main
								<?php if(is_front_page()) { echo "main-page"; }
								else if(is_archive()){ echo "archive-page"; }
								else if(get_post_type(get_the_ID()) === 'keyses'){ echo "keyses"; }
								else { echo "not-main-page"; } ?>">
