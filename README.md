
## Production-Ready Laravel Deployment (DevOps Challenge)
## Overview

This project demonstrates a production-ready deployment pipeline for a Laravel application using modern DevOps practices as stated in the requirement document.

The Activities in this challenge includes the following

- Infrastructure as Code for auto-server setup and configuration
- Dockerized Laravel Application for containerization
- CICD Pipeline with GitHub Action for auto-deployment to EC2
- Nginx reverse proxy
- MySQL Database container
- Automated Deployment

This challenge is to simulate a real life product grade deployment


## Architecture Overview

## System Flow

1. Github Repository
2. Github Actions (CICD)
3. Docker Build
4. Deployment to Server (EC2-ready)
5. Nginx Reverse Proxy
6. Laravel Application (PHP-FPM)
7. MySQL Database

## Components

- Laravel App → Backend application
- Nginx → Reverse proxy / web server
- PHP-FPM → Application runtime
- MySQL → Database
- Docker Compose → Container orchestration

## Tech Stack
- Laravel (PHP 8.2)
- MySQL 8
- Nginx (Alpine)
- Docker & Docker Compose
- GitHub Actions (CI/CD)
- Terraform 
- AWS (Resources and Service)

## Project Setup

1. Clone Repository
* git clone https://github.com/abiola-akorede/deveops_test_challenge.git
* cd deveops_test_challenge

2. Environment Setup
Create .env

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=test
DB_PASSWORD=Dynamo

3. Run with Docker
docker compose up -d --build

4. Access Application
http://localhost:8000

![Architecture Diagram](public/images/test%20challenge%20architecture.png)

