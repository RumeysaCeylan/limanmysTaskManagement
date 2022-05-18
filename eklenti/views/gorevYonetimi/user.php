<html>

<body>
    <a href="#"><img src="user.jpg" width="150px" height="150px" align="CENTER" /></a>
    <br><br><br><br><br><br><br><br>

    <?Php
    //defining PDO - telling about the database file
    $pdo = new PDO('sqlite:users.db');
    ?>



    <?Php

    echo "USER : ".$_POST["veri"];
    
    function show_matched_name_task()
    {
        $username =$_POST["veri"];
        echo "<br>";
        $pdo = new PDO('sqlite:users.db');
        $statement = $pdo->query("SELECT DISTINCT task_name FROM task,user WHERE id = task_id AND user_name='$username' ORDER BY task_name ASC");

        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $name) {
            extract($name);
            echo "$task_name<br>";
        }
    }

    show_matched_name_task();

    ?>
     <?Php

   

function task_rate()
{
    $username =$_POST["veri"];
    $pdo = new PDO('sqlite:users.db');
    $statement = $pdo->query("SELECT DISTINCT task_name, complemention , task_time FROM task AS T,user AS U,compRate AS C WHERE T.id = U.task_id AND U.user_name='$username' AND C.user_id=U.user_id");

    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $name) {
        extract($name);
        echo "rate : $complemention<br>";
        echo "Task Name : $task_name<br>";
        echo "Total Day : $task_time<br>";
    }
}

task_rate();

?>


</body>

</html>