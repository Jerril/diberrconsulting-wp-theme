<!-- left content -->
<div class="left-content">
  <div class="secondarycolorbg">
    <ul class="mt-5 pt-3">
      <li>
        <div class="menu-btn menuskew d-none d-md-block">
          <div class="">
            <div class="relativecontainer">
              <div class="d-flexalign-items-center align-content-centerlinkhoverdark">
                <i class="fa fa-circle text-white mr-1" aria-hidden="true" style="font-size: 10px"></i>
                <a class="btn-open mb-0 generalparagraph text-white" href="javascript:void(0)">Menu</a>
              </div>
              <div class="menulinecontent"></div>
            </div>

            <!-- contact us -->
            <div class="contactusabsolute">
              <a class="text-white generalparagraph linkhoverdark" href="<?php echo site_url("/contact"); ?>">Contact</a>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
  <div class="overlay">
    <div class="menu d-flex">
      <div class="secondarycolorbg closemenucontent">
        <ul class="mt-5 pt-3 d-none d-md-block">
          <li>
            <div class="text-white menuskew">
              <p class="text-white generalparagraph">
                <i class="fa fa-circle text-white pr-1" aria-hidden="true" style="font-size: 11px"></i>Close
              </p>
            </div>
          </li>
        </ul>
      </div>
      <div class="primarycolorbg pt-0 ml-lg-5">
        <div class="ml-lg-4">
          <div class="row p-0 m-0">
            <!-- menu left section -->
            <div class="col-lg-8 ml-3 ml-lg-0">
              <div class="d-flex justify-content-between align-items-center">
                <div class="logoimage mt-3 mx-lg-2">
                  <a href="<?php echo site_url(); ?>">
                    <img
                      src="<?php echo $light_logo["full_url"]; ?>"
                      alt="<?php echo $light_logo["alt"]; ?>"
                      class="img-fluid"
                    />
                  </a>
                </div>
                <div class="mt-3">
                  <p class="d-block d-lg-none">
                    <i class="fa fa-times text-white" aria-hidden="true"></i>
                  </p>
                </div>
              </div>

              <!-- services -->
              <div class="mx-md-4 yaxisspacing">
                <div class="mt-5"></div>
                <a href="<?php echo site_url("/services"); ?>">
                  <h3 class="merrimainheader4 secondarycolor mt-5">
                    Explore our work
                  </h3>
                </a>

                <h1 class="text-white mb-0 menuheader">
                  <?php
                      $services = get_posts(array("post_type"=>"service", "posts_per_page"=>-1, "order"=>"DESC", "post_status"=>"publish"));

                      if($services){
                        foreach($services as $service){ ?>
                          <a href="<?php echo get_permalink($service->ID); ?>" target="_blank" class="generallinks whitetext">
                            <?php echo $service->title; ?>
                          </a>
                          <span class="secondarycolor mx-2"><i class="fa fa-circle fa-xs" style="font-size: 11px" aria-hidden="true"></i></span>
                        <?php }
                      }
                  ?>
                </h1>
              </div>
              <!-- end-services -->

              
              <div class="yaxisspacing2 d-flex align-content-end align-items-end mt-l5">
                <div class="mt-lg-5 row ml-1 p-3 p-lg-5s">
                  <!-- features -->
                  <div class="col-md-6 mt-5 ml-0 pl-0">
                    <a href="<?php echo site_url("/feature"); ?>">
                      <h3 class="merrimainheader4 mb-4 pb-2 secondarycolor whiteborderbottom">
                        Features
                      </h3>
                    </a>
                    <div class="row">
                      <?php
                          $features = get_terms(array('taxonomy'=>'feature', 'hide_empty'=>false));

                          if($features){
                            foreach($features as $ft){ ?>
                              <div class="col-6">
                                <a href="<?php echo site_url()."/feature/".$ft->slug; ?>" class="generallinks smallerparagraph whitetext mt-1 d-block">
                                  <?php echo $ft->name; ?>
                                </a>
                              </div>
                            <?php }
                          }
                      ?>
                    </div>
                  </div>
                  <!-- end-features -->

                  <!-- about -->
                  <div class="col-md-6 mt-5 ml-0 pl-0 pl-md-2 align-items-end">
                    <h3 class="merrimainheader4 mb-0 pb-2 secondarycolor whiteborderbottom">
                      About us
                    </h3>
                    <p class="smallerparagraph text-white mt-4 text-justify">
                      Diberr Consulting help forward-thinking business
                      leaders achieve lasting success in the Fourth
                      Industrial Revolution and deliver holistic digital
                      transformation.
                    </p>
                    <a href="<?php echo site_url("/about"); ?>">
                      <button class="reachoutbtn btn py-2" type="button">
                        Learn More
                      </button>
                    </a>
                  </div>
                  <!-- end-about -->
                </div>
              </div>

            </div>
            <!-- end-menu left section -->
            
            <!-- menu right section -->
            <div class="col-lg-4 ml-1 ml-lg-0 mt-4 mt-lg-0 pr-0">
              <?php
                if($menu_links){
                  foreach($menu_links as $link){ 
                    $page_type = $link["mn_pagetype"] ?? '';
                    $new_tab = $link["mn_open_new_tab"] ?? '';  
                  ?>
                    <div class="box pl-lg-4 pr-lg-5 p-4 py-lg-4 whiteborderbottom">
                      <a 
                        href="<?php 
                        if($page_type == "external-url"){
                          echo $link["mn_url"] ?? '';
                        }elseif($page_type == "site-page"){
                          echo get_permalink($link["mn_sitepage"] ?? '');
                        }elseif($page_type == "service"){
                          echo get_permalink($link["mn_servicepost"] ?? '');
                        }elseif($page_type == "content"){
                          echo get_permalink($link["mn_contentpost"] ?? '');
                        } ?>" 
                        target="<?php if($new_tab == "yes") echo "_blank"; ?>" >
                        <h3 class="merrimainheader4 my-2 secondarycolor">
                          <?php echo $link["mn_nav_label"] ?? ''; ?>
                        </h3>

                        <p class="smallerparagraph text-white text-left">
                          <?php echo $link["mn_blurb"] ?? ''; ?>
                        </p>
                      </a>
                    </div>
                  <?php }
                }
              ?>
            </div>
            <!-- end-menu right section -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>