# wordpress-vagrant-docker

This repository provides a template Vagrantfile to create a WordPress development environment using Vagrant and VirtualBox.

The template Vagrantfile file allows you to easily launch a single CoreOS virtual machine with two Docker containers, [mysql](https://registry.hub.docker.com/u/tutum/mysql/) & [wordpress-stackable](https://registry.hub.docker.com/u/tutum/wordpress-stackable/), built by [tutum](https://registry.hub.docker.com/repos/tutum/).

## Dependencies

- [VirtualBox](https://www.virtualbox.org/) 4.3.10 or greater
- [Vagrant](https://www.vagrantup.com/) 1.6 or greater

## How to Use

1. Install Vagrant and VirtualBox.
2. Clone the repository.
 ```
 git clone https://github.com/discardedbacon/wordpress-vagrant-docker/
 cd coreos-vagrant
 ```
3. Start up and connect to VM via SSH
```
vagrant up
vagrant ssh
```
### Host IP

To change the Local host IP address, edit the line below. 
```
config.vm.network "private_network", ip: "172.17.8.150"
```

### Shared Folder Setup

To change the shared folder setup, edit the line below.
By default, there is a set of barebones WordPress templates in ./wp-content/themes/barebones.

```
config.vm.synced_folder "./wp-content", "/home/core/share", id: "core", :nfs => true,  :mount_options => ['nolock,vers=3,udp']
```
### Provisioning

Shell scripts will run at the end of the setup process. Edit the MySQL password and port numbers to make it fit your needs.    

```
config.vm.provision :shell, :privileged => false, :inline => <<-EOS
	docker run -d -e MYSQL_PASS="PASSWORD" --name db -p 3306:3306 tutum/mysql:5.5
	docker run -d --link db:db -e DB_PASS="PASSWORD" -v /home/core/share:/app/wp-content -p 80:80 tutum/wordpress-stackable
EOS
```

### Data Maintenance and Migration Tools
The repository includes [Adminer](http://www.adminer.org/) and [Database Search and Replace Script in PHP](https://interconnectit.com/products/search-and-replace-for-wordpress-databases/)