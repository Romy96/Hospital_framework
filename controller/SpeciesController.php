<?php

require(ROOT . "model/SpeciesModel.php");

function index()
{
	//Ga naar een pagina met een array die functie aanroept
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
	// Als de waardes van de velden in het formulier bestaan, voer dan functie uit.
	if (isset($_POST['species'])) {
		createSpecies($_POST['species']);
	} else {
		//Als het niet werkt, dan geef je het formulier weer.
		render("species/create");
		exit();
	}

	//Nadat het uitgevoerd is, ga je terug naar het tabel voor resultaat.
	header("Location:" . URL . "species/index");
}

function edit($id)
{
	//Roep functie op met id in het variable
	$species = getSpecies($id);

	//Als het leeg geef, dan geef het alleen deze zin weer.
	if(empty($species)) {
		echo ('Geen resultaat');
	}

	//Als id bestaan, geef dan formulier weer.
	if (isset($id)) {
		render("species/edit", array(
			'species' => $species
		));
	}
	else 
	{
		//Zoniet, dan terug naar het tabel.
		render("species/index", array(
			'species' => getAllSpecies()
		));
	}
}

function editSave($id)
{
	// Als de waardes van de velden in het formulier bestaan, voer dan functie uit.
	if (isset($_POST['species'])) {
		//die('stop');
		editSpecies($id, $_POST['species']);
		header("Location:" . URL . "species/index");
		exit();
	}
	else {
		//Als het niet werkt, dan geef je het formulier weer.
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
	//Roep functie op met id in het variable
	$species = getSpecies($id);

	//Als het leeg geef, dan geef het alleen deze zin weer.
	if(empty($species)) {
		echo ('Geen resultaat');
	}

	//Als id bestaan, geef dan formulier weer.
	if (isset($id)) {
		render("species/delete", array(
			'species' => $species
		));
	}
	else 
	{
		//Zoniet, dan terug naar het tabel.
		render("species/index", array(
			'species' => getAllSpecies()
		));
	}
}

function deleteRow($id)
{
	//Als id bestaan, voer dan functie uit.
	if (isset($id)) {
		deleteSpecies($id);
	}

	//Nadat het uitgevoerd is, ga je terug naar het tabel voor resultaat.
	header("Location:" . URL . "species/index");
}