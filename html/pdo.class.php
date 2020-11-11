<?php 
class PDOC {
	private $login;
	private $pass;
	public $connec;

	public function __construct($db, $login ='chat', $pass=']weCRJnL84'){
		$this->login = $login;
		$this->pass = $pass;
		$this->db = $db;
		$this->connexion();
	}

	private function connexion(){
		try
		{
	         $bdd = new PDO(
                            'mysql:host=172.28.100.14;port=3306;dbname='.$this->db.';charset=utf8mb4', 
                             $this->login, 
                             $this->pass
                 );
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			$this->connec = $bdd;
		}
		catch (PDOException $e)
		{
			$msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
			die($msg);
		}
    }
    public function q($sql,Array $cond = null){
		$stmt = $this->connec->prepare($sql);

		if($cond){
			foreach ($cond as $v) {
				$stmt->bindParam($v[0],$v[1],$v[2]);
			}
		}

		$stmt->execute();

		return $stmt->fetchAll();
		$stmt->closeCursor();
		$stmt=NULL;
	}
}
?>