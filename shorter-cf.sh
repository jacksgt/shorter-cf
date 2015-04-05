#!/bin/bash
# Command line bash script for Shorter.cf
USAGE="$0 [OPTION] <FILE>";
OPTIONS=""; 

URL="http://shorter.cf/short-url.php";

if [ ! "$1" ]; then
	echo "ERROR: You need to specify an URL!";
	echo "Usage: $USAGE";
#	echo "Options: $OPTIONS"; # No Options...
	exit 1;
fi

curl -s -F "url=${1}" "$URL" | head -1 | cut -d";" -f 1;


