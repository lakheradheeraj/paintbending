<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Artist extends BaseController {
	 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->library('session');

		
		$this->load->model('ArtistModel');
		$this->load->model('CustomerModel');


	}

	
	
	public function artist_gallery()
	{
        $user_role = $this->session->userdata('user_role');
		
		if(!isset($user_role) || $user_role != 2)
		{
			redirect('signin');
		}
		else
		{
			$this->global['title'] = 'My Gallery';
			$this->global['page_title'] = 'My Gallery | Artist | Paint Bending';
			$offset = $this->input->post('offset');
			$artist_id =  $this->session->userdata('id');
			$data['artistPinting'] = $this->ArtistModel->fetch_paintingDATA($artist_id,$offset);
			 $this->loadViews('artist_gallery',$this->global,$data);  

		}
	

	}





	public function edit_painting()
	{
		$user_role = $this->session->userdata('user_role');
		
		if(!isset($user_role) || $user_role != 2)
		{
			redirect('signin');
		}
		else
		{
			$ID = $this->uri->segment(2);
			$this->global['title'] = '';
			$this->global['page_title'] = 'Edit Painting | Artist | Paint Bending';
			$data['painting_category'] = $this->ArtistModel->painting_category();
			$data['paintingDetail'] = $this->ArtistModel->paintingDetail($ID);
		    $this->loadViews('edit_painting',$this->global,$data);   

		}
        
	}

	public function getartist_Data($id)
		{
			return $this->ArtistModel->artistDATA($id);
			
			
		}

	public function add_painting()
	{
		$user_role = $this->session->userdata('user_role');
		
		if(!isset($user_role) || $user_role != 2)
		{
			redirect('signin');
		}
		else
		{
			$this->global['title'] = ' Add Painting ';
			$this->global['page_title'] = 'Add Painting | Artist | Paint Bending';
			$data['painting_category'] = $this->ArtistModel->painting_category();

		$this->loadViews('add_painting',$this->global,$data);   

		}
        
	} 
	




	




	public function painting_request()
	{
		$user_role = $this->session->userdata('user_role');
		
		if(!isset($user_role) || $user_role != 2)
		{
			redirect('signin');
		}
		else
		{
			 $artistID =  $this->session->userdata('id');

			$data = $this->ArtistModel->fetch_requestdata($artistID);
			$requestdata = '';
			if(!empty($data) && isset($data[0]->customer_id)){

				$custId = $data[0]->customer_id;
				$requestdata = $this->ArtistModel->custInfo($custId, $artistID);
			}
	
			$this->global['title'] = 'Request a Painting';
			$this->global['page_title'] = 'Painting Requests | Artist | Paint Bending';
			$this->loadViews('painting_request',$this->global, $requestdata);  

		
		}
	}




	public function art_submit_form()
	{
		
		$description = implode(",",$this->input->post('description'));
		$IMAGEDATA =  $this->input->post('IMAGEDATA');
		$directoryPath = './assets/canvas_image';
		$randomName = uniqid();
		$imagePath = $directoryPath . '/' . $randomName . '.jpg';
		$base64Image = str_replace("data:image/png;base64,","","$IMAGEDATA");
		$base64Image = str_replace('"' ,"" ,"$base64Image");
		$binaryImage = base64_decode($base64Image);

		if ($binaryImage !== false) {
			if (file_put_contents($imagePath, $binaryImage) !== false) {
			} else {
			}
		} else {
		}
		$tag = $this->input->post('tag');
		$painting_title = $this->input->post('painting_title');
		$userfile = $this->input->post('userfile');
		$script = $this->input->post('lineData');
		$frame_upload_success = array();
		

		//-----------------------------------------------------------------------------------------------
		 if (!empty($_FILES))
			{
			$config['upload_path'] = './assets/request_painting/'; 
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 2048; 
			
		
			$this->load->library('upload', $config);
		
			
			foreach ($_FILES['userfile']['name'] as $key => $value) {
				$_FILES['uploaded_file']['name'] = $_FILES['userfile']['name'][$key];
				$_FILES['uploaded_file']['type'] = $_FILES['userfile']['type'][$key];
				$_FILES['uploaded_file']['tmp_name'] = $_FILES['userfile']['tmp_name'][$key];
				$_FILES['uploaded_file']['error'] = $_FILES['userfile']['error'][$key];
				$_FILES['uploaded_file']['size'] = $_FILES['userfile']['size'][$key];
		
				$this->upload->initialize($config);
		
				if ($this->upload->do_upload('uploaded_file')) {
					$frame_upload_success[] = $this->upload->data('file_name');
				} else {
					$error = array('error' => $this->upload->display_errors());
				}
		
			}
		
		}

		
	//-------------------------------------------------------------------------------------------------------------
	// Upload Reference Video
	if (!empty($_FILES)){
	$this->load->helper('string');
	$config['upload_path'] = './assets/reference_video/'; 
	$configVideo['upload_path'] = './assets/reference_video/'; 
	$configVideo['max_size'] = '102400';
	$configVideo['allowed_types'] = 'mp4'; 
	$configVideo['overwrite'] = FALSE;
	$configVideo['remove_spaces'] = TRUE;
	
	$original_filename = $_FILES['videoupload']['name'];
	$configVideo['file_name'] = $original_filename;

	$this->load->library('upload', $configVideo);
	$this->upload->initialize($configVideo);

	if (!$this->upload->do_upload('videoupload')) 
	{
		# Upload Failed
		$this->session->set_flashdata('error', $this->upload->display_errors());
	}
	else
	{
		# Upload Successfull
		$url = './assets/reference_video/'.$original_filename;
	
	}
	
	}
	$Request_form = array(
		"customer_id" => $this->session->userdata('id'),
		"tag" => $tag,
		"painting_title" => $painting_title,
		"canvas_image" => $randomName.".jpg",
		"script" => $script

	);
	
	$submit_Request_form = $this->CustomerModel->submit_Request_form($Request_form);


	redirect('script_data/'.$submit_Request_form);
	

    }



	
		public function script_data()
		{
			
		  $isLoggedIn = $this->session->userdata('isLoggedIn');
			
			if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
			{
	
				redirect('signin');
			}
			else
			{
				
				$user_role = $this->session->userdata('user_role');
			
			if(!isset($user_role) || $user_role == 2)
			{
				$id = $this->uri->segment(2);
				$data['request_data'] = $this->CustomerModel->script_data($id);	
				
				$this->global['title'] = 'Here Is My Code';
				$this->global['page_title'] = 'Request Detail | Customer | Paint Bending';
				
				$this->loadViews('art_request_details',$this->global,$data);
	
			}
			else
			{
				redirect('art_request_details');
			}
	
			}
		}

		
	public function painting_description()
	{
		$user_role = $this->session->userdata('user_role');
		
		if(!isset($user_role) || $user_role != 2)
		{
			redirect('signin');
		}
		else
		{
			

			$this->global['title'] = 'Submitted Painting Request';
			$this->global['page_title'] = 'Submitted Painting Request | Artist | Paint Bending';

			$ID =  $this->uri->segment(2);
			$artistID = $this->session->userdata('id');
		    $data['paintingdata'] = $this->ArtistModel->fetch_customerreqdata($ID,$artistID);
			$this->loadViews('painting_description',$this->global,$data);  

		

		
		}

		
	
	}



	public function cancel_custreq()
	{
		
		$ID =  $this->uri->segment(2);
		
		$artistID = $this->session->userdata('id');
		$status = array(
	'req_status' => 3
		);
		$data['del'] = $this->ArtistModel->cancel_req($ID,$artistID,$status);
		if($data){
			$this->session->set_flashdata('success','Request has been rejected');	
			redirect('painting_description/'.$ID);
		}
		else{
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error', ' Failed to cancel reject');
			redirect('painting_description/'.$ID);
		}

	}




	public function getartist_details($id)
		{
			return $this->ArtistModel->customerInfo($id);
			
			 
			
		
		}
	public function purchase_requests()
	{
		$user_role = $this->session->userdata('user_role');
		
		if(!isset($user_role) || $user_role != 2)
		{
			redirect('signin');
		}
		else
		{

			$this->global['title'] = 'Purchase Requests';
			$this->global['page_title'] = 'Purchase Requests | Artist | Paint Bending';
			$this->loadViews('purchase_requests',$this->global);  

		
		}
	}

	public function individual_chat()
	{
		$user_role = $this->session->userdata('user_role');
		
		if(!isset($user_role) || $user_role != 2)
		{
			redirect('signin');
		}
		else
		{
			$ID = $this->uri->segment(2);
			$this->global['title'] = 'Purchase Request';
			$this->global['page_title'] = 'Individual Chat | Artist | Paint Bending';
		$this->loadViews('individual_chat',$this->global); 
 

		
		}
		  
	}
	public function profile_management()
	{
        $user_role = $this->session->userdata('user_role');
		
		if(!isset($user_role) || $user_role != 2)
		{
			redirect('signin');
		}
		else
		{
			$ID =  $this->session->userdata('id');

			$data['artistInfo'] = $this->ArtistModel->fetch_info($ID);
			$this->global['title'] = 'My Profile';
			$this->global['page_title'] = 'My Profile | Artist | Paint Bending';
			$data['artist_category'] = $this->ArtistModel->artist_category();
		    $this->loadViews('profile_management',$this->global,$data);   
			
		
 
		}
	}
	function ArtistResetPass(){
		        $ID =  $this->session->userdata('id');
				$password = $this->input->post('pass');
				$cpassword = $this->input->post('cpass');
				
				$data = array(
						'user_password'=>md5($password),
						
					); 
					
					$this->ArtistModel->ArtistResetPass($ID, $data); 
					
					
					 $this->session->set_flashdata('success','Password Updated Successfully');	
					 $data['artistInfo'] = $this->ArtistModel->fetch_info($ID);
					 $this->global['title'] = 'Ambrosius Bosschaert';
			         $this->global['page_title'] = 'Profile Management | Artist | Paint Bending';
					 redirect('profile_management',$this->global);
		
	}
	public function updateprofile_image()
	{
		$config = array(
			'upload_path' => "./assets/artist_image/",
			'allowed_types' => "jpg|png|jpeg|gif|webp",
			'max_size' => "1024000", 
		);
		
	
	
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		  
	
		if ($this->upload->do_upload('image')) {
			$data['image'] = $this->upload->data('file_name');
	
			$ID =  $this->session->userdata('id');
			$image_data = array(
				'profile_image' => $data['image']
	
			);
			
			 $this->ArtistModel->update_image($ID,$image_data);
			$this->session->unset_userdata('profile_image');
	
			 $this->session->set_userdata($image_data);
			 $this->session->set_flashdata('success', 'Profile Image Updated Successfully');	
			 redirect('profile_management');
			
		}else{
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error', ' Failed to Upadate Profile Image');
			echo "false";
		}
	
	
	}


	public function update_personalinfo()
	{
		$ID = $this->session->userdata('id');
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$email = $this->input->post('email');
		$state = $this->input->post('state');
		$country = $this->input->post('country');
		$category = $this->input->post('arttype'); 
		$biography = $this->input->post('biography');
	
		$update_info = array(
			'artist_fname' => $fname,
			'artist_lname' => $lname,
			'email' => $email,
			'state' => $state,
			'country' => $country,
			'about_artist' => $biography
		);
	
		
		if (!empty($category)) {
			$update_info['category'] = implode(',', $category); 
		}else{
			$update_info['category'] = " ";
		}
	
		$result = $this->ArtistModel->update_personalinfo($ID, $update_info);
	
		if ($result) {
			$this->session->set_flashdata('success', 'Profile Updated Successfully');
		} else {
			$this->session->set_flashdata('error', 'Something went wrong. Please try again.');
		}
	
		redirect('profile_management');
	}
