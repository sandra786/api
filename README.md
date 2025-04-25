# Servicio Web: Registro e Inicio de Sesión

Este proyecto implementa una API sencilla en PHP que permite registrar usuarios y autenticar el inicio de sesión.

## Endpoints

- `POST /api/register.php`
  - Body: `{ "username": "tu_usuario", "password": "tu_contraseña" }`
- `POST /api/login.php`
  - Body: `{ "username": "tu_usuario", "password": "tu_contraseña" }`

## Cómo ejecutar en XAMPP

1. Copia la carpeta del proyecto dentro de `htdocs/` en XAMPP.
2. Inicia Apache desde el panel de XAMPP.
3. Usa Postman o Insomnia para enviar peticiones:
   - http://localhost/Sandra_Cartagena_AA5_EV01/api/register.php
   - http://localhost/Sandra_cartagena_AA5_EV01/api/login.php

## Repositorio

https://github.com/sandra786/api.git
