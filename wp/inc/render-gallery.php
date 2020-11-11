<?php
function render_gallery(){ ?>

<div class="galery-block">
    <div class="galery-block__main">
        <img src="<?php echo wp_get_attachment_image_url(get_field('img_1'), 'full'); ?>" alt="slide" />
    </div>
    <div class="galery-block__slider">
        <div class="f-slides">

            <?php for($i = 1; $i < 21; $i++){
                if(get_field("img_$i")){ ?>
                <div
                    class="f-slide <?php if(get_field("video_or_img_$i") === 'Видео') echo "f-video"; ?>"
                    style="background-image: url(<?php echo wp_get_attachment_image_url(get_field("img_$i"), 'full'); ?>)"
                    data-src="<?php echo wp_get_attachment_image_url(get_field("img_$i"), 'full'); ?>"
                    data-video="<?php echo get_field("video_link_$i") ?>">
                </div>
            <?php }} ?>

        </div>
    </div>
</div>

<?php }