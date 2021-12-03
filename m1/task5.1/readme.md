# Task1.Part1
	
**sudo su**

1. Log in to the system as root.

	![Log in to the system as root.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_1.png "Log in to the system as root.")

2. Use the passwd command to change the password. Examine the basic parameters of the command. What system file does it change?
		
**passwd - changed password for current user**

**sudo passwd - changed password for any users**

**man passwd - we can read all parameters of this command**

**whith this command passwd - we can manipulation with password for users - change, delete, set expiration and see status**

	![passwd - changed password for current user](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_2.png "passwd - changed password for current user")
	
	![What system file does it change?](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_3.png "What system file does it change?")
	
3. Determine the users registered in the system, as well as what commands they execute. What additional information can be gleaned from the command execution?
	
	**compgen -u   -only users**
	
	**w,who,finger (if install),pinky    -only in system now**
	
	**last -a, lastlog -who and when log in system**


	![registered users - cat /etc/passwd](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_4.png "registered users - cat /etc/passwd")
		
4. Change personal information about yourself.
	
	**chfn user**
	
	**also we can use command sudo -s + usermod -l newlogin oldlogin for change login**

	![Change personal information about yourself.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_5.png "Change personal information about yourself.")
	
5. Become familiar with the Linux help system and the man and info commands. Get help on the previously discussed commands, define and describe any two keys for these commands. Give examples.
		
	**man pinky its same pinky --help**

	![if we need help we can used command man and help](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_6.png "if we need help we can used command man and help")
	
	![if we need help we can used command man and help](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_7.png "if we need help we can used command man and help")
	
	![if we need help we can used command man and help](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_8.png "if we need help we can used command man and help")
	
	![if we need help we can used command man and help](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_9.png "if we need help we can used command man and help")
		
6. Explore the more and less commands using the help system. View the contents of files .bash* using commands.
	
	**command more and less for reading text**
		
	**sudo less /usr/share/bash-completion/completions/ibus.bash**
		
	**sudo more /usr/share/bash-completion/completions/ibus.bash**

	![View the contents of files .bash using commands.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_10.png "View the contents of files .bash using commands.")
	
	![View the contents of files .bash using commands.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_11.png "View the contents of files .bash using commands.")
	
	![View the contents of files .bash using commands.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_12.png "View the contents of files .bash using commands.")
	
	![View the contents of files .bash using commands.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_13.png "View the contents of files .bash using commands.")
		
7. Describe in plans that you are working on laboratory work 1. Tip: You should read the documentation for the finger command.
	
	**If i need information about some command i use command man. For example for read information about finger i used man finger**

	![read the documentation for the finger command](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_14.png "read the documentation for the finger command")

8. List the contents of the home directory using the ls command, define its files and directories. Hint: Use the help system to familiarize yourself with the ls command.
	
	**For solution this task I used command ls -alh --group-directories-first**
	
	**in this command -a do not ignore entries starting with . + -l use a long listing format + -h human-readable + --group-directories-first  group directories before files**

	![List the contents of the home directory using the ls command](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_15.png "List the contents of the home directory using the ls command")

# Task1.Part2

1. Examine the tree command. Master the technique of applying a template, for example, display all files that contain a character c, or files that contain a  specific sequence of characters. List subdirectories of the root directory up to and including the second nesting level.
	
	**for this task I used command: sudo tree  -P '*c*' display all files that contain a character c + sudo tree -L 2 Descend only level directories deep.**

	![Examine the tree command](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_16.png "Examine the tree command")

2. What command can be used to determine the type of file (for example, text or binary)? Give an example.

	![file command for Determine type of FILEs.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_17.png "file command for Determine type of FILEs.")
	
	![file command for Determine type of FILEs.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_18.png "file command for Determine type of FILEs.")
	
3. Master the skills of navigating the file system using relative and absolute paths. How can you go back to your home directory from anywhere in the filesystem?
    
	**for relative path I used: cd ~ or cd $home for absolute path I used: cd /home/legion**

	![relative path I used: cd ~ or cd $home absolute path I used: cd /home/legion](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_19.png "relative path I used: cd ~ or cd $home absolute path I used: cd /home/legion")

4. Become familiar with the various options for the ls command. Give examples of listing directories using different keys. Explain the information displayed on the terminal using the -l and -a switches.
	
	**For solution this task I used command ls -alh --group-directories-first**
	
	**in this command -a do not ignore entries starting with . + -l use a long listing format + -h human-readable + --group-directories-first  group directories before files**
	
``	**ls -l  use a long listing format  ls -a do not ignore entries starting with .**

	![ls command](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_20.png "ls command")
	
	![Explain the information displayed on the terminal using the -l and -a switches = ls -l  use a long listing format  ls -a do not ignore entries starting with .](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_21.png "Explain the information displayed on the terminal using the -l and -a switches ls -l  use a long listing format  ls -a do not ignore entries starting with .")

5. Perform the following sequence of operations: - create a subdirectory in the home directory;

- in this subdirectory create a file containing information about directories

located in the root directory (using I/O redirection operations);

- view the created file;

- copy the created file to your home directory using relative and absolute addressing.

- delete the previously created subdirectory with the file requesting removal;

- delete the file copied to the home directory.
	
	**mkdir subdir5_1part2_5**
	
	**tree -dL 1 > subdir5_1part2_5/dirinfo.txt**
	
	**cat subdir5_1part2_5/dirinfo.txt**
	
	**cp subdir5_1part2_5/dirinfo.txt ~/reldirinfo.txt**
	
	**cp subdir5_1part2_5/dirinfo.txt /home/legion/absdirinfo.txt**
	
	**rm -rI subdir5_1part2_5**
	
	**rm absdirinfo.txt reldirinfo.txt**

	![Perform the following sequence of operations](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_22.png "Perform the following sequence of operations")

6. Perform the following sequence of operations:

- create a subdirectory test in the home directory;

- copy the .bash_history file to this directory while changing its name to labwork2;

- create a hard and soft link to the labwork2 file in the test subdirectory;

- how to define soft and hard link, what do these concepts;

- change the data by opening a symbolic link. What changes will happen and why

- rename the hard link file to hard_lnk_labwork2;

- rename the soft link file to symb_lnk_labwork2 file;

- then delete the labwork2. What changes have occurred and why?
	
	**mkdir test**
	
	**cp .bash_history test/labwork2**
	
	**ln -P labwork2 hardlinklabwork2**
	
	**ln -s labwork2 softlinklabwork2**
	
	**nano softlinklabwork2**
	
	**less softlinklabwork2**
	
	**less labwork2**

	![Perform the following sequence of operations](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_24.png "Perform the following sequence of operations")
	 
	![nano softlink](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_23.png "nano softlink")
	
	![less softlink](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_25.png "less softlink")	
	
	![less softlink](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_26.png "less softlink")
	
	**mv hardlinklabwork2 hard_lnk_labwork2 && softlinklabwork2 symb_lnk_labwork2**
	
	**rm labwork2**
	
	![result](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_27.png "result")
	
	![result](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_28.png "result")
	
	**Explain: softlink can be used fo all files and folders, if file or folders delete than softlink not work.** 
	
	**Hardlink direct on plase in disk where file. Can use for only files not for folders. If file delete hardlink work. Not work from another drive or in network.**
	
7. Using the locate utility, find all files that contain the squid and traceroute sequence.
	
	**sudo apt install locate**
	
	**sodo updatedb**
	
	**locate -A squid**
	
	**locate -A traceroute**
	
	![Using the locate utility](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_29.png "Using the locate utility")

8. Determine which partitions are mounted in the system, as well as the types of these partitions.
	
	**df**

	![Determine which partitions are mounted in the system, as well as the types of these partitions](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_30.png "Determine which partitions are mounted in the system, as well as the types of these partitions")
	
9. Count the number of lines containing a given sequence of characters in a given file.
	
	**grep "sud" test/hard_lnk_labwork2 | wc -l**

	![Count the number of lines containing a given sequence of characters in a given file](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_31.png "Count the number of lines containing a given sequence of characters in a given file")
 
10. Using the find command, find all files in the /etc directory containing the host character sequence.

	**sudo find /etc/ -type f -name 'zirka host zirka'**

	![Using the find command](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_32.png "Using the find command")

11. List all objects in /etc that contain the ss character sequence. How can I duplicate a similar command using a bunch of grep?

	**ls /etc/ -a | grep -i "ss"**

	![List all objects in /etc that contain the ss character sequence](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_33.png "List all objects in /etc that contain the ss character sequence")

12. Organize a screen-by-screen print of the contents of the /etc directory. Hint: You must use stream redirection operations.

	**ls /etc/ -alh | less**

13. What are the types of devices and how to determine the type of device? Give examples.
	
	**ls -lha /dev**
	
	**In Linux all it's files. But in Linux devices with 'c' - symbol device, 'b' - block device (hard disk for example), 'd' - directory, '-' - simple files. 

14. How to determine the type of file in the system, what types of files are there?

	**In Linux three main type: simple files for store information, special files for device, directories for grouping simple files or special files.**
	
	**ls -la /bin/ | grep "^-" ('-' - simple files (exe, txt, jpeg, tar), 'c' - symbol device (printer), 'b' - block device (hard disk for example), 'd' - directory, 'l' - link, 'p' - pipe, 's' - socket) or file for determine format of files**

15. List the first 5 directory files that were recently accessed in the /etc directory.
	
	**ls /etc -alur | grep ^- | tail -n 5**

	![List the first 5 directory files that were recently accessed in the /etc directory.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/c1569439cc97145faa30e918041693616fb3ce40/m1/task5.1/Screenshot_34.png "List the first 5 directory files that were recently accessed in the /etc directory.")
