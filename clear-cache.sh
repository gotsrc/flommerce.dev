#!/bin/bash
ARTY="php artisan"

echo "Clearing the cache."
exec $ARTY cache:clear &

echo "Clearing the views cache"
exec $ARTY view:clear &

echo "Clearing the routes cache"
exec $ARTY route:clear &

echo "Refreshing the Database."
exec $ARTY migrate:refresh &

echo "Filling the database up with shit."
exec $ARTY db:seed
