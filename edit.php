<?php
require 'static/php/system/database.php';
require 'static/php/system/config.php';
if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession'])) and (isset($_COOKIE['thecry']))){
    $iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
    $thecry = DBEscape( strip_tags( trim( $_COOKIE['thecry'] ) ) );
    $user   = DBRead( 'user', "WHERE id = '{$iduser}' and thecry  = '{$thecry}'  LIMIT 1" );
    if (!$user){
    setcookie("iduser" , "");
    setcookie("inisession" , "");
    setcookie("thecry" , "");
    header("location: /?errorlogin");
    }
    else{
    $user = $user[0];
    $idcry = DBEscape( strip_tags(trim($_COOKIE['thecry']) ) );
    $usercry = DBRead('user', "WHERE thecry = '{$idcry}' LIMIT 1 ");
    $usercry = $usercry[0];
    require 'static/php/header.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pixel | Editando perfil</title>
    <link rel="stylesheet" href="/static/css/uikit.min.css" />
    <link rel="stylesheet" href="/static/css/style.css" />
    <script src="/static/js/uikit.min.js"></script>
    <script src="/static/js/uikit-icons.min.js"></script>
    <script src="static/js/jquery.js" type="text/javascript"></script>
    <meta charset="utf-8">
</head>
<body>



<div class="uk-flex uk-flex-center">
<div class="main">
 <div class="uk-flex uk-flex-center">


            <div class="editprofile">
                 <div class="uk-flex uk-flex-left">
<div class="status-p uk-animation-slide-top-medium" id="menu">
            <div class="background-a"></div>
            <a href="/profile.php?id=<?php echo $user['id'];?>"><li><img src="/img/avatar/<?php echo $user['photo'];?>" class="wtf">
            <span style="color: #fff; top: 40px;">  <?php
            $nome = $user['nome'] . " " .  $user['sobrenome'];
  $str2 = nl2br( $nome );
  $len2 = strlen( $str2 );
  $max2 = 11;
   if( $len2 <= $max2 )
   echo $str2;
  else    
   echo substr( $str2, 0, $max2 ) . '...'?></span>
            </li></a>
            <br>
             <br>
            <li><a href="#sejapremium" id="get" uk-toggle uk-tooltip="Ao ser Premium você tem vantangens!">Seja premium</a></li>
            <hr>
            <li><a href="/profile.php?id=<?php echo $user['id'];?>" id="linksn">Meu perfil</a></li>
            <li><a href="#" id="linksn">Seguindo</a></li>
            <li><a href="#" id="linksn">Seguidores</a></li>
        </div>
    </div>
</div>

<style type="text/css">
    .background-a{
        width: 100%;
        height: 100px;
        background-image: url("/img/background/<?php echo $user['capa'];?>");
        position: absolute;
         background-size: cover;
         border-radius: 10px;
    }
</style>
    </div>


<div id="publish" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">Publique seu projeto</h2>
        <p class="uk-text-right">
    <div class="uk-inline" style="width: 100%;">
    <div class="js-upload uk-placeholder uk-text-center">
    <span uk-icon="icon: cloud-upload"></span>
    <span class="uk-text-middle">Faça upload do seu desenho/design</span>
        <form method="POST" enctype="multipart/form-data">
    <div class="js-upload" uk-form-custom>
        <input type="file" name="file" multiple>
        <span class="uk-link" tabindex="-1">Selecione um</span>
        <br>
        <span>Obs: Selecione o arquivo e clique em publicar.</span>
    </div>
    </div>


            <textarea name="about" class="uk-input" id="senha" placeholder="Sobre o projeto" type="text" style="resize: none; height: 150px;"></textarea>
            </div>
            <br>
            <br>
            <br>
            <div style="float: right;">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Fechar</button>
            <input class="uk-button uk-button-default uk-button-primary" type="submit" id="btn2" value="Publicar" name="save" />
            </form>
            </div>
        </p>
    </div>
</div>

<?php
if (isset($_POST['save'])) {
            $n = rand (0, 10000000);
            $img2 = preg_replace('/[^\w\._]+/', '', $_FILES["file"]["name"]);
            $imgsha = sha1($img2) . ".png";
            $img = "pixel_photo." . $imgsha;



$iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );


   if(empty($_POST['about'])){
                            $tipos=array(
                    'image/gif',
                    'image/jpeg',
                    'image/png',
                );
        }

if ($_FILES["file"]["error"]>0) {
                $form['destaque'] = 0;
                $form['iduser'] = $user['id'];
                $form['photo'] = "";
                $form['sobre'] = $_POST['about'];
                $tipos=array(
                    'image/gif',
                    'image/jpeg',
                    'image/png',
                );
           DBCreate( 'desenhos', $form );
        echo '<script>location.href="/";</script>';
}
else{
                $tipos=array(
                    'image/gif',
                    'image/jpeg',
                    'image/png',
                );

if (in_array($_FILES["file"]["type"], $tipos)){
move_uploaded_file($_FILES['file']['tmp_name'], "img/desenhos/".$img);
$form['destaque'] = 0;
                $form['iduser'] = $user['id'];
                $form['photo'] = $img;
                $form['sobre'] = $_POST['about'];
DBCreate( 'desenhos', $form );
echo '<script>location.href="/";</script>';
}

}


            

}
?>

