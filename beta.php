<?php
    if (isset($_REQUEST["jstest"])) {
        $nojs = FALSE;
    } else {
        // create a hidden form and submit it with javascript
        echo "<!DOCTYPE html>\n";
        echo "<html>\n";
        echo "<head>\n";
        echo "<meta charset=\"utf-8\" />\n";
        echo "<title>Let Me DuckDuckGo That For You</title>\n";
        echo "</head>\n<body>\n";
        echo "<form name=\"jsform\" id=\"jsform\" method=\"post\" style=\"display:none\">\n";
        echo "<input name=\"jstest\" type=\"text\" value=\"true\" />\n";
        echo "</form>\n";
        echo "<script language=\"javascript\">\n";
        echo "document.jsform.submit();\n";
        echo "</script>\n";
        // the variable below would be set only if the form wasn't submitted, hence JS is disabled
        $nojs = TRUE;
    }
    if ($nojs){
        //JS is OFF, do the PHP stuff
        //echo "JS is disabled";
        echo "\n\n";
        if (strlen($_REQUEST["q"]) > 0) {
            $base = "https://duckduckgo.com/html/?q=";
            $time = 10;
            $redirect_query = true;
        }
        else {
            $base = "https://duckduckgo.com/";
            $time = 30;
            $redirect_query = false;
        }
        echo "<meta http-equiv=\"Refresh\" content=\"" . $time ."; url=" . $base . urlencode($_REQUEST["q"]) . "\" />";
        echo "</body>\n";
        echo "</html>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="canonical" href="http://lmddgtfy.net/" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <meta name="description" content="New search engine with better results and less garbage.">
        <meta name="keywords" content="search, search engine, new search engine, duck, duckduckgo, ddg, let me, let me duckduckgo that for you, that for you">
        <title>Let Me DuckDuckGo That For You</title>
        <link title="Duck Duck Go" type="application/opensearchdescription+xml" rel="search" href="https://duckduckgo.com/opensearch.xml">
        <link rel="alternate" type="application/rss+xml" title="RSS" href="http://feeds.feedburner.com/yegg" />
        <link rel="apple-touch-icon" href="images/icon128.png" />
    </head>

    <body>
        <br />
        <div id="dmain">
            <input type="text" id="hidden_input" style="display: none;" tabindex="0" /><img id="cursor" src="images/cursor.png" width="15" height="21" style="display: none;" alt="cursor"/>
            <?php if ($redirect_query) { 
                echo "I've noticed javascript is disabled.\n<br />Unfortunately, to demonstrate the wonders of DuckDuckGo I need javascript.\n<br />Therefore I am redirecting your query straight to DuckDuckGo....\n<br /><br />"; 
            }
            elseif ($nojs) { echo "I've noticed javascript is disabled.\n<br />However, this site doesn't work without javascript.\n<br />I'm going to redirect you to DuckDuckGo's website in 30 seconds.\n<br /><br />"; } ?>
            <div class="lmddgtfy">Let me</div>
                <a href="/"><img src="images/logo_homepage.normal.v101.png" alt="Search Engine Duck Duck Go" id="homelogo" width="202" height="160" /></a>
            <div class="lmddgtfy" id="foryou">that for you</div>
            <?php if ($nojs) { echo "<form name=\"x\" action=\"/helper.php\">"; } else { echo "<form name=\"x\" action=\"/\">"; } ?>
                <div id="divsearch">
                    <input id="searchBox" type="text" name="q" onFocus="fq=1" onBlur="fq=0" class="sbox" onClick="if (this.value=='put search terms here') {this.value='';this.style.color='#222222';}"/><input type="button" name="b" onClick="searchn()" value=" " title="Search" class="sbutton" id="search_button">
                </div>
                <div id="blank" class="bk"></div>

                <br /> Share this URL: <br />
                <div id="blank" class="bk"></div>
                <div id="urlPreview" class="urlP">
                    <code id="url"></code>
                    <noscript><pre>http://lmddgtfy.net/<?php if ($_REQUEST["q"]) { echo "?q=" . $_REQUEST["q"]; } ?></pre></noscript>
                </div>
                <div id="about">
                    <a href="https://duckduckgo.com/about.html">About</a> &nbsp;|&nbsp; <a href="https://duckduckgo.com/settings.html">Settings</a> &nbsp;|&nbsp; <a href="https://duckduckgo.com/goodies.html">Goodies</a>
                    <script type="text/javascript">
                        nib(0,'',' &nbsp;|&nbsp; ');
                    </script>
                </div>
                <a href="https://internetdefenseleague.org"><img src="images/footer_badge.png" width="80" height="80" alt="Member of The Internet Defense League" /></a>
                <br />
                <a href="https://flattr.com/thing/801778/Let-Me-DuckDuckGo-That-For-You" target="_blank"><img src="images/flattr-badge-large.png" alt="Flattr this" title="Flattr this" /></a>
                <a href="https://www.gittip.com/myano/"><img src="images/gittip.png" alt="gittip" title="gittip" /></a>
                <br />
                <div id="copyright">
                    &copy; 2012 - <a href="https://duckduckgo.com/privacy.html">Privacy</a> &amp; <a href="https://duckduckgo.com/terms.html">Terms</a> &amp; <a href="https://github.com/myano/lmddgtfy">Source</a> &amp; <a href="logs.py">Logs</a> &amp; <a href="logs">Logs Source</a>
            </div>
            </form>
        </div>
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.query.js"></script>
        <script type="text/javascript" src="js/lmddgtfy.js"></script>
    </body>
</html>
