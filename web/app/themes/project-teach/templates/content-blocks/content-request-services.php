<section class="section">
    <div class="container">
        <div class="row">
            <ul class="region_list" style="margin:0 auto; max-width:800px">
                <li class="regio_1">
                    <a href="/regional-providers/region-1/" title="" target="_blank" class="map regio_1"><img
                            src="/wp-content/uploads/2017/09/map.png" alt="Map"></a>
                    <h6><span title="REGION 1">REGION 1</span></h6>
                    <a href="tel://8552277272" title="Call Us" class="">(855) 227-7272</a>
                </li>
                <li class="regio_2">
                    <a href="/regional-providers/region-2/" title="" target="_blank" class="map regio_2"><img
                            src="/wp-content/uploads/2017/09/map.png" alt="Map"></a>
                    <h6><span title="REGION 2">REGION 2</span></h6>
                    <a href="tel://8448925070" title="Call Us" class="">(844) 892-5070</a>
                </li>
                <li class="regio_3">
                    <a href="/regional-providers/region-3/" title="" target="_blank" class="map"><img
                            src="/wp-content/uploads/2017/09/map.png" alt="Map"></a>
                    <h6><span title="REGION 3">REGION 3</span></h6>
                    <a href="tel://8552277272" title="Call Us" class="">(855) 227-7272</a>
                </li>
            </ul>
            <?php 
                $link = get_sub_field('rs_button');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>

                    <div class="text-center mt-8">

                    <a id="join-consult" href="<?php echo esc_url( $link_url ); ?>" title="Read More" class="btn btn-<?php echo $args['color_name']; ?>" target="<?php echo esc_attr( $link_target ); ?>">
                        <?php echo esc_html( $link_title ); ?>
                    </a>
                    </div>

                <?php endif; 
            ?>
        </div>
    </div>
</section>