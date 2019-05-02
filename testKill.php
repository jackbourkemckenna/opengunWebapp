<?php

//curl -i -H "Content-Type: application/json" -X POST -d '{"title":"Read a book"}' http://localhost:5000/to

//curl -XPOST -H 'Content-Type: application/json' http://172.31.18.100:5000/api/add -d '{"name": "ruan", "country": "south africa", "age": 30}'

//curl -XPOST -H 'Content-Type: application/json' http://172.31.18.100:5000/api/add -d '{"name": "ruan", "country": "south africa", "age": 30}'

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "5000",
  CURLOPT_URL => "http://172.31.18.100:5000/api/add",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"token\": \"Anto\", \"status\": \"OFF\"}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: 63ff395e-61b6-542d-ab7d-0c596a9d485f"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