<?php
$conexao = mysql_pconnect($hostp,$userp,$passwrdp) or die (mysql_error());
$banco = mysql_select_db($dbp);
if (isset($_POST['avatarphoto'])) {
        if ($_FILES["files"]["error"]>0) {
            echo "<script language='javascript' type='text/javascript'>alert('Tens de escolher uma foto...');</script>";
        }else{
            $n = rand (0, 10000000);
            $img2 = preg_replace('/[^\w\._]+/', '', $_FILES["files"]["name"]);
            $imgsha = sha1($img2) . ".png";
             $tipos=array(
                    'image/gif',
                    'image/jpeg',
                    'image/png',
                );
            $img = "pixel_photo." . $imgsha;
            if (in_array($_FILES["files"]["type"], $tipos)){
            move_uploaded_file($_FILES['files']['tmp_name'], "img/avatar/".$img);
             echo '<script>location.href="/";</script>';

            $iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );

            $query = "UPDATE pixel_user SET `photo`='$img' WHERE `id`='$iduser'";
            $data = mysql_query($query);
            }
        }
    }
?>


<?php
if (isset($_POST['capaphoto'])) {
        if ($_FILES["filescapa"]["error"]>0) {
            echo "<script language='javascript' type='text/javascript'>alert('Tens de escolher uma foto...');</script>";
        }else{
            $n = rand (0, 10000000);
            $img2 = preg_replace('/[^\w\._]+/', '', $_FILES["filescapa"]["name"]);
            $imgsha = sha1($img2) . ".png";
             $tipos=array(
                    'image/gif',
                    'image/jpeg',
                    'image/png',
                );
            $img = "pixel_photo." . $imgsha;
            if (in_array($_FILES["filescapa"]["type"], $tipos)){
            move_uploaded_file($_FILES['filescapa']['tmp_name'], "img/background/".$img);
             echo '<script>location.href="/";</script>';

            $iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );

            $query = "UPDATE pixel_user SET `capa`='$img' WHERE `id`='$iduser'";
            $data = mysql_query($query);
            }
        }
    }
?>

<?php
$conexao = mysql_pconnect($hostp,$userp,$passwrdp) or die (mysql_error());
$banco = mysql_select_db($dbp);
if (isset($_POST['backgroundedit'])) {
        if ($_FILES["filesbackground"]["error"]>0) {
            echo "<script language='javascript' type='text/javascript'>alert('Tens de escolher uma foto...');</script>";
        }else{
            $n = rand (0, 10000000);
            $img2 = preg_replace('/[^\w\._]+/', '', $_FILES["filesbackground"]["name"]);
            $imgsha = sha1($img2) . ".png";
             $tipos=array(
                    'image/gif',
                    'image/jpeg',
                    'image/png',
                );
            $img = "pixel_photo." . $imgsha;
            if (in_array($_FILES["filesbackground"]["type"], $tipos)){
            move_uploaded_file($_FILES['filesbackground']['tmp_name'], "img/background/".$img);
             echo '<script>location.href="/";</script>';

            $iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );

            $query = "UPDATE pixel_user SET `background`='$img' WHERE `id`='$iduser'";
            $data = mysql_query($query);
            }
        }
    }
