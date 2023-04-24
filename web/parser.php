<?php
require_once "../vendor/autoload.php";

echo "here";

use GuzzleHttp\Client;
use voku\helper\HtmlDomParser;


function curlGetPage($url,$referer = 'localhost'){
     $ch = curl_init();
     curl_setopt($ch,CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']);
     curl_setopt($ch,CURLOPT_FOLLOWLOCATION, true);
     curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, false);
     curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
     curl_setopt($ch,CURLOPT_URL, $url);
     curl_setopt($ch,CURLOPT_REFERER, $referer);
     curl_setopt($ch,CURLOPT_HEADER, false);
     curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

     $response = curl_exec($ch);
     curl_close($ch);

     return $response;

}

$page =  curlGetPage('https://www.sport-express.ru/football/news/');

$html = HtmlDomParser::str_get_html($page);


foreach($html->find('.se-material__title.se-material__title--size-middle') as $post){
    echo $post->find('a')->text()[0]. '<br>';
}

