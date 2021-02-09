<?php /* Template Name: Referrals */ ?>
<?php require_once('header.php'); ?>
<?php require(dirname(__FILE__)."/breadcrumbs.php"); ?>

      <div class="consultation_text">
          <div class="container">
              <div class="row">
                 <div class="col-md-5 col-sm-12 col-xs-12">
                     <div class="consultation_map">
                          <figure><?php get_template_part('templates/content', 'map-no-labels'); ?></figure>
                      </div>
                  </div>
                  <div class="col-md-7 col-sm-12 col-xs-12">
                       <div class="consultation_dif">
                    <p>Linkage and referral services help pediatric primary care providers and families access community mental health and support services. This includes clinic treatment, care management, or family support. Project TEACH can refer you to appropriate and accessible services that children and families in your practice need.</p>
                    <p>Simply locate your county on the map. Then use the contact information for your region to request a referral or link.</p>
                     <ul class="region_list">
                         <li class="regio_1">
                            <span class="map regio_1"><img src="/wp-content/uploads/2017/09/map.png" alt="Map"></span>
                            <h6><span>REGION 1</span></h6>
                            <a href="tel:8552277272" title="Call Us" class="">(855) 227-7272</a>
                         </li>
                         <li class="regio_2">
                            <span class="map regio_2"><img src="/wp-content/uploads/2017/09/map.png" alt="Map"></span>
                            <h6><span>REGION 2</span></h6>
                            <a href="tel:8448925070" title="Call Us" class="">(844) 892-5070</a>
                         </li>
                         <li class="regio_3">
                            <span class="map"><img src="/wp-content/uploads/2017/09/map.png" alt="Map"></span>
                            <h6><span>REGION 3</span></h6>
                            <a href="tel:8552277272" title="Call Us" class="">(855) 227-7272</a>
                         </li>
                     </ul>
                    </div>
                  </div>
              </div>
          </div>
      </div>
    </div>


<?php require_once('footer.php'); ?>