public function deleteprofile_image()
{ 
	$ID =  $this->session->userdata('id');
	$del_img = array(
		'profile_image' => 'man-icon_jpg.png'

	);
	 $check = $this->ArtistModel->checkimage($ID,$del_img);
	 
	 if($check){
		
		redirect('profile_management');

	 }
	 else{
	  $result= $this->ArtistModel->deleteprofile_image($ID,$del_img);
	 if($result){
		$this->session->unset_userdata('profile_image');

		$this->session->set_userdata($del_img);
		$this->session->set_flashdata('success', 'Profile Image Removed Successfully');	
		redirect('profile_management');
	 }
	 else{
		$error = array('error' => $this->upload->display_errors());
		$this->session->set_flashdata('error', 'Failed to Delete Profile Image!');

	 }
	}
	
}
public function updatecoverprofile_image()
{
	$config = array(
		'upload_path' => "./assets/artist_image/",
		'allowed_types' => "jpg|png|jpeg|gif|webp",
		'max_size' => "1024000", 
	);
	


	$this->load->library('upload',$config);
	$this->upload->initialize($config);
	  

	if ($this->upload->do_upload('image')) {
		$data['image'] = $this->upload->data('file_name');

		$ID =  $this->session->userdata('id');
		$image_data = array(
			'profile_cover' => $data['image']

		);
		
		 $this->ArtistModel->update_image($ID,$image_data);

		 $this->session->set_flashdata('success', 'Profile Image Updated Successfully');	
		 redirect('profile_management');
		
	}else{
		$error = array('error' => $this->upload->display_errors());
		$this->session->set_flashdata('error', ' Failed to Upadate Profile Image');
		echo "false";
	}


}

