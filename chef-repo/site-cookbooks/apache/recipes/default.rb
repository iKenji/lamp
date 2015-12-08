#
# Cookbook Name:: apache
# Recipe:: default
#
# Copyright 2015, YOUR_COMPANY_NAME
#
# All rights reserved - Do Not Redistribute
#
#
#

# Apache
package "httpd" do
    action :install
end

service "httpd" do
    action [:enable, :start]
end

# conf.d
conf='wp'
template "/etc/httpd/conf.d/#{conf}.conf" do
    source "#{conf}.conf.erb"
    mode '0644'
    owner 'root'
    group 'root'
    notifies :restart, 'service[httpd]'
    variables({
        webroot: "#{node['apache']['home']}/app/wordpress"
    })
end
