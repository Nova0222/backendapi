<?php

/*--------------------*/
// App Name: GoFit
// Author: Wicombit
// Author Profile: https://codecanyon.net/user/wicombit/portfolio
/*--------------------*/

function connect($database){
    try{
        $connect = new PDO('mysql:host='. $database['host'] .';dbname='. $database['db'], $database['user'], $database['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        return $connect;
        
    }catch (PDOException $e){
        return false;
    }
}

function cleardata($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars ($data);
    return $data;
}

function actual_page(){
    
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

function number_pages($items_per_page, $connect){

    $total_places = $connect->prepare('SELECT FOUND_ROWS() AS total');
    $total_places->execute();
    $total_places = $total_places->fetch()['total'];

    $number_pages = ceil($total_places / $items_per_page);
    return $number_pages;
}

/////////////////////////////////////////////////////////////////////////////////// EXERCISES

function get_all_exercises($connect)
{
    $sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS exercises.*, equipments.equipment_title AS equipment_title, levels.level_title AS level_title, GROUP_CONCAT(bodyparts.bodypart_title) AS bodypart_title FROM exercises JOIN exercises_bodyparts ON exercises_bodyparts.exercise_id = exercises.exercise_id JOIN equipments ON exercises.exercise_equipment = equipments.equipment_id JOIN levels ON exercises.exercise_level = levels.level_id JOIN bodyparts ON bodyparts.bodypart_id = exercises_bodyparts.bodypart_id GROUP BY exercises.exercise_id ORDER BY exercises.exercise_id DESC");

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function id_exercise($id){
    return (int)cleardata($id);
}

function get_exercise_per_id($connect, $id){
    $sentence = $connect->query("SELECT exercises.*,equipments.equipment_title AS equipment_title, levels.level_title AS level_title, GROUP_CONCAT(bodyparts.bodypart_title) AS bodypart_title FROM exercises JOIN exercises_bodyparts ON exercises_bodyparts.exercise_id = exercises.exercise_id JOIN bodyparts ON bodyparts.bodypart_id = exercises_bodyparts.bodypart_id JOIN equipments ON exercises.exercise_equipment = equipments.equipment_id JOIN levels ON exercises.exercise_level = levels.level_id WHERE exercises.exercise_id = $id GROUP BY exercises.exercise_id LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_exercises($connect){

$total_numbers = $connect->prepare('SELECT * FROM exercises');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function selected_exercises1($connect){

if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare('SELECT exercises.exercise_title, exercises.exercise_id, exercises.exercise_image FROM exercises JOIN we_day1 ON we_day1.exercise_id = exercises.exercise_id JOIN workouts ON we_day1.workout_id = ? GROUP BY we_day1.exercise_id');
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function not_selected_exercises1($connect){

 if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare('SELECT exercises.exercise_title, exercises.exercise_id, exercises.exercise_image FROM exercises WHERE exercises.exercise_id NOT IN (SELECT we_day1.exercise_id FROM we_day1 WHERE we_day1.workout_id = ? GROUP BY we_day1.exercise_id)');
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function selected_exercises2($connect){

if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare('SELECT exercises.exercise_title, exercises.exercise_id, exercises.exercise_image FROM exercises JOIN we_day2 ON we_day2.exercise_id = exercises.exercise_id JOIN workouts ON we_day2.workout_id = ? GROUP BY we_day2.exercise_id');
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function not_selected_exercises2($connect){

 if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare('SELECT exercises.exercise_title, exercises.exercise_id, exercises.exercise_image FROM exercises WHERE exercises.exercise_id NOT IN (SELECT we_day2.exercise_id FROM we_day2 WHERE we_day2.workout_id = ? GROUP BY we_day2.exercise_id)');
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function selected_exercises3($connect){

if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare('SELECT exercises.exercise_title, exercises.exercise_id, exercises.exercise_image FROM exercises JOIN we_day3 ON we_day3.exercise_id = exercises.exercise_id JOIN workouts ON we_day3.workout_id = ? GROUP BY we_day3.exercise_id');
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function not_selected_exercises3($connect){

 if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare('SELECT exercises.exercise_title, exercises.exercise_id, exercises.exercise_image FROM exercises WHERE exercises.exercise_id NOT IN (SELECT we_day3.exercise_id FROM we_day3 WHERE we_day3.workout_id = ? GROUP BY we_day3.exercise_id)');
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function selected_exercises4($connect){

if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare('SELECT exercises.exercise_title, exercises.exercise_id, exercises.exercise_image FROM exercises JOIN we_day4 ON we_day4.exercise_id = exercises.exercise_id JOIN workouts ON we_day4.workout_id = ? GROUP BY we_day4.exercise_id');
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function not_selected_exercises4($connect){

 if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare('SELECT exercises.exercise_title, exercises.exercise_id, exercises.exercise_image FROM exercises WHERE exercises.exercise_id NOT IN (SELECT we_day4.exercise_id FROM we_day4 WHERE we_day4.workout_id = ? GROUP BY we_day4.exercise_id)');
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function selected_exercises5($connect){

if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare('SELECT exercises.exercise_title, exercises.exercise_id, exercises.exercise_image FROM exercises JOIN we_day5 ON we_day5.exercise_id = exercises.exercise_id JOIN workouts ON we_day5.workout_id = ? GROUP BY we_day5.exercise_id');
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function not_selected_exercises5($connect){

 if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare('SELECT exercises.exercise_title, exercises.exercise_id, exercises.exercise_image FROM exercises WHERE exercises.exercise_id NOT IN (SELECT we_day5.exercise_id FROM we_day5 WHERE we_day5.workout_id = ? GROUP BY we_day5.exercise_id)');
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function selected_exercises6($connect){

if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare('SELECT exercises.exercise_title, exercises.exercise_id, exercises.exercise_image FROM exercises JOIN we_day6 ON we_day6.exercise_id = exercises.exercise_id JOIN workouts ON we_day6.workout_id = ? GROUP BY we_day6.exercise_id');
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function not_selected_exercises6($connect){

 if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare('SELECT exercises.exercise_title, exercises.exercise_id, exercises.exercise_image FROM exercises WHERE exercises.exercise_id NOT IN (SELECT we_day6.exercise_id FROM we_day6 WHERE we_day6.workout_id = ? GROUP BY we_day6.exercise_id)');
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function selected_exercises7($connect){

if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare('SELECT exercises.exercise_title, exercises.exercise_id, exercises.exercise_image FROM exercises JOIN we_day7 ON we_day7.exercise_id = exercises.exercise_id JOIN workouts ON we_day7.workout_id = ? GROUP BY we_day7.exercise_id');
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function not_selected_exercises7($connect){

 if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare('SELECT exercises.exercise_title, exercises.exercise_id, exercises.exercise_image FROM exercises WHERE exercises.exercise_id NOT IN (SELECT we_day7.exercise_id FROM we_day7 WHERE we_day7.workout_id = ? GROUP BY we_day7.exercise_id)');
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function get_exercises_list($connect){

$sentence = $connect->prepare('SELECT exercises.*, GROUP_CONCAT(bodyparts.bodypart_title) AS bodypart_title FROM exercises JOIN exercises_bodyparts ON exercises_bodyparts.exercise_id = exercises.exercise_id JOIN bodyparts ON bodyparts.bodypart_id = exercises_bodyparts.bodypart_id GROUP BY exercises.exercise_id');
$sentence->execute(array());
return $sentence->fetchAll();

}

/////////////////////////////////////////////////////////////////////////////////// WORKOUTS

function get_all_workouts($connect)
{
    
    $sentence = $connect->prepare("SELECT workouts.*,goals.goal_title AS goal_title, levels.level_title AS level_title FROM workouts,goals,levels WHERE workouts.workout_goal = goals.goal_id AND workouts.workout_level = levels.level_id ORDER BY workout_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_workout($id_workout){
    return (int)cleardata($id_workout);
}

function get_workout_per_id($connect, $id_workout){
    $sentence = $connect->query("SELECT workouts.*,goals.goal_title AS goal_title, levels.level_title AS level_title FROM workouts,goals,levels WHERE workouts.workout_goal = goals.goal_id AND workouts.workout_level = levels.level_id AND workout_id = $id_workout LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_workouts($connect){

$total_numbers = $connect->prepare('SELECT * FROM workouts');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

/////////////////////////////////////////////////////////////////////////////////// POSTS

function get_all_posts($connect)
{
    
    $sentence = $connect->prepare("SELECT posts.*,tags.tag_title AS tag_title FROM posts,tags WHERE posts.post_tag = tags.tag_id ORDER BY post_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_post($id_post){
    return (int)cleardata($id_post);
}

function get_post_per_id($connect, $id_post){
    $sentence = $connect->query("SELECT posts.*,tags.tag_title AS tag_title FROM posts,tags WHERE post_id = $id_post AND posts.post_tag = tags.tag_id LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_posts($connect){

$total_numbers = $connect->prepare('SELECT * FROM posts');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

/////////////////////////////////////////////////////////////////////////////////// DIETS

function get_all_diets($connect)
{
    
    $sentence = $connect->prepare("SELECT diets.*,categories.category_title AS category_title FROM diets,categories WHERE diets.diet_category = categories.category_id ORDER BY diet_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_diet($id_diet){
    return (int)cleardata($id_diet);
}

function get_diet_per_id($connect, $id_diet){
    $sentence = $connect->query("SELECT diets.*,categories.category_title AS category_title FROM diets,categories WHERE diet_id = $id_diet AND diets.diet_category = categories.category_id LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_diets($connect){

$total_numbers = $connect->prepare('SELECT * FROM diets');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

/////////////////////////////////////////////////////////////////////////////////// EQUIPMENTS

function get_all_equipments($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM equipments ORDER BY equipment_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_equipment($id_equipment){
    return (int)cleardata($id_equipment);
}

function get_equipment_per_id($connect, $id_equipment){
    $sentence = $connect->query("SELECT * FROM equipments WHERE equipment_id = $id_equipment LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_equipments($connect){

$total_numbers = $connect->prepare('SELECT * FROM equipments');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

/////////////////////////////////////////////////////////////////////////////////// LEVELS

function get_all_levels($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM levels ORDER BY level_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_level($id_level){
    return (int)cleardata($id_level);
}

function get_level_per_id($connect, $id_level){
    $sentence = $connect->query("SELECT * FROM levels WHERE level_id = $id_level LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_levels($connect){

$total_numbers = $connect->prepare('SELECT * FROM levels');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

/////////////////////////////////////////////////////////////////////////////////// QUOTES

function get_all_quotes($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM quotes ORDER BY quote_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_quote($id_quote){
    return (int)cleardata($id_quote);
}

function get_quote_per_id($connect, $id_quote){
    $sentence = $connect->query("SELECT * FROM quotes WHERE quote_id = $id_quote LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_quotes($connect){

$total_numbers = $connect->prepare('SELECT * FROM quotes');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

/////////////////////////////////////////////////////////////////////////////////// CATEGORIES

function get_all_categories($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM categories ORDER BY category_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_category($id_category){
    return (int)cleardata($id_category);
}

function get_category_per_id($connect, $id_category){
    $sentence = $connect->query("SELECT * FROM categories WHERE category_id = $id_category LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_categories($connect){

$total_numbers = $connect->prepare('SELECT * FROM categories');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}


/////////////////////////////////////////////////////////////////////////////////// TAGS

function get_all_tags($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM tags ORDER BY tag_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_tag($id_tag){
    return (int)cleardata($id_tag);
}

function get_tag_per_id($connect, $id_tag){
    $sentence = $connect->query("SELECT * FROM tags WHERE tag_id = $id_tag LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_tags($connect){

$total_numbers = $connect->prepare('SELECT * FROM tags');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

/////////////////////////////////////////////////////////////////////////////////// GOALS

function get_all_goals($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM goals ORDER BY goal_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_goal($id_goal){
    return (int)cleardata($id_goal);
}

function get_goal_per_id($connect, $id_goal){
    $sentence = $connect->query("SELECT * FROM goals WHERE goal_id = $id_goal LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_goals($connect){

$total_numbers = $connect->prepare('SELECT * FROM goals');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

/////////////////////////////////////////////////////////////////////////////////// BODYPARTS

function get_all_bodyparts($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM bodyparts ORDER BY bodypart_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_bodypart($id_bodypart){
    return (int)cleardata($id_bodypart);
}

function get_bodypart_per_id($connect, $id_bodypart){
    $sentence = $connect->query("SELECT * FROM bodyparts WHERE bodypart_id = $id_bodypart LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_bodyparts($connect){

$total_numbers = $connect->prepare('SELECT * FROM bodyparts');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}


function selected_bodyparts($connect){

if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare('SELECT bodyparts.bodypart_title, bodyparts.bodypart_id, bodyparts.bodypart_image FROM bodyparts JOIN exercises_bodyparts ON exercises_bodyparts.bodypart_id = bodyparts.bodypart_id JOIN exercises ON exercises_bodyparts.exercise_id = ? GROUP BY exercises_bodyparts.bodypart_id');
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function not_selected_bodyparts($connect){

 if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare('SELECT bodyparts.bodypart_title, bodyparts.bodypart_id, bodyparts.bodypart_image FROM bodyparts WHERE bodyparts.bodypart_id NOT IN (SELECT exercises_bodyparts.bodypart_id FROM exercises_bodyparts WHERE exercises_bodyparts.exercise_id = ? GROUP BY exercises_bodyparts.bodypart_id)');
$sentence->execute([$id]);
return $sentence->fetchAll();

}}


/////////////////////////////////////////////////////////////////////////////////// CUSTOMS


function get_all_settings($connect)
{
    
    $sentence = $connect->query("SELECT * FROM settings"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_all_strings($connect)
{
    
    $sentence = $connect->query("SELECT * FROM strings"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function fecha($fecha){

    $timestamp = strtotime($fecha);
    $meses = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    $dia = date('d', $timestamp);
    $mes = date('m', $timestamp) - 1;
    $ano = date('Y', $timestamp);

    $fecha = "$dia " . $meses[$mes] . " $ano";
    return $fecha;
}

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

?>