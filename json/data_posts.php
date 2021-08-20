<?php

if(isset($_GET["tag"])){
    if(!empty($_GET["tag"])){

?>

<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT posts.*,tags.tag_title AS tag_title FROM posts,tags WHERE posts.post_tag = tags.tag_id AND posts.post_tag='".$_GET["tag"]."' ORDER BY posts.post_id DESC";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$posts = array();
$id = 0;

function time_ago($date) {
    if (empty($date)) {
        return "-";
    }
    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths = array("60", "60", "24", "7", "4.35", "12", "10");
    $now = time();
    $uni_date = strtotime($date);
// check validity of date
    if (empty($uni_date)) {
        return "-";
    }
// is it future date or past date
    if ($now > $uni_date) {
        $difference = $now - $uni_date;
        $tense = "ago";
    } else {
        $difference = $uni_date - $now;
        $tense = "from now";
    }
    for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
        $difference /= $lengths[$j];
    }
    $difference = round($difference);
    if ($difference != 1) {
        $periods[$j].= "s";
    }
    return "$difference $periods[$j] {$tense}";
}

while($row = mysqli_fetch_array($result)) 
{	
	$post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_description = $row['post_description'];
    $post_tag = $row['post_tag'];
    $post_featured = $row['post_featured'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $tag_title = $row['tag_title'];

    $posts[] = array(
    	'id'=> $id++,
    	'post_id'=> $post_id,
    	'post_title'=> html_entity_decode($post_title),
    	'post_description'=> $post_description,
        'post_tag'=> $post_tag,
        'post_featured'=> $post_featured,
        'published'=> $post_date,
    	'post_date'=> time_ago($post_date),
    	'post_image'=> $post_image,
    	'tag_title'=> $tag_title,
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($posts);
print ($json_string)

?>

<?php

}}

?>

<?php

    if(empty($_GET["tag"])){

?>

<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT posts.*,tags.tag_title AS tag_title FROM posts,tags WHERE posts.post_tag = tags.tag_id ORDER BY posts.post_id DESC";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$posts = array();
$id = 0;

function time_ago($date) {
    if (empty($date)) {
        return "-";
    }
    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths = array("60", "60", "24", "7", "4.35", "12", "10");
    $now = time();
    $uni_date = strtotime($date);
// check validity of date
    if (empty($uni_date)) {
        return "-";
    }
// is it future date or past date
    if ($now > $uni_date) {
        $difference = $now - $uni_date;
        $tense = "ago";
    } else {
        $difference = $uni_date - $now;
        $tense = "from now";
    }
    for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
        $difference /= $lengths[$j];
    }
    $difference = round($difference);
    if ($difference != 1) {
        $periods[$j].= "s";
    }
    return "$difference $periods[$j] {$tense}";
}

while($row = mysqli_fetch_array($result)) 
{   
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_description = $row['post_description'];
    $post_tag = $row['post_tag'];
    $post_featured = $row['post_featured'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $tag_title = $row['tag_title'];

    $posts[] = array(
        'id'=> $id++,
        'post_id'=> $post_id,
        'post_title'=> html_entity_decode($post_title),
        'post_description'=> $post_description,
        'post_tag'=> $post_tag,
        'post_featured'=> $post_featured,
        'published'=> $post_date,
        'post_date'=> time_ago($post_date),
        'post_image'=> $post_image,
        'tag_title'=> $tag_title,
        );

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($posts);
print ($json_string)

?>

<?php

}

?>
