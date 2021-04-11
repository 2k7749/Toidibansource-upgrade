<?php require_once('libraries/class.database.php');
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

$page_404 = "404";
$page_aboutus = "About Us";
$page_myaccount = "My Account";
$page_premiumpack = "Premium Packs";
$page_purchaselog = "Purchase Log";
$page_recharge = "Recharge Account";
$page_settings = "Settings";
$page_noti = "Notification";
$page_cart = "My Cart Items";
$page_success_payment = "Payment W Paypal Successful"
?>
