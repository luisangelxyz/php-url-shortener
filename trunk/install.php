<?
function write_file($txt,$file){
	$fp = fopen($file, "w+");
	fwrite($fp, $txt);
	fclose($fp);
}


$rb = trim($_POST['s_path']);
$host = trim($_POST['m_host']);
$usr = trim($_POST['m_user']);
$pass = trim($_POST['m_pass']);
$db = trim($_POST['m_db']);
$tprfx = trim($_POST['m_pfx']);


// Check form submision
if(!empty($rb) && !empty($host) && !empty($usr) && !empty($pass) && !empty($db) && !empty($tprfx)){
	// check MySQL connection
	$conn = @mysql_connect($host, $usr, $pass);
	if($conn){
		// check DB selection
		$dbcon = @mysql_select_db($db);
		if($dbcon){
			$perm = intval(substr(decoct( fileperms(dirname(__file__)) ), 2));
			if($perm>=755){
				
				// Create config file
				$config = "<?php
//  RewriteBase
define('S_REWRITEBASE','".$rb."');

// MySQL
define('S_DB_HOST','".$host."');
define('S_DB_USER','".$usr."');
define('S_DB_PASS','".$pass."');
define('S_DB_SLDB','".$db."');

// Self Host
define('S_SELFHOST',selfHost());

// Site URL
define('S_MURL', S_SELFHOST.S_REWRITEBASE);

// Tables
define('S_TB_URLS','".$tprfx."urls');
define('S_TB_REFERERS','".$tprfx."referer');
define('S_TB_BLACKLIST','".$tprfx."blacklist');

// Options
define('S_OPT_STATS',true);
?>";
				// Create htaccess file
				$hta = "# BEGIN Open URL Shortener
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase ".$rb."
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . ".$rb."index.php [L]
</IfModule>
# To prevent caching
<IfModule mod_expires.c>
ExpiresActive On
ExpiresDefault now
</IfModule>
# END Open URL Shortener";
				
				// write files
				write_file($hta,'.htaccess');
				write_file($config,'config.php');
				
				// create tables and insert first records
				mysql_query("CREATE TABLE IF NOT EXISTS ".$tprfx."urls (id int(12) NOT NULL AUTO_INCREMENT, url text NOT NULL, vi int(8) NOT NULL DEFAULT '0', pr int(8) NOT NULL DEFAULT '0', bl tinyint(1) NOT NULL DEFAULT '0', PRIMARY KEY (id)) AUTO_INCREMENT=1;");

				mysql_query("INSERT INTO ".$tprfx."urls (id, url, vi, pr, bl) VALUES (1, 'http://www.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=+14%C2%B035%2740.84%22N++90%C2%B031%273.78%22W&ie=UTF8&z=17', 0, 0, 0);");

				mysql_query("INSERT INTO ".$tprfx."urls (id, url, vi, pr, bl) VALUES (2, 'http://www.rodrigopolo.com/about/open-url-shortener', 0, 0, 0);");

				mysql_query("CREATE TABLE IF NOT EXISTS ".$tprfx."referer (id int(12) NOT NULL AUTO_INCREMENT, urlid int(12) NOT NULL, ref text NOT NULL, PRIMARY KEY (id)) AUTO_INCREMENT=1;");

				mysql_query("CREATE TABLE IF NOT EXISTS ".$tprfx."blacklist (id int(11) NOT NULL AUTO_INCREMENT,dom varchar(255) NOT NULL,PRIMARY KEY (id)) AUTO_INCREMENT=1;");

				mysql_query("INSERT INTO ".$tprfx."blacklist (id, dom) VALUES (1, 'bit.ly'), (2, 'is.gd'), (3, 'tr.im'), (4, 'tinyurl.com'), (5, 'twurl.nl');");
				
				// Include new settings
				include('functions.php');
				include('config.php');
				
				// rename the install to prevent any change
				$thisf = __file__;
				$thtxt = dirname(__file__).'/.intall.php.txt';
				rename($thisf, $thtxt);
				
				// let's go to the new installed page
				header('Location: '.S_MURL);
				die();


			}else{
				$error="Permission error, change the folder to 755.";
			}
		}else{
			$error="Can connect to MySQL Server but can't open the database.";
		}
		
	}else{
		$error="Cannot connect to MySQL Server.";
	}
}else{
	// If any form field is set, give the error
	if(isset($_POST['s_path']) || isset($_POST['m_host']) || isset($_POST['m_user']) || isset($_POST['m_pass']) || isset($_POST['m_db']) || isset($_POST['m_pfx'])){
		$error="Please fill all form fields.";
	}
}

// guive the auto path
$self = $_SERVER['PHP_SELF'];
$auto_path =  substr($self, 0, strrpos($self, "/")).'/';


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Open URL Shortener</title>
<style>
#mn {
	width: 350px;
}
.col1, .col2 {
	float: left;
	display: inline;
}
.col1 {
	white-space: nowrap;
	width: 150px;
}
.col2 {
	width: 150px;
}
.col2 textarea, .col2 input {
	width: 100%;
}
.info {
	border-bottom: 1px dotted #666;
	cursor: help;
}
</style>
<link rel="stylesheet" type="text/css" href="st.css" media="screen" />
<meta name="keywords" content="shorten,URL,link,smaller,web,address" />
<meta name="description" content="URL Shortener" />
</head>
<body>
<div id="mtp"><img src="logo_small.jpg" alt="logo" /></div>
<div id="mn">
  <h2>Install:</h2>
	<?
    if(!empty($error)){
        echo '<div id="error">'.$error.'</div>';
    }
    ?>
  <form action="install.php" method="post">
    <div class="col1">
      <label class="info" title="To make the right redirection." for="s_path">Server path:</label>
    </div>
    <div class="col2">
      <input type="text" size="18" value="<?=(empty($rb))?$auto_path:$rb;?>" name="s_path" id="s_path"/>
    </div>
    <div class="col1">
      <label class="info" title="Your 'MySQL' host, can be localhost or mysql.yoursite.com, depending on your hosting service" for="m_host">MySQL Host:</label>
    </div>
    <div class="col2">
      <input type="text" size="18" name="m_host" id="m_host" value="<?=$host?>"/>
    </div>
    <div class="col1">
      <label class="info" title="MySQL User" for="m_user">MySQL User:</label>
    </div>
    <div class="col2">
      <input type="text" size="18" name="m_user" id="m_user" value="<?=$usr?>"/>
    </div>
    <div class="col1">
      <label class="info" title="Your password, can't be blank." for="m_pass">MySQL Pass:</label>
    </div>
    <div class="col2">
      <input type="password" size="18" name="m_pass" id="m_pass"/>
    </div>
    <div class="col1">
      <label class="info" title="The database where the software will be installed." for="m_db">MySQL DB:</label>
    </div>
    <div class="col2">
      <input type="text" size="18" name="m_db" id="m_db" value="<?=$db?>"/>
    </div>
    <div class="col1">
      <label class="info" title="The prefix you want to add to the tables that this software will use." for="m_pfx">MySQL Table Prefix:</label>
    </div>
    <div class="col2">
      <input type="text" size="18" name="m_pfx" id="m_pfx" value="<?=(empty($tprfx))?'sh_':$tprfx;?>"/>
    </div>
    <input type="submit" name="Submit" value="Install" />
  </form>
</div>
<hr />
<div id="ft">
  <p>&copy;
    <?=date("Y")?>
    <a href="http://www.rodrigopolo.com/about/open-url-shortener">Open URL Shortener</a></p>
</div>
</body>
</html>
