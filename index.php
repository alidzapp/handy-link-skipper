<?php

if(isset($_REQUEST['submitForm'])){
	$v = preg_match('@^(?:http://)?([^/]+)@i',$_REQUEST['shortUrl'], $matches);
	$host = $matches[1];
	// echo "Host: " . $host ."\n";
		
	// echo $host . "\n";
	if ($host == "www.any.gs") {
		$google = substr($_REQUEST['shortUrl'], strpos($_REQUEST['shortUrl'],"url/")+4);
		// echo $google . "\n";
		header("Location: " . $google);
	}

	else {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $_REQUEST['shortUrl']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);	
		$needle1="<title>Redirecting to ";  	
		$needle2="</title>";  	
		$pos1 = strpos($result, $needle1);
		$pos1 = $pos1+22;
		$pos2 = strpos($result, $needle2);
		$blee = substr($result, $pos1,$pos2-$pos1);
		header("Location: " . $blee);
	}	
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Handy Link Skipper</title>
  <meta name="description" content="Skips sh.st links">
  <meta name="author" content="starbuckstech.com">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– 
  <link rel="icon" type="image/png" href="images/favicon.png">-->

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
    <div class="row">
      <div class="col-md-4" style="margin-top: 25%">
      <h4>Handy Link Skipper</h4>
      <form method="post" action="index.php">
      	<input class="u-full-width" name="shortUrl" value="">
      	<input type="hidden" name="submitForm" value="true">
      	<button class="primary" type="submit">GO</button>
      </form>
      <br>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Small modal</button>

        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <p>Instructions: Paste a sh.st link (like this one: http://sh.st/bKeWP) into the box and hit go. (You can also paste any.gs links.)</p>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  
 <!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

</body>
</html>
