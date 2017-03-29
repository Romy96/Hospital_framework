<?php

function getClient($id) 
{
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

function getSpeciesforPatient() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM species";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function getAllClients() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM client";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();

}

function editClient($id, $name) 
{
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
	$db = openDatabaseConnection();

	$sql = "INSERT INTO client(name) VALUES (:name)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':name' => $name,
	));

	$db = null;
}