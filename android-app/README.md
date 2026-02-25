# AgroFinanzas Mobile (Jetpack Compose + MVVM)

Esta carpeta contiene una base de aplicación Android para replicar en móvil parte de las vistas web de AgroFinanzas.

## Arquitectura

- **UI (Compose):** pantallas en `ui/screens`
- **ViewModel (MVVM):** estado y lógica de pantalla en `ui/viewmodel`
- **Repository:** capa de acceso a datos en `data/repository`
- **API (Retrofit):** definición de endpoints en `data/api`

## Endpoints conectados

Se consumen endpoints del backend Laravel actual:

- `POST /login`
- `GET /agro/products`
- `GET /agro/summary`

> Base URL por defecto: `http://10.0.2.2:8000/` (emulador Android apuntando al localhost de tu PC).

## Flujo implementado

1. Login en `LoginScreen`
2. Navegación a `DashboardScreen`
3. Carga de productos y resumen agro con botón de recarga

## Cómo abrir en Android Studio

1. `File > Open` y seleccionar la carpeta `android-app`.
2. Sincronizar Gradle.
3. Levantar el backend Laravel en tu máquina (`php artisan serve`).
4. Ejecutar la app en emulador o dispositivo.

## Próximos pasos recomendados

- Crear DTOs tipados para `summary` (evitar `Map<String, Any>`)
- Agregar manejo de token/sesión persistente
- Migrar a Hilt para inyección de dependencias
- Implementar casos de uso por módulo (Auth, Finanzas, Cultivos)
