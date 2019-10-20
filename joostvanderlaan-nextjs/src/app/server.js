// server.js
require("@zeit/next-preact/alias")();
const { createServer } = require("http");
const next = require("next");

const dev = process.env.NODE_ENV !== "production";
const app = next({ dev });
const port = process.env.PORT || 3000;
const handle = app.getRequestHandler();

app.prepare().then(() => {
  createServer(handle).listen(port, () => {
    console.log(`> Ready on http://localhost:${port}`);
  });
});
