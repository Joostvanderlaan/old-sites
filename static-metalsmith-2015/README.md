## Install Prerequisites

```sh
npm install gulp -g && npm install bower -g
```

This Boilerplate uses `gulp-sharp` which depends on [sharp](https://github.com/lovell/sharp). Sharp
is one of the fastest Node libraries for resizing JPEG, PNG, WebP and TIFF images.

Before installing `gulp-sharp` (or running `npm install`) you should install the
[libvips](https://github.com/jcupitt/libvips) library. Further information and instructions can be
found in the [sharp readme](https://github.com/lovell/sharp#installation).

### Install libvips (required for using gulp-sharp) on Ubuntu

```sh
sudo apt-get install libvips-dev
sudo apt-get install libgsf-1-dev
```

## Install

```sh
npm install
```

## Create your first site and show it in the browser, non-optimized

gulp metalsmith will create a static site from the metalsmith src directory. This will output to
app/metalsmith-dist. From there it will be used to serve your development site. Editing the CSS for
example will have effect in your browser immediately through the use of BrowserSync.

```sh
gulp metalsmith
gulp serve
```

## Create your first partly-optimized site dist

```sh
gulp metalsmith
gulp
```

## Create your first highly-optimized site dist

```sh
gulp metalsmith
gulp critical
```

## Solving errors

You could get errors because gulp has many files open, run this: echo
fs.inotify.max_user_watches=524288 | sudo tee -a /etc/sysctl.conf && sudo sysctl -p

## Experts only!

### Build libvips from source

First some dependencies

```sh
sudo apt-get install glib-2.0
sudo apt-get install libxml2-dev
```

Get the current source here: http://www.vips.ecs.soton.ac.uk/supported/current/

```sh
cd ~/Downloads
wget http://www.vips.ecs.soton.ac.uk/supported/current/vips-7.40.11.tar.gz
tar -zxvf vips-7.40.11.tar.gz
cd vips-7.40.11
./configure
make
sudo make install
```

## Run Metalsmith only without Gulp

```sh
node metalsmith/index.js
```

New Metalsmith uses ES6 syntax, need to run it with:

```sh
node --harmony metalsmith/index.js
```

## Build a Docker image to serve the static files with nginx

```sh
docker build -t mysite . &&

docker run -p 80:80 -d mysite

docker tag mysite:latest tutum.co/joostvanderlaan/joostvanderlaan.nl:latest

docker push tutum.co/joostvanderlaan/joostvanderlaan.nl:latest
```
