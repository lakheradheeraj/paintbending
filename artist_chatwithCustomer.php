<?php
$CI = &get_instance();
$loggedin = $this->session->userdata('id');
$req_id = $this->uri->segment(2);
$customerchat = $CI->getchat($req_id);


$customerid = $customerchat[0]->cud_id;

$getcustomer_name = $CI->getcustomer_name($customerid);



?>
<div class="d-flex align-items-center customer-chat">
    <img class="pe-3" src="<?php echo base_url(); ?>assets/images/avbbn (6).png" alt="">
    <h4><?php echo $getcustomer_name[0]->first_name  ?></h4>
</div>
<hr class="horizontal-line">
<?php
$artist_id = $this->session->userdata('id');


?>
<div id="result">
<div class="row mt-4 mb-4">
        <div class="col-12 text-center">
            <div class="load-more">
                <button class="border-0 bg-transparent" id="load-more-btn">Load more..</button>
            </div>
        </div>
    </div>
<!--chatbox-->
<div class="chat-box" id='messageBody'>
    <?php foreach ($customerchat as $chat) {
        $cud_id = $chat->cud_id;

        $senderid = $chat->sender;
        if ($senderid == $loggedin) {

    ?>
            <div class="direct-chat-messages d-flex justify-content-end">
                <div class="direct-chat-text">
                    <p><?php echo $chat->description; ?></p>
                    <?php
                    $timestamp = strtotime($chat->created_at);
                    $formattedDate = date('d, F, Y, h:i a', $timestamp);
                    ?>
                    <span><?php echo $formattedDate; ?></span>
                </div>
                <div class="direct-chat-img">
                    <?php $sessionData = $this->session->userdata('profile_image'); ?>
                    <img src="<?php echo base_url('/assets/artist_image/');
                                echo $sessionData; ?>" alt="">
                </div>
            </div>
        <?php } else { ?>

            <div class="direct-chat-messages msg-box-2 d-flex">
                <div class="direct-chat-img">
                    <?php
                    $customerImage = $CI->customerImage($cud_id);
                    $image = $customerImage[0]->profile_image;

                    ?>
                    <img src="<?php echo base_url('/assets/customer_image/');
                                echo $image; ?>" alt="">
                </div>
                <div class="direct-chat-text">
                    <p><?php echo $chat->description; ?></p>
                    <?php
                    $timestamp = strtotime($chat->created_at);
                    $formattedDate = date('d, F, Y, h:i a', $timestamp);
                    ?>
                    <span><?php echo $formattedDate; ?></span>
                </div>
            </div>
    <?php }
    } ?>

</div>
</div>
<form action="<?php echo base_url(); ?>artistsubmitchat/<?php echo $this->uri->segment(2); ?>/<?php echo $this->session->userdata('id') ?>" method="POST">
    <div class="reply-section">
        <div class="row mt-3">
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" class="form-control" name="chat" placeholder="Reply Here....">
                    <div class="send-btn">
                        <button class=" bg-transparent border-0"><i class="bi bi-paperclip"></i></button>
                        <button class=" bg-transparent border-0"><i class="bi bi-send"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </form>




<script>
    $(document).ready(function() {
        var offset = 10;
        var entriesPerRequest = 5;


        $('#load-more-btn').click(function() {
            var currentURL = window.location.href;
            var urlObject = new URL(currentURL);
            var pathSegments = urlObject.pathname.split('/');

            var req_id = pathSegments[3];
            var artist_id = pathSegments[4];
            
            var vdata = {
                req_id: req_id,
                artist_id: <?php echo  $this->session->userdata('id'); ?>,
                offset: offset
            }
            $.ajax({
                url: "<?php echo base_url() ?>Test/get_artist_more_chat",
                type: 'post',
                data: vdata,
                success: function(response) {

                    if (response.trim() !== '') {
                        $("#messageBody").html(response);
                        offset += entriesPerRequest;

                    } else {
                        console.log("no more chat");
                    }



                }
            });
        });
    });
</script>