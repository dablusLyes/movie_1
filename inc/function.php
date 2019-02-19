<?php 
require 'pdo.php';

//======================================== FUNCTIONS ===================================//
// =====================================================================================//

function debug($array){echo '<pre>'; print_r($array); echo '</pre>';}

// =====================================================================================//
// Checks and returns if input is numeric and integer 
function isInteger($input){ return(ctype_digit(strval($input))); } 

// =====================================================================================//
// Convert english to french date format
function convertDate($date){
	$timeStamp = strtotime($date);
	return date('d/m/Y H:i', $timeStamp);}

// =====================================================================================//
// Text input validation
function validTextInput($errors,$input,$key,$min,$max){

	if (!empty($input)) {
		if (mb_strlen($input) < $min) {
			$errors[$key] = 'Veuillez renseigner au moins ' . $min . ' caractères'; 
		} elseif(mb_strlen($input) > $max) {
			$errors[$key] = 'Veuillez renseigner moins de ' . $max . ' caractères';
		}
	} else {
		$errors[$key] = 'Veuillez renseigner ce champs';
	}
	return $errors;}

// =====================================================================================//
// Input validation for pseudo ( requires pdo)
function validPseudo($errors,$input,$key,$min,$max){
	global $pdo;
	if (!empty($input)) {
		if (mb_strlen($input) < $min) {
			$errors[$key] = 'Veuillez renseigner au moins ' . $min . ' caractères'; 
		} elseif(mb_strlen($input) > $max) {
			$errors[$key] = 'Veuillez renseigner moins de ' . $max . ' caractères';
		} else {
			$sql = "SELECT * FROM users
					WHERE pseudo = :input";
			$query = $pdo->prepare($sql);
			$query->bindValue(':input',$input, PDO::PARAM_STR);
			$query->execute();
			$pseudo = $query->fetch();
			
			if (!empty($pseudo)) {
				$errors[$key] = 'Ce pseudo existe déjà, veuillez en choisir un autre';
			}
		}
	} else {
		$errors[$key] = 'Veuillez renseigner ce champs';
	}
	return $errors;}

// =====================================================================================//
// Email input validation ( requires pdo )
function validRegisterEmail($errors, $email, $key){
	global $pdo;
	if (!empty($email)) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {

			$errors[$key] = 'Veuillez renseigner un email valide';
		} else {
			$sql = "SELECT * FROM users
					WHERE email = :email";
			$query = $pdo->prepare($sql);
			$query->bindValue(':email',$email, PDO::PARAM_STR);
			$query->execute();
			$email2 = $query->fetch();
			
			if (!empty($email2)) {
				$errors[$key] = 'Cet email est déjà utilisé, veuillez en choisir un autre';
			}
		}
	} else { 
		$errors[$key] = 'Veuillez renseigner votre email';
	}
	return $errors;}

// =====================================================================================//
// Password input validation
function validPassword($errors,$input,$input2,$key,$min,$max){

	if (!empty($input)) {
		if (mb_strlen($input) < $min) {
			$errors[$key] = 'Le mot de passe doit faire au moins ' . $min . ' caractères'; 
		} elseif(mb_strlen($input) > $max) {
			$errors[$key] = 'Le mot de passe doit faire moins de ' . $max . ' caractères';
		} else { 
			if ( $input != $input2) {
				$errors[$key] = 'Les mots de passe ne correspondent pas';
			}
		}
	} else {
		$errors[$key] = 'Veuillez renseigner ce champs';
	}
	return $errors;}

// =====================================================================================//
// Generates a token 
function generateToken($lengh){
	$token = bin2hex(random_bytes($lengh));
	return $token;}

// =====================================================================================//
// Hash a password 
function hashPassword($password){
	$password = password_hash($password , PASSWORD_DEFAULT);
	return $password;}