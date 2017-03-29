<?php

require(ROOT . "model/ClientModel.php");

function index()
{
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
	if (isset($_POST['name'])) {
		createClient($_POST['name']);
	} else {
		render("clients/create");
		exit();
	}

	header("Location:" . URL . "clients/index");
}

function edit($id)
{
	$client = getClient($id);

	if(empty($client)) {
		echo ('Geen resultaat');
	}

	if (isset($id)) {
		render("clients/edit", array(
			'client' => $client
		));
	}
	else 
	{
		render("clients/index", array(
			'clients' => getAllClients()
		));
	}
}

function editSave($id)
{

	if (isset($_POST['name'])) {
		//die('stop');
		editClient($id, $_POST['name']);
		header("Location:" . URL . "clients/index");
		exit();
	}
	else {
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
	$client = getClient($id);

	if(empty($client)) {
		echo ('Geen resultaat');
	}

	if (isset($id)) {
		render("clients/delete", array(
			'client' => $client
		));
	}
	else 
	{
		render("clients/index", array(
			'clients' => getAllPatients()
		));
	}
}

function deleteRow($id)
{
	if (isset($id)) {
		deleteClient($id);
	}

	header("Location:" . URL . "clients/index");
}