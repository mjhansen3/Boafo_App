<?php 
	
	require_once '../includes/DbOperations.php';
	$response = array();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
			
			$db = new DbOperations();

			if ($db->createUser($_POST['name'], $_POST['email'], $_POST['password'])) {

				$response['error'] = false;
				$response['message'] = "User registered successfully";

			} else {

				$response['error'] = true;
				$response['message'] = "Some error occured ... please try again";

			}

		} else {

			$response['error'] = true;
			$response['message'] = "Required fields are missing";

		}


	} else {

		$response['error'] = true;
		$response['message'] = "Invalid request method";

	}

	echo json_encode($response);

?>