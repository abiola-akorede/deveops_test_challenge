#!/bin/bash

yum update -y

yum install docker git -y

systemctl start docker
systemctl enable docker

usermod -aG docker ec2-user

curl -SL https://github.com/docker/compose/releases/latest/download/docker-compose-linux-x86_64 -o /usr/local/bin/docker-compose

chmod +x /usr/local/bin/docker-compose