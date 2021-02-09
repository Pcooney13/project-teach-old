<?php if (have_rows('schedule')) :

    if (have_rows('featured_consult')):
        $featured_array_dates = [];
        while (have_rows('featured_consult')) : the_row();
            $date_string = get_sub_field('date');
            $date = DateTime::createFromFormat('Ymd', $date_string);
            array_push($featured_array_dates, $date->format('Ymd'));
        endwhile;
    endif;

    $repeater = get_field('schedule');
    $lengthCount = '';
    $date = DateTime::createFromFormat('Ymd', $date_string);
    $first_one_only = true;
    for ($lengthCount = 0; $lengthCount < count($repeater); $lengthCount++) {
        if ($repeater[$lengthCount]['date'] >= date('Ymd') && $first_one_only === true) : 
            $first_one_only = false;
            $current_repeater = $repeater[$lengthCount];
            $day_of_consult = DateTime::createFromFormat('!Ymd', $current_repeater['date']);                                                                         
            if ($day_of_consult->format('l') === "Tuesday") {
                $dayLink = 'https://zoom.us/webinar/register/WN_UMYAWVJcQX6YcdpSL2E16Q';
            }  else {
                $dayLink = 'https://zoom.us/webinar/register/WN_bonaTeAeT0-UZD2HRRFctg';
            } ?>
            <a href="<?php echo $dayLink; ?>" style="display:flex; align-items:center; min-width:350px;" class="flex-container">
                        <?php if($current_repeater['consultant']): 
                            $post_object = $current_repeater['consultant']; 
                        endif;?>

                        <?php if ($post_object) :
                            $post = $post_object;
                            setup_postdata($post);
                            $image = get_field('image');
                            $consultant = get_the_title();
                        endif;
                        ?>
                        <div>
                            <!-- Populates via js -->
                            <?php if (!empty($image)) : ?>
                                <img 
                                    style="min-width:80px; padding:0; max-width:115px;" 
                                    src="<?php echo $image['url']; ?>" 
                                    id="next-consult-image"
                                    alt="<?php echo $image['alt']; ?>"
                                >
                            <?php endif; ?>
                        </div>
                        <!-- Section 1 - Schedule text -->
                        <div class="flex-type">
                            <h1 style="line-height:1.5; text-transform:uppercase; font-weight:900; margin:0; font-size:18px; color:#333;" class="banner-title">
                                Next Consultation
                            </h1>
                             <p style="line-height:1.25; padding-bottom:0; font-weight:700; color:#039fda;">
                                <?php $time = $current_repeater['time'];?>
                                <?php $hourAhead = $time[0] + 1 . substr($time, 1);?>                      
                                <?php                                                                     
                                    // Create date object to store the DateTime format 
                                    $dateObj = DateTime::createFromFormat('!Ymd', $current_repeater['date']);                                                                         
                                    echo $dateObj->format('l, F d');                                                                  
                                ?> 
                                <br>
                                <?php echo $time . ' - ' . $hourAhead?>
                            </p>
                            <p style="color:#4a4a4a; font-size:18px;">
                                Advisor - <?php echo $consultant; ?>
                            </p>
                        </div>
                    </a>
                <?php wp_reset_postdata(); ?>
            <?php endif;
        }

    $rowsVisible = 0;?>

    <div class="consult__table">
        <div class="table__row table__row--header">
            <span class="table__day">Day</span>
            <span class="table__month">Date</span>
            <span class="table__time">Time</span>
            <span class="table__name">Advisor</span>
        </div>

        <?php while (have_rows('schedule')) : the_row(); ?>
        
            <?php $date_string = get_sub_field('date');

        // Create DateTime object from value (formats must match).
        $date = DateTime::createFromFormat('Ymd', $date_string);

        if ( $date->format('Ymd') >= date('Ymd') ) : ?>
            <?php $rowsVisible++; ?>
		    <?php if( $rowsVisible > get_field('number_shown') ): break; ?>
		    <?php endif; ?>

		    <?php if(get_sub_field('consultant')): 
                $post_object = get_sub_field('consultant'); 
            endif;?>

                <?php if ($post_object) :
                    $post = $post_object;
                    setup_postdata($post);
                    $image = get_field('image');
                    $consultant = get_the_title();
                ?>

            <?php 
                $time = get_sub_field('time');

                if (get_sub_field('holiday')):
                    
                    $holdiday = get_sub_field('holiday');
                    $holidayText = get_sub_field('holiday_text'); ?>
            
                    <div class="table__row disabled">
                        <span class="table__day"><?php echo $date->format('f'); ?></span>
                        <span class="table__month"><?php echo $date->format('j M'); ?></span>
                        <span style="display:none" class="table__time"><?php echo $time; ?></span>
                        <span style="width:50%; padding-left:15px;" class="table__name"><?php echo $holidayText; ?></span>
                    </div>

                <?php else: ?>
                    <!-- Check for featured events and add 'webinar' class (Orange highlight) -->
                    <div class="table__row
                        <?php foreach ($featured_array_dates as $key => $value) {
                            if ($date->format('Ymd') === $value) {
                                echo ' webinar';
                            }
                        } ?>
                    ">
                        <span class="table__day"><?php echo $date->format('l'); ?></span>
                        <span class="table__month"><?php echo $date->format('F j'); ?></span>
                        <span class="table__time"><?php echo $time; ?></span>
                        <span class="table__name"><?php echo $consultant; ?></span>
                    </div>

                <?php endif;?>
                 <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            <?php endif;
     endwhile; ?>
<?php endif;?>
    </div>