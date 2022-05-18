<?Php

function add_task()
{
    

    echo "name : ".$_POST["name"];
    echo "user id: ".$_POST["userid"];
    echo "task id : ".$_POST["taskid"];
    $user_id=$_POST["userid"];
     $user_name =$_POST["name"];
     $task_id =$_POST["taskid"];
    echo "<br>";

$pdo = new PDO('sqlite:users.db');
$statement = $pdo->query("INSERT INTO user (user_id,user_name,task_id ) VALUES ($user_id,'$user_name',$task_id)");


}

add_task();

function create_task()
{

    $user_id=-1;
    $user_name="";
    $task_id=-1;

$pdo = new PDO('sqlite:users.db');
$statement = $pdo->query("INSERT INTO user (user_id,user_name,task_id ) VALUES ($user_id,$user_name,$task_id)");


}


?>