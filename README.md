# XCOOP

## Entrevista Técnica con PHP (Laravel 9)

###### Instalación
1. Descargar de GIT el proyecto
2. Crear una BD MySQL **xccop**
3. Abrir el archivo .env y verificar los datos de conexión a la BD
4. En la consola de comando, ir al directorio del proyecto y ejecutar: **composer update**
5. Ejecutar: **php artisan migrate**
6. Ejecutar: **php artisan db:seed**
7. Ejecutar: **php artisan serve**

###### API
- URL: http://127.0.0.1:8000/api/cliente/{id}<br>
Parámetros: id = [int]<br>
Método: GET<br>
Descripción: Busca un Cliente por su ID de Código.<br><br>

- URL: http://127.0.0.1:8000/api/cliente/registrar<br>
Parámetros: [json]<br>
Método: POST<br>
Descripción: Agrega un Nuevo Cliente.<br>
Ejemplo: {
    "nombre":"Juan Pérez",
    "email":"jperez@gmail.com"
}<br><br>

- URL: http://127.0.0.1:8000/api/cliente/{id}<br>
Parámetros: id = [integer] / [json]<br>
Método: PUT<br>
Descripción: Actualiza los datos de un Cliente por su ID de Código.<br>
Ejemplo: {
    "nombre":"John Perez",
    "email":"johnperez@gmail.com",
    "activo":"0"
}<br><br>

- URL: http://127.0.0.1:8000/api/cliente/{id}<br>
Parámetros: id = [integer]<br>
Método: DELETE<br>
Descripción: Elimina un Cliente por su ID de Código.<br><br>

- URL: http://127.0.0.1:8000/api/voucher/crear<br>
Método: GET<br>
Descripción: Crea un Voucher para un Cliente, donde en cliente_id hay que especificar el ID del Cliente.<br>
Ejemplo: {
    "titulo":"Hamburguesas X 2",
    "descripcion":"Almuerzo o cena para dos personas",
    "imagen":"hamburguesas.jpg",
    "cliente_id":1
}<br><br>

- URL: http://127.0.0.1:8000/api/voucher/{codigo}<br>
Parámetros: codigo = [string]<br>
Método: GET<br>
Descripción: Buscar un Voucher por su código.<br><br>

- URL: http://127.0.0.1:8000/api/vouchers/{id}<br>
Parámetros: id = [integer]<br>
Método: GET<br>
Descripción: Busca los Vouchers (activos) pertenecientes a un Código de Cliente.<br><br>