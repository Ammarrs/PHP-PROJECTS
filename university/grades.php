<?php
require_once "connection.php";

if(isset($_GET["id"])){
    $id = explode("$",$_GET["id"])[0];
    $cc = explode("$",$_GET["id"])[1];
    echo "Grading a student with ID = $id in the course $cc<br>";
    echo "<form method=\"POST\">
    mark: <input type=\"number\" name=\"grade\">
    <br>
    <input type=\"submit\" value=\"Grade\">
    <a href=\"index.php\">Cancel</a>
    </form>";

    if(isset($_POST["grade"])){
        $grade = $_POST["grade"];
        $statment = "UPDATE Student_Course SET Mark = $grade WHERE StudentID = \"$id\" AND CourseCode = \"$cc\"";
        $sql = $connection -> prepare($statment);
        $sql -> execute();
    }
}
else
{
    echo "Err There is no id";
}

