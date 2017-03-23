<?php

function getPatient($id) 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM patient WHERE id=:id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id
		));

	$db = null;

	return $query->fetchAll();
}

function getAllPatients() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM patient";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();

}

function editPatient() 
{

}

function deletePatient($id) 
{
	$db = openDatabaseConnection();

	$sql = "DELETE FROM patient WHERE id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id
		));

	$db = null;
}

function createStudent($name_pet, $name_client, $gender, $species, $status) 
{
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