import React from 'react';
import Link from 'gatsby-link';
import styled, { css } from 'react-emotion';
import { Typography } from 'rmwc/Typography';
import UserLinks from '../UserLinks/UserLinks';
import config from '../../../data/SiteConfig';

const StyledFooter = styled.footer`
  justify-content: center;
  align-content: center;
`;

const StyledTypograhy = styled(Typography)`
  text-align: center;
  margin: 0;
  color: var(
    --mdc-theme-text-secondary-on-background,
    rgba(0, 0, 0, 0.54)
  ) !important;
`;

const WrapperUserLinks = styled.section`
  padding: 2em;
`;

const Wrapper = styled.section`
  padding: 4em;
`;

const WrapperCenter = styled.section`
  text-align: center;
  margin: 0;
  line-height: 0rem;
`;

const ulStyle = css`
  list-style-type: none;
  margin: 0;
  margin-bottom: 1.45rem;
  text-transform: uppercase;
  padding: 0;
  & a {
    color: var(--mdc-theme-primary, #6200ee);
    opacity: 0.5;
    transition: opacity 0.15s ease-in;
    transition: color 0.15s ease-in;
    &:hover {
      text-decoration: none;
      box-shadow: none;
      opacity: 1;
      transition: opacity 0.15s ease-in;
    }
  }
  & li {
    margin: 0;
  }
`;

function Footer() {
  // const { config } = this.props;
  const url = config.siteRss;
  const copyright = config.copyright;
  if (!copyright) {
    return null;
  }
  return (
    <StyledFooter>
      <WrapperUserLinks>
        <UserLinks config={config} labeled />
      </WrapperUserLinks>
      <Wrapper>
        <ul className={ulStyle}>
          <li>
            <Link to="/">Home</Link>
          </li>
          <li>
            <Link to="/privacy">Privacy Policy</Link>
          </li>
          <li>
            <Link to="/conditions">Terms of Service</Link>
          </li>
          <li>
            <Link to="/about">About</Link>
          </li>
        </ul>

        <WrapperCenter>
          <StyledTypograhy
            tag="h4"
            use="subheading1"
            // theme="text-secondary-on-background" // As of now this only works with RMWC components directly, not when they are passed throug styled components / Emotion
          >
            {copyright}
            {/* <Link to={url}>Subscribe</Link> */}
          </StyledTypograhy>
        </WrapperCenter>
      </Wrapper>
    </StyledFooter>
  );
}

export default Footer;
