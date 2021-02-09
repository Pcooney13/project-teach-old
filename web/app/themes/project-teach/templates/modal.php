<div class="modal" id="welcome-modal" tabindex="-1" role="dialog" aria-labelledby="welcome-modal-Label">
    <div class="modal-dialog" role="document">
        <div style="padding:1rem;" class="modal-content">
            <div style="border:none; padding:0; margin-bottom:1rem;" class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="welcome-modal-label"><?php the_field('modal_title', 'option'); ?></h4>
            </div>
            <div class="modal-body">
                <div>
                    <a style="width: 180px; display:block; float:left; height: 180px; position: relative; margin-left:0; margin-right:.5rem;" href="https://project-teach.launchpaddev.com/category/intensive-training/" class="event__image-wrap">
                        <div style="height: 100%; width: 100%; background-color: rgba(0,0,0,0.25); transition: all .5s ease-in-out; position: absolute;" class="event__image-overlay"></div>
						<div class="event__image" style="background-position: center; background-size: cover; height: 100%; background-image:url('https://project-teach.launchpaddev.com/wp-content/uploads/2020/08/intensive-training-img-4-01.jpg');"></div>
                    </a>
                    <p style="line-height: 1.5; margin-bottom:1rem;" class="standard"><?php the_field("modal_text", "option"); ?></p>
                    <div style="text-align:right; margin-top:1rem;">
                        <a style="margin-bottom:1rem;" target="_blank" style="padding:12px 30px;" class="btn btn-purple" href="<?php the_field("modal_button_link", "option"); ?>"><?php the_field("modal_button_text", "option"); ?></a>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button style="padding: 0; font-weight: 300; letter-spacing: 1.4px;" type="button" class="btn" data-dismiss="modal">Please Don't Show This Again</button>
            </div> -->
        </div>
    </div>
</div>