#!/usr/bin/env bash


echo "install java.................................................................."
sudo apt update -y
sudo apt upgrade -y
sudo apt install openjdk-11-jdk -y
echo "install jenkins................................................................."
curl -fsSL https://pkg.jenkins.io/debian-stable/jenkins.io.key | sudo tee \/usr/share/keyrings/jenkins-keyring.asc > /dev/null
echo deb [signed-by=/usr/share/keyrings/jenkins-keyring.asc] \ https://pkg.jenkins.io/debian-stable binary/ | sudo tee \/etc/apt/sources.list.d/jenkins.list > /dev/null
sudo apt-get update -y
sudo apt-get install jenkins -y
sudo service jenkins start
sudo service jenkins status
sleep 40
echo "install password.................................................................."
curl -O http://127.0.0.1:8080/jnlpJars/jenkins-cli.jar && pswd=`sudo cat /var/lib/jenkins/secrets/initialAdminPassword` && echo 'jenkins.model.Jenkins.instance.securityRealm.createAccount("login", "password")' | sudo java -jar jenkins-cli.jar -auth admin:$pswd -s http://127.0.0.1:8080/ groovy =
sudo service jenkins restart
sudo usermod -aG jenkins $USER
sleep 40
echo "install docker.................................................................."
sudo apt update
sudo apt install apt-transport-https ca-certificates curl software-properties-common -y
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
sudo apt update
sudo apt install docker-ce -y
sudo systemctl start docker
sudo systemctl enable docker
#sudo systemctl status docker
#sudo usermod -aG docker $USER
#sudo docker pull python
#sudo docker run -d -p 80:8080 python


#echo "install docker-compose.................................................................."
#sudo curl -L "https://github.com/docker/compose/releases/download/1.29.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
#sudo chmod +x /usr/local/bin/docker-compose
#docker-compose --version
#sudo mkdir composewp
#sudo mkdir /opt/mysql
#sudo mkdir /opt/wp-content
#sudo chmod 777 /opt/wp-content # than change on  755 (sudo chmod 755 wp-content)


#or install all packet
echo "install python.................................................................."
sudo apt install python3-pip -y
sudo pip install pyTelegramBotAPI
sudo mkdir myproject
sudo chmod 777 myproject
sudo mkdir devops
sudo chmod 777 devops