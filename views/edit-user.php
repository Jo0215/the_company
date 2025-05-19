<?php
session_start();

include '../classes/User.php';
$user_obj = new User;

$user = $user_obj->getUser($_SESSION['user_id']);


//$userModel = new User();         
//$userModel->getAllUsers(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashbord</title>

 <!--Boot strap-->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

 <!--font awsome-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />     

 <link rel="stylesheet" href="../assets/css/style.css">
 
 <style>
    </style>

</head>
<body>

<nav class="navbar navbar-expand navbar-dark bg-dark" style="margin-bottom:80px;">
    <div class="container">
        <a href="dashboard.php" class="navbar-brand">
        <h1 class="h3">The Company</h1>
        </a>

        <div class="navbar-nav">
            <span class="navbar-text"><?= $_SESSION['full_name'] ?></span>
            <form action="../actions/logout.php" method="post" class="d-flex ms-2">
                <button type="submit" class="text-danger bg-transparent border-0">Logout</button>
            </form>
        </div>
    </div>
</nav>

<main class="row justify-content-center gx-0">
    <div class="col-4">
        <h2 class="text-center mb-4">EDIT USER</h2>
      <form action="../actions/edit-user.php" method="post" entype= "multipart/for,-data">
        <dive class="row justify-content-center mb-3">
            <div class="col-6">
                <?php 
                    if($user['photo']){
                ?>
                    <img src="..//assets/images/ <?= $user['photo']?> alt="<?= $user['photo']?> class="d-block mx-auto edit-photo">
                <?php 
                                }else{
                                
                ?>
                    <i class="fas fa-user text-secondary d-block text-center edit-icon"></i>

                <?php
                    }
                ?>
                <input type="file" name="photo" id="photo" class= "form-control mt-2" accept="image/*">
            </div>

            <div class="mb-3">
                        <label for="first_name" class="form-label fw-bold">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" value="<?= $user['first_name'] ?>">
                        </div>

                    <div class="mb-3">
                    <label for="last_name" class="form-label fw-bold">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" value="<?= $user['last_name'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label fw-bold">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= $user['username'] ?>">
                        </div>

                      <div class="text-end mb-3"> 
                      <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
                      <button type="subbmit" class="btn btn-warning btn-sm px-5">Save</button>
        </div>
        </div> 
      </form>
    </div>
</main>


</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>      
</body>
</html>