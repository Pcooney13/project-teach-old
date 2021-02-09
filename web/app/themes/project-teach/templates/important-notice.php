<div id="banner-wrapper">
    <div style="background-color:<?php the_field('banner_color', 'options'); ?>" class="important-banner">
        <?php if (get_field('warning_icon', 'options')) : ?>
            <svg class="warning-svg" viewBox="0 0 512 512">
		        <path d="M256,0C114.497,0,0,114.507,0,256c0,141.503,114.507,256,256,256c141.503,0,256-114.507,256-256
		    	    C512,114.497,397.493,0,256,0z M256,472c-119.393,0-216-96.615-216-216c0-119.393,96.615-216,216-216
		    	    c119.393,0,216,96.615,216,216C472,375.393,375.385,472,256,472z"/>
    	    	<path d="M256,128.877c-11.046,0-20,8.954-20,20V277.67c0,11.046,8.954,20,20,20s20-8.954,20-20V148.877
	        		C276,137.831,267.046,128.877,256,128.877z"/>
		        <circle cx="256" cy="349.16" r="27"/>
            </svg>
        <?php endif; ?>
        <?php if (get_field('banner_date', 'options')) : ?>
            <?php $date=date_create();?>
            <p class="date"><?php echo date_format($date,"m.d.y");?>
        <div class="divider"></div>
        <?php endif; ?>
        <div class="important-text">
            <?php if (get_field('banner_title', 'options')) : ?>
                <h5><?php the_field('banner_title', 'options'); ?></h5>
            <?php endif; ?>
            <?php if (get_field('banner_text', 'options')) : ?>
                <?php the_field('banner_text', 'options'); ?>
            <?php endif; ?>
        </div>
        <button id="close-button">
            <svg id="close-svg" viewBox="0 0 50 50">
                <polygon class="cls-1" points="50 1.41 26.41 25 50 48.59 50 50 48.59 50 25 26.41 1.41 50 0 50 0 48.59 23.59 25 0 1.41 0 0 1.41 0 25 23.59 48.59 0 50 0 50 1.41"/>
            </svg>
        </button>
    </div>
</div>