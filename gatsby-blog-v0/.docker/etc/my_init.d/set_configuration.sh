#!/bin/sh

cd /app/www
ln -s "$JOOMLA_CONFIG" configuration.php
chown -h app:app configuration.php
