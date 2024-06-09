<?php
    require_once "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        Fname: <input type="text" name="fname" required>
        <br>
        Lname: <input type="text" name="lname" required>
        <br>
        email: <input type="text" name="email" required>
        <br>
        <select name="course" multiple required min="1">
            <option value="COMP 102">COMP 102</option>
            <option value="COMP 104">COMP 104</option>
            <option value="COMP 206">COMP 206</option>
        </select>
        <br>
        <input type="submit" value="Regest">
        <br>
        <a href="index.php">Cancel</a>
        <!-- <button type="submit">reg</button> -->
    </form>
    <?php
        require_once "connection.php";
        if(isset($_POST["email"])){
            $stat = "SELECT Email , StudentID FROM Student";
            $sql = $connection -> prepare($stat);
            $sql -> execute();
            $st = $sql -> get_result();
            foreach($st as $s){
                if($s['Email'] == $_POST['email']) {
                    $id = $s["StudentID"];
                    $bool = TRUE;
                    break;
                } 
            }
            if($bool) {
                $stat = "INSERT INTO Student_Course (StudentID ,CourseCode,Mark) VALUES ($id ,\"".$_POST["course"]."\",0);";
                $sql = $connection -> prepare($stat);
                $sql -> execute();
            }else{
                $f = $_POST["fname"];
                $l = $_POST["lname"];
                $e = $_POST["email"];
                $stat = "INSERT INTO Student (Fname,Lname,Email) VALUES (\"$f\",\"$l\",\"$e\");";
                $sql = $connection -> prepare($stat);
                $sql -> execute();
                // $id = $connection -> lastInsertId();
                $stat = "SELECT max(StudentID) as i FROM Student";
                $sql = $connection -> prepare($stst);
                $sql -> execute();
                $st = $sql -> get_result();
                foreach($st as $s){
                    $id = $s["i"];
                }
                $stat = "INSERT INTO Student_Course (StudentID ,CourseCode,Mark) VALUES ($id ,\"".$_POST["course"]."\",0);";
                $sql = $connection -> prepare($stat);
                $sql -> execute();
            }
        }
    ?>
</body>
</html>


<!-- -->
                