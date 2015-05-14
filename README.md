# twilio-sms-vcard-example
Business cards by SMS text

A quick and dirty SMS vCard powered by Twilio.


##Pre-Requisites

Get an account at https://nextcaller.com, you'll need your API username and password to get info about the person texting you.

Get a Twilio account, buy an SMS enabled phone number, and have a way to host the files.

##Quick Install

`git clone https://github.com/plabbett/twilio-sms-vcard-example.git ./sms-vcard`

`cd sms-vcard`

`composer install`

`mv config.example.php config.php`

Now, configure your config.php to your liking, update sms.php with your info, and point your SMS enabled Twilio phone number at http://yourserver.com/sms-vcard


