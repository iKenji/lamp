# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
    config.vm.box = "mycent7"
    config.vm.box_url =
        "https://f0fff3908f081cb6461b407be80daf97f07ac418.googledrive.com/host/0BwtuV7VyVTSkUG1PM3pCeDJ4dVE/centos7.box"
    config.vm.network "private_network", ip: "192.168.33.10"

    config.vm.provider "virtualbox" do |vm|
        vm.gui = false 
        vm.customize ["modifyvm", :id, "--ostype", "RedHat_64" ]
        vm.customize ["modifyvm", :id, "--memory", "1024"]
    end

    config.omnibus.chef_version = :latest
    config.vm.provision "chef_zero" do |chef|
        chef.cookbooks_path = "./chef-repo/cookbooks"
        chef.roles_path = "./chef-repo/roles"
        chef.add_role("common")
        chef.add_role("webdb")
    end
end
