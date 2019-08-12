# Interactive Clients - Laravel
Project intended to provide realtime information regarding Firespring Interactive Environments and the status of their accounts.

## How to install

### Prerequisites

1. [Vagrant](https://www.vagrantup.com/downloads.html)
2. [VirtualBox](https://www.virtualbox.org/wiki/Downloads)
3. (Optional) [Node/npm] Using homebrew is easiest (brew install node), otherwise (https://nodejs.org/en/download/)



### Step 1

Clone the repo.


### Step 2

Add the following entry to your `/etc/hosts` file:

`192.168.33.10 iaclients.firespringlocal.com`

[iaclients.firespringlocal.com](http://iaclients.firespringlocal.com/) will be the url used to access the local site



### Step 3

Using the terminal, access the project directory: `/ia-clients-laravel`


Run the following command:

    vagrant up


Wait for vagrant to to finish booting up. After its done, run:

    vagrant ssh


Change directory to `/var/www/`

    cd /var/www/


Copy `.env.example` and rename your copied file to `.env`

    cp .env.example .env
    
Get the Google Oauth Creds from Lastpass and update the .env file
  
    GOOGLE_CLIENT_ID=CHANGE_ME.apps.googleusercontent.com
    GOOGLE_CLIENT_SECRET=CHANGE_ME


After copying the file, run:

    composer install
 

Wait until all dependencies are installed, then run:

    php artisan key:generate



You can now visit [iaclients.firespringlocal.com](http://iaclients.firespringlocal.com/)

After installing successfully, you only need to run `vagrant up` (inside the project directory) to access [iaclients.firespringlocal.com](http://iaclients.firespringlocal.com/) from now on.

### Step 4

Locally, or via vagrant box*, run:
    
    npm install
    
*If you have issues running via vagrant box, modify Vagrantfile file, change from `:mount_options => ["dmode=777", "fmode=666"]` to `:mount_options => ["dmode=777", "fmode=777"]`
    
Then:

    npm run dev
    
To install any module dependencies and combile assets.

Then, in vagrant, run:

    php artisan migrate
    
To run any pending migrations. At this point, there is not seed/development database, so the first time you set up, you'll be starting from scratch.

