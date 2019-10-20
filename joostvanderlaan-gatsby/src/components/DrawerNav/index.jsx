import React from 'react';
import { Drawer, DrawerHeader, DrawerContent } from 'rmwc/Drawer';
import { ListItem, ListItemText } from 'rmwc/List';
import Link from 'gatsby-link';
import config from '../../../data/SiteConfig';

export default function DrawerFU(props) {
  return (
    <Drawer temporary open={props.opened}>
      <DrawerHeader style={{ backgroundColor: '#f6f6f6' }}>
        {config.siteTitle}
      </DrawerHeader>
      <DrawerContent>
        <Link to="/">
          <ListItem>
            <ListItemText>Home</ListItemText>
          </ListItem>
        </Link>
        <Link to="/blog/">
          <ListItem>
            <ListItemText>Blog</ListItemText>
          </ListItem>
        </Link>
      </DrawerContent>
    </Drawer>
  );
}
