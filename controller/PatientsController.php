<?php

require(ROOT . "model/PatientModel.php");

function index()
{
	//Ga naar een pagina met een array die functie aanroept
	render("patients/index", array(
		'patients' => getAllPatients()
	));
}

function create()
{
	//Roep de functie getSpeciesforPatient op met een verzonnen variable
	$species = getSpeciesforPatient();

	//Als het leeg geef, dan geef het alleen deze zin weer.
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
	// Als de waardes van de velden in het formulier bestaan, voer dan functie uit.
	if (isset($_POST['name_pet']) && isset($_POST['name_client']) && isset($_POST['gender']) && isset($_POST['species']) && isset($_POST['status'])) {
		createPatient($_POST['name_pet'], $_POST['name_client'], $_POST['gender'], $_POST['species'], $_POST['status']);
	} else {
		//Als het niet werkt, dan geef je het formulier weer.
		render("patients/create");
		exit();
	}

	header("Location:" . URL . "patients/index");
}

function edit($id)
{
	//Roep functie op met id in het variable
	$patient = getPatient($id);

	//Roep de functie getSpeciesforPatient op met een verzonnen variable
	$species = getSpeciesforPatient();

	//Als het leeg geef, dan geef het alleen deze zin weer.
	if(empty($patient)) {
		echo ('Geen resultaat');
	}

	//Als het leeg geef, dan geef het alleen deze zin weer.
	if(empty($species)) {
		echo ('Geen resultaat');
	}

	//Als id bestaan, geef dan formulier weer.
	if (isset($id)) {
		render("patients/edit", array(
			'patient' => $patient,
			'species' => $species
		));
	}
	else 
	{
		//Zoniet, dan terug naar het tabel.
		render("patients/index", array(
			'patients' => getAllPatients()
		));
	}
}

function editSave($id)
{
	// Als de waardes van de velden in het formulier bestaan, voer dan functie uit.
	if (isset($_POST['name_pet']) && isset($_POST['name_client']) && isset($_POST['gender']) && isset($_POST['species']) && isset($_POST['status'])) {
		//die('stop');
		editPatient($id, $_POST['name_pet'], $_POST['name_client'], $_POST['gender'], $_POST['species'], $_POST['status']);
		header("Location:" . URL . "patients/index");
		exit();
	}
	else {
		//Zoniet, dan ga je terug naar het formulier.
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
	//Roep functie op met id in het variable
	$patient = getPatient($id);

	//Als het leeg geef, dan geef het alleen deze zin weer.
	if(empty($patient)) {
		echo ('Geen resultaat');
	}

	//Als id bestaan, geef dan formulier weer.
	if (isset($id)) {
		render("patients/delete", array(
			'patient' => $patient
		));
	}
	else 
	{
		//Zoniet, dan terug naar het tabel.
		render("patients/index", array(
			'patients' => getAllPatients()
		));
	}
}

function deleteRow($id)
{
	//Als id bestaan, voer dan functie uit.
	if (isset($id)) {
		deletePatient($id);
	}

	//Nadat het uitgevoerd is, ga je terug naar het tabel voor resultaat.
	header("Location:" . URL . "patients/index");
}