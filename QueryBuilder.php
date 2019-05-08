class QueryBuilder{

  protected $pdo;


  public function __construct($pdo){
    $this->pdo = $pdo;
  }


  public function getAll($table){
  
    $sql = "SELECT * FROM {$table}";
    $statement = $this->pdo->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
   
  }

  public function getOne($table, $id){
    $sql = "SELECT * FROM {$table} WHERE id=:id";
    $statement = $this->pdo->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
   
  }


  public function Create($table, $data){

    $keys = implode(',', array_keys($data));
    $keys1 = ":". implode(',:', array_keys($data));
    $sql = "INSERT INTO {$table} ($keys) VALUES ($keys1)"; 
    $statement = $this->pdo->prepare($sql);
    $statement->execute($data);
  }


  public function update($table, $data, $id){
    
    $keys = implode(',', array_keys($data));
    $keys1 = ":". implode(',:', array_keys($data));
    $sql = "UPDATE {$table} SET {$keys} = {$keys1} WHERE id = {$id}";
    $statement = $this->pdo->prepare($sql);
    $statement->execute($data);
    
  }


  public function delete($table, $id){

    $sql = "DELETE FROM {$table} WHERE id=:id";
    $statement = $this->pdo->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();
   
  }

}
?>
