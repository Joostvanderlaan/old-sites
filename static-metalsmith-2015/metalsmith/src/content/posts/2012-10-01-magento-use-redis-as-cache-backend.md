---
lunr: true
title: 'magento-use-redis-as-cache-backend'
date: 2012-10-01
template: post.hbs
---

Magento – use Redis as cache backend

We will configure Magento to use Redis as main cache backend.

1. Install Redis. (2.4 is required because it supports operating on multiple keys for many
   operations)

2. Install <a href="https://github.com/nicolasff/phpredis" target="_blank">phpredis</a>.
   <a href="https://github.com/nicolasff/phpredis" target="_blank">Phpredis</a> is optional, but it
   is much faster than <a href="https://github.com/jdp/redisent" target="_blank">Redisent</a>.

3. Install this module
   <a title="git://github.com/colinmollenhour/Zend_Cache_Backend_Redis.git" href="git://github.com/colinmollenhour/Zend_Cache_Backend_Redis.git" target="_blank">git://github.com/colinmollenhour/Zend_Cache_Backend_Redis.git</a>

4. Edit <strong>app/etc/local.xml</strong> to configure

Based on this article we have turned off cache disk :

<pre class="lang:default decode:true">&amp;lt;cache&amp;gt;

&amp;lt;backend&amp;gt;Zend_Cache_Backend_Redis&amp;lt;/backend&amp;gt;

&amp;lt;slow_backend&amp;gt;database&amp;lt;/slow_backend&amp;gt;

&amp;lt;slow_backend_store_data&amp;gt;0&amp;lt;/slow_backend_store_data&amp;gt;

&amp;lt;auto_refresh_fast_cache&amp;gt;0&amp;lt;/auto_refresh_fast_cache&amp;gt;

&amp;lt;backend_options&amp;gt;

&amp;lt;server&amp;gt;127.0.0.1&amp;lt;/server&amp;gt;

&amp;lt;port&amp;gt;6379&amp;lt;/port&amp;gt;

&amp;lt;database&amp;gt;database&amp;lt;/database&amp;gt;

&amp;lt;use_redisent&amp;gt;0&amp;lt;/use_redisent&amp;gt; &amp;lt;!-- 0 for phpredis, 1 for redisent --&amp;gt;

&amp;lt;automatic_cleaning_factor&amp;gt;20000&amp;lt;/automatic_cleaning_factor&amp;gt; &amp;lt;!-- optional, 20000 is the default, 0 disables auto clean --&amp;gt;

&amp;lt;/backend_options&amp;gt;

&amp;lt;/cache&amp;gt;</pre>

To check if everything works fine you can use redis-cli :

<pre class="lang:default decode:true">root@vm:~$ redis-cli

redis 120.0.01:6379&amp;gt; select database

OK

redis 127.0.0.1:6379&amp;gt; keys *

1) "zc:d:97a_REC_0000000510"

2) "zc:d:97a_REC_0000000511"

3) "zc:d:97a_REC_0000001240"

4) "zc:d:97a_REC_0000000512"

.......</pre>

As you can see, there are a lot of cache indexes in Redis database.

Source code : link

Benchmark class : benchmark.php

via <a href="http://blog.flexishore.com/2011/09/magento-use-redis-as-cache-backend/">Magento – use
Redis as cache backend | Flexishore's Blog</a>.
