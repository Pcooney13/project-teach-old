<!-- Theme sidebar -->

<style>
/* calendar widget */
/* #wp-calendar {width: 99%; margin:0 auto; }
#wp-calendar caption { text-align: center; color: #333; font-size: 18px; margin-top: 10px; margin-bottom: 15px; }
#wp-calendar thead { font-size: 10px; }
#wp-calendar thead th { padding-bottom: 10px; text-align:center; }
#wp-calendar tbody { color: #aaa; }
#wp-calendar tbody td { background: #f5f5f5; border: 1px solid #fff; text-align: center; padding:8px;}
#wp-calendar tbody td:hover { background: #fff; }
#wp-calendar tbody .pad { background: none; }
#wp-calendar tfoot #next { font-size: 10px; text-transform: uppercase; text-align: right; }
#wp-calendar tfoot #prev { font-size: 10px; text-transform: uppercase; padding-top: 10px; } */

html {
  scroll-behavior: smooth;
}

.sidebar__text {
    padding:15px;
}
.btn-wrap {
    padding:15px;
}
.rs-btn {
    width:100%;
}

/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  margin-left:auto;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #3a0e79;
}

input:focus + .slider {
  box-shadow: 0 0 1px #3a0e79;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>

<aside role="complementary">
    <div class="sidebars sidebars__sticky">
		<?php
        //get 6 most recent posts
		$args = array( 
			'post_type' 	 => 'events', 
			'posts_per_page' => '5',
			'post__not_in'   => array(get_the_ID())
		);
        $sidebar_posts = new WP_Query($args);
		//Display Recent Posts
		if($sidebar_posts->have_posts() && 100 === 99) : ?>
            <section class="sidebar sidebar__recent">
                <h3 class="sidebar__header">Recent Added Events</h3>
                <ul class="sidebar__list">
					<?php while($sidebar_posts->have_posts()) : $sidebar_posts->the_post(); ?>
                        <li class="sidebar__list-item">

                            <?php 
                                $date_string = get_field('date');
                                $date = DateTime::createFromFormat('Ymd', $date_string);
                            ?>

                            <p class="post__date post__date--sidebar"><?php echo $date->format('M j, Y'); ?></p>
                            <div class="post__category post__category--sidebar" href="#">
                                <?php 
                                    $categories = get_the_category();
                                    if ( ! empty( $categories ) ) :
                                        foreach( $categories as $category ) :
                                            $cat_id = $category->cat_ID;
                                            $color = get_field('category_color', 'category_'. $cat_id .'');?>
                                                <a style="color:<?php echo $color; ?>;" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
                                            <?php 
                                        // endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; 
                                ?>
                                
							</div>
                            <a class="post__title post__title--sidebar" href="<?php echo the_permalink();?>"><?php the_title() ?></a>
						</li>
					<?php endwhile; ?>                        			
                </ul>
			</section>
		<?php endif; ?>

        <section class="sidebar">
            <h3 style="background:#3a0e79" class="sidebar__header">Clinical Rating Scales</h3>
            <p class="sidebar__text">Evidence-based questionnaires and rating scales in your primary care practice. They are free downloads in PDF format.</p>
            <div class="btn-wrap">
                <a class="btn btn-purple rs-btn" href="/rating-scales">View Rating scales</a>
            </div>
        </section>

        <section class="sidebar">
            <h3 style="background:#54b900; margin-bottom:0;" class="sidebar__header">COVID-19</h3>
            <div style="background-image:url(https://project-teach.launchpaddev.com/wp-content/uploads/2020/03/iStock-1210596209.jpg); background-position:center; background-size:cover; height:120px; opacity:.8;"></div>
            <p class="sidebar__text">COVID-19 is impacting daily life for children and families across New York State. Project TEACH continues to support our Pediatric Primary Care providers during this time.</p>
            <div class="btn-wrap">
                <a class="btn btn-green rs-btn" href="/covid">View Resources</a>
            </div>
        </section>

        <section class="sidebar">
            <h3 style="background:#039fda; margin-bottom:0;" class="sidebar__header">Consultation Services</h3>
            <p class="sidebar__text">Project TEACH allows primary care providers to speak on the phone with child and adolescent psychiatrists. Ask questions, discuss cases, or review treatment options. Whatever you need to support your ability to manage your patients.</p>
            <div class="btn-wrap">
                <a class="btn btn-blue rs-btn" href="/consultation">View Consultations</a>
            </div>
        </section>

        <section class="sidebar sidebar__authors">
            <h3 style="display:flex; align-items:center;" class="sidebar__header">
            <span>Hide Past Events</span>
            <label class="switch">
                <input id="old-events-switch" type="checkbox">
                <span class="slider round"></span>
            </label>
            </h3>
        </section>

        <!-- <section class="sidebar sidebar__authors">
            <h3 class="sidebar__header">Posts By Month</h3>
            <?php get_calendar(); ?>
        </section> -->

    </div>
</aside>

<script>
    window.addEventListener('load', (event) => {
        var oldSwitch = document.getElementById('old-events-switch');
        var oldTitle = document.getElementById('past-title');
        var oldEvents = document.querySelectorAll('.passed');
        var region1 = document.querySelectorAll('.region__link-1');
        var region2 = document.querySelectorAll('.region__link-2');
        var region3 = document.querySelectorAll('.region__link-3');

        for (var i = 0, len = region1.length; i < len; i++) {
            region1[i].addEventListener("click", function() {
                console.log("clicked region 1")
            })
        }

        oldSwitch.addEventListener( 'change', function() {
            if(this.checked) {
                console.log("checked")
                // oldEvents.style.display = "none";
                console.log(oldEvents);
                for (var i = 0, len = oldEvents.length; i < len; i++) {
                    oldEvents[i].style.display = "none";    
                }
                oldTitle.style.display = "none";
                window.scrollTo(0,0);
            } else {
                console.log("UNNNNNN-checked")
                for (var i = 0, len = oldEvents.length; i < len; i++) {
                    oldEvents[i].style.display = "block";    
                }
                oldTitle.style.display = "block";
                window.scrollTo(0,0);
            }
        });

    });
</script>
