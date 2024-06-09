<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        Name: <input type="text" name="name" required><br>
        Department: <input type="text" name="dept" required><br>
        Level: <input type="number" name="level" required><br>
        ProjectID: <input type="text" name="pid" required><br><br>
        <input type="submit" value="Regest">
    </form>
<?php
    require_once "connection.php";
    if(isset($_POST["name"])){
        $sn = $_POST["name"];
        $sd = $_POST["dept"];
        $sl = $_POST["level"];
        $pid = $_POST["pid"];
        try{
            $stat = "INSERT INTO Student (Name,Dept,Lvl,PjID) VALUES (\"$sn\",\"$sd\",$sl,$pid);";
        //檢查是否
        $sql = $conn -> prepare($stat);
        $sql -> execute();

        } catch(PDOException $e){
            echo("Error!".$e->getMessage());
        }

        
        
    }
    
?>
<br>

<form action="" method="POST">
    <h2>Search for stds</h2>
    Project ID:<input type="text" name="ProjID">
    <br>
    <input type="submit" value="search">
    <br>
    <br>
</form>

<table style="border: solid 2px">
    <tr>
        <th>proj</th>
        <th>stID</th>
        <th>stName</th>
    </tr>
    <?php
    if(isset($_POST["ProjID"])){
        $pjid = $_POST["ProjID"];
        $stat = "SELECT StID , Name FROM Student WHERE PjID = $pjid;";
        $sql = $conn -> prepare($stat);
        $sql ->execute();
        $students = $sql -> fetchAll(PDO::FETCH_ASSOC);
        foreach($students as $student){
            echo("<tr><td>$pjid</td><td>$student[StID]</td><td>$student[Name]</td></tr>\n");
        }
    }
        // $res = $conn -> query("SELECT PjID,StID,Name FROM `Student` NATURAL JOIN `Project`;");
        
    ?>
</table>

<br><br>

<!-- select distnct s.dept from student s inner/natural join project p on p.pjid = s.pjid/without on where pjname = pjname  -->
</body>
</html>