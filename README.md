# Catálogo de Menus

## **REQUERIMIENTOS TECNICOS DE INSTALACIÓN**
1. PHP8 o superior
2. MariaDB
3. Composer
4. Git

## **FORMAS DE INSTALAR EL SISTEMA**

FORMA 1: SERVIDOR WEB EMBEBIDO DE PHP
1. Clonar proyecto de github `git clone https://github.com/pablohernandez1983/menu_catalog.git`
2. Colocarse en el directorio raiz de proyecto `cd /menu_catalog`
3. Correr el comando `composer dump-autoload`
4. Colocarse en el directorio publico del proyecto `cd /menu_catalog/public`
5. Iniciar el servidor web de php, con el comando `php -S localhost:9999`
6. Abrir la url http://localhost:9999/ en el navegador web

FORMA 2: SERVIDOR WEB DE XAMMP
1. Clonar proyecto de github dentro de la carpeta htdocs de xampp `git clone https://github.com/pablohernandez1983/menu_catalog.git`
2. Colocarse en el directorio raiz de proyecto `cd menu_catalog`
3. Correr el comando `composer dump-autoload`
4. Agregar un dominio virtual en xammp en el archivo C:/xampp/apache/conf/extra/httpd-vhosts.conf 
```
    <VirtualHost *:80>

    ServerAdmin root@menu.localhost
    DocumentRoot "C:/xampp/htdocs/menu_catalog/public"
    ServerName menu.localhost
	ServerAlias www.menu.localhost.com
    ErrorLog "C:/xampp/htdocs/menu_catalog/logs/messaging-error.log"
    CustomLog "C:/xampp/htdocs/menu_catalog/logs/messaging-access.log" common
	
	<Directory C:/xampp/htdocs/menu_catalog/public>
		AllowOverride All
		Order Allow,Deny
		Allow from All
		
	</Directory>
</VirtualHost>
```
    
5. Agregar el dominio virtual local en el archivo C:\Windows\System32\drivers\etc\hosts `127.0.0.1 menu.localhost`   
6. Iniciar el servidor web de xampp
6. Abrir la url http://menu.localhost/ en el navegador web

## **RESTAURAR BASE DE DATOS**
1. Crear base de datos de nombre `menu_catalog`
2. restaurar la base de datos con el comando `mysql -uroot -p menu_catalog < menu_catalog.sql`

## **CONFIGURAR CONEXION A BASE DE DATOS DEL SISTEMA**
1. Agregar host, usuario y password en el archivo `\menu_catalog\src\Services\DatabaseService.php`
```php
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db_name = 'menu_catalog';
    private $port = 3306;
``` 