# simple-wordpress-plugin

This is a simple wordpress plugin

<h1>Installing the plugin</h1>

> Install wordpress and the wp-cli (If you need)
>
> Clone the repository
> 
> To install a plugin you just need to put the plugin files into the wp-content/plugins directory
>
> Once a plugin is installed, you may activate it or deactivate it from the <b>Plugins</b> menu in your WP administration.

Once you have installed the plugin you would find a option for <b>Site Scripts</b> in your WP administration menu bar.

Clicking that will ask you for the scripts of header and footer of the plugin. Provide the script and update it.

Now check your wordpress website for the scripts provided you will find it.

<h1>Testing the plugin</h1>

Make sure you have phpunit installed, if you don`t then follow steps and commands given below:

> First let us ensure that we have the php composer installed. Follow the commands to install.

```console
example@example:~$ sudo apt-get update
example@example:~$ curl -sS https://getcomposer.org/installer | php
example@example:~$ sudo mv composer.phar /usr/local/bin/composer
example@example:~$ chmod +x /usr/local/bin/composer
example@example:~$ composer
```

> Then check for the version of php you have :

```console
example@example:~$ php -v
```

I have php version 7. So installing phpunit version 7 would be safe.

```console
example@example:~$ composer require --dev phpunit/phpunit ^7
```

You can also download phpunit using:

```console
example@example:~$ sudo apt-get update
example@example:~$ sudo apt-get install phpunit
```

After installing the phpunit, run the >install-wp-tests.sh from the >bin directory.

```console
bin/install-wp-tests.sh wordpress_test homestead 'secret' localhost latest
```
The above given command will create a database named "wordpress_test" for the username "homestead" and give the password as "secret" to the mysql.

<b>Tip:</b> Change the arguments based on the requirement.

After running the installation, go to the repository folder and run:

```console
example@example:~$ phpunit
```

You can now see the assertions made by the tests files of the plugins. 

The assertions are of:

> 1. A Sample test which asserts "True".
>
> 2. A shortcode of the plugin which has a string value in it.
>
> 3. The header script of the plugin
>
> 4. The footer script of the plugin. 
