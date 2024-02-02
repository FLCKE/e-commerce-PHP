<?php
    error_reporting(E_ALL);
     $url1="http://localhost:8080/api/v1/getuser?id=".$_POST["user_id"];
    $curl=curl_init($url1);
    curl_setopt($curl, CURLOPT_URL, $url1);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response1=curl_exec($curl);
    
    curl_close($curl);
    
    $user_data=json_decode($response1);
    echo $user_data->user_name;
    $url="http://localhost:8080/api/v1/putuser?id=".$_POST["user_id"];

    $curl=curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    $data=array('user_name' => $user_data->user_name, 'email' => $_POST["email"], 'password' => $_POST["password"], 'first_name' =>  $user_data->first_name, 'last_name' =>  $user_data->last_name, 'phone_number' =>  $user_data->phone_number);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    $reponse=curl_exec($curl);

    curl_close($curl);
    echo $reponse;
    echo curl_getinfo($curl, CURLINFO_HTTP_CODE);