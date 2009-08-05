<?
defined( 'S_REWRITEBASE' ) or die( 'Direct Access to this location is not allowed.' );
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Open URL Shortener</title>
<link rel="stylesheet" type="text/css" href="<?=S_MURL?>st.css" media="screen" />
<meta name="keywords" content="shorten,URL,link,smaller,web,address" />
<meta name="description" content="URL Shortener" />
</head>
<body>
<div id="fpc"></div>
<div id="fp"><img src="<?=S_MURL?>logo.jpg" alt="Logo" />
  <div id="mt">
      <a href="<?=S_MURL?>des.php">Description and Uses</a>
      <a href="<?=S_MURL?>inst.php">Instructions</a>
      <a href="<?=S_MURL?>about.php">About</a>
      <a href="<?=S_MURL?>api.php">API</a>
  </div>
<?
if(!empty($error)){
	echo '<div id="error">'.$error.'</div>';
}
?>
  <form action="<?=S_MURL?>" method="post" onsubmit="return chkfrm(this);">
    <input class="textbox" type="text" maxlength="2000" size="50" id="url" name="url" value="" />
    <center>
      <input class="button" type="submit" name="Submit" value="Compress Address" />
    </center>
  </form>
  <div id="tr">If you bookmark this <a href="javascript:void(location.href='<?=S_MURL?>?bkmrklt='+encodeURIComponent(location.href))">bookmarklet</a> or drag it to your browser's toolbar, you can use it to shorten the URL of the site you're visiting when you press it.</div>
</div>
<script language="JavaScript" type="text/javascript">
<!-- //
function chkfrm(f){
	if (f.url.value == ""){
		alert ("Please type or paste a URL to shorten into the input box.");
		f.url.focus();
		return false;
	}
	var found = false;
	for (var i=0;i<f.url.value.length;i++){
		var chr = f.url.value.charAt(i);
		if(chr=='.'){
			found = true;
			break;
		}
	}
	if (found == false){
		alert ("Please type or paste a valid URL into the input box.");
                f.url.focus();
                return false;
	}
	return true;
}
function focusbox() {
	el = document.getElementById('url');
	el.focus();
}

window.onload = focusbox;
// -->
</script>
</body>
</html>
