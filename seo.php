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


# This is not complete tutorial for SEO, google it to know complete list 
# This code is not tested

error_reporting(0);

$contents = file_get_contents('site.html'); //var_dump($contents);

# for string operations refer something like http://stackoverflow.com/questions/4366730/

echo "<ol>";

# verification by google and/or by all other search engines  is must now-a-days
if (strpos($contents, 'google-site-verification') !== false) {
    echo '<li>Good your page is verified by Google!</li>';
} else {
    echo '<li> Bad, you page is not yet verified by google, visit google web master tool and register your page </li>';
}


# title is the title of the page :P 
if (strpos($contents, '<title>') !== false) {
    echo '<li>Good your page has title!</li>';
} else {
    echo '<li> Bad, you page dont have title, it should look something like <title>abc Web Services - Webpage Designing | Development | Maintainence | SEO | Blogs | Photoshop Services</title>   </li>';
}


# keywords are the words by which your page will be listed for in the search results 
if (strpos($contents, '<meta name="keywords"') !== false) {
    echo '<li>Good your page has keywords listed!</li>';
} else {
    echo '<li> Bad, you page is have any keywords, if yours is a web designing company, then write something like            <meta name="keywords" content="Web services, webpage design, webpage development, webpage maintainence, webpage redesign, seo, photoshop, blogs, india, php, html5, mysql, flash, jquery, ajax, joomla, mysqli, html, css, javascript,  content writing, data entry">   </li>';
}


# description primarily describes what you the page  is all about  
if (strpos($contents, '<meta name="description"') !== false) {
    echo '<li>Good your page has description!</li>';
} else {
    echo '<li> Bad, you page is have any keywords, if yours is a web designing company, then write something like  
<meta name="description" content="We will do this that and bla bla bla  ">
  </li>';
}

//am sorry recently I read some where that 

# flash content increases the webpage loading time and moreover it does not help search engine in any way
if (strpos($contents, '.swf') !== false || strpos($contents, '.flv') !== false) {
    echo '<li> Bad, you page has flash content, it may be bad for mobile internet connections.  </li>';
} else {
    echo '<li>Good your page has no flash content!</li>';
}


# refer https://www.google.com/webmasters/tools/ , http://googlewebmastercentral.blogspot.in/                                # http://productforums.google.com/forum/?hl=en#!forum/webmasters
# screwed up with these checks? well lets do something more interesting 
# sorry string functions is not just limited to strpos find complete list at http://php.net/manual/en/ref.strings.php

# never feel fed up, regular expression feeds us, saves our time by doing exceptional jobs, saves our time, energy, effort

///////////// for the images 
echo '<li>';
$regexp = "<img\s[^>]*src=(\"??)([^\" >]*?)\\1[^>]*>";
if (preg_match_all("/$regexp/siU", $contents, $output)) {
    echo '<ol>';
    for ($i = 0; $i < count($output[0]); $i++) {
        if (strpos($output[0][$i], 'alt=') !== false) {
            echo '<li> good ' . htmlspecialchars($output[0][$i]) . ' has alt name</li>';
        } else {
            echo '<li> bad ' . htmlspecialchars($output[0][$i]) . 'dont have a alt name</li>';
        }
    }
    echo "Image names should refelect actual name of the image, relative to the website and we found them as &nbsp;&nbsp; ";
    foreach ($output[2] as $one) {
        echo $one . ' &nbsp;&nbsp;&nbsp; ';
    }
    echo '</ol>';
} else {
    echo 'sorry! your website does not contain any images';
}
echo '</li>';

///////////// for the anchor links
echo '<li>';
if (preg_match_all('#<a.*?href="(.*?)".*?>(.*?)</a>#i', $contents, $links)) {
    //var_dump($links);
    
    echo 'Now you got to analyze these on your own :(';
    echo '<ol>';
    for ($i = 0; $i < count($links); $i++) {
        echo '<li> does the link <b>' . $links[1][$i] . '</b> matches <b>' . $links[2][$i] . '</b> ? </li>';
    }
    
}
echo '</li>';

echo '</ol>';

##############################################################################################################################
# I wish you understood the flow and I hope you can do it in the right way by yourself
# thanks for your time, with your support, I wish I may comeback with another interesting weekend coding 
##############################################################################################################################

?>
