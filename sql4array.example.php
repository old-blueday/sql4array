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

//header("Content-type: text");

require "./sql4array.class.php";

$array = array();

for ($i = 0; $i < 20; $i++)
{
	$array[$i][id] = rand(0, 20);
	$array[$i][foo] = md5(rand(0, 10000));
}


$sql = new sql4array();

$sql->createFromGlobals();

$r = array();

foreach(array(
	"SELECT id, foo FROM array",
	"SELECT id, foo FROM array WHERE id > 10",

	"SELECT id, foo FROM array WHERE id > 10",

	"SELECT id, foo FROM array as arr WHERE id > 10",
	"SELECT id AS i, foo AS f FROM array WHERE i > 10",
	"SELECT id AS i, foo AS f FROM array WHERE i > 10 AND f LIKE '%a%'",
	"SELECT id AS iiiiii, foo AS fooooooooo FROM array WHERE array.iiiiii != 10",
) as $sqlstring)
{

	$a = $sql->query($sqlstring);

	$r[] = array(
		'sql' => $sqlstring,
		'result' => $a,
	);

}

var_dump($sql);

foreach($r as $value)
{
	echo $value['sql']."\n";
	var_dump($value['result']);
}

?>