# TASK5.3

## Part1

1. How many states could has a process in Linux?

	**In Linux if process exist, his possible states next:**

	**+R running or runnable **
	
	**+D uninterruptible sleep (usually IO)**
	
	**+S interruptible sleep (waiting for an event to complete)**
	
	**+Z defunct/zombie, terminated but not reaped by its parent**
	
	**+T stopped, either by a job control signal or because it is being traced**
	
	**For see process in Linus usualLy used next command: ps, top, htop.
	
2. Examine the pstree command. Make output (highlight) the chain (ancestors) of the current process.

	**For output (highlight) the chain (ancestors) of the current process I used command: pstree -hp (p - for output PID)**

	![For output (highlight) the chain (ancestors) of the current process I used command: pstree -hp](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/7901fe41aa1082a052d1743843b7918215edfba2/m1/task5.3/Screenshot_1.png "For output (highlight) the chain (ancestors) of the current process I used command: pstree -hp")

3. What is a proc file system?

	**Proc it is a virtual file system. In this system we can see all info about system (process, cpu, memory etc). The proc file system also provides communication medium between kernel space and user space.**
	
	**/proc/cpuinfo - info about cpu, /proc/meminfo - memory, /proc/mounts - list mounted file system, /proc/devices - list devices, /proc/filesystems - list filesystem which we can use, /proc/modules and /proc/version, /proc/cmdline**
	
4. Print information about the processor (its type, supported technologies, etc.).

	**cat /proc/cpuinfo**

	![cpuinfo](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/7901fe41aa1082a052d1743843b7918215edfba2/m1/task5.3/Screenshot_2.png "cpuinfo")

5. Use the ps command to get information about the process. The information should be as follows: the owner of the process, the arguments with which the process was launched for execution, the group owner of this process, etc.

	**ps -o user,args,group,pid,pcpu,pmem,comm,cputime,gid,lwp,rss,start,vsize,priority.  For seeing all arguments used command: ps L**

	![Use the ps command to get information about the process](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/7901fe41aa1082a052d1743843b7918215edfba2/m1/task5.3/Screenshot_3.png "Use the ps command to get information about the process")

6. How to define kernel processes and user processes?

	**All kernel process in Linux from parents kthread, with PID=2**
	
	**for seeing kernel process used sudo ps --ppid=2 --pid=2 or sudo pstree 2**

	**for seeing user process used sudo ps -N --ppid=2 --pid=2 or sudo pstree**

7. Print the list of processes to the terminal. Briefly describe the statuses of the processes. What condition are they in, or can they be arriving in?

	**I used command ps -eo user,pid,ppid,args,s | head  if not enough information we can used command: ps axu**
	
	**In Linux if process exist, his possible states next:**

	**+R running or runnable **
	
	**+D uninterruptible sleep (usually IO)**
	
	**+S interruptible sleep (waiting for an event to complete)**
	
	**+Z defunct/zombie, terminated but not reaped by its parent**
	
	**+T stopped, either by a job control signal or because it is being traced**
	
	**+I Idle kernel thread**
	
	**+t stopped by debugger during the tracing**
	
	**X dead (should never be seen)**
	
	![Briefly describe the statuses of the processes](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/7901fe41aa1082a052d1743843b7918215edfba2/m1/task5.3/Screenshot_4.png "Briefly describe the statuses of the processes")

8. Display only the processes of a specific user.

	**ps -u whoopsie or ps -u whoopsie -o user,pid,ppid,args,s**

	![Display only the processes of a specific user](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/7901fe41aa1082a052d1743843b7918215edfba2/m1/task5.3/Screenshot_5.png "Display only the processes of a specific user")

9. What utilities can be used to analyze existing running tasks (by analyzing the help for the ps command)?

	**pgrep, pstree, top, proc**

	![utilities can be used to analyze existing running tasks](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/7901fe41aa1082a052d1743843b7918215edfba2/m1/task5.3/Screenshot_6.png "utilities can be used to analyze existing running tasks")

10. What information does top command display?

	![information does top command display](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/7901fe41aa1082a052d1743843b7918215edfba2/m1/task5.3/Screenshot_7.png "information does top command display")
	
	**for seeing info about information does top command display enter F**

	![information does top command display](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/7901fe41aa1082a052d1743843b7918215edfba2/m1/task5.3/Screenshot_8.png "information does top command display")
	
	** PID     = Process Id**
	
	** USER    = Effective User Name**
	
	** PR      = Priority**
	
	** NI      = Nice Value**
	
	** VIRT    = Virtual Image (KiB)**
	
	** RES     = Resident Size (KiB)**
	
	** SHR     = Shared Memory (KiB)**  
	
	** S       = Process Status** 
	
	** %CPU    = CPU Usage**
	
	** %MEM    = Memory Usage (RES)**
	
	** TIME+   = CPU Time, hundredths**  
	
	** COMMAND = Command Name/Line**

12. Display the processes of the specific user using the top command.

	**top -u legion(user_name)**

	![Display the processes of the specific user using the top command](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/7901fe41aa1082a052d1743843b7918215edfba2/m1/task5.3/Screenshot_9.png "Display the processes of the specific user using the top command")

12. What interactive commands can be used to control the top command? Give a couple of examples.

	**z - in color		n - set task number**
	
	**k - kill process		A - 4 windows**

	**esc - update		r - change priority**
	
	**u - filter by user**

13. Sort the contents of the processes window using various parameters (for example, the amount of processor time taken up, etc.)

	**run top and shift-n sort by pid, shift-m sort by %memory, shift-t sort time work process**

	![Sort the contents of the processes window using various parameters](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/7901fe41aa1082a052d1743843b7918215edfba2/m1/task5.3/Screenshot_10.png "Sort the contents of the processes window using various parameters")

14. Concept of priority, what commands are used to set priority?

	**Priority its mean how much resource (cpu, mem, etc) will be given for process. In linux each process can have priority from -20 to +19. Max priority small number.**
	
	**run process with min priority nice -n 19 process_name**
	
	**run process with max priority nice -n -20 process_name**
	
	**renice for change priority for existing process. (renice -newnumberpriority -p idprocess)**

15. Can I change the priority of a process using the top command? If so, how?

	**I can change the priority of a process using the top command with r, then enter PID and new priority.**
	
	![I can change the priority of a process using the top command with r](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/7901fe41aa1082a052d1743843b7918215edfba2/m1/task5.3/Screenshot_11.png "I can change the priority of a process using the top command with r")

16. Examine the kill command. How to send with the kill command process control signal? Give an example of commonly used signals.

	**sudo kill**
	
	**killall -u username,  kill -3 PID quit process, killall name_process**
	
	**SIGTERM - kill process default, SIGKILL - kill process immediately, SIGSTOP - pause, SIGCONT - continue, xkill - grafkill **

	![list killsignals kill L](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/7901fe41aa1082a052d1743843b7918215edfba2/m1/task5.3/Screenshot_12.png "list killsignals kill L")
	

17. Commands jobs, fg, bg, nohup. What are they for? Use the sleep, yes command to demonstrate the process control mechanism with fg, bg. 

	**jobs -To display the status of jobs in the current shell**
	
	**fg - change process in foreground**
	
	**bg - change process in background**
	
	**nohup - no hang up Process will be working when user out of session**
	
	![Use the sleep, yes command to demonstrate the process control mechanism with fg, bg](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/7901fe41aa1082a052d1743843b7918215edfba2/m1/task5.3/Screenshot_13.png "Use the sleep, yes command to demonstrate the process control mechanism with fg, bg")

## Part2

1. Check the implementability of the most frequently used OPENSSH commands in the MS Windows operating system. (Description of the expected result of the commands + screenshots: command – result should be presented)

	**ssh user@host - connect to remote host**
	
	**Open VM Linux enter in terminal ifconfig, inet 10.0.2.15  netmask 255.255.255.0  broadcast 10.0.2.255.  Open Virtualbox NAT Network Port forwarding Add. name ssh, host port 2222, guest port 22, guest ip 10.0.2.15**
	
	**In VM Linux sudo apt install openssh-server, In Windows ssh legion@localhost -p 2222**
	
	**ssh-keygen -t keytype - generated key for authentication. I used only ssh-keygen in screenshot**

	![screenshots: command – result](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/7901fe41aa1082a052d1743843b7918215edfba2/m1/task5.3/Screenshot_14.png "screenshots: command – result")
	
	![screenshots: command – result](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/7901fe41aa1082a052d1743843b7918215edfba2/m1/task5.3/Screenshot_15.png "screenshots: command – result")
		
2. Implement basic SSH settings to increase the security of the client-server connection (at least

	**Command: systemctl status ssh.service or sshd.service than nano /etc/ssh/sshd_config**
	
	**Basic SSH settings includ next steps:**
	
	**1. Strong Usernames and Passwords**
	
	**2. Configure Idle Timeout Interval - #ClientAliveInterval 360 ClientAliveCountMax 0**
	
	**3. Disable Empty Passwords - #PermitEmptyPasswords no**
	
	**4. Limit Users’ SSH Access - #AllowUsers user1 user2**
	
	**5. Disable Root Logins - #PermitRootLogin no**
	
	**6. Only Use SSH Protocol 2 - #Protocol 2**
	
	**7. Use Another Port - #Port 22**
	
	**8. Use Public/Private Keys for Authentication**
	
	**9. Limit authentication tries - MaxAuthTries 3**
	
	**10. X11Forwarding no**
	
	**sudo sshd -t for testing**

3. List the options for choosing keys for encryption in SSH. Implement 3 of them.

	**dsa ecdsa ecdsa-ck ed25519 ed25519-ck rsa **
	
	![dsa ecdsa ed25519 rsa](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/7901fe41aa1082a052d1743843b7918215edfba2/m1/task5.3/Screenshot_16.png "dsa ecdsa ed25519 rsa")
	
	**ssh-keygen -t type_key (ssh-keygen -t rsa ssh-keygen -t dsa ssh-keygen -t ecdsa**

	![ssh-keygen -t type_key](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/7901fe41aa1082a052d1743843b7918215edfba2/m1/task5.3/Screenshot_17.png "ssh-keygen -t type_key")

4. Implement port forwarding for the SSH client from the host machine to the guest Linux virtual machine behind NAT.

	**Open VM Linux enter in terminal ifconfig, inet 10.0.2.15  netmask 255.255.255.0  broadcast 10.0.2.255.  Open Virtualbox NAT Network Port forwarding Add. name ssh, host port 2222, guest port 22, guest ip 10.0.2.15**
	
	**In VM Linux sudo apt install openssh-server, In Windows ssh legion@localhost -p 2222**
	
	![Implement port forwarding for the SSH client from the host machine to the guest Linux virtual machine behind NAT](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/7901fe41aa1082a052d1743843b7918215edfba2/m1/task5.3/Screenshot_18.png "Implement port forwarding for the SSH client from the host machine to the guest Linux virtual machine behind NAT")

5*. Intercept (capture) traffic (tcpdump, wireshark) while authorizing the remote client on the server using ssh, telnet, rlogin. Analyze the result.

	**for use warshark first: sudo apt install wireshark than sudo usermod -aG wireshark $USER, sudo wireshark**

	![Analyze the result](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/7901fe41aa1082a052d1743843b7918215edfba2/m1/task5.3/Screenshot_19.png "Analyze the result")
	
	**if use tcpdump next command: sudo tcpdump -vv -i any -nn port 23 -w dump23.pcap and sudo tcpdump -vv -i any -nn port 22 -w dump22.pcap**
	
	**ssh all encrypted pakets, telnet not encrypted**