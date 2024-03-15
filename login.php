<?php
include 'includes/connect.php';
session_start();

if(isset($_POST)){
    $postString = file_get_contents("php://input");
    $postArray = json_decode($postString, true);

    $query = "select * from users;";
    $executeQuery = $connect->prepare($query);
    $executeQuery->execute();
    $users = $executeQuery->get_result();

    $userPassMatch = "false";

    while($user = $users->fetch_assoc()) {
        if($user['user_name'] == $postArray['username'] && $user['password'] == $postArray['password']){
            $userPassMatch = true;
            $_SESSION['username'] = $postArray['username'];
            break;
        }
    }
    echo "{\"userExist\":\"". $userPassMatch ."\"}";
}
?>