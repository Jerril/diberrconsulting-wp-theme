<?php include_once("site-info.php"); ?>

<?php get_header(); ?>

<?php include "sidebar.php"; ?>

<?php
    if(have_posts()): while(have_posts()): the_post();
      $title = rwmb_meta('title');
      $theme = rwmb_meta('theme');
      $service_summary = rwmb_meta('service_summary');
      $content_intro = rwmb_meta('content_intro');
      $feature_image = rwmb_meta('feature_image');
      $section_label = rwmb_meta('section_label');
      $features = rwmb_meta('add_feature_group');
      $content = rwmb_meta('add_content');
      $show_offer = rwmb_meta('show_offer');
      $offer = rwmb_meta('select_offer');
    endwhile;endif;
?>
      <!-- main page content -->
      <div class="main-page-content">
        <div class="primarycolorbg mt-0 pt-0">
          <div class="container-fluid mx-3 mx-md-5">
            
            <!-- Navigation -->
            <?php include "templates-parts/header-nav.php"; ?>
            <!-- Navigation -->

            <div class="innercontentstrategyinfo">
              <div class="inner mx-4 d-flex align-items-md-center">
                <div class="row pb-3">
                  <div class="col-md-7">
                    <h3 class="text-uppercase mainheader4 secondarycolor">
                      EXPERTISE
                    </h3>
                    <h1 class="mainheader2 text-white">
                      <?php echo $title; ?>
                    </h1>
                    <p class="text-white mb-0 mainparagraph col-lg-9 pl-0 ml-0">
                      <?php echo $service_summary; ?>
                    </p>
                  </div>
                  <div class="col-md-4 mr-0">
                    <img
                      src="<?php echo $feature_image['url']; ?>"
                      class="img-fluid"
                      alt="<?php echo $feature_image['alt']; ?>"
                    />
                  </div>
                  <div class="col-11 whiteborderbottom"></div>
                </div>
              </div>
              <div class="mx-4">
                <h3 class="mainheader4 text-white"><?php echo $section_label; ?></h3>
                <div class="row mt-5">
                  <?php
                      if($features){
                        foreach($features as $ft){ ?>
                          <div class="col-6 col-md-3 ml-0 pl-0">
                              <h1 class="largeheader text-white"><?php echo $ft['label']; ?></h1>
                              <p class="lightmainparagraph text-white w-75 mt-4">
                                <?php echo $ft['content']; ?>
                              </p>
                          </div>
                        <?php }
                      }
                  ?>
                  <!-- <div class="col-6 col-md-3 ml-0 pl-0">
                    <h1 class="largeheader text-white">1.3m</h1>
                    <p class="lightmainparagraph text-white w-75 mt-4">
                      Diberr Consulting help forward-thinking
                    </p>
                  </div>
                  <div class="col-6 col-md-3 ml-0 pl-0">
                    <h1 class="largeheader text-white">1.3m</h1>
                    <p class="lightmainparagraph text-white w-75 mt-4">
                      Diberr Consulting help forward-thinking
                    </p>
                  </div>
                  <div class="col-6 col-md-3 ml-0 pl-0 mt-3 mt-md-0">
                    <h1 class="largeheader text-white">1.3m</h1>
                    <p class="lightmainparagraph text-white w-75 mt-4">
                      Diberr Consulting help forward-thinking
                    </p>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="mx-4 mx-md-0">
            <div class="primaryborderbottom mt-5 pb-5">
              <div class="col-md-10 pl-0 ml-0">
                <p class="generalparagraph graytext text-justify">
                  <?php echo $content_intro; ?>
                </p>
              </div>
            </div>

            <!-- content -->
            <?php
              if($content){
                foreach($content as $i => $item){ 
                  $image_type = $item['media_type'] ?? '';
                  $gallery = $item['image_gallery'] ?? '';
                  $action_link = $item['action_link'] ?? ''; 
                ?>
                    <div class="primaryborderbottom py-4">
                      <div class="coursecategories accordion" id="accordionExample">
                        <div class="row explorecollapsebox" id="exploreheading<?php echo in_words($i); ?>" data-toggle="collapse" data-target="#explorecollapse<?php echo in_words($i); ?>" aria-expanded="true" aria-controls="exporecollapseOne">
                          <div class="col-10 col-lg-11">
                            <h2 class="pl-3 smallerlargeheader primarycolor mb-0">
                              <?php echo $item['content_title'] ?? ''; ?>
                            </h2>
                          </div>

                          <div class="col-2 col-lg-1 p-0 m-0 justify-content-md-end pt-2">
                            <i class="fa fa-arrow-down ml-lg-5 primarycolor"></i>
                          </div>
                        </div>

                        <div id="explorecollapse<?php echo in_words($i); ?>" class="collapse" aria-labelledby="exploreheading<?php echo in_words($i); ?>" data-parent="#accordionExample">
                          <div class="mt-4 px-4">        
                            <?php
                              if($image_type == "image"){
                                echo '<div id="carousel'.in_words($i).'" class="carousel slide" data-ride="carousel">';
                                echo '<div class="carousel-inner">';
                                if($gallery){
                                  foreach($gallery as $ii=>$section){ ?>
                                    <div class="carousel-item <?php if($ii == 0) echo "active"; ?>"">
                                      <img src="<?php echo wp_get_attachment_image_url( $section['image'] ?? '', 'full' ); ?>" alt="" class="my-4 img-fluid"/>
                                    </div>
                                <?php }
                                }
                                echo '</div>';
                                echo '</div>';
                              }
                            ?>
                            <?php
                                if($image_type == "upload"){ ?>
                                  <figure>
                                    <video src="<?php echo wp_get_attachment_url( $item['featured_video'] ?? '' ); ?>" width="200px" height="200px"></video>
                                  </figure>
                                <?php }
                            ?>
                            <?php 
                              if($image_type == "youtube"){
                                echo $item['youtube_url'] ?? '';
                              }
                            ?>
                            <?php
                              if($image_type == "audio"){ ?>
                                  <!-- audio -->
                                  <figure>
                                    <audio src="<?php echo $item['featured_audio'] ?? ''; ?>" width="200px" height="200px"></audio>
                                  </figure>
                              <?php }
                            ?>
                            <div class="col-md-10">
                              <p class="mt-4 generalparagraph graytext text-justify">
                                <?php echo $item['section_content'] ?? ''; ?>
                              </p>
                            </div>
                            <?php                           
                              if($action_link == "yes"){ ?>
                                <a href="<?php echo $item["button_url"] ?? ''; ?>">
                                  <button class="mt-3 btn enquirebtn py-2">
                                    <?php echo $item["button_label"] ?? ''; ?>
                                  </button>
                                </a>
                              <?php }
                            ?>
                          </div>
                        </div>
                      </div>
                    </div>    
                  <?php }
                }
            ?>
            <!-- end-content -->
          </div>
        </div>
        
        <!-- offer -->
        <?php if($show_offer == "yes"){ ?>
          <div class="xaxisspacing mb-4">
            <div class="requestaudit mx-5 yaxisspacing tertiarycolorbg">
              <div class="row align-items-center p-3 p-md-5 align-content-center">
                <div class="col-md-6">
                  <h1 class="secondarycolor mainheader2">
                    <?php echo rwmb_meta('offer_title', array(), $offer); ?>
                  </h1>
                  <a href="<?php echo rwmb_meta('button_url', array(), $offer); ?>">
                    <button class="mt-3 btn enquirebtn py-2 d-none d-md-block">
                      <?php echo rwmb_meta('button_label', array(), $offer); ?>
                    </button>
                  </a>
                </div>
                <div class="col-md-6 py-2">
                  <p class="mainparagraph">
                    <?php echo rwmb_meta('short_content', array(), $offer); ?>
                  </p>
                  <a href="<?php echo rwmb_meta('button_url', array(), $offer); ?>"></a>
                    <button class="mt-3 btn enquirebtn py-2 d-block d-md-none">
                      <?php echo rwmb_meta('button_label', array(), $offer); ?>
                    </button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <!-- end-offer -->

        <!-- footer -->
        <?php include 'templates-parts/page-footer.php'; ?>
      </div>

<?php get_footer(); ?>
