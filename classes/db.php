<?php
	class Db {
    	private $dbh = null;

    	public function __construct() {
    		try {
        		$this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS);
      		} catch(PDOException $e) {
        		echo $e->getMessage();
    		}
    	}
		
		private $users_sql = "SELECT * FROM users";
		private $users_salt_sql = "SELECT salt FROM users";
		private $users_privilege_sql = "SELECT privilege FROM users";
		private $create_order = "set @unixtime = unix_timestamp(now());
		set @lastorderid = (SELECT id FROM  `foodbasket_order` ORDER BY  `foodbasket_order`.`id` DESC LIMIT 0 , 1);
		set @orderid = CONCAT(@unixtime, @lastorderid);";
		
		public function createOrder($userID, $quantity, $foodproductID){
			$data = array($userID, $quantity, $foodproductID);
			$sth = $this->dbh->prepare($create_order." INSERT INTO `foodbasket_order` (`orderID`,`userID`, `quantity`, `foodproduct_ID`) VALUES (@orderid, ?, ?, ?)");
			$sth->execute($data);

			if($sth->rowCount() > 0) {
				return $this->dbh->lastInsertId();
			} else {
				return null;
			}
		}

		public function getUsers() {
    		$sth = $this->dbh->query($this->users_sql);
      		$sth->setFetchMode(PDO::FETCH_CLASS, 'Users');

      		$objects = array();

      		while($obj = $sth->fetch()) {
        		$objects[] = $obj;
      		}

      		return $objects;
    	}
		
		public function getUsername($username) {
			$sql = $this->users_sql." WHERE username = :username";
			$sth = $this->dbh->prepare($sql);
			$sth->bindParam(':username', $username, PDO::PARAM_INT);
			$sth->setFetchMode(PDO::FETCH_CLASS, 'Users');
			$sth->execute();

			$objects = array();

			while($obj = $sth->fetch()) {
				$objects[] = $obj;
			}
			if (count($objects) > 0) {
				return $objects[0];
			} else {
				return null;
			}
		}
		
		public function getPassword($password) {
			$sql = $this->users_sql." WHERE password = :password";
			$sth = $this->dbh->prepare($sql);
			$sth->bindParam(':password', $password, PDO::PARAM_INT);
			$sth->setFetchMode(PDO::FETCH_CLASS, 'Users');
			$sth->execute();

			$objects = array();

			while($obj = $sth->fetch()) {
				$objects[] = $obj;
			}
			if (count($objects) > 0) {
				return $objects[0];
			} else {
				return null;
			}
		}
		
		public function getUserSalt($username) {
			$sql = $this->users_salt_sql." WHERE username = :username";
			$sth = $this->dbh->prepare($sql);
			$sth->bindParam(':username', $username, PDO::PARAM_INT);
			$sth->setFetchMode(PDO::FETCH_CLASS, 'Users');
			$sth->execute();

			$objects = array();

			while($obj = $sth->fetch()) {
				$objects[] = $obj;
			}
			if (count($objects) > 0) {
				return $objects[0];
			} else {
				return null;
			}
		}
		
		public function getUserPrivilege($username) {
			$sql = $this->users_salt_sql." WHERE username = :username";
			$sth = $this->dbh->prepare($sql);
			$sth->bindParam(':username', $username, PDO::PARAM_INT);
			$sth->setFetchMode(PDO::FETCH_CLASS, 'Users');
			$sth->execute();

			$objects = array();

			while($obj = $sth->fetch()) {
				$objects[] = $obj;
			}
			if (count($objects) > 0) {
				return $objects[0];
			} else {
				return null;
			}
		}
		
		public function createUser($username, $password, $salt) {
			$data = array($user_id, $action_id);
			$sth = $this->dbh->prepare("INSERT INTO users (username, password, salt, privilege) VALUES (?, ?, ?, 0)");
			$sth->execute($data);

			if($sth->rowCount() > 0) {
				return $this->dbh->lastInsertId();
			} else {
				return null;
			}
		}
		
		public function query($sql, $class_name) {
      		$sth = $this->dbh->query($sql);
      		$sth->setFetchMode(PDO::FETCH_CLASS, $class_name);

      		$objects = array();

      		while($obj = $sth->fetch()) {
        		$objects[] = $obj;
      		}

      		return $objects;
    	}

    	public function get($id, $table_name, $class_name, $sql = null) {
    		if ($sql == null) {
        		$sql = "SELECT * FROM $table_name WHERE id = $id LIMIT 1";
      		}

      		$sth = $this->dbh->query($sql);
      		$sth->setFetchMode(PDO::FETCH_CLASS, $class_name);

      		$objects = array();

      		while($obj = $sth->fetch()) {
        		$objects[] = $obj;
      		}

      		if (count($objects) > 0) {
        		return $objects[0];
      		} else {
        		return null;
      		}
    	}

    	public function __destruct() {
      		$this->dbh = null;
    	}
  	}
?>