class Image extends React.Component {
  render() {
    return (
      <img src={require("./test-image.jpeg")} />
      //   <div>
      //     <AspectRatioPlaceholder>
      //       <StyledFigure>
      //         <Img sizes={plaatje} />
      //         <Typography use="caption">{post.caption}</Typography>
      //       </StyledFigure>
      //     </AspectRatioPlaceholder>
      //   </div>
    );
  }
}

export default Image;
