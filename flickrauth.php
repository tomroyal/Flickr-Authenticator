<?

// put your secret and api key here:
$fsecret = '';
$fapikey = '';

// don't forget to set the callback (via 'Authentication Flow') to this URL.
	
$frob = $_GET['frob']; // from callback

echo('<h2>Simple Flickr Authenticator</h2>');

if ($frob == ""){
	$fperms = 'read';
	$fapisig = md5($fsecret.'api_key'.$fapikey.'perms'.$fperms.'');
	$url = 'http://flickr.com/services/auth/?api_key='.$fapikey.'&perms='.$fperms.'&api_sig='.$fapisig.'';
	echo('<p>Set your callback URL to this page.</p>');
	echo('<p>Then click <a href="'.$url.'">here</a> to get a frob.</p>');
}
else {
	// got $frob
	$fmethod = 'flickr.auth.getToken';
	$fapisig = md5($fsecret.'api_key'.$fapikey.'frob'.$frob.'method'.$fmethod);
	$url = 'https://api.flickr.com/services/rest/?method=flickr.auth.getToken&api_key='.$fapikey.'&frob='.$frob.'&api_sig='.$fapisig;
	echo('<p>Received a frob value: '.$frob.'</p>');
	echo('<a href="'.$url.'">Click Here to get token.</a>');
	
};

?>