public function getcusid()
{
	$artistID =  $this->session->userdata('id');
	 return $data = $this->ArtistModel->fetch_requestdata($artistID);
	

}
public function custInfo($cus_id)
{
	$artistID =  $this->session->userdata('id');
	return $getcusdata = $this->ArtistModel->custInfo($cus_id, $artistID);
	

}

public function random_request()
	{
		$user_role = $this->session->userdata('user_role');
		
		if(!isset($user_role) || $user_role != 2)
		{
			redirect('signin');
		}
		else
		{
			
			 $ids = $this->ArtistModel->request_ids();

			 $randomKey = array_rand($ids);

			 $randomObject = $ids[$randomKey];
			 $randomID = $randomObject->ID;
			 
			 $data['title'] = $this->ArtistModel->random_title($randomID);
			
			 $data['description'] = $this->ArtistModel->random_description($randomID);
		
			 $data['Sketches'] = $this->ArtistModel->random_Sketches($randomID);
		
			 $data['Images'] = $this->ArtistModel->random_Images($randomID);
			
			 $data['Video'] = $this->ArtistModel->random_Video($randomID);
			
			 $data['sub_byart'] = $this->ArtistModel->random_sub_byart($randomID);
			
			 $this->global['title'] = 'Chat with Customer';
			 $this->global['page_title'] = 'Chat with Customer | Artist | Paint Bending';
			 $this->loadViews('random_request',$this->global, $data);  

		
		}
	}
	public function getcus_randomid()
{
	 return $data = $this->ArtistModel->fetch_randomrequest();
	

}
public function cust_randomInfo($randomcus_id)
{
	$artistID =  $this->session->userdata('id');
	 return $getcusdata = $this->ArtistModel->custrandom_Info($randomcus_id, $artistID);
	

}

