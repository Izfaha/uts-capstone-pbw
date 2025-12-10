<?php
//memulai session atau melanjutkan session yang sudah ada
session_start();

//menyertakan code dari file koneksi
include "koneksi.php";

//check jika sudah ada user yang login arahkan ke halaman admin
if (isset($_SESSION['username'])) { 
	header("location:admin.php"); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['user'];
  
  //menggunakan fungsi enkripsi md5 supaya sama dengan password  yang tersimpan di database
  $password = md5($_POST['pass']);

	//prepared statement
  $stmt = $conn->prepare("SELECT username 
                          FROM user 
                          WHERE username=? AND password=?");

	//parameter binding 
  $stmt->bind_param("ss", $username, $password);//username string dan password string
  
  //database executes the statement
  $stmt->execute();
  
  //menampung hasil eksekusi
  $hasil = $stmt->get_result();
  
  //mengambil baris dari hasil sebagai array asosiatif
  $row = $hasil->fetch_array(MYSQLI_ASSOC);

  //check apakah ada baris hasil data user yang cocok
  if (!empty($row)) {
    //jika ada, simpan variable username pada session
    $_SESSION['username'] = $row['username'];

    //mengalihkan ke halaman admin
    header("location:admin.php");
  } else {
	  //jika tidak ada (gagal), alihkan kembali ke halaman login
    header("location:login.php");
  }

	//menutup koneksi database
  $stmt->close();
  $conn->close();
}
?>

<!-- html -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login | My Daily Journal</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    body {
      background-color: #f4f7f6;
    }

    .login-card {
      border-radius: 20px;
      overflow: hidden;
    }

    .left-side {
      background: linear-gradient(135deg, #8E2DE2, #4A00E0, #faa499);
      background-size: 200% 200%;
      animation: gradientBG 5s ease infinite;
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 40px;
    }

    @keyframes gradientBG {
      0% {
        background-position: 0% 50%;
      }

      50% {
        background-position: 100% 50%;
      }

      100% {
        background-position: 0% 50%;
      }
    }

    .form-control {
      background-color: #f8f9fa;
      border: 1px solid #e9ecef;
    }

    .form-control:focus {
      border-color: #8E2DE2;
      box-shadow: 0 0 0 0.2rem rgba(142, 45, 226, 0.25);
    }

    .btn-login {
      background: linear-gradient(to right, #8E2DE2, #4A00E0);
      border: none;
      color: white;
      transition: 0.3s;
    }

    .btn-login:hover {
      background: linear-gradient(to right, #4A00E0, #8E2DE2);
      transform: translateY(-2px);
      color: white;
    }
  </style>
</head>

<body class="d-flex align-items-center min-vh-100">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-9">

        <div class="card border-0 shadow-lg login-card">
          <div class="row g-0">

            <div class="col-md-6 d-none d-md-flex left-side">
              <i class="bi bi-journal-richtext display-1 mb-3"></i>
              <h2 class="fw-bold">Welcome Back!</h2>
              <p class="text-center small">Please login to access your daily journal dashboard.</p>
            </div>

            <div class="col-md-6 bg-white p-5">
              <div class="text-center mb-4">
                <h3 class="fw-bold text-dark">Login</h3>
                <p class="text-secondary small">Enter your details below</p>
              </div>

              <form action="" method="post">
                <div class="mb-3">
                  <label for="user" class="form-label text-secondary small">Username</label>
                  <input type="text" name="user" class="form-control py-2 rounded-3" placeholder="Masukan Username"
                    required />
                </div>

                <div class="mb-4">
                  <label for="pass" class="form-label text-secondary small">Password</label>
                  <input type="password" name="pass" class="form-control py-2 rounded-3" placeholder="Masukan Password"
                    required />
                </div>

                <div class="d-grid">
                  <button class="btn btn-login py-2 rounded-3 fw-bold">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        
        <?php
        $username = "admin";
        $password = "123456";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $input_user = $_POST['user'];
          $input_pass = $_POST['pass'];

          if ($input_user == $username AND $input_pass == $password) {
            $bg_class = "bg-success-subtle border-success";
            $text_msg = "Username dan Password Benar";
            $text_color = "text-success-emphasis";
            $icon = "bi-check-circle-fill";
          } else {
            $bg_class = "bg-danger-subtle border-danger";
            $text_msg = "Username dan Password Salah";
            $text_color = "text-danger-emphasis";
            $icon = "bi-exclamation-triangle-fill";
          }

          echo "
            <div class='card border shadow-sm rounded-3 mt-3 $bg_class' style='max-width: 100%;'>
                <div class='card-body p-3 text-center'>
                    <div class='$text_color fw-bold'>
                        <i class='bi $icon me-2'></i> $text_msg
                    </div>
                    <small class='text-muted d-block mt-1'>
                        Input: $input_user | Pass: $input_pass
                    </small>
                </div>
            </div>";
        }
        ?>

      </div>
    </div>
  </div>

</body>
</html>