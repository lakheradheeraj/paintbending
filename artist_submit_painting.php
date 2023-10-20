<?php $CI = &get_instance(); ?>


<div class="request-detail mb-5 p-4">
  <p class="description-details m-0"><b>Title :</b>
    <?php if (isset($request_data[0]->painting_title)) {
      echo ucfirst($request_data[0]->painting_title);
    } ?>
  </p>
  <p class="description-details m-0 pt-0"><b>Tag :</b>
    <?php if (isset($request_data[0]->tag)) {
      echo ucfirst($request_data[0]->tag);
    } ?>
  </p>

  <h1 class="edit-heading"><b>Script</b></h1>
  <div class="form-group mt-4">
    <label class="p-0">Process how painting should be created </label>
  </div>
  <div class="form-group mt-4">


    <div class="row align-items-center">
      <div class="col-12 col-lg-12">
        <div class="form-group ">



          <?php
          if (!empty($request_data[0]->script)) {
            $script = explode(",", $request_data[0]->script);

            foreach ($script as $val) {

              $value = str_replace('[', "", "$val");
              $value1 = str_replace('"', "", "$value");
              $value2 = str_replace(']', "", "$value1");

              $input_text = $value2;
              $color_pattern = "/#([0-9a-fA-F]{6})/";
              preg_match_all($color_pattern, $input_text, $matches);
              $data['color_codes'] = $matches[0];
              $cleaned_text = preg_replace($color_pattern, '', $input_text);


              ?>

              <div class="d-flex reuestform-script">
                <p class="paint-process">
                  <?php if (isset($cleaned_text)) {
                    ?>
                    <?php
                    $result = substr($cleaned_text, 0, 6);
                    if ($result == 'PB2023') {


                      $desc = "description";
                    } else {
                      $desc = "";
                    }

                    $cleaned_data = str_replace('~', ',', $cleaned_text);
                    $cleaned_result = str_replace('PB2023', '', $cleaned_data)
                      //print_r($data);
              
                      ?>
                  </p>
                  <span class="<?php echo $desc; ?>">
                    <?php echo ucfirst($cleaned_result); ?>
                    <?php echo "&nbsp"; ?>
                  </span>
                  <div class="color-box" style="width: 30px; height: 30px; background-color: <?php if (isset($data['color_codes'][0])) {
                    echo $data['color_codes'][0];
                  } ?>; ">
                  </div>

                  <?php echo "&nbsp"; ?>
                  <span class="">
                    <?php if (isset($data['color_codes'][0])) {
                      echo $data['color_codes'][0];
                    } ?>
                    <?php echo "&nbsp"; ?>
                  </span>

                  <div class="color-box" style="width: 30px; height: 30px; background-color: <?php if (isset($data['color_codes'][1])) {
                    echo $data['color_codes'][1];
                  } ?>; ">
                  </div>
                  <?php echo "&nbsp"; ?>
                  <span class="">
                    <?php if (isset($data['color_codes'][1])) {
                      echo $data['color_codes'][1];
                    } ?>
                  </span>
                <?php }
                  ?>
              </div>
              <br>


              <?php

            }
          } ?>




        </div>
      </div>
    </div>
  </div>
  <!-- <div class="request-detail mb-5 p-5">
    <h1 class="edit-heading"><b>Canvas Image</b></h1>
    <img src="<? php // echo base_url(); ?>/assets/canvas_image/<? php // if(isset($request_data[0]->canvas_image)){ echo $request_data[0]->canvas_image;} ?>" alt="">
  </div> -->
  <?php $CI = &get_instance();
  $photos = $CI->get_painting_artist($this->uri->segment(2));

  if (!empty($photos[0]->reviews)) {
    ?>
    <div class="review-section  mt-5 mb-5">
      <h3 class="  section-heading"><b style="font-size: 30px;"> Review</b><br>
      <span class="star-icons align-top"><?php
                                $stars = $photos[0]->rating;
                                $rem_stars = 5 - $stars;

                                ?>

                                <span class="rating-star">
                                    <?php
                                    for ($i = 1; $i <= $stars; $i++) { ?>
                                        <i class="bi bi-star-fill text-warning star-icon ms-0"></i>
                                    <?php }
                                    for ($i = 1; $i <= $rem_stars; $i++) {
                                        
                                        ?>
                                        <i class="bi bi-star star-icon ms-0"></i>
                                    <?php } ?>
                                </span>
                                </span>
        </h3>
        <h3><p class="p-details p-0">
             <?php echo $photos[0]->reviews; ?>
                </p></h3>
    </div>
  <?php } ?>
  <div class="request-detail-slider card ">
    <div class="row align-items-center">

      <div class="draw-section mt-3">
        <?php if ($this->session->flashdata('success')) { ?>
          <p class=" time text-success alert-dismissable">
            <?php echo $this->session->flashdata('success'); ?>
          </p>
        <?php } ?>
        <?php if ($this->session->flashdata('error')) { ?>
          <p class=" time text-danger alert-dismissable">
            <?php echo $this->session->flashdata('error'); ?>
          </p>
        <?php } ?>
        <form action="<?php echo base_url(); ?>submit_artist_painting/<?php echo $this->uri->segment(2); ?>"
          method="POST" enctype="multipart/form-data" class="needs-validation">
          <h4 class="pt-0 pb-4"> Painting Image</h4>
          <?php


          $data = explode(',', $photos[0]->sub_by_artist);
          // print_r($data);
          foreach ($data as $val) {

            if (!empty($val)) {
              ?>

              <span class="add-painting-img position-relative">
                <img class="ms-0 me-2" src="<?php echo base_url(); ?>/assets/artist_paintings/<?php echo $val; ?>" alt=""
                  width="200" height="150">

              </span>


            <?php }
          } ?>
          <div class="add-image mt-3 text-center">
            <div class="upload-box pb-4">
              <span><img src="<?php echo base_url(); ?>assets/images/upload-btn.png" alt="Upload Image"></span>
              <label for="validationCustom04" class="btn btn-primary">Upload image</label>
              <input type="file" id="validationCustom04" name="image[]" multiple class="form-control">
              <input type="hidden" name="id" value="<?php echo $this->uri->segment(2); ?>">
              <div class="invalid-feedback error">
                Painting image is required.
              </div>
              <div id="imgname" style="text-align: center;"></div>
            </div>
          </div>
          <div class="button-sec m-5 text-center">
            <button type="submit" class="btn btn-primary upload-btn">Submit</button>
          </div>
        </form>

      </div>

    </div>


    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://kenwheeler.github.io/slick/slick/slick.js"></script>






    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content position-relative">

          <!-- <div class="text-end">  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">  <img src="https://influocial.co/staging-pb/assets/images/close (4).png" alt=""></button></div> -->

          </button>
        </div>



        <!-- <img class="w-100" src="https://influocial.co/staging-pb/assets/customer_image/image.jpg"> -->
      </div>

    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    $('#validationCustom04').on('change', function () {
      var fileName = [];
      $.each(this.files, function (index, file) {
        fileName.push(file.name);
      });
      $('#imgname').text(fileName.join(', ') || 'No files selected');
    });

  });
</script>
<script>
  var timeout = 3000;

  $('.time').delay(timeout).fadeOut('slow');
</script>