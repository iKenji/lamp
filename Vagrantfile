# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
    config.vm.box = "mycent7"
    config.vm.box = "bento/centos-7.1"
    
    config.vm.network "forwarded_port", guest: 80,  host:8080
    config.vm.network "forwarded_port", guest: 443,  host:8443
    config.vm.provider "virtualbox" do |vm|
        vm.gui = false 
        vm.customize ["modifyvm", :id, "--ostype", "RedHat_64" ]
        vm.customize ["modifyvm", :id, "--memory", "1024"]
    end
    config.omnibus.chef_version = '12'
    config.vm.provision "chef_zero" do |chef|
        chef.nodes_path = "./chef-repo/nodes"
        chef.cookbooks_path = "./chef-repo/cookbooks"
        chef.roles_path = "./chef-repo/roles"
        chef.add_role("common")
        chef.add_role("webdb")
        
        chef.json = {
          mysql: {
            server_root_password: 'rootpass'
          }
        }
    end
end
