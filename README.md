# Global Data Exchange 

## Summary of Project 
This project is a centralized system for the storing and sharing of data and scripts for researchers such as data scientists and students 

## Team Members 
1. Brandon Tomblinson
2. Benjamin Brown
3. Kienan DeLaney
4. Daniel Darnold
5. Chalermpon Thongmotai

## Deployment 

### Server Setup
1. Launch an Amazon Web Services EC2 instance with Amazon Linux as the operating system, the security group assigned should allow for incoming and outgoing connections on ports 80,22, and 3306
2. Connect to the instance using Amazon's instructions and the key pair that you assigned to the instance

### Installing using the script
1. Copy and paste the deployment.sh script in the deployment directory into the command line of your server and run it, the script will install all components, clone the GitHub repository, and setup the file system and database for the site
