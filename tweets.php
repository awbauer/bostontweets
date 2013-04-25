<?
$mysqli = new mysqli("XXXXXXXXXXX", "XXXXXXXXXXX", "XXXXXXXXXXX", "XXXXXXXXXXX");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$parties = array();

// full dataset available at https://www.dropbox.com/s/h8wezi2y6pzqfh4/041513_1606-1704_tweets.zip
$query = "SELECT * FROM `tweetsboston_withlocation` WHERE (geo_lat between 41 and 43) and (geo_long between -72 and -69) order by created_at";
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
$date = new DateTime($row["created_at"]);
$time = print_r($date->format("H:i"),true);
    $parties[] = array($row["geo_lat"],$row["geo_long"],$row["tweet_text"],$time,$row["screen_name"],$row["tweet_id"]);
}

echo json_encode($parties);
