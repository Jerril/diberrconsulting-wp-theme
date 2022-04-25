<?php include_once("site-info.php"); ?>

<?php get_header(); ?>

<?php include "sidebar.php"; ?>

<?php 
    // site info metas - about us page
    $about_page = get_posts(array("name"=>"about", "post_type"=>"page", "numberposts"=>'1'));
    $ap_id = $about_page[0]->ID;
?>

      <!-- main page content -->
      <div class="main-page-content">
        <div class="primarycolorbg mt-0 pt-0">
          <div class="container-fluid mx-3 mx-md-5">
            
            <!-- HEADER NAVIGATION -->
            <?php include 'templates-parts/header-nav.php'; ?>
            <!-- END-HEADER NAVIGATION -->
            
            <div class="innercontent-aboutus mx-4 d-flex align-items-center">
              <div class="mt-4">
                <h1 class="smallerlargeheader text-white"><?php echo rwmb_meta('page_title', array(), $ap_id); ?></h1>
                <p class="text-white mb-0 mainparagraph col-lg-9 pl-0 ml-0">
                    <?php echo rwmb_meta('page_short_blurb', array(), $ap_id); ?>
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="mx-4 mx-md-0">
            <div class="primaryborderbottom mt-5 pb-5">
              <div class="col-md-10 pl-0 ml-0">
                <p class="generalparagraph graytext text-justify">
                 <?php echo rwmb_meta('bg_information', array(), $ap_id); ?>
                </p>
                <!-- <p class="generalparagraph graytext mt-4 text-justify">
                  We help our clients rapidly adapt and gain advantage in this
                  digital era by elevating customer experiences and creating new
                  products, services and ecosystems, business models and
                  operating models.
                </p>
                <p class="generalparagraph graytext mt-4 text-justify">
                  Digital transformation is not about just adding more
                  technology to your stack — it is about revamping your entire
                  business model, customer experience and operating model while
                  leveraging a mix of technologies. We help our clients rapidly
                  adapt and gain advantage in this digital era by elevating
                  customer experiences and creating new products, services and
                  ecosystems, business models and operating models.
                </p> -->
              </div>
            </div>
            <div class="primaryborderbottom py-4">
              <h2 class="largestheader">
              <?php echo rwmb_meta('highlight_content', array(), $ap_id); ?>
              </h2>
              <h3 class="mainheader4 secondarycolor pt-2">
              <?php echo rwmb_meta('highlight_label', array(), $ap_id); ?>
              </h3>
            </div>
            <div class="primaryborderbottom mt-5 pb-5">
              <?php
                  $content = rwmb_meta('add_content_group', array(), $ap_id);

                  if($content){
                    foreach($content as $item){ 
                        $image_type = $item['media_type'];
                        // image, upload, youtube, audio
                    ?>
                      <div class="col-md-10 pl-0 ml-0">
                        <h2 class="smallerlargeheader"><?php echo $item['content_title'] ?? ''; ?></h2>
                        <?php
                          if($image_type == "image"){ ?>
                            <div class="main-carousel my-5" data-flickity='{ "wrapAround": "true", "autoPlay": 2500, "freeScroll": true, "contain": true, "prevNextButtons": false, "resize": true }'>
                              <?php
                                foreach($item['image_gallery_group'] as $section){ ?>
                                  <img src="<?php echo wp_get_attachment_image_url( $section['picture'], 'full' ); ?>" alt="" class="my-4 img-fluid" />
                                <?php }
                              ?>
                            </div>
                          <?php }
                        ?>
                        <?php
                            if($image_type == "upload"){ ?>
                              <figure>
                                <video src="<?php echo wp_get_attachment_url( $item['featured_video'] ); ?>" width="200px" height="200px"></video>
                              </figure>
                            <?php }
                        ?>
                        <?php 
                          if($image_type == "youtube"){
                            echo $item['youtube_url'];
                          }
                        ?>
                        <?php
                          if($image_type == "audio"){ ?>
                              <!-- audio -->
                              <figure>
                                <audio src="<?php echo $item['featured_audio']; ?>" width="200px" height="200px"></audio>
                              </figure>
                          <?php }
                        ?>
                        <p class="generalparagraph graytext text-justify">
                          <?php echo $item['section_content'] ?? ''; ?>
                        </p>
                      </div>
                    <?php }
                  }
              ?>
            </div>
            
            <div class="primaryborderbottom mt-5 pb-5">
              <div class="row">
                <?php
                  $team_members = rwmb_meta('team_members', array(), $ap_id);

                  if($team_members){
                    foreach($team_members as $tm){ ?>
                        <div class="col-md-3">
                          <img
                            src="<?php echo wp_get_attachment_image_url( $tm['tm_image'], 'full' ); ?>"
                            alt=""
                            class="my-4 img-fluid imageradius"
                          />
                          <p class="boldsmallerparagraph mb-0"><?php echo $tm['tm_name']; ?></p>
                          <p class="generalparagraph mt-0"><?php echo $tm['tm_designation']; ?></p>
                        </div>
                    <?php }
                  }
                
                ?>
              </div>
            </div>
          </div>
        </div>
        
        <!-- footer -->
        <?php include 'templates-parts/page-footer.php'; ?>
      </div>

<?php get_footer(); ?>