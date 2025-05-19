<?php

include 'Database.php';
class User extends Database
{
    public function register($request)
    {
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $password = password_hash($request['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(first_name,last_name,username,password ) VALUES ('$first_name','$last_name','$username','$password' )";
        if ($this->conn->query($sql)) {
            header('location:../views/login.php');
        } else {
            echo "Error:" . $sql . "<br>" . $this->conn->error;

        }
    }
    // Get　from... users 
    public function getAllUsers()
    {
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $result = $this->conn->query($sql);

        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function login($request)
    {
        $username = $request['username'];
        $password = $request['password'];

        $sql = "SELECT * FROM users WHERE username = '$username'";
        if ($result = $this->conn->query($sql)) {
            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['full_name'] = $user['first_name'] . '' . $user['last_name'];
                    header('location:../views/dashboard.php');
                } else {
                    echo "Invalid username or password ";
                }


            } else {
                echo "Invalid username or password ";
            }
        } else {
            echo "Error:" . $sql . "<br>" . $this->conn->error;
        }

    }
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        header('location:../views/login.php');
        exit;
    }

    public function getAllUsers1()
    {
        $sql = "SELECT * FROM users";
        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            die('Error retrieving all users:' . $this->conn->error);
        }
    }

    public function getUser($id)
    {
        $sql = "SELECT * FROM users WHERE id=$id";
        if ($result = $this->conn->query($sql)) {
            return $result->fetch_assoc();
        } else {
            die('Error retrieving the user:' . $this->conn->error);
        }
    }

    public function update($request)
    {
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];

        $sql = "UPDATE users SET first_name ='$first_name',last_name ='$last_name', username ='$username' WHERE id ={$_SESSION['user_id']}";
        if ($this->conn->query($sql)) {
            header('location: ../views/dashboard.php');
        } else {
            echo "Error:" . $sql . "<br>" . $this->conn->error;
        }
    }

    //delete
    public function deleteUser(){
       
         $sql = "DELETE FROM users WHERE id = {$_SESSION['user_id']}";
        if($this->conn->query($sql)){
            $this->logout();
        } else{
            die('Errror deleting the production section:' .  $this->conn->error);
            }
    
    }
}

