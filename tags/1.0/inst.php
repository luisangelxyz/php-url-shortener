<?
// Include the functions needed to work
include('functions.php');

// Include the config
include('config.php');

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
  <h2>Basic instructions</h2>
  <h3>Using the URL Shortener</h3>
  <p>Simply type (or copy- paste from your browser's address bar) the URL which you'd like to make smaller into the text box on the <a href="<?=S_MURL?>">main page</a>. Push the "Compress  Address" button, and Open URL Shortener will make the address smaller for you, and give you a new link. You can then copy this new URL wherever you'd like to use it.</p>
  <h3>To use an address shortened by Open URL Shortener</h3>
  <p>There is no need to visit Open URL Shortener to use a shortened address. Simply type or paste the shortened URL into your browser's address bar and press enter, you will be automatically forwarded to the original address. If somebody has given you an Open URL Shortener URL in the form of a hyperlink, just click on the link instead.</p>
  <hr />
  <h2>Additional functionality</h2>
  <h3>How to preview an Open URL Shortener shortened address</h3>
  <p>It's very easy to find out where any Open URL Shortener shortened address will take you without having to visit it. This is useful to check that the link will redirect to a destination you trust. Simply add a hyphen (dash) to the end of the shortened URL, and instead of being redirected to the original long address automatically, you'll be taken to a preview page telling you where the link goes.</p>
  <p>For example: You have been given the shortened link <?=S_MURL?>b and want to check where it goes. Copy-paste it into your browser's address bar and then add a hyphen, making the link <?=S_MURL?>b-. Now simply visit that address, and instead of being taken directly to the original URL, you'll be taken to a preview page on the Open URL Shortener site which will tell you the link's destination.</p>
  <h3>Bookmarklet</h3>
  <p>If you need to use Open URL Shortener frequently, you can bookmark this special link: <a href="javascript:void(location.href='<?=S_MURL?>?bkmrklt='+encodeURIComponent(location.href))">Shorten with Open URL Shortener</a>. Visiting the bookmark will then create a shortened URL for the site you are currently visiting, without you having to visit Open URL Shortener. <i>This functionality requires Javascript to be turned on in your browser (usually on by default), and you can safely ignore any security warnings that pop up when adding the bookmark, these are because the link contains Javascript code.</i></p></div>
<hr />
<div id="ft">
  <p>&copy; <?=date("Y")?> <a href="http://www.rodrigopolo.com/about/open-url-shortener">Open URL Shortener</a><br />
    <a href="terms.php">Terms, Conditions and Privacy Policy</a></p>
</div>
</body>
</html>
