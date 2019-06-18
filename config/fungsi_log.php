<?php
error_reporting(E_ALL ^ E_NOTICE);
function tambahlog($nik, $module, $aksi, $status){
    date_default_timezone_set('Asia/Jakarta');
    $tanggal=date('Y-m-d H:i:sa');
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $ip = $forward;
    }else{
        $ip = $remote;
    }

    // Get the ip address and info about client.
    @ $details = json_decode(file_get_contents("http://ipinfo.io/json"));
    @ $hostname=gethostbyaddr($_SERVER['REMOTE_ADDR']);

    // Get the query string from the URL.
    $QUERY_STRING = preg_replace("%[^/a-zA-Z0-9@,_=]%", '', $_SERVER['QUERY_STRING']);
    $browser      = $_SERVER['HTTP_USER_AGENT'];
    $refer        = $_SERVER['HTTP_REFERER'];
    $location     = $details->loc;
    $provider     = $details->org;
    $city         = $details->city;
    $state        = $details->region;
    $country      = $details->country;
    
    mysql_query("INSERT INTO log_user (nik, 
                              modul,
                              aksi,
                              status,
                              ip,
                              hostname,
                              browser,
                              refer,
                              location,
                              provider,
                              city,
                              state,
                              country,
                              waktu) 
                      VALUES ('$nik',
                              '$module',
                              '$aksi',
                              '$status',
                              '$ip',
                              '$hostname',
                              '$browser',
                              '$refer',
                              '$location',
                              '$provider',
                              '$city',
                              '$state',
                              '$country',
                              '$tanggal')");
}
 

?>