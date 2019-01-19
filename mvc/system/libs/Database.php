<?php
/**
 * 
 */
class Database extends PDO{
	
	public function __construct($dsn, $user, $pass)
	{
		
		parent::__construct($dsn, $user, $pass);
	}
	public function select($sql, $data = array(), $fetchStyle = PDO::FETCH_ASSOC){
		$stmnt = $this->prepare($sql);
		foreach ($data as $key => $value) {
			$stmnt->bindParam($key,$value);
		}
		$stmnt->execute();
	    return $stmnt->fetchAll($fetchStyle);
	}
	public function insert($tableName, $data){
         
		$keys   = implode(",", array_keys($data));
		$values = ":" .implode(", :", array_keys($data));

		$sql = "INSERT INTO $tableName($keys) VALUES($values)";
		$stmnt = $this->prepare($sql);
		foreach ($data as $key => $value) {

			$stmnt->bindValue(":$key",$value);
		}

		return $stmnt->execute();

	}
	public function update($tableName, $data, $cond){

        $updateKeys = NULL;
		foreach ($data as $key => $value) {
			$updateKeys .= "$key=:$key,";
		}

		$updateKeys= rtrim($updateKeys, ",");

		$sql = "UPDATE $tableName SET $updateKeys WHERE $cond";
		$stmnt = $this->prepare($sql);
		foreach ($data as $key => $value) {

			$stmnt->bindValue(":$key",$value);
		}

		return $stmnt->execute();
	}
	public function delete($tableName, $cond, $limit = 1){
        $sql = "DELETE FROM $tableName WHERE $cond LIMIT $limit"; 
        /*$stmt = $this->prepare($sql);
        $stmt->bindParam(':cond',$cond);*/
        return $this->exec($sql);
	}
	public function affectedRows($sql,$username,$password){
		$stmnt = $this->prepare($sql);
		$stmnt->execute(array($username,$password));
		return $stmnt->rowCount();
	}
	public function selectUser($sql,$username,$password){
		$stmnt = $this->prepare($sql);
		$stmnt->execute(array($username,$password));
		return $stmnt->fetchAll(PDO::FETCH_ASSOC);
	}

}
?>