module.exports = {
  blogPostDir: 'blog', // The name of directory that contains your posts.
  siteTitle: 'Joost van der Laan', // Site title.
  siteTitleAlt: 'Interesting things that keep me productive & effective.', // Alternative site title for SEO.
  siteLogo: '/logos/logo-1024.png', // Logo used for SEO and manifest.
  siteUrl: 'https://joostvanderlaan.nl', // Domain of your website without pathPrefix.
  pathPrefix: '/gatsby-starter-landing-pages', // Prefixes all links. For cases when deployed to example.github.io/gatsby-starter-landing-pages/.
  siteDescription: 'Interesting things that keep me productive & effective.', // Website description used for RSS feeds/meta description tag.
  siteRss: '/rss.xml', // Path to the RSS file.
  siteFBAppID: 'XXXXXXXXXXXXXXXX', // FB Application ID for using app insights
  googleTagManagerID: 'GTM-N3WWJLK',
  postDefaultCategoryID: 'Technology', // Default category for posts.
  userName: 'Joost', // Username to display in the author segment.
  userTwitter: '', // Optionally renders "Follow Me" in the UserInfo segment.
  userLocation: 'Amsterdam, The Netherlands', // User location to display in the author segment.
  userAvatar: 'https://api.adorable.io/avatars/150/test.png', // User avatar to display in the author segment.
  userDescription:
    "", // User description to display in the author segment.
  // Links to social profiles/projects you want to display in the author segment/navigation bar.
  userLinks: [
    {
      label: 'GitHub',
      url: 'https://github.com/Joostvanderlaan',
      iconClassName: 'fa fa-github',
    },
    {
      label: 'Twitter',
      url: 'https://twitter.com/@javdl',
      iconClassName: 'fa fa-twitter',
    },
    {
      label: 'Email',
      url: 'mailto:joost@joostvanderlaan.nl',
      iconClassName: 'fa fa-envelope',
    },
  ],
  copyright: 'Copyright ©2018. ', // Copyright string for the footer of the website and RSS feed.
  themeColor: '#666', // #6200ee Used for setting manifest and progress theme colors.
  backgroundColor: '#e0e0e0', // Used for setting manifest background color.
};