function insert_randomreq()
{
	 $ID =  $this->session->userdata('id');
	 	$title = $this->input->post('title');
	 	$description = $this->input->post('description');
	 	$sketches = $this->input->post('sketches');
	 	$images = $this->input->post('images');
	 	$video = $this->input->post('video');
	

	$request_info =array(
		'artistId' => $ID,
		'title' => $title,
		'description' => $description,
		'rough_sketches' => $sketches,
		'reference_images' => $images,
		'reference_video' => $video,

		

	);
  	
	 $result= $this->ArtistModel->random_requestinfo($ID,$request_info);
	


}




public function addPainting() 

 {
    $ID = $this->session->userdata('id');
    $paint_name = $this->input->post('paint_name');
    $price = $this->input->post('price');
    $size = $this->input->post('size');
	$painting_category = $this->input->post('painttype');
    $description = $this->input->post('description');
	

	$frame_config = array(
		'upload_path' => "./assets/artist_paintings/",
		'allowed_types' => "jpg|png|jpeg|AVIF",
		'max_size' => '10485760',
		'max_width'  => '6000',
        'max_height'  => '6000',
		'encrypt_name' => false, 
	);
    $this->load->library('upload', $frame_config);

  
    $frame_upload_success = array();
	$frame_orig_names = array();

    $frame_images = $_FILES['frame'];
    foreach ($frame_images['name'] as $index => $name) 
	{
		$file_extension = pathinfo($name, PATHINFO_EXTENSION); 
		$unique_filename = time() . '_' . uniqid() . '.' . $file_extension; 
        $_FILES['frame_images']['name'] = $unique_filename;
       // $_FILES['frame_images']['type'] = $frame_images['type'][$index];
        $_FILES['frame_images']['tmp_name'] = $frame_images['tmp_name'][$index];
        $_FILES['frame_images']['error'] = $frame_images['error'][$index];
        $_FILES['frame_images']['size'] = $frame_images['size'][$index];

        if ($this->upload->do_upload('frame_images')) {
            $frame_upload_success[] = $this->upload->data('file_name');
			$frame_orig_names[] = $unique_filename;
        }else{
				$customErrorMessage = $this->upload->display_errors('<small class="error" style="font-family: Poppins-Medium;">', '</small>');
				$fullErrorMessage =  $customErrorMessage;
				$this->session->set_flashdata('frameerror', $fullErrorMessage);
				redirect('add_painting');
		}

	
    }

    
    $painting_config = array(

        'upload_path' => "./assets/artist_paintings/",
        'allowed_types' => "jpg|png|jpeg|AVIF",
        'max_size' => '10485760',
		'max_width'  => '6000',
        'max_height'  => '6000', 
    	'encrypt_name' => false, 
    );

	$image_upload_success = array();
	$image_orig_names = array();
    $images_upload = $_FILES['image'];

    foreach ($images_upload['name'] as $index => $name) 
	{
		$file_extension = pathinfo($name, PATHINFO_EXTENSION); 
		$unique_filename = time() . '_' . uniqid() . '.' . $file_extension; 

        $_FILES['images_upload']['name'] = $unique_filename;
        $_FILES['images_upload']['tmp_name'] = $images_upload['tmp_name'][$index];
        $_FILES['images_upload']['error'] = $images_upload['error'][$index];
        $_FILES['images_upload']['size'] = $images_upload['size'][$index];
        if ($this->upload->do_upload('images_upload')) {

           $image_upload_success[] = $this->upload->data('file_name');
		   $image_orig_names[] = $unique_filename;
		
        }else{
			$customErrorMessage = $this->upload->display_errors('<small class="error" style="font-family: Poppins-Medium;">', '</small>');
				$fullErrorMessage =  $customErrorMessage;
				$this->session->set_flashdata('frameerror', $fullErrorMessage);
				redirect('add_painting');
		}
    }


	
        $painting_Data = array(
            'artistID' => $ID,
            'painting_name' => $paint_name,
            'painting_price' => $price,
            'painting_size' => $size,
            'painting_description' => $description,
            'painting_frame' => implode(',', $frame_orig_names),
           'painting_image' => implode(',', $image_orig_names)
        );

		if (!empty($painting_category)) {
			$painting_Data['painting_category'] = implode(',', $painting_category); 
		}else{
			$painting_Data['painting_category'] = " ";
		}

	
        $inserted_id = $this->ArtistModel->ADDpainting($painting_Data);

        if ($inserted_id) {
          
            echo "Painting added successfully";
            redirect('artist_gallery'); 
        } else {
            $this->session->set_flashdata('error', 'Failed to add painting.');
            redirect('add_painting'); 
        }
     
}


