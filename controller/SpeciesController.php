<?php

require(ROOT . "model/SpeciesModel.php");

function index()
{
	render("species/index", array(
		'species' => getAllSpecies()
	));
}

function create()
{
	//formulier tonen
	render("species/create");
}

function createSave()
{
	if (isset($_POST['species'])) {
		createSpecies($_POST['species']);
	} else {
		render("species/create");
		exit();
	}

	header("Location:" . URL . "species/index");
}

function edit($id)
{
	$species = getSpecies($id);

	if(empty($species)) {
		echo ('Geen resultaat');
	}

	if (isset($id)) {
		render("species/edit", array(
			'species' => $species
		));
	}
	else 
	{
		render("species/index", array(
			'species' => getAllSpecies()
		));
	}
}

function editSave($id)
{

	if (isset($_POST['species'])) {
		//die('stop');
		editSpecies($id, $_POST['species']);
		header("Location:" . URL . "species/index");
		exit();
	}
	else {
		echo 'Geen resultaat';
		$species = getSpecies($id);
		render("species/edit", array(
			'species' => $species
		));
		exit();
	}
} 

function delete($id)
{
	$species = getSpecies($id);

	if(empty($species)) {
		echo ('Geen resultaat');
	}

	if (isset($id)) {
		render("species/delete", array(
			'species' => $species
		));
	}
	else 
	{
		render("species/index", array(
			'species' => getAllSpecies()
		));
	}
}

function deleteRow($id)
{
	if (isset($id)) {
		deleteSpecies($id);
	}

	header("Location:" . URL . "species/index");
}