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
  <h2>What is Open URL Shortener?</h2>
  <p>Open URL Shortener is a service that shortens URLs such as web addresses. This is useful in many circumstances (see below) e.g. in twitter or in email clients that break long URLs.</p>
  <p>For example, you can turn
  <blockquote>http://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;<br />
geocode=&amp;q=+14%C2%B035%2740.84%22N++90%C2%B031%273.78%22W&amp;ie=UTF8&amp;z=17</blockquote>
  into:
  <blockquote><?=S_MURL?>b</blockquote>
  </p>
  <h2>Uses for Open URL Shortener</h2>
  <p>Here are just a few of the many uses for Open URL Shortener's URL shortening service:</p>
  <ul>
    <li>Shorten web addresses for emails, forum posts, blogs etc. which cannot handle long URLs and might wrap them, making them unclickable</li>
    <li>Lower the character count when texting web addresses to a mobile phone</li>
    <li>Hide the real URLs of affiliate links from visitors to your site</li>
    <li>Clean up bookmarks for social bookmarking sites or sites with low character limits like Twitter</li>
  </ul>
  <p>Certain uses of Open URL Shortener are <b>forbidden</b>, for example use in unsolicited commercial email (SPAM). Be sure to check our <a href="terms.php">terms of use</a></p>
</div>
<hr />
<div id="ft">
  <p>&copy; <?=date("Y")?> <a href="http://www.rodrigopolo.com/about/open-url-shortener">Open URL Shortener</a><br />
    <a href="terms.php">Terms, Conditions and Privacy Policy</a></p>
</div>
</body>
</html>
