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
        // the variable below would be set only if the form wasn"t submitted, hence JS is disabled
        $nojs = TRUE;
    }
    if ($nojs){
        //JS is OFF, do the PHP stuff
        //echo "JS is disabled";
        echo "\n\n";
        if (strlen($_REQUEST["q"]) > 0) {
            $base = "https://duckduckgo.com/html/?q=";
            $time = 0;
        }
        else {
            $base = "https://duckduckgo.com/";
            $time = 10;
            $redirect = true;
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
        <link rel="canonical" href="https://duckduckgo.com/" />
        <meta name="description" content="New search engine with better results and less garbage.">
        <meta name="keywords" content="search,search engine,new search engine">
        <title>Let Me DuckDuckGo That For You</title>
        <link title="Duck Duck Go" type="application/opensearchdescription+xml" rel="search" href="https://duckduckgo.com/opensearch.xml">
        <link rel="alternate" type="application/rss+xml" title="RSS" href="http://feeds.feedburner.com/yegg" />
        <link rel="apple-touch-icon" href="images/icon128.png" />
        <style type="text/css">
            img{
                -ms-interpolation-mode: bicubic;
            }
            html{
                background:#FFF;
                color:#444;
                font-family:"Segoe UI",Arial,sans-serif;
            }
            body, form, h1{
                margin:0;
                padding:0;
            }
            a:hover{
                text-decoration:underline;
            }
            a{
                text-decoration:none;
                color:#0068CC;
            }
            #cursor{
                position: absolute;
                top: 0px;
                left: 0px;
                z-index: 1000;
            }
            .lmddgtfy{
                font-family: Helvetica, Arial, sans-serif;
                font-weight: bold; font-size: 15pt;
            }
            #foryou{
                margin-bottom: 10px;
            }
        </style>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.query.js"></script>
        <script type="text/javascript" src="js/lmddgtfy.js"></script>
    </head>

    <body>
        <br />
        <div style="width:600px;margin:auto;text-align:center;">
            <input type="text" id="hidden_input" style="display: none;" tabindex="0" /><img id="cursor" src="images/cursor.png" width="15" height="21" style="display: none;" alt="cursor"/>
            <?php if ($redirect) { echo "Redirecting you to DuckDuckGo....\n"; } ?>
            <div class="lmddgtfy">Let me</div>
                <a href="/"><img src="images/logo_homepage.normal.v101.png" alt="Search Engine Duck Duck Go" style="margin-top:20px;margin-bottom:30px;" width="202" height="160" /></a>
            <div class="lmddgtfy" id="foryou">that for you</div>
            <?php if ($nojs) { echo "<form name=\"x\" action=\"/helper.php\">"; } else { echo "<form name=\"x\" action=\"/\">"; } ?>
                <div style="border:1px solid #ff6666;border-top:1px solid #ff6666;width:390px;margin:auto;">
                <input id="searchBox" type="text" name="q" onFocus="fq=1" onBlur="fq=0" style="outline:none; width:350px; color:#222; background:#FFF; font-family:'Segoe UI',Arial,sans-serif; font-size:20px; border:0 none; margin:0; padding:0; padding-left:5px; padding-top:5px; padding-bottom:5px;" onClick="if (this.value=='put search terms here') {this.value='';this.style.color='#222222';}"/><input type="button" name="b" onClick="searchn()" value=" " style="background:transparent url(images/zoom.v101.png) no-repeat scroll 0 0;width:24px;height:24px;padding:0px;margin:0px;cursor:pointer;border:0 none;vertical-align:top;margin-top:8px;margin-left:6px;margin-right:4px;" title="Search" id="search_button">
                </div>
                <div style="margin-top:20px;"></div>
                <!-- <script src="https://duckduckgo.com/d851.js" type="text/javascript"></script> -->
                <br /> Share this URL: <br />
                <div id="blank" style="border:0px; padding: 3px;"></div>
                <div id="urlPreview" style="border:1px solid #009400; border-top:1px solid #009400; width:390px; margin:auto; padding:10px;">
                    <code id="url"></code>
                    <noscript><pre>http://lmddgtfy.net</pre></noscript>
                </div>
                <div style="padding-left:0px;padding-top:30px;font-size:14px;text-align:center;width:450px;margin:auto;">
                    <a href="https://duckduckgo.com/about.html">About</a> &nbsp;|&nbsp; <a href="https://duckduckgo.com/settings.html">Settings</a> &nbsp;|&nbsp; <a href="https://duckduckgo.com/goodies.html">Goodies</a>
                    <script type="text/javascript">
                        nib(0,'',' &nbsp;|&nbsp; ');
                    </script>
                </div>
                <a href="http://internetdefenseleague.org"><img src="images/footer_badge.png" alt="Member of The Internet Defense League" /></a>
                <div style="padding-left:0px;font-size:10px;text-align:center;width:450px;margin:auto;">
                    &copy; 2012 - <a href="https://duckduckgo.com/privacy.html">Privacy</a> &amp; <a href="https://duckduckgo.com/terms.html">Terms</a> &amp; <a href="https://github.com/myano/lmddgtfy">Source</a> &amp; <a href="logs.py">Logs</a> &amp; <a href="logs">Logs Source</a>
            </div>
            </form>
        </div>
    </body>
</html>