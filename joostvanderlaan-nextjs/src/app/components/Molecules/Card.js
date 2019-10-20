import { Card as CardBase, Box, BackgroundImage, Subhead, Small } from "rebass";

const photo =
  "https://images.unsplash.com/photo-1462331940025-496dfbfc7564?w=2048&q=20";

class Card extends React.Component {
  render() {
    return (
      <Box width={256}>
        <CardBase>
          <BackgroundImage src={photo} />
          <Box p={2}>
            <Subhead>Card</Subhead>
            <Small>Small meta text</Small>
          </Box>
        </CardBase>
      </Box>
    );
  }
}

export default Card;
