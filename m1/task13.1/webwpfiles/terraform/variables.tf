variable "region" {
	description = "Please Enter AWS Region to your deploy"
	type = string
	default = "eu-central-1"
}

variable "instance_type" {
	description = "Enter Instance Type"
	type = string
	default = "t2.micro"
}

variable "key_name" {
	description = "Enter Key name"
	type = string
	default = "ubuntuaws_jenkins"

}
