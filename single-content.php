<?php
    if(have_posts()): while(have_posts()): the_post();
        $title = rwmb_meta('title');
        $cover_image = rwmb_meta('cover_image');
        $content_type = rwmb_meta('content_type');
        $content_summary = rwmb_meta('content_summary');
        $template = rwmb_meta('select_template');
        $content_intro = rwmb_meta('content_intro');
    
        $external_link = rwmb_meta('external_link');
        $external_url = rwmb_meta('add_url');
        $new_tab = rwmb_meta('open_new_tab');

        // content types
        $vp = rwmb_meta('value_proposition_group');
        $press = rwmb_meta('press_group');
        $feature_article = rwmb_meta('feature_article_group');
        $event = rwmb_meta('event');
        $job = rwmb_meta('job');
        $download = rwmb_meta('download');

        // related (service, location)
        $related = rwmb_meta('related');

        // featured media
        $featured_media = rwmb_meta('featured_media');
        // print_r($featured_media);
        // die;
        $featured_media_type = $featured_media['afm_media_type'] ?? '';
        $featured_image = $featured_media['afm_upload_image'] ?? '';
        $featured_video = $featured_media['afm_upload_video'] ?? '';
        $featured_youtube_url = $featured_media['afm_youtube_url'] ?? '';

        // content
        $content = rwmb_meta('content_group');

        $show_offer = rwmb_meta('show_offer');
        $offer = rwmb_meta('select_offer');
    endwhile;endif;
?>

<?php include_once("site-info.php"); ?>

<?php get_header(); ?>

