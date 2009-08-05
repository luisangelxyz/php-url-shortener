<?

// Include the functions needed to work
include('functions.php');

// Include the config, if it can't, run the installer
if(!@include('config.php')){
	header('Location: install.php');
}

// DB Connect
db_connect();

// extract the URL
$wb = explode(S_REWRITEBASE,get_uri());
$tid = $wb[1];

// If the short URL it's blank show the generator or generate a new one
if(empty($tid)){
	
	$url2s = $_POST['url'];
	
	// Check for the submited form, if blank show the form, if not, short that address
	if(!empty($url2s) && isset($_POST['Submit'])){
		
		// Add the URL and obtain the Hash, if not give an error
		if($hash = add_url($url2s)){
			$new_hash = S_SELFHOST.S_REWRITEBASE.$hash;
			include('done.php');
			// TEMPLATE
		}else{
			$error = "Your URL is malformed or the host-domain is forbidden";
			include('home.php');
		}
		
	}else{
		// The form was blank, show the form
		include('home.php');
	}
}else{
	//check the URL
	if(preg_match("/^[a-zA-Z0-9]+(-?)$/", $tid) === 0){
		if($aob = api_or_bkml($tid)){
			$url = urldecode(substr($tid, 9));
			if($hash = add_url($url)){
				if($aob=='longurl'){
					header('Content-Type: text/plain');
					echo S_SELFHOST.S_REWRITEBASE.$hash;
				}else{				
					$new_hash = S_SELFHOST.S_REWRITEBASE.$hash;
					$url2s = $url;
					include('done.php');
				}
			}else{
				if($aob=='longurl'){
					header('HTTP/1.1 500 Internal Server Error');
					die("Sorry, the URL that you want to use it's either invalid or banned.");
				}else{
					header('HTTP/1.0 404 Not Found');
					$error = "Sorry, the URL that you want to use it's either invalid or banned.<br /><br />Try again in the folowing text box.";
					include('home.php');
				}
			}
			
		}else{
			header('HTTP/1.0 404 Not Found');
			$error = "Sorry, the shortened URL you requested wasn't available. Check you have typed-pasted it correctly (the alphanumeric string at the end is case sensitive).<br />
<br />
If you are certain the URL is correct, it could be removed due to a violation of our terms or illegal use.";
			include('home.php');
		}
	}else{
		// Decode the Short URL
		$prev = false;
		$id = alphaID($tid, true);
		if(substr($tid, -1)=='-'){
			$prev = true;
			$tid = substr($tid, 0, -1);
			
			// add info to the stats
			if(S_OPT_STATS){
				// Hits
				$sql = 'UPDATE '.S_TB_URLS.' SET pr=pr+1 WHERE id = '.mysql_real_escape_string($id).' LIMIT 1';
				mysql_query($sql);
				
			}

			// Get row info
			$sql = 'SELECT * FROM '.S_TB_URLS.' WHERE id = '.mysql_real_escape_string($id);
			if($row = db_squery($sql)){
				if($row['bl'] || check_banned_domain(check_domain($row['url']))){
					error_404("Sorry, the URL you entered is on our blacklist. This usually means you tried to link to itself or another URL shortening site. Links to these sites are disabled to stop spammers hiding abusive links behind a chain of shortened URLs.");
				}else{
					// Get the values
					$prev_url = $row['url'];
					$prev_vis = $row['vi'];
					$prev_pre = $row['pr'];
					// include the preview page
					include('preview.php');
					// kill php script
					die();
				}
			}else{
				error_404("Unfortunately the page you visited could not be found. This is usually a result of mistyping the address you were trying to visit.");
			}
		}
		// check if it's a number result
		if(preg_match("/^[0-9]+$/", $id) !== 0){
			
			// Query the URL
			$sql = 'SELECT * FROM '.S_TB_URLS.' WHERE id = '.mysql_real_escape_string($id);
			if($row = db_squery($sql)){
				
				// Check if the URL or domain are on blacklist
				if($row['bl'] || check_banned_domain(check_domain($row['url']))){
					error_404("Sorry, the URL you entered is on our blacklist. This usually means you tried to link to itself or another URL shortening site. Links to these sites are disabled to stop spammers hiding abusive links behind a chain of shortened URLs.");
				}
				// add info to the stats
				if(S_OPT_STATS){
					// refferal
					$ref = $_SERVER['HTTP_REFERER'];
					if(!empty($ref)){
						$sql = 'INSERT INTO '.S_TB_REFERERS.' (urlid, ref) VALUES ('.mysql_real_escape_string($id).', "'.mysql_real_escape_string($ref).'")';
						mysql_query($sql);
					}
					// Hits
					$sql = 'UPDATE '.S_TB_URLS.' SET vi=vi+1 WHERE id = '.mysql_real_escape_string($id).' LIMIT 1';
					mysql_query($sql);
					
				}
				mysql_close();
				header("HTTP/1.1 301 Moved Permanently");
				header("Location: ".$row['url']);
				header("Connection: close");
				die();
			}else{
				error_404("Unfortunately the page you visited could not be found. This is usually a result of mistyping the address you were trying to visit.");
			}
		}else{
			error_404("Unfortunately the page you visited could not be found. This is usually a result of mistyping the address you were trying to visit.");
		}
	}
}
?>