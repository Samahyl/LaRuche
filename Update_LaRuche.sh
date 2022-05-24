#!/bin/bash

if [ $1 = "--help" ]; then
	clear
	clear
	echo "-full_UP : perform a complete update of the website from the GitHub repository to the html root directory"
	echo "-single_DL : perform a download from the GitHub repository to the current directory save as 'projet'"
	echo "-backup : copy the html root directory into the backups folder then rename it 'Backup_{current date time}'"
	echo "-restore : Delete current html root directory then replace it by last backup saved"
	echo "-restore_SB : Delete current html root directory then replace it by the choosed backup"
	read wait
else 
	if [ $1 = "-full_UP" ]; then
		clear
		clear
		echo "Complete update selected, are you sure [y/n]?"
		read test
		if [ $test = "y" ]; then
			sudo git clone https://github.com/Samahyl/LaRuche.git
			sudo cp -r /home/thoum/LaRuche/projet/ /var/www/
			sudo rm -r LaRuche
			sudo rm -r /var/www/html
			sudo mv /var/www/projet/  /var/www/html
			clear
			clear
			echo "Result, content of: /var/www "
			ls /var/www
			echo "Press any key..."
			read www
		elif [ $test = "n" ]; then
			clear
			clear
			echo "NO"
			echo "Quitting..."
			exit 0
		else
			quitvar="false"
		fi
	elif [ $1 = "-single_DL" ]; then
		clear
		clear
		echo "Single download selected, are you sure [y/n]?"
		read test
		if [ $test = "y" ]; then
			sudo git clone https://github.com/Samahyl/LaRuche.git
			sudo cp -r /home/thoum/LaRuche/projet/ /home/thoum
			sudo rm -r LaRuche
			ls
		elif [ $test = "n" ]; then
			clear
			clear
			echo "NO"
			echo "Quitting..."
			exit 0
		else
			quitvar="false"
		fi
	elif [ $1 = "-backup" ]; then
		clear
		clear
		echo "Making backup selected, are you sure [y/n]?"
		read test
		if [ $test = "y" ]; then
			dt=$(date '+%d-%m-%Y_%H:%M:%S');
			backup_name="Backup_"
			backup_name+=$dt
			backup_name+="/"
			sudo cp -r /var/www/html/ /var/www/Backups/$backup_name
		elif [ $test = "n" ]; then
			clear
			clear
			echo "NO"
			echo "Quitting..."
			exit 0
		else
			quitvar="false"
		fi
	elif [ $1 = "-restore" ]; then
		clear
		clear
		echo "Reloading last backup selected, are you sure [y/n]?"
		read test
		if [ $test = "y" ]; then
			lastbackup=$(ls /var/www/Backups/ -c | sort | tail -1)
			srcfolder=/var/www/Backups/
			srcfolder+=$lastbackup
			sudo cp -r $srcfolder /var/www/recover
			sudo rm -r /var/www/html
			sudo mv /var/www/recover /var/www/html
		elif [ $test = "n" ]; then
			clear
			clear
			echo "NO"
			echo "Quitting..."
			exit 0
		else
			quitvar="false"
		fi
	elif [ $1 = "-restore_SB" ]; then
		clear
		clear
		echo "Reloading choosed backup selected, are you sure [y/n]?"
		read test
		if [ $test = "y" ]; then
			echo "Do you want to list all backups [y/n]?"
			read listbackups
			if [ $listbackups = "y" ]; then
				ls -1 /var/www/Backups
			fi
			echo ""
			echo "Select date [dd-mm-yyyy]"
			read dateselect
			echo "Select time [hh\:mm\:ss]"
			read timeselect
			filename="Backup_"
			filename+=$dateselect
			filename+="_"
			filename+=$timeselect
			srcfolder=/var/www/Backups/
			srcfolder+=$filename
			sudo cp -r $srcfolder /var/www/recover
			sudo rm -r /var/www/html
			sudo mv /var/www/recover /var/www/html
		elif [ $test = "n" ]; then
			clear
			clear
			echo "NO"
			echo "Quitting..."
			exit 0
		else
			quitvar="false"
		fi
	fi
fi

if [ $quitvar = "false" ]; then
	echo "Error :/ Wrong choice! Type '--help' for more informations"
else
	clear
	clear
	echo "Bye!"
	exit 0
fi