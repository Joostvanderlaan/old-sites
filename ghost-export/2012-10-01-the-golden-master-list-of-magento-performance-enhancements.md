There are lots of tips, tricks and hacks on how to enhance Magento. A lot of them are good. Some are entirely wrong! And most do not have each and every update you must make to every single one of your sites in order to get it to achieve the fastest possible load times. This is a list to remedy that situation.

Remember, all of these updates only apply to production environments. Feel free to post comments, updates and suggestions and I will keep this list up to date as much as I possible can. Hopefully, in time we can achieve a golden master list of performance enhancements!

<!--more-->

Legend

Verified, Tested &amp; Recommended for all installs

Verified &amp; Tested. Recommendation varies based on application.

Magento Configuration

Enable Caching

System &gt; Cache Management &gt; Select All &gt; Enable

This one is an absolute no-brainer and provides one of the best performance enhancements you will get in Magento. This caches the XML layer in Magento, along with some other information, to speed up PHP processing time.

Merge JavaScript and CSS Files (Not needed if using Fooman Speedster module)

System &gt; Configuration &gt; Advanced &gt; Developer &gt; Javascript Settings &amp; CSS Settings

Combines the many css and js files defined in Magento's XML layer into one large file for each (one for js, one for css). It speeds up your site because it reduces the number of http connections needed in order to fetch this data through a web browser.

Compilation

System &gt; Tools &gt; Compilation &gt; Run Compilation Process

This option compiles all Magento installation files and creates a single include path. Remember to disable this module before upgrades. The compilation process may need to be ran again when new files are released. Recommended for high-volume websites or sites that are not often updated as it reduces PHP processing time and TTFB.

Disable Logging

System &gt; Configuration &gt; Advanced &gt; Developer &gt; Log Settings &gt; Enabled: No

This is disabled by default, but be sure to double-check it is disabled on production environments, as this setting can drastically slow down your website if enabled.

Enable Gzip

This is a must-have tweak. It decreases page size by over 30%, and takes a base Magento home page PageSpeed from a 32 to a 69! Make sure to enable the deflate module in your Apache configuration, then comment out the appropriate lines in the mod_deflate.c directive of your ~/.htaccess file.

Minify JavaScript

Install the Fooman Speedster module

The easiest way to minify your JavaScript is to install the Fooman Speedster module. This does everything you need to make sure all of your JavaScript is minified. It also merges your CSS and JavaScript files into one file each, so this replaces option #1 on this list.

Enable Far-Future Expires

Add ExpiresActive On and the following lines after the ExpiresDefault directive in your ~/.htaccess file

These few lines add expires directives to your images and some other files. This tells the web browser to cache the contents for a period of time on these items, cutting down HTTP requests and load time for future visits. This is also a must-have and often overlooked tweak!!! These few lines took a Magento 1.6.1.0 site with a few of the above tweaks from a PageSpeed of a 70 to an 83! Also note, the default ExpiresDefault line should remain commented out to prevent long-term caching of dynamic PHP files.

?

1

2

3

4

&lt;FilesMatch ".(css|eot|flv|gif|htc|ico|jpg|jpeg|js|pdf|png|svg|swf|ttf|woff)$"&gt;

ExpiresActive On

ExpiresDefault "access plus 1 week"

&lt;/FilesMatch&gt;

Enable Flat Catalog/Index

System &gt; Index Management &gt; Enable All

System &gt; Configuration &gt; Catalog &gt; Frontend, set Use Flat Catalog Category/Product to Yes

If you have a large amount of products on your site (&gt;10,000), this update decreases load times on searches, product listings, etc. I can't see this ever slowing down your site, even with only one product, so no reason to not tackle this easy one.

Server Side

Install "enough" memory (2GB minimum)

Even if you have very little traffic, ie. less than 100 visits per day, plan on running a minimum of 2GB of memory. Anything more, plan accordingly. Once you hit about 16GB RAM, you will be hitting peak efficiency, and are better off scaling horizontally rather than vertically (more server nodes VS. working with current resources).

Run Lightspeed VS. Apache

For the most part, Lightspeed web server is a direct drop-in replacement for Apache. Virtual Host configurations stay the same, htaccess rules work, and just about everything else including modules and plugins work out of the box without any additional configuration. Lightspeed has a much lighter footprint than apache, as do many other web servers such as Nginx and Lighttpd, but Lightspeed involves little to no additional knowledge of server configurations or etc.

Install APC

Install APC with the command line pecl install apc

Also add the following cache handle to your app/etc/local.xml configuration file

?

1

2

3

4

5

6

7

8

&lt;global&gt;

...

&lt;cache&gt;

&lt;backend&gt;apc&lt;/backend&gt;

&lt;prefix&gt;yourdomain_com_&lt;/prefix&gt;

&lt;/cache&gt;

...

&lt;/global&gt;

Just installing APC, with no configuration, whatsoever, decreased page load time by about 20% on my clean Magento install, and decreased TTFP by about 30%! APC is one of the best bytecode compressor's for PHP, and has been tried and true on many Magento installations so far, so there is no need to look elsewhere.

Enable KeepAlive's

Add the following lines to your Apache configuration file
 
<pre class="lang:apache decode:true " >
KeepAlive On

KeepAliveTimeout 2
</pre> 

Apache KeepAlive keeps the TCP connection open between the client and the server, allowing multiple requests to be served over the same connection. This removes some overhead with sites serving up a lot of concurrent HTTP requests.

 
<pre class="lang:apache decode:true " >Disable open_basedir</pre> 


Add the following line to your Apache configuration file

 
<pre class="lang:apache decode:true " >php_admin_value open_basedir none
</pre> 

The open_basedir parameter is a security feature that restricts filesystem lookups, but can hurt performance on applications with a large filesystem footprint like Magento. Disable it to lower lstat lookups. Find out more about this setting by reading this article by Nexcess.

Client Side

Use a CDN

This could fall under a Server Side upgrade, but the results are really drastic on the client side. A Content Delivery Network can improve your data cache, reduce latency, and increase redundancy for your web site. But the simple reason to use it is that it speeds up your website instantly. Ashley Schroder has a good article on integrating Magento with Amazon Cloudfront that makes it very simple to get up and running with a CDN, and Nexcess has a good article on setting up a CDN with Magento using their own CDN network.

Database Related

Enable the Query Cache

Add the following lines to your /etc/my.conf file

 
<pre class="lang:default decode:true " >query_cache_type=1

query_cache_size=64M</pre> 


This caches a certain amount of MySQL statements so they do not need to be run again. Easy mod for a nice enhancement!

Run MySQLTuner

 
<pre class="lang:sh decode:true " >wget http://mysqltuner.com/mysqltuner.pl

perl mysqltuner.pl</pre> 


This perl script monitors your current MySQL install and provides recommendations and suggestions for tweaks to your my.cnf file. Very informative stuff here!

via <a href="http://markshust.com/2012/02/13/golden-master-list-magento-performance-enhancements">The Golden Master List of Magento Performance Enhancements | Mark Shust</a>.