?>


    <div class="uk-flex uk-flex-center uk-animation-slide-top-medium" style="width: 600px;">
    
        <div class="editprofilere uk-animation-slide-top-medium">
            <center>
            <h1 class="uk-modal-title" style="padding: 10px">Foto de perfil atual</h1>
            <img src="/img/avatar/<?php echo $user['photo'];?>" class="avatar-cover-edit">
            </center>
            <br>
            <br>
            <!-- form -->
            <form method="POST" enctype="multipart/form-data">
            <div class="js-upload uk-placeholder uk-text-center">
            <span uk-icon="icon: cloud-upload"></span>
            <span class="uk-text-middle">Faça upload de seu foto</span>
                <form method="POST" enctype="multipart/form-data">
            <div class="js-upload" uk-form-custom>
                <input type="file" name="files" multiple>
                <span class="uk-link" tabindex="-1">Selecione um</span>
                <br>
                <span>  | Obs: Selecione o arquivo e clique em Editar foto.  |</span>
            </div>
            </div>
            <center>
            <button class="uk-button uk-button-primary" name="avatarphoto"><span uk-icon="pencil"></span>       Editar foto</button>
            </center>
            </form>
            </div>
          </div>

         <div class="editprofilere uk-animation-slide-top-medium">
            <center>
            <h1 class="uk-modal-title" style="padding: 10px">Foto de capa atual</h1>
            <img src="/img/background/<?php echo $user['capa'];?>" class="background-cover-edit">
            </center>
            <br>
            <br>
            <!-- form -->
            <form method="POST" enctype="multipart/form-data">
            <div class="js-upload uk-placeholder uk-text-center">
            <span uk-icon="icon: cloud-upload"></span>
            <span class="uk-text-middle">Faça upload de seu foto</span>
                <form method="POST" enctype="multipart/form-data">
            <div class="js-upload" uk-form-custom>
                <input type="file" name="filescapa" multiple>
                <span class="uk-link" tabindex="-1">Selecione um</span>
                <br>
                <span>  | Obs: Selecione o arquivo e clique em Editar foto.  |</span>
            </div>
            </div>
            <center>
            <button class="uk-button uk-button-primary" name="capaphoto"><span uk-icon="pencil"></span>       Editar foto</button>
            </center>
            </form>
            </div>


             <div class="editprofilere uk-animation-slide-top-medium">
            <center>
            <h1 class="uk-modal-title" style="padding: 10px">Foto de background atual</h1>
            <img src="/img/background/<?php echo $user['background'];?>" class="background-cover-edit">
            </center>
            <br>
            <br>
            <!-- form -->
            <form method="POST" enctype="multipart/form-data">
            <div class="js-upload uk-placeholder uk-text-center">
            <span uk-icon="icon: cloud-upload"></span>
            <span class="uk-text-middle">Faça upload de seu foto</span>
                <form method="POST" enctype="multipart/form-data">
            <div class="js-upload" uk-form-custom>
                <input type="file" name="filesbackground" multiple>
                <span class="uk-link" tabindex="-1">Selecione um</span>
                <br>
                <span>  | Obs: Selecione o arquivo e clique em Editar foto.  |</span>
            </div>
            </div>
            <center>
            <button class="uk-button uk-button-primary" name="backgroundedit"><span uk-icon="pencil"></span>       Editar foto</button>
            </center>
            </form>
            </div>


          </div>







            </div>

</div>     
</div>


</body>
</html>


<?php } } ?>