 <?php
if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession'])) and (isset($_COOKIE['thecry']))){
require 'database.php';
require 'config.php';
?>
<?php
$conexao = mysql_pconnect($hostp,$userp,$passwrdp) or die (mysql_error());
$banco = mysql_select_db($dbp);
$iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
$user = DBRead('user', "WHERE id = '{$iduser}' LIMIT 1 ");
$user = $user[0];
$banana = $_GET['idpost'];
$content=mysql_real_escape_string($_POST['content']);
$form2['date'] = date('Y-m-d H:i:s');
$form2['iduser'] = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
$form2['idpost'] = $_GET['idpost']; 
$form2['texto'] = mysql_real_escape_string($_POST['content']);
$coinsadd = array('coins' => $user['coins'] + 10);
DBUpDate( 'user', $coinsadd, "id = '{$user['id']}'" );
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

	if( DBCreate( 'comment', $form2 ) ){
		$xpadd = array('exp' => $exp['xppor'] + 1);
		if( DBUpdate( 'user', $xpadd, "id = '{$iduser}'" ) ){
        echo '';
        }
		?>

<?php
$postid = $_GET['idpost'];
$coments = DBRead( 'desenhos', "WHERE id = $postid ORDER BY id DESC" );
if (!$coments)
echo '';
else  
  foreach ($coments as $coment):   
?>

<?php endforeach;?>
<li>
   
    <p><a href="/profile.php?id=<?php echo $user['id'];?>">  <img src="img/avatar/<?php echo $user['photo'];?>" style="width: 30px; height: 30px; border-radius: 50%;" alt=""/> <?php echo $user['nome'];?> <?php echo $user['sobrenome'];?> </a> - <?php echo $content; ?> </p> 
</li>

 <script>
var blankmsg = document.getElementById('feelsba');
blankmsg.style = "display: none";
    </script>

    <?php } else{ ?>


    <?php } ?>

    <?php } ?>