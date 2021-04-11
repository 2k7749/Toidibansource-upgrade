<?php require_once('../libraries/class.database.php');
$csdl = new mySQL();
$csdl->connect();

$aa = "select * from website";
$qr = $csdl->query($aa);
$web = $csdl->fetch($qr);

$bb = "select * from themes";
$ba = $csdl->query($bb);
$theme = $csdl->fetch($ba);

$bba = "select * from ads";
$bad = $csdl->query($bba);
$qc = $csdl->fetch($bad);

?>
