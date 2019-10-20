/* eslint-disable no-undef, react/prop-types */
import React from 'react';
import Link from 'gatsby-link';
import { Grid, GridCell } from 'rmwc/Grid';
import { List, ListItem, ListItemText } from 'rmwc/List';

export default ({ data }) => {
  const myData = data.allContentJson.edges[0].node.index;
  return (
    <div>
      <Grid tag="section">
        <GridCell span="3" />
        <GridCell span="6">
          <div>
            <h1>{myData.title}</h1>
            <h3>{myData.subtitle}</h3>
            <p>Some intro text</p>

            <List>
              <Link to="/blog/">
                <ListItem>
                  <ListItemText>Blog</ListItemText>
                </ListItem>
              </Link>

              <Link to="/somepage/">
                <ListItem>
                  <ListItemText>Some other page</ListItemText>
                </ListItem>
              </Link>
            </List>
          </div>
        </GridCell>
        <GridCell span="3" />
      </Grid>
    </div>
  );
};

export const pageQuery = graphql`
  query contentQuery {
    allContentJson {
      edges {
        node {
          index {
            title
            subtitle
          }
        }
      }
    }
  }
`;
