data "aws_ami" "amazon_linux" {
  most_recent = true

  owners = ["amazon"]

  filter {
    name   = "name"
    values = ["al2023-ami-*-x86_64"]
  }
}

resource "aws_instance" "main" {
  ami                         = data.aws_ami.amazon_linux.id
  instance_type               = var.instance_type
  subnet_id                   = var.subnet_id
  vpc_security_group_ids      = [var.security_group_id]
  associate_public_ip_address = true
  key_name                    = var.key_name

  user_data = file("${path.module}/userdata.sh")

  tags = {
    Name = "challenge-ec2"
  }
}

resource "aws_eip" "main" {
  instance = aws_instance.main.id

  tags = {
    Name = "challenge-eip"
  }
}