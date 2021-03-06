<?php

session_start();
 
// Verifique se o usuário já está logado, em caso afirmativo, redirecione-o para a página de boas-vindas
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 

require_once "configs/connect.php";
 
$username = $password = "";
$username_err = $password_err = $login_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 

    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor, insira o nome de usuário.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor, insira sua senha.";
    } else{
        $password = trim($_POST["password"]);
    }
  

    if(empty($username_err) && empty($password_err)){

        $sql = "SELECT id, username, password FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){

            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            

            $param_username = trim($_POST["username"]);
            

            if($stmt->execute()){
   
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
     
                            session_start();
                            

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            

                            header("location: welcome.php");
                        } else{

                            $login_err = "Nome de usuário ou senha inválidos.";
                        }
                    }
                } else{
             
                    $login_err = "Nome de usuário ou senha inválidos.";
                }
            } else{
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }


            unset($stmt);
        }
    }
    

    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; 
            padding: 20px;
            margin: 0 auto;
         }
    
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login ADMIN</h2>
        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
           
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="LOGIN">
            </div>

        </form>
    </div>
</body>
</html>