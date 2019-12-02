<?php require_once './php/сonstants.php' ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <img src="../images/3.png" width="40" height="40" alt="icon">
    <button class="navbar-toggler"
    type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
    aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse"
    id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active"> <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a></li>
        <li class="nav-item"> <a class="nav-link" href="index.php">Состав схолы</a> </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Добавить пользователя</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="create.php?userType=<?=ADMIN ?>">Администратор</a> 
          <a class="dropdown-item" href="create.php?userType=<?=TEACHER ?>">Преподаватель</a> 
          <a class="dropdown-item" href="create.php?userType=<?=STUDENT ?>">Студент</a>           
          </div>
        </li>
      </ul>
    </div>
  </nav>