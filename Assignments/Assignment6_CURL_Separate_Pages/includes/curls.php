<?php include_once 'dbconnect.php';?>

<?php
$curl_handle = curl_init();
curl_setopt($curl_handle, CURLOPT_URL, "https://harishmarepalli.com/includes/fetchAllUsers.php");
curl_setopt($curl_handle, CURLOPT_HEADER, 0);
curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,true);
$softSolContents = curl_exec($curl_handle);
curl_setopt($curl_handle, CURLOPT_URL, "https://saitejagoruganthu.com/includes/expose.php");
curl_setopt($curl_handle, CURLOPT_HEADER, 0);
curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,true);
$gtsToursContents = curl_exec($curl_handle);
curl_setopt($curl_handle, CURLOPT_URL, "https://ravirajindraganti.com/includes/displayUsers.php");
curl_setopt($curl_handle, CURLOPT_HEADER, 0);
curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,true);
$globeTrotterContents = curl_exec($curl_handle);

$allContents = $softSolContents."#".$gtsToursContents.'#'.$globeTrotterContents;
curl_close($curl_handle);
?>