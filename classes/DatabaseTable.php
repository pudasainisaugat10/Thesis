<?php
class DatabaseTable
{
	public $table;
	// Constructor function to initialize the 'table' property with the specified table name.

	function __construct($table)
	{
		$this->table = $table;
	}

	// Function to save a record by attempting to insert it and falling back to updating if it already exists.

	function save($record, $pk = '')
	{
		try {
			$this->insert($record);
		} catch (Exception $e) {
			$this->update($record, $pk);
		}
	}

	// Function to retrieve records from the specified table based on a given column name and value.
	function find($name, $value)
	{
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $name . '=:value');
		$criteria = [
			'value' => $value
		];
		$stmt->execute($criteria);
		return $stmt;
	}

	// Function to retrieve multiple records from the specified table for the user currently logged in.
	function findMultiple()
	{
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE user_id=' . $_SESSION['login']);
		$stmt->execute();
		return $stmt;
	}

	// Function to retrieve multiple records from the specified table based on a given column name and value.
	function findMultipleRow($name, $value)
	{
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $name . '=' . $value);
		$stmt->execute();
		return $stmt;
	}

	// Function to retrieve all records from the specified table.
	function findAll()
	{
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM ' . $this->table);
		$stmt->execute();
		return $stmt;
	}

	// Function to insert a new record into the specified table using an associative array of column names and values.
	function insert($record)
	{
		global $pdo;
		$keys = array_keys($record);
		$values = implode(', ', $keys);
		$valuesWithColon = implode(', :', $keys);
		$query = 'INSERT INTO ' . $this->table . '(' . $values . ') VALUE(:' . $valuesWithColon . ')';
		$stmt = $pdo->prepare($query);
		$stmt->execute($record);
	}

	// Function to update a record in the specified table using an associative array of column names and values, based on a primary key.
	function update($record, $pk)
	{
		global $pdo;
		$parameters = [];
		foreach ($record as $key => $value) {
			$parameters[] = $key . '= :'  . $key;
		}
		$parametersWithComma = implode(', ', $parameters);
		$query = "UPDATE $this->table SET $parametersWithComma WHERE $pk = :pk";
		$record['pk'] = $record[$pk];
		$stmt = $pdo->prepare($query);
		$stmt->execute($record);
	}

	// Function to delete records from the specified table based on a given column name and value.
	function delete($field, $value)
	{
		global $pdo;
		$stmt = $pdo->prepare("DELETE FROM $this->table WHERE $field = :pk");
		$criteria = [
			'pk' => $value
		];
		$stmt->execute($criteria);
		return $stmt;
	}
// Function to count the number of records in the specified table.
	function countData()
	{
		global $pdo;
		$stmt = $pdo->prepare('SELECT count(*) FROM ' . $this->table);
		$stmt->execute();
		return $stmt;
	}
}
