<?php

require(ROOT . "model/ClientModel.php");

function index()
{
	//Ga naar een pagina met een array die functie aanroept
	render("clients/index", array(
		'clients' => getAllClients()
	));
}

function create()
{
	//formulier tonen
	render("clients/create");
}

function createSave()
{
	// Als de waardes van de velden in het formulier bestaan, voer dan functie uit.
	if (isset($_POST['name'])) {
		createClient($_POST['name']);
	} else {
		//Als het niet werkt, dan geef je het formulier weer.
		render("clients/create");
		exit();
	}
	//Nadat het uitgevoerd is, ga je terug naar het tabel voor resultaat.
	header("Location:" . URL . "clients/index");
}

function edit($id)
{
	//Roep functie op met id in het variable
	$client = getClient($id);

	//Als het leeg geef, dan geef het alleen deze zin weer.
	if(empty($client)) {
		echo ('Geen resultaat');
	}

	//Als id bestaan, geef dan formulier weer.
	if (isset($id)) {
		render("clients/edit", array(
			'client' => $client
		));
	}
	else 
	{
		//Zoniet, dan terug naar het tabel.
		render("clients/index", array(
			'clients' => getAllClients()
		));
	}
}

function editSave($id)
{
	// Als de waardes van de velden in het formulier bestaan, voer dan functie uit.
	if (isset($_POST['name'])) {
		//die('stop');
		editClient($id, $_POST['name']);
		header("Location:" . URL . "clients/index");
		exit();
	}
	else {
		//Als het niet werkt, dan geef je het formulier weer.
		echo 'Geen resultaat';
		$client = getClient($id);
		render("clients/edit", array(
			'client' => $client
		));
		exit();
	}
} 

function delete($id)
{
	//Roep functie op met id in het variable
	$client = getClient($id);

	//Als het leeg geef, dan geef het alleen deze zin weer.
	if(empty($client)) {
		echo ('Geen resultaat');
	}

	//Als id bestaan, geef dan formulier weer.
	if (isset($id)) {
		render("clients/delete", array(
			'client' => $client
		));
	}
	else 
	{
		//Zoniet, dan terug naar het tabel.
		render("clients/index", array(
			'clients' => getAllClients()
		));
	}
}

function deleteRow($id)
{
	//Als id bestaan, voer dan functie uit.
	if (isset($id)) {
		deleteClient($id);
	}
	
	//Nadat het uitgevoerd is, ga je terug naar het tabel voor resultaat.
	header("Location:" . URL . "clients/index");
}