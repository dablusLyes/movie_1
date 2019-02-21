<?php
session_start();
include('inc/function.php');
include('inc/pdo.php');
include('inc/request.php');



$x = $_POST['year'];
$y = $_POST['year2'];
$note0 = $_POST['note']-5;
$note1 = $_POST['note']+5;
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
        $sql.= " AND rating BETWEEN $note0 AND $note1";
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
    <a href="details.php?slug=<?php echo $result['slug']; ?>"> <img src="<?php echo poster($result); ?>" alt="<?php echo $result['title'] ?>"></a>
    <p> <?php echo $result['title'] ?> </p>
    <p> year of sortie<?php echo $result['year'] ?> </p>
    <p> rating : <?php echo $result['rating'] ?>/100</p>
   <?php
}