public function updatePainting()


{
    $ID = $this->uri->segment(2);
    $paint_name = $this->input->post('name');
    $price = $this->input->post('price');
    $size = $this->input->post('size');
	$painting_category = $this->input->post('painttype');
    $description = $this->input->post('description');


    $existing_painting = $this->ArtistModel->paintingDetail($ID);

    $upload_config = array(
        'upload_path' => "./assets/artist_paintings/",
        'allowed_types' => "jpg|png|jpeg|AVIF",
        'max_size' => '10485760', 
		'max_width'  => '6000',
        'max_height'  => '6000',
    	'encrypt_name' => false, 
    );
    $this->load->library('upload', $upload_config);

    $upload_error = '';
    $frame_update_success = array();
	$frame_orig_names = array();

    if (!empty($_FILES['frame']['name'][0]))
	 {
        foreach ($_FILES['frame']['name'] as $index => $frame_name)
		 {
			 $file_extension = pathinfo($frame_name, PATHINFO_EXTENSION); 
			 $unique_filename = time() . '_' . uniqid() . '.' . $file_extension; 

            $_FILES['userfile']['name'] = $unique_filename;
            $_FILES['userfile']['tmp_name'] = $_FILES['frame']['tmp_name'][$index];
            $_FILES['userfile']['error'] = $_FILES['frame']['error'][$index];
            $_FILES['userfile']['size'] = $_FILES['frame']['size'][$index];

            if ($this->upload->do_upload('userfile'))
			 {
                $frame_update_success[] = $this->upload->data('file_name');
				$frame_orig_names[] = $unique_filename;
            }
			 else
			  {
                $upload_error =  "The uploaded file type is not allowed.";
                $this->session->set_flashdata('frameerror', $upload_error);
                redirect('edit_painting/' . $ID);
            }
        }
    }


    $image_config = array(
        'upload_path' => "./assets/artist_paintings/",
        'allowed_types' => "jpg|png|jpeg|AVIF",
		'max_size' => '10485760',
		'max_width'  => '6000',
        'max_height'  => '6000',
		'encrypt_name' => false, 
    );

    $this->upload->initialize($image_config);

	$image_upload_success = array();
	$image_orig_names = array();

	$image_combine = '';

	if(!empty($_FILES['image']['name'][0]))
	{

		foreach($_FILES['image']['name'] as $index => $name)
		{
		    $file_extension = pathinfo($name, PATHINFO_EXTENSION); 
			$unique_filename = time() . '_' . uniqid() . '.' . $file_extension; 
			$_FILES['images_upload']['name'] = $unique_filename;
			$_FILES['images_upload']['tmp_name'] = $_FILES['image']['tmp_name'][$index];
			$_FILES['images_upload']['error'] = $_FILES['image']['error'][$index];
			$_FILES['images_upload']['size'] = $_FILES['image']['size'][$index];

			if($this->upload->do_upload('images_upload'))
			{

			$image_upload_success[] = $this->upload->data('file_name');
			$image_orig_names[] = $unique_filename;
		}else
		{
			$upload_error = $this->upload->display_errors();
			$this->session->set_flashdata('frameerror', $upload_error);
			redirect('edit_painting/' . $ID);
		}
	  }

	 
	  if(!empty($image_orig_names))
	  {
		$image_implode = implode(',', $image_orig_names);
        $new_painting_data['painting_image'] = $image_implode;
		
		$image_combine = $existing_painting[0]->painting_image;
		

		if(empty($image_combine))
		{

			$docData = array(
               
                'painting_image' => $new_painting_data['painting_image']
            );
		}else{
			$docData = array(
            
                 'painting_image' => $new_painting_data['painting_image']. "," . $image_combine
            );
		}



        $result = $this->ArtistModel->updatePaintingImage($ID, $docData);

	  }
	}else
	{
		$new_painting_data['painting_image'] = $existing_painting[0]->painting_image;
	}

    if (!empty($frame_orig_names)) 
	{
        $photos = $existing_painting[0]->painting_frame;
        $combine = implode(",", $frame_orig_names);

        if (empty($photos))
		 {
            $docData = array(
                'painting_frame' => $combine,
              
            );
        } else
		 {
            $docData = array(
                'painting_frame' => $photos . "," . $combine,
             
            );
        }


	

        $result = $this->ArtistModel->updatephotos($ID, $docData);
    }

    if (!empty($upload_error)) 
	{
        $this->session->set_flashdata('frameerror', $upload_error);
       redirect('edit_painting/' . $ID);
    }

    $new_painting_data = array(
        'painting_name' => empty($paint_name) ? $existing_painting[0]->painting_name : $paint_name,
        'painting_price' => empty($price) ? $existing_painting[0]->painting_price : $price,
        'painting_size' => empty($size) ? $existing_painting[0]->painting_size : $size,
        'painting_description' => empty($description) ? $existing_painting[0]->painting_description : $description,
    );


	if (!empty($painting_category) && is_array($painting_category)) {
		$new_painting_data['painting_category'] = implode(',', $painting_category); 
	}else{
		$new_painting_data['painting_category'] = " ";
	}

    $updated = $this->ArtistModel->UPDATEpainting($new_painting_data, $ID);

    if ($updated) {
        $this->session->set_flashdata('success', 'Painting updated successfully');
    } else {
        $this->session->set_flashdata('error', 'Failed to update painting');
    }

	
	 redirect('edit_painting/' . $ID);
}




