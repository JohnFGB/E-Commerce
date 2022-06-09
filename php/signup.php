<?php
// memanggil file config.php
require_once "config.php";
 
// definisi variable dan inisialisasi dengan values kosong
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// memproces form buat akun ketika form di submit
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // validasi username,tidak bisa menggukanan karakter selain huruf,angka,dan underscore
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // memanggil tabel users where username
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // binding variable ke parameter username
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // set parameter
            $param_username = trim($_POST["username"]);
            
            // mencoba untuk mengeksekusi pernyataan yang telah disiapkan
            if(mysqli_stmt_execute($stmt)){
                //menyimpan hasil ke parameter
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // tutup statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // validasi password tidak boleh kurang dari 6 karakter
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // validasi konfirm password,harus sama ketika input kedua kalinya
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // cek jika input error sebelum memasukan data ke database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        //statement insert data ke database sesuai yang diinput user
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // binding variable sebagai parameter username dan password
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // set parameter
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // mencoba untuk mengeksekusi pernyataan yang telah disiapkan
            if(mysqli_stmt_execute($stmt)){
                // jika udah selesai membuat akun maka user akan redirect ke login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // tutup statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // stop koneksi mysql
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
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
        <h2>Sign Up</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>