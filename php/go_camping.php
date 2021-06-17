<?php

$ch = curl_init();
$url = 'http://api.visitkorea.or.kr/openapi/service/rest/GoCamping/locationBasedList'; /*URL*/
$queryParams = '?' . urlencode('ServiceKey') . '=msu5J3DRpAPV4GOEPpCFZ7E9HmzDAtZezd3%2BEYPi%2BguLxFhYtGhnws1uxcOL8gc9oqwFnez3s79rHAM7pkUdeg%3D%3D'; /*Service Key*/
$queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
$queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('10'); /**/
$queryParams .= '&' . urlencode('MobileOS') . '=' . urlencode('ETC'); /**/
$queryParams .= '&' . urlencode('MobileApp') . '=' . urlencode('AppTest'); /**/
$queryParams .= '&' . urlencode('mapX') . '=' . urlencode('128.6142847'); /**/
$queryParams .= '&' . urlencode('mapY') . '=' . urlencode('36.0345423'); /**/
$queryParams .= '&' . urlencode('radius') . '=' . urlencode('2000'); /**/

curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$response = curl_exec($ch);
curl_close($ch);

//var_dump($response);
$xml = simplexml_load_string($response);
$json = json_encode($xml, JSON_UNESCAPED_UNICODE); // convert the XML string to JSON
echo $json;

?>