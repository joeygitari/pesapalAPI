<?php 
	require_once('header.php');
	// require_once('db/dbconnector.php');
    require_once('helper/pesapalV30Helper.php');

    $consumer_key = "qkio1BGGYAXTu2JOfm7XSXNruoZsrqEW";
    $consumer_secret = "osGQ364R49cXKeOYSpaOnT++rHs=";

    $api = 'demo';

    $helper = new pesapalV30Helper($api);

    $access = $helper->getAccessToken($consumer_key, $consumer_secret);
    $access_token = $access->token;
    // echo $access_token;

        
    if(isset($_GET['OrderTrackingId']))
        $orderTrackingId = $_GET['OrderTrackingId'];
        
    
    $status = $helper->getTransactionStatus($orderTrackingId, $access_token);

    // var_dump($status)
    
    // Update database.

    //IPN runs when there is a status change  and since this is a new transaction, 
    //the status has changed for UNKNOWN to PENDING/COMPLETED/FAILED
    
    // <b>Status: </b> <?php echo $status->payment_status_description 
?>
<h2 class="transform">Callback return URL</h2>
<div class="main" style = "height:125px">
        <b>Payment received successfully</b> <br />
        <br />
        <b>Order Tracking ID: </b> <?php echo $orderTrackingId; ?><br />
        <br />
        <b>Status: </b> <?php echo $status->payment_status_description; ?><br />  
   
</div>