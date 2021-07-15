# registro_vacunacion #
Nos enfocamos para hacer un registro de vacunacion, por que es una de las paguinas mas utilizadas por la situacion actual.
___
## Contamos con ##
> Bootstrap 5
>
>>Bootstrap es el framework más popular para el desarrollo de interfaces web con un diseño moderno, adaptadas a las pantallas de los dispositivos.
>
>Rutas Amigables con .htaccess
>
>>El archivo htaccess (acceso de hipertexto) es un archivo oculto que se utiliza para configurar funciones adicionales para sitios web alojados en el servidor web Apache. Con él, puedes reescribir la URL, proteger directorios con contraseña, habilitar la protección de enlaces directos, no permitir el acceso a direcciones IP específicas, cambiar la zona horaria de tu sitio web o alterar la página de índice predeterminada, y mucho más. 
>
>
___
### contienen 4 tablas: ###
    1. t_usuarios

|id_usuario|usuario_nombre|usuario_a_paterno|usuario_a_materno|usuario_nacimiento|usuario_sexo|usuario_curp|usuario_estado|usuario_municipio|usuario_colonia|usuario_direccion|usuario_cp|usuario_correo|usuario_pass|usuario_vacunado|
|--|--|--|--|--|--|--|--|--|--|--|--|--|--|--|
    2. t_estados
|id_estasdo|estado|
|--|--|
    3. t_municipios
|id_municipio|id_estado|estado|
|--|--|--|
    4. t_colonias
|id_colonia|id_municipio|codigo_postal|colonia|
|--|--|--|--|
___
### Lista de pendientes ###

- [x] completar tabla de estados
- [x] completar tabla de municipios.
- [] completar tabla de colonias.
- [] interfaz de doctores.
- [x] interfaz de usuarios.
- [] entregar
