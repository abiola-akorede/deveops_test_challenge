module "networking" {
  source = "./modules/networking"

  vpc_cidr           = var.vpc_cidr
  public_subnet_cidr = var.public_subnet_cidr
  availability_zone  = var.availability_zone
}

module "security" {
  source = "./modules/security"

  vpc_id = module.networking.vpc_id
}

module "ec2" {
  source = "./modules/ec2"

  subnet_id         = module.networking.public_subnet_id
  security_group_id = module.security.security_group_id

  instance_type = var.instance_type
  key_name      = var.key_name
}