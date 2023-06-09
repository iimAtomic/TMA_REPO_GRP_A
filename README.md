


CESARION Application
========================

The "CESARION Application" is a reference application created to show how
to develop applications following the [Symfony Best Practices][1].

You can also learn about these practices in [the official Symfony Book][5].


MOTS DU DEV
========================
Pour lancer cette applicatiotion il faudra dans un premier temps la telecharger soit via un zip fournit par github soit avec des commandes git a savoir :
   * git init dans votre ide
   * git remove add origin ...
   * git pull origin main
   
Les commandes ci dessus sont a entré dans le terminal de votre projet ou de préférence dans un git bash
Ensuite il faudra executer la commande "composer install" pour installer toute les dependances necessaire au deployement du projet.
Enfin il faudra entrer la commande " symfony serve -d" pour lancer le projet et avoir une vue . 

Requirements
------------

  * PHP 8.1.0 or higher;
  * PDO-SQLite PHP extension enabled;
  * and the [usual Symfony application requirements][2].

Installation
------------

There are 3 different ways of installing this project depending on your needs:

**Option 1.** [Download Symfony CLI][4] and use the `symfony` binary installed
on your computer to run this command:

```bash
$ symfony new --demo my_project
```

**Option 2.** [Download Composer][6] and use the `composer` binary installed
on your computer to run these commands:

```bash
# you can create a new project based on the CESARION project...
$ composer create-project symfony/symfony-demo my_project

# ...or you can clone the code repository and install its dependencies
$ git clone https://github.com/symfony/demo.git my_project
$ cd my_project/
$ composer install
```

**Option 3.** Click the following button to deploy this project on Platform.sh,
the official Symfony PaaS, so you can try it without installing anything locally:

<p align="center">
<a href="https://console.platform.sh/projects/create-project?template=https://raw.githubusercontent.com/symfonycorp/platformsh-symfony-template-metadata/main/symfony-demo.template.yaml&utm_content=symfonycorp&utm_source=github&utm_medium=button&utm_campaign=deploy_on_platform"><img src="https://platform.sh/images/deploy/lg-blue.svg" alt="Deploy on Platform.sh" width="180px" /></a>
</p>

Usage
-----

There's no need to configure anything before running the application. There are
2 different ways of running this application depending on your needs:

**Option 1.** [Download Symfony CLI][4] and run this command:

```bash
$ cd my_project/
$ symfony serve
```

Then access the application in your browser at the given URL (<https://localhost:8000> by default).

**Option 2.** Use a web server like Nginx or Apache to run the application
(read the documentation about [configuring a web server for Symfony][3]).

On your local machine, you can run this command to use the built-in PHP web server:

```bash
$ cd my_project/
$ php -S localhost:8000 -t public/
```

Tests
-----

Execute this command to run tests:

```bash
$ cd my_project/
$ ./bin/phpunit
```

[1]: https://symfony.com/doc/current/best_practices.html
[2]: https://symfony.com/doc/current/setup.html#technical-requirements
[3]: https://symfony.com/doc/current/setup/web_server_configuration.html
[4]: https://symfony.com/download
[5]: https://symfony.com/book
[6]: https://getcomposer.org/
