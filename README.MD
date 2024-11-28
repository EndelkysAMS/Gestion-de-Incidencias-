# Sistema de Incidencias

**Desarrollado por:** Endelkys Matos  
**Materia:** Sistemas Operativos I  
**Carrera:** Ingeniería de Computación, 7° Trimestre  
**Profesora:** Caryuly Rosales  

---

## **Descripción del Proyecto**

El **Sistema de Incidencias** es una solución desarrollada en PHP 8, con soporte de MySQL como base de datos y JQuery para mejorar la interacción del lado del cliente. Este sistema permite la gestión eficiente de incidencias, personalizable según las necesidades del usuario. Las funcionalidades incluyen:  

- Registro y seguimiento de incidencias.  
- Gestión de usuarios y permisos.  
- Operaciones CRUD sobre incidencias.  

---

## **Requisitos del Sistema**

1. **Servidor Web:** Apache/Nginx con soporte para PHP 8.  
2. **PHP:** Versión 8.0 o superior.  
3. **Base de Datos:** MySQL.  
4. **Composer:** Para la instalación de dependencias de PHPUnit.  
5. **Navegador Web:** Compatible con las tecnologías modernas de HTML5 y JQuery.  

---

## **Configuración del Proyecto**

### **Paso 1: Clonar el Repositorio**
Clona el proyecto desde su repositorio. Si el código está comprimido, extrae el contenido en el directorio de tu servidor web.  

```bash
git clone <URL_DEL_REPOSITORIO>
cd sistema-incidencias
```

### **Paso 2: Configuración de la Base de Datos**

1. **Crear Base de Datos:**  
   - Nombre de la base de datos: `incidencias`.

   Ejecuta el siguiente comando en MySQL:  

   ```sql
   CREATE DATABASE incidencias;
   ```

2. **Importar el Esquema:**  
   En el directorio raíz del proyecto, encontrarás un archivo llamado `database.sql`. Usa este archivo para importar las tablas necesarias:  

   ```bash
   mysql -u root -p incidencias < database.sql
   ```

3. **Credenciales del Usuario Administrador:**  
   - Usuario: `admin01`  
   - Contraseña: `111111`  

### **Paso 3: Configuración de PHP**

1. **Archivo de Configuración:**  
   Asegúrate de tener un archivo `.env` en el directorio raíz con los siguientes datos de configuración:  

   ```env
   DB_HOST=127.0.0.1
   DB_USER=root
   DB_PASSWORD=tu_contraseña_mysql
   DB_NAME=incidencias
   ```

2. **Instalar Dependencias de PHPUnit:**  
   Si no tienes PHPUnit instalado globalmente, utiliza Composer:  

   ```bash
   composer install
   ```

### **Paso 4: Configuración del Servidor**

- Asegúrate de que tu servidor web apunte al directorio del proyecto.  
- Configura el archivo `index.php` como punto de entrada.  
- Verifica que los módulos de PHP necesarios (como `mysqli`) estén habilitados.

---

## **Ejecutando el Proyecto**

1. Inicia tu servidor web.  
2. Accede al proyecto desde tu navegador usando la URL configurada (por ejemplo, `http://localhost/sistema-incidencias`).  
3. Inicia sesión con el usuario administrador para comenzar a usar el sistema.

---

## **Pruebas del Proyecto**

### **Ejecución de Pruebas**

1. Asegúrate de que PHPUnit esté instalado:  

   ```bash
   composer require --dev phpunit/phpunit
   ```

2. Navega a la carpeta de pruebas:  

   ```bash
   cd tests
   ```

3. Ejecuta las pruebas:  

   ```bash
   vendor/bin/phpunit --testdox
   ```

4. Los resultados detallarán el estado de cada prueba (aprobada/fallida).

---

**Nota:** Este proyecto es parte de la asignatura **Sistemas Operativos I**, diseñado para mejorar habilidades prácticas en desarrollo web y gestión de incidencias.
