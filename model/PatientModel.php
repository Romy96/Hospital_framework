<?php

function getPatient($id) 
{
	//Pakt een rij van patients uit de database door de id te pakken
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM patient WHERE id=:id";
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
	//Pakt alles van species om in een dropdown in te stoppen bij het formulier
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM species";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function getAllPatients() 
{
	//Pakt alle rijen van Patient
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM patient";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();

}

function editPatient($id, $name_pet, $name_client, $gender, $species, $status) 
{
	//Bewerkt het patient als alles op orde loopt.
	$db = openDatabaseConnection();

	$sql = "UPDATE patient SET name_pet=:name_pet, name_client=:name_client, gender=:gender, species=:species, status=:status WHERE id=:id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':name_pet' => $name_pet,
		':name_client' => $name_client,
		':gender' => $gender,
		':species' => $species,
		':status' => $status,
		':id' => $id
		));

	$db = null;

}

function deletePatient($id) 
{
	// verwijderd een patient uit de database
	$db = openDatabaseConnection();

	$sql = "DELETE FROM patient WHERE id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id
		));

	$db = null;
}

function createPatient($name_pet, $name_client, $gender, $species, $status) 
{
	// Maakt een patient aan
	$db = openDatabaseConnection();

	$sql = "INSERT INTO patient(name_pet, name_client, gender, species, status) VALUES (:name_pet, :name_client, :gender, :species, :status)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':name_pet' => $name_pet,
		':name_client' => $name_client,
		':gender' => $gender,
		':species' => $species,
		':status' => $status
		));

	$db = null;
}