public function getphotos($id)

{
	return $getphotos = $this->ArtistModel->getphotos($id);
}


public function artist_view(){

	$this->global['title'] = '';
	$this->global['page_title'] = 'artist painting | Artist | Paint Bending';
	$painting_id = $this->uri->segment(2);
	$data['artist_paintingdetail'] = $this->ArtistModel->artist_paintingdetail($painting_id);
	$data['getrandm_painting'] = $this->ArtistModel->getrandm_painting();
	$this->loadViews('artist_details2',$this->global,$data); 
}

public function painting_rating($id)
{

	return $result = $this->ArtistModel->painting_rating($id);

}

public function painting_avgrat($id)
{

	return $result = $this->ArtistModel->painting_avgrat($id);

}



public function artist_chatwithCustomer()
{
	$user_role = $this->session->userdata('user_role');
	
	if(!isset($user_role) || $user_role != 2)
	{
		redirect('signin');
	}
	else
	{
		 $this->global['title'] = 'Chat with Customer';
		 $this->global['page_title'] = 'Chat with Customer | Artist | Paint Bending';
		
		 $this->loadViews('artist_chatwithCustomer',$this->global);  

	
	}
}

public function getchat($id)
{
	return $getchat = $this->ArtistModel->getchat($id);
}



public function customerImage($id)
{
	$customerImage = $this->ArtistModel->customerImage($id);
	return $customerImage;
}
public function submitchat()
{
	$isLoggedIn = $this->session->userdata('isLoggedIn');
	
	if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
	{
		redirect('signin');
	}
	else
	{
		if(!empty($this->input->post('chat')))
		{
			$req_id = $this->uri->segment(2);
			$artist_id = $this->uri->segment(3);
			$chat = $this->input->post('chat');
		   $cus_id =  $this->session->userdata('id');
   
			$data =  array(
			   'req_id'=> $req_id,
			   'sender' => $cus_id,
			  'cud_id'=> $cus_id,
			  'artist_id'=> $artist_id,
			  'description'=> $chat,
			);
			$submitchat = $this->ArtistModel->submitchat($data);
		   $this->global['title'] = 'Chat with Customer';
		   $this->global['page_title'] = 'Customer Chat With Artist | Customer | Paint Bending';
		   $this->loadViews('artist_chatwithCustomer',$this->global); 
		}
		else
		{
			$this->global['title'] = 'Chat with Customer';
			$this->global['page_title'] = 'Customer Chat With Artist | Customer | Paint Bending';
			$this->loadViews('artist_chatwithCustomer',$this->global); 	
		}

	}
}

