# Configuring DHCP, DNS servers and dynamic routing using OSPF protocol

1. Use already created internal-network for three VMs (VM1-VM3). VM1 has NAT and internal, VM2, VM3 – internal only interfaces.

****

![three VMs](https1 "three VMs")

2. Install and configure DHCP server on VM1.(3 ways: using VBoxManage, DNSMASQ and ISC-DHSPSERVER). You should use at least 2 of them.

**DNSMASQ**

**sudo apt install net-tools + sudo systemctl disable systemd-resolved + sudo systemctl mask systemd-resolved + sudo systemctl stop systemd-resolved for delete conflict**

**ls -lh /etc/resolv.conf  + sudo rm /etc/resolv.conf + echo "nameserver 8.8.8.8" > /etc/resolv.conf**

**sudo apt-get install dnsmasq + sudo nano /etc/dnsmasq.conf**

**(user=legion + group=legion + interface=enp0s8) + dhcp-range=192.168.1.10,192.168.1.50,12h**

** VM2 ether 08:00:27:3c:5a:d9 + dhcp-host=08:00:27:3c:5a:d9,192.168.1.10 + VM3 ether 08:00:27:5a:be:5a dhcp-host=08:00:27:5a:be:5a,192.168.1.20**

**dhcp-option=1,255.255.255.0 + dhcp-option=3,192.168.1.1 + dhcp-leasefile=/var/lib/misc/dnsmasq.leases + dhcp-option=option:dns-server,192.168.1.1 + dhcp-authoritative**

**sudo mkdir /var/lib/dnsmasq + sudo touch /var/lib/dnsmasq/dnsmasq.leases**

**sudo systemctl start dnsmasq + sudo systemctl status dnsmasq**

**sudo apt-get install iptables-persistent**

**sudo iptables -t nat -A PREROUTING -i enp0s3 -p tcp --dport 2224 -j DNAT --to-destination 192.168.1.20:22**

**sudo netfilter-persistent save**
	
**cat /etc/iptables/rules.v4**

**port=53 + listen-address=192.168.1.1 + no-hosts + domain=legion.local + address=/VM1/192.168.1.1

**sudo nano /etc/netplan/01-network-manager-all.yaml**
```
	for VM2 and VM3
	network:
  version: 2
  renderer: NetworkManager
  ethernets:
    enp0s3:
      dhcp4: yes
      dhcp6: no

	  for VM1
	  network:
  version: 2
  renderer: NetworkManager
  ethernets:
    enp0s8:
      dhcp4: no
      dhcp6: no
      addresses: [192.168.1.1/24]
      gateway4: 10.0.2.1
    enp0s3:
      dhcp4: yes
```
**sudo netplan generate**

**sudo nano /etc/sysctl.conf + uncomment net.ipv4.ip_forward=1**

**echo 1 > /proc/sys/net/ipv4/ip_forward + sudo apt install resolvconf + /etc/resolvconf/resolv.conf.d/tail nameserver 8.8.8.8 + /var/run/dnsmasq/resolv.conf IGNORE_RESOLVCONF=yes + /etc/dnsmasq.conf /etc/resolvconf/resolv.conf.d/tail**

**ISC-DHSPSERVER**

**sudo apt-get install isc-dhcp-server + sudo nano /etc/default/isc-dhcp-server + INTERFACESv4="enp0s8" + sudo nano /etc/dhcp/dhcpd.conf option domain-name "legion.lan"; option domain-name-servers ubserver.legion.lan; authoritative**
```
subnet 192.168.1.0 netmask 255.255.255.0 {
 range 192.168.1.10 192.168.1.254;
 option subnet-mask 255.255.255.0;
 option broadcast-address 192.168.1.255;
 option domain-name-servers 8.8.8.8, 8.8.4.4;
 option domain-name "workgroup";
 option routers 192.168.1.1;
 default-lease-time 7200;
 max-lease-time 480000;
 }
```

3. Check VM2 and VM3 for obtaining network addresses from DHCP server.

****

![Check VM2 and VM3 for obtaining network addresses from DHCP server](https2 "Check VM2 and VM3 for obtaining network addresses from DHCP server")

4. Using existed network for three VMs (from p.1) install and configure DNS server on VM1. (You can use DNSMASQ, BIND9 or something else).

****

![configure DNS server on VM1](https3 "configure DNS server on VM1")

5. Check VM2 and VM3 for gaining access to DNS server (naming services).

****

![Check VM2 and VM3 for gaining access to DNS server](https4 "Check VM2 and VM3 for gaining access to DNS server")

6. Using the scheme which follows, configure dynamic routing using OSPF protocol.

****

**VM1**

```
sudo apt-get update
sudo apt install quagga -y

sudo cp /usr/share/doc/quagga-core/examples/vtysh.conf.sample /etc/quagga/vtysh.conf
sudo cp /usr/share/doc/quagga-core/examples/zebra.conf.sample /etc/quagga/zebra.conf
sudo cp /usr/share/doc/quagga-core/examples/bgpd.conf.sample /etc/quagga/bgpd.conf
sudo sudo chown quagga:quagga /etc/quagga/*.conf
sudo chown quagga:quaggavty /etc/quagga/vtysh.conf
sudo chmod 640 /etc/quagga/*.conf

sudo mkdir /var/log/quagga/
sudo chown quagga:quagga /var/log/quagga/
sudo touch /var/log/zebra.log
sudo chown quagga:quagga /var/log/zebra.log

sudo nano /etc/quagga/zebra.conf

hostname VM1
password 1234567s
enable password 1234567s
log file /var/log/quagga/zebra.log
!
line vty
!

sudo touch /etc/quagga/ospfd.conf
sudo nano /etc/quagga/ospfd.conf

log file /var/log/quagga/ospfd.log
router ospf
ospf router-id 192.168.1.1
log-adjacency-changes
redistribute kernel
redistribute connected
redistribute static
network 192.168.1.0/24 area 1
!
access-list 20 permit 192.168.1.0 0.0.0.255
access-list 20 deny any
!
line vty
!

sudo service zebra start
sudo service zebra status
sudo service ospfd start
sudo service ospfd status

```

