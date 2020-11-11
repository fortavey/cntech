<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cntech
 */

get_header();
?>

<div class="categoryes">
            <div class="wrapper">
                <div class="category-list">
                    <div class="category-list__title">
                        Какой станок вы хотите посмотреть?
                    </div>
                    <div class="category-list__menu">
                        <ul>

												<?php
													$categories = get_categories( [
														'taxonomy'     => 'category',
														'type'         => 'post',
														'hide_empty'   => 0,
														'exclude'      => 1,
													] );

													if( $categories ){
														foreach( $categories as $cat ){ ?>

																		<li><a href="<?php echo get_term_link($cat->term_id); ?>"><?php echo $cat->name; ?></a></li>

														<?php }} ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="products-list">
            <div class="wrapper">

                                <?php
                                if(have_posts()) {
									while( have_posts() ) :
										the_post(); ?>

								<div class="product-item">
                    <h2 class="item-h2"><?php the_title(); ?></h2>
                    <div class="product-item__gallery">

										<?php render_gallery(); ?>

                    </div>
                    <div class="product-item__info">
                        <h2 class="item-h2"><?php the_title(); ?></h2>
                        <div class="product-item__desc">
                            <?php echo get_the_excerpt(); ?>
                        </div>
                        <div class="product-item__pieses">
													<?php if(get_field('delivery-time')){ ?>
                            <div>
                                <div class="pieses-title">Срок поставки</div>
                                <div class="pieses-shet"><?php echo get_field('delivery-time'); ?></div>
														</div>
													<?php } ?>
													<?php if(get_field('garanty')){ ?>
                            <div>
                                <div class="pieses-title">Гарантия на станок</div>
                                <div class="pieses-shet"><?php echo get_field('garanty'); ?></div>
                            </div>
													<?php } ?>
													<?php if(get_field('cost')){ ?>
                            <div>
                                <div class="pieses-title">Стоимость выполнения</div>
                                <div class="pieses-shet"><?php echo get_field('cost'); ?></div>
                            </div>
													<?php } ?>
                        </div>
                        <div class="btn"><a href="<?php the_permalink() ?>">Подробнее</a></div>
                    </div>
                </div>

								<?php endwhile;	?>
                            <?php }else { ?>
                                <p>В данной категории оборудование еще не представлено.</p>
                            <?php } ?>



								<div class="pagination">
								<?php
									$args = array(
										'show_all'     => false, // показаны все страницы участвующие в пагинации
										'end_size'     => 1,     // количество страниц на концах
										'mid_size'     => 1,     // количество страниц вокруг текущей
										'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
										'prev_text'    => 'Назад',
										'next_text'    => 'Вперед',
										'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
										'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
										'screen_reader_text' => false,
									);
									the_posts_pagination($args);
								?>
								</div>

                <div class="archive-desc">
                    <?php echo get_field('tax-description', get_queried_object()); ?>
                </div>

            </div>
        </div>

<?php
get_footer();
