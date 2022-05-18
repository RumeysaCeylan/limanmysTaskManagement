
<html>
    <body>

    <h1>ADMIN</h1>
    <a href="#"><img src="user.jpg" width="150px" height="150px" align="center" /></a>
    <br><br>
    <?Php

//defining PDO - telling about the database file
$pdo = new PDO('sqlite:users.db');


//SQLite veritabanında yeni bir tablo oluşturma.
// $pdo->query('CREATE TABLE new_table (ad varchar(50),
// soyad varchar(50))');

//Oluşturduğumuz kisi tablosuna bir adet veri ekleme.
//$pdo->query("INSERT INTO user VALUES (10,'songül',8)");

/*
//writing SQL
$statement = $pdo->query("SELECT*FROM user");

//running SQL
$rows = $statement -> fetchAll( );

//showing it on the screen
echo "<pre>";
//var_dump($rows);
print_r($rows);
echo "</pre>";
*/
?>


<table>

<tr><h4>USERS</h4>
    <td><?Php show_names() ?></td>
    <h4>TASKS</h4>
    <td><?Php show_tasks() ?></td>
  </tr>


</table>





<?Php

function show_names()
{
    /*
$pdo = new PDO('sqlite:users.db');
$statement = $pdo->query("SELECT user_name FROM user");
$rows = $statement -> fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($rows);
echo "</pre>";
*/

$pdo = new PDO('sqlite:users.db');
$statement = $pdo->query("SELECT DISTINCT user_name FROM user");

$rows = $statement -> fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $name) {
    extract($name);
    echo "$user_name<br>";
    }
}


?>

<?Php

function show_tasks()
{
/* $pdo = new PDO('sqlite:users.db');
$statement = $pdo->query("SELECT task_name FROM task");
$rows = $statement -> fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($rows);
echo "</pre>";*/
$pdo = new PDO('sqlite:users.db');
$statement = $pdo->query("SELECT DISTINCT task_name FROM task");

$rows = $statement -> fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $oku) {
    extract($oku);
    echo "$task_name<br>";
    }
}

?>



<h1>TASKS</h1>
<?Php

function show_usertask()
{

$pdo = new PDO('sqlite:users.db');
$statement = $pdo->query("SELECT user_name,task_name FROM user, task WHERE task_id=id order BY user_name");

$rows = $statement -> fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $oku) {
    extract($oku);
    echo "$user_name $task_name<br>";
    } 
    
}




show_usertask(); 
?>
<br><br><br><br>
<form method="POST" action="addingtask.php">
user name :<type="text" name="name"><input /> <br><br>
task id :<type="text" name="taskid"><input  /> <br><br>
user id :<input type="int" name="userid"><input type="submit" value="ADD TASK"/>
</form>
<br><br>


    


    </body>
</html>









