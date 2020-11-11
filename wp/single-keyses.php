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

<?php while( have_posts() ) : the_post(); ?>
  <div class="wrapper">
    <div class="task keys-border">
      <div class="keys-icon"><img src="<?php echo get_template_directory_uri(); ?>/img/checklist.svg" alt="icon"></div>
      <div class="task__title">Задача</div>
      <?php echo get_field('task'); ?>
    </div>
    <?php the_content(); ?>
    <div class="task-result">
      <div class="task-result__what-do keys-border">
        <div class="keys-icon"><img src="<?php echo get_template_directory_uri(); ?>/img/to-do.svg" alt="icon"></div>
        <div class="task-result__title">Что сделали</div>
        <?php echo get_field('task-what'); ?>
      </div>
      <div class="task-result__result keys-border">
        <div class="keys-icon"><img src="<?php echo get_template_directory_uri(); ?>/img/trophy.svg" alt="icon"></div>
        <div class="task-result__title">Результат</div>
        <?php echo get_field('task-result'); ?>
      </div>
    </div>
    <div class="f-gallery"></div>
  </div>
<?php endwhile; wp_reset_postdata(); ?>

<?php
get_footer();
