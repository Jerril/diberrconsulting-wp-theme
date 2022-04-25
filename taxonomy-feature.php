<?php include_once("site-info.php"); ?>

<?php get_header(); ?>

<?php include "sidebar.php"; ?>

<?php
    $curr_page = get_queried_object();
?>
      <!-- main page content -->
      <div class="main-page-content">
        <div class="primarycolorbg mt-0 pt-0">
          <div class="container-fluid mx-3 mx-md-5">
            
            <!-- HEADER NAVIGATION -->
            <?php include 'templates-parts/header-nav.php'; ?>
            <!-- END-HEADER NAVIGATION -->

            <div class="innercontentexpertthinking mx-4 mr-md-5 d-flex align-items-center">
              <div>
                <h1 class="mainheader2 text-white"><?php echo $curr_page->name; ?></h1>
                <p class="text-white mb-0 mainparagraph col-lg-10 pl-0">
                <?php echo $curr_page->description; ?>
                </p>
              </div>
            </div>
          </div>
        </div>
        <?php 
            $contents = get_posts(array("post_type"=>"content", "post_status"=>"publish", "posts_per_page"=>-1));

            foreach($contents as $i => $content){
            if($content->content_type != "feature"){
                    if($content->content_type != "features"){
                        // array_splice($contents, 1, $i);
                        unset($contents[$i]);
                    } 
                }
            }
            array_values($contents);


            foreach($contents as $i => $content){
                $feature_cat = $content->feature_article_group;
                $feature_cat = $feature_cat['fa_category'] ?? '';
                if($feature_cat != $curr_page->term_id){
                    // array_splice($contents, 1, $i);
                    unset($contents[$i]);
                }
            }
            array_values($contents);
        ?>
        <!-- <div class="mx-5 filterinputs">
          <div
            class="
              mobileborderbtm
              primaryborderbottom
              d-flex
              flex-md-row flex-column
              align-items-md-center
            "
          >
            <div class="col-md-3 primaryborderright py-md-4 mt-4 mt-md-0">
              <h3 class="mainheader4 secondarycolor">Search</h3>
              <input type="text" class="form-control secondaryinput" />
            </div>
            <div class="col-md-3 primaryborderright py-4">
              <h3 class="mainheader4 secondarycolor">Type</h3>
              <div class="alignicons mt-1">
                <select class="form-control select topselect secondaryinput">
                  <option selected>No</option>
                  <option>Yes</option>
                </select>
              </div>
            </div>
            <div class="col-md-3 primaryborderright py-4">
              <h3 class="mainheader4 secondarycolor">Expertise</h3>
              <div class="alignicons mt-1">
                <select class="form-control select topselect secondaryinput">
                  <option selected>No</option>
                  <option>Yes</option>
                </select>
              </div>
            </div>
            <div class="col-md-3 primaryborderright py-4">
              <h3 class="mainheader4 secondarycolor">Location</h3>
              <div class="alignicons mt-1">
                <select class="form-control select topselect secondaryinput">
                  <option selected>No</option>
                  <option>Yes</option>
                </select>
              </div>
            </div>
            <div class="col-md-1 secondarycolor">
              <div class="py-4">
                <button class="btn submit secondarycolor mainheader4">
                  <u class="secondarycolor py-5">Submit</u>
                </button>
              </div>
            </div>
          </div>
        </div> -->

        <div class="xaxisspacing">
          <div class="d-flex justify-content-center justify-content-md-end mt-4 primaryborderbottom">
            <p class="generalparagraph graytext text-center text-md-right">
              Showing Results <span>0</span> -<span> <?php echo count($contents); ?></span> of <?php echo count($contents); ?>
            </p>
          </div>
          <div class="">
            <?php
                if($contents){
                  foreach($contents as $content){ 
                  ?>
                      <div class="row primaryborderbottom py-5">
                        <div class="col-md-9">
                          <h3 class="text-uppercase mainheader4 secondarycolor">
                            <?php 
                                echo get_term_by('id', $feature_cat, 'feature')->name ?? ''
                             ?>
                          </h3>

                          <a href="<?php echo ($content->external_link == 'yes')?$content->add_url:get_permalink($content->ID); ?>">
                            <h2 class="mainheader3 graytext">
                              <?php echo rwmb_meta('title', array(), $content->ID); ?>
                            </h2>
                            </a>
                          <p class="generalparagraph graytext">
                            <?php echo rwmb_meta('content_summary', array(), $content->ID); ?>
                          </p>
                        </div>
                        <div class="col-md-3">
                          <img
                            src="<?php echo get_mb_image_url('cover_image', $content->ID); ?>"
                            alt="<?php echo get_mb_image_alt('cover_image', $content->ID); ?>"
                            class="img-fluid expandingimages"
                          />
                        </div>
                      </div>
                  <?php
                  }
                }else{
                  echo '<h2 class="mainheader3 graytext">There are currently no '.$curr_page->name.' contents</h2>';
                }
            ?>

            <div class="d-flex justify-content-between">
              <div></div>
              <div class="d-flex">
                <div class="mainheader4 primaryborderright secondarycolor">
                  <button class="btn secondarycolor mainheader4">
                    <span class="secondarycolor py-5 mainheader4">Prev</span>
                  </button>
                </div>
                <div class="mainheader4 secondarycolor">
                  <button class="btn secondarycolor mainheader4">
                    <span class="secondarycolor py-5 mainheader4">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- <div
          class="requestaudit xaxisspacing mb-5 yaxisspacing tertiarycolorbg"
            >
          <div class="row align-items-center p-3 p-md-5 align-content-center">
            <div class="col-md-6">
              <h1 class="secondarycolor mainheader2">
                Request Free Digital Transformation Audit
              </h1>
              <button class="mt-3 btn enquirebtn py-2 d-none d-md-block">
                Learn More
              </button>
            </div>
            <div class="col-md-6 py-2">
              <p class="mainparagraph">
                Take advantage of our COVID support campaign and Start your
                digital transformation journey with an audit – 75% Discount!
                Offer last till November 1, 2021
              </p>
              <button class="mt-3 btn enquirebtn py-2 d-block d-md-none">
                Enquire Now
              </button>
            </div>
          </div>
        </div> -->

        <!-- footer -->
        <?php include 'templates-parts/page-footer.php'; ?>
      </div>
      
<?php get_footer(); ?>
