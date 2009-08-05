<?
defined( 'S_REWRITEBASE' ) or die( 'Direct Access to this location is not allowed.' );
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
  <h2>Link preview</h2>
  <p>The shortened URL you followed points to <a href="<?=$prev_url?>"><?=$prev_url?></a>.</p>
  <p>Please click the link above if you'd like to go there now.</p>
  <h2>Link statistics</h2>
  <p>Number of times this shortened URL has been accessed directly: <b><?=$prev_vis?></b><br />
    Number of times the preview page for this shortened URL has been accessed: <b><?=$prev_pre?></b></p>
  <p><i>Note: The access count statistics above only count accesses from 25th May 2009 onwards (when this feature was implemented).</i></p>
</div>
<hr />
<div id="ft">
  <p>&copy; <?=date("Y")?> <a href="http://www.rodrigopolo.com/about/open-url-shortener">Open URL Shortener</a><br />
    <a href="terms.php">Terms, Conditions and Privacy Policy</a></p>
</div>
</body>
</html>
