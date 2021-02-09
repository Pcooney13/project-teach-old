<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb__list">
                    <li class="breadcrumb__list-item">
                        <a href="/" title="HOME">HOME</a>
                        <p class="breadcrumb__spacer">></p>
                        <?php if(is_archive('events')): ?>
                            <p>Events</p>
                        <?php else:?>
                            <p><?php the_title(); ?></p>
                        <?php endif; ?>
                    </li>
                </ol>
            </div>
        </div>
	</div>    
</div>