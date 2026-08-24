# Catálogo Turístico de El Salvador — Implementación del Patrón MVC en Laravel

Aplicación web desarrollada en Laravel que demuestra la implementación del patrón arquitectónico Modelo-Vista-Controlador (MVC), el ciclo de vida de una petición HTTP y la manipulación de fuentes de datos estructuradas en formato JSON.

---

## Ciclo de Vida de una Petición y Flujo MVC

El flujo de información en la aplicación se estructura de la siguiente manera:

1. **Petición HTTP:** El usuario solicita una ruta (`GET /` para el catálogo, `GET /destinos/{id}` para el detalle, o `POST /destinos/{id}/contacto` para enviar mensajes).
2. **Enrutador (`routes/web.php`):** Mapea la URI y transfiere la ejecución al método correspondiente de `DestinationController`.
3. **Controlador (`DestinationController`):** Orquesta la lógica:
   - Solicita datos al Modelo `Destination`.
   - Ejecuta validaciones de formularios mediante `$request->validate()`.
   - Retorna la vista correspondiente inyectando los datos requeridos.
4. **Modelo (`Destination`):** Encapsula el acceso y lectura del archivo `database/data/destinos.json` usando `File::get()` y `json_decode()`, exponiendo métodos estáticos (`all()`, `find()`).
5. **Vista (`Blade`):** Renderiza la interfaz utilizando plantillas Blade modulares (`layouts/app.blade.php`, `index.blade.php`, `show.blade.php`) e interactúa con assets locales.

---

## 🚀 Requisitos e Instalación

### Requisitos
- PHP >= 8.2
- Composer
- Git

### Pasos de ejecución
1. **Clonar repositorio:**
   ```bash
   git clone [https://github.com/Mirandasv001/laravel-mvc-destinos.git](https://github.com/Mirandasv001/laravel-mvc-destinos.git)
   cd laravel-mvc-destinos
