# DOCUMENTACION DE LA CONFIGURACION

## Configuracion de Connection.php:
> Aqui solo debe cambiar los datos de su servidor en las variables privadas.

````js
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "api_rest";
````
---
## Configuracion de Client.php:

> Debe cambiar el nombre de la tabla en las consultas, ciertos campos y variables que dependen de su tabla.

* **Funcion getAll() [GET]:** 
    - Cambiar nombre de la tabla.
    - Cambiar los datos del arreglo que va a recibir.
        
* **Funcion getData() [GET]:**
    - Cambiar los parametros que recibe la funcion de acuerdo a lo que usted desea que reciba.
    - En caso de realizar el apartado anterior deberas editar el condicional que arma las consultas y estas mismas tambien.
    - Cambiar los nombre de la tabla.
    - Cambiar los datos del arreglo que va a recibir.

* **Funcion postData() [POST]:** 
    - Cambiar los parametros que recibe la funcion de acuerdo a lo que usted desea que reciba.
    - Cambiar el nombre de la tabla y los parametros/valores que vamos a insertar.

* **Funcion updateData() [PUT]:** 
    - (Lo primero que debemos pasar es un identificador unico para saber a que objeto va a realizar el cambio), luego cambiar los parametros que recibe la funcion de acuerdo a lo que usted desea que reciba.
    - Cambiar el nombre de la tabla y los parametros=valores que vamos a cambiar.
    ````js
    'UPDATE table_name SET name=\''.$name.'\', lastname=\''.$lastname.'\' WHERE id='.$idUrl.';';`
    ````

* **Funcion deleteData() [DELETE]:**      
    - Debe recibir un identificador unico.
    - Cambiar el nombre de la tabla y la condicion con este identificador unico para que realice el delete.
---
## Configuracion de index.php: [Casos GET, POST, PUT, DELETE]
> Si queremos que realicen todo tipo de peticiones a nuestra API.

* **Case 'GET':**
    - Cambiar los parametros de la var. global $_GET[] en caso de que pasemos otro tipo de datos.

* **Case 'POST':**
    - Cambiar los datos que pongamos en los pasarmetros del llamado de la funcion postData().
        
* **Case 'PUT':**
    - Cambiar los datos que pongamos en los pasarmetros del llamado de la funcion updateData().
    - **¡IMPORTANTE!**; debemos pasar primero el identificador unico que va a identificar el objeto al cual vamos a hacer el cambio.
        
* **case 'DELETE':**
    - Debemos pasar identificador unico que va a identificar el objeto al cual vamos a eliminar.

---
## Configuracion de index.php: [Caso GET]
> Si queremos que las personas solamente consuman los datos que tenemos en nuestra API, debemos descomentar los codigos que estan comentados en el index y comentar los que estan indicados.

---
### END-POINTS:
    
* [GET]:
    - suApiUrl/
    - suApiUrl/?endpoint = valor ( _El 'endpoint' es el nombre que pusimos en los_ $_GET['endpoint'] del index.php y el 'valor' es el dato que va a buscar dentro de la base de datos de la API_ ).
* [PUT]:
    - Cuando se haga el PUT, se debera especificar el identificador unico dentro del objeto que se esta haciendo el cambio, **NO** mediante la url.

---  
> **_En caso de tener dudas mandame un mail a lucasdanielwebdev@gmail.com_** 
---
 
        

    

