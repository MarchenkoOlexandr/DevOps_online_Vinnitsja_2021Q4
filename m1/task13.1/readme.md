

![About me](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/0e8290e09a77830c41801558567da4d2f39520df/m1/task13.1/Screenshot_1.png)

![Step of my project](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/0e8290e09a77830c41801558567da4d2f39520df/m1/task13.1/Screenshot_2.png)

![Structure of project](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/0e8290e09a77830c41801558567da4d2f39520df/m1/task13.1/Screenshot_3.png)

![Explanation](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/0e8290e09a77830c41801558567da4d2f39520df/m1/task13.1/Screenshot_4.png)

![Creation VM](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/0e8290e09a77830c41801558567da4d2f39520df/m1/task13.1/Screenshot_5.png)

![Creation EC2 on AWS with Jenkins](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/0e8290e09a77830c41801558567da4d2f39520df/m1/task13.1/Screenshot_6.png)

![Creation EC2 on AWS with Jenkins](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/0e8290e09a77830c41801558567da4d2f39520df/m1/task13.1/Screenshot_7.png)

![Simple pipeline on Jenkins](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/0e8290e09a77830c41801558567da4d2f39520df/m1/task13.1/Screenshot_8.png)

![Simple pipeline on Jenkins](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/0e8290e09a77830c41801558567da4d2f39520df/m1/task13.1/Screenshot_9.png)

![Increasing the level of complexity](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/0e8290e09a77830c41801558567da4d2f39520df/m1/task13.1/Screenshot_10.png)

![Result project 1](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/0e8290e09a77830c41801558567da4d2f39520df/m1/task13.1/Screenshot_11.png)

![PS Project 2](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/0e8290e09a77830c41801558567da4d2f39520df/m1/task13.1/Screenshot_12.png)


***Vagrant + Virtualbox***

```
1. in my Windows I install virtualbox and vagrant
https://www.virtualbox.org/
https://www.vagrantup.com/  chek Path bin
then create vagranfile for install virtual machine with terraform
in CLI Windows (cd mkdir .. d:)
vagrant --version
vagrant init
create my own vagrant box
vagrant package --base 'vagrant' --output vagrantbox
vagrant box add vagrantbox --name 'vagrantbox'
edit Vagrantfile:
then
vagrant up
if exit
vagrant halt
vagrant destroy
vagrant box remove vagrantbox
for connect with VM from Windows CLI
vagrant ssh-config
ssh vagrant@127.0.0.1 -p 2222 -i ...
org/vagrant ssh default\
D:\Program Files\VirtualBox\Vagrant>
```

***for instal Jenkins, Terraform, Java, Python  I used***
```
sudo apt-get update -y
sudo apt-get upgrade -y
sudo apt install openjdk-11-jdk -y
sudo wget -q -O - https://pkg.jenkins.io/debian-stable/jenkins.io.key | sudo apt-key add -
sudo apt-get update -y
sudo apt-get install jenkins -y
service jenkins status
http://10.0.2.15:8080/
sudo cat /var/lib/jenkins/secrets/initialAdminPassword
insert password
http://10.0.2.15:8080/

sudo service jenkins restart
chek port 22
sudo apt update
sudo systemctl status ssh
apt-get install git
ssh-keygen -t rsa
webhook for repozitory
git@github.com:MarchenkoOlexandr/OSBBbot.git
*/master delete

cat /var/lib/jenkins/secrets/initialAdminPassword
curl -O http://127.0.0.1:8080/jnlpJars/jenkins-cli.jar && pswd=`sudo cat /var/lib/jenkins/secrets/initialAdminPassword` && echo 'jenkins.model.Jenkins.instance.securityRealm.createAccount("login", "password")' | sudo java -jar jenkins-cli.jar -auth admin:$pswd -s http://127.0.0.1:8080/ groovy =

for python scrypt
chmod ugo+x osbbslovjanskijbot.py
./osbbslovjanskijbot.py
sudo apt install python3-pip
pip install pyTelegramBotAPI

```

```
terraform

sudo apt install curl

from https://www.terraform.io/downloads

curl -fsSL https://apt.releases.hashicorp.com/gpg | sudo apt-key add -

sudo apt-add-repository "deb [arch=amd64] https://apt.releases.hashicorp.com $(lsb_release -cs) main"

sudo apt-get update && sudo apt-get install terraform

sudo apt install openssh-server -y

sudo nano /etc/ssh/sshd_config

#for terraform in my projekt_folder

save projekt_file.tf
export AWS_ACCESS_KEY_ID=	
export AWS_SECRET_ACCESS_KEY=
terraform init
terraform plan
terraform apply

#delete all
terraform destroy

install docker
sudo apt update
sudo apt install apt-transport-https ca-certificates curl software-properties-common -y
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
sudo apt update
sudo apt install docker-ce -y
sudo systemctl start docker
sudo systemctl enable docker
#sudo systemctl status docker
sudo usermod -aG docker $USER

#for delete image $docker rmi name_image

git commit -am "Comment"

https://plugins.jenkins.io/ssh-agent/

sudo apt install python3-pip -y

chmod ugo+x ????????_??????????????

@OSBBSlovjanskijbot

tar -xvf /home/ubuntu/artefact.tar -C /var/lib/jenkins/workspace/DeployonAWS

jenkins    ALL = NOPASSWD: /path/to/script
```


