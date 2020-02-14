<?php
// Array with names
include 'Db.php';
$db = Db::getConnection();
$result = $db->query("SELECT `name`,`surname`,`age`,`about` FROM `basketball player` ");
$hint = "";
$List=array();
$i=0;
while ($row = $result->fetch_assoc())
{
    $List[$i]['name']= $row['name'];
    $List[$i]['surname']= $row['surname'];
    $List[$i]['age']= $row['age'];
    $List[$i]['about']= $row['about'];
    $i++;
}

$q = $_REQUEST["q"];
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($List as $name) {
        if (stristr($q, substr($name['name'], 0, $len))) {
            echo "<div id='info'>
<h1><a href='#'>".$name['name']."  ".$name['surname']."  ".substr($name['age'],0,strpos($name['age'],'.'))." года</a></h1>
</div>";
        }

    }
}

// Output "no suggestion" if no hint was found or output correct values

?>