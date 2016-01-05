# wordpress-vagrant-docker

This repository provides a template Vagrantfile to create a WordPress development environment using Vagrant and VirtualBox.

The template Vagrantfile file allows you to easily launch a single CoreOS virtual machine with two Docker containers: [mysql](https://hub.docker.com/_/mysql/) & [wordpress](https://hub.docker.com/_/wordpress/)

## Dependencies

- [VirtualBox](https://www.virtualbox.org/) 4.3.10 or greater
- [Vagrant](https://www.vagrantup.com/) 1.6 or greater
- [Vagrant Hostmanager](https://github.com/smdahlen/vagrant-hostmanager)

## How to Use

1. Install Vagrant, Vagrant Hostmanager Plugin, and VirtualBox.
2. Clone the repository.
 ```
 git clone https://github.com/discardedbacon/wordpress-vagrant-docker.git && cd wordpress-vagrant-docker
 ```
3. Start up and connect to VM via SSH
```
vagrant up
vagrant ssh
```
### Hostname and Host IP

To change the local hostname and host IP address, edit the line below. 
```
config.vm.hostname = "vagrant.wordpress.dev"
config.vm.network "private_network", ip: "172.17.8.150"
```

### Shared Folder Setup

To change the shared folder setup, edit the line below.
By default, the latest version of WordPress will be installed in "./data/".

```
config.vm.synced_folder "./data", "/home/core/data", id: "core", :nfs => true,  :mount_options => ['nolock,vers=3,udp']
```
### Provisioning

Docker commands will be executed at the end of the setup process. Edit the MySQL password and port numbers to make it fit your needs.    

```
 config.vm.provision "docker" do |d|
    d.run "wordpressdb", image: "mysql:5.7", args: "-e MYSQL_ROOT_PASSWORD=PASSWORD -e MYSQL_DATABASE=wordpress -d"
    d.run "wordpress", image: "wordpress", args: "-e WORDPRESS_DB_PASSWORD=PASSWORD -d --name wordpress --link wordpressdb:mysql -p 80:80 -v /home/core/share:/var/www/html"
  end
```

### Data Maintenance and Migration Tools
The repository includes [Adminer](http://www.adminer.org/) and [Database Search and Replace Script in PHP](https://interconnectit.com/products/search-and-replace-for-wordpress-databases/)