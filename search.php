<?php
session_start();
include('inc/function.php');
include('inc/pdo.php');
include('inc/request.php');



$x = $_POST['year'];
$y = $_POST['year2'];
$sql = "SELECT * FROM movies_full WHERE 1 = 1";
$z = "AND";
if(!empty($_POST['submit'])){
    if(!empty($_POST['genre'])){
        $check = $_POST['genre'];
        //debug($check);
        foreach ($check as $b) {
            $sql.= ' '.$z ." genres LIKE '%".$b."%' ";
            //echo $sql;   
            $z = 'OR';        
         }
        $sql.= " AND year BETWEEN $x AND $y";
        echo $sql;
        $query = $pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchALL();
        //debug($results);


    }else{ header('Location: index.php');}
}else{header('Location: index.php');}

include('inc/header.php');
foreach ($results as $result) {
   ?>
    <img src="<?php echo poster($result); ?>" alt="<?php echo $result['title'] ?>">
    <p> <?php echo $result['title'] ?> </p>
    <p> year of sortie<?php echo $result['year'] ?> </p>
    <p> rating : <?php echo $result['rating'] ?>/100</p>
   <?php
}