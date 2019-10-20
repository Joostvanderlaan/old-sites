import Page from "../../layouts/main";
import Link from "next/link";
import { posts } from "../../data/posts";
import Head from "next/head";
// import Mdx, { meta } from 'posts/post.mdx'
import Image from "../../components/Atoms/Image";

export default () => (
  <Page>
    <Head>
      <title>Blog</title>
    </Head>
    <div className="posts">
      {posts.map(({ id, slug, date, title }) => (
        <Post id={id} key={id} slug={slug} date={date} title={title} />
      ))}
    </div>
    <Image />
  </Page>
);

const Post = ({ id, slug, date, title }) => (
  <div className="post">
    <span className="date">{date}</span>
    {/* <Link prefetch href={`/${new Date(date).getFullYear()}/${id}`}>
   */}
    <Link prefetch as={`/blog/${slug}`} href={`/blog/${id}`}>
      <a>{title}</a>
    </Link>

    <style jsx>{`
      .post {
        margin-bottom: 10px;
      }
      .date {
        display: inline-block;
        width: 140px;
        text-align: right;
        margin-right: 30px;
        color: #999;
      }
      a {
        text-decoration: none;
      }
      @media (max-width: 500px) {
        .post {
          margin-bottom: 15px;
        }
        .date {
          display: block;
          width: inherit;
          text-align: inherit;
          font-size: 11px;
          color: #ccc;
          margin-bottom: 5px;
        }
      }
    `}</style>
  </div>
);
