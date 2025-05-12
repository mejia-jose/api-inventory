
# **API de Gestión de Inventario Simple con Roles**

# 1. Descripción

Es una API construida y desarrollada en **Laravel** para la gestión basica de inventarios. Permite la administración de productos, categorías y usuarios, con funcionalidades como autenticación, autorización basada en roles, crud de categorías y productos, mediante endpoints Rest Ful. Está API está diseñada de forma modular escalable.

---

# 2. Stack Tecnológico y paquetes utilizados
  - PHP versión 8.1.28
  - Composer versión 2.8.5
  - Laravel versión 10.10
  - nwidart/laravel-modules
  - tymon/jwt-auth
  - Paquetes propios de laravel
  - Base datos: MySQL o PostgreSQL
---

# 3. Repositorio en GitHub
   > [https://github.com/mejia-jose/api-inventory](https://github.com/mejia-jose/api-inventory)
--

# 4. API desplegada en Render

> [ https://api-inventory-ep2h.onrender.com/](https://api-inventory-ep2h.onrender.com/)
- Base de datos: PostgreSQL
---

# 5. Documentación generada con ApiDog
  - Descripción:
  Aquí se encuentran disponibles en línea los endpoints expuestos, permitiendo realizar pruebas y consumir cada uno de ellos. Esta documentación fue creada con el fin de brindar una guía clara sobre el uso de la API y los requisitos específicos de cada endpoint.

- Documeentación con ApiDog > [https://znnws1stkg.apidog.io/](https://znnws1stkg.apidog.io/)
- Documentación manual > [https://api-inventory-ep2h.onrender.com/] 
---

# 6. [*] Funcionalidades

- ✅ Login del usario usando JWT.
- ✅ Cierre de sesión del usuario.
- ✅ Registrar usuarios.
- ✅ Listar usuarios.
- ✅ Registrar categorías
- ✅ Listar categorías
- ✅ Actualizar categorías
- ✅ Eliminar categorías
- ✅ Obtener el detalle de una categoría
- ✅ Registrar productos
- ✅ Listar prodcutos
- ✅ Actualizar prodcutos
- ✅ Eliminar prodcutos
- ✅ Obtener el detalle de un producto
- ✅ Listar productos por categoría
- ✅ Se incluyó paginación para el listado de usuarios, categorías y productos

# 7. Enpoints de la API
  **Nota:** Los endpoints de lectura pueden ser consultados por los roles de **admin** y **user**, y los de escristura solo por el rol de **admin**

  **Auth**
    - POST: api/login
    - POST: api/logout
    - POST: api/refresh
    ---
  
   **Users**
    - GET: api/user/all
    - POST: api/register
    ---

   **Categories**
    - GET: api/categories
    - POST: api/categories
    - GET: api/categories/{id}
    - DELETE: api/products/{id}
    - PUT: api/categories/{id}
    ---

  **Products**
    - GET: api/products
    - POST: api/products
    - GET: api/products/{id}
    - DELETE: api/products/{id}
    - PUT: api/products/{id}
    - GET: api//products/category/{id}
    ---

# 8. {=} Decisiones Técnicas

# ¿Por qué Laravel?

  - Porque fue solicitado como el stack principal del proyecto.
  - Facilita el desarrollo de APIs con soporte nativo para autenticación, middleware, migraciones, colas y más.

#  ¿Por qué nwidart/laravel-modules?
 
   # Usé nwidart/laravel-modules porque:

   - Permite estructurar el proyecto de forma modular.
   - Facilita la separación de responsabilidades y lógica de negocio.
   - Mejora la escalabilidad y mantenibilidad de la API.
   - Permite una clara separación en capas (controllers, services, repositories, etc.).
   - Cada módulo cuenta con su propio repositorio y estructura independiente.
   - Se aplicó el patrón de inyección de dependencias, permitiendo un código más limpio, reutilizable y testeable.

# ¿Por qué el Patter Repository?
  - Permiten separar la lógica de acceso a datos, haciendo el código más limpio y fácil de mantener.

# ¿Por qué el inyección de dependencias (DI)?
  - Desacopla las clases, lo que significa que una clase no necesita saber cómo se crean o instancian sus dependencias

# ¿Por qué JWT (JSON Web Token)?

   - Es una solución robusta y segura para la autenticación de APIs.
   - Permite mantener sesiones sin necesidad de almacenar información en el servidor.

# ¿Por qué usar campos ENUM y no una tabla para los roles?

    - Porque los roles son valores estáticos y conocidos desde el inicio (por ejemplo: admin, user).
    - Usar un campo ENUM simplifica consultas y mejora el rendimiento al evitar joins innecesarios.
    - Reduce la complejidad de mantenimiento cuando los roles no cambian frecuentemente.
    - En caso de que se hubiera indicado que los roles serian dinámicos o configurables, se optaría por una tabla relacional.

# Middleware
  - Se creó un middleware para validar la autenticación del usuario.
  - Otro para validar los datos recibidos en la paginación, en caso de que se proporcionen.
  - Se creó un middleware para manejar la autorización de accesos. 
---

# [-_-] Módulos del proyecto
 - Auth
 - Users
 - Categories
 - Products

---

# 9. (*) Instalación local

1. Clonar el repositorio:
   ```bash o cmd
   git clone https://github.com/mejia-jose/api-inventory.git
   cd name-proyecto
   ```

2. Instalación de dependencias:
   ```bash o cmd
   composer install
   ```

3. Preparar el archivo .env para configurar el entorno del proyecto, conexión y configuración de base de datos.

4. Ejecutar migraciones:
  - php artisan module:make-migration create_users_table Users
  - php artisan module:make-migration create_categories_table Categories
  - php artisan module:make-migration create_products_table Products
   
   - Se debe ejecutar el comando:
   ```bash o cmd
   php artisan module:migrate
   ```

5. Ejecutar semillas:

    Este paso es fundamental, ya que inserta en la base de datos al primer usuario con el rol de administrador, lo que permite comenzar a gestionar los demás endpoints.
   
   - Se debe ejecutar el comando:
   ```bash o cmd
   php artisan db:seed
   ```
---

6. Generar el secret de JWT(Json Web Token)
   - Se debe ejecutar el comando:
   ```bash o cmd
   php artisan jwt:secret
   ```

7. Correr el proyecto
   - Se debe ejecutar el comando:
   ```bash o cmd
   php artisan serve
   ```
# 10. Colleción de Postman
- La colección de postman se encuentra en la raiz, en la ruta **\postman\Api-Inventory.postman_collection.json**

---

# 11.  Checklist de requisitos cumplidos

- [X] Código en un repositorio público (Github).
- [X] Se crearón todos los endpoints requeridos, aplicando las reglas de rol.
- [X] API desplegada en Render.
- [X] Calidad del código: Organización, legibilidad y buenas prácticas.
- [X] Arquitectura y patrones: Separación de capas y justificación de patrones.
- [X] Seguridad: Implementación correcta de autenticación y autorización.
- [X] Uso adecuado de migraciones, semillas y ORM.
- [X] Documentación: README completo, claro y con justificación de decisiones.
- [X] Manejo de errores: Códigos de error adecuados.
