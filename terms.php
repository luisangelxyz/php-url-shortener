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
  <h2>Open URL Shortener Terms & Conditions Of Use</h2>
  <h3>Forbidden activities</h3>
  <p>Open URL Shortener may <b>NOT</b> be used for the following:</p>
  <ul>
    <li>Creating URLs for use in unsolicited advertising including but not limited to email and forum posts (i.e. do not use for SPAM purposes)</li>
    <li>Linking to any content which is illegal in your area</li>
    <li>Linking to other sites that also offer URL shortening/redirection (because creating a "chain" of redirects is often an attempt to hide malicious use, and also wastes bandwidth) - most of these should be automatically blocked anyway</li>
    <li>Any other use which is illegal in your area</li>
  </ul>
  <p>We reserve the right to remove any shortened URLs which we deem to have violated our terms and conditions, or that we believe violate the spirit of our terms or of fair usage (at our discretion). We may if we choose report use that is forbidden by our terms and conditions to the relevant governmental or law enforcement agencies, including relevant information such as the IP address of the link creator. We also reserve the right to block any abusers from using our service in future. In addition, shortened URLs may be removed retroactively if they later appear on any of the blacklists that Open URL Shortener consults.</p>
  <h3>Excessive usage</h3>
  <p>We ask that you limit usage of our service to "reasonable" levels. There is currently no fixed limit, but please don't open multiple concurrent connections from the same machine, or undertake usage so heavy it causes service issues for other users. We reserve the right to remove shortened URLs from our service and/or block the abuser from our service temporarily or permanently when usage exceeds levels we consider reasonable.</p>
  <h3>Warranty and liability</h3>
  <p>Open URL Shortener is provided as a free service, and as such carries no warranty of any kind. Open URL Shortener is not liable for any loss or problem you might suffer due to using the service. This includes losses in the event that the service stops operating, is unavailable or slow, suffers data loss, or any other issue which might be considered detrimental to you.</p>
  <h2>Open URL Shortener Privacy Policy</h2>
  <p>We do not collect any personally identifying information from users of this website. We store only the technical information necessary to provide our URL shortening service, such as the original long URLs. We may also store the IP addresses of computers using the Open URL Shortener service (and similar usage information such as web browser/resolution) for the sole purposes of identifying abuse of the service and tracking anonymous usage trends. This information will not be made available to third parties.</p>
  <p>We check submitted URLs and user IP addresses against blacklists to help prevent spam. These blacklists may be operated by third parties.</p>
  <p>URLs shortened by our website are not private and should not be treated as such. Third parties could easily guess the short URL that you are using, so you should not use Open URL Shortener to link to sensitive or secure data.</p>
  <p>Anonymous statistics on shortened URLs you create (such as number of visits to them, creation date etc.) are not treated as private and will be made available to anyone through the site.</p>
  <p>Third party advertising may be included on the site. Such advertisers may use technologies such as cookies or web beacons which may allow them to access information such as your IP address, ISP, browser etc. to be used in the course of displaying advertising or selecting advertising to display.</p>
</div>
<hr />
<div id="ft">
  <p>&copy; <?=date("Y")?> <a href="http://www.rodrigopolo.com/about/open-url-shortener">Open URL Shortener</a><br />
    <a href="terms.php">Terms, Conditions and Privacy Policy</a></p>
</div>
</body>
</html>