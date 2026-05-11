
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
![Architecture Diagram](public/images/test%20challenge%20architecture.png)

## System Flow

1. Github Repository
2. Github Actions (CICD)
3. Connection to EC2 is initiated
4. Pull codes from Repository
5. Run database migration
6. Rebuilds and restart docker container
7. Application is live and updated

## Components

- Laravel App → Backend application
- Nginx → Reverse proxy / web server
- PHP-FPM → Application runtime
- MySQL → Database
- Docker Compose → Container orchestration
- AWS EC2, Security Group, Networking etc

## Tech Stack
- Laravel (PHP 8.2)
- MySQL 8
- Nginx (Alpine)
- Docker & Docker Compose
- GitHub Actions (CI/CD)
- Terraform 
- AWS (Resources and Service)

## Project Setup / Deployment STep

1. Clone Repository
* git clone https://github.com/abiola-akorede/deveops_test_challenge.git
* cd deveops_test_challenge
2. Environment Setup
Create .env
* DB_CONNECTION=mysql
* DB_HOST=mysql
* DB_PORT=3306
* DB_DATABASE=
* DB_USERNAME=
* DB_PASSWORD=
3. Run with Docker
* docker compose up -d --build
4. Run database migration
* docker exec test_challenge php artisan migrate --force
4. Access Application
http://localhost:8000

## Design Decisions
# Why Docker
* It ensures service isolation (containerization)
* It ensure environment consistency
* It provides easy deployment across locals and cloud

# Why Nginx?
* Lightweight reverse proxy
* Handles routing to PHP-FPM
* It gives product standard

# WHy EC2?
* To avoid AWS cost on ECS and EKS
* To ensure terraform automation is achieve with all the free tier of AWS

## Assumptions Made
* Application is deployed in a single instance EC2 (Upgrade to ECS or EKS is possible in the future)
* I avoided using AWS database service for cost optimization
* CICD is deployed with GitHub Actions and not Jenkins as prefered in the challenge request
* The deployment secrets are expected to be setup and used in the action secret of the repository. They are not visibly available
* The EC2 instance created with the terraform script has been destroyed to avoid cummulative charges from AWS. That is why the deployment might be showing failed in the repository. But everything was tested correctly during the project.
* THe architectural design was generated with AI due to the time span for this challenge to be submitted. But it is a design I can make with draw.io

## Limitations
* No auto-scaling
* No managed database for cost optimization

## Improvement
* Provisioning for VPC, ECS, EKS
* ECS Fargate Migration
* AWS RDS Integration
* Zero Downtime Deployment Pipeline

## Author
* Name: Ahmad Akorede
* Email: aabiola610@gmail.com 



