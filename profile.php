<?php
require '/static/php/system/database.php';
require '/static/php/system/config.php';
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
?>

<?php
$idpeople = DBEscape( strip_tags(trim($_GET['id']) ) );
$people = DBRead('user', "WHERE id = '{$idpeople}' LIMIT 1 ");
$people = $people[0];
?>


<!DOCTYPE html>
<html>
<head>
    <title>Pixel | <?php echo $people['nome'];?> <?php echo $people['sobrenome'];?></title>
    <link rel="stylesheet" href="/static/css/uikit.min.css" />
    <link rel="stylesheet" href="/static/css/style.css" />
    <script src="/static/js/uikit.min.js"></script>
    <script src="/static/js/uikit-icons.min.js"></script>
    <script src="static/js/jquery.js" type="text/javascript"></script>
    <meta charset="utf-8">
</head>

<body>
<?php 
require 'static/php/header.php';
?>
<?php
if (!$people){
?>

<div class="uk-flex uk-flex-center">
<div class="main">
    <div class="uk-alert-primary uk-animation-slide-top-medium" uk-alert>
    <a class="uk-alert-close"></a>
    <p>Este perfil não existe</p>
    </div>
    <div class="uk-flex uk-flex-left">
        <div class="status-p uk-animation-slide-top-medium">
            <a href="/profile.php?id=<?php echo $user['id'];?>"><li><img src="/img/avatar/<?php echo $user['photo'];?>" class="wtf">
            <span>  <?php
            $nome = $user['nome'] . " " .  $user['sobrenome'];
  $str2 = nl2br( $nome );
  $len2 = strlen( $str2 );
  $max2 = 11;
   if( $len2 <= $max2 )
   echo $str2;
  else    
   echo substr( $str2, 0, $max2 ) . '...'?></span>
            </li></a>
            <div id="setar"><span id="setting" uk-tooltip="Configurações" uk-icon="settings"></span></div>
            <div class="settings-div">
                <a href="/profile.php?id=<?php echo $user['id'];?>"><li>Meu perfil</li></a>
                <a href="/editprofile"><li>Alterar design</li>
                <a href="/logout"><li>Sair</li>
            </div>
            <li><a href="#sejapremium" id="get" uk-toggle uk-tooltip="Ao ser Premium você tem vantangens!">Seja premium</a></li>
            <hr>
            <li><a href="/profile.php?id=<?php echo $user['id'];?>" id="linksn">Meu perfil</a></li>
            <li><a href="#" id="linksn">Seguindo</a></li>
            <li><a href="#" id="linksn">Seguidores</a></li>
            <hr>
            <li><a href="#" id="linksn">Configurações</a></li>
        </div>
    </div>

<div id="sejapremium" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">Premium</h2>
        <p>Ao ser premium você tem a suas imagens para todos verem.</p>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Fechar</button>
            <button class="uk-button uk-button-primary" type="button">Compre</button>
        </p>
    </div>
</div>


<div id="sejapremium" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">Premium</h2>
        <p>Ao ser premium você tem a suas imagens para todos verem.</p>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Fechar</button>
            <button class="uk-button uk-button-primary" type="button">Compre</button>
        </p>
    </div>
</div>




<?php }  else{?>
<div id="background-cover"></div>
<div class="overflow"></div>
<div class="uk-flex uk-flex-center">
<div class="main">
    <div class="uk-alert-primary uk-animation-slide-top-medium" uk-alert>
    <a class="uk-alert-close"></a>
    <p>Perfil de <?php echo $people['nome'];?> <?php echo $people['sobrenome'];?></p>
    </div>
    <!-- <div class="uk-flex uk-flex-left">
        <div class="status-p uk-animation-slide-top-medium">
            <a href="/profile.php?id=<?php echo $user['id'];?>"><li><img src="/img/avatar/<?php echo $user['photo'];?>" class="wtf">
            <span>  <?php
            $nome = $user['nome'] . " " .  $user['sobrenome'];
  $str2 = nl2br( $nome );
  $len2 = strlen( $str2 );
  $max2 = 20;
   if( $len2 <= $max2 )
   echo $str2;
  else    
   echo substr( $str2, 0, $max2 ) . '...'?></span>
            </li></a>
            <div id="setar"><span id="setting" uk-tooltip="Configurações" uk-icon="settings"></span></div>
            <div class="settings-div">
                <a href="/profile.php?id=<?php echo $user['id'];?>"><li>Meu perfil</li></a>
                <a href="/editprofile"><li>Alterar design</li>
                <a href="/logout"><li>Sair</li>
            </div>
            <li><a href="#sejapremium" id="get" uk-toggle uk-tooltip="Ao ser Premium você tem vantangens!">Seja premium</a></li>
            <hr>
            <li><a href="/profile.php?id=<?php echo $user['id'];?>" id="linksn">Meu perfil</a></li>
            <li><a href="#" id="linksn">Seguindo</a></li>
            <li><a href="#" id="linksn">Seguidores</a></li>
            <hr>
            <li><a href="#" id="linksn">Configurações</a></li>
        </div>
    </div> -->

<div id="sejapremium" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">Premium</h2>
        <p>Ao ser premium você tem a suas imagens para todos verem.</p>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Fechar</button>
            <button class="uk-button uk-button-primary" type="button">Compre</button>
        </p>
    </div>
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


    <div class="uk-flex uk-flex-right">
        <div class="profiles uk-animation-slide-top-medium">
         <div class="profile">
            <div class="background-cover">
                <div class="avatar-cover">
                    <?php if($people['admin'] == 1){?>
                     <span id="bolts" uk-tooltip="Admin" uk-icon="bolt">
                    <?php } else { ?>
                    <span id="user" uk-tooltip="Membro" uk-icon="user">
                    <?php } ?>
                </div>
                 <div class="back">
                    <div class="seguir">
                    <?php
                    if($people['id'] == $user['id']){
                    ?>
                        <a><button class="uk-button uk-button-primary"><span uk-icon="info"></span>       Atividades</button></a>
                        <a href="/editprofile"><button class="uk-button uk-button-primary"><span uk-icon="pencil"></span>       Editar perfil</button></a>
                    <?php } else{ ?>
                        <button class="uk-button uk-button-primary" id="addf">Seguir</button>
                        <button class="uk-button uk-button-primary"><span uk-icon="warning"></span>       Bloquear</button>
                    <?php } ?>
                    </div>
                </div>
            </div>

<div id="friend-resposta"></div>

<script type="text/javascript">
  $(document).ready(function() {
    $("#addf").click(function() {
        var people = <?php echo $people['id'];?>;
        $.post("/static/php/seguir.php", {people: people},
        function(data){
         $("#friend-resposta").html(data);
         }
         , "html");
         return false;
    });
});
</script>



<div class="uk-flex uk-flex-left">
        <div class="status-p uk-animation-slide-top-medium" style="top: 380px; position: fixed;">
            <a><li><img src="/img/avatar/<?php echo $people['photo'];?>" class="wtf">
            <span>  <?php
            $nome = $people['nome'] . " " .  $people['sobrenome'];
  $str2 = nl2br( $nome );
  $len2 = strlen( $str2 );
  $max2 = 15;
   if( $len2 <= $max2 )
   echo $str2;
  else    
   echo substr( $str2, 0, $max2 ) . '...'?></span>
            </li></a>
            <?php
            if($user['id'] <> $people['id']){
            ?>
            <li><a id="get" uk-tooltip="Vire fa de <?php echo $nome;?>">Virar fan</a></li>
            <?php } else{?>
            <li><a id="get" href="/editprofile" uk-tooltip="Adiciona uma foto de perfil ou de capa ou de background.">Editar perfil</a></li>
            <?php } ?>
            <hr>
            <li><a href="#" id="linksn">Seguindo</a></li>
            <li><a href="#" id="linksn">Seguidores</a></li>
            <hr>
            <li><a href="/profile.php?id=<?php echo $people['id'];?>&viewfotos=1" id="linksn">Desenhos</a></li>
            <li><a href="#" id="linksn">Desenhos favoritos</a></li>
            <hr>
            <li><a href="#" id="linksn">Fotos de perfil</a></li>
        </div>
    </div>



<?php
if($_GET['viewfotos'] == 1){
?>



<div class="uk-flex uk-flex-right">
<div class="postagem" style="top: 50px;">

<h2 style="color: #fff;">Desenhos</h2>
<div class="uk-child-width-1-3@m" uk-grid uk-lightbox="animation: scale">
<?php
                $peopleid = $people['id'];
                $desenhos = DBRead( 'desenhos', "WHERE id and iduser = $peopleid ORDER BY id DESC LIMIT 20" );
                if (!$desenhos)
                echo '<div class="uk-alert-primary uk-animation-slide-top-medium" uk-alert style="top: 55px; width: 90%; left: 30px; position: relative;">
                        <a class="uk-alert-close"></a>
                        <p>Nenhuma desenho do usuario.</p>
                        </div>';    
                else  
                    foreach ($desenhos as $desenho):   
                ?>
                <?php
                $eu = $desenho['iduser'];
                $eudesenheis = DBRead( 'user', "WHERE id = $eu ORDER BY id DESC LIMIT 1" );
                if (!$eudesenheis)
                echo '';    
                else  
                    foreach ($eudesenheis as $eudesenhei):   
                ?>
                <?php if($desenho['photo'] == ""){ echo '';}else{?>
                      <div style="width: 100%; max-height: 800px;">
                        <a uk-tooltip="Feito por <?php echo $eudesenhei['nome']; ?> <?php echo $eudesenhei['sobrenome']; ?> <br> <?php echo $desenho['sobre']; ?>" class="uk-inline" href="img/desenhos/<?php echo $desenho['photo'];?>" data-caption="<?php echo $eudesenhei['nome'];?> <?php echo $eudesenhei['sobrenome'];?> :  <?php echo $desenho['sobre'];?>" style="width: 100%; max-height: 800px;">
                            <img src="img/desenhos/<?php echo $desenho['photo'];?>" style="width: 100%; max-height: 800px;" alt=""/>
                        </a>
                    </div>
                <?php } ?>

<?php endforeach;endforeach;?>
</div>
</div>
</div>


<?php } else{ ?>

<div class="uk-flex uk-flex-right">
<div class="postagem">
<?php
$peopleid = $people['id'];
                $desenhos = DBRead( 'desenhos', "WHERE id and iduser = $peopleid ORDER BY id DESC LIMIT 20" );
                if (!$desenhos)
                echo '<div class="uk-alert-primary uk-animation-slide-top-medium" uk-alert style="top: 55px;">
                        <a class="uk-alert-close"></a>
                        <p>Nenhuma publicação do usuario.</p>
                        </div>';    
                else  
                    foreach ($desenhos as $desenho):   
                ?>
                <?php
                $eu = $desenho['iduser'];
                $eudesenheis = DBRead( 'user', "WHERE id = $eu ORDER BY id DESC LIMIT 1" );
                if (!$eudesenheis)
                echo '';    
                else  
                    foreach ($eudesenheis as $eudesenhei):   
                ?>
                 <?php
  $conexao = mysql_pconnect($hostp,$userp,$passwrdp) or die (mysql_error());
  $banco = mysql_select_db($dbp);
  $comentiduser = $desenho['id'];
  $totalcurtida = mysql_query("SELECT * FROM pixel_like WHERE idpost = $comentiduser ");
  $totalcurtida = mysql_num_rows($totalcurtida);
                                                     ?>
<div class="newst">
<article class="uk-comment">
    <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
        <div class="uk-width-auto">
            <img uk-tooltip="<?php echo $eudesenhei['nome'];?> <?php echo $eudesenhei['sobrenome'];?>" class="uk-comment-avatar" src="
            /img/avatar/<?php echo $eudesenhei['photo'];?>" style="border-radius: 50%; left: 10px; position: relative; top: 10px; height: 50px; width: 50px;" width="50" height="50" alt="">
        </div>
        <div class="uk-width-expand">
            <h4 style="position: relative; top: 13px;" class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="/profile.php?id=<?php echo $eudesenhei['id']; ?>"><?php echo $eudesenhei['nome'];?> <?php echo $eudesenhei['sobrenome'];?></a></h4>
        </div>
    </header>
    <hr>
    <div class="uk-comment-body">
        <?php if(empty($desenho['sobre'])){ echo '';}else{?>
                    <p style="padding: 5px;"><?php echo $desenho['sobre'];?></p>
            <?Php }?>
            <?php if(empty($desenho['photo'])){ echo '';}else{?>
<div class="uk-child-width-1-3@m" uk-grid uk-lightbox="animation: scale">
    <div style="width: 100%; max-height: 800px;">
        <a class="uk-inline" href="img/desenhos/<?php echo $desenho['photo'];?>" data-caption="<?php echo $eudesenhei['nome'];?> <?php echo $eudesenhei['sobrenome'];?> :  <?php echo $desenho['sobre'];?>" style="width: 100%; max-height: auto; max-height: 800px;">
            <img src="img/desenhos/<?php echo $desenho['photo'];?>" style="width: 100%; max-height: 800px;" alt=""/>
        </a>
    </div>
</div>
            <?Php }?>
          <p class="totallike" id="totallike<?php echo $desenho['id']; ?>"><?php echo $totalcurtida;?> curtiram isso</p>
         <div id="bottom-post">
<?php
$iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
$comentiduser = $desenho['id'];
$likes = DBRead( 'like', "WHERE idpost = $comentiduser and iduser = $iduser ORDER BY id DESC" );
if (!$likes)
echo '<a id="like'.$desenho['id'].'"><span id="nani'.$desenho['id'].'" uk-icon="heart"></span></a>';
else  
  foreach ($likes as $like):
?>
<a id="like<?php echo $desenho['id']; ?>"><span id="nani<?php echo $desenho['id']; ?>" class="ativo-like" uk-icon="heart"></span></a>
<?php endforeach; ?>
                         <span uk-tooltip="Ver mais" uk-icon="more"></span> 
        </div>
    </div>
</article>
</div>

<div id="respostaba"></div>

<script type="text/javascript">
   $(document).ready(function() {
    $("#like<?php echo $desenho['id']; ?>").click(function() {
        var post = <?php echo $desenho['id'] ?>; 
        $.post("/static/php/react.php", {post: post},
        function(data){
         $("#respostaba").html(data);
         }
         , "html");
         return false;
    });
});
</script>

<?php endforeach; endforeach ; ?>


    </div>
    <?php } ?>

</div>

</div>



         </div>
</div>
</div>    


<style type="text/css">
    .background-cover{
        background-image: url("/img/background/<?php echo $people['capa'];?>");
    }

    .avatar-cover{
        background-image: url(/img/avatar/<?php echo $people['photo'];?>);
    }

    #background-cover{
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        background-image: url(/img/background/<?php echo $people['background'];?>);
        background-size: cover;
    }
</style>

</body>

</html>


<?php } } } ?>