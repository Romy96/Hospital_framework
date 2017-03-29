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
		createPatient($_POST['name_pet'], $_POST['name_client'], $_POST['gender'], $_POST['species'], $_POST['status']);
	} else {;
		render("patients/create");
		exit();
	}

	header("Location:" . URL . "patients/index");
}

function edit($id)
{
	$patient = getPatient($id);

	if(empty($patient)) {
		echo ('Geen resultaat');
	}

	if (isset($id)) {
		render("patients/edit", array(
			'patient' => $patient
		));
	}
	else 
	{
		render("patients/index", array(
			'patients' => getAllPatients()
		));
	}
}

function editSave($id)
{
	if (isset($_POST['name_pet']) && isset($_POST['name_client']) && isset($_POST['gender']) && isset($_POST['species']) && isset($_POST['status'])) {
		editPatient($id, $_POST['name_pet'], $_POST['name_client'], $_POST['gender'], $_POST['species'], $_POST['status']);
	}
	else {
		echo 'Geen resultaat';
	}

	header("Location:" . URL . "patients/index");
} 

function delete($id)
{
	$patient = getPatient($id);

	if(empty($patient)) {
		echo ('Geen resultaat');
	}

	if (isset($id)) {
		render("patients/delete", array(
			'patient' => $patient
		));
	}
	else 
	{
		render("patients/index", array(
			'patients' => getAllPatients()
		));
	}
}

function deleteRow($id)
{
	if (isset($id)) {
		deletePatient($id);
	}

	header("Location:" . URL . "patients/index");
}