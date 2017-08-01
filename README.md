# Programacion-Web-Practica-2
Práctica de programación Web, con HTML5, CSS3 e integración con MySQL

# Práctica Evaluable II. Adaptación de la web de la red social.
### Nieves Velásquez Díaz.

## Objetivo
El   objetivo   de   este   segundo   ejercicio   evaluable   es   poner   en   práctica   los conocimientos adquiridos de PHP y JavaScript, así como la capacidad para incorporar otros conceptos no estudiados en las clases de prácticas. El contexto será la red social que se desarrolló en la primera práctica evaluable.
## Estructura del directorio "RedSocialII"
En el directorio redsocialII se presenta la estructura que se usará durante esta práctica, en ella en el directorio raíz tenemos los ficheros
php principales, es decir los encargados de mostrar cada una de las páginas principales (index, portada, etc), los ficheros css con los estilos necesarios, y el fichero pdf con el cómo se hizo.

Además se ha modificado parte de las carpetas ya presentadas en la entrega anterior. En el caso de "img" sigue teniendo el mismo contenido, pero en el caso de "users", dado que la página de entradas se muestra de forma dinámica al igual que las correspondientes a cada usuarios se ha optado por eliminarla y crear en su lugar un fichero php llamado **detallesEntrada.php** en el que se muestra cada entrada de forma extendida asi como sus comentarios.

A su vez se han creado dos carpetas nuevas:
* **inc** que tiene los ficheros php con las clases de las tablas de la base de datos, dos ficheros con funciones auxiliares, **funciones** y **actions**, un fichero para la conexión con la base de datos, **dataset** y dos ficheros más con la cabecera y pie de página de forma que se llaman a dichos ficheros en vez de repetir ese código en cada una de las páginas.
* **js** que contiene un fichero de tipo javascript llamado "script" que tiene todas las funciones javascript usadas durante la práctica. 


## Incorporación de conceptos
A la hora de trabajar con esta práctica se han realizado varias cosas para evitar usar varias páginas similares como es el caso de:
*Páginas de los distintos usuarios: para ello hemos partido de una misma página **user.php** donde en caso de que no se haya pasado un nombre de usuario en la url, tomará el usuario que esté conectado a la sesión mostrando sus datos, (sus entradas). En caso contrario mostrará los datos del usuario seleccionado. Lo mismo ocurre para las fotos de los usuarios y su información donde dependiendo del usuario mostrará el formulario para cambiar los datos o los datos del usuario en caso de no se el propietario de la sesión.
*Páginas de las entradas de los usuarios: ocurre algo similar para el fichero **detallesEntrega.php** donde según el identificador de la entrada que se le pase en la url cargará dichos datos relacionados así como sus comentarios si los tiene.

## Notas
Se han creado tres variables de tipo sesión. Con 'loged' controlamos que el usuario haya iniciado o no sesión, con 'userSelected' almacenamos el usuario de los posibles elegido para ver sus entradas, fotos o datos, y con 'userSelectedURL' guardamos el mismo valor que antes pero con la url de forma que lo podamos añadir al enlace mediante paso de datos entre páginas de tipo GET.
