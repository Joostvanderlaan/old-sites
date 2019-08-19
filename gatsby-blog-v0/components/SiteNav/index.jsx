import React from 'react'
import { RouteHandler, Link } from 'react-router'
import { prefixLink } from 'gatsby-helpers'
import './style.css'

class SiteNav extends React.Component {
    render() {
        const {location} = this.props
        return (
            <nav className='blog-nav'>
              <ul>
                <li>
                  <Link to="/" className={ location.pathname === prefixLink('/') ? "current" : null }> Articles
                  </Link>
                </li>
                <li>
                  <Link to="/about/" className={ location.pathname === prefixLink('/about/') ? "current" : null }> About me
                  </Link>
                </li>
                <li>
                  <Link to="/contact/" className={ location.pathname === prefixLink('/contact/') ? "current" : null }> Contact me
                  </Link>
                </li>
                <li>
                  <Link to="/styleguide/" className={ location.pathname === prefixLink('/styleguide/') ? "current" : null }> Styleguide
                  </Link>
                </li>
                <li>
                  <Link to="/typography/" className={ location.pathname === prefixLink('/typography/') ? "current" : null }> Typography
                  </Link>
                </li>
              </ul>
            </nav>
            );
    }
}

SiteNav.propTypes = {
    location: React.PropTypes.object,
}

export default SiteNav