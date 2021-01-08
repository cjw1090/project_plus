<?php
if(empty($_SESSION)) {session_start();}
class ShopApiManager { 
  public function queryNaver($query, $count){
    if($query != ""){
    $client_id = "NcBAj7m4ACOr6jEo5ZU7";
    $client_secret = "QTNegpTx9P";
    $encText = urlencode($query);
    $url = "https://openapi.naver.com/v1/search/shop.xml?display=".$count."&start=1&query=".$encText; // json 결과
    $is_post = false;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, $is_post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $headers = array();
    $headers[] = "X-Naver-Client-Id: ".$client_id;
    $headers[] = "X-Naver-Client-Secret: ".$client_secret;
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec ($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    /*echo "status_code:".$status_code."
  ";*/
    curl_close ($ch);
    if($status_code == 200) {
      return $response;
    } 
    else{
      echo "Error 내용:".$response;
    }
  }
  }




public function getShopData($query, $count){
  if($query != ""){
  $xml = simplexml_load_string($this->queryNaver($query, $count));
  $result = array();
  $shop = array();

  
    foreach($xml->channel->item as $response){
      if($response->productType == 1){
            
            $result['title'] = (string)$response->title;
            $result['image'] = (string)$response->image;
            $result['lprice'] = (int)$response->lprice;
            $result['hprice'] = (int)$response->hprice;
        
      }               
      $shop[] = $result;
    }
  

  $_SESSION['shop'] = $shop;
  $_SESSION['count'] = $count;
  $_SESSION['query'] = $query;
  return $shop;
}

}
}

?>
 

