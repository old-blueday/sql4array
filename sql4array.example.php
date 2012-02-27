<?PHP

/**
 * Project:		Absynthe sql4array
 * File:		sql4array.example.php5
 * Author:		Absynthe <sylvain@abstraction.fr>
 * Webste:		http://absynthe.is.free.fr/sql4array/
 * Version:		alpha 1
 * Date:		30/04/2007
 * License:		LGPL
 */

header("Content-type: text");

require "./sql4array.class.php";


for ($i = 0; $i < 20; $i++)
{
	$array[$i][id] = rand(0, 20);
	$array[$i][foo] = md5(rand(0, 10000));
}


$sql = new sql4array();

$sql->createFromGlobals();

$a = $sql->query("SELECT id, foo FROM array");
$b = $sql->query("SELECT id, foo FROM array WHERE id > 10");
$c = $sql->query("SELECT id AS i, foo AS f FROM array WHERE i > 10");
$d = $sql->query("SELECT id AS i, foo AS f FROM array WHERE i > 10 AND f LIKE '%a%'");
$e = $sql->query("SELECT id AS iiiiii, foo AS fooooooooo FROM array WHERE iiiiii != 10");

var_dump($a);
var_dump($b);
var_dump($c);
var_dump($d);
var_dump($e);

?>