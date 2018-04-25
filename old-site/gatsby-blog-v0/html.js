import React from 'react'
import DocumentTitle from 'react-document-title'
import { prefixLink } from 'gatsby-helpers'

const BUILD_TIME = new Date().getTime()

module.exports = React.createClass({
    displayName: 'HTML',
    propTypes: {
        body: React.PropTypes.string,
    },
    render() {
        const {body, route} = this.props
        const title = DocumentTitle.rewind()
        // const font = <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,700&subset=latin,cyrillic' rel='stylesheet' type='text/css' />
        let font
        let css
        if (process.env.NODE_ENV === 'production') {
            css = <style dangerouslySetInnerHTML={ {    __html: require('!raw!./public/styles.css?t=${BUILD_TIME}')} } />
        }

        return (
            <html lang="en">
            <head>
              <meta charSet="utf-8" />
              <meta httpEquiv="X-UA-Compatible" content="IE=edge" />
              <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=5.0" />
              <title>
                { title }
              </title>

                  { font }
              { css }
            </head>
            <body>
              <div id="react-mount" dangerouslySetInnerHTML={ {    __html: this.props.body} } />
              <script src={ prefixLink(`/bundle.js?t=${BUILD_TIME}`) } />
            </body>
            </html>
        )
    },
})


            //   <meta name="description" content={description}/>

            // <meta property="twitter:account_id" content="10907062"/>
            // <meta name="twitter:card" content="summary"/>
            // <meta name="twitter:site" content="{ config.twitterHandle }"/>
            // <meta name="twitter:title" content={title}/>
            // <meta name="twitter:description" content={description}/>

            // <meta property="og:title" content={title}/>
            // <meta property="og:type" content="article"/>
            // // <meta property="og:url" content="http://bricolage.io#{@props.page?.path}"/>
            // <meta property="og:description" content={description}/>
            // // <meta property="og:site_name" content="Bricolage — a blog by Kyle Mathews"/>
            // <meta property="fb:admins" content="17830631"/>
            // // <link rel="shortcut icon" href={@props.favicon}/>
            // // <link rel="alternate" type="application/atom+xml" href="/atom.xml" />
                        // + canonical
