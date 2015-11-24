#
# Cookbook Name:: mysql
# Recipe:: default
#
# Copyright 2015, YOUR_COMPANY_NAME
#
# All rights reserved - Do Not Redistribute
#
remote_file "#{Chef::Config[:file_cache_path]}/mysql-community-release-el7-5.noarch.rpm" do
      source 'http://repo.mysql.com/mysql-community-release-el7-5.noarch.rpm'
        action :create
end

rpm_package 'mysql-community-release' do
      source "#{Chef::Config[:file_cache_path]}/mysql-community-release-el7-5.noarch.rpm"
        action :install
end

package 'mysql-server' do
      action :install
end

service 'mysqld' do
      action [:enable, :start]
      supports :status => true, :restart =>true, :reload => true
end

execute "mysql-create-user" do
    command "/usr/bin/mysql -u root --password=\"#{node['mysql']['db']['rootpass']}\"  < /tmp/grants.sql"
    action :nothing
end
 
template "/tmp/grants.sql" do
    owner "root"
    group "root"
    mode "0600"
    variables(
        :user     => node['mysql']['db']['user'],
        :password => node['mysql']['db']['pass'],
        :database => node['mysql']['db']['database']
    )
    notifies :run, "execute[mysql-create-user]", :immediately
end

package "mysql-devel" do
    action :install
end
 
chef_gem "mysql" do
    action :nothing
    subscribes :install, "package[mysql-devel]", :immediately
end
 
execute "mysql-create-database" do
    command "/usr/bin/mysqladmin -u root create #{node['mysql']['db']['database']}"
    not_if do
        require 'rubygems'
        Gem.clear_paths
        require 'mysql'
        m = Mysql.new(node['mysql']['db']['host'], "root", node['mysql']['db']['rootpass'])
        m.list_dbs.include?(node['mysql']['db']['database'])
    end
end

execute "mysql-create-tables" do
    command "/usr/bin/mysql -u root #{node['mysql']['db']['database']} < /tmp/tables.sql"
    action :nothing
    only_if do
        require 'rubygems'
        Gem.clear_paths
        require 'mysql'
        m = Mysql.new(node['mysql']['db']['host'], "root", node['mysql']['db']['rootpass'])
        begin
            m.select_db(node['mysql']['db']['database'])
            m.list_tables.empty?
        rescue Mysql::Error
            return false
        end
    end
end
 
template "/tmp/tables.sql" do
    owner "root"
    group "root"
    mode "0600"
    notifies :run, "execute[mysql-create-tables]", :immediately
end
