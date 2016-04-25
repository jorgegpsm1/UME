#!/bin/bash
FOLDER_USE=/home/promosa2/public_ftp/ESTACIONES/*/*/*/*
SAVEIFS=$IFS
IFS=$(echo -en "\n\b")
for FOLDER in $FOLDER_USE
do
	if [ -d "$FOLDER" ]; then
		cd $FOLDER
		result=${PWD##*/}
		if [ $result != "backup" ]; then
			FOLDER_PARENT=$(dirname ${FOLDER})
			FILESIZE=`du -s -B1 "$FOLDER" | cut -f 1`
			echo $FILESIZE > ${FOLDER_PARENT}/backup/${result}.old
		fi
	else
		result=${FOLDER%.*}
		result=${result##*/}
		FOLDER_PARENT=$(dirname ${FOLDER})
		FILESIZE=`du -s -B1 "$FOLDER" | cut -f 1`
		echo $FILESIZE > ${FOLDER_PARENT}/backup/${result}.old
	fi
done
IFS=$SAVEIFS





