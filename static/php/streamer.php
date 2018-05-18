<script type="text/javascript">

var vidyoConnector;
  function onVidyoClientLoaded(status){
  	console.log("VidyoClient load state -" + status.state);
  	if(status.state === "READY"){
  		 VC.CreateVidyoConnector({
		    viewId: "renderer",
		    viewStyle: "VIDYO_CONNECTORVIEWSTYLE_Default",
		    remoteParticipants:16,
		    logFileFilter:"error",
		    logFileName:"",
		    userData:""
    }).then(function (vc){
    	console.log("Criado com sucesso");
    	vidyoConnector = vc;
    }).catch(function(error){
    	
    });
  	}
  }


function joinCall(){
	vidyoConnector.Connect({
		host:"prod.vidyo.io",
		token:"cHJvdmlzaW9uAFNhY2hpbkA3ZjNkM2YudmlkeW8uaW8ANjM2OTM4NzQzNTgAADY2YjNiM2U2OTgwZjhiNTJlNTVhNjFlMTg2ZDkwOWI1OTI0NmYxMDllYmE0NWM4ZTI5ZDM2NWU1MWY0MDZmMTkyYzIxZDY3ZDMzNmJjYWZjNjhhMjFmMjc1NWVhMDViNA==",
		displayName:"<?php echo $user['nome'];?>",
		resourceId:"demoRoom",
		onSuccess: function(){
			console.log("Conectado!! Yeah");
		},
		onFailure: function(reason){
			console.error("Conexão falhou");
		},
		onDisconnected: function(reason){
			console.log("Saiu - " + reason);
		}
	})
}

</script>

    <script src="https://static.vidyo.io/latest/javascript/VidyoClient/VidyoClient.js?onload=onVidyoClientLoaded"></script>

<div style="position: fixed; top: 120px;">
	<button onclick="joinCall()">Entrar na stream</button>
</div>


<div class="uk-flex uk-flex-center">
    <div class="feed uk-animation-slide-top-medium">
    <div id="renderer"></div>
</div>
</div>

<html>
<head>
    <title>Pixel - Streamer</title>
    <link rel="stylesheet" href="/static/css/uikit.min.css" />
    <link rel="stylesheet" href="/static/css/style.css" />
    <script src="/static/js/uikit.min.js"></script>
    <script src="/static/js/uikit-icons.min.js"></script>
    <script src="static/js/jquery.js" type="text/javascript"></script>
    <meta charset="utf-8">
</head>
<body>
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
    require 'static/php/streamer.php';
    }
  //       if($user['configurado'] == 0){
  //      require 'static/php/configure.php';
    // }
  }
?>

</body>
</html>

<?php } ?>
