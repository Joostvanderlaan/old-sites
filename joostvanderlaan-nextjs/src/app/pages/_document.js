import Document, { Head, Main, NextScript } from "next/document";
import getConfig from "next/config";
import { ServerStyleSheet, injectGlobal } from "styled-components";

import Card from "../components/Molecules/Card";
import TopAppBar from "../components/Organisms/TopAppBar";
import Footer from "../components/Footer";
import { Grid, Cell } from "styled-css-grid";

injectGlobal`
* {
        margin: 0;
        box-sizing: border-box;
      }
      body {
        font-family: 16px -apple-system, BlinkMacSystemFont, Roboto, Oxygen, Ubuntu, Cantarell, “Fira Sans”, “Droid Sans”, “Helvetica Neue”, Arial, sans-serif;
          /* font: 13px Menlo, Monaco, Lucida Console, Liberation Mono,
          DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace,
          serif; */
      }
      a {
        color: #22bad9;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
      }
      a:hover {
        color: #fff;
        background: #22bad9;
        text-decoration: none;
      }
      /* loading progress bar styles */
      #nprogress {
        pointer-events: none;
      }
      #nprogress .bar {
        background: #22bad9;
        position: fixed;
        z-index: 1031;
        top: 0;
        left: 0;
        width: 100%;
        height: 2px;
      }
      #nprogress .peg {
        display: block;
        position: absolute;
        right: 0px;
        width: 100px;
        height: 100%;
        box-shadow: 0 0 10px #22bad9, 0 0 5px #22bad9;
        opacity: 1;
        transform: rotate(3deg) translate(0px, -4px);
      }
`;

export default class _Document extends Document {
  static getInitialProps({ renderPage }) {
    const sheet = new ServerStyleSheet();
    const page = renderPage(App => props =>
      sheet.collectStyles(<App {...props} />)
    );
    const styleTags = sheet.getStyleElement();

    return { ...page, styleTags };
  }

  render() {
    const { styleTags, title } = this.props;

    return (
      <html lang="en">
        <Head>{styleTags}</Head>
        <body>
          <Grid
            columns={"100px 1fr 100px"}
            rows={"45px 1fr 45px"}
            areas={[
              "header header  header",
              "menu   content ads   ",
              "footer footer  footer"
            ]}
          >
            <Cell area="header">
              <TopAppBar />
            </Cell>
            <Cell area="content">
              <Card />
              <Main />
            </Cell>
            <Cell area="menu">Menu</Cell>
            <Cell area="ads">Ads</Cell>
            <Cell area="footer">
              <Footer />
            </Cell>
          </Grid>
          <NextScript />
        </body>
      </html>
    );
  }
}
