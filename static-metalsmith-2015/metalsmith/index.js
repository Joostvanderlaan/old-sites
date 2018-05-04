'use strict';

/**
 * Dependencies
 */

var Metalsmith = require('metalsmith'),
  markdown = require('metalsmith-markdown'),
  templates = require('metalsmith-templates'),
  collections = require('metalsmith-collections'),
  permalinks = require('metalsmith-permalinks'),
  coffee = require('metalsmith-coffee'),
  sass = require('metalsmith-sass'),
  Handlebars = require('handlebars'),
  fs = require('fs');

// Joost Extra requirements
var ignore = require('metalsmith-ignore'),
  // This plugin provides a simple way to ensure that front matter values regarding SEO are valid.
  seo = require('metalsmith-seo-checker'),
  // A Metalsmith plugin that adds support for draft, private, and future-dated posts. Enables you to do multiple builds for production and development. Gives you a callback so you can automate rebuilding metalsmith with a cron job or node script when future-dated posts become published.
  publish = require('metalsmith-publish'),
  // A Metalsmith plugin that integrates the Lunr.js client side search engine.
  lunr = require('metalsmith-lunr'),
  // Highlight.js code highlighting in Markdown files (Include a highlight.js theme somewhere in your templates.)
  metallic = require('metalsmith-metallic'),
  // A Metalsmith plugin that extracts headings from HTML files and attaches them to the file's metadata.
  //       headings = require('metalsmith-headings'),
  collections = require('metalsmith-collections'),
  Moment = require('moment'),
  striptags = require('striptags'),
  pagination = require('metalsmith-pagination');

/**
 * Local config
 */

// useful file paths (can later be put for global use)
var path = {
  src: 'src',
  build: '../app/metalsmith-dist',
  // build: 'build',
  bower: 'bower_components',
  templates: 'templates',
  css: 'assets/styles',
  scripts: 'scripts',
  sass: 'scss'
};

// https://github.com/dbushell/dbushell-com/blob/master/tasks/dbushell-grunt-metalsmith.js
var options = {
  // src: 'src-markdown',
  // dest: 'build',
  // clean: false,
  // watch: false,
  partials: {},
  metadata: {
    site_ver: '1.0.0',
    site_url: 'https://joostvanderlaan.nl',
    site_name: 'Joost van der Laan &#8211; Web Design &amp; Automation',
    site_desc: 'Joost van der Laan creates. I help people make the most of their web presence.'
  }
};

// default settings for metalsmith-seo-checker
// make sure certain values are set in FrontMatter (in .md files)
// var seo = {
//     ignoreFiles: ['special.html'],
//     trailingSlash: true, // Append a trailing slash to the canonical url
//     lengths: {
//       title: 60, // This is the default value
//       description: 160 // This is the default value
//     },
//     seo: {
//       title: true, // This is the default value
//       description: 'Foo Bar Baz', // There is no default for this
//       robots: 'index, follow' // This is the default value
//     },
//     ogp: {
//       defaultType: 'website', // This is the default value
//       defaultImage: 'www.example.org/myImage.png', // The default value for this is false
//       ignoreMissingImage: false // This is the default value
//     }
//   };

// var configtemplates = {};
// configtemplates.engine = 'handlebars';
// configtemplates.partials = {
//     'header': 'partials/header',
//     'footer': 'partials/footer',
//     'navbar': 'partials/navbar',
//     'offcanvas-scotchpanels': 'partials/offcanvas-scotchpanels'
// };
// configtemplates.directory = 'templates';

var findTemplate = function(config) {
  var pattern = new RegExp(config.pattern);

  return function(files, metalsmith, done) {
    for (var file in files) {
      if (pattern.test(file)) {
        var _f = files[file];
        if (!_f.template) {
          _f.template = config.templateName;
        }
      }
    }
    done();
  };
};

Handlebars.registerPartial('header', fs.readFileSync(__dirname + '/templates/partials/header.hbs').toString());
Handlebars.registerPartial('footer', fs.readFileSync(__dirname + '/templates/partials/footer.hbs').toString());
Handlebars.registerPartial('navbar', fs.readFileSync(__dirname + '/templates/partials/navbar.hbs').toString());
Handlebars.registerPartial('offcanvas-scotchpanels', fs.readFileSync(__dirname + '/templates/partials/offcanvas-scotchpanels.hbs').toString());

// HELPERS

// return array of partials for metalsmith-templates
var parts = fs.readdirSync(__dirname + '/templates/partials');
if (Array.isArray(parts) && parts.length) {
  parts.forEach(function(name) {
    name = name.split('.')[0];
    options.partials[name] = 'partials/' + name;
  });
}

