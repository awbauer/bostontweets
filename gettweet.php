<?
$id = filter_var($_GET["id"],FILTER_SANITIZE_NUMBER_INT);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.twitter.com/1/statuses/oembed.json?id=".$id); // Depreciated, I know.
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
?>