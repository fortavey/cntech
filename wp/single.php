<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cntech
 */

get_header();
?>

<div class="wrapper">
  <div class="mobile-title"></div>
  <div class="product-top">
    <div class="product-top__gallery">

    <?php render_gallery(); ?>

    </div>
    <div class="product-top__info">
      <div class="desctop-title">
        <h1><?php the_title(); ?></h1>
        <div class="articul">Артикул: <?php echo get_field('artikul'); ?></div>
      </div>
      <div class="product-top__info-desc">

        <?php for($i = 1; $i < 11; $i++){
          if(get_field("info_value_$i")){ ?>
          <div>
            <?php if(get_field("info_name_$i")){?><span><?php echo get_field("info_name_$i"); ?>:</span><?php } ?>  <?php echo get_field("info_value_$i"); ?>
          </div>

        <? }} ?>

        <?php if(get_field("cost")){ ?>
          <div class="f-cost">
            <span>Стоимость:</span> <?php echo get_field("cost"); ?>
          </div>
        <?php } ?>
        <div class="btn send-request-main open-request-popup">Отправить запрос</div>
      </div>
    </div>
  </div>
  <?php while( have_posts() ) : the_post(); ?>
  <div class="product-information tab-parent">
    <div class="tab-name">Информация<img src="<?php echo get_template_directory_uri(); ?>/img/tab-arrow.png" alt="arrow"></div>
    <div class="tab-block">
      <?php the_content(); ?>
    </div>
  </div>
        <?php endwhile; wp_reset_postdata(); ?>
  <div class="product-character tab-parent">
    <div class="tab-name">Характеристики<img src="<?php echo get_template_directory_uri(); ?>/img/tab-arrow.png" alt="arrow"></div>
    <div class="tab-block">

      <?php
        $counter = 0;
        for($j = 1; $j < 50; $j++){
          if(get_field("char_$j")){
            $counter++;
          }
        }
        $in_column = ceil($counter/3);
        echo "<div>";
          for($i = 1; $i < 50; $i++){
            if(get_field("char_$i")){
              $class = (get_field("char_title_$i")) ? 'char-title' : '';
              echo "<div class='" . $class . "'>" . get_field("char_$i") . "</div>";
              if($i == $in_column || $i == $in_column*2) echo "</div><div>";
            }
          }
        echo "</div>";
      ?>

    </div>
  </div>
  <div class="product-delivery tab-parent">
    <div class="tab-name">Доставка и возврат<img src="<?php echo get_template_directory_uri(); ?>/img/tab-arrow.png" alt="arrow"></div>
    <div class="tab-block">
      <?php echo get_field("delivery-editor"); ?>
    </div>
  </div>
  <div class="populap-product">
    <div class="sub-popular">Популярные</div>
    <h2>Другие предложения</h2>

    <?php
      $query = new WP_Query([
        'post_type'    		=> 'post',
        'posts_per_page'	=> 3,
        'orderby'					=> 'rand',
      ]);
      while( $query->have_posts() ) :
        $query->the_post(); ?>

      <div class="popular-item">
        <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_image_url(get_field('img_1'), 'full'); ?>" alt="img"></a>
        <div class="popular-item__cost"><?php echo get_field('cost'); ?></div>
        <div class="popular-item__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
        <div class="popular-item__request send-request-popular open-request-popup">Отправить запрос</div>
      </div>

    <?php
      endwhile; wp_reset_postdata();
    ?>

  </div>
</div>

<?php
get_footer();