**VM2**

```
sudo apt-get update
sudo apt install quagga -y

sudo cp /usr/share/doc/quagga-core/examples/vtysh.conf.sample /etc/quagga/vtysh.conf
sudo cp /usr/share/doc/quagga-core/examples/zebra.conf.sample /etc/quagga/zebra.conf
sudo cp /usr/share/doc/quagga-core/examples/bgpd.conf.sample /etc/quagga/bgpd.conf
sudo sudo chown quagga:quagga /etc/quagga/*.conf
sudo chown quagga:quaggavty /etc/quagga/vtysh.conf
sudo chmod 640 /etc/quagga/*.conf

sudo mkdir /var/log/quagga/
sudo chown quagga:quagga /var/log/quagga/
sudo touch /var/log/zebra.log
sudo chown quagga:quagga /var/log/zebra.log

sudo nano /etc/quagga/zebra.conf

hostname VM2
password 1234567s
enable password 1234567s
log file /var/log/quagga/zebra.log
!
line vty
!

sudo touch /etc/quagga/ospfd.conf
sudo nano /etc/quagga/ospfd.conf

log file /var/log/quagga/ospfd.log
router ospf
ospf router-id 192.168.1.1
log-adjacency-changes
redistribute kernel
redistribute connected
redistribute static
network 192.168.1.0/24 area 1
!
access-list 20 permit 192.168.1.0 0.0.0.255
access-list 20 deny any
!
line vty
!

sudo service zebra start
sudo service zebra status
sudo service ospfd start
sudo service ospfd status

sudo systemctl is-enabled zebra.service
sudo systemctl is-enabled ospfd.service
if not
sudo systemctl enable zebra.service
sudo systemctl enable ospfd.service

sudo nano /etc/rc.local
chmod +x /etc/rc.local
#!/bin/sh -e
#
# rc.local
#
# This script is executed at the end of each multiuser runlevel.
# Make sure that the script will "exit 0" on success or any other
# value on error.
#
# In order to enable or disable this script just change the execution
# bits.
#
# By default this script does nothing.
sudo ip route del 169.254.0.0/16 
sudo ip route add default via 192.168.1.20 metric 1
exit 0

network:
  version: 2
  renderer: NetworkManager
  ethernets:
    enp0s3:
      dhcp4: no
      dhcp6: no
      addresses: [192.168.1.10/24]
      gateway4: 192.168.1.1
      nameservers:
        addresses: [8.8.8.8]

```

**VM3**

```
sudo apt-get update

sudo nano /etc/sysctl.conf

uncomment net.ipv4.ip_forward=1
	
sudo apt install net-tools	
		
sudo apt-get install iptables-persistent
	
sudo iptables -t nat -A POSTROUTING -o enp0s3 -j MASQUERADE
	
sudo netfilter-persistent save
	
cat /etc/iptables/rules.v4	


sudo cp /usr/share/doc/quagga-core/examples/vtysh.conf.sample /etc/quagga/vtysh.conf
sudo cp /usr/share/doc/quagga-core/examples/zebra.conf.sample /etc/quagga/zebra.conf
sudo cp /usr/share/doc/quagga-core/examples/bgpd.conf.sample /etc/quagga/bgpd.conf
sudo sudo chown quagga:quagga /etc/quagga/*.conf
sudo chown quagga:quaggavty /etc/quagga/vtysh.conf
sudo chmod 640 /etc/quagga/*.conf

sudo mkdir /var/log/quagga/
sudo chown quagga:quagga /var/log/quagga/
sudo touch /var/log/zebra.log
sudo chown quagga:quagga /var/log/zebra.log

sudo nano /etc/quagga/zebra.conf

hostname VM3
password 1234567s
enable password 1234567s
log file /var/log/quagga/zebra.log
!
line vty
!

sudo touch /etc/quagga/ospfd.conf
sudo nano /etc/quagga/ospfd.conf

log file /var/log/quagga/ospfd.log
router ospf
ospf router-id 192.168.1.20
log-adjacency-changes
redistribute kernel
redistribute connected
redistribute static
network 0.0.0.0/24 area 1
network 4.4.4.0/24 area 0.0.0.0
!
access-list 20 permit 192.168.1.0 0.0.0.255
access-list 20 permit 4.4.4.0 0.0.0.255
access-list 20 deny any
!
line vty
!

sudo service zebra start
sudo service zebra status
sudo service ospfd start
sudo service ospfd status

sudo apt-get install iptables-persistent -y

sudo iptables -t nat -A POSTROUTING -o enp0s8 -j MASQUERADE

sudo netfilter-persistent save
	
cat /etc/iptables/rules.v4

echo 1 > /proc/sys/net/ipv4/ip_forward

sysctl net.ipv4.ip_forward
sudo nano /etc/sysctl.conf

uncomment net.ipv4.ip_forward=1
sudo netplan apply

```

![Using the scheme which follows, configure dynamic routing using OSPF protocol](https4 "Using the scheme which follows, configure dynamic routing using OSPF protocol")

7. Check results

****

![Check results](https5 "Check results")



