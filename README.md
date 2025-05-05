# 📦 Aplicación Laravel con Docker

Este es un proyecto Laravel preconfigurado para ejecutarse fácilmente en contenedores Docker.

## 🚀 Requisitos previos

- Docker y Docker Compose instalados
- Git (opcional, para clonar el repositorio)

## ⚙️ Configuración inicial

1. Clonar el repositorio y acceder al directorio del proyecto:

```bash
git clone https://github.com/tu_usuario/laravel_app.git
cd laravel_app/
```

2. Crear y levantar los contenedores:

```bash
docker-compose down && docker-compose up -d --build
```

3. Instalar las dependencias de Composer:

```bash
docker exec -u laravel laravel-app composer update
```

4. Configurar el entorno y generar la clave de la aplicación:

```bash
docker exec -it laravel-app bash -c "cp /var/www/.env.example /var/www/.env && php artisan key:generate"
```

5. Ejecutar las migraciones:

```bash
docker exec -u laravel laravel-app php artisan migrate
```

## 🌐 Acceso a la aplicación

Una vez completada la configuración, la aplicación estará disponible en:  
👉 [http://localhost:8000](http://localhost:8000)

---

## 🛠 Configuración de la base de datos

```env
DB_CONNECTION=pgsql
DB_HOST=laravel-postgres
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=password
```

---

## 🧪 Datos de prueba

### Tabla `accounts`

```sql
INSERT INTO public.accounts (holder_name, document_number, account_type, balance, created_at) VALUES
  ('Kristell', '097051487', 'plazo fijo', 125.00, '2025-05-03 17:28:23'),
  ('Enrique', '698245126', 'plazo fijo', 300.00, '2025-05-04 18:02:26'),
  ('Karla', '15478962', 'plazo fijo', 800.00, '2025-05-05 03:50:30');
```

### Tabla `transactions`

```sql
INSERT INTO public.transactions ("type", amount, source_account_id, target_account_id, created_at) VALUES
  ('Deposito', 2800.00, NULL, 1, NULL),
  ('Retiro', 500.00, 1, NULL, NULL),
  ('Tranferencia', 5000.00, 1, 2, NULL),
  ('Deposito', 3000.00, NULL, 3, NULL),
  ('Retiro', 78000.00, 2, NULL, NULL),
  ('Tranferencia', 7500.00, 3, 2, NULL);
```

---

## 📚 Endpoints API

## 🧾 Gestión de cuentas 

### 1. Crear cuenta

- **POST** `/api/accounts`
- **Body (JSON)**:

```json
{
  "holder_name": "Kristell",
  "document_number": "22222222",
  "account_type": "plazo fijo",
  "balance": 123.00
}
```

- **Respuesta**:

```json
{
  "message": "Cuenta creada con éxito",
  "account": {
    "holder_name": "Kristell",
    "document_number": "22222222",
    "account_type": "plazo fijo",
    "balance": 123,
    "created_at": "2025-05-05T03:50:30.000000Z",
    "id": 3
  }
}
```

### 2. Consultar cuenta por ID

- **GET** `/api/accounts/1`

- **Respuesta**:

```json
{
  "message": "Cuenta encontrada",
  "account": {
    "id": 1,
    "holder_name": "Kristell",
    "document_number": "22222222",
    "account_type": "plazo fijo",
    "balance": "123.00",
    "created_at": "2025-05-03T17:28:23.000000Z"
  }
}
```

### 3. Listar todas las cuentas

- **GET** `/api/accounts`

- **Respuesta**:

```json
{
  "message": "Cuentas encontradas",
  "accounts": [
    {
      "id": 1,
      "holder_name": "Kristell",
      "document_number": "22222222",
      "account_type": "plazo fijo",
      "balance": "123.00",
      "created_at": "2025-05-03T17:28:23.000000Z"
    },
    {
      "id": 2,
      "holder_name": "Kristell",
      "document_number": "22222222",
      "account_type": "plazo fijo",
      "balance": "123.00",
      "created_at": "2025-05-04T18:02:26.000000Z"
    },
    {
      "id": 3,
      "holder_name": "Kristell",
      "document_number": "22222222",
      "account_type": "plazo fijo",
      "balance": "123.00",
      "created_at": "2025-05-05T03:50:30.000000Z"
    }
  ]
}
```

### 4. Consultar saldo disponible

- **GET** `/api/accounts/balance/1`

- **Respuesta**:

```json
{
  "message": "Saldo encontrado",
  "accounts": 123
}
```

---

## 💸 Transacciones

### 1. Depósito

- **POST** `/api/transactions/deposit`

- **Respuesta**:

```json
{
  "message": "Depositos encontrados",
  "deposits": [
    {
      "id": 1,
      "type": "Deposito",
      "amount": "2800.00",
      "source_account_id": null,
      "target_account_id": 1,
      "created_at": null
    }
  ]
}
```

### 2. Retiro

- **POST** `/api/transactions/withdraw`

- **Respuesta**:

```json
{
  "message": "Retiros encontrados",
  "withdraw": [
    {
      "id": 2,
      "type": "Retiro",
      "amount": "500.00",
      "source_account_id": 1,
      "target_account_id": null,
      "created_at": null
    }
  ]
}
```

### 3. Transferencia

- **POST** `/api/transactions/transfer`

- **Respuesta**:

```json
{
  "message": "Transferencias encontradas",
  "transfer": [
    {
      "id": 3,
      "type": "Tranferencia",
      "amount": "5000.00",
      "source_account_id": 1,
      "target_account_id": 2,
      "created_at": null
    }
  ]
}
```

### 4. Listar transacciones de una cuenta

> _Próximamente..._