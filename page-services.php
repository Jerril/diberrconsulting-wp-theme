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
            
            <!-- Navigation -->
            <?php include "templates-parts/header-nav.php"; ?>
            <!-- end-Navigation -->
            
            <div class="innercontentexpertthinking mx-4 mr-md-5 d-flex  align-items-center">
              <div>
                <h1 class="mainheader2 text-white"><?php echo $curr_page->cf_title; ?></h1>
                <p class="text-white mb-0 mainparagraph col-lg-10 pl-0">
                  <?php echo $curr_page->cf_short_info; ?>
                </p>
              </div>
            </div>
          </div>
        </div>

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
        
        <?php
          $services = get_posts(array("post_type"=>"service", "posts_per_page"=>-1, "post_status"=>"publish"));
        ?>

        <div class="xaxisspacing">
          <div class="d-flex justify-content-center primaryborderbottom justify-content-md-end mt-4">
            <p class="generalparagraph graytext text-center text-md-right">
              Showing Results <span>0</span> -<span> <?php echo count($services); ?></span> of <?php echo count($services); ?>
            </p>
          </div>
          <div class="mt-5">
            <?php
                if($services){
                  foreach($services as $service){ ?>
                      <div class="row primaryborderbottom py-5">
                        <div class="col-md-9">
                          <h3 class="text-uppercase mainheader4 secondarycolor">
                            EXPERTISE
                          </h3>
                          <a href="<?php echo get_permalink($service->ID); ?>">
                            <h2 class="mainheader3 graytext">
                              <?php echo rwmb_meta('title', array(), $service->ID); ?>
                            </h2>
                          </a>
                          <p class="generalparagraph graytext">
                            <?php echo rwmb_meta('service_summary', array(), $service->ID); ?>
                          </p>
                        </div>
                        <div class="col-md-3">
                          <img
                            src="<?php echo get_mb_image_url('feature_image', $service->ID); ?>"
                            alt="<?php echo get_mb_image_alt('feature_image', $service->ID); ?>"
                            class="img-fluid expandingimages"
                          />
                        </div>
                      </div>
                  <?php }
                }
            ?>
            <!-- <div class="row primaryborderbottom pb-5">
              <div class="col-md-9">
                <h3 class="text-uppercase mainheader4 secondarycolor">
                  EXPERT THINKING
                </h3>
                <h2 class="mainheader3 graytext">
                  13 Best Ways to implement Changes in a growing Oganization.
                </h2>
                <p class="generalparagraph graytext">
                  Digital is rapidly and fundamentally changing the way
                  organizations create value, monetize value and defend value.
                  Digital capabilities offer the greatest disruptive threat of
                  our generation, as well as its biggest opportunity.
                </p>
              </div>
              <div class="col-md-3">
                <img
                  src="images/skyscraperrectangle.png"
                  alt=""
                  class="img-fluid expandingimages"
                />
              </div>
            </div>
            <div class="row primaryborderbottom py-5">
              <div class="col-md-9">
                <h3 class="text-uppercase mainheader4 secondarycolor">
                  EXPERT THINKING
                </h3>
                <h2 class="mainheader3 graytext">
                  13 Best Ways to implement Changes in a growing Oganization.
                </h2>
                <p class="generalparagraph graytext">
                  Digital is rapidly and fundamentally changing the way
                  organizations create value, monetize value and defend value.
                  Digital capabilities offer the greatest disruptive threat of
                  our generation, as well as its biggest opportunity.
                </p>
              </div>
              <div class="col-md-3">
                <img
                  src="images/skyscraperrectangle.png"
                  alt=""
                  class="img-fluid expandingimages"
                />
              </div>
            </div> -->

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
        
        <!-- offer -->
        <?php if($curr_page->show_offer == "yes"){ ?>
          <div class="xaxisspacing mb-4">
            <div class="requestaudit mx-5 yaxisspacing tertiarycolorbg">
              <div class="row align-items-center p-3 p-md-5 align-content-center">
                <div class="col-md-6">
                  <h1 class="secondarycolor mainheader2">
                    <?php echo rwmb_meta('offer_title', array(), $curr_page->select_offer); ?>
                  </h1>
                  <a href="<?php echo rwmb_meta('button_url', array(), $curr_page->select_offer); ?>">
                    <button class="mt-3 btn enquirebtn py-2 d-none d-md-block">
                      <?php echo rwmb_meta('button_label', array(), $curr_page->select_offer); ?>
                    </button>
                  </a>
                </div>
                <div class="col-md-6 py-2">
                  <p class="mainparagraph">
                    <?php echo rwmb_meta('short_content', array(), $curr_page->select_offer); ?>
                  </p>
                  <a href="<?php echo rwmb_meta('button_url', array(), $curr_page->select_offer); ?>"></a>
                    <button class="mt-3 btn enquirebtn py-2 d-block d-md-none">
                      <?php echo rwmb_meta('button_label', array(), $curr_page->select_offer); ?>
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
