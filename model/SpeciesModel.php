<?php

function getSpecies($id) 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM species WHERE id=:id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id
	));
	$query->execute();

	$db = null;

	return $query->fetch(PDO::FETCH_ASSOC);
}

function getAllSpecies() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM species";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();

}

function editSpecies($id, $species) 
{
	$db = openDatabaseConnection();

	$sql = "UPDATE species SET species=:species WHERE id=:id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':species' => $species,
		':id' => $id
		));

	$db = null;

}

function deleteSpecies($id) 
{
	$db = openDatabaseConnection();

	$sql = "DELETE FROM species WHERE id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id
		));

	$db = null;
}

function createSpecies($species) 
{
	$db = openDatabaseConnection();

	$sql = "INSERT INTO species(species) VALUES (:species)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':species' => $species,
	));

	$db = null;
}