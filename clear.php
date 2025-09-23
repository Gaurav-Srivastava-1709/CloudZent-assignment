<?php
exec('php artisan config:clear');
exec('php artisan cache:clear');
exec('php artisan route:clear');
exec('php artisan view:clear');
echo "Cache cleared!";
