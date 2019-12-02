<?php
require_once 'class/User.php';
require_once 'php/сonstants.php';
require_once 'php/functions.php';
$objUser = new User();
  if (empty($_GET['userId'])) {
   $objUser->redirect('index.php?chooseUser');
  }
    try{
      $user = $objUser->selectUser($_GET['userId']);
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
  <title>Document</title>
</head>

<body>
  <div class="background">

    <?php include 'include/navbar.php'?>
      
      <div class="container">
        <table class="table table-striped table-sm table-light table-bordered table-second">
          <thead>
            <tr>
             <th>#</th>
              <th>Full Name</th>
               <th>Phone</th>
                <th>Email</th>
                 <th>Статус</th>
                  <?php if (isset($_GET['userRole']) && $_GET['userRole'] == STUDENT):?>
                    <th>Средний бал</th>
                  <?php endif ?>
                <?php if (isset($_GET['userRole']) && $_GET['userRole'] == TEACHER):?>
                  <th>Основное направление</th>
                <?php endif ?>
              <?php if (isset($_GET['userRole']) && $_GET['userRole'] == ADMIN):?>
                <th>Время приёма</th>
              <?php endif ?>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <?= $user['id'] ;?>
              </td>
              <td>
                <?= $user['fullName'] ;?>
              </td>
              <td>
                <?= $user['phone'] ;?>
              </td>
                <td>
                  <?= $user['email'] ;?>
                </td>
                <td>
                	<?= getUserTypeInfo($user['role']) ;?>
                </td>
               		<?php if (isset($_GET['userRole']) && $_GET['userRole'] == STUDENT):?>
                <td>
                	<?= $user['averageMark'] ;?>
                </td>
                	<?php endif ?>
                  	<?php if (isset($_GET['userRole']) && $_GET['userRole'] == TEACHER):?>
                <td>
                    <?= $user['subject'] ;?>
                </td>
                  	<?php endif ?>
               		<?php if (isset($_GET['userRole']) && $_GET['userRole'] == ADMIN):?>
                <td>
                   	<?= $user['workingDay'] ;?>
                </td>
                <?php endif ?>
             </tr>
             <tr>
             	<td colspan="6"> 
             		<a href="index.php" class="btn btn-primary">back</a> 
             	</td>
             </tr>
          </tbody>
        </table>
      </div>
  </div>

  <?php include ("include/footer.php"); ?>
  
</body>

</html>