<?php
// session_start();
// $valid_username="sami";
// $valid_password="93926";
// if($_SERVER["REQUEST_METHOD"]=="POST"){
//     $username=$_POST['username'];
//     $password=$_POST['password'];
//     if($username===$valid_username && $password===$valid_password){
//         $SESSION['username']=$username;
//         header("Location:project.html");
//         exit();
//     }
//     else{
//         echo"INVALID CREDITIONALS.<a href='login.php'>TRY AGAIN</a>";
//     }
// }



session_start();


$valid_users = [
    ["username" => "sami", "password" => "93926"],
    ["username" => "john", "password" => "143"],
    ["username" => "alice", "password" => "abcde"],
    ["username" => "mike", "password" => "98765"]
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Check if the username and password match any in the array
    foreach ($valid_users as $user) {
        if ($user["username"] === $username && $user["password"] === $password) {
            $_SESSION['username'] = $username;
            header("Location: project.html");
            exit();
        }
    }
    
    echo "INVALID CREDENTIALS. <a href='login.php'>TRY AGAIN</a>";
} 
?>
