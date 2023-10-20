<style>
.rating {
    unicode-bidi: bidi-override;
    direction: rtl;
    text-align: left;
    position: relative;
    display: inline-block;
}

.star {
    color: gray;
    cursor: pointer;
    font-size: 30px;
    padding: 5px;
}

.star.active {
    color: gold;
}

</style>

<?php $CI  = &get_instance();

?>


<div class="request-detail mb-5 p-4">
  <p class="description-details m-0"><b>Title :</b><?php if (isset($request_data[0]->painting_title)) {
                                                      echo $request_data[0]->painting_title;
                                                    } ?></p>
  <p class="description-details m-0 pt-0"><b>Tag :</b><?php if (isset($request_data[0]->tag)) {
                                                        echo $request_data[0]->tag;
                                                      } ?> </p>

  <h1 class="edit-heading"><b>Script</b></h1>
  <div class="form-group">
    <label class="pb-0">Process how painting should be created </label>
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
                <span class="<?php echo $desc; ?>"><?php echo ucfirst($cleaned_result); ?> <?php echo "&nbsp"; ?> </span>
                <div class="color-box" style="width: 30px; height: 30px; background-color: <?php if (isset($data['color_codes'][0])) {
                                                                                              echo $data['color_codes'][0];
                                                                                            } ?>; ">
                </div>

                <?php echo "&nbsp"; ?>
                <span class="">
                  <?php if (isset($data['color_codes'][0])) {
                      echo $data['color_codes'][0];
                    } ?> <?php echo "&nbsp"; ?>
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


          <?php  }
          } ?>




        </div>
      </div>
    </div>
  </div>
  <div class="request-detail mb-5 p-5">
    <h1 class="edit-heading"><b>Canvas Image</b></h1>
    <img src="<?php echo base_url(); ?>/assets/canvas_image/<?php if (isset($request_data[0]->canvas_image)) {
                                                              echo $request_data[0]->canvas_image;
                                                            } ?>" alt="">
  </div>
  <?php
  $artistID = explode(",", $request_data[0]->selected_artist);
  
  

  if (!empty($artistID)) {?>




<?php foreach($artistID as $id){ 
  
  $getartist_name = $CI->getartist_name($id);
  //print_r($id);
  if(!empty($getartist_name))
  {
    $artist_profile_image = $getartist_name[0]->profile_image;
  }
     $temp_id = $this->uri->segment(2);
    $submitimgdata = $CI->submitimgdata($temp_id, $id);
    // echo "<pre>";
    // print_r($submitimgdata);
    if(!empty($submitimgdata))
    {
      $artist_images = explode(",", $submitimgdata[0]->sub_by_artist);
     // print_r($artist_images);
      $num_of_images = count($artist_images);
    }
    
    
   
   
   
  ?>
      <?php if(!empty($artist_images[0])){ ?>
       <div class="request-detail-slider card mt-4">
        <div class="row align-items-center">
          <div class="col-sm-2">
            <div class="">
              <img class="request-detail-profile" src="<?php echo base_url(); ?>assets/artist_image/<?php if(!empty($getartist_name[0])) { echo $artist_profile_image;} ?>">

              <h4><?php if (!empty($getartist_name)) echo $getartist_name[0]->artist_fname; ?> <?php if (!empty($getartist_name)) { echo $getartist_name[0]->artist_lname; } ?></h4>
            </div>
          </div>
          <div class="col-sm-10">
            <?php 
            
            if ( $num_of_images == 1) {
              foreach ($artist_images as $images) { ?>
                <div class="slider-image-canvas" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php// echo $id; ?>"> <a href ="<?php echo base_url(); ?>assets/artist_paintings/<?php echo $images; ?>" class="bg-none" target="_blank"><img  style="width: 300px;" src="<?php echo base_url(); ?>assets/artist_paintings/<?php echo $images; ?>"></a> </div>
              <?php }
            } else { ?>
              <div class="slick-slider3">
  <!-- <button class="slick-prev slick-arrow border-0 slickbtn3" aria-label="Previous" type="button"><img class="pre-img" src="https://influocial.co/staging-pb/assets/images/Group 2422.png" alt=""></button>
   <button class="slick-next slick-arrow border-0 slickbtn3" aria-label="Next" type="button"><img class="next-img" src="https://influocial.co/staging-pb/assets/images/Group 2782.png" alt=""></button> -->

                <?php foreach ($artist_images as $images) { // print_r($images);
                ?>
                  <div class="slider-image-canvas" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php //echo $id; ?>"> <a href ="<?php echo base_url(); ?>assets/artist_paintings/<?php echo $images; ?>" class="bg-none" target="_blank"> <img src="<?php echo base_url(); ?>assets/artist_paintings/<?php echo $images; ?>"> </a> </div>

                <?php } ?>
              </div>
            <?php } ?>
          </div>

        </div>


        <?php
       // print_r($submitimgdata[0]->reviews);
        if (empty($submitimgdata[0]->reviews)) {
        ?>
           <div>
           <?php //echo $id; ?>
            <div class="text-end" data-bs-toggle="modal" data-bs-target="#review-<?php echo $id; ?>"><button class="btn btn-primary ">Submit Review</button></div>
          
          </div>
        <?php  }
        else
        {?>
        <?php //echo $id; ?>
        <div class="row align-items-center justify-content-end">
   <div class="submit-btn col-sm-3">
            <div class="text-end" data-bs-toggle="modal" data-bs-target="#reviewsubmitted"><button class="btn btn-primary">Review Submitted</button></div>
            <div class="submited-review ">
           <?php 
            $all_stars = 5;
            $stars = intval($submitimgdata[0]->rating);
            $rem_stars = $all_stars -  $stars;
           
           ?>
            <span class="rating-star">
              <?php 
              for($i=1;$i<= $stars ;$i++)
              {?>
                <i class="bi bi-star-fill text-warning star-icon"></i>
            <?php } 
          
              for($i=1;$i<= $rem_stars ;$i++)
              {
              ?>
                <i class="bi bi-star star-icon"></i>
           <?php } ?>
                        
                        <!-- <i class="bi bi-star star-icon"></i>
                        
                        <i class="bi bi-star star-icon"></i>
                        <i class="bi bi-star star-icon"></i> -->
                    </span>
                    <p class="p-details p-0"> <?php echo $submitimgdata[0]->reviews; ?> </p>
            </div>
          </div>
          </div>
       <?php } ?>
      </div>
    
    <?php }?>
  
    <div class="modal fade" id="review-<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content position-relative">

      <!-- <div class="text-end">  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">  <img src="https://influocial.co/staging-pb/assets/images/close (4).png" alt=""></button></div> -->
     
      <div class="modal-body">
      <?php //echo $id; ?>
        <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner">
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
            <form action="<?php echo base_url() ?>submitreview/<?php echo $this->uri->segment(2); ?>" id="reviewForm" method="post">
            <div class="share-review">
                    <p class="p-details"><b>Share Your Review</b></p>
                    <div class="write-review">
                        <textarea id="write_review" class="form-control border-dark" name="write_review" id="write_review" required></textarea>
                    </div>



                    <div class="form-group">

                        <input type="hidden" class="form-control" name="artist_id" value="<?php echo $id ?>">
                    </div>
                   
                    <p class="p-details p-0 mb-0"><b>Give a rating</b></p>
                    <span class="rating-star">
                      <i class="bi bi-star-fill star-icon artist-<?php echo $id; ?>" data-rating="1"></i>
                      <i class="bi bi-star-fill star-icon artist-<?php echo $id; ?>" data-rating="2"></i>
                      <i class="bi bi-star-fill star-icon artist-<?php echo $id; ?>" data-rating="3"></i>
                      <i class="bi bi-star-fill star-icon artist-<?php echo $id; ?>" data-rating="4"></i>
                      <i class="bi bi-star-fill star-icon artist-<?php echo $id; ?>" data-rating="5"></i>
                    </span>
                    <input type="hidden" name="stars" id="star<?php echo $id; ?>">

                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>

            </form>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://kenwheeler.github.io/slick/slick/slick.js"></script>
<script>

$(document).ready(function () 
{
  var id = <?php echo $id; ?>;
    $('.star-icon.artist-' + id).click(function () {
        var clickedStars = $(this).index() + 1; 
        console.log('Clicked Stars:', clickedStars);
        $('#star' + id).val(clickedStars);
        console.log('star-rt Value:', $('#star').val());
        $('.star-icon').removeClass('text-warning');
        $(this).prevAll('.star-icon').addBack().addClass('bi-star-fill text-warning');
    });

});

</script> 

<script>
 
</script>
  


  
  <?php }} ?>


