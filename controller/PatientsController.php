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
	$species = getSpeciesforPatient();

	if(empty($species)) {
		echo ('Geen resultaat');
	}

	//formulier tonen
	render("patients/create", array(
		'species' => $species
	));
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

	$species = getSpeciesforPatient();

	if(empty($patient)) {
		echo ('Geen resultaat');
	}

	if(empty($species)) {
		echo ('Geen resultaat');
	}

	if (isset($id)) {
		render("patients/edit", array(
			'patient' => $patient,
			'species' => $species
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
		//die('stop');
		editPatient($id, $_POST['name_pet'], $_POST['name_client'], $_POST['gender'], $_POST['species'], $_POST['status']);
		header("Location:" . URL . "patients/index");
		exit();
	}
	else {
		echo 'Geen resultaat';
		$patient = getPatient($id);
		render("patients/edit", array(
			'patient' => $patient
		));
		exit();
	}
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