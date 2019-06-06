# Interactive Clients - Laravel
Project intended to provide realtime information regarding Firespring Interactive Environments and the status of their accounts.

## How to install

### Prerequisites

1. [Vagrant](https://www.vagrantup.com/downloads.html)
2. [VirtualBox](https://www.virtualbox.org/wiki/Downloads)



### Step 1

Clone the repo.

Copy `.env.example` and rename your copied file to `.env`


### Step 2

Add the following entry to your `/etc/hosts` file:

`192.168.33.10 iaclients.test`

[iaclients.test](http://iaclients.test/) will be the url used to access the local site



### Step 3

Using the terminal, access the project directory: `/ia-clients-laravel`

Run the following command:

`vagrant up`

Wait for vagrant to to finish booting up. After its done, run:

`vagrant ssh`

Change directory to `/var/www/` and run:

 `composer install`

Wait until all dependencies are installed, then run:

 `php artisan key:generate`



You can now visit [iaclients.test](http://iaclients.test/)

After installing successfully, you only need to run `vagrant up` (inside the project directory) to access [iaclients.test](http://iaclients.test/) from now on.