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

            <?php include "templates-parts/header-nav.php"; ?>

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

        <?php 
            $contents = get_posts(array("post_type"=>"content", "post_status"=>"publish", "posts_per_page"=>-1, "meta_query"=>array(array("key"=>"content_type", "value"=>"press"))));

            // foreach($contents as $i => $content){
            //   if($content->content_type != $curr_page->post_name){
            //       if($content->content_type."s" != $curr_page->post_name){
            //         // array_splice($contents, 1, $i);
            //         unset($contents[$i]);
            //       } 
            //   }
            // }
            // array_values($contents);
            
            $type_query = $_GET['type'] ?? '';
            $service_query = $_GET['service'] ?? '';
            $location_query = $_GET['location'] ?? '';
            
            if(!empty($type_query)){
              $press = get_term_by('slug', $type_query, 'press');

              foreach($contents as $i=> $content){
                $grp = $content->press_group;
                $grp = $grp['press_category'] ?? '';
                if($grp != $press->term_id){
                  unset($contents[$i]);
                }
              }
            }
            array_values($contents);

            if(!empty($service_query)){
              foreach($contents as $i=> $content){
                if($content->related_service != $service_query){
                  unset($contents[$i]);
                }
              }
            }
            array_values($contents);

            if(!empty($location_query)){
              $loc = get_term_by('slug', $location_query, 'location');
              // $subs = get_term_children($loc->term_id, 'location');

              foreach($contents as $i=> $content){
                if($content->related_location != $loc->term_id){
                  unset($contents[$i]);
                }
              }
            }
            array_values($contents);
            
        ?>

        <div class="mx-5 filterinputs">
          <form action="<?php echo site_url("/".$curr_page->post_name) ?>" method="GET">
            <div class="mobileborderbtm primaryborderbottom d-flex flex-md-row flex-column align-items-md-center">
              <!-- <div class="col-md-3 primaryborderright py-md-4 mt-4 mt-md-0">
                <h3 class="mainheader4 secondarycolor">Search</h3>
                <input type="text" class="form-control secondaryinput" />
              </div> -->
              <div class="col-md-3 primaryborderright py-md-4 mt-4 mt-md-0">
                <h3 class="mainheader4 secondarycolor">Type</h3>
                <div class="alignicons mt-1">
                  <select name="type" class="form-control select topselect secondaryinput">
                    <option value="">-- Select --</option>
                    <?php $types = get_terms(array('taxonomy'=>'press', 'hide_empty'=>false));
                      if($types){
                        foreach($types as $type){ ?>
                          <option value="<?php echo $type->slug; ?>" <?php if($type_query == $type->slug) echo "selected"; ?>><?php echo $type->name; ?></option>
                        <?php }
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4 primaryborderright py-4">
                <h3 class="mainheader4 secondarycolor">Expertise</h3>
                <div class="alignicons mt-1">
                  <select name="service" class="form-control select topselect secondaryinput">
                    <option value="">-- Select --</option>
                      <?php $services = get_posts(array('post_type'=>'service', 'posts_per_page'=>-1, 'post_status'=>'publish'));
                        if($services){
                          foreach($services as $service){ ?>
                            <option value="<?php echo $service->ID; ?>" <?php if($service_query == $service->ID) echo "selected"; ?>><?php echo $service->post_title; ?></option>
                          <?php }
                        }
                      ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4 primaryborderright py-4">
                <h3 class="mainheader4 secondarycolor">Location</h3>
                <div class="alignicons mt-1">
                  <select name="location" class="form-control select topselect secondaryinput">
                  <option value="">-- Select --</option>
                      <?php $location = get_terms(array('taxonomy'=>'location', 'hide_empty'=>false));
                        if($location){
                          foreach($location as $loc){ ?>
                            <option value="<?php echo $loc->slug; ?>" <?php if($location_query == $loc->slug) echo "selected"; ?>><?php echo $loc->name; ?></option>
                          <?php }
                        }
                      ?>
                  </select>
                </div>
              </div>
              <div class="col-md-1 secondarycolor">
                <div class="py-4">
                  <button type="submit" class="btn submit secondarycolor mainheader4">
                    <u class="secondarycolor py-5">Submit</u>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
        
        <div class="xaxisspacing">
          <div class="d-flex justify-content-center justify-content-md-end mt-4">
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
                              echo get_sub_category($content->content_type, $content->ID);
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
                  echo '<h2 class="mainheader3 graytext">There are currently no'.$curr_page->name.' contents</h2>';
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