#!/bin/bash
# -*- ENCODING: UTF-8 -*-


MONTHS=(ZERO Ene Feb Mar Abr May Jun Jul Ago Sep Oct Nov Dic)


month=$(date +"%m")
day=$(date +"%d" --date='-1 day')
month=${MONTHS[${month}]}

cd  /var/www/html/gps_db/ClienteCCMF2_5

FILE="log${month^^}${day}.db.7z"

if [ -f $FILE ];
then
   7za e ${FILE}
else
   echo "File $FILE does not exist."
fi