public function getcustomer_name($id)
{
	return $get_artist_name = $this->ArtistModel->getcustomer_name($id);
}





public function getcategoryname($paintingID)
{
	
	 return $result = $this->ArtistModel->get_category($paintingID);
	

}


public function delete_Paint($id)
{  
   $result =  $this->ArtistModel->delete_Paint($id);
   
   
 if ($result) {
	$this->session->set_flashdata('success', 'Painting deleted successfully.');
} else {
	$this->session->set_flashdata('error', 'Error deleting painting.');
}

redirect('artist_gallery');
	
}


public function delete_painting()
{
	$paintingName = $this->input->post('paintingId');
	$postData = $this->input->post('ID');	
	
	$result = $this->ArtistModel->GET_painting($postData);

	 $Image = explode( ',' , $result[0]->painting_image);

	 if(in_array($paintingName , $Image))
	 {
		if (($key = array_search($paintingName, $Image)) !== false) {
			unset($Image[$key]);

		$artist_images =	implode(',',$Image);
		
		$data = array(

			'painting_image'=>$artist_images
		);

		$update_painting = $this->ArtistModel->update_painting($data,$postData);
		
		if($update_painting)
		{
			echo "Painting deleted successfully !";

		}else
		{
			echo "Error deleting painting !";
		}		
		}
	 }
}

public function delete_frame()
{
	$paintingName = $this->input->post('framename');
	$postData = $this->input->post('ID');	
	
	$result = $this->ArtistModel->GET_painting($postData);

	
	 $Image = explode( ',' , $result[0]->painting_frame);

	 if(in_array($paintingName , $Image))
	 {
		if (($key = array_search($paintingName, $Image)) !== false) {
			unset($Image[$key]);

		$artist_images =	implode(',',$Image);
		
		$data = array(

			'painting_frame'=>$artist_images
		);

		$update_painting = $this->ArtistModel->update_painting($data,$postData);
		
		if($update_painting)
		{
			echo "Painting deleted successfully !";

		}else
		{
			echo "Error deleting painting !";
		}
		
			
		}
	 }

}


public function assign_to_artist()
	{
		$isLoggedIn = $this->session->userdata('isLoggedIn');
		
		if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
		{
			redirect('signin');
		}
		else
		{
			$user_role = $this->session->userdata('user_role');
			$id = $this->session->userdata('id');
		
			if(!isset($user_role) || $user_role == 2 || $user_role == 3 )
			{
				 $title = $this->input->post('hiddentitle');
				
				 $search = $this->input->get('search');
					 
					 $config['base_url'] = base_url('Customer/artists_list');
					 $config['total_rows'] = $this->CustomerModel->count_total_artists($search);
					// $config['per_page'] = 6;
					 //$config['num_links'] = 5;
					 //$this->pagination->initialize($config);
					 $offset = $this->uri->segment(3);
					// $limit = $config['per_page'];
					 if($search > 0){
						 if(!empty($title))
						 {
							 $data['artistInfo'] = $this->CustomerModel->search_category($title,$offset);

							 
							}
							else
							{
								$data['artistInfo'] = $this->ArtistModel->artist_info($search,$offset,$id);
								
								
								
							}
							$this->global['title'] = 'Assign Artist';
							$this->global['page_title'] = 'Assign Artist | Customer | Paint Bending';
							
							$this->loadViews('assign_to_artist',$this->global,$data);
							
						}
				

				else{
				$search = '';	
				if(!empty($title))
				{
					$data['artistInfo'] = $this->CustomerModel->search_category($title,$offset);
					
				}
				else
				{
					$data['artistInfo'] = $this->ArtistModel->artist_info($search,$offset,$id);
					
				}
				$this->global['title'] = 'Assign Artist';
			    $this->global['page_title'] = 'Assign Artist | Customer | Paint Bending';
			    $this->loadViews('assign_to_artist',$this->global,$data);
				
				}
	
			}
			else
			{

				redirect('art_request_details');
			}

		}
	}


	public function getall_category()
{
	
	 return $data = $this->CustomerModel->fetch_all_category();
	

}

	public function totalpainting($id)
	{

		return $result = $this->CustomerModel->TotalPAnting($id);

	}

	public function getRating_review($id)
	{
		
		return $result = $this->CustomerModel->getRating_review($id);
	}

	public function getcategorynamebyid($paintingID)
	{
		
		 return $data = $this->CustomerModel->fetch_category($paintingID);
		
	
	}
	public function generate_random_request()
	{
		$user_role = $this->session->userdata('user_role');
		
		if(!isset($user_role) || $user_role != 2)
		{
			redirect('signin');
		}
		else
		{
			
			 $this->global['title'] = 'Generate Random Request';
			 $this->global['page_title'] = 'Generate Random Request | Artist | Paint Bending';

			    $ids = $this->ArtistModel->randomrequest_ids();
           
			    $randomKey = array_rand($ids);

				$randomObject = $ids[$randomKey];
				$randomID = $randomObject->id;
				
				$data['title'] = $this->ArtistModel->randomrequest_title($randomID);
				
				$data['tag'] = $this->ArtistModel->randomrequest_tag($randomID);
				
			    $data['script'] = $this->ArtistModel->random_script($randomID);
				
			    $this->loadViews('generate_random_request',$this->global,$data);  

		
		}
	}


	public function request_painting()
	{
		
		$this->global['title'] = 'Requested Painting';
		$this->global['page_title'] = 'Requested Painting | Artist | Paint Bending';
		$ID = $this->session->userdata('id');
	  //  $this->global['artist_request_painting'] = $this->ArtistModel->artist_request_painting();
		$data['artist_request_painting'] = $this->ArtistModel->artist_request_painting($ID);
		$this->loadViews('request_painting',$this->global,$data);  


	}



	public function artist_submit_painting()
	{
		$this->global['title'] = 'Submitted Painting';
		$this->global['page_title'] = 'Submitted Painting | Artist | Paint Bending';
		 $id = $this->uri->segment(2);
	  //  $this->global['artist_request_painting'] = $this->ArtistModel->artist_request_painting();
	 	 $data['request_data'] = $this->CustomerModel->allreq_data($id);	
		$this->loadViews('artist_submit_painting',$this->global,$data);
	}


	
	

	public function submit_artist_painting()
	{
		$ID = $this->session->userdata('id');
		$painting_id = $this->uri->segment(2);
		$painting_config = array(
			'upload_path' => "./assets/artist_paintings/",
			'allowed_types' => "jpg|jpeg|png|gif|bmp|webp", 
			'max_size' => '10485760',
			'max_width' => '6000',
			'max_height' => '6000',
			'encrypt_name' => false,
		);
		
		$this->load->library('upload', $painting_config);
		
		$image_upload_success = array();
		$image_orig_names = array();
		$images_upload = $_FILES['image'];
	
		if (!empty($_FILES['image']['name'][0])) {
			foreach ($images_upload['name'] as $index => $name) {
				$file_extension = pathinfo($name, PATHINFO_EXTENSION);
				$unique_filename = time() . '_' . uniqid() . '.webp';
				
				
				$file_path = $painting_config['upload_path'] . $unique_filename;
				
				if (in_array(strtolower($file_extension), array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'))) {
					if (move_uploaded_file($images_upload['tmp_name'][$index], $file_path)) {
						$image_upload_success[] = $unique_filename;
						$image_orig_names[] = $unique_filename;
					} else {
						$customErrorMessage = 'Error uploading ' . $name;
						$fullErrorMessage = $customErrorMessage;
					}
				} else {
					$customErrorMessage = 'Invalid file type: ' . $name;
					$fullErrorMessage = $customErrorMessage;
				}
			}
	
			if (!empty($image_upload_success)) 
			{
				
				$image_implode = implode(',', $image_orig_names);
				$get_upload_painting = $this->ArtistModel->get_upload_painting($ID,$painting_id);

				$Image = $get_upload_painting[0]->sub_by_artist;
				//print_r($Image);
				//$id= $get_upload_painting[0]->tem_paint_id;
					// $upload_painting = array(
					// 	'sub_by_artist' => 	$image_implode
					// );

				if(empty($Image))
				{
				
					$upload_painting = array(
						'sub_by_artist' => 	$image_implode
					);
				}else{
					$upload_painting = array(
					'sub_by_artist' => 	$image_implode. "," . $Image
					);
					
				}
				
				//print_r($upload_painting);
				$insert_painting = $this->ArtistModel->insert_painting($upload_painting, $ID,$painting_id);
	
				if ($insert_painting) {
					$this->session->set_flashdata('success', 'Painting added successfully');
					redirect('submit_painting/' . $painting_id);
				} else {
					$this->session->set_flashdata('error', 'Failed to add painting.');
					redirect('submit_painting/' . $painting_id);
				}
			} else {
				$this->session->set_flashdata('error', $fullErrorMessage);
				redirect('submit_painting/' . $painting_id);
			}
		} else {
			$this->session->set_flashdata('error', 'Painting image is required.');
			redirect('submit_painting/' . $painting_id);
		}
	}
	
	

	public function get_painting_artist($id)

	{
		$artist_id = $this->session->userdata('id');
		return $getphotos = $this->ArtistModel->get_painting_artist($id,$artist_id);
	}

}
