<?php
function render_social_icons(){
  global $fort_redux; ?>

<div class="social-icons">

    <?php foreach($fort_redux['opt-slides'] as $slide){ ?>
    <a href="<?php echo $slide['url']; ?>">
        <div class="social-icons__item"><img src="<?php echo $slide['image']; ?>" alt="icon"></div>
    </a>
    <?php } ?>

</div>


<?php }