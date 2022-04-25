<?php include_once("site-info.php"); ?>

<?php get_header(); ?>

<?php include "sidebar.php"; ?>

<?php
  // site info metas - contact page
  $contact_page = get_posts(array("name"=>"contact", "post_type"=>"page", "numberposts"=>'1'));
  $cp_id = $contact_page[0]->ID;

  $address = rwmb_meta('address', array(), $cp_id);
  $contact_form = rwmb_meta('contact_form', array(), $cp_id);
?>

      <!-- main page content -->
      <div class="main-page-content">
        <div class="mt-0 pt-0">
          <div class="container-fluid mx-3 mx-md-5">
            
            <!-- HEADER NAVIGATION -->
            <?php include 'templates-parts/header-nav-blue.php'; ?>
            <!-- END-HEADER NAVIGATION -->
            
            <div class="mx-md-5 mx-3 px-md-5 px-0">
              <div class="row ml-0 pl-0 mt-lg-5 dottedborderbottom pb-5">
                <div class="">
                  <h2
                    class="mainheader2 lightbold primarycolor pb-3 col-lg-12 px-0 mt-5 mt-md-0">
                    <?php echo $address['address_sub_title']; ?>
                  </h2>
                </div>
                <div class="w-100 px-md-0">
                  <div class="mt-3 p-0">
                    <div class="justify-content-between globalborderbottom pb-3">
                      <div class="row ml-0 pl-0 mt-1">
                        <?php 
                          $add1 = $address['contact_info'][0] ?? '';
                          $add2 = $address['contact_info'][1] ?? '';
                        ?>
                        <!-- address 1 -->
                        <div class="col-12 col-sm-6 col-lg-5 mb-3 mb-lg-0 p-0 m-0">
                          <div class="mt-1">
                            <div class="mainheader3 lightbold primarycolor">
                              <?php echo $add1['contact_title'] ?? ''; ?>
                            </div>
                          </div>
                          <div class="py-3">
                            <p class="generalparagraph w-75">
                              <?php
                                $lines = $add1['add_line'] ?? ''; 
                                echo $lines[0]."<br>".$lines[1];                         
                              ?>
                            </p>
                          </div>
                          <a href="learning@diberracademy.com" class="generalparagraph text-dark">
                            <?php echo $lines[2] ?? ''; ?>
                          </a>
                        </div>
                        <!-- end-address 1 -->
                        <!-- address 2 -->
                        <div class="col-12 col-sm-6 col-lg-5 mb-3 mb-lg-0 p-0 m-0">
                          <div class="mt-1">
                            <div class="mainheader3 lightbold primarycolor">
                              <?php echo $add2['contact_title'] ?? ''; ?>
                            </div>
                          </div>
                          <div class="py-3">
                            <p class="generalparagraph w-75">
                                <?php
                                  $lines = $add2['add_line'] ?? ''; 
                                  echo $lines[0]."<br>".$lines[1];                         
                                ?>
                            </p>
                          </div>
                          <a href="learning@diberracademy.com" class="generalparagraph text-dark">
                            <?php echo $lines[2] ?? ''; ?>
                          </a>
                        </div>
                        <!-- end-address 2 -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pb-5">
                <div class="bottommiddlerow">
                  <div class="py-4">
                    <h2 class="mainheader2 lightbold primarycolor">
                      <?php echo $contact_form['cf_sub_title'] ?? ''; ?>
                    </h2>
                    <p class="lightmainparagraph w-75">
                      <?php echo $contact_form['cf_section_blurb'] ?? ''; ?>
                    </p>
                  </div>
                  <!-- <form class="middlerowform">
                    <div class="form-row mt-4">
                      <div class="form-group col-md-6">
                        <label for="companyname" class="merriparagraph">
                          Company Name
                        </label>
                        <input
                          type="text"
                          class="form-control generalparagraph"
                          placeholder="Name of your company"
                        />
                      </div>
                      <div class="form-group col-md-6">
                        <label for="companyname" class="merriparagraph">
                          Location
                        </label>
                        <input
                          type="text"
                          class="form-control generalparagraph"
                          placeholder="Country, State/Province"
                        />
                      </div>
                    </div>
                    <div class="form-row mt-4">
                      <div class="form-group col-md-6">
                        <label for="companyname" class="merriparagraph">
                          Name of Contact Person
                          </label>
                        <input
                          type="text"
                          class="form-control generalparagraph"
                          placeholder="First Name"
                        />
                      </div>
                      <div class="form-group col-md-6">
                        <label for="companylocation" class="merriparagraph"></label>
                        <input
                          type="text"
                          class="form-control generalparagraph mt-lg-2"
                          placeholder="Last Name"
                        />
                      </div>
                    </div>
                    <div class="form-row mt-4">
                      <div class="form-group col-md-6">
                        <label for="companyname" class="merriparagraph">Telephone Number</label>
                        <input
                          type="text"
                          class="form-control generalparagraph"
                          placeholder="Please, add country code"
                        />
                      </div>
                      <div class="form-group col-md-6">
                        <label for="" class="merriparagraph">Email</label>
                        <input
                          type="text"
                          class="form-control generalparagraph"
                          placeholder="Enter your email Address"
                        />
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-12 mt-lg-4">
                        <label for="" class="merriparagraph">Select Special Offer</label>
                        <div class="alignicons">
                          <select id="inputState" class="secondaryinput form-control select topselect">
                            <option selected>
                              Coming from offer post type
                            </option>
                            <option>Hub level</option>
                            <option>Asset level</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group ml-0 pl-0 mt-md-3">
                      <div class="form-group col m-0 pl-0 pl-md-0">
                        <label for="" class="d-block generalparagraph">What services can we provide you ?</label>
                        <div class="row mt-3">
                          <div class="col-md-4 col-6 my-2 my-md-0">
                            <div class="form-check py-2">
                              <label
                                class="form-check-label generalparagraph"
                                for="check1"
                              >
                                <input
                                  type="radio"
                                  class="
                                    form-check-input
                                    greycheckbox
                                    generalparagraph
                                  "
                                  name=""
                                  id="check1"
                                  value="checkedValue1"
                                  checked
                                />
                                Web Design
                              </label>
                            </div>
                            <div class="form-check py-2">
                              <label class="form-check-label generalparagraph">
                                <input
                                  type="radio"
                                  class="
                                    form-check-input
                                    greycheckbox
                                    generalparagraph
                                  "
                                  name=""
                                  id=""
                                  value="checkedValue"
                                />
                                Web Design
                              </label>
                            </div>
                            <div class="form-check py-2">
                              <label class="form-check-label generalparagraph">
                                <input
                                  type="radio"
                                  class="
                                    form-check-input
                                    greycheckbox
                                    generalparagraph
                                  "
                                  name=""
                                  id=""
                                  value="Value"
                                />
                                Web Design
                              </label>
                            </div>
                            <div class="form-check py-2">
                              <label class="form-check-label generalparagraph">
                                <input
                                  type="radio"
                                  class="
                                    form-check-input
                                    greycheckbox
                                    generalparagraph
                                  "
                                  name=""
                                  id=""
                                  value="checkedValue"
                                />
                                Web Design
                              </label>
                            </div>
                          </div>
                          <div class="col-md-4 col-6 my-2 my-md-0">
                            <div class="form-check py-2">
                              <label class="form-check-label generalparagraph">
                                <input
                                  type="radio"
                                  class="
                                    form-check-input
                                    greycheckbox
                                    generalparagraph
                                  "
                                  name=""
                                  id=""
                                  value="checkedValue"
                                  checked
                                />
                                Web Design
                              </label>
                            </div>
                            <div class="form-check py-2">
                              <label class="form-check-label generalparagraph">
                                <input
                                  type="radio"
                                  class="
                                    form-check-input
                                    greycheckbox
                                    generalparagraph
                                  "
                                  name=""
                                  id=""
                                  value="checkedValue"
                                />
                                Web Design
                              </label>
                            </div>
                            <div class="form-check py-2">
                              <label class="form-check-label generalparagraph">
                                <input
                                  type="radio"
                                  class="
                                    form-check-input
                                    greycheckbox
                                    generalparagraph
                                  "
                                  name=""
                                  id=""
                                  value="Value"
                                />
                                Web Design
                              </label>
                            </div>
                            <div class="form-check py-2">
                              <label class="form-check-label generalparagraph">
                                <input
                                  type="radio"
                                  class="
                                    form-check-input
                                    greycheckbox
                                    generalparagraph
                                  "
                                  name=""
                                  id=""
                                  value="checkedValue"
                                />
                                Web Design
                              </label>
                            </div>
                          </div>
                          <div class="col-md-4 col-6 my-2 my-md-0">
                            <div class="form-check py-2">
                              <label class="form-check-label generalparagraph">
                                <input
                                  type="radio"
                                  class="
                                    form-check-input
                                    greycheckbox
                                    generalparagraph
                                  "
                                  name=""
                                  id=""
                                  value="checkedValue"
                                  checked
                                />
                                Web Design
                              </label>
                            </div>
                            <div class="form-check py-2">
                              <label class="form-check-label generalparagraph">
                                <input
                                  type="radio"
                                  class="
                                    form-check-input
                                    greycheckbox
                                    generalparagraph
                                  "
                                  name=""
                                  id=""
                                  value="checkedValue"
                                />
                                Web Design
                              </label>
                            </div>
                            <div class="form-check py-2">
                              <label class="form-check-label generalparagraph">
                                <input
                                  type="radio"
                                  class="
                                    form-check-input
                                    greycheckbox
                                    generalparagraph
                                  "
                                  name=""
                                  id=""
                                  value="Value"
                                />
                                Web Design
                              </label>
                            </div>
                            <div class="form-check py-2">
                              <label
                                class="
                                  form-check-label
                                  generalparagraph
                                  darkcolor2
                                "
                              >
                                <input
                                  type="radio"
                                  class="
                                    form-check-input
                                    greycheckbox
                                    generalparagraph
                                  "
                                  name=""
                                  id=""
                                  value="checkedValue"
                                />
                                Web Design
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group col-12 p-0 m-0 mt-lg-4">
                      <label for="attendeestextarea" class="merriparagraph"
                        >Your Message</label
                      >
                      <textarea
                        class="form-control"
                        id="attendeestextarea"
                        rows="10"
                        placeholder="Tell us what you would like the program to cover."
                      ></textarea>
                    </div>

                    <button class="mt-3 btn enquirebtnsmaller py-2">
                      Enquire Now
                    </button>
                  </form> -->
                  <?php echo do_shortcode("[gravityform id='2' title='false' description='false' ajax='false']"); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- footer -->
        <?php include 'templates-parts/page-footer.php'; ?>
      </div>

<?php get_footer(); ?>