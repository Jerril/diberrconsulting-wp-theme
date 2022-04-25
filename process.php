<?php
    // Subscribe to newsletter
    if(isset($_POST['subscribe-to-newsletter'])){
        $result = 1;
        $name = "subscriber".rand();
        $email = test_input($_POST['email']);
        $list = 'qs8763VfSJcpku6x4EQy9xGw';

        $result = add_user_to_list($name,$email,$list);
        if($result == 1){
            // Load Subscription successfull modal
            $url = site_url('/info');
            wp_redirect($url);
            exit();
        }else{
            $url = site_url('/info?msg=error');
            wp_redirect($url);
            exit();
        }
    }

?>