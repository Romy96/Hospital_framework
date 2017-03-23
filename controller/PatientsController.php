<?php

require(ROOT . "model/PatientModel.php");

function index()
{
	render("patients/index", array(
		'patients' => getAllPatients()
	));
}

function create()
{
	//formulier tonen
	render("patients/create");
}

function createSave()
{

	if (isset($_POST['name_pet']) && isset($_POST['name_client']) && isset($_POST['gender']) && isset($_POST['species']) && isset($_POST['status'])) {
		createStudent($_POST['name_pet'], $_POST['name_client'], $_POST['gender'], $_POST['species'], $_POST['status']);
	}

	header("Location:" . URL . "patients/index");
}

function edit()
{

	render("patients/edit", array(
			'patient' => getPatient($id)
		));	
}

function editSave()
{
	
} 

function delete($id)
{
	if (isset($id)) {
		deleteStudent($id);
	}

	header("Location:" . URL . "patients/index");
}