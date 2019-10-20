import { NavLink, Toolbar } from "rebass";

class TopAppBar extends React.Component {
  render() {
    return (
      <Toolbar>
        <NavLink href="/" children="Home" />
        <NavLink href="/blog" children="Blog" />
        <NavLink href="/about" children="About" />
      </Toolbar>
    );
  }
}

export default TopAppBar;
