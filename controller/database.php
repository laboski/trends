<?php 

	/**
	 * 
	 */
	class DatabaseModule
	{

		private $conn;
		
		function __construct($conn)
		{
			$this->conn = $conn;
		}

		public function create(string $sql, array $data)
		{
			$stmt = $this->conn->prepare($sql);

			$stmt->execute($data);

			return $this->conn->lastInsertId();

		}

		public function select(string $sql, array $data)
		{
			$stmt = $this->conn->prepare($sql);

			$stmt->execute($data);

			$result = $stmt->fetchAll();

			return $result;
		}

		public function update(string $sql, array $data)
		{
			$stmt = $this->conn->prepare($sql);

			$stmt->execute($data);

			return ($stmt->rowCount() >= 1) ? 'Updated successfully' : 'Update failed' ;

		}

		public function delete(string $sql, array $data)
		{
			$stmt = $this->conn->prepare($sql);

			$stmt->execute($data);

			return ($stmt->rowCount() >= 1) ? 'Deleted successfully' : 'Failed to delete!!' ;

		}
	}