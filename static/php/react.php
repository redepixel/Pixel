<?php
 require 'database.php';
 require 'config.php';

if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession'])) and (isset($_COOKIE['thecry']))){

$conexao = mysql_pconnect($hostp,$userp,$passwrdp) or die (mysql_error());
$banco = mysql_select_db($dbp);
$thecryed = DBEscape(strip_tags(trim(sha1($_POST['emailr']))));

$iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );

$form2['iduser'] = $iduser;
$form2['idpost'] = $_POST['post'];
$post = $_POST['post'];

$totalcurtida = mysql_query("SELECT * FROM pixel_like WHERE idpost = $post ");
$totalcurtida = mysql_num_rows($totalcurtida);
$totalcurtida2 = $totalcurtida + 1;
$totalcurtida3 = $totalcurtida - 1;

$dbCheck = DBRead( 'like', "WHERE id and idpost = $post and iduser = $iduser" );

if( $dbCheck ){
	DBDelete( 'like', "id and idpost = '{$post}' and iduser = '{$iduser}'  " );
	?>
<script>
var kawaii<?php echo $post; ?> = document.getElementById('kawaii<?php echo $post; ?>');

$("#totallike<?php echo $post; ?>").text("<?php echo $totalcurtida3; ?> Curtiu isso");

nani<?php echo $post; ?>.style = "color: #555;";
</script>
	<?php } else{

if( DBCreate( 'like', $form2 ) ){	
	echo '';
?>

<script>
var kawaii<?php echo $post; ?> = document.getElementById('kawaii<?php echo $post; ?>');

$("#totallike<?php echo $post; ?>").text("Tu e outras <?php echo $totalcurtida; ?> curtiram isso");
nani<?php echo $post; ?>.style = "color: #1e87f0;";
</script>
<?php } ?>

<?php } ?>

<?php } ?>