</div>




<script>
  $(document).ready(function() {
    $('.slick-slider3').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      arrows: true,
      dots: true,
      infinite: false,
      prevArrow: '   <button class="slick-prev slick-arrow border-0 slickbtn3" aria-label="Previous" type="button"><img class="pre-img" src="https://influocial.co/staging-pb/assets/images/Group 2422.png" alt=""></button>',
      nextArrow: '   <button class="slick-next slick-arrow border-0 slickbtn3" aria-label="Next" type="button"><img  class="next-img" src="https://influocial.co/staging-pb/assets/images/Group 2782.png" alt=""></button>',

      responsive: [
        {
        breakpoint: 1599,
        settings: {
          slidesToShow:2,
        }
      },
        {
        breakpoint: 1399,
        settings: {
          slidesToShow:3,
        }
      },
        {
        breakpoint:1199,
        settings: {
          slidesToShow:2,
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow:2,
        }
      },
      {
        breakpoint:768,
        settings: {
          slidesToShow:1,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
    });
  });
</script>

<!-- Modal -->
<?php


foreach($artistID as $id){
  $artistID = explode(",", $request_data[0]->selected_artist);
  $getartist_name = $CI->getartist_name($id);
  if(!empty($getartist_name))
  {
    $artist_profile_image = $getartist_name[0]->profile_image;
  }
  $temp_id = $this->uri->segment(2);
  // $submitimgdata = $CI->submitimgdata( $id);

  $submitimgdata = $CI->submitimgdata($temp_id, $id);
if(!empty($submitimgdata[0]))
{
  $artist_images = explode(",", $submitimgdata[0]->sub_by_artist);
}
   
  
  ?>
<div class="modal fade" id="exampleModal-<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content position-relative">

      <!-- <div class="text-end">  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">  <img src="https://influocial.co/staging-pb/assets/images/close (4).png" alt=""></button></div> -->

      <div class="modal-body">
        <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner">
            <?php foreach ($artist_images as $images) { // print_r($images); 
            ?>
              <div class="carousel-item active">
                <img src="<?php echo base_url(); ?>/assets/artist_paintings/<?php echo $images; ?>">
              </div>
            <?php } ?>

          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><img class="pre-img" src="https://influocial.co/staging-pb/assets/images/Group 2422.png" alt=""></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><img class="next-img" src="https://influocial.co/staging-pb/assets/images/Group 2782.png" alt=""></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>



        <!-- <img class="w-100" src="https://influocial.co/staging-pb/assets/customer_image/image.jpg"> -->
      </div>

    </div>
  </div>
</div>

<?php } ?>


<!-- // Review modal -->
<?php


foreach($artistID as $id){
 // print_r($id);
  // $artistID = explode(",", $request_data[0]->selected_artist);
  $getartist_name = $CI->getartist_name($id);
 if(!empty($getartist_name))
 {
  $artist_profile_image = $getartist_name[0]->profile_image;
 }
 $temp_id = $this->uri->segment(2);
 // $submitimgdata = $CI->submitimgdata( $id);
  $submitimgdata = $CI->submitimgdata($temp_id, $id);
  if(!empty($submitimgdata))
  {
    $artist_images = explode(",", $submitimgdata[0]->sub_by_artist);
  }


  
  ?>
<!-- Modal -->

<?php }?>







<script>
  var timeout = 3000;

  $('.time').delay(timeout).fadeOut('slow');
</script>











