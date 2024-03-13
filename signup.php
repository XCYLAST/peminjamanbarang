<?php
require_once('database.php');
session_start();

if (isset($_POST['masuk'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $status = $_POST['status'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = "user"; // Set the role to 'user'

    $inputdata = "INSERT INTO users (nis, nama, status, username, password, role) VALUES ('$nis', '$nama', '$status', '$username', '$password', '$role')";

    if (inputdata($inputdata)) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("location: login.php");
        exit();
    } else {
        header("location: signup.php?msg=gagal");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  <link rel="stylesheet" href="./style.css"> <!-- Include your stylesheet here -->
</head>

<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
  }

  section {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
  }

  span {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to right, #8e2de2, #4a00e0);
    z-index: -1;
  }

  .signin {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  }

  h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
  }

  .form {
    max-width: 300px;
    margin: 0 auto;
  }

  .inputBox {
    position: relative;
    margin-bottom: 20px;
  }

  .inputBox input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
    transition: border-color 0.3s ease; /* Transisi warna border saat diklik */
  }

  .inputBox input:focus {
    border-color: #4a00e0; /* Warna border saat input mendapatkan fokus */
  }

  .inputBox i {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
    pointer-events: none;
    transition: color 0.3s ease; /* Transisi warna ikon saat diklik */
}

.inputBox input:focus ~ i,
.inputBox input:valid ~ i {
    color: transparent; /* Teks label menjadi transparan saat input mendapatkan fokus atau memiliki nilai */
}


  .links {
    text-align: center;
  }

  .links a {
    text-decoration: none;
    color: #333;
    margin: 0 10px;
  }

  input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4a00e0;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  input[type="submit"]:hover {
    background-color: #8e2de2;
  }
</style>

<body>

  <section>
    <span></span>

    <div class="signin">
      <div class="content">
        <h2>Sign Up</h2>
        <div class="form">
          <form action="signup.php" method="post">
            <div class="inputBox">
              <input type="text" name="nis" required>
              <i>nis</i>
            </div>
            <div class="inputBox">
              <input type="text" name="nama" required>
              <i>Nama</i>
            </div>
            <div class="inputBox">
              <input type="text" name="status" required>
              <i>Status</i>
            </div>
            <div class="inputBox">
              <input type="text" name="username" required>
              <i>Username</i>
            </div>
            <div class="inputBox">
              <input type="password" name="password" required>
              <i>Password</i>
            </div>
            <div class="inputBox">
              <input type="submit" name="masuk" value="Sign Up">
            </div>
          </form>
        </div>
      </div>
    </div>

  </section>

</body>

</html>
