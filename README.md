# Backend Developer

Este reto está diseñado para verificar tu código y habilidades de resolución de problemas.
Te sugerimos usar un maximo de 5 a 6 horas en el.


### Instrucciones (linux)

#### Para iniciar el projecto

#### Step 1
copiar o renombrar el .env.example a .env
```
cp .env.example .env
```

#### Step 2 ejecutar

```
./start
```
#### Para detener el projecto
```
./down
```


## Requisitos

Catalogo de usuarios

#### Modulo de autentificación de clientes

- Cuando el cliente ingrese un email <b>incorrecto</b> debe responder un mensaje de error
- Cuando el cliente ingrese las credenciales <b>correctas</b> debe generar un token que se usara en futuras peticiones
- Cuando el cliente no exista, un nuevo cliente debe ser creado automaticamente (registro automatico) y generar un token que se usara en futuras peticiones
- Cuando se cree un cliente se le debe enviar un correo de "bienvenido"
- Cuando se cree un cliente nuevo, un supplier(tabla suppliers) es asignado automáticamente

#### Modulo de catalogo

- El cliente puede hacer búsqueda de productos usando algún criterio(busqueda por texto)
- El cliente puede listar los productos(tabla catalogs) de su proveedor y aquellos que no tengan un proveedor asignado



## Entregables

1. Usa rest para crear tu api
2. Eres libre de usar cualquier motor de base de datos de tu preferencia siempre que puedas dockerizar el proyecto
3. Usa git, puedes usar las ramas que desees y hacer cuantos commit necesites, pero deja los ultimos cambios en rama principal(main o master)
4. Eres libre de no usar esta plantilla para resolver tu reto, pero conserva este readme en tu nuevo proyecto y dockerizalo y agrega instruciones para levantarlo

## Expectativa del reto
- Domain drive design (usa los conceptos de ddd, aggregates, value objects, domain services, etc)
- Será indispensable el uso de los principios S.O.L.I.D.
- Organización de código
- Manejo de errores
- Escribe y organiza tus Test
- La limpieza y legibilidad del código será considerada.
- La eficiencia del código en cuestiones de rendimiento sumarán para esta prueba.
- Al finalizar el reto, enviar el enlace de <b>GitHub</b> de la solución a emmanuel.barturen@talently.tech
  con copia a paula.anselmo@talently.tech con título "Reto Talently Backend"


#### Nota:
El UI no es necesaria

## Resolución:

#### Prerequisitos:
* Laravel 9
* MySQL 8
* Php 8.0

#### Instalación:
* Clonar el repositorio
* Copiar el archivo .env.example a .env
* Ejecutar el comando `composer install`
* Con Docket:
    * Levantar contenedores `./vendor/bin/sail up -d`
    * Correr migraciones y seeder `./vendor/bin/sail artisan migrate:fresh --seed`
    * Generar key del proyecto `./vendor/bin/sail artisan key:generate`
    * Generar jwt key secret `./vendor/bin/sail artisan jwt:secret`
    * Correr tests `./vendor/bin/sail artisan test`