// if A or B conditional
Handlebars.registerHelper('either', function(a, b, options) {
  return (a || b) ? options.fn(this) : options.inverse(this);
});

// replicate WordPress `is_frontpage` and `is_single` template functions
// Handlebars.registerHelper('is', function(type, options) {
//   var is = false;
//   if (type === 'home' && ['index.html'].indexOf(this.template) > -1) is = true;
//   if (type === 'single' && ['page.html', 'single.html'].indexOf(this.template) > -1) is = true;
//   return is ? options.fn(this) : options.inverse(this);
// });

// output the contents of a file into the document
var inline = [];
Handlebars.registerHelper('inline', function(url) {
  if (typeof inline[url] !== 'string') {
    try {
      inline[url] = fs.readFileSync(options.dest + '/' + url).toString();
    } catch (e) {
      inline[url] = '';
    }
  }
  return new Handlebars.SafeString(inline[url]);
});

// write absolute URLs
Handlebars.registerHelper('site_url', function(url) {
  if (typeof url !== 'string') return options.metadata.site_url + '/';
  if (url.length > 0 && url.lastIndexOf('.') == -1) {
    url += '/';
  }
  return options.metadata.site_url + '/' + url;
});

// date formatting with Moment.js
Handlebars.registerHelper('moment', function(context, format) {
  if (format === 'ISO') return Moment(context).toISOString();
  return Moment(context).format(format);
});

// format meta content for <title>
Handlebars.registerHelper('page_title', function(context, options) {
  if (this.template === 'index.html') {
    return new Handlebars.SafeString(this.site_name + ' &#8211; ' + this.site_desc);
  }
  var title = this.title;
  if (!title) {
    if (this.template === 'archive.html') {
      title = 'Blog';
      if (this.pagination.num > 1) {
        title += ' (Page ' + this.pagination.num + ')';
      }
    }
  }
  title += ' &#8211; ' + this.site_name;
  title += ' &#8211; ' + this.site_desc;
  return new Handlebars.SafeString(title);
});

// create post excerpt from content similar to WordPress
Handlebars.registerHelper('post__excerpt', function(contents) {
  if (typeof contents !== 'string') return '';
  var text = striptags(contents),
    words = text.split(' ');
  if (words.length >= 55) {
    text = words.slice(0, 55).join(' ') + ' [&hellip;]';
  }
  return new Handlebars.SafeString('<p>' + text + '</p>');
});

// format post title to avoid orphans
Handlebars.registerHelper('post__title', function(title) {
  var pos, words = title.split(' ');
  if (words.length > 3 && words[words.length - 1].length < 9) {
    pos = title.lastIndexOf(' ');
    title = title.substr(0, pos) + '<span class="nbsp">&nbsp;</span>' + title.substr(pos + 1);
  }
  return new Handlebars.SafeString(title);
});

// mark file being watched
if (options.watch) {
  options.watching = options.watching.replace(new RegExp('^' + options.src + '\/'), '');
  metalsmith.use(function(files, metalsmith, done) {
    Object.keys(files).forEach(function(file) {
      if (file === options.watching) {
        files[file].watching = true;
      }
    });
    done();
  });
}
// /HELPERS

Metalsmith(__dirname)
  // .metadata({
  //   site: {
  //     title: 'joostvanderlaan.nl',
  //     url: 'https://joostvanderlaan.nl'
  //   }
  // })
  .use(publish({
    draft: false
  }))
  .use(collections({
    pages: {
      pattern: 'content/pages/*.md'
    },
    posts: {
      pattern: 'content/posts/*.md',
      sortBy: 'date',
      reverse: true
    }
  }))
  // Creates a blog page with 7 items. More then 7 items? Pagination will kick in.
  .use(pagination({
    'collections.posts': {
      first: 'blog/index.html',
      path: 'blog/page/:num/index.html',
      template: 'archive.hbs',
      perPage: 7
    }
  }))
  .use(findTemplate({
    pattern: 'posts',
    templateName: 'post.hbs'
  }))
  .use(markdown())
  .use(permalinks({
    pattern: ':title'
  }))
  .use(templates('handlebars'))
  //.use(templates(configtemplates))
  .use(sass({
    outputStyle: 'compressed'
  }))
  .use(coffee())
  .use(ignore([
    path.templates + '/**/*',
    path.css + '/**/*',
    path.sass + '/**/*',
    path.scripts + '/**/*',
    path.bower + '/**/*'
  ]))
  .destination('./' + path.build)
  .build(function(err, files) {
    if (err) {
      throw err;
    } else {
      console.log('Metalsmith build complete!');
    }
  });
