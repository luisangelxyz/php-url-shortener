<?
defined( 'S_REWRITEBASE' ) or die( 'Direct Access to this location is not allowed.' );
$ha_z = strlen($new_hash);
$ur_z = strlen($url2s);
$z_dif = $ur_z - $ha_z;
$z_per = intval(($ha_z/$ur_z)*100).'%';

$calcs = ($ha_z<$ur_z)?"<p>We made your URL <strong>$z_per</strong> ($z_dif characters) shorter!</p>":"Unfortunately your URL was so short that we could not make it any shorter";

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Open URL Shortener</title>
<link rel="stylesheet" type="text/css" href="st.css" media="screen" />
<meta name="keywords" content="shorten,URL,link,smaller,web,address" />
<meta name="description" content="URL Shortener" />
</head>
<body>
<div id="mtp">
<a href="<?=S_MURL?>"><img src="logo_small.jpg" alt="logo" /></a>
  <div id="mt">
      <a href="<?=S_MURL?>">Home</a>
      <a href="des.php">Description and Uses</a>
      <a href="inst.php">Instructions</a>
      <a href="about.php">About</a>
      <a href="api.php">API</a>
  </div>
</div>
<div id="mn">
  <p><b>Your new shortened URL is:</b></p>
  <input type="text" class="tb" id="shour" onselect="select_text();" onclick="select_text();" onkeyup="select_text();" value="<?=$new_hash?>" size="40" readonly="readonly"/>
  (use [CTRL]+[C] or right click-copy to copy it to your clipboard)
  <hr />
  <p>Your shortened URL is <a href="<?=$new_hash?>"><?=$new_hash?></a> <span id="sml"><a href="<?=$new_hash?>" target="_blank">(open in new window)</a></span> (<?=$ha_z?> characters).<br />
    The original URL was <a href="<?=$url2s?>"><?=$url2s?></a> <span id="sml"><a href="<?=$url2s?>" target="_blank">(open in new window)</a></span> (<?=$ur_z?> characters).</p>
  <?=$calcs?>
  <hr />
  <p>If you'd prefer to have users see a preview page instead of sending them to your URL directly (so they can be confident where they're going), simply add a hyphen (dash) to the end and use <a href="<?=$new_hash?>-"><?=$new_hash?>-</a> <span id="sml"><a href="<?=$new_hash?>-" target="_blank">(Open in new window)</a></span></p>
  <p><span id="note">Note: We recommend you copy-paste the new URL to the place you'd like to use it. If for some reason you have to write it manually, be aware that all letters after the final <strong>/</strong> are case sensitive.</span></p>
<script language="JavaScript" type="text/javascript">
<!--
function select_text(){
	el = document.getElementById('shour');
	if(el.createTextRange){
		var oRange = el.createTextRange();
		oRange.moveStart("character", 0);
		oRange.moveEnd("character", el.value.length);
		oRange.select();
	}else if(el.setSelectionRange){
		el.setSelectionRange(0, el.value.length);
	}
	el.focus();
}

function PageInit() {
	select_text();
}
window.onload = PageInit;

//-->
</script>
</div>
<hr />
<div id="ft">
  <p>&copy; <?=date("Y")?> <a href="http://www.rodrigopolo.com/about/open-url-shortener">Open URL Shortener</a><br />
    <a href="terms.php">Terms, Conditions and Privacy Policy</a></p>
</div>
</body>
</html>
