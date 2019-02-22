<?php
session_start();
include('inc/function.php');
include('inc/pdo.php');
include('inc/request.php');




if(!empty($_POST['submit'])){
        $recherche = trim(strip_tags($_POST['recherche'])); 
        $x         = trim(strip_tags($_POST['year']));
        $y         = trim(strip_tags( $_POST['year2']));
        $sql       = "SELECT * FROM movies_full WHERE 1 = 1";
        $z         = "AND";
        
        if(!empty($_POST['genre'])){
        $check = trim(strip_tags($_POST['genre']));
        //      debug($check);
        foreach ($check as $b) {
            $sql.= ' '.$z ." genres LIKE '%".$b."%' ";
            $z   = 'OR';        
        }
    }

    $sql.= " AND year   BETWEEN $x    AND $y";
        
    if(!empty($note)){
        $note      = trim(strip_tags($_POST['note']));
        $note2= trim(strip_tags($_POST['note']+10));
        $sql.= " AND rating BETWEEN $note AND $note2" ;
    }

    if(!empty($recherche)){
        $sql.= " AND title LIKE :src OR directors LIKE :src OR casting LIKE :src";
    }

//      echo $sql;
        $query = $pdo->prepare($sql);
        $query->bindvalue(':src', '%'.$recherche.'%',PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchALL();
//      debug($results);
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
