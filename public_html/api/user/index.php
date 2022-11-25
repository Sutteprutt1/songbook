<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/incl/init.php";

/**
 * Liste af user
 */
Route::add('/api/user/', function() {
	$user = new User;
	$result = $user->list();
      echo Tools::jsonParser($result);
});

/**
 * user detaljer
 */
Route::add('/api/user/([0-9]*)', function($id) {
	$user = new User;
	$result = $user->details($id);
	 echo Tools::jsonParser($result);
	
});

Route::add('/api/user/', function() {

	$user = new user;
	$user->firstname = isset($_POST['firstname']) && !empty($_POST['firstname']) ? $_POST['firstname'] : null;
	$user->lastname = isset($_POST['lastname']) && !empty($_POST['lastname']) ? $_POST['lastname'] : null;
	$user->birthdate = isset($_POST['birthdate']) && !empty($_POST['birthdate']) ? $_POST['birthdate'] : null;
	$user->email = isset($_POST['email']) && !empty($_POST['email']) ? (int)$_POST['email'] : null;
	$user->phone = isset($_POST['phone']) && !empty($_POST['phone']) ? (int)$_POST['phone'] : null;
    $user->adress = isset($_POST['adress']) && !empty($_POST['adress']) ? (int)$_POST['adress'] : null;
	$user->zipcode = isset($_POST['zipcode']) && !empty($_POST['zipcode']) ? (int)$_POST['zipcode'] : null; 
	$user->city = isset($_POST['city']) && !empty($_POST['city']) ? (int)$_POST['city'] : null; 
	$user->country = isset($_POST['country']) && !empty($_POST['country']) ? (int)$_POST['country'] : null;
	

	if($user->firstname && $user->lastname && $user->birthdate) {
		echo $user->create();
	} else {
		// echo "Kan ikke oprette user.";
	}
}, 'post');

Route::add('/api/user/', function() {
	$data = file_get_contents("php://input");
	parse_str($data, $parsed_data);

	$user = new user;
	$user->id = isset($parsed_data['id']) && !empty($parsed_data['id']) ? (int)$parsed_data['id'] : null;
	$user->firstname = isset($parsed_data['firstname']) && !empty($parsed_data['title']) ? $parsed_data['title'] : null;
	$user->lastname = isset($parsed_data['lastname']) && !empty($parsed_data['lastname']) ? $parsed_data['lastname'] : null;
	$user->birthdate = isset($parsed_data['birthdate']) && !empty($parsed_data['birthdate']) ? (int)$parsed_data['birthdate'] : null;
	$user->email = isset($parsed_data['email']) && !empty($parsed_data['email']) ? (int)$parsed_data['email'] : null; 
	$user->phone = isset($parsed_data['phone']) && !empty($parsed_data['phone']) ? (int)$parsed_data['phone'] : null; 
	$user->zipcode = isset($parsed_data['zipcode']) && !empty($parsed_data['zipcode']) ? (int)$parsed_data['zipcode'] : null;
	$user->city = isset($parsed_data['city']) && !empty($parsed_data['city']) ? (int)$parsed_data['city'] : null; 
	$user->country = isset($parsed_data['country']) && !empty($parsed_data['country']) ? (int)$parsed_data['country'] : null;
	$user->adress = isset($parsed_data['adress']) && !empty($parsed_data['adress']) ? (int)$parsed_data['adress'] : null;
	if($user->id && $user->firstname && $user->lastname && $user->$birthdate) {
		echo $user->update();
	} else {
		echo false;
	}
}, 'put');

Route::add('/api/user/([0-9]*)', function($id) {
	$user = new user;
	echo $user->delete($id);
}, 'delete');

Route::run('/');   
?>