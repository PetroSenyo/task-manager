# Laravel + Docker + Vite (Windows/macOS/Linux)

Цей проєкт запускає **PHP-FPM, Nginx, MySQL** у Docker. **Node/Vite** можна запускати локально (рекомендовано для Windows) або в контейнері.

---

## 1. Необхідні інструменти

### Обов'язково
- **Docker Desktop**
    - Windows: увімкнути WSL2.
    - macOS/Linux: стандартна інсталяція.
- **Git**

### Для фронтенду (Vite/Tailwind)
- **Node.js**: `>=20.19.0 <21` або `>=22.12.0`
- **npm**: `>=10`
- (Опційно) **nvm**/nvm-windows для керування версіями Node

> Якщо не хочеш ставити Node локально — можна використовувати `node` сервіс у Docker. Але на Windows це повільніше. Рекомендація: **Node локально, бек у Docker**.

---

## 2. Конфіг `.env`

У папці `src/` створіть `.env` (або скопіюйте з `.env.example`):

```env
APP_NAME="Laravel"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel
DB_PASSWORD=password

VITE_DEV_SERVER_URL=http://localhost:5173
```

---

## 3. Перша установка

Запускайте команди з кореня проєкту (де docker-compose.yml):

```bash
# 1. Зібрати образи
docker-compose build

# 2. Встановити PHP-залежності
docker-compose run --rm composer install

# 3. (Опційно) Створити новий Laravel (якщо src порожня)
docker-compose run --rm composer create-project laravel/laravel .

# 4. Підняти сервіси
docker-compose up -d

# 5. Згенерувати ключ Laravel
docker-compose run --rm artisan key:generate

# 6. Прогнати міграції
docker-compose run --rm artisan migrate
```

---

## 4. Запуск Vite (локально)

```bash
cd src
npm install
npm run dev
```

**Доступ:**
- Laravel: http://localhost:8000
- Vite Dev Server: http://localhost:5173

---

## 5. Щоденна розробка

```bash
# Підняти бекенд
docker-compose up -d

# Запустити Vite (локально)
cd src && npm run dev

# Зупинити сервіси
docker-compose down
```

---

## 6. Опис команд

```bash
docker-compose build                                      # збірка образів
docker-compose run --rm composer install                 # встановлення PHP-залежностей
docker-compose run --rm composer create-project laravel/laravel .  # новий Laravel
docker-compose up -d                                      # підняти всі сервіси
npm install                                               # встановити JS-залежності
npm run dev                                               # запустити Vite Dev Server
docker-compose run --rm artisan migrate                  # міграції бази
docker-compose down                                       # зупинити сервіси
```

---

## 7. Рекомендований vite.config.js

```js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.scss', 'resources/js/app.js'],
      refresh: [
        'resources/views/**/*.blade.php',
        'resources/js/**/*.js',
        'resources/css/**/*.{css,scss}',
        'routes/**/*.php',
        'app/**/*.php',
      ],
    }),
    tailwindcss(),
  ],
  server: {
    host: true,
    port: 5173,
    strictPort: true,
    cors: true,
    origin: 'http://localhost:5173',
    hmr: { host: 'localhost', port: 5173, protocol: 'ws', clientPort: 5173 },
    watch: {
      usePolling: true,
      interval: 200,
    },
  },
});
```

---

## 8. Artisan через Docker

```bash
docker-compose run --rm artisan key:generate
docker-compose run --rm artisan migrate
docker-compose run --rm artisan migrate:fresh --seed
docker-compose run --rm artisan storage:link
docker-compose run --rm artisan cache:clear
docker-compose run --rm artisan route:clear
docker-compose run --rm artisan config:clear
docker-compose run --rm artisan view:clear
docker-compose run --rm artisan optimize:clear
```

---

## 9. Продакшн-збірка фронту

```bash
cd src
npm ci
npm run build
```

---

## 10. Типові проблеми

- **Node версії**: Vite 7 вимагає `^20.19.0 || >=22.12.0`
- **0.0.0.0 у HTML**: встановіть `VITE_DEV_SERVER_URL=http://localhost:5173` і оновіть кеш (`artisan optimize:clear`)
- **Не працює автооновлення**: додайте `CHOKIDAR_USEPOLLING=true` і `usePolling: true` у Vite

---

## 11. Версії

- **PHP**: 8.2/8.3
- **Composer**: 2.x
- **Node**: 20.19.x або 22.12.x
- **Vite**: 7.x
- **MySQL**: 8.x
- **Docker Desktop**: остання стабільна