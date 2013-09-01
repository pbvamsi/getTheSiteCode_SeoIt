<?php

##############################################################################################################################
#										=======================
#												ReadMe
#										=======================
#				
# Disclaimer:				
# This amateur Weekend production is for ***purely educational purpose***. 
# The code may be substandard, comes with no guaranty and the ***process may be illegal according to many countries' lawsuits*
# Be responsible. Don't misuse the code, I hold no responsibility for your usage. 
# I'm a novice programmer, started this series just for familiarizing myself with the fundamental concepts and for fun. 
# You are advised to ***delete the code*** as soon as you understand it. 
#
# Credits: pbvamsi@gmail.com
# September 01, 2013
#
##############################################################################################################################

# This code is not tested

?>

<?php error_reporting(0); ?>

<!doctype html> <head><title>getTheSite_SeoIt</title></head><body>
<div style="position:absolute;top:30%;left:15%">
<form method="post">
Enter Site address to fetch the site contents http://www.<input type="text" name="get_site" placeholder="abcd.com" size="50" required/>  
<input type="submit" name="site_adrs" >
</form>
</div>

<?php
//var_dump($_POST);
if (isset($_POST['site_adrs'])) {
    $get_site = 'http://www.'.$_POST['get_site'];
    $contents = file_get_contents($get_site);
    //var_dump($contents);
    file_put_contents('site.html', $contents);
    if (preg_match_all("/<link\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>/siU", $contents, $style0)) {
        //var_dump($style0);
    }
    if ($style0) {
        foreach ($style0[2] as $style) { //echo $style;
            $contents2 = file_get_contents($get_site . '/' . $style); //var_dump($contents2); echo $style[2][0].'.....';
            $each      = explode('/', $style); //var_dump($each);
            if (!is_dir($each[0])) {
                mkdir($each[0]);
            }
            file_put_contents($style, $contents2);
        }
    }
    
    if (preg_match_all("/<script\s[^>]*src=(\"??)([^\" >]*?)\\1[^>]*><\/script>/siU", $contents, $script)) {
        //var_dump($script);
    }
    if ($script) {
        foreach ($script[2] as $each_script) {
            //echo $each_script;
            $contents3 = file_get_contents($get_site . '/' . $each_script);
            $each2     = explode('/', $each_script);
            if (!is_dir($each2[0])) {
                mkdir($each2[0]);
            }
            file_put_contents($each_script, $contents3);
        }
        
    }
    header("location:seo.php"); // ****************Now lets move on to the SEO thing ****************
}
##############################################################################################################################
#if you've understood the above piece of code, I'm pretty sure that you can even download the site images 
# and complete website structure of any website. That's the power of regEx (regular expressions), in some cases sting       # functions also  does the pretty good job. RegEx can also be as simple as 
# $regexp = "<tagname ?.*>(.*)<\/tagname>";  if(preg_match_all("/$regexp/siU", $input, $output)) { var_dump($output);} 
# to learn the language even better I suggest you to follow http://www.codecademy.com/ & http://www.stackoverflow.com 
# http://www.php.net/manual/en/ref.pcre.php 
# REMEMBER NOT TO VOILATE THE LAWSUITS & BEWARE OF INTELLECTUAL PROPERTY RIGHTS. Be responsible
##############################################################################################################################
?>
