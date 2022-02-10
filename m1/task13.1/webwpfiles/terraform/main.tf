#-------------------------------
# Project DevOps_Vinnytsja PDOV
# Create WEB for Docker with WP
# Made by Olexandr Marchenko 
#-------------------------------

terraform {
    backend "s3" {
	    bucket = "webterraform-state"
		key = "terraform.tfstate"
		region = "eu-central-1"
	}
}
provider "aws" {
    region = var.region
}

data "aws_ami" "latest_ubuntu" {
	owners = ["099720109477"]
	most_recent = true
	filter {
		name = "name"
		values = ["ubuntu/images/hvm-ssd/ubuntu-focal-20.04-amd64-server-*"]
	}
}

output "latest_ubuntu_ami_id" {
	value = data.aws_ami.latest_ubuntu.id
}

output "latest_ubuntu_ami_name" {
	value = data.aws_ami.latest_ubuntu.name
}

resource "aws_eip" "my_static_ipwp" {
    instance = aws_instance.my_Ubuntu_web.id
}

resource "aws_instance" "my_Ubuntu_web" {
	ami = data.aws_ami.latest_ubuntu.id
	instance_type = var.instance_type
	vpc_security_group_ids = [aws_security_group.Ubuntu_Web.id]
	key_name      = "ubuntuaws_jenkins"
	tags = {
		Name = "Ubuntu_Web"
		Qwner = "Marchenko"
		Project = "DevOps_Vinnytsja"
	}
	lifecycle {
	    create_before_destroy = true
	}

}
resource "aws_security_group" "Ubuntu_Web" {
	name = "Ubuntu_Webserver_Security_Group"
	description = "Ubuntu_Webserver_Security_Group"
	
	ingress {
		from_port = 80
		to_port = 80
		protocol = "tcp"
		cidr_blocks = ["0.0.0.0/0"]
	}

	ingress {
		from_port = 443
		to_port = 443
		protocol = "tcp"
		cidr_blocks = ["0.0.0.0/0"]
	}
	
	ingress {
		from_port = 22
		to_port = 22
		protocol = "tcp"
		cidr_blocks = ["0.0.0.0/0"]
	}

	ingress {
		from_port = 8081
		to_port = 8081
		protocol = "tcp"
		cidr_blocks = ["0.0.0.0/0"]
	}		
	
	ingress {
		from_port = 3306
		to_port = 3306
		protocol = "tcp"
		cidr_blocks = ["0.0.0.0/0"]
	}		
		
	egress {
		from_port = 0
		to_port = 0
		protocol = "-1"
		cidr_blocks = ["0.0.0.0/0"]	
	}
	
	tags = {
		Name = "Ubuntu_Webserver_Security_Group"
		Qwner = "Marchenko"
		Project = "DevOps_Vinnytsja"
	}
	
}
