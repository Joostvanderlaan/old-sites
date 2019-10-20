import React from 'react';
import _ from 'lodash';
import Link from 'gatsby-link';
import styled, { css } from 'react-emotion';
import { Button } from 'rmwc/Button';

export const StyledLink = styled(Link)`
  display: inline-block;
  margin: 10px 5px;
`;

function PostTags(props) {
  const { tags } = props;
  return (
    <div className="post-tag-container">
      {tags &&
        tags.map(tag => (
          <StyledLink
            key={tag}
            style={{ textDecoration: 'none' }}
            to={`/tags/${_.kebabCase(tag)}`}
          >
            <Button unelevated>{tag}</Button>
          </StyledLink>
        ))}
    </div>
  );
}

export default PostTags;
