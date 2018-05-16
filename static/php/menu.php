<div class="uk-flex uk-flex-center">
<div class="main">
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

<!--      <div class="uk-flex uk-flex-right" style="position: relative; left: 140px;">
        <div class="status-s uk-animation-slide-top-medium">
            
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


    <div class="uk-flex uk-flex-center">
        <div class="feed uk-animation-slide-top-medium">
    <div class="uk-alert-primary uk-animation-slide-top-medium" uk-alert>
    <a class="uk-alert-close"></a>
    <p>Seja bem vindo(a) ao mundo dos artistas.</p>
    </div>
        <div class="news">
                <p>Info</p>
                <li><a>Nova função</a><span>sistema de mudar de foto</span></li>
            </div>

            <?php
                $desenhos = DBRead( 'desenhos', "WHERE id ORDER BY id DESC LIMIT 1" );
                if (!$desenhos)
                echo '';    
                else  
                    foreach ($desenhos as $desenho):   
                ?>


            <div class="news uk-animation-slide-top-medium" id="nt">
                <p>Desenhos em altas</p>
                <div class="uk-position-relative uk-visible-toggle uk-light" uk-slider>

    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">
                <?php
                $desenhos = DBRead( 'desenhos', "WHERE id ORDER BY id DESC LIMIT 5" );
                if (!$desenhos)
                echo '';    
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
                <?php if(empty($desenho['photo'])){ echo '';}else{?>
                     <li uk-tooltip="Feito por <?php echo $eudesenhei['nome']; ?> <?php echo $eudesenhei['sobrenome']; ?> <br> <?php echo $desenho['sobre']; ?>  ">
                    <img src="/img/desenhos/<?php echo $desenho['photo'];?>">
                    <div id="bottom-news">
                         <span uk-tooltip="Ver mais" uk-icon="more" style="color: #555; float: right"></span> 
                    </div>
                 </li>
                <?Php }?>
             <?php endforeach; endforeach;?>
    </ul>

    <a class="what uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="what uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

</div>
            </div>
        <?php endforeach;?>
        <?php
                $eu = $user['id'];
                $peoples = DBRead( 'user', "WHERE id <> $eu ORDER BY id DESC LIMIT 1" );
                if (!$peoples)
                echo '';    
                else  
                    foreach ($peoples as $people):   
                ?>
             <div class="news uk-animation-slide-top-medium" id="nt">
                <p>Sugestão de usuarios</p>
                <div class="uk-position-relative uk-visible-toggle uk-light" style="height: 50px;" uk-slider>

         <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">
            <?php
                $eu = $user['id'];
                $peoples = DBRead( 'user', "WHERE id <> $eu ORDER BY id DESC LIMIT 7" );
                if (!$peoples)
                echo '';    
                else  
                    foreach ($peoples as $people):   
                ?>
                  <a class="nani" href="/profile.php?id=<?php echo $people['id'];?>" title="<?php echo $people['nome'];?>" uk-tooltip="<?php echo $people['nome'];?> <?php echo $people['sobrenome'];?>">
                <li class="user-s">
                    <img src="/img/avatar/<?php echo $people['photo'];?>">
                </li>
                </a>
            <?php endforeach;?>
        </ul>

    <a class="what uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="what uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

</div>


            </div> 
        <?php endforeach; ?>
                            <!-- 
                <?php
                $desenhos = DBRead( 'desenhos', "WHERE id and destaque = 1 ORDER BY id DESC LIMIT 1" );
                if (!$desenhos)
                echo '';    
                else  
                    foreach ($desenhos as $desenho):   
                ?>
                <!-- 
<div class="news slider">
<p>Desenhos da equipe</p>
<div class="uk-position-relative uk-visible-toggle uk-light" style="height: 90px;" uk-slider>
<div class="uk-child-width-1-3@m" uk-grid uk-lightbox="animation: slide">
    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">
                <?php
                $desenhos = DBRead( 'desenhos', "WHERE id and destaque = 1 ORDER BY id DESC LIMIT 7" );
                if (!$desenhos)
                echo '';    
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
    <div id="photoho">
        <a class="uk-inline" href="/img/desenhos/<?php echo $desenho['photo'];?>" data-caption="Feito por <?php echo $eudesenhei['nome'];?> <?php echo $eudesenhei['sobrenome'];?>">
            <img src="/img/desenhos/<?php echo $desenho['photo'];?>" alt="">
        </a>
    </div>

            <?php endforeach; endforeach?>
        </ul>

   
</div>

 <a class="what uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
 <a class="what uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>


</div>



        </div>


    <?php endforeach; ?>
             -->


 <?php
                $desenhos = DBRead( 'desenhos', "WHERE id ORDER BY id DESC LIMIT 7" );
                if (!$desenhos)
                echo '';    
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
        <a class="uk-inline" href="img/desenhos/<?php echo $desenho['photo'];?>" data-caption="<?php echo $eudesenhei['nome'];?> <?php echo $eudesenhei['sobrenome'];?> :  <?php echo $desenho['sobre'];?>" style="width: 100%; max-height: 800px;">
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





</div>


</div>
</div>