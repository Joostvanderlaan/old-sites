import React from 'react';
import {
  Toolbar,
  ToolbarRow,
  ToolbarSection,
  ToolbarMenuIcon,
  ToolbarTitle,
  ToolbarIcon,
} from 'rmwc/Toolbar';
import { Theme } from 'rmwc/Theme';
import config from '../../../data/SiteConfig';

export default function Navbar(props) {
  return (
    <Theme tag="header" use="background text-primary-on-primary">
      <Toolbar>
        <ToolbarRow>
          <ToolbarSection alignStart>
            <ToolbarMenuIcon use="menu" onClick={props.toggle} />
            <ToolbarTitle tag="a" href="/">
              {config.siteTitle}
            </ToolbarTitle>
          </ToolbarSection>
          {/* <ToolbarSection alignEnd>
            <ToolbarIcon use="account_circle" onClick={props.login} />
          </ToolbarSection> */}
        </ToolbarRow>
      </Toolbar>
    </Theme>
  );
}
