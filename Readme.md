# DaSh - Yet Another WordPress Skeleton Environment

DaSh is an open source [WordPress](https://wordpress.org/) boilerplate configuration inspired by [these](https://deliciousbrains.com/install-wordpress-subdirectory-composer-git-submodule/) [two](https://deliciousbrains.com/wordpress-deployment-workflow-git/) articles posted a while ago on the Delicious Brains blog, and of course by Mark Jaquith's [post](https://markjaquith.wordpress.com/2012/05/26/wordpress-skeleton/) on how to make your own starter kit. Used in conjunction with our [Graduate Vagrant](https://gitlab.com/gccomms/vagrant) development environment, it enables you to deploy a new WordPress-based site in minutes. Test new features, code new cool plugins and themes, all without having to worry about the tedious prep steps.

This project is proudly maintained by the Office of Communications and Marketing at [The Graduate Center, CUNY](https://www.gc.cuny.edu/) and released under the [MIT License](LICENSE).

## Minimum System Requirements

Please refer to the [WordPress minimum requirements page](https://wordpress.org/about/requirements/) for more information on what software you will need. In order to make your life easier, you may want to consider installing [WP-CLI](https://wp-cli.org/) on your computer.

## Installing DaSh

We recommend using Git as it makes updating much easier. Simply clone the main repo into your web document root:

`git clone -b master https://gitlab.com/gccomms/wordpress.git /var/www/html/`

Once the repo has been cloned, enter the directory with `cd /var/www/html/` and init the submodules:

`git submodule update --init --recursive; git submodule foreach git checkout master`

Be patient as the magic happens. This *will* take a while on the first run as Git downloads the required files. When the installation is complete, make sure you're using the desired WordPress version by choosing the appropriate branch:

`cd /var/www/html/wp; git checkout tags/5.0.3 -b 5.0.3`

Now you can go back to the main document root folder and copy the sample configuration file and enter your database credentials and other custom settings:

`cp /var/www/html/config-sample.php /var/www/html/config.php`

If you installed WP-CLI, initialize WordPress via command line (by changing the values based on your local setup):

`wp core install --url=https://newsite.local/ --title=NewSite --admin_user=admin --admin_email=wordpress@mail.local --admin_password=password`

Otherwise, point your browser to the URL you use to access your local site, and follow the steps to configure WordPress that way.

You will then need to fix the admin URL in the database:

`export MYSQL_PWD=YOUR_DB_PASSWORD; mysql -uYOUR_DB_USER -D YOUR_DB -e "UPDATE wp_options SET option_value='https://newsite.local/wp' WHERE option_name = 'siteurl'"; export MYSQL_PWD=`

And finally, install a WordPress theme:

`wp theme install twentyseventeen`

## Basic Usage

* To access the admin, please remember to add `/wp/` to your URLs, i.e. https://newsite.local/wp/wp-login.php.
* You can add constants and other custom settings to `config.php`. **DO NOT** edit wp-config.php, which just contains generic settings to make WP aware of the modified folder structure.
* Plugins and themes will be installed in `/var/www/html/content/` and not in `/var/www/html/wp/wp-content/`. This way the WP repo is fully independent from your dev environment.

## Folder Structure

* `.gitignore`
* `.gitmodules`
* `config.php` defines the database credentials and other custom settings (and is not tracked in Git).
* `content` is a replacement for the built-in wp-content folder, and it contains plugins, themes and uploads.
	* `plugins` we recommend installing plugins and themes via Git, by cloning the corresponding repos, not via the WordPress admin or WP-CLI.
	* `themes`
	* `uploads` not tracked in Git.
* `index.php`
* `wp` contains WordPress as a Git submodule. 
* `wp-config.php` has been modified to make WordPress aware of our custom folder structure, and it does NOT contain database credentials or other custom settings.

## Adding Dependencies

Our basic configuration is very lean and simple, and it only includes WordPress and GradPress as a submodule, to give you an idea of how to add dependencies and submodules, as described in [this article on Delicious Brains](https://deliciousbrains.com/git-submodules-manage-wordpress-themes-and-plugins/). This will make it easier to deploy a standard enviroment that already includes all the themes and plugins your developers need to build new awesome WordPress-based websites, without having to go through the tedious task of installing those dependencies individually. In order to create your custom collection of tools, you'll need to:

1. Setup individual repositories for each dependency you would like to add to your default install.
1. Add them to your forked DaSh project. Let's say, for example, that you would like everyone to use [WP Migrate DB](https://github.com/wp-plugins/wp-migrate-db):
	1. Add it to DaSh: `cd /var/www/wp.local/html/content/plugins; git submodule add -f https://github.com/wp-plugins/wp-migrate-db.git wp-migrate-db`
	1. Push the new `.gitmodules` to your shared Git repository
	1. Ask your team to pull the new `.gitmodules` to their own sandboxed
	1. Ask your team to init the new dependency: `git submodule update --init --recursive`. This will install all the new plugins and themes for them.
1. Now, any new team members that installs DaSh from scratch, will automatically get all the dependencies as well.

Please note: GradPress is already installed as a dependency in DaSh, there is no need to clone that repository separately.

## Keeping Up To Date

Your DaSh install will hopefully serve you for many years, but in order to keep pace with new fixes and improvements, you’ll need to update it from time to time. A simple `git pull` should do just fine. We recommend not using the WP admin to update your environment, since this method might delete your Git repo files. Instead, when WordPress is installed in a subfolder as its own Git repo, updates are as easy as switching to a new Git branch:

`cd /var/www/wp.local/html/wp/; git fetch --all; git checkout tags/5.0.3 -b 5.0.3`