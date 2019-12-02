<?php
require_once 'Database.php';
class User {
    private $conn;
    // Конструктор, создание подключения
    public function __construct()
    {
      $database = new Database();
      $db = $database->dbConnection();
      $this->conn = $db;
    }
    //Выбор пользователя по $id
    public function selectUser($id) 
    {
      $sql = "SELECT * FROM members WHERE id = :id";
      $query = $this->conn->prepare($sql);
      $query->bindValue(':id', $id);
      $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    //выбор всех пользователей
    public function selectAllUsers() 
    {
      $sql = "SELECT * FROM members";
      $query = $this->conn->prepare($sql);
      $query->execute();
      return $query->fetchAll();
    }
    // Создание пользователя
    public function insert($userParam)
    {
      $query = $this->conn->prepare("INSERT INTO members (fullname, phone, email, role, averageMark, subject, workingDay) VALUES(:fullname, :phone, :email, :role, :averageMark, :subject, :workingDay)");
      $query->bindparam(":fullname", $userParam['fullname']);
      $query->bindparam(":phone", $userParam['phone']);
      $query->bindparam(":email", $userParam['email']);
      $query->bindparam(":role", $userParam['role']);
      $query->bindparam(":averageMark", $userParam['averageMark']);
      $query->bindparam(":subject", $userParam['subject']);
      $query->bindparam(":workingDay", $userParam['workingDay']);
      $query->execute();
        return $query;
    }
    // Редактирование пользователя
    public function update($userParam, $id)
    {
      $query = $this->conn->prepare("UPDATE members SET fullname = :fullname, phone = :phone, email = :email, role = :role, averageMark = :averageMark, subject = :subject, workingDay = :workingDay WHERE id = :id");
      $query->bindparam(":fullname", $userParam['fullname']);
      $query->bindparam(":phone", $userParam['phone']);
      $query->bindparam(":email", $userParam['email']);
      $query->bindparam(":role", $userParam['role']);
      $query->bindparam(":averageMark", $userParam['averageMark']);
      $query->bindparam(":subject", $userParam['subject']);
      $query->bindparam(":workingDay", $userParam['workingDay']);
      $query->bindparam(":id", $id);
      $query->execute();
        return $query;
    }
    // Удаление пользователя
    public function delete($id)
    {
      $query = $this->conn->prepare("DELETE FROM members WHERE id = :id");
      $query->bindparam(":id", $id);
      $query->execute();
        return $query;
    }
    // Переадресация
    public function redirect($url)
    {
      header("Location: $url");
    }
}
?>
