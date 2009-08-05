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
  <h2>API Documentation</h2>
  <p>Open URL Shortener provides a fairly basic API (Application Programming Interface) which can be used in order for other applications to harness our URL shortening service. This works by accessing a particular URL on the Open URL Shortener site which accepts the long URL you would like shortened as a parameter. The shortened URL (or various error conditions as appropriate) will then be returned in the HTTP response.</p>
  <h3>Submitting a URL to be shortened</h3>
  <p>Simply have your application access a URL similar to the following, via an HTTP GET request: <b><?=S_MURL?>?longurl=http://www.example.com</b></p>
  <h3>Receiving the shortened URL</h3>
  <p>After submitting the URL you would like shortened as specified above, an HTTP response (web page) will be returned. The response header will be "HTTP/1.1 200 OK" if the URL was shortened as expected, or "HTTP/1.1 500 Internal Server Error" if there was any problem that prevented this.</p>
  <p>Assuming the request was successful, the body of the response will contain only the new shortened URL, in plain text. If the request was unsuccessful, the body of the response will contain a specific error message giving the reason. These always begin with "Error: " followed by a message describing why the error occured. These should be fairly self explanatory and include things like the URL being on our blacklist or being too long (over 2000 characters).</p>
  <h3>Encoding</h3>
  <p>Many special characters in the URL you send (the longurl parameter) may not be stored in our database correctly unless they are URL encoded before you send them. Many languages have a function to do this. This specifically includes the hash sign (replace with %23), the semicolon sign (%3B) and the plus sign (%2B). The easiest way to accomplish this if it's available to you is to run URLs through the Javascript function <a href="http://www.w3schools.com/jsref/jsref_encodeURIComponent.asp" target="_blank">encodeURIComponent()</a> before submitting. This should avoid any of these issues since this is the same method the Open URL Shortener bookmarklet uses, so should be 100% compatible.</p>
  <h3>Terms</h3>
  <p>Application authors should note that users of the Open URL Shortener API are expected to comply with the same <a href="terms.php">terms of use</a> as users of the website. E.g. regardless of how they are created, links to spam/illegal sites etc. will likely be deleted and offenders may be banned from the Open URL Shortener service. Having said that, we don't expect or require the authors of applications that use Open URL Shortener to be responsible for the actions of their users. Violations will be considered on a case by case basis.</p>
  <p>Conditions on excessive usage still apply - the API is primarily intended for use in low volume applications and applications such as browser plugins, scripts etc. that run on the machine of an end user. As such if you're submitting extreme amounts of requests for any reason and hammering the server (e.g. if you have a bad script that submits the same URLs over and over again throughout the day) we may block your IP at our firewall without notice. The same applies if you're opening multiple concurrent connections. Please email via the contact section if you  have any queries.</p>
</div>
<hr />
<div id="ft">
  <p>&copy; <?=date("Y")?> <a href="http://www.rodrigopolo.com/about/open-url-shortener">Open URL Shortener</a><br />
    <a href="terms.php">Terms, Conditions and Privacy Policy</a></p>
</div>
</body>
</html>