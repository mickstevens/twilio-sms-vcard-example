<?php

	require 'vendor/autoload.php';
	require 'config.php';

	use NextCaller\NextCallerClient;
	$profiles = array();
	
	try{
		$nc = new NextCallerClient(
			$config['nextcaller']['username'], 
			$config['nextcaller']['password'], 
			false
		);
		
		$profiles = $nc->getProfileByPhone(substr($_REQUEST['From'], -10));
	}
	catch (\NextCaller\Exception\BadResponseException $e) {
		//die(var_dump($e));
	}
	catch (\NextCaller\Exception\FormatException $e) {
		//die(var_dump($e));
	}
	catch(Exception $e){
	    //die(var_dump($e));
	}

	echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<Response>
    <?php 
		if(strtolower($_REQUEST['Body']) == 'pic'){
			?><Message><Media>http://www.gravatar.com/avatar/<?php echo hash('md5', $config['gravatar_email']); ?>?s=480</Media></Message><?php
		}
		elseif(strtolower($_REQUEST['Body']) == 'vcard'){
			?><Message><Media><?php echo $config['vcard_url']; ?></Media></Message><?php
		}
		elseif(strtolower($_REQUEST['Body']) == 'hi'){
				
			mail(
				$config['email'], 
				'Inbound vCard Request', 
				print_r($profiles, true) .   print_r($_REQUEST, true)
			);
	
			?><Message><Body>
			Hi, I'm Patrick Labbett! Text "vcard" for my contact info or "pic" to jog your memory. Visit my website at https://labbett.net
			</Body></Message>
			<?php
		}
		else{
			//don't respond...
		}
		?>
</Response>