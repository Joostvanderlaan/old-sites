---
date: 2012-10-01
modifyDate: 2012-10-01
excerpt: None
lunr: true
template: post.hbs
title: 'Colin Mollenhour: Benchmarking Zend_Cache backends for Magento'
---

Benchmarking Zend_Cache backends for Magento

The Zend_Cache module from the Zend Framework is a nice piece of work. It has a slew of
programmer-friendly frontends and a respectable set of backends with a well-designed interface. I
love the a-la-carte approach, but I am only really interested in the Zend_Cache_Core frontend and
the backends that support tagging since that is what is required by Magento. This begs the question,
which backend should you use? While I have my own opinion on that matter (ahem, Redis. -post coming
soon-ish), I wanted a reliable way to test Zend_Cache backend performances so I wrote a benchmark!
This benchmark was both forked from and inspired by the benchmark found in Vinai Kopp’s Symlink
Cache. It uses Magento’s core/cache model rather than Zend_Cache_Core directly so a Magento (or
Magento-lite) installation and bash are the only requirements.

The purpose of this post is not to provide a bunch of cache backend benchmarks, but rather to simply
introduce my benchmark code in the hopes that others conduct their own tests and hopefully publish
their findings. A link to this post is appreciated. Also, if there are any criticisms of the
benchmark I’d love to see a pull request. :)

The benchmark suite is fully-featured:

Repeatable tests. Dataset is written to static files so the exact same test can be repeated, even
with entirely different backends.

Test datasets can easily be zipped up and copied to different environments or shared for others to
use.

Can relatively easily test multiple pre-generated datasets to compare different scenarios on the
same hardware.

Uses true multi-process benchmarking, each process with a different set of random operations.

Flexible dataset generation via options to init command. Cache record data size, number of tags,
expiration, popularity and volatility are all randomized.

Currently the benchmarks are run via the command line so testing the APC backend or any others that
only work via a cgi or apache module environment will not work. This could be remedied easily enough
with the use of CuRL and some php copy/paste if you had the desire to test on your actual web
server.

Here is an example run using the Redis backend using my dev environment, a Lubuntu VirtualBox guest:
<code> Cache Backend: Zend_Cache_Backend_Redis

Loading 'default' test data...

Loaded 10000 cache records in 29.1080 seconds. Data size is 5008.9K

Analyzing current cache contents...

Counted 10023 cache IDs and 2005 cache tags in 0.2062 seconds

Benchmarking getIdsMatchingTags...

Average: 0.00036 seconds (36.82 ids per tag)

Benchmarking 4 concurrent clients, each with 100000 operations...

4 concurrent clients completed in 62 seconds

| reads| writes| cleans

---

Client 1| 1811.83| 184.66| 6.81

Client 2| 1799.84| 165.29| 6.91

Client 3| 1818.90| 165.17| 6.79

Client 0| 1790.91| 153.56| 7.40

---

ops/sec | 7221.48| 668.68| 27.91</code>

The important numbers to look at are the summed ops/sec. Given the three variables: dataset,
hardware and backend, it is easy to change just one of these without affecting the others so this
benchmark can be used to test any one of the three variables reliably. The three metrics observed
are reads, writes and cleans. The first two are pretty self-explanatory. The third is a clean
operation on a single tag using Zend_Cache::CLEANING_MODE_MATCHING_ANY_TAG which is the only mode
Magento ever uses other than Zend_Cache::CLEANING_MODE_ALL for manual cache refreshes. Individual
read/write operations are very fast so given the large number of operations in a test I did not feel
the need to examine min, max, average, or standard deviations.

The test uses (hopefully) sane defaults for dataset generation parameters, but there is plenty of
flexibility. I advise you to examine your production environment (number of cache keys, number of
cache tags, number of concurrent clients) to tweak the test to more closely match your own
environment. Here is the output of the --help cli parameter: <code> \$ php shell/cache-benchmark.php
--help

This script will either initialize a new benchmark dataset or run a benchmark.

Usage: php -f shell/cache-benchmark.php [command][options]

Commands:

init [options] Initialize a new dataset.

load --name &lt;string&gt; Load an existing dataset.

clean Flush the cache backend.

tags Benchmark getIdsMatchingTags method.

ops [options] Execute a pre-generated set of operations on the existing cache.

'init' options:

--name &lt;string&gt; A unique name for this dataset (default to "default")

--keys &lt;num&gt; Number of cache keys (default to 10000)

--tags &lt;num&gt; Number of cache tags (default to 2000)

--min-tags &lt;num&gt; The min number of tags to use for each record (default 0)

--max-tags &lt;num&gt; The max number of tags to use for each record (default 15)

--min-rec-size &lt;num&gt; The smallest size for a record (default 1)

--max-rec-size &lt;num&gt; The largest size for a record (default 1024)

--clients &lt;num&gt; The number of clients for multi-threaded testing (defaults to 4)

--seed &lt;num&gt; The random number generator seed (default random)

'ops' options:

--name &lt;string&gt; The dataset to use (from the --name option from init command)

--client &lt;num&gt; Client number (0-n where n is --clients option from init command)

-q|--quiet Be less verbose.</code>

To handle multi-process benchmarking the test is actually launched from a shell script which
backgrounds each client and sums the results using awk so unless you are doing single-process
benchmarks you never need to invoke the ‘ops’ command yourself.

Give me the code already!

The code is hosted at github.com/colinmollenhour/magento-cache-benchmark. If you use modman you can
install it like so:

modman cachebench clone git://github.com/colinmollenhour/magento-cache-benchmark.git

Or, you may also download it directly and just extract cache-benchmark.php to the “shell” folder in
your Magento installation.

Run a test!

Assuming you’ve cloned/downloaded the code already, here is how you run your first test:

php shell/cache-benchmark.php init

bash var/cachebench/default/run.sh

Could it get any easier?

PS. I included a “Null” backend which is just a black hole for the purpose of getting a general idea
of your PHP overhead.

via
<a href="http://colin.mollenhour.com/2011/10/03/benchmarking-zend_cache-backends-for-magento/">Colin
Mollenhour's Technical Blog » Benchmarking Zend_Cache backends for Magento</a>.
