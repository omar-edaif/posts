#!/bin/sh
set -e



# Enter maintenance mode
(php artisan down --message 'The app is being (quickly!) updated. Please try again in a minute.') || true
    # Update codebase
    git fetch origin master2
    git reset --hard origin/master2

    # Install dependencies based on lock file
    composer install --no-interaction --prefer-dist --optimize-autoloader

    # Migrate database
    php artisan migrate --force

    # Note: If you're using queue workers, this is the place to restart them.
    # ...

    # Clear cache
    php artisan optimize

    # Reload PHP to update opcache
    
# Exit maintenance mode
php artisan up

echo "Application deployed!"

