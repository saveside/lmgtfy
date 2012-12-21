#!/usr/bin/env python
# -*- coding: utf8 -*-

import cgitb
cgitb.enable()


def main():
    print "Content-Type: text/html; charset=utf-8"
    print ""

    g = open("/var/www/lmddgtfy.net/logs/reqs.txt", "r")

    for line in g:
        print line,

    g.close()

if __name__ == "__main__":
    main()
