# Stop ALL docker containers
sudo docker stop $(sudo docker ps -a -q)

# Stop single container
docker stop 8ba #(first three of container id)

# build the container (run in root joostvanderlaan.nl/ghost)
docker build -t joost/ghost .

# Start the container with console
docker run -i -h hostj -v /home/joost/joostvanderlaan.nl/ghost:/ghost -p 2368:2368 -t joost/ghost /bin/bash

# Start the webserver with supervisor
./start.sh

# Start the container without console (as daemon, webserver will start automatically)
docker run -d -h hostj -v /home/joost/orangejuizze:/var/www/vhosts/laravel -p 80:80 -t joost/orangejuizze

# Go to localhost and orangejuizze is running!


-h hostj = for setting hostname to correct environment in laravel





# ghost
docker run -i -p 2368:2368 -t joost/ghost /bin/bash



docker run -d -p 80:2368 joost/ghost

#Or when using NGINX to proxy
docker run -d -p 2368:2368 joost/ghost