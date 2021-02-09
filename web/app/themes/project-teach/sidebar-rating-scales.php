<style>
    .sidebar--rating-scales {
        /* border:2px solid black; */
    }
    .sidebar--rating-scales .post--list {
        flex-direction:column;
    }
    .sidebar--rating-scales .post__content--list {
        padding:15px;
    }
    .sidebar--rating-scales .post__image {
        margin:0;
        width:100%;
        height:160px;
    }
    .sidebar--rating-scales .excerpt,
    .sidebar--rating-scales .excerpt p {
        margin-top: 10px;
        font-size: 16px;
        line-height: 1.75;
    }
    .sidebar--rating-scales .excerpt p {
        margin-top:0;
        margin-bottom:20px;
    }
    .sidebar--rating-scales .type {
        font-size: 12px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .sidebar--rating-scales .button {
        padding:15px;
        border-radius:40px;
        text-align:center;
    }
</style>

<!-- Theme sidebar -->
<aside role="complementary">
    <div class="sidebars">

        <?php if( have_rows('item') ): ?>
            <?php while ( have_rows('item') ) : the_row();
                $sidebar_color = get_sub_field('color'); ?>
                <section class="sidebar sidebar--rating-scales" <?php if($sidebar_color) { echo 'style="border-color:' . $sidebar_color .';"'; } ?>>
                    <?php if (get_sub_field('manual')) : ?>
                        <article class="hide-date post post--list">
                            <?php 
                            $image = get_sub_field('image');
                            if( !empty( $image ) ): ?>
                                <a class="post__image post__image--list" href="<?php the_sub_field('link'); ?>" style="background-image:url('<?php echo esc_url($image['url']); ?>');"></a>
                            <?php endif; ?>
                            <div class="post__content--list">
                                <div class="post__category post__category--sidebar" href="#">
                                    <p class="type" <?php if($sidebar_color) { echo 'style="color:' . $sidebar_color .';"'; } ?>><?php the_sub_field('type'); ?></>                                                                                                                                                  
						    	</div>
                                <a class="post__title post__title--list" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('title'); ?></a>
                                <div class="excerpt"><?php the_sub_field('description'); ?></div>
                                <a <?php if($sidebar_color) { echo 'style="background:' . $sidebar_color .';"'; } ?> class="button" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('link_text'); ?></a>                        
                            </div>
                        </article>
                    <?php else: ?>
                        <div>
                            <?php $post_object = get_sub_field('post'); ?>
                            <?php if( $post_object ): ?>
                                <?php $post = $post_object; ?>
	                            <?php setup_postdata( $post ); ?>
                                    <? get_template_part("templates/blog/content", "post-list"); ?>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </section>    
                <?php endwhile; ?>
            <?php endif; ?>

    </div>
</aside>
