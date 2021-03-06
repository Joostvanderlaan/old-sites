import React from 'react';
import Helmet from 'react-helmet';
import { Grid, GridCell } from 'rmwc/Grid';
import PostListing from '../../components/PostListing/PostListing';
import SEO from '../../components/SEO/SEO';
import config from '../../../data/SiteConfig';

function Index(props) {
  const postEdges = props.data.allMarkdownRemark.edges;
  return (
    <div className="index-container">
      <Helmet title={config.siteTitle} />
      <SEO postEdges={postEdges} />
      <Grid tag="section">
        <GridCell span="3" />
        <GridCell span="6">
          <PostListing postEdges={postEdges} />
        </GridCell>
        <GridCell span="3" />
      </Grid>
    </div>
  );
}

export default Index;

/* eslint no-undef: "off" */
export const pageQuery = graphql`
  query IndexQuery {
    allMarkdownRemark(
      limit: 2000
      sort: { fields: [frontmatter___date], order: DESC }
    ) {
      edges {
        node {
          fields {
            slug
          }
          excerpt
          timeToRead
          frontmatter {
            title
            author {
              id
            }
            tags
            cover {
              childImageSharp {
                sizes(maxWidth: 380) {
                  ...GatsbyImageSharpSizes_withWebp
                }
              }
            }
            date
          }
        }
      }
    }
  }
`;
