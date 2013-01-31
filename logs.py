#!/usr/bin/env python
# -*- coding: utf8 -*-

import cgitb
cgitb.enable()


def main():
    print "Content-Type: text/html; charset=utf-8"
    print ""
    print """\
<!DOCTYPE html>
<head>
<title>Let Me DuckDuckGo That For You Logs</title>
<meta charset="utf-8">
<meta name="robots" content="noindex">
</head>
<body>
"""

    from subprocess import Popen, PIPE
    s = Popen(['tail', '-75', '/var/www/lmddgtfy.net/logs/access.log'],
            stdout=PIPE).stdout.read().split('\n')
    print "<pre>"
    for x in s:
        if not "reqs.py" in x and not "logs.py" in x and not "beta.php" in x and not "alpha2.php" in x:
            print x
    print "</pre>"
    print "</body>"
    print "</html>"

if __name__ == "__main__":
    main()
