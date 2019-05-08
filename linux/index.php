<html>
  <head>
    <title>Hello AWS World – running on Linux</title>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=ISO-8859-1\">
  </head>
  <body>

	<h1 align="center">Hello AWS World – running on Linux -on port <?php print $_SERVER['SERVER_PORT'] ?> </h1>
	<p/>
	
  <table border=1>
	<tr>
		<td>
			  <?php
				  // Print out the current data and tie
				  print "The Current Date and Time is: <br/>";
				  print date("g:i A l, F j Y.");
				?>
				<p/>
		</td>
	</tr>
	
	<tr>
		<td>
			<?php
      // Setup a handle for CURL
      $curl_handle=curl_init();
      curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
      curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
      // Get the hostname of the intance from the instance metadata
      curl_setopt($curl_handle,CURLOPT_URL,'http://169.254.169.254/latest/meta-data/public-hostname');
      $hostname = curl_exec($curl_handle);
      if (empty($hostname))
      {
        print "Sorry, for some reason, we got no hostname back <br />";
      }
      else
      {
        print "Server = " . $hostname . "<br />";
      }
      // Get the instance-id of the intance from the instance metadata
      curl_setopt($curl_handle,CURLOPT_URL,'http://169.254.169.254/latest/meta-data/instance-id');
      $instanceid = curl_exec($curl_handle);
      if (empty($instanceid))
      {
        print "Sorry, for some reason, we got no instance id back <br />";
      }
      else
      {
        print "EC2 instance-id = " . $instanceid . "<br />";
      }
    ?>
		</td>
	</tr>
	
	<tr>
		<td>
			<h2>Screenshot(1) of mounted volume</h2>
			<img src="https://s3-ap-southeast-1.amazonaws.com/assignment1bucket-s3bucket-xjedo1xwewf4/linux/screen-shot1.png" alt="screen-shot1">
			<p/>
		</td>
	</tr>
	
	<tr>
		<td>
			<h2>Screenshot(2) of index.html on mounted volume</h2>
			<img src="https://s3-ap-southeast-1.amazonaws.com/assignment1bucket-s3bucket-xjedo1xwewf4/linux/screen-shot2.png" alt="screen-shot2">
			<p/>
		</td>
	</tr>
	
	<tr>
		<td>
			<h2>Screenshot(3) of Apache Httpd Configuration</h2>
			<img src="https://s3-ap-southeast-1.amazonaws.com/assignment1bucket-s3bucket-xjedo1xwewf4/linux/screen-shot3.png" alt="screen-shot3">
			<p/>
		</td>
	</tr>
	
  </table>
  </body>
</html>