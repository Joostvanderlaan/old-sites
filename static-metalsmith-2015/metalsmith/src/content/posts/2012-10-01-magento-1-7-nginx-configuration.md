---
lunr: true
title: 'magento-1-7-nginx-configuration'
date: 2012-10-01
template: post.hbs
---

This config works for Magento version 1.7:

```language-nginx
server {
		listen       80 deferred;
                server_name  example.com;
		root         /usr/share/nginx/magentofolder;

	location / {
			index 					index.html index.php; 	## Allow a static html file to be shown first
        	try_files 				$uri $uri/ @handler; 	## If missing pass the URI to Magento's front handler
	}

	location /admin/ {
		client_body_timeout   		3600;
		keepalive_timeout     		3600 3600;
		send_timeout          		3600;
		auth_basic           "Restricted"; ## Message shown in login window
        auth_basic_user_file htpasswd; ## See /etc/nginx/htpassword
        autoindex            on;
	}

    ## These locations would be hidden by .htaccess normally
		location /app/                { deny all; }
		location /includes/           { deny all; }
		location /lib/                { deny all; }
		location /media/downloadable/ { deny all; }
		location /pkginfo/            { deny all; }
		location /report/config.xml   { deny all; }
		location /var/                { deny all; }
		location /lib/minify/         { allow all; }  ## Deny is applied after rewrites so must specifically allow minify

    location /var/export/ { ## Allow admins only to view export folder
        auth_basic           "Restricted"; ## Message shown in login window
        auth_basic_user_file htpasswd; ## See /etc/nginx/htpassword
        autoindex            on;
    }

        #### only use this if you use MAGMI
	location /magmi/ {
        auth_basic           "Restricted"; ## Message shown in login window
        auth_basic_user_file htpasswd; ## See /etc/nginx/htpassword
        autoindex            on;
    	}

    location @handler { ## Magento uses a common front handler
        rewrite / /index.php;
    }

    location ~ .php/ { ## Forward paths like /js/index.php/x.js to relevant handler
        rewrite ^(.*.php)/ $1 last;
    }

    location ~ .php$ { ## Execute PHP scripts
		# Zero-day exploit defense.
		# http://forum.nginx.org/read.php?2,88845,page=3
		# Won't work properly (404 error) if the file is not stored on this server, which is entirely possible with php-fpm/php-fcgi.
		# Comment the 'try_files' line out if you set up php-fpm/php-fcgi on another machine.  And then cross your fingers that you won't get hacked.
		try_files 		$uri =404;
        expires        off; ## Do not cache dynamic content
        fastcgi_pass   phpcgi;
        fastcgi_index  index.php;
        #fastcgi_param  HTTPS $fastcgi_https;
        fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
        fastcgi_param  MAGE_RUN_CODE default; ## Store code is defined in administration > Configuration > Manage Stores
		fastcgi_param  MAGE_RUN_TYPE store;
        include        fastcgi_params; ## See /etc/nginx/fastcgi_param
        fastcgi_param HTTPS on;  #otherwize Magento doesn't know it's https and you'll create a redirect loop
}

}








via Magento.
```
