<?php
if($user['exp'] == "10"){
	     $lvladd = array('nivel' => $user['nivel'] + 1);
        if( DBUpdate( 'user', $lvladd, "id = '{$iduser}'" ) ){
        echo '';
       	$expmenos = array('exp' => $user['exp'] -= 10);
       	if( DBUpdate( 'user', $expmenos, "id = '{$iduser}'" ) );
        }
}
?>