# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

    config.vm.box = "ia-clients-box"
    config.vm.hostname = "ia-clients-box"
    config.vm.network "forwarded_port", guest: 80, host: 8080
    config.vm.network "forwarded_port", guest: 5432, host: 54321
    config.vm.network "private_network", ip: "192.168.33.10"
    config.vm.synced_folder ".", "/var/www", mount_options: ["dmode=755,fmode=664"]
    config.vm.synced_folder "./vendor", "/var/www/vendor", mount_options: ["dmode=777,fmode=777"]
    config.vm.synced_folder "./storage", "/var/www/storage", mount_options: ["dmode=777,fmode=777"]
    config.vm.synced_folder "./node_modules", "/var/www/node_modules", mount_options: ["dmode=777,fmode=777"]
    config.vm.synced_folder "./bootstrap/cache", "/var/www/bootstrap/cache", mount_options: ["dmode=777,fmode=777"]

    # Optional NFS. Make sure to remove other synced_folder line too
    #config.vm.synced_folder ".", "/var/www", :nfs => { :mount_options => ["dmode=777","fmode=777"] }

    config.vm.provision "initial-setup", type: "shell" do |s|
        s.inline = 'cd /var/www/; php artisan migrate:fresh --seed --database=testing';
    end

end