<?php include("sidebar.php"); ?>

      <!-- main page content -->
      <div class="main-page-content">
        <?php
            // templates
            if($template == "template2"){ ?>
              <div class="tertiarycolorbg mt-0 pt-0">
                  <div class="container-fluid mx-4 mx-md-5">

                  <!-- header navigation -->
                  <?php include "templates-parts/header-nav-blue.php"; ?>
                  <!-- end-header navigation -->

                  <div class="innercontentstrategyinfo transformation">
                      <div class="inner mx-md-5 d-flex flex-column align-content-md-center">
                      <div class="row pb-3">
                          <div class="col-md-11">
                          <h3 class="text-uppercase mainheader4 secondarycolor">
                              <?php
                                  $cat = $content_type;
                                  $sub_cat = "";

                                  if($content_type == "value-proposition"){
                                  if($vp){
                                      $sub_cat = get_term($vp["vp_category"], 'value-propositon')->name ?? '';
                                      }
                                  }
                          
                                  if($content_type == "careers" || $content_type == "career"){
                                      $sub_cat = get_term_by('id', $job["job_type"], 'career')->name ?? '';
                                  }
                          
                                  if($content_type == "events" || $content_type == "event"){
                                      $sub_cat = get_term($event["event_category"], 'event-category')->name ?? '';
                                  }
                          
                                  if($content_type == "features"){
                                      $sub_cat = get_term_by('id', $feature_article["fa_category"], 'feature')->name ?? '';
                                  }
                          
                                  if($content_type == "press"){
                                      $sub_cat = get_term_by('id', $press["press_category"] , 'press')->name ?? '';
                                  }
                          
                                  if($content_type == "resources"){
                                      $sub_cat = get_term_by('id', $download["download_category"], 'resource')->name ?? '';
                                  }
                              ?>
                              <?php
                                  if($sub_cat){
                                      $cat .= " . ".$sub_cat;
                                  }
                                  echo $cat;      
                              ?>
                          </h3>
                          <h1 class="mainheader2 text-dark">
                              <?php echo $title; ?>
                          </h1>
                          <p class="mb-0 secondarycolor mainparagraph col-lg-9 pl-0 ml-0">
                              <?php echo $content_summary; ?>   
                          </p>
                          </div>
                      </div>
                          
                      <!-- event -->
                      <?php if($content_type == "event" || $content_type == "events"){ ?>
                          <div class="row primaryborder borderrcontent mt-4 p-3 mr-md-5 pr-4 ml-1">
                              <div class="col-md-9">
                                  <div class="row">
                                  <div class="col-6 col-md-3">
                                      <div class="primaryborderbottom">
                                      <p class="boldsmallerparagraph primarycolor mb-0">
                                          Date
                                      </p>

                                      <p class="smallerparagraph text-dark mt-0">
                                          <?php echo date('d-F-Y', strtotime($event['event_date'] ?? '')); ?>
                                      </p>
                                      </div>
                                  </div>
                                  <div class="col-6 col-md-3">
                                      <div class="primaryborderbottom">
                                      <p class="boldsmallerparagraph primarycolor mb-0">
                                          Time
                                      </p>

                                      <p class="smallerparagraph text-dark mt-0">
                                          <?php echo date('h:i a', strtotime($event['event_time'] ?? '')); ?> (GMT+1)
                                      </p>
                                      </div>
                                  </div>
                                  <div class="col-6 col-md-3">
                                      <div class="primaryborderbottom">
                                      <p class="boldsmallerparagraph primarycolor mb-0">
                                          Location
                                      </p>

                                      <p class="smallerparagraph text-dark mt-0">
                                          <?php 
                                              $state=get_term_by('id', $event['event_location'], 'location') ?? '';
                                              $country = get_term($state->parent,'location') ?? '';

                                              $location = $state->name;
                                              if($state->parent > 0){
                                                  $location .= ", ".$country->name;
                                              }

                                              echo $location;
                                          ?>
                                      </p>
                                      </div>
                                  </div>
                                  </div>
                                  <div class="primaryborderbottom mt-2">
                                  <p class="boldsmallerparagraph secondarycolor mb-0">
                                      Address
                                  </p>

                                  <p class="smallerparagraph text-dark mt-0">
                                      <?php echo $event['event_address'] ?? ''; ?>
                                  </p>
                                  </div>
                              </div>
                              <div class="col-md-3 mt-3 mt-md-0">
                                  <div class="d-flex justify-content-md-end align-content-center">
                                  <a href="<?php echo $event['event_registration_url'] ?? ''; ?>">
                                      <button class="btn enquirebtn py-2 mt-2 px-4">
                                          Register
                                      </button>
                                  </a>
                                  </div>
                              </div>
                          </div>
                      <?php } ?>
                      <!-- end-event -->

                      <!-- job -->
                      <?php if($content_type == "career" || $content_type == "careers"){ ?>
                          <div class=" row primaryborder borderrcontent mt-4 p-3 mr-md-5 pr-4  ml-1 ">
                              <div class="col-md-9">
                                  <div class="row">
                                  <div class="col-6 col-md-3">
                                      <div class="">
                                      <p class="boldsmallerparagraph primarycolor mb-0">
                                          Job Type
                                      </p>

                                      <p class="smallerparagraph text-dark mt-0">
                                          <?php echo get_term_by('id', $job['job_type'], 'career')->name ?? ''; ?>
                                      </p>
                                      </div>
                                  </div>
                                  <div class="col-6 col-md-3">
                                      <div class="">
                                      <p class="boldsmallerparagraph primarycolor mb-0">
                                          Location
                                      </p>

                                      <p class="smallerparagraph text-dark mt-0">
                                          <?php 
                                              $state=get_term_by('id', $job['job_location'], 'location') ?? '';
                                              $country = get_term($state->parent,'location') ?? '';

                                              $location = $state->name;
                                              if($state->parent > 0){
                                                  $location .= ", ".$country->name;
                                              }

                                              echo $location;
                                          ?>
                                      </p>
                                      </div>
                                  </div>
                                  <div class="col-6 col-md-3">
                                      <div class="">
                                      <p class="boldsmallerparagraph primarycolor mb-0">
                                          Application Deadline
                                      </p>

                                      <p class="smallerparagraph text-dark mt-0">
                                      <?php echo date("d-F-Y", strtotime($job['job_application_deadline'] ?? '')); ?>
                                      </p>
                                      </div>
                                  </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="d-flex justify-content-md-end align-content-center" >
                                  <a href="<?php echo $job["job_application_url"] ?? ''; ?>">
                                      <button class="btn enquirebtn py-2 mt-2 px-4">
                                          Apply
                                      </button>
                                  </a>
                                  </div>
                              </div>
                          </div>
                      <?php } ?>
                      <!-- end-job -->
                    
                      <!-- featured media -->
                      <?php
                          if($featured_media_type == "image"){ ?>
                              <div class="absoluteimage">
                                  <img src="<?php echo wp_get_attachment_image_url( $featured_image, 'full'); ?>" alt="" class="" />
                              </div>
                          <?php }elseif($featured_media_type == "youtube"){
                              // youtube
                              echo "youtube content should be here";
                          }elseif($featured_media_type == "upload"){
                              // video upload
                              echo "uploaded video show show here";
                          }
                      ?>
                      <!-- end-featured media -->
                      </div>
                  </div>
                  </div>
              </div>
            <?php }else{ ?>
              <div class="primarycolorbg downmargin mt-0 pt-0">
                  <div class="container-fluid mx-3 mx-md-5">
                  
                  <!-- header navigation -->
                  <?php include "templates-parts/header-nav.php"; ?>
                  <!-- end-header navigation -->

                  <div class="innercontentstrategyinfo transformation">
                      <div class="inner mx-md-5 d-flex flex-column align-content-md-center">
                      <div class="row pb-3">
                          <div class="col-md-11">
                          <h3 class="text-uppercase mainheader4 secondarycolor">
                          <?php
                                  $cat = $content_type;
                                  $sub_cat = "";

                                  if($content_type == "value-proposition"){
                                  if($vp){
                                      $sub_cat = get_term($vp["vp_category"], 'value-propositon')->name ?? '';
                                      }
                                  }
                          
                                  if($content_type == "careers" || $content_type == "career"){
                                      $sub_cat = get_term_by('id', $job["job_type"], 'career')->name ?? '';
                                  }
                          
                                  if($content_type == "events" || $content_type == "event"){
                                      $sub_cat = get_term($event["event_category"], 'event-category')->name ?? '';
                                  }
                          
                                  if($content_type == "features"){
                                      $sub_cat = get_term_by('id', $feature_article["fa_category"], 'feature')->name ?? '';
                                  }
                          
                                  if($content_type == "press"){
                                      $sub_cat = get_term_by('id', $press["press_category"] , 'press')->name ?? '';
                                  }
                          
                                  if($content_type == "resources"){
                                      $sub_cat = get_term_by('id', $download["download_category"], 'resource')->name ?? '';
                                  }
                              ?>
                              <?php
                                  if($sub_cat){
                                      $cat .= " . ".$sub_cat;
                                  }
                                  echo $cat;      
                              ?>
                          </h3>
                          <h1 class="mainheader2 text-white">
                              <?php echo $title; ?>
                          </h1>
                          <p class="text-white mb-0 mainparagraph col-lg-9 pl-0 ml-0">
                              <?php echo $content_summary; ?>
                          </p>
                          </div>
                      </div>

                      <!-- event -->
                      <?php if($content_type == "event" || $content_type == "events"){ ?>
                          <div class="row whiteborder borderrcontent mt-4 p-3 mr-md-5 pr-4 ml-1" >
                              <div class="col-md-9">
                                  <div class="row">
                                  <div class="col-6 col-md-3">
                                      <div class="secondaryborderbottom">
                                      <p class="boldsmallerparagraph secondarycolor mb-0">
                                          Date
                                      </p>

                                      <p class="smallerparagraph text-white mt-0">
                                          <?php echo date('d-F-Y', strtotime($event['event_date'] ?? '')); ?>
                                      </p>
                                      </div>
                                  </div>
                                  <div class="col-6 col-md-3">
                                      <div class="secondaryborderbottom">
                                      <p class="boldsmallerparagraph secondarycolor mb-0">
                                          Time
                                      </p>

                                      <p class="smallerparagraph text-white mt-0">
                                          <?php echo date('h:i a', strtotime($event['event_time'] ?? '')); ?> (GMT+1)
                                      </p>
                                      </div>
                                  </div>
                                  <div class="col-6 col-md-3">
                                      <div class="secondaryborderbottom">
                                      <p class="boldsmallerparagraph secondarycolor mb-0">
                                          Location
                                      </p>

                                      <p class="smallerparagraph text-white mt-0">
                                          <?php 
                                          $state=get_term_by('id', $event['event_location'], 'location') ?? '';
                                          $country = get_term($state->parent,'location') ?? '';

                                          $location = $state->name;
                                          if($state->parent > 0){
                                              $location .= ", ".$country->name;
                                          }

                                          echo $location;
                                          ?>
                                      </p>
                                      </div>
                                  </div>
                                  </div>
                                  <div class="primaryborderbottom mt-2">
                                  <p class="boldsmallerparagraph secondarycolor mb-0">
                                      Address
                                  </p>

                                  <p class="smallerparagraph text-white mt-0">
                                      <?php echo $event['event_address'] ?? ''; ?>
                                  </p>
                                  </div>
                              </div>

                              <div class="col-md-3">
                                  <div class="mt-3 d-flex justify-content-md-end align-content-center">
                                      <a href="<?php echo $event['event_registration_url'] ?? ''; ?>">
                                          <button class="btn secondarybtn py-2 mt-2 px-3">
                                              Register
                                          </button>
                                      </a>
                                  </div>
                              </div>
                          </div>
                      <?php } ?>
                      <!-- end-event -->

                      <!-- job -->
                      <?php if($content_type == "career" || $content_type == "careers"){ ?>
                          <div class="row whiteborder borderrcontent mt-4 p-3 mr-md-5 pr-4 ml-1">
                          <div class="col-md-9">
                              <div class="row">
                              <div class="col-6 col-md-3">
                                  <div class="">
                                  <p class="boldsmallerparagraph secondarycolor mb-0">
                                      Job Type
                                  </p>

                                  <p class="smallerparagraph text-white mt-0">
                                      <?php echo get_term_by('id', $job['job_type'], 'career')->name ?? ''; ?>
                                  </p>
                                  </div>
                              </div>
                              <div class="col-6 col-md-3">
                                  <div class="">
                                  <p class="boldsmallerparagraph secondarycolor mb-0">
                                      Location
                                  </p>

                                  <p class="smallerparagraph text-white mt-0">
                                      <?php 
                                          $state=get_term_by('id', $job['job_location'], 'location') ?? '';
                                          $country = get_term($state->parent,'location') ?? '';

                                          $location = $state->name;
                                          if($state->parent > 0){
                                              $location .= ", ".$country->name;
                                          }

                                          echo $location;
                                      ?>
                                  </p>
                                  </div>
                              </div>
                              <div class="col-6 col-md-3">
                                  <div class="">
                                  <p class="boldsmallerparagraph secondarycolor mb-0">
                                      Application Deadline
                                  </p>

                                  <p class="smallerparagraph text-white mt-0">
                                      <?php echo date("d-F-Y", strtotime($job['job_application_deadline'] ?? '')); ?>
                                  </p>
                                  </div>
                              </div>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="mt-3 d-flex justify-content-md-end align-content-center">
                                  <a href="<?php echo $job["job_application_url"] ?? ''; ?>">
                                      <button class="btn secondarybtn py-2 mt-2 px-3">
                                          Apply
                                      </button>
                                  </a>
                              </div>
                          </div>
                          </div>
                      <?php } ?>
                      <!-- end-job -->

                      <!-- featured media -->
                      <?php
                          if($featured_media_type == "image"){ ?>
                              <div class="absoluteimage">
                                  <img src="<?php echo wp_get_attachment_image_url( $featured_image, 'full' ); ?>" alt="" class="" />
                              </div>
                          <?php }elseif($featured_media_type == "youtube"){
                              // youtube
                              echo "youtube content should be here";
                          }elseif($featured_media_type == "upload"){
                              // video upload
                              echo "uploaded video show show here";
                          }
                      ?>
                      <!-- end-featured media -->
                      </div>
                  </div>
                  </div>
              </div>
            <?php }
            // end-templates
        ?>

        <div class="container afterabsolute">
          <div class="mx-4 mx-md-0 mb-4">
            <div class="primaryborderbottom mt-5 pb-5">
              <div class="col-md-10 pl-0 ml-0">
                <p class="generalparagraph graytext text-justify">
                    <?php echo $content_intro; ?>
                </p>
              </div>
            </div>

            <!-- download -->
            <?php if($content_type == "resources"){ ?>
              <div class="">
                <div class="requestaudit mt-5 tertiarycolorbg">
                  <div class="row align-items-center p-3 p-md-5 align-content-center" >
                    <div class="col-md-9 col-6">
                      <h1 class="secondarycolor mainheader2">
                        <?php echo $download['download_label'] ?? ''; ?>
                      </h1>
                    </div>
                    <div class="col-md-3 py-2 col-6">
                      <a href="<?php echo $download['download_url'] ?? ''; ?>">
                        <button class="btn enquirebtn py-2">Download Now</button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
            <!-- end-download -->

            <!-- content -->
            <?php
              if($content){
                foreach($content as $i => $item){ 
                  $image_type = $item['content_media_type'] ?? '';
                  $gallery = $item['content_add_image'] ?? '';
                  $action_link = $item['content_action_link'] ?? '';
                  
                  $num = in_words($i);
                ?>
                    <div class="primaryborderbottom py-4">
                      <div class="coursecategories accordion" id="accordionExample">
                        <div class="row explorecollapsebox" id="exploreheading<?php echo in_words($i); ?>" data-toggle="collapse" data-target="#explorecollapse<?php echo in_words($i); ?>" aria-expanded="true" aria-controls="exporecollapse<?php echo in_words($i); ?>">
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
                              if($image_type == "image"){ ?>
                                <div id="carousel<?php echo $num; ?>" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                <?php if($gallery){
                                  foreach($gallery as $ii => $section){ ?>
                                    <div class="carousel-item <?php if($ii == 0) echo "active"; ?>">
                                      <img src="<?php echo wp_get_attachment_image_url( $section['cai_image'] ?? '', 'full' ); ?>" alt="" class="my-4 img-fluid"/>
                                    </div>
                                <?php }
                                } ?>
                                </div>
                                </div>
                              <?php }
                            ?>
                            <?php
                                if($image_type == "upload"){ ?>
                                  <figure>
                                    <video src="<?php echo wp_get_attachment_url( $item['content_video_upload'] ?? '' ); ?>" width="200px" height="200px"></video>
                                  </figure>
                                <?php }
                            ?>
                            <?php 
                              if($image_type == "youtube"){
                                echo $item['content_youtube_url'] ?? '';
                              }
                            ?>
                            <?php
                              if($image_type == "audio"){ ?>
                                  <!-- audio -->
                                  <figure>
                                    <audio src="<?php echo $item['content__audio_select'] ?? ''; ?>" width="200px" height="200px"></audio>
                                  </figure>
                              <?php }
                            ?>
                            <div class="col-md-10">
                              <p class="mt-4 generalparagraph graytext text-justify">
                                <?php echo $item['content_section_content'] ?? ''; ?>
                              </p>
                            </div>
                            <?php                           
                              if($action_link == "yes"){ ?>
                                <a href="<?php echo $item["content_button_url"] ?? ''; ?>">
                                  <button class="mt-3 btn enquirebtn py-2">
                                    <?php echo $item["content_button_label"] ?? ''; ?>
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