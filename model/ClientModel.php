<?php

function getClient($id) 
{
	//Pakt een rij van patients uit de database door de id te pakken
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM client WHERE id=:id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id
	));
	$query->execute();

	$db = null;

	return $query->fetch(PDO::FETCH_ASSOC);
}


function getAllClients() 
{
	//Pakt alle rijen van Client
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM client";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();

}

function editClient($id, $name) 
{
	//Bewerkt de client als alles op orde loopt.
	$db = openDatabaseConnection();

	$sql = "UPDATE client SET name=:name WHERE id=:id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':name' => $name,
		':id' => $id
		));

	$db = null;

}

function deleteClient($id) 
{
	// verwijderd een client uit de database
	$db = openDatabaseConnection();

	$sql = "DELETE FROM client WHERE id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id
		));

	$db = null;
}

function createClient($name) 
{
	// Maakt een client aan
	$db = openDatabaseConnection();

	$sql = "INSERT INTO client(name) VALUES (:name)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':name' => $name,
	));

	$db = null;
}