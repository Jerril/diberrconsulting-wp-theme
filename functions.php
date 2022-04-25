<?php
    function theme_files(){
        // Activate Stylesheets
        wp_enqueue_style("custom-css", get_stylesheet_uri());
        wp_enqueue_style("bootstrap-css", get_theme_file_uri("/assets/bootstrap-4.6.0-dist/css/bootstrap.min.css"));
        wp_enqueue_style("flickity-css", get_theme_file_uri("/assets/flickity.css"));

        // Activate js Scripts
        wp_enqueue_script("jquery", "https://code.jquery.com/jquery-2.2.4.js", NULL, 1.0, true);
        wp_enqueue_script("bootstrap-js", get_theme_file_uri("/assets/bootstrap-4.6.0-dist/js/bootstrap.min.js"), NULL, 1.0, true);
        wp_enqueue_script("custom-js", get_theme_file_uri("/assets/script.js"), array('jquery'), 1.0, true);
       
        wp_enqueue_script("flickity-js", "https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js", NULL, 1.0, true);
    }
    add_action("wp_enqueue_scripts", "theme_files");

    
    
    /* 
        METABOX.IO SPECIFIC FUNCTIONS
    */

    // Function get the url of metabox single image field
    function get_mb_image_url($key, $id=null){
        $image = rwmb_meta($key, array(), $id);
        return $image['full_url'];
    }

    // Function get the alt of metabox single image field
    function get_mb_image_alt($key, $id=null){
        $image = rwmb_meta($key, array(), $id);
        return $image['alt'];
    }

    // Function to get Content Type Sub category
    function get_sub_category($content_type, $page_id){
        $sub_category = "";

        if($content_type == "value-proposition"){
            $vp = rwmb_meta('value_proposition_group', array(), $page_id);
            if($vp){
                $sub_category = get_term($vp["vp_category"], 'value-propositon')->name ?? '';
            }
        }

        if($content_type == "careers" || $content_type == "career"){
            $job = rwmb_meta('job', array(), $page_id);
            if($job){
                $sub_category = get_term_by('id', $job["job_type"], 'career')->name ?? '';
            }
        }

        if($content_type == "events" || $content_type == "event"){
            $event = rwmb_meta('event', array(), $page_id);
            if($event){
                $sub_category = get_term($event["event_category"], 'event-category')->name ?? '';
            }
        }

        if($content_type == "features" || $content_type == "feature"){
            $feature_article = rwmb_meta('feature_article_group', array(), $page_id);
            if($feature_article){
                $sub_category = get_term_by('id', $feature_article["fa_category"], 'feature')->name ?? '';
            }
        }

        if($content_type == "press"){
            $press = rwmb_meta('press_group', array(), $page_id);
            if($press){
                $sub_category = get_term_by('id', $press["press_category"] , 'press')->name ?? '';
            }
        }

        if($content_type == "resources" || $content_type == "resource"){
            $download = rwmb_meta('download', array(), $page_id);
            if($download){
                $sub_category = get_term_by('id', $download["download_category"], 'resource')->name ?? '';
            }
        }

        return $sub_category;
    } 

    //
    function in_words($num){
        $output = "";

        switch($num) {
            case "1": $output = "One";
            break;
            case "2": $output = "Two";
            break;
            case "3": $output = "Three";
            break;
            case "4": $output = "Four";
            break;
            case "5": $output = "Five";
            break;
            case "6": $output = "Six";
            break;
            case "7": $output = "Seven";
            break;
            case "8": $output = "Eight";
            break;
            case "9": $output = "Nine";
            break;
            case "10": $output = "Ten";
            break;
            default: $output="";
        }

        return $output;
    }

    /* 
        Function to validate user inputs
    */
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


     // Includes process functions
     include_once('process.php');

    //  Hook to populate gravity form field with a post-type
    add_filter( 'gform_pre_render_2', 'populate_posts' );
    add_filter( 'gform_pre_validation_2', 'populate_posts' );
    add_filter( 'gform_pre_submission_filter_2', 'populate_posts' );
    add_filter( 'gform_admin_pre_render_2', 'populate_posts' );
    function populate_posts( $form ) {
        // Select field
        foreach ( $form['fields'] as &$field ) {
    
            if ( $field->type != 'select' || strpos( $field->cssClass, 'offers' ) === false ) {
                continue;
            }
    
            // you can add additional parameters here to alter the posts that are retrieved
            // more info: http://codex.wordpress.org/Template_Tags/get_posts
            $posts = get_posts( 'post_type=offer&numberposts=-1&post_status=publish' );
    
            $choices = array();
    
            foreach ( $posts as $post ) {
                $choices[] = array( 'text' => $post->post_title, 'value' => $post->post_title );
            }
    
            // update 'Select a Post' to whatever you'd like the instructive option to be
            $field->placeholder = 'Select an offer';
            $field->choices = $choices;
    
        }
    
        return $form;
    }

    add_filter( 'gform_pre_render_2', 'populate_posts_checkbox' );
    add_filter( 'gform_pre_validation_2', 'populate_posts_checkbox' );
    add_filter( 'gform_pre_submission_filter_2', 'populate_posts_checkbox' );
    add_filter( 'gform_admin_pre_render_2', 'populate_posts_checkbox' );
    function populate_posts_checkbox( $form ) {
        // checkbox
        foreach ( $form['fields'] as &$field ) {
    
            if ( $field->type != 'checkbox' || strpos( $field->cssClass, 'services' ) === false ) {
                continue;
            }
    
            // you can add additional parameters here to alter the posts that are retrieved
            // more info: http://codex.wordpress.org/Template_Tags/get_posts
            $posts = get_posts( 'post_type=service&numberposts=-1&post_status=publish' );
    
            $input_id = 1;
            foreach( $posts as $post ) {
     
                //skipping index that are multiples of 10 (multiples of 10 create problems as the input IDs)
                if ( $input_id % 10 == 0 ) {
                    $input_id++;
                }
     
                $choices[] = array( 'text' => $post->post_title, 'value' => $post->post_title );
                // $inputs[] = array( 'label' => $post->post_title, 'id' => "{$field_id}.{$input_id}" );
                $inputs[] = array( 'label' => $post->post_title, 'id' => "{$field->id}.{$input_id}" );
     
                $input_id++;
            }
     
            $field->choices = $choices;
            $field->inputs = $inputs;
    
        }
    
        return $form;
    }

     /* 
     * Sendey Mail Bos functions
     */
 
     // Add user to product list
     function add_user_to_list($n, $e, $l){
         $your_installation_url = 'http://diberrmail.com/'; //Your Sendy installation (without the trailing slash)
        //  $api_key = 'Agdj7ShAltowiN2TGli6'; //Can be retrieved from your Sendy's main settings
        $api_key = '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';
 
         $name = $n;
         $email = $e;
         $list = $l;
 
         //Check fields
         if($name=='' || $email=='' || $list=='')
         {
             echo 'Please fill in all fields';
             exit;
         }
 
         //Subscribe
         $postdata = http_build_query(
             array(
             'name' => $name,
             'email' => $email,
             'list' => $list,
             'api_key' => $api_key,
             'boolean' => 'true'
             )
         );
         
         $opts = array('http' => array('method'  => 'POST', 'header'  => 'Content-type: application/x-www-form-urlencoded', 'content' => $postdata));
         $context  = stream_context_create($opts);
         $result = file_get_contents($your_installation_url.'/subscribe', false, $context);
         
         //check result and redirect
         if($result){
             return $result;
         }
     }