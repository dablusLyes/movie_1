<?php
require 'pdo.php';

// ================================== SQL REQUEST ====================================//


// ===================================================================================//
//                         Insert a new user in the database

function addNewUser($pseudo,$email,$password, $token){
	global $pdo;
	$sql = "INSERT INTO users (pseudo,email,password,created_at,token) 
			VALUES (:pseudo,:email,:password,NOW(),'$token')";
		$query = $pdo->prepare($sql);
		// SQL injection =>
		$query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
		$query->bindValue(':email',$email, PDO::PARAM_STR);
		$query->bindValue(':password',$password, PDO::PARAM_STR);
		$query->execute();
}

// ===================================================================================//
							
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
