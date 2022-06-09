<?php
// isialisasi sesi
session_start();
 
// cek jika user udah login atau belom, jika iya maka langsung masuk ke homepage
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../homepage/index.php");
    exit;
}
 
// memanggil file config.php
require_once "config.php";
 
//  variable dan value kosong untuk user input
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// memproses form login ketika di login button di klik
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // cek jika username tidak diisi / kosong akan menampilkan pesan ini
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // cek jika password tidak diisi / kosong akan menampilkan pesan ini
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // validasi credential ketika username dan password ada di database
    if(empty($username_err) && empty($password_err)){
        // select data id,username,password dari tabel users where username yang diinputkan user
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // binding variable ke parameter username
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // set parameters username
            $param_username = $username;
            
            // mencoba untuk mengeksekusi pernyataan yang telah disiapkan
            if(mysqli_stmt_execute($stmt)){
                // menyimpan hasil ke parameter
                mysqli_stmt_store_result($stmt);
                
                // periksa apakah nama pengguna ada, jika ya maka suruh masukan password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // menyimpan hasil ke parameter
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // password benar, jadi mulai sesi baru,sesi yang pertama otomatis stop
                            session_start();
                            
                            // simpan data di sesi variable
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // jika username,password ada dan sama dengan di database maka user masuk ke home page
                            header("location: ../homepage/index.php");
                        } else{
                            // jika username atau password salah, tampilkan pesan ini
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // jika username tidak ada di database, tampilkan pesan ini
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../favicon.png" />
    <style>
        
        body{ font: 14px sans-serif; }
        .wrapper{ 
            width: 500px; 
            padding: 100px 100px; 
            align-items: center;
            border: 3px solid #f1f1f1;
            text-align: center;
            margin: auto;
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
}

    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>