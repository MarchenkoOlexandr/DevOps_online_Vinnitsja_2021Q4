# Networking with Linux

1. Create virtual machines connection according to figure 1

****

![Create virtual machines connection according to figure 1](https1 "Create virtual machines connection according to figure 1")
	
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
	
![Configure all network interfaces](https1 "Configure all network interfaces")

3. Check the route from VM2 to Host.

****
****

![Check the route from VM2 to Host](https1 "Check the route from VM2 to Host")

4. Check the access to the Internet, (just ping, for example, 8.8.8.8).

****
****

![Check the access to the Internet](https1 "Check the access to the Internet")

5. Determine, which resource has an IP address 8.8.8.8.

****
****

![Determine, which resource has an IP address 8.8.8.8.](https1 "Determine, which resource has an IP address 8.8.8.8.")

6. Determine, which IP address belongs to resource epam.com.

****
****

![Determine, which IP address belongs to resource epam.com](https1 "Determine, which IP address belongs to resource epam.com")

7. Determine the default gateway for your HOST and display routing table.

****
****

![Determine the default gateway for your HOST and display routing table](https1 "Determine the default gateway for your HOST and display routing table")

8. Trace the route to google.com.

****
****

![Trace the route to google.com](https1 "Trace the route to google.com")