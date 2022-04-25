<?php include_once("site-info.php"); ?>

<?php get_header(); ?>

<?php include "sidebar.php"; ?>

<?php
  // home page specific metas
  $curr_page = get_queried_object();
  $site_tagline = rwmb_meta('site_tagline', array(), $curr_page->ID);
  $highlight_content = rwmb_meta('highlighted_content', array(), $curr_page->ID);
  $fvp_article = rwmb_meta('fvpa', array(), $curr_page->ID);
  $offers = rwmb_meta('hql', array(), $curr_page->ID);
  $offer1 = $offers['offer1'] ?? '';
  $offer2 = $offers['offer2'] ?? '';
?>

      <!-- main page content -->
      <div class="main-page-content">
        <div class="primarycolorbg mt-0 pt-0">
          <div class="container-fluid mx-3 mx-md-5">
            <!-- HEADER NAVIGATION -->
            <?php include "templates-parts/header-nav.php"; ?>
            <!-- END-HEADER NAVIGATION -->
            
            <!-- site tagline -->
            <div class=" mt-5 innercontent mx-md-4 mr-md-5 d-flex align-items-center">
              <h1 class="mt-md-5 text-white mb-0 col-10 mainmenuheader">
                <?php echo $site_tagline; ?>
              </h1>
            </div>
            <!-- end-site tagline -->
          </div>
        </div>
        
        <!-- homepage featured media -->
        <div class="relativecontainer detailsrel">
          <div class="detailssection pl-0 xaxisspacing">
            <div class="d-flex">
              <div class="col-lg-7 mx-0 px-0 othercol">
                <div class="d-flex align-items-end align-content-end">
                  <img
                    src="<?php echo get_mb_image_url('cover_image', $highlight_content); ?>"
                    alt="<?php echo get_mb_image_alt('cover_image', $highlight_content); ?>"
                    class="expandingimage founderimg"
                  />
                </div>
              </div>
              <div class="col-lg-4 stayingrelevant whitebordertop secondaryborderbottom pt-5">
                <div class="linecontent"></div>
                <div class="relativecontainer">
                  <p class="text-white mb-md-5 differentparagraph text-center">
                    EXPERT PERSPECTIVE
                  </p>
                  <div class="verticalmintline"></div>
                </div>
                <h2 class="secondarycolor text-center mainheader2 mt-md-5 newtop">
                  <?php echo rwmb_meta('title', array(), $highlight_content); ?>
                </h2>
                <p class="mainparagraph text-center">
                  <?php echo rwmb_meta('content_summary', array(), $highlight_content); ?>
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- end-homepage featured media -->
        
        <!-- featured article -->
        <div class="perspectives yaxisspacing xaxisspacing">
          <div class="topheader boldborderbottom">
            <h2 class="primarycolor mainheader3">Featured</h2>
          </div>

          <div class="" data-flickity='{ "wrapAround": "true", "autoPlay": 2500, "freeScroll": true, "contain": true, "prevNextButtons": false, "resize": true }'>
          <?php
              // get content posts of type features
              $features = get_posts(array(
                'post_type'=>'content',
                'post_status'=>'publish',
                'posts_per_page'=>-1,
                'order' => 'DESC',
                'meta_query'=> array(
                  array(
                    'key' => 'content_type',
                    'value' => 'features'
                  )
                )
              ));

              if($features){
                foreach($features as $feature){ 
                  if($feature->content_type == "features"){ ?>
                  <div class="carousel-cell maincarous col-lg-3 col-md-6 secondaryborderright pt-4">
                    <h3 class="text-uppercase mainheader4 secondarycolor">
                      <?php echo $feature->feature_article_group['fa_author'] ?? ''; ?>
                    </h3>
                    <p class="generalparagraph">
                      <?php echo $feature->title ?? ''; ?>
                    </p>
                  </div>
                <?php }
                }
              }else{
                "There are currently no featured content";
              }
            ?>
          </div>
        </div>
        <!-- end-featured article -->
        
        <!-- offer 1 -->
        <?php
          if($offer1){ ?>
            <div class="requestaudit yaxisspacing xaxisspacing tertiarycolorbg">
              <div class="row align-items-center p-3 p-md-5 align-content-center">
                <div class="col-md-4">
                  <h1 class="secondarycolor mainheader2 mb-0">
                    <?php echo rwmb_meta('offer_title', array(), $offer1); ?>
                  </h1>
                </div>
                <div class="col-md-5">
                  <p class="mainparagraph mb-0">
                    <?php echo rwmb_meta('short_content', array(), $offer1); ?>
                  </p>
                </div>

                <div class="col-md-3">
                  <div class="d-flex justify-content-md-end">
                  <a href="<?php echo rwmb_meta('button_url', array(), $offer1); ?>">  
                    <button class="btn enquirebtn py-2"><?php echo rwmb_meta('button_label', array(), $offer1); ?></button>
                  </a>  
                  </div>
                </div>
              </div>
            </div>
          <?php }
        ?>
        <!-- end-offer 1 -->
        
        <!-- services/vp -->
        <div class="expertisecolumn xaxisspacing yaxisspacing">
          <div class="topheader boldborderbottom">
            <h2 class="primarycolor mainheader3">Our Expertise</h2>
          </div>
          <div class="main-carousel my-5" data-flickity='{ "wrapAround": "true", "autoPlay": 2500, "freeScroll": true, "contain": true, "prevNextButtons": true, "resize": true }'>
            <?php
                $services = get_posts(array(
                  'post_type'=>'service',
                  'posts_per_page'=>4,
                  'post_status'=>'publish'
                ));

                if($services){
                  foreach($services as $service){ ?>
                    <div class="carousel-cell col-lg-3 maincarous">
                      <div class="card d-flex flex-column align-items-center align-content-center">
                        <div class="circleimages">
                          <img
                            src="<?php echo get_mb_image_url('feature_image', $service->ID) ?>"
                            class="img-fluid expandingimage"
                            alt="<?php echo get_mb_image_alt('feature_image', $service->ID) ?>"
                          />
                        </div>
                        <h3 class="merriparagraph primarycolor text-center mt-3">
                          <?php echo $service->title; ?>
                        </h3>
                      </div>
                    </div>
                  <?php }
                }
            ?>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="relativecontainer">
              <h3 class="pt-4 secondarybordertop text-uppercase text-center mainheader4 secondarycolor mb-5">
                VALUE PROPOSITION
                <span class="smallerline"></span>
              </div>
              </h3>
              <div class="mt-5">
              <div class="text-center yaxisspacing">
                <a href="#" class="merriparagraph primarycolor">
                  <?php echo rwmb_meta('title', array(), $fvp_article['article1']); ?>
                </a>
              </div>
            </div>
              <p class="smallerparagraph text-center mt-4">
                <?php echo rwmb_meta('content_summary', array(), $fvp_article['article1']); ?>
              </p>
              <div class="d-flex mt-4 align-items-center align-content-center justify-content-center">
                <img
                  src="<?php echo get_mb_image_url('cover_image', $fvp_article['article1']); ?>"
                  alt="<?php echo get_mb_image_alt('cover_image', $fvp_article['article1']); ?>"
                  class="img-fluid expandingimage"
                />
              </div>
            </div>
            <div class="mt-5 mt-md-0 col-md-6">
           <div class="relativecontainer">
              <h3 class="pt-4 secondarybordertop text-uppercase text-center mainheader4 secondarycolor mb-5">
                VALUE PROPOSITION
                <span class="smallerline"></span>
              </div>
              </h3>
              <div class="mt-5">
              <div class="text-center yaxisspacing">
                <a href="#" class="merriparagraph primarycolor">
                <?php echo rwmb_meta('title', array(), $fvp_article['article2']); ?>
                </a>
              </div>
            </div>
              <p class="smallerparagraph text-center mt-4">
                <?php echo rwmb_meta('content_summary', array(), $fvp_article['article2']); ?>
              </p>
              <div class=" d-flex mt-4 align-items-center align-content-center justify-content-center">
                <img
                  src="<?php echo get_mb_image_url('cover_image', $fvp_article['article2']); ?>"
                  alt="<?php echo get_mb_image_alt('cover_image', $fvp_article['article2']); ?>"
                  class="img-fluid expandingimage"
                />
              </div>
            </div>
          </div>
        </div>
        <!-- end-services/vp -->
        
        <!-- offer 2 -->
        <div class="requestaudit xaxisspacing yaxisspacing tertiarycolorbg">
          <div class="row align-items-center p-3 p-md-5 align-content-center">
            <div class="col-md-3">
              <img
                src="<?php echo get_mb_image_url('offer_image', $offer2); ?>"
                alt="<?php echo get_mb_image_alt('offer_image', $offer2); ?>"
                class="img-fluid expandingimage"
              />
            </div>
            <div class="col-md-9 mt-3 mt-md-0">
              <h1 class="secondarycolor mainheader2"><?php echo rwmb_meta('offer_title', array(), $offer2); ?></h1>
              <p class="mainparagraph"><?php echo rwmb_meta('short_content', array(), $offer2); ?></p>
              <a href="<?php echo rwmb_meta('button_url', array(), $offer2); ?>">
                <button class="mt-3 btn enquirebtn py-2"><?php echo rwmb_meta('button_label', array(), $offer2); ?></button>
              </a> 
            </div>
          </div>
        </div>
        <!-- end-offer 2 -->
        
        <!-- press -->
        <div class="finalsection xaxisspacing yaxisspacing mb-5">
          <div class="row">
          <?php
              // get content posts of type press
              $all_press = get_posts(array(
                'post_type'=>'content',
                'post_status'=>'publish',
                'numberposts'=> -1,
                'order'=>'DESC',
                'meta_query'=> array(
                  array(
                    'key' => 'content_type',
                    'value' => 'press'
                  )
                )
              ));

              if($all_press){
                $i=0;
                foreach($all_press as $press){ 
                  if($press->content_type == "press" && $i<4){ ?>
                  <div class="col-md-3 my-3 my-md-0">
                    <h3 class="pt-4 secondarybordertop text-uppercase mainheader4 olor mb-3">press</h3>
                    <div class="">
                      <img
                        src="<?php echo get_mb_image_url('cover_image', $press->ID) ?>"
                        class="img-fluid squareimages expandingimage"
                        alt="<?php echo get_mb_image_alt('cover_image', $press->ID) ?>"
                      />
                    </div>
                    <div class="mt-3">
                      <a href="#" class="primarycolor merriparagraph generallinks">
                        <?php echo $press->title ?? ''; ?>
                      </a>
                    </div>
                  </div>
                <?php $i++; }
                }
              }else{
                "There are currently no press content";
              }
            ?>
          </div>
        </div>
        
        <!-- footer -->
        <?php include 'templates-parts/page-footer.php'; ?>
      </div>
<?php get_footer(); ?>
