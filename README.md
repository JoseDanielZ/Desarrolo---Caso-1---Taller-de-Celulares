TecniRápido – Sistema de Gestión de Taller de Reparación - Solucion Jose Zumarraga

Sistema web desarrollado con Laravel para la gestión integral de reparaciones de equipos electrónicos en el taller TecniRápido.
La aplicación digitaliza el proceso de registro y seguimiento de reparaciones, reemplazando el uso de cuadernos físicos.

Cliente:

TecniRápido – Taller de Reparación de Celulares
Usuario principal: Don Carlos (técnico principal)

Contexto del Problema:

Actualmente, el taller registra los equipos de forma manual en un cuaderno físico, lo cual genera múltiples inconvenientes:
Pérdida o deterioro del cuaderno
Registros con letra ilegible
Dificultad para conocer el estado real de una reparación
Falta de historial confiable ante reclamos
No accesible desde dispositivos móviles

Don Carlos necesita una solución digital, simple y accesible desde su celular, que le permita registrar los equipos, conocer su estado y mantener un historial seguro.

Solución Implementada:

TecniRápido es un sistema web que permite:
Registrar los equipos que ingresan al taller
Realizar seguimiento del estado de cada reparación
Gestionar información de clientes
Mantener un historial de reparaciones sin eliminar registros
Acceder al sistema desde cualquier dispositivo

Base de Datos Formato:

| Campo            | Tipo de dato                | Descripción                                    |
| ---------------- | --------------------------- | ---------------------------------------------- |
| id               | bigint (PK)                 | Identificador único de la reparación           |
| tipo_equipo      | character varying (255)     | Tipo de equipo (celular, tablet, laptop, etc.) |
| marca            | character varying (255)     | Marca del equipo                               |
| modelo           | character varying (255)     | Modelo del equipo                              |
| problema         | text                        | Descripción del problema reportado             |
| nombre_cliente   | character varying (255)     | Nombre del cliente                             |
| telefono_cliente | character varying (255)     | Teléfono de contacto del cliente               |
| estado           | character varying (255)     | Estado actual de la reparación                 |
| fecha_ingreso    | timestamp without time zone | Fecha y hora de ingreso del equipo             |
| fecha_entrega    | date                        | Fecha estimada o real de entrega               |
| costo            | numeric (10,2)              | Costo de la reparación                         |
| observaciones    | text                        | Observaciones técnicas del técnico             |
| created_at       | timestamp without time zone | Fecha de creación del registro                 |
| updated_at       | timestamp without time zone | Fecha de última actualización                  |
| deleted_at       | timestamp without time zone | Fecha de eliminación lógica (soft delete)      |


Características Principales

Funcionalidades Generales:
CRUD completo (Crear, Leer, Actualizar y Eliminar registros)
Registro automático de la fecha de ingreso
Sistema web responsive
Validaciones en servidor
Mensajes flash para confirmación de acciones
Gestión de Reparaciones

Cada registro de reparación incluye:

Tipo de equipo:
Marca
Modelo
Descripción del problema
Fecha de ingreso automática
Estado de la reparación
Observaciones técnicas
Estados de Reparación

El sistema maneja los siguientes estados:

Pendiente de Revisión
En Revisión
En Reparación
Listo para Entregar
Sin Arreglo

Estos estados permiten un control claro y ordenado del flujo de trabajo.

Gestión de Clientes
Nombre del cliente
Teléfono de contacto
Asociación directa con los equipos ingresados
Información disponible para contacto o reclamos

Dashboard:
Total de equipos registrados
Cantidad de reparaciones por estado
Vista rápida del trabajo pendiente
Historial de Reparaciones
Los registros no se eliminan físicamente
Se mantiene un historial completo para reclamos, consultas futuras y control administrativo

Accesibilidad:
Diseño responsive
Funciona correctamente en celulares, tablets y computadoras
Ideal para uso directo desde el mostrador del taller

Tecnologías Utilizadas:
Laravel
PHP
Herd
Postgres
HTML5 y CSS3

Beneficios para el Taller:
Eliminación del registro manual en cuadernos
Información clara y legible
Control total del estado de las reparaciones
Acceso rápido desde cualquier dispositivo
Historial seguro y confiable

Caso de Uso:
“Llegan clientes, dejan sus equipos y se registra digitalmente el equipo, el problema y los datos del dueño.
El sistema guarda la fecha automáticamente, permite corregir errores y mantiene el historial para futuras consultas.”

Link del Proyecto: https://github.com/JoseDanielZ/Desarrolo---Caso-1---Taller-de-Celulares