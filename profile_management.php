<?php $CI  = &get_instance(); ?>


<?php if ($this->session->flashdata('success')) { ?>
    <!-- <p style="color:green"><?php // echo $this->session->flashdata('success');
                                ?></p>	 -->
    <p class=" time text-success alert-dismissable"><?php echo $this->session->flashdata('success'); ?></p>
<?php } ?>

<!--error message -->
<?php if ($this->session->flashdata('error')) { ?>
    <p class="time text-danger alert-dismissable"><?php echo $this->session->flashdata('error'); ?></p>
<?php } ?>





<div class="artist-info  mt-0">
    <div class="w-100 position-relative" style="height: 222px">
        <img class="w-100 nature-img" style='height: 100%; width: 100%; object-fit: cover; overflow: hidden;' src="<?php echo base_url('/assets/artist_image/');
                                                                                                                    echo $artistInfo[0]->profile_cover  ?>" alt="">
        <div class="cover-btn"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editcoverprofileModal">Update Cover</button></div>
    </div>
    <div class="Artist-Detail position-relative">
        <div class="detail-text d-flex ">
          
            <img  src="<?php echo base_url('/assets/artist_image/'); echo $artistInfo[0]->profile_image  ?>" alt="">
            <div class="detail-box">
                <h1 class="edit-heading pb-2"><b><?php if (isset($artistInfo[0]->artist_fname)) {
                                                        echo $artistInfo[0]->artist_fname;
                                                    } ?> <?php if (isset($artistInfo[0]->artist_lname)) {
                                                                                                                                            echo $artistInfo[0]->artist_lname;
                                                                                                                                        } ?></b></h1>
                <h5><?php if (isset($artistInfo[0]->category)) {
                        // echo $artistInfo[0]->category;
                        $cat_array = explode(",", $artistInfo[0]->category);
                         $i = 1;
                        foreach ($cat_array as $cate_ID){

                            $category_name = $CI->getcategoryname($cate_ID);
                            if (isset($category_name[0]->title)) {
                                            echo " ". $category_name[0]->title;
                                            if (count($cat_array) != 1  && count($cat_array) != $i) {
                                                 echo ',';
                                             }
                                             $i++;
                                         }
                            
                            
                        }
                    } ?></h5>
            </div>


        </div>
        <div class="profile-edit-btn">
            <button class="edit-profile-img" data-bs-toggle="modal" data-bs-target="#editprofileModal">
                <i class="bi bi-pencil-fill"></i>
            </button>
            <button class="edit-profile-img " data-bs-toggle="modal" data-bs-target="#deleteModal">
                <i class="bi bi-trash3-fill"></i>
            </button>
        </div>
    </div>
</div>
<!-- my-profile edit-->
<form action="<?php echo base_url(); ?>update_artistpersonalinfo" method="POST">
    <div class="profile-card  border-0 edit-myprofile">
        <h1 class=" edit-heading"><b>Personal Info</b></h1>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="fname" value="<?php if (isset($artistInfo[0]->artist_fname)) {
                                                                                    echo $artistInfo[0]->artist_fname;
                                                                                } ?> " placeholder="First Name">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lname" value="<?php if (isset($artistInfo[0]->artist_lname)) {
                                                                                    echo $artistInfo[0]->artist_lname;
                                                                                } ?> " placeholder="Last Name">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $this->session->userdata('email'); ?> " placeholder="Email" readonly>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Country</label>
                    <input type="text" class="form-control" name="country" value="<?php if (isset($artistInfo[0]->country)) {
                                                                                        echo $artistInfo[0]->country;
                                                                                    } ?> " placeholder="Country">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>State</label>
                    <input type="text" class="form-control" name="state" value="<?php if (isset($artistInfo[0]->state)) {
                                                                                    echo $artistInfo[0]->state;
                                                                                } ?> " placeholder="State">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Artist Type</label>
                 
                    <div id="sel-cont">
                   
                        
                        <?php 

                    $categoryArray = explode(',', $artistInfo[0]->category);

                    
                    ?>
                    <select name="arttype[]" id="select1" class="selectbox" style="width: 350px;" multiple>

                            
                            
                    <?php
                         foreach($artist_category as $category){ 
                          $isSelected = in_array($category->ID, $categoryArray) ? 'selected' : '';
                          ?>
                  
                          <option value="<?php echo $category->ID; ?>" <?php echo $isSelected; ?>><?php echo $category->title;?></option>

                     
                         
                        <?php } ?>

                        </select>

                        <br />
                    </div>
                </div>
            </div>
        </div>






        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Biography</label>
                    <textarea class="form-control" rows="6" cols="50" name="biography"><?php if (isset($artistInfo[0]->about_artist)) {
                                                                        echo $artistInfo[0]->about_artist;
                                                                    } ?></textarea>
                </div>
            </div>

        </div>
        <div class="update-btn text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
<form id="validate" action="<?php echo base_url(); ?>ArtistResetPass" method="POST">
    <div class="profile-card  border-0 mt-5 mb-5 edit-myprofile">
        <h1 class=" edit-heading"><b>Reset Password</b></h1>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" required>

                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="cpass" id="" required>

                </div>
            </div>
        </div>
        <div class="update-btn text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>


</form>





</div>
</div>
</div>
</div>
<!--delete-btn modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h2>Are you sure,you want to delete?</h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                <a href="<?php echo base_url('deleteprofile_image'); ?>" type="button" class="btn btn-primary">Yes</a>
            </div>
        </div>
    </div>
</div>

<!--editprofile-btn modal-->
<form action="<?php echo base_url(); ?>updateartistprofile_image" method="POST" enctype="multipart/form-data">

    <div class="modal fade" id="editprofileModal" tabindex="-1" aria-labelledby="editprofileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <h2>Upload Profile Photo</h2>
                    <label class="add-morefile text-center">Upload
                        <input type="file" id="profile_img" name="image" >
                        <div id="profile_name" style="text-align: center;"></div>
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>

                </div>
            </div>
        </div>
    </div>
</form>
<!--editcover_profile-btn modal-->
<form action="<?php echo base_url(); ?>updatecoverprofile_image" method="POST" enctype="multipart/form-data">

    <div class="modal fade" id="editcoverprofileModal" tabindex="-1" aria-labelledby="editprofileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <h2>Upload Profile Photo</h2>
                    <label class="add-morefile text-center">Upload
                        <input type="file" name="image" id="imageupload">
                        <div id="fname" style="text-align: center;"></div>
                    </label>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>

                </div>
            </div>
        </div>
    </div>
</form>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $("#validate").validate({
            rules: {
                pass: 'required',
                cpass: {
                    required: true,
                    equalTo: "#pass",
                },
            },
            messages: {
                pass: 'New Password is required',
                cpass: {
                    required: 'Confirm Password is required',
                    equalTo: 'Passwords does not match',
                }
            },
        });
    });
</script>

<script>
$(document).ready(function() {
  $('#imageupload').on('change', function() {
    var fileName = $(this).val().split('\\').pop();
    $('#fname').text(fileName || 'No file selected');
  });
});
</script>

<script>
$(document).ready(function() {
  $('#profile_img').on('change', function() {
    var fileName = $(this).val().split('\\').pop();
    $('#profile_name').text(fileName || 'No file selected');
  });
});
</script>

<script>
        var timeout = 3000; 

        $('.time').delay(timeout).fadeOut(300);
        </script>

<script>
    $('select[name="arttype[]"]').chosen();
</script>

