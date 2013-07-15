#!/usr/bin/env python
# -*- coding: utf8 -*-

import cgitb
cgitb.enable()


def main():
    print 'Content-Type: text/html; charset=utf-8'
    print ''
    print '''\
<!DOCTYPE html>
<html>
\t<head>
\t\t<title>Let Me DuckDuckGo That For You Logs</title>
\t\t<meta charset='utf-8'>
\t\t<meta name='robots' content='noindex'>
\t\t<script>
\t\t\t@font-face {
\t\t\t\tfont-family: 'Ubuntu Mono';
\t\t\t\tfont-style: normal;
\t\t\t\tfont-weight: 400;
\t\t\t\tsrc: local('Ubuntu Mono'), local('UbuntuMono-Regular'), url(fonts/ViZhet7Ak-LRXZMXzuAfkYbN6UDyHWBl620a-IRfuBk.woff) format('woff');
\t\t\t}
\t\t</script>
\t</head>
\t<body>'''

    from subprocess import Popen, PIPE
    s = Popen(['tail', '-1000', '/var/www/lmddgtfy.net/logs/access.log'],
            stdout=PIPE).stdout.read().split('\n')
    print '''\t\t<div style="width: 1200px; font-size: 14px; font-family: 'Ubuntu Mono', sans-serif;">'''
    for x in s:
        if x:
            newline = x.replace('&', '&amp;')
            print newline + '<br />'
    print '\t\t</div>'
    print '\t</body>'
    print '</html>'

if __name__ == '__main__':
    main()
