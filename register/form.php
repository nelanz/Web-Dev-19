<?php
session_start();
$_SESSION['message']='';
$mysqli=new mysqli('localhost','root','','accounts');

if($_SERVER['REQUEST_METHOD']=='POST'){

    if($_POST['password']==$_POST['confirmpassword']){

        $username= $mysqli->real_escape_string($_POST['username']);//escape->zamieszcenie znakow specjalnych w bazie
        $email= $mysqli->real_escape_string($_POST['email']);
        $password= md5($_POST['password']); //md5 -> haszowanie hasla
        $avatar_path=$mysqli->real_escape_string('image/'.$_FILES['avatar']['name']);
        
        if(preg_match("!image!",$_FILES['avatar']['type'])){
            if (copy($_FILES['avatar']['tmp_name'],$avatar_path)){
                $_SESSION['username']=$username;
                $_SESSION['avatar']=$avatar_path;
                $_SESSION['email']=$email;


                $sql="INSERT INTO users (username,email,password,avatar)"
                    ."VALUES ('$username','$email','$password','$avatar_path')";
                
                if ($mysqli->query($sql)==true){
                    $_SESSION['message']="Rejestracja powiodla sie. Zostales dodany do bazy!";
                    header("location: ../login/home_login.php");
                }
                else $_SESSION['message']="Nie udalo sie zarejestrowac!";
            }
            else $_SESSION['message']="Nie mozna zaladowac plikow";
        }
        else $_SESSION['message']="Tylko pliki GIF, JPG i PNG";

    }
    else $_SESSION['message']="Hasla nie sa takie same";
}
?>
<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1 style="text-align:center">Rejestracja konta</h1>
    <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message']?></div>
      <input type="text" placeholder=<?php if($_SESSION['username']!=null) print $_SESSION['username'];else"Login";?>
             value= <?php if($_SESSION['username']!=null) print $_SESSION['username'];else ""; ?> name="username" required />
      <input type="email" placeholder=<?php if($_SESSION['email']!=null) print $_SESSION['email'];else"Email";?>
             value= <?php if($_SESSION['email']!=null) print $_SESSION['email'];else ""; ?> name="email" required />  
      <input type="password" placeholder="Hasło" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Potwierdź hasło" name="confirmpassword" autocomplete="new-password" required />
      <div class="avatar"><label>Wybierz swój avatar: </label><input type="file" name="avatar" accept="image/*" /></div>
      <input type="submit" value=<?php if($_SESSION['username']!=null) print 'Zmień dane'; else print 'Zarejestruj się';?> name="Register" class="btn btn-block btn-primary" /> <!--tu ucina value-->
    </form>
  </div>
</div>