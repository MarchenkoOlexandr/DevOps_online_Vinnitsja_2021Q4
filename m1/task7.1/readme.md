# Linux administration with bash. Home task

## A. Create a script that uses the following keys:

1. When starting without parameters, it will display a list of possible keys and their description.

****

```
#!/bin/bash
#When starting without parameters, it will display a list of possible keys and their description
if [[ "$#" == "0" ]]; then
    echo "Usage: script [ OPTIONS ]"
    echo -en "\033[34m -a, --all"
    echo -e "\033[33m \t key displays the IP addresses and symbolic names of all hosts in the current subnet. For example: script --all or script -a"
    echo -en "\033[34m -t, --target"
    echo -e "\033[33m \t key displays a list of open system TCP ports. For example: script --target or script -t"
fi
list_IP() {
    echo -n "Enter you subnet adress in format XXX.XXX.XXX.*:"
    read adress
    echo "The IP addresses and symbolic names of all hosts in the current subnet:"
    nmap -sP $adress | awk 'NR % 2 == 0 {print "Hostname:" $5 "    " "IP adress:" $6}' | sed 's/(//g; s/)//g'
}
listopen_TCPports() {
    echo "The list of open system TCP ports:"
    echo -e "\033[34m variant1 \033[33m"
    sudo ss -lnt | awk 'BEGIN{print "Number of TCP port"} { if (NR >= 2) print $4} END { print "" }' | awk -F: '{print $NF}'
    echo -e "\033[34m variant2 \033[33m"
    sudo netstat -ltn | awk 'BEGIN{print "Number of TCP port"} { if (NR >= 3) print $4} END { print "" }' | awk -F: '{print $NF}'
    echo -e "\033[34m variant3 \033[33m"
    sudo lsof -nP -iTCP -sTCP:LISTEN | awk 'BEGIN{print "Number of TCP port"} { if (NR >= 2) print $9} END { print "" }' | awk -F: '{print $NF}'
}
if [ "$1" == "-a" ] || [ "$1" == "--all" ]; then
#Checking install or no nmap and if not installed its be installed (also can use dpkg -s nmap)
    if [[ -e "/usr/bin/nmap" ]]; then
        echo "Nmap installed"
    else
        echo "Nmap not installed"
        echo -n "Do you want install Nmap on you system? y/n:"
        read Question1
        case $Question1 in
            y)
                sudo apt update -y
                sudo apt upgrade -y
                sudo apt install nmap -y
        esac
    fi
    list_IP $2
elif [ "$1" == "-t" ] || [ "$1" == "--target" ]; then
    listopen_TCPports
fi

```

2. The --all key displays the IP addresses and symbolic names of all hosts in the current subnet

****

3. The --target key displays a list of open system TCP ports. The code that performs the functionality of each of the subtasks must be placed in a separate function 

****

![RESULT](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/f675b12e3a3474b8fcceeb78d109b165e3c1ad2e/m1/task7.1/Screenshot_1.png "RESULT")

# B. Using Apache log example create a script to answer the following questions:

1. From which ip were the most requests?

****

```
#!/bin/bash

#for usability we can say "Please rename your log file in current folder like apache_logs.txt" and change Slogfile on apache_logs.txt in that script
echo -en "\033[33m Please enter filename for analyze in current folder:"
read logfile

if [[ -e $logfile ]]; then
    echo -e "\033[33m Thank you. \033[0m"
else
    echo -e "\033[31m ERROR! The source not exist \033[0m"
    exit 0
fi


#apache_logs.txt
Task1() {
    echo  "Top 5 most requests from next IP:"
    cat $logfile | grep -E -o "([0-9]{1,3}[\.]){3}[0-9]{1,3}" | sort | uniq -c | sort -gr | head -5
}

Task2() {
    echo  "Top 10 most requested page:"
    cat $logfile | awk '{print $7}' | sort | uniq -c | sort -gr | head | sed 's/\///g'
}

Task3() {
    echo  "The requests from each ip:"
    cat $logfile | grep -E -o "([0-9]{1,3}[\.]){3}[0-9]{1,3}" | sort | uniq -c | sort -gr | awk '{print "from IP " $2 " is " $1 " requests" }'
}

Task4() {
    echo  "The non-existent pages:"
    cat $logfile | awk '{print $7}' | grep "404" -B 1 | uniq | sed 's/\///g'
}

Task5() {
    echo  "Top 20 number of requests was during:"
    cat $logfile | awk '{print $4}' | sort | uniq -c | sort -gr | head -20
}

Task6() {
    echo  "Next search bots have accessed the site:"
    cat $logfile | awk '/bot/ {print $1, $12, $14, $15, $16, $29, $30}' | awk '/bot/ {print $1, $2, $3, $5}' | sort | uniq | sed 's/\"//g'
}

echo -e "\033[33m From which ip were the most requests? Please select 1"
echo -e "\033[33m What is the most requested page? Please select 2"
echo -e "\033[33m How many requests were there from each ip? Please select 3"
echo -e "\033[33m What non-existent pages were clients referred to? Please select 4"
echo -e "\033[33m What time did site get the most requests? Please select 5"
echo -e "\033[33m What search bots have accessed the site? (UA + IP) Please select 6"
echo -en "\033[31m Make your choice:\033[0m"
read Choice
case $Choice in
    1)
        Task1;;
    2)
        Task2;;
    3)
        Task3;;
    4)
        Task4;;
    5)
        Task5;;
    6)
        Task6;;
esac

```				
			
