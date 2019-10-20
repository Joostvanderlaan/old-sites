const images = require("remark-images");
const emoji = require("remark-emoji");
const frontmatter = require("remark-frontmatter");
const highlightjs = require("remark-highlight.js");
const withPlugins = require("next-compose-plugins");
const optimizedImages = require("next-optimized-images");

const withMDX = require("@zeit/next-mdx")({
  extension: /\.mdx?$/,
  options: {
    mdPlugins: [images, emoji, highlightjs]
  }
});
module.exports = withMDX({
  pageExtensions: ["js", "jsx", "md", "mdx"]
});
module.exports = withPlugins([
  [
    optimizedImages,
    {
      /* config for next-optimized-images */
    }
  ]

  // your other plugins here
]);
