<?php


function getRandomMovies(){
        global $pdo;
        $sql = "SELECT * FROM movies_full 
                ORDER BY RAND() 
                LIMIT 10 ";
        $query = $pdo->prepare($sql);
        $query->execute();
        $table = $query->fetchALL();
        return $table;
    }