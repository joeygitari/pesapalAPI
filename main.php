<?php
class pesapalV3Helper {
  public $url;

  /**
   * $consumer_key - register business account on www.pesapal.com or demo.pesapal.com 
   * $consumer_secret - register business account on www.pesapal.com or demo.pesapal.com 
   * Please ensure you register on the correct link. 
   * Live API = www.pesapal.com
   * Demo API = demo.pesapal.com
   */
  public function getAccessToken($consumer_key, $consumer_secret){
    /**
     *  Sample keys (Kenya):
     *  $consumer_key = "qkio1BGGYAXTu2JOfm7XSXNruoZsrqEW";
     *  $consumer_secret = "osGQ364R49cXKeOYSpaOnT++rHs=";
     */
    $headers = array();
    $headers['accept'] = 'text/plain';
    $headers['content-type'] = 'application/json';

    $postData = array();
    $postData['consumer_key'] = $consumer_key;
    $postData['consumer_secret'] = $consumer_secret;
    $endPoint = $this->url.'/api/Auth/RequestToken';
    $response = $this->curlRequest($endPoint, $headers, $postData);
    
    return $response->token;
  }

  public function getNotificationId(){
    /**
     *  Sample keys (Kenya):
     *  $consumer_key = "qkio1BGGYAXTu2JOfm7XSXNruoZsrqEW";
     *  $consumer_secret = "osGQ364R49cXKeOYSpaOnT++rHs=";
     */
    $headers = array();
    $headers['accept'] = 'text/plain';
    $headers['content-type'] = 'application/json';
    $headers['authorization'] = 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJodHRwOi8vc2NoZW1hcy5taWNyb3NvZnQuY29tL3dzLzIwMDgvMDYvaWRlbnRpdHkvY2xhaW1zL3VzZXJkYXRhIjoiZWQ2MTkwMGYtZGNiMy00NjM2LWIxNGUtY2U1MGQwYzk2M2I1IiwidWlkIjoicWtpbzFCR0dZQVhUdTJKT2ZtN1hTWE5ydW9ac3JxRVciLCJuYmYiOjE2ODYwNDgzNzAsImV4cCI6MTY4NjA1MTk3MCwiaWF0IjoxNjg2MDQ4MzcwLCJpc3MiOiJodHRwOi8vY3licWEucGVzYXBhbC5jb20vIiwiYXVkIjoiaHR0cDovL2N5YnFhLnBlc2FwYWwuY29tLyJ9.sP1b2RLrgjzs3EQlJrGE00oIbZu1doSvbkL2J7ZbHjc';

    $postData = array();
    $postData['url'] = 'http://localhost:8080/callback';
    $postData['ipn_notification_type'] = 'POST';
    $endPoint = 'https://cybqa.pesapal.com/pesapalv3/api/URLSetup/RegisterIPN';
    $response = $this->curlRequest($endPoint, $headers, $postData);
    
    print_r($response);
  }

  /**
   * $request = an object from your system
   * $access_token  = token received from calling getAccessToken()
   */
  public function getMerchertOrderURL($request, $access_token){
    /*
      ** notification_id **
        - To load iframe, please use 30b7daff-7b3e-4159-a39f-e29f5e546651 
        - However, we need your IPN end point url for use to register it on the demo server. 
        - Once registered, we will share a new notification_id you will use instead of the above id.
    */

    $headers = array();
    $headers['accept'] = 'text/plain';
    $headers['content-type'] = 'application/json';
    $headers['authorization'] = 'Bearer '.$access_token;

    $postData = array();
    $postData["language"] = "EN";
    $postData["currency"] = "KES";
    $postData["amount"] = "20";
    $postData["id"] = "1515111111";
    $postData["description"] = "Description";
    $postData["billing_address"]["phone_number"] = "0706804187"; //Optional if we have email
    $postData["billing_address"]["email_address"] = "jgitaridev@gmail.com"; //Optional if we have phone
    $postData["billing_address"]["country_code"] = "KES"; //ISO codes (2 digits)
    $postData["billing_address"]["first_name"] = "First";
    $postData["billing_address"]["middle_name"] = "";
    $postData["billing_address"]["last_name"] = "Last";
    $postData["billing_address"]["line_1"] = "Lithuli";
    $postData["billing_address"]["line_2"] = "Nairobi";
    $postData["billing_address"]["city"] = "City";
    $postData["billing_address"]["state"] = "";
    $postData["billing_address"]["postal_code"] = "0010";
    $postData["billing_address"]["zip_code"] = "0854778";
    $postData["callback_url"] = "http://localhost:8080/callback"; //Actual URL
    $postData["notification_id"] = "30b7daff-7b3e-4159-a39f-e29f5e546651"; //30b7daff-7b3e-4159-a39f-e29f5e546651  
    $postData["terms_and_conditions_id"] = "";
    
    $endPoint = $this->url.'/api/Transactions/SubmitOrderRequest';
    $response = $this->curlRequest($endPoint, $headers, $postData);
    
    print_r($access_token);
  } //redirect_url

  /**
   * $orderTrackingId - Guid you received from calling getMerchertOrderURL()
   * $access_token  = Token you received from calling getAccessToken()
   */
  public function getTransactionStatus($orderTrackingId, $access_token){
 
    $headers = array();
    $headers['accept'] = 'text/plain';
    $headers['content-type'] = 'application/json';
    $headers['authorization'] = 'Bearer '.$access_token;
    
    $endPoint = $this->url.'/api/Transactions/GetTransactionStatus?orderTrackingId='.$orderTrackingId;
    $response = $this->curlRequest($endPoint, $headers);
    
    return $response;
  }

  public function curlRequest($url, $headers = null, $postData=null){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_TIMEOUT,30);
    if($postData && count($postData)) {
      $postDataJson = json_encode($postData);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept: '.$headers['accept'],
        'Content-Type: '.$headers['content-type'],
       
      ));
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postDataJson);
    }else if($postData==null && count($headers)){
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept: '.$headers['accept'],
        'Authorization: '.$headers['authorization']
      ));
    }

    $response = curl_exec($ch);
    if ($error_no = curl_errno($ch)) {
      $error_msg = curl_error($ch);
     

      return $response;
    }

    $response = json_decode($response);
    curl_close($ch);

    return $response;
  }
}
