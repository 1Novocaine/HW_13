<?php
require_once 'class/User.php';
require_once 'php/сonstants.php';
$objUser = new User();
	if (empty($_GET['userType'])) {
   $objUser->redirect('index.php?selectTypeUserToCreate');
  }
	if (isset($_POST['create'])) {
		try {
			if ($objUser->insert($_POST)){
				$objUser->redirect('index.php?inserted');
			} 
		}catch (PROException $exception) {
			$objUser->redirect('error.php');
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

		<?php include "include/navbar.php";?>

			<div class="container">
				<form method="POST" class="decor">
					<div class="form-left-decoration"></div>
						<div class="form-right-decoration"></div>
							<div class="circle"></div>
								<div class="form-inner">
									<div class="form-group">
										<label>fullName *</label>
										<input type="text" name="fullname" class="form-control"
										placeholder="ФИО" required> </div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label>phone *</label>
											<input type="text" name="phone" class="form-control" placeholder="Контактный номер"
											required> </div>
										<div class="form-group col-md-6">
											<label>email *</label>
											<input type="text" name="email" class="form-control" placeholder="Электронная почта"
											required> 
										</div>
									</div>
								<!-- php выводит поле, которое соответствует заданому типу пользователя СТУДЕНТ -->
								<?php if (isset($_GET['userType']) && $_GET['userType'] == STUDENT): ?>
									<label>role *</label>
									<select id="main" name="role" class="form-control" readonly>
											<option value="<?= STUDENT ?>">Cтудент</option>
									</select>
									<label>averageMark *</label>
									<input type="text" name="averageMark" placeholder="7.5"	class="form-control" required>
								<?php endif?>
							<!-- php выводит поле, которое соответствует заданому типу пользователя ПРЕПОДАВАТЕЛЬ -->
							<?php if (isset($_GET['userType']) && $_GET['userType'] == TEACHER): ?>
								<label>role *</label>
								<select id="main" name="role" class="form-control" readonly>
									<option value="<?= TEACHER ?>">Преподаватель</option>
								</select>
								<label>subject *</label>
								<input type="text" name="subject" placeholder="Математика" class="form-control" required>
							<?php endif?>
						<!-- php выводит поле, которое соответствует заданому типу пользователя АДМИНИСТРАТОР -->
						<?php if (isset($_GET['userType']) && $_GET['userType'] == ADMIN): ?>
							<label>role *</label>
							<select id="main" name="role" class="form-control" readonly>
								<option value="<?= ADMIN ?>">Администратор</option>
							</select>
							<label>workingDay *</label>
							<input type="text" name="workingDay" placeholder="Среда" class="form-control" required>
						<?php endif?>
					  <button class="btn btn-success btn-create" type="submit" name="create">Добавить пользователя</button> 
					<a href="index.php" class="btn btn-primary">back</a>
				</div>
			</form>
			</div>
	</div>

	<?php include "include/footer.php"; ?>
	
</body>

</html>


		