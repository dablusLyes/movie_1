<?php
require 'pdo.php';

// ================================== SQL REQUESTS ====================================//


// ===================================================================================//
//                         Insert a new user in the database
// ==================================================
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
// 							Gets 10 random movies from the DB

function getRandomMovies($count = 10){
      global $pdo;

      $sql = "SELECT * FROM movies_full
                ORDER BY RAND()
                LIMIT $count";
      $query = $pdo->prepare($sql);
      $query->execute();

      return $query->fetchALL();
    }

// ===================================================================================//
// 							Get allartikal get all movies from DB limit by 25

function getAllMoviesLimitBy($offset, $limit = 25){
      global $pdo;

      $sql = "SELECT * FROM movies_full
                ORDER BY id
                LIMIT $limit OFFSET $offset";

      $query = $pdo->prepare($sql);
      $query->execute();

      return $query->fetchALL();
}

//======================================================================================
//               Displays the details of the clicked film on details.php
function getSingleFilm($slug){
  global $pdo;

  $sql = "SELECT * FROM movies_full WHERE slug=:slug";

  $query = $pdo->prepare($sql);
  $query->bindvalue(':slug',$slug);
  $query->execute();


  return $query->fetch();
}

// ===================================================================================//
//                        Checks and returns if user exists in database

function getUser($login){
  global $pdo;
	$sql = "SELECT * FROM users
	   		WHERE pseudo = :login
	   		OR email = :login";
  $query = $pdo->prepare($sql);
  $query->bindValue(':login',$login,PDO::PARAM_STR);
  $query->execute();
  $user = $query->fetch();

  return $user;
}

// ===================================================================================//
//												return number total films number

function countAllFilms(){
  global $pdo;
	$sql = "SELECT COUNT(id) FROM movies_full";

  $query = $pdo->prepare($sql);
  $query->execute();
;

  return $query->fetchColumn();
}

// ===================================================================================//
//		                   return all films genres

function allGenres(){
  global $pdo;
	$sql = "SELECT DISTINCT genres FROM `movies_full` WHERE 1";

  $query = $pdo->prepare($sql);
  $query->execute();
;

  return $query->fetchColumn();
}
