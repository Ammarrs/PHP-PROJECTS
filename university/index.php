<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table style="border:1px solid">
        <tr>
            <th>ID</th>
            <th>Fname</th>
            <th>Lname</th>
            <th>Course</th>
            <th>Link</th>
        </tr>
        <?php
        require_once "connection.php";
            $statment = "SELECT s.StudentID as s , s.Fname as f , s.Lname as l ,sc.CourseCode as c FROM Student s,Student_Course sc WHERE s.StudentID = sc.StudentID;";
            $sql = $connection -> prepare($statment);
            $sql -> execute();
            $students = $sql -> get_result();
            foreach($students as $s){
                //print_r($student);
                echo "<tr>
                <td>".$s['s']."</td> 
                <td>".$s['f']."</td>  
                <td>".$s['l']."</td>
                <td>".$s["c"]."</td>
                <td><a href='grades.php?id=".$s["s"]."$".$s["c"]."'>Grade</a></td>
                </tr>";

            } 
        ?>
        <!-- <a href='grades.php?id=".$s["s"]." ".$s["c"].">Grade</a> -->
    </table>
    <a href="addStudent.php">ADD Student</a>
    <br>
    <br>
    <!-- <a href=""></a> -->
</body>
</html>