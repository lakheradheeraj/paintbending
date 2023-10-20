<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class ArtistModel extends CI_model
{

    function insertid_meta($meta_id)
    {

        $this->db->insert('artist_meta', $meta_id);
        $insert_id = $this->db->insert_id();
        //echo $this->db->last_query();
        return $insert_id;
    }



    function ArtistResetPass($ID, $data)
    {
        $this->db->where('id', $ID);
        $result = $this->db->update('users', $data);
        //echo $this->db->last_query();	

        return $result;
    }

    function update_personalinfo($ID, $update_info)
    {

        $this->db->where('reg_id', $ID);
        $result = $this->db->update('artist_meta', $update_info);
        //echo $this->db->last_query();
        //die;	
        return $result;
    }
    function fetch_info($ID)
    {
        $this->db->select('*');
        $this->db->from('artist_meta');
        $this->db->where('reg_id', $ID);
        $query = $this->db->get();
        $result = $query->result();
        $num_rows = $query->num_rows();
        // echo $this->db->last_query();      
        return $result;
    }
    function update_image($ID, $image_data)
    {


        $this->db->where('reg_id', $ID);
        $result = $this->db->update('artist_meta', $image_data);
        // echo $this->db->last_query();	
        return $result;
    }
    function checkimage($ID, $del_img)
    {
        $this->db->select('profile_image');
        $this->db->from('artist_meta');
        $this->db->where('reg_id', $ID);
        $this->db->where('profile_image', $del_img['profile_image']);

        $query = $this->db->get();
        $check = $query->result();
        //echo $this->db->last_query();      
        return $check;
    }

    function deleteprofile_image($ID, $del_img)
    {


        $this->db->where('reg_id', $ID);
        $result = $this->db->update('artist_meta', $del_img);
        // $this->db->last_query();	
        return $result;
    }
    function fetch_requestdata($artistID)
    {

        $this->db->select('*');
        $this->db->from('painting_requests');
        // $this->db->limit(5000);
        $this->db->where('artist_Id', $artistID);

        $this->query =  $this->db->get();
        //echo $this->db->last_query();


        return $this->query->result();
    }


    function custInfo($custId, $artistID)
    {
        $this->db->select('*');
        $this->db->from('painting_requests');
        $this->db->join('customer_meta', 'customer_meta.reg_id = painting_requests.customer_id');
        $this->db->where('painting_requests.customer_id', $custId);
        $this->db->where('painting_requests.artist_Id', $artistID);

        $this->query =  $this->db->get();
        //echo $this->db->last_query();

        return $this->query->result();
    }
    function fetch_randomrequest()
    {

        $this->db->select('*');
        $this->db->from('painting_requests');
        // $this->db->limit(5000);
        //$this->db->where('artist_Id', $artistID);
        $this->db->order_by('RAND()');
        $this->query =  $this->db->get();
        //echo $this->db->last_query();


        return $this->query->result();
    }



    function custrandom_Info($randomcus_id)
    {
        $this->db->select('*');
        $this->db->from('painting_requests');
        $this->db->join('customer_meta', 'customer_meta.reg_id = painting_requests.customer_id');
        $this->db->where('painting_requests.customer_id', $randomcus_id);
        // $this->db->where('painting_requests.artist_Id', $artistID);


        $this->db->order_by('RAND()');

        $this->query =  $this->db->get();

        return $this->query->result();
    }

    function request_ids()
    {

        $this->db->select('ID');
        $this->db->from('painting_requests');

        $this->query =  $this->db->get();
        //echo $this->db->last_query();


        return $this->query->result();
    }
    function random_title($randomID)
    {

        $this->db->select('painting_title');
        $this->db->from('painting_requests');
        $this->db->where('ID', $randomID);

        $this->query =  $this->db->get();
        //echo $this->db->last_query();


        return $this->query->result();
    }
    function random_description($randomID)
    {

        $this->db->select('description');
        $this->db->from('painting_requests');
        $this->db->where('ID', $randomID);

        $this->query =  $this->db->get();
        //echo $this->db->last_query();


        return $this->query->result();
    }
    function random_Sketches($randomID)
    {

        $this->db->select('scketch');
        $this->db->from('painting_requests');
        $this->db->where('ID', $randomID);

        $this->query =  $this->db->get();
        //echo $this->db->last_query();


        return $this->query->result();
    }
    function random_Images($randomID)
    {

        $this->db->select('referance_image	');
        $this->db->from('painting_requests');
        $this->db->where('ID', $randomID);

        $this->query =  $this->db->get();
        //echo $this->db->last_query();


        return $this->query->result();
    }
    function random_Video($randomID)
    {

        $this->db->select('reference_video	');
        $this->db->from('painting_requests');
        $this->db->where('ID', $randomID);

        $this->query =  $this->db->get();
        //echo $this->db->last_query();


        return $this->query->result();
    }
    function random_sub_byart($randomID)
    {

        $this->db->select('sub_by_artist');
        $this->db->from('painting_requests');
        $this->db->where('ID', $randomID);

        $this->query =  $this->db->get();
        //echo $this->db->last_query();


        return $this->query->result();
    }
    function random_requestinfo($request_info)
    {
        $this->load->database();
        $this->db->insert('random_request', $request_info);
        $insert_id = $this->db->insert_id();
        echo $this->db->last_query();
        //return $insert_id;
    }


    function fetch_customerreqdata($ID, $artistID)
    {


        $this->db->select('*');
        $this->db->from('painting_requests');
        //$this->db->join('artist_meta', 'artist_meta.reg_id = painting_requests.customer_id');
        $this->db->where('customer_id', $ID);
        $this->db->where('artist_Id', $artistID);

        $query = $this->db->get();
        $result = $query->result();
        $num_rows = $query->num_rows();
        //echo $this->db->last_query();      
        return $result;
    }


    function customerInfo($customerID)
    {
        $this->db->select('*');
        $this->db->from('customer_meta');
        $this->db->where('reg_id', $customerID);

        $this->query =  $this->db->get();
        //echo $this->db->last_query();

        return $this->query->result();
    }
    function cancel_req($ID, $artistID, $status)
    {
        $this->db->where('customer_id', $ID);
        $this->db->where('artist_Id', $artistID);

        $result = $this->db->update('painting_requests', $status);
        //echo $this->db->last_query();
        //die;	
        return $result;
    }

    function ADDpainting($painting_Data)
    {


        $this->db->insert('artist_paintings', $painting_Data);
        // return true;   
        $insert_id = $this->db->insert_id();
        // echo $this->db->last_query();
        return $insert_id;
    }

    function fetch_paintingDATA($artist_id, $offset=0)
    {
        $limit = 12;
        $this->db->select('*');
        $this->db->from('artist_paintings')->limit($limit, $offset);
        $this->db->where('artistID', $artist_id);
        $this->db->order_by('ID', 'desc');
        $query = $this->db->get();
        $result = $query->result();
        //$num_rows = $query->num_rows();
        // echo $this->db->last_query();      
        return $result;
    }




    function paintingDetail($ID)
    {
        $this->db->select('*');
        $this->db->from('artist_paintings');
        $this->db->where('ID', $ID);
        $query = $this->db->get();
        $result = $query->result();
        $num_rows = $query->num_rows();
        // echo $this->db->last_query();      
        return $result;
    }
    function artistDATA($id)
    {
        $this->db->select('*');
        $this->db->from('artist_meta');
        $this->db->where('reg_id', $id);

        $this->query =  $this->db->get();
        //echo $this->db->last_query();

        return $this->query->result();
    }
    function UPDATEpainting($new_painting_data, $ID)
    {
        $this->db->where('ID', $ID);
        $result = $this->db->update('artist_paintings', $new_painting_data);
        //echo $this->db->last_query();
        return $result;
    }
    public function getphotos($id)
    {
        $this->db->select('*');
        $this->db->from('artist_paintings');
        $this->db->where('ID', $id);
        $this->query =  $this->db->get();
        $result =  $this->query->result();
        return $result;
    }
    public function updatephotos($ID, $docData)
    {
        $this->db->where('ID', $ID);
        $result = $this->db->update('artist_paintings', $docData);
        //echo $this->db->last_query();
        return $result;
    }

    public function updatePaintingImage($ID,$docData)
    {
        $this->db->where('ID', $ID);
        $result = $this->db->update('artist_paintings', $docData);
        //echo $this->db->last_query();
        return $result;
    }

    public function artist_paintingdetail($painting_id)
    {
        $this->db->select('*');
        $this->db->from('artist_paintings');
        $this->db->where('ID', $painting_id);
        $this->query =  $this->db->get();
        return $result =  $this->query->result();
    }



    public function painting_rating($id)
    {

        $this->db->select_avg('rating', 'avgrat');
        $this->db->select('COUNT(id) as totalreview');
        $this->db->where('painting_id', $id);
        $query = $this->db->get('painting_reviews');
        $result = $query->row();
        $avgrat = $result->avgrat;
        $totalreview = $result->totalreview;
        //echo  $this->db->last_query(); 
        return array('avgrat' => $avgrat, 'totalreview' => $totalreview);
    }


    public function painting_avgrat($id)
    {

        $this->db->select_avg('rating', 'avgrat');
        $this->db->select('COUNT(id) as totalreview');
        $this->db->where('painting_id', $id);
        $query = $this->db->get('painting_reviews');
        $result = $query->row();
        $avgrat = $result->avgrat;
        $totalreview = $result->totalreview;
        //echo  $this->db->last_query(); 
        return array('avgrat' => $avgrat, 'totalreview' => $totalreview);
    }




    public function getchat($id)
    {
        $this->db->select('*');
        $this->db->from('chat');
        $this->db->where('req_id', $id);
        $this->db->order_by('created_at', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function customerImage($id)
    {
        $this->db->select('profile_image');
        $this->db->from('customer_meta');
        $this->db->where('reg_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function submitchat($data)
    {
        $this->db->insert('chat', $data);
        $insert_id = $this->db->insert_id();
        $this->db->last_query();
        return $insert_id;
    }
    public function getcustomer_name($id)
    {
        $this->db->select('first_name');
        $this->db->from('customer_meta');
        $this->db->where('reg_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }


    public function getrandm_painting()
    {
        $limit = 12;
        $this->db->select('*');
        $this->db->from('artist_paintings')->limit($limit);
        // $this->db->order_by('ID', 'DESC');
        $this->db->order_by('rand()');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }


    public function get_posts($offset = 0)
    {
        $limit = 10;
        $query = $this->db->select('*')->from('artist_paintings')->limit($limit, $offset)->get();
        return $query->result();
    }

    
  public function get_category($paintingID)
    {

    $this->db->select('title');
    $this->db->from('painting_category');
    $this->db->where('ID ', $paintingID);
    $this->query =  $this->db->get();
    //echo $this->db->last_query();
    return $this->query->result();
  
    }


    public function delete_Paint($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete('artist_paintings');
    }
    

    public function painting_category()
    {
        $this->db->select('*');
        $this->db->from('painting_category');
        $this->query =  $this->db->get();
        //echo $this->db->last_query();
        return $this->query->result();

    }

    public function artist_category()
    {
        $this->db->select('*');
        $this->db->from('artist_category');
        $this->query =  $this->db->get();
        //echo $this->db->last_query();
        return $this->query->result();
    }

    public function GET_painting($postData)
    {
        $this->db->select('painting_image,painting_frame');
        $this->db->from('artist_paintings');
    //    $this->db->where('painting_image',$paintingName);
        $this->db->where('ID',$postData);
        $this->query =  $this->db->get();
        //echo $this->db->last_query();
        return $this->query->result();

    }


    public function update_painting($data,$postData)
    {
        $this->db->where('ID', $postData);
        $result = $this->db->update('artist_paintings', $data);
        //echo $this->db->last_query();
        return $result;
    }

    function artist_info($search,$offset,$id)
    {
        $this->db->distinct();
        $this->db->select('users.*, artist_meta.*');
        $this->db->from('users');
        $this->db->order_by("user_name", "asc");
        $this->db->join('artist_meta', 'users.id = artist_meta.reg_id', 'left'); 
        $this->db->where('user_status', 1);
        $this->db->where('user_role', 2);
        //$this->db->where('reg_id' != $id);
        $this->db->where('reg_id !=', $id);

        if($search != ''){
        $this->db->like('artist_fname',$search);
        }
        $this->db->limit( $offset);
        $query = $this->db->get();
  // echo $this->db->last_query();      

        return $query->result(); 
       

    }
    function randomrequest_ids()
    {

        $this->db->select('id');
        $this->db->from('temp_painting_request');
        $this->db->where('selected_artist', " ");

        $this->query =  $this->db->get();
       // echo $this->db->last_query();


        return $this->query->result();
    }
    function randomrequest_title($randomID)
    {
       
        $this->db->select('painting_title');
        $this->db->from('temp_painting_request');
        $this->db->where('id', $randomID);

        $this->query =  $this->db->get();
        //echo $this->db->last_query();


        return $this->query->result();
    }
    function randomrequest_tag($randomID)
    {

        $this->db->select('tag');
        $this->db->from('temp_painting_request');
        $this->db->where('id', $randomID);

        $this->query =  $this->db->get();
        //echo $this->db->last_query();


        return $this->query->result();
    }
    function random_script($randomID)
    {

        $this->db->select('script');
        $this->db->from('temp_painting_request');
        $this->db->where('id', $randomID);

        $this->query =  $this->db->get();
        //echo $this->db->last_query();


        return $this->query->result();
    }


    public function artist_request_painting($ID)

    {
        $this->db->select('*');
        $this->db->from('painting_requests');
        $this->db->where('artist_Id', $ID);
        $this->db->order_by('ID', 'desc');
        $this->query =  $this->db->get();
        //echo $this->db->last_query();
        return $this->query->result();
    }


    function insert_painting($upload_painting,$ID,$painting_id)
    {

        $this->db->where('artist_Id', $ID);
        $this->db->where('tem_paint_id',$painting_id);
        $result = $this->db->update('painting_requests', $upload_painting);
        return $result;
    }


    function get_upload_painting($ID,$painting_id)
    {
        $this->db->select('sub_by_artist,tem_paint_id');
        $this->db->from('painting_requests');
        $this->db->where('artist_Id', $ID);
        $this->db->where('tem_paint_id', $painting_id);
        $this->query =  $this->db->get();
        //echo $this->db->last_query();
        return $this->query->result();
    }


    public function get_painting_artist($id,$get_painting_artist)
    {
        $this->db->select('*');
        $this->db->from('painting_requests');
        $this->db->where('tem_paint_id', $id);
        $this->db->where('artist_Id', $get_painting_artist);
        $this->query =  $this->db->get();
        $result =  $this->query->result();
        return $result;
    }

}
