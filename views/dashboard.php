<?php
session_start();

include '../classes/User.php';
$user = new User;

$all_users =$user->getAllUsers1();


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
    <div class="col-6">
        <h2 class="text-center">USER LIST</h2>
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php
                while($user =$all_users->fetch_assoc()){
                   // print_r($user);
                
                ?>
                    <tr>
                        <td>
                <!--Display the photo of the user -->
                <?php 
                if($user['photo']){
                ?>
                <img src="..//assets/images/ <?= $user['photo']?> alt="<?= $user['photo']?> class="d-block mx-auto dashboard-photo">
                <?php 
                               }else{
                            
                ?>
                <i class="fas fa-user text-secondary d-block text-center dashboard-icon"></i>
                <?php
                }
                ?>
                        </td>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['first_name'] ?></td>
                        <td><?= $user['last_name'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td>
                            <?php 
                            if($_SESSION['user_id'] == $user['id']) { 
                            ?> 
                            <a href="edit-user.php" class="btn btn-outline-warning" title="Edit">
                                <i class="far fa-pen-to-square"></i>
                            </a>
                            <a href="delete.php" class="btn btn-outline-danger" title="Delete">
                                <i class="far fa-trash-can"></i>

                            <?php 
                                   }    
                                   ?>                 
                        </td>
                    </tr>
                <?php
                    }
                ?>

            </tbody>
        </table>
    </div>
</main>

<tbody>


</tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>      
</body>
</html>