![From which ip were the most requests?](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/64b0b63ac6c6c9ccb5e98003dd4cf418dcb22165/m1/task7.1/Screenshot_2.png "From which ip were the most requests?")

2. What is the most requested page?

****

![What is the most requested page?](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/64b0b63ac6c6c9ccb5e98003dd4cf418dcb22165/m1/task7.1/Screenshot_3.png "What is the most requested page?")

3. How many requests were there from each ip?

****

![How many requests were there from each ip?](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/64b0b63ac6c6c9ccb5e98003dd4cf418dcb22165/m1/task7.1/Screenshot_4.png "How many requests were there from each ip?")

4. What non-existent pages were clients referred to?

****

![What non-existent pages were clients referred to?](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/64b0b63ac6c6c9ccb5e98003dd4cf418dcb22165/m1/task7.1/Screenshot_5.png "What non-existent pages were clients referred to?")

5. What time did site get the most requests?

****

![What time did site get the most requests?](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/64b0b63ac6c6c9ccb5e98003dd4cf418dcb22165/m1/task7.1/Screenshot_6.png "What time did site get the most requests?")

6. What search bots have accessed the site? (UA + IP)

****

![What search bots have accessed the site? (UA + IP)](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/64b0b63ac6c6c9ccb5e98003dd4cf418dcb22165/m1/task7.1/Screenshot_7.png "What search bots have accessed the site? (UA + IP)")

# C. Create a data backup script that takes the following data as parameters:

1. Path to the syncing directory.

****

```
#!/bin/bash
#When starting without parameters, it will display a list of possible keys and their description
if [[ "$#" == "0" ]]; then
    echo -e "\033[34m Usage: script [ OPTIONS ] [ OPTIONS ]\033[0m"
    echo -e "\033[34m For example: script.sh [Path to the source directory] [Path to desination directory] \033[0m"
	exit 0
elif ! [[ -d $1  ]]; then
    echo -e "\033[31m ERROR! The source directory not exist \033[0m"
	exit 0
elif [[ -z $2  ]]; then
    echo -e "\033[31m ERROR! Please specify desination directory \033[0m"
	exit 0
elif ! [[ -d $2  ]]; then
    echo -e "\033[31m WARNING! Desination directory dont exist, trying to create $2 \033[0m"
    mkdir "$2"
	echo -e "\033[32m Desination directory created \033[0m"
    if [[ -e $2 ]]; then
        echo -e "\033[33m Successfully created destination directory. \033[0m"
    else
        echo -e "\033[32m Failed to create destination directory. Script exited \033[0m"
        exit 0
    fi
fi

source_dir=$1
dest_dir=$2
log=$dest_dir/backup.log
desttmp_dir=$dest_dir/tmpdir

if ! [[ -d $desttmp_dir ]]; then
    mkdir $desttmp_dir
fi

touch $dest_dir/backup.log
touch $desttmp_dir/ls.tmp
touch $desttmp_dir/snapshot.tmp

ls $source_dir > $desttmp_dir/ls.tmp

date_point=$(date '+%d.%m.%Y_%H:%M:%S');

for eventcreate in $(diff -y $desttmp_dir/ls.tmp $desttmp_dir/snapshot.tmp | awk '{print $1}' | sed 's/>//g; /^[[:space:]]*$/d')
do
    echo "$date_point CREATED $eventcreate" >> $log
    tar -rvf $dest_dir/backup.tar $source_dir/$eventcreate > /dev/null
    echo "$date_point BACKUPED $eventcreate" >> $log
done
echo -e "\033[42m BACKUPED \033[0m"

for eventdelete in $(diff -y $desttmp_dir/ls.tmp $desttmp_dir/snapshot.tmp | awk '{print $2 $3}' | sed 's/<//g; /^[[:space:]]*$/d; s/|//g')
do
    echo "$date_point DELETED $eventdelete" >> $log
done

rm -rf $desttmp_dir/ls.tmp;
ls $source_dir > $desttmp_dir/snapshot.tmp

```

![Backup script](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/64b0b63ac6c6c9ccb5e98003dd4cf418dcb22165/m1/task7.1/Screenshot_8.png "Backup script")

2. The path to the directory where the copies of the files will be stored. In case of adding new or deleting old files, the script must add a corresponding entry to the log file
indicating the time, type of operation and file name. [The command to run the script must be added to crontab with a run frequency of one minute]

****

```
crontab -e

SHELL=/bin/bash

*/1 * * * * /home/user/script71b.sh [ OPTIONS ] [ OPTIONS ] - The command to run the script must be added to crontab with a run frequency of one minute (http://softhelp.org.ua/?p=6069)

crontab -l
```



