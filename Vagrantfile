# -*- mode: ruby -*-
# # vi: set ft=ruby :

$update_channel = "stable"
$vb_gui = false
$vb_memory = 1024
$vb_cpus = 1 

Vagrant.configure("2") do |config|
	# always use Vagrants insecure key
  	config.ssh.insert_key = false
  	config.vm.box = "coreos-%s" % $update_channel
  	config.vm.box_url = "http://%s.release.core-os.net/amd64-usr/current/coreos_production_vagrant.json" % $update_channel 	
  	
  	#vmware
  	["vmware_fusion", "vmware_workstation"].each do |vmware|
		config.vm.provider vmware do |v, override|
			override.vm.box_url = "http://%s.release.core-os.net/amd64-usr/current/coreos_production_vagrant_vmware_fusion.json" % $update_channel
		end

		config.vm.provider vmware do |v|
          v.gui = $vb_gui
          v.vmx['memsize'] = $vb_memory
          v.vmx['numvcpus'] = $vb_cpus
        end
	end


    #Virtualbox
  	config.vm.provider :virtualbox do |v|
	    # On VirtualBox, we don't have guest additions or a functional vboxsf
	    # in CoreOS, so tell Vagrant that so it can be smarter.
	    v.check_guest_additions = false
	    v.functional_vboxsf     = false
		
		v.gui = $vb_gui
    	v.memory = $vb_memory
    	v.cpus = $vb_cpus
	end

	# plugin conflict
	if Vagrant.has_plugin?("vagrant-vbguest") then
		config.vbguest.auto_update = false
	end

  	#host ip
  	ip = "172.12.8.150"
  	config.vm.network :private_network, ip: ip

	#enabling NFS for sharing the host machine into the coreos-vagrant VM
    config.vm.synced_folder "./wp-content", "/home/core/share", id: "core", :nfs => true,  :mount_options => ['nolock,vers=3,udp']

	config.vm.provision :shell, :privileged => false, :inline => <<-EOS
		docker run -d -e MYSQL_PASS="PASSWORD" --name db -p 3306:3306 tutum/mysql:5.5
		docker run -d --link db:db -e DB_PASS="PASSWORD" -v /home/core/share:/app/wp-content -p 80:80 tutum/wordpress-stackable
    EOS

end
