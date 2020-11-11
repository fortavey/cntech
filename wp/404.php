<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package cntech
 */

get_header();
?>

	<div class="wrapper">
		<div class="search-container">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title">Ой! Что то пошло не так, такой страницы нет.</h1>
					<p><a href="<?php echo get_the_permalink(11); ?>">Свяжитесь</a> с нашими менеджерами удобным для вас способом  или заполните форму ниже. Мы обязательно найдем нужное вам оборудование</p>
				</header><!-- .page-header -->
			</section><!-- .error-404 -->
		</div>
	</div>



<?php
get_footer();
