# Prueba_Tecnica

Lo primero que se debe hacer es clonar el repositorio por medio de la terminal en una carpeta designada por el usuario (git clone "url del repositorio")

Para correr este codigo se requiere:

1) Descargar la version 7.3 de php con el xampp el cual se encuentra en el siguiente link https://www.apachefriends.org/es/download.html
2) Tener composer instalado en el sistema, ingresando en este link https://getcomposer.org/download/ y dando click en "Composer-Setup.exe" 
3) Tambien debemos tener node.js https://nodejs.org/es/download/ especificamente la version LTS
4) Bootstrap 4 debe descargarse desde el siguiente link https://getbootstrap.com/docs/4.0/getting-started/download/
5) Por ultimo se debe abrir una terminal de windows ingresar a la direccion donde esta el proyecto y alli escribir (composer create-project --prefer-dist laravel/laravel blog "5.8.*") para instalar de manera correcta laravel 5.8.



Lo segundo que se requiere son los comandos y tener corriendo en el xampp control panel las dos primeras opciones es decir APACHE Y MYSQL

Los comandos son los siguiente:
1) ingresar en la carpeta del proyecto por medio de la terminal y escribir alli "php artisan serve"
2) La base de datos esta anexada en la carpeta del proyecto (Base_Datos) lista para ser importada en "phpmyadmin" local para realizar pruebas.


Por ultimo se ingresa al navegador de preferencia y se escribe en la barra de busqueda "localhost:8000" esto nos llevara a una vista de agregar producto y de alli ya se puede empezar con las pruebas.
