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
                    <img src="<?php echo wp_get_attachment_image_url( $featured_image, 'full' ); ?>" alt="" class="" />
                </div>
            <?php }elseif($featured_media_type == "youtube"){
                // youtube
                echo "youtube content should be here";
            }elseif($featured_media_type == "upload"){
                // video upload
                echo "uploaded video show show here";
            }else{
                echo "No media uploaded";
            }
        ?>
        <!-- end-featured media -->
        </div>
    </div>
    </div>
</div>