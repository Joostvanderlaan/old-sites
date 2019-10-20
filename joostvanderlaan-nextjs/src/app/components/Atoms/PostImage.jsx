import { Image } from "rebass";

class PostImage extends React.Component {
  render() {
    return (
      <div>
        <AspectRatioPlaceholder>
          <StyledFigure>
            <Img sizes={plaatje} />
            <Typography use="caption">{post.caption}</Typography>
          </StyledFigure>
        </AspectRatioPlaceholder>
      </div>
    );
  }
}

export default PostImage;
