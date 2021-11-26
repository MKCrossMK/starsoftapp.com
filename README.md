# Start soft App

# Instruction

1. cp .env.example .env
2. docker-compose up -d --build 
3. docker-compose exec php composer update
4. docker-compose exec php php artisan key:generate
4. docker-compose exec php php artisan migrate