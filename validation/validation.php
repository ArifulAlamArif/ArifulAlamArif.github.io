<?php
function validMail($email)
{
	$uname=strstr($email, '@', true); //first -> before @
	//echo $uname."<br>";
	$mail=strstr($email, '@'); //after @ -> last
	//echo $mail."<br>";	
	if(strpos($mail,'@')==0 )
	{
		$domain = strstr($mail, '.'); //.com / .bd
		//echo $domain."<br>";
		$domainName = str_replace($domain, "", $mail);
		//echo $domainName."<br>";
		$domainName = str_replace("@", "", $domainName);
		//echo $domainName."<br>";//yahoo / gmail
		$domain = str_replace(".", "", $domain);
		//echo $domain."<br>"; 	//com /bd
		if(strlen($domain)>1)
		{
			if(strlen($domainName)>1)
			{
				return true;
				// $a = array('.','-', '_');
				// if(ctype_alnum(str_replace($a,'',$uname)))
				// {	return true; }
				// else{ return false;}
			}
			else{return false;}
		}
		else{return false;}
	}
	else{return false;}
}
// if(validMail('nimmi.haq898*ue17@at.om'))
// {echo "yes";}
// else{echo "no";}
function validMob($mob)
{	
	if(strlen($mob)!==14)
	{return false;}
	else if(strpos($mob,'+')===false)
	{return false;}
	else if( is_numeric( str_replace('+','',$mob) ) )
	{	return true; }
	else{	return false;}	
	return false;
}
?>