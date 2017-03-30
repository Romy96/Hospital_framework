<?php

function getSpecies($id) 
{
	//Pakt een rij van species uit de database door de id te pakken
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
	//Pakt alle rijen van species
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM species";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();

}

function editSpecies($id, $species) 
{
	//Bewerkt het diersoort als alles op orde loopt.
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
	// verwijderd een diersoort uit de database
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
	// Maakt een diersoort aan
	$db = openDatabaseConnection();

	$sql = "INSERT INTO species(species) VALUES (:species)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':species' => $species,
	));

	$db = null;
}