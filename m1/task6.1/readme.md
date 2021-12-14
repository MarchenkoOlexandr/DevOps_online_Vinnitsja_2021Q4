# Networking with Linux

1. Create virtual machines connection according to figure 1

****

![Create virtual machines connection according to figure 1](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/0e7b6c8fd0430685d78eae5c9252ab597490bbeb/m1/task6.1/Screenshot_1.png "Create virtual machines connection according to figure 1")
	
2. VM2 has one interface (internal), VM1 has 2 interfaces (NAT and internal). Configure all network interfaces in order to make VM2 has an access to the Internet (iptables, forward, masquerade).
****
**for VM1 edit sudo nano /etc/netplan/01-network-manager-all.yaml**

```
	network:
  version: 2
  ethernets:
    enp0s8:
      dhcp4: no
      dhcp6: no
      addresses: [192.168.1.1/24]
      gateway4: 10.0.2.1
      nameservers:
        addresses: [8.8.8.8, 8.8.4.4]
    enp0s3:
      dhcp4: true
```     

**sudo netplan generate**
 
**sudo nano /etc/sysctl.conf**

**uncomment net.ipv4.ip_forward=1**
	
**sudo apt install net-tools**	
		
**sudo apt-get install iptables-persistent**
	
**sudo iptables -t nat -A POSTROUTING -o enp0s3 -j MASQUERADE**
	
**sudo netfilter-persistent save**
	
**cat /etc/iptables/rules.v4**	
	
**for VM2 edit sudo nano /etc/netplan/01-network-manager-all.yaml**
```
	network:
  version: 2
  ethernets:
    enp0s3:
      dhcp4: no
      dhcp6: no
      addresses: [192.168.1.10/24]
      gateway4: 192.168.1.1
      nameservers:
        addresses: [8.8.8.8, 8.8.4.4]
```
**sudo netplan generate**
	
**sudo apt install net-tools**
	
3. Check the route from VM2 to Host.

****

**traceroute 192.168.0.102 - it is host ip**

![Check the route from VM2 to Host](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/0e7b6c8fd0430685d78eae5c9252ab597490bbeb/m1/task6.1/Screenshot_2.png "Check the route from VM2 to Host")

4. Check the access to the Internet, (just ping, for example, 8.8.8.8).

****

![Check the access to the Internet](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/0e7b6c8fd0430685d78eae5c9252ab597490bbeb/m1/task6.1/Screenshot_3.png "Check the access to the Internet")

5. Determine, which resource has an IP address 8.8.8.8.

****

**sudo apt install whois and than whois 8.8.8.8 or resolvectl query 8.8.8.8**

![Determine, which resource has an IP address 8.8.8.8.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/0e7b6c8fd0430685d78eae5c9252ab597490bbeb/m1/task6.1/Screenshot_4.png "Determine, which resource has an IP address 8.8.8.8.")

6. Determine, which IP address belongs to resource epam.com.

****

**resolvectl query epam.com or dig epam.com**

![Determine, which IP address belongs to resource epam.com](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/0e7b6c8fd0430685d78eae5c9252ab597490bbeb/m1/task6.1/Screenshot_5.png "Determine, which IP address belongs to resource epam.com")

7. Determine the default gateway for your HOST and display routing table.

****

**My host it is a machine with Windows and i used command: route print** 

![Determine the default gateway for your HOST and display routing table](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/0e7b6c8fd0430685d78eae5c9252ab597490bbeb/m1/task6.1/Screenshot_6.png "Determine the default gateway for your HOST and display routing table")

8. Trace the route to google.com.

****

**traceroute -I google.com Explaination: when i use only traceroute most line is empry for traceroute with icmp packets i used -I**

![Trace the route to google.com](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/0e7b6c8fd0430685d78eae5c9252ab597490bbeb/m1/task6.1/Screenshot_7.png "Trace the route to google.com")