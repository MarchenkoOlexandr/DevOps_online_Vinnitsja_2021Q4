# Task2

## Task assignment.

1) Analyze the structure of the /etc/passwd and /etc/group file, what fields are present in it, what users exist on the system? Specify several pseudo-users, how to define them?

	**for analyse I used command cat /etc/passwd and cat /etc/group**
	
	**in file passwd next fields: login, password hash, user id UID, group id GID, gecos(info about user: name, phone, email ...), home directory, used login shell**
	
	**in system next users: root user, real users, pseudo or system users only for own process(daemon, syslog, proxy, tspdump, etc) Define pseudo-users - nologin**
	
	![Analyze the structure of the /etc/passwd](https1 "Analyze the structure of the /etc/passwd")
	
	**in file group next fields: group name, password, group id, list with users belonging in this group**
	
	![Analyze the structure of the //etc/group](https2 "Analyze the structure of the /etc/group")	

2) What are the uid ranges? What is UID? How to define it?

	**UID (User ID) ranges its identificator for users. In Linux UID = from 0 to 65535. UID=0 superuser always, from 1 to 499 or 999 systemusers - pseudo, from 1000 real users**
	
3) What is GID? How to define it?

	**GID (Group ID) its identificator for group. GID=0 root group, GID=1 - 100 system group, GID= from 100 for users**

4) How to determine belonging of user to the specific group?

	**belonging of user to the specific group in with cat /etc/group where in list field all user from this group**
	
	**if need determine belonging of one user to the specific group use command: id -G user_name, groups user_name, id -nG user_name**
	
	![How to determine belonging of user to the specific group](https3 "How to determine belonging of user to the specific group")

5) What are the commands for adding a user to the system? What are the basic parameters required to create a user?

	**useradd or adduser. When we use adduser basic parameters next:user_name, password, etc**
	
	![adduser](https4 "adduser")

6) How do I change the name (account name) of an existing user?

	**use usermod user_name. For example i changed user name olmar on olmarch and than print list members from group olmar**
	
	![change the name (account name) of an existing user](https5 "change the name (account name) of an existing user")
	
	![print list members from group olmar](https6 "print list members from group olmar")

7) What is skell_dir? What is its structure?

	**For run home catalog when create new user. For list structure used command: ls -lart /etc/skel**
	
	![skell_dir](https7 "skell_dir")

8) How to remove a user from the system (including his mailbox)?

	**For remove a user from the system I used command:sudo userdel -r (including his mailbox) or sudo deluser --remove-home olmarch**
	
	![remove a user from the system](https8 "remove a user from the system")

9) What commands and keys should be used to lock and unlock a user account?

	**passwd -l (lock) user_name  +  passwd -u (unlock) user_name**

10) How to remove a user's password and provide him with a password-free login for subsequent password change?

	**passwd -de (d- delete password e-make password old) user_name**

11) Display the extended format of information about the directory, tell about the information columns displayed on the terminal.

	**ls -lahi**
	
	![Display the extended format of information about the directory](https9 "Display the extended format of information about the directory")

12) What access rights exist and for whom (i. e., describe the main roles)? Briefly describe the acronym for access rights.

	**Access rights **

	**r - read files and list directories, w - write in files, edit files and create new files and directories, x - execute programm**

	**xxx-yyy-zzz x-for owner,y-for group,z-for other**

	**-s - SUID run program like owner or SGID same run program like from another group  and -t - sticky-bit another users cant delete**
	
	**chmod with numbers: 7-rwx, 6-rw, 5-rx, 4-r, 0-nothing, 1-x, 2-w, 3-xw**

13) What is the sequence of defining the relationship between the file and the user?

	**Defining the relationship between the file and the user starting from determine owner rights, than groups rights and than other rights.**

14) What commands are used to change the owner of a file (directory), as well as the mode of access to the file? Give , demonstrate on the terminal.

	**chmod 744 example.txt**
	
	**chmod ugo+rwx example.txt**
	
	![examples](https10 "examples")
	
15) What is an example of octal representation of access rights? Describe the umask command.

	**umask -p - mask for new file now. UMASK its rights for new files**
	
	**rights with numbers: 7-rwx, 6-rw, 5-rx, 4-r, 0-nothing, 1-x, 2-w, 3-xw**

16) Give definitions of sticky bits and mechanism of identifier substitution. Give an example of files and directories with these attributes.

	**sticky bits use for protect files or folder from delete another users. Delete files from directories can only owner. Symbol 't' in rights**

17) What file attributes should be present in the command script?

	**Symbols «aAcCdDeijPsStTu»: only append (a), no update (A), compressed (c), no copy when write (C), no dump (d), synchroupdate (D), extendet format (e), immutable (i),** 
	
	**journaling data (j), project hierarchy (P), deteting safemode (я), synchroupdate (S), no tail (t), root directorie (T), no deleting (u),**
	
	**encryptув (E), noindex directorie (I), embedded data.**
	
	**lsattr**
