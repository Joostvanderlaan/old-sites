import { NavLink } from "rebass";

class Footer extends React.Component {
  render() {
    return (
      <div>
        <NavLink href="/" children="Home" />
        {/* <NavLink href="/contact" children="Contact me" /> */}
        <NavLink href="/typography" children="Typography" />
        {/* <NavLink href="/styleguide" children="Styleguide" /> */}
        <NavLink href="/privacy" children="Privacy Policy" />
        <NavLink href="/conditions" children="Terms of Service" />
        <NavLink href="/about" children="About" />
      </div>
    );
  }
}

export default Footer;
