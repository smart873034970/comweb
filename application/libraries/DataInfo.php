<?php
class DataInfo{
    public function __construct($_limit=''){
        // init the data
        $this->limit = $_limit;
        // 
        $this->user_ip = $this->GetIp();
        $this->user_agent = urlencode($this->_GetUseragaent());
    }
    private $url;
    private $limit;
    private $user_ip;
    private $user_agent;


    public function GetData($_keyw, $_loca=''){
        if(empty($_loca)){
            $_loca = $this->GetLocation();
        }
        $this->url = sprintf('http://api.indeed.com/ads/apisearch?publisher=4058004867356140&q=%s&l=%s&sort=&radius=&st=&jt=&start=&limit=25&fromage=&filter=&latlong=1&co=us&chnl=&userip=%s&useragent=%s&v=2',$_keyw, $_loca, $this->user_ip, $this->user_agent);
        // echo $url;
        $result = file_get_contents($this->url);
        $get_result = $http_response_header;
        if(strcmp($get_result[0], 'HTTP/1.1 200 OK') != 0){
            return 2;   //ge the jobs timeout
        }


$xmlstr=<<<XML
$result
XML;
        if(empty($xmlstr)){
            return 1;   //result为空
        }
        $doc = new DOMDocument();
        $doc->loadXML($xmlstr); //读取xml数据
        $person = $doc->getElementsByTagName('result');
        $jobtitle = array('');
        $city = array('');
        $date=array('');
        $company = array('');
        $url = array('');
        $source = array('');
        $snippet = array('');
        foreach ($person as $val) {
            array_push($jobtitle, $val->getElementsByTagName('jobtitle')->item(0)->nodeValue);
            array_push($city, $val->getElementsByTagName('city')->item(0)->nodeValue);
            array_push($date, $val->getElementsByTagName('date')->item(0)->nodeValue);
            array_push($url, $val->getElementsByTagName('url')->item(0)->nodeValue);
            array_push($company, $val->getElementsByTagName('company')->item(0)->nodeValue);
            array_push($source, $val->getElementsByTagName('source')->item(0)->nodeValue);
            array_push($snippet, $val->getElementsByTagName('snippet')->item(0)->nodeValue);
        }
        return array('jobtitle' => $jobtitle, 'city' => $city, 'date' => $date, 'url' => $url, 'company' => $company, 'source' => $source, 'snippet' => $snippet);
}
    public function GetIp(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
            //check ip from share internet 
            { $ip=$_SERVER['HTTP_CLIENT_IP']; } 
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
            //to check ip is pass from proxy 
            { $ip=$_SERVER['HTTP_X_FORWARDED_FOR']; } 
        else 
            { $ip=$_SERVER['REMOTE_ADDR']; } 
        // return $ip; 
        return '98.116.2.33';
    }
    public function GetLocation(){
        try{
            $country = @file_get_contents("http://www.telize.com/geoip/".$this->user_ip, false);
        }catch(Exception $e){
            return 'NewYork';
        }
        $de_json = json_decode($country,TRUE);
        // get the city
        if(!empty($de_json['city'])){
            $location = $de_json['city'];
        }else{
            $location ='New York';  //default city is NewYork
        }
    
        return str_replace(" ", "", $location);
    }

    private function _GetUseragaent(){
        return $_SERVER['HTTP_USER_AGENT'];
    }
}

?>