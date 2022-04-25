<nav class="navbar d-flex justify-content-between topnav navbar-expand-lg navbar-light p-0 m-0">
    <div class="logoimage mt-3 ml-3 pl-2">
    <a href="<?php echo site_url(); ?>">
        <img src="<?php echo $dark_logo['url']; ?>" alt="diberr consulting logo" class="img-fluid" />
    </a>
    </div>

    <button class="navbar-toggler mt-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <a class="btn-mobile-open" href="javascript:void(0)"><i class="fas fa-bars text-white"></i></a>
    </button>

    <div class="navbar-collapse" id="navbarSupportedContent">
    <div class="navcontentslargescreen w-100 d-flex flex-row justify-content-end align-items-center">
        <ul class="mb-0 mt-2 d-flex justify-content-between navcontents">
        <?php
            foreach($header_nav_links as $hnl){ 
                $label = $hnl['hn_nav_label'] ?? '';
                $pagetype = $hnl['hn_pagetype'] ?? '';
                $new_tab = $hnl['hn_open_new_tab'] ?? '';

                // get the link url
                $href="#";
                if($pagetype == "url"){
                    $href = $hnl['hn_url'] ?? '';
                }elseif($pagetype == "site-page"){
                    $href = $hnl['hn_sitepage'] ?? '';
                    $href = get_permalink($href);
                }elseif($pagetype == "service"){
                    $href = $hnl['hn_servicepost'] ?? '';
                    $href = get_permalink($href);
                }elseif($pagetype == "content"){
                    $href = $hnl['hn_contentpost'] ?? '';
                    $href = get_permalink($href);
                }
                ?>
                <li class=""><a href="<?php echo $href; ?>" class="primarycolor" target="<?php echo $new_tab == "yes"?"_blank":""; ?>"><?php echo $label; ?></a></li>
            <?php }
        ?>
        </ul>

        <div class="buttoncontent d-flex justify-content-end">
        <a href="<?php echo $highlight_link['hhu_url']; ?>">
            <button class="btn reachoutbtn2 text-white py-2 mt-2">
            <?php echo $highlight_link['hhu_label']; ?>
            </button>
        </a>
        </div>
    </div>
    <!-- <ul class="navbarmobile">
        <div class="navitemdropdownspacing w-100">
        <ul class="navitem w-100">
            <ul class="mb-0 mt-2 d-flex flex-column">
            <li class="listmobile">
                <a href="#"
                ><div
                    class="
                    d-flex
                    justify-content-end
                    text-light
                    navbaritemsmobile
                    border-bottom
                    py-3
                    "
                >
                    <p class="mb-0">Digital Audit</p>
                </div></a
                >
            </li>
            <li class="listmobile">
                <a href="#"
                ><div
                    class="
                    d-flex
                    justify-content-end
                    text-light
                    navbaritemsmobile
                    border-bottom
                    py-3
                    "
                >
                    <p class="mb-0">How We help</p>
                </div></a
                >
            </li>
            <li class="listmobile">
                <a href="#"
                ><div
                    class="
                    d-flex
                    justify-content-end
                    text-light
                    navbaritemsmobile
                    border-bottom
                    py-3
                    "
                >
                    <p class="mb-0">Resources</p>
                </div></a
                >
            </li>
            <li class="listmobile">
                <a href="#"
                ><div
                    class="
                    d-flex
                    justify-content-end
                    text-light
                    navbaritemsmobile
                    border-bottom
                    py-3
                    "
                >
                    <p class="mb-0">Academy</p>
                </div></a
                >
            </li>
            </ul>
        </ul>
        </div>
    </ul> -->
    </div>
</nav>