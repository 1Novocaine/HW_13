<?php
require_once 'class/User.php';
require_once 'php/сonstants.php';
require_once 'php/functions.php';
$objUser = new User();
  try{
    $users = $objUser->selectAllUsers();
  }
    catch (PDOException $exception) {
      $objUser->redirect('error.php');
    }
      if (isset($_GET['delete_id'])) {
        if ($objUser->delete($_GET['delete_id'])) {
          $objUser->redirect('index.php?deleted');
        }
      }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
  crossorigin="anonymous">
  <link rel="shortcut icon" href="images/Favicon.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/background.css">
  <title>Перечень пользователей</title>
</head>

<body>
  <div class="background">

    <?php include 'include/navbar.php'?>

      <div class="container">
        <!-- Таблица пользователей -->
        <?PHP if ($users != null): ?>
          <table class="table table-striped table-sm table-light table-bordered table-main">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Статус</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody>
              <!-- Перебор массива пользователей -->
              <?php foreach ($users as $user):?>
                <tr>
                  <td>
                    <?= $user['id'] ;?>
                  </td>
                  <td>
                    <a href="user_info.php?userId=<?=$user['id']?>&userRole=<?=$user['role']?>">
                    <b><?= $user['fullName'] ;?></b></a>
                  </td>
                  <td>
                    <?= $user['email'] ;?>
                  </td>
                  <td>
                    <?= getUserTypeInfo($user['role']) ;?>
                  </td>
                  <td>
                    <!-- Редактирование выбранного пользователя -->
                    <a href="edit.php?editId=<?=$user['id']?>&userRole=<?=$user['role']?>" class="btn btn-success">Edit</a>
                    <!-- Удаление выбранного пользователя -->
                    <a class="confirmation" href="index.php?delete_id=<?=($user['id']); ?>"><span data-feather="trash"></span></a>
                  </td>
                </tr>
                <!-- Окончание перебора массива -->
                <? endforeach?>
            </tbody>
          <!-- Окончание таблицы -->
          </table>
          <!-- Если в переменные не поступали данные из БД - сообщение об отсутствии данных -->
          <?php else:?>
            <div class="container">
              <h2 class="mx-auto d-block">Пользователи отсутствуют</h2>
               <img src="images/user.jpg" class="rounded mx-auto d-block" alt="Need users" width="400" height="370"> </div>
          <?php endif?>
      </div>
  </div>

  <?php include ("include/footer.php"); ?>
  
</body>

</html>