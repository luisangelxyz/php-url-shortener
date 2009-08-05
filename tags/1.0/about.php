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
  <h2>About</h2>
  <p>Building an special software for a client I realize I need a way to transform a <em>numeric ID</em> into <em>short alphanumeric case sensitive ID</em>, after looking into the web I found a <a href="http://kevin.vanzonneveld.net/techblog/article/create_short_ids_with_php_like_youtube_or_tinyurl/" target="_blank">great script</a> that accomplish that purpose, I know YouTube and many other services for URL Shortening  use this technique so then I ask myself <em>&quot;it wouldn't be great if anyone can have a personal URL Shortener in their site?&quot;</em> and in just 4 hours I make a little clone of a very famous URL Shortener service. It's not a perfect clone, but works great.</p>
<p>I have done most of the end-user side (front-end) but I didn't make any admin side (back-end), so if you want to contribute and make a good admin to see statics or add more functionality like an admin panel to add, modify, remove anything and block IPs you are welcome, I just don't have the time right now and I use a SQL GUI for this purpose.</p>
<p>
If you want this software first you need a server that runs:</p>
<ul>
  <li>Apache</li>
  <li>PHP</li>
  <li>MySQL </li>
  <li>mod_rewrite enabled<br />
  </li>
</ul>
<p>Then you can follow these instructions:</p>
<ul>
  <li>
    <a href="http://www.rodrigopolo.com/about/open-url-shortener" target="_blank">Download</a> and unzip the current version of the software.</li>
  <li>Transfer the entire directory to your the directory where you want to install the URL shortener</li>
  <li>Run the install.php in your browser and fill all the information needed.</li>
  <li>That's it! You're done. You can now generate test your own URL shortener.</li>
</ul>
<h2>Contribute</h2>
<p>Help improving this software, right now I’m using Google Code to host this project so you can join anytime. <a href="http://code.google.com/p/php-url-shortener/">http://code.google.com/p/php-url-shortener/</a></p>
<h2>Licence</h2>
<h3>Copyright (C) 2009  Rodrigo J. Polo</h3>
<p>This program is free software: you can redistribute it and /or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or any later version.</p>
<p>This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.</p>
<p>You should have received a copy of the GNU General Public License along with this program.  If not, see <a href="http://www.gnu.org/licenses/">http://www.gnu.org/licenses/</a>.</p>
</div>
<hr />
<div id="ft">
  <p>&copy; <?=date("Y")?> <a href="http://www.rodrigopolo.com/about/open-url-shortener">Open URL Shortener</a><br />
    <a href="terms.php">Terms, Conditions and Privacy Policy</a></p>
</div>
</body>
</html>