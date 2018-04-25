---
lunr: true
title: "Typography 2"
date: 2014-04-30
template: post.hbs
---
2 Typography 2
<h2 id="creatingbeautifulcontentwithghostion">Creating Beautiful Content with Ghostion</h2>

<p>Powered by Foundation 5, typography in Ghostion theme is meant to make your life easier by providing clean, attractive, simple default styles for all of the most basic typographical elements.</p>

<p>Ghost uses <strong>Markdown</strong> for writing. Essentially, it's a shorthand way to manage your post formatting as you write. Writing in Markdown is really easy. In the left hand panel of Ghost, you simply write as you normally would. Where appropriate, you can use shortcuts to style your content. </p>

<p><img src="http://ghostdemo.axiantheme.com/ghostion/demo/typography.jpg" alt="Typography"></p>

<p><br></p>

<h4 id="heading">Heading</h4>

<p>Ghostion includes styles for all of the header elements that are balanced and based on a modular scale.</p>

<h1 id="h1thisisaverylargeheader">h1. This is a very large header.</h1>

<h2 id="h2thisisalargeheader">h2. This is a large header.</h2>

<h3 id="h3thisisamediumheader">h3. This is a medium header.</h3>

<h4 id="h4thisisamoderateheader">h4. This is a moderate header.</h4>

<h5 id="h5thisisasmallheader">h5. This is a small header.</h5>

<h6 id="h6thisisatinyheader">h6. This is a tiny header.</h6>

<p><br></p>

<h4 id="paragraph">Paragraph</h4>

<p>This is a paragraph. Paragraphs are preset with a font size, line height and spacing to match the overall vertical rhythm.</p>

<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>

<p><br></p>

<h4 id="strongandemphasize">Strong and Emphasize</h4>

<p>Wrap <code>**</code> around type to make it <strong>bold</strong>! You can also use <code>*</code> to <em>italicize</em> your words.</p>

<p><code>**strong**</code> or <code>__strong__</code> <strong>( Cmd + B or Ctrl + B (Windows) )</strong></p>

<p><code>*emphasize*</code> or <code>_emphasize_</code> <strong>( Cmd + I or Ctrl + I (Windows) )</strong></p>

<p><strong>Sometimes I want a lot of text to be bold. Like, seriously, a <em>LOT</em> of text</strong></p>

<p><br></p>

<h4 id="lists">Lists</h4>

<p>Lists are helpful for, well, lists of things.</p>

<p><strong>Ordered lists</strong> are created using "1." + Space:</p>

<ol>
<li>Ordered list item  </li>
<li>Ordered list item  </li>
<li>Ordered list item</li>
</ol>

<p><strong>Unordered list</strong> are created using "*" + Space:</p>

<ul>
<li>Unordered list item</li>
<li>Unordered list item</li>
<li>Unordered list item </li>
</ul>

<p>Or using "-" + Space:</p>

<ul>
<li>Unordered list item</li>
<li>Unordered list item</li>
<li>Unordered list item</li>
</ul>

<p><br></p>

<h4 id="blockquotes">Blockquotes</h4>

<blockquote>
  <p>Sometimes other people say smart things, and you may want to mention that through a blockquote callout. We've got you covered. Right angle brackets <strong>&gt;</strong> are used for block quotes.</p>
</blockquote>

<p><br></p>

<h4 id="linksandemail">Links and Email</h4>

<p>Want to link to a source? No problem. If you paste in url, like <a href="http://ghost.org">http://ghost.org</a> - it'll automatically be linked up. But if you want to customise your anchor text, you can do that too! </p>

<p>Simple inline link <code>http://www.axiantheme.com</code> <a href="http://www.axiantheme.com">http://www.axiantheme.com</a>, another inline link <code>[Ghostion](http://ghostion.ghostdemo.axiantheme.com)</code> <a href="http://ghostion.ghostdemo.axiantheme.com">Ghostion</a>, and one more inline link with title <code>[DigitalOcean](https://www.digitalocean.com/?refcode=3bb89a8961ff "The Best Hosting for Ghost")</code> <a href="https://www.digitalocean.com/?refcode=3bb89a8961ff" title="The Best Hosting for Ghost">DigitalOcean</a>. </p>

<p>An email <a href="mailto:example@example.com">example@example.com</a> link.</p>

<p><br></p>

<h4 id="strikethrough">Strikethrough</h4>

<p>Wrap with 2 tilde characters <strong>~~Strikethrough~~</strong> :</p>

<p><del>Strikethrough</del></p>

<p><br></p>

<h4 id="images">Images</h4>

<p>Images work too! Already know the URL of the image you want to include in your article? Simply paste it in like the following to make it show up.</p>

<p><code>![Ghostion](http://ghostdemo.axiantheme.com/ghostion/demo/sample_image.jpg)</code></p>

<p><img src="http://ghostdemo.axiantheme.com/ghostion/demo/sample_image.jpg" alt="Ghostion"></p>

<p>An inline image <img src="http://ghostdemo.axiantheme.com/ghostion/demo/ghostion_icon.jpg" alt="Ghostion Icon" title="Ghostion Icon">, title is optional. with the following code:</p>

<p><code>![Ghostion Icon](http://ghostdemo.axiantheme.com/ghostion/demo/ghostion_icon.jpg "Ghostion Icon")</code></p>

<p>A <img src="http://ghostdemo.axiantheme.com/ghostion/demo/ghostion_icon.jpg" alt="Ghostion Icon" title="Ghostion Icon"> reference style image, with this code <code>![Ghostion Icon][1]</code>.</p>

<p><code>[1]: http://ghostdemo.axiantheme.com/ghostion/demo/ghostion_icon.jpg "Ghostion Icon"</code>
<br> <br>
<br></p>

<h4 id="codes">Codes</h4>

<p>Got a streak of geek? We've got you covered there, too. You can write inline <code>&lt;code&gt;</code> blocks really easily with double backticks. </p>

<p>Want to show off something more comprehensive? 4 spaces of indentation or start with a line containing 3 or more backticks, and ends with the first line with the same number of backticks</p>

<pre><code class=" hljs css"><span class="hljs-class">.awesome-ghostion</span> <span class="hljs-rules">{
    <span class="hljs-rule"><span class="hljs-attribute">display</span>:<span class="hljs-value"> block</span></span>;
    <span class="hljs-rule"><span class="hljs-attribute">width</span>:<span class="hljs-value"> <span class="hljs-number">100</span>%</span></span>;
<span class="hljs-rule">}</span></span>
</code></pre>

<p>Ghostion supports syntax highlighting, powered by <a href="http://highlightjs.org/">Highlight.js</a></p>

<pre><code class=" hljs ruby">h1, h2, h3, h4, h5, h6 {  
    <span class="hljs-symbol">color:</span> darken(<span class="hljs-variable">$base_text_color</span>, <span class="hljs-number">10</span>%);
    font-<span class="hljs-symbol">family:</span> <span class="hljs-variable">$base_font_family</span>;
    font-<span class="hljs-symbol">weight:</span> bold;
}
a {  
    <span class="hljs-symbol">color:</span> <span class="hljs-variable">$primary_color</span>;
    <span class="hljs-variable">@include</span> transition(color <span class="hljs-number">0</span>.<span class="hljs-number">2</span>s ease-<span class="hljs-keyword">in</span>);
    &amp;<span class="hljs-symbol">:hover</span>, &amp;<span class="hljs-symbol">:focus</span> {
        <span class="hljs-symbol">color:</span> shade(<span class="hljs-variable">$primary_color</span>, <span class="hljs-number">15</span>%);
    }
}
</code></pre>

<p><br></p>

<h4 id="advancedusage">Advanced Usage</h4>

<p>There's one fantastic secret about Markdown. If you want, you can write plain old HTML and it'll still work! Very flexible.</p>

<p><span class="label">Regular Label</span> <span class="secondary radius label">Secondary Radius Label</span> <span class="alert round label">Alert Round Label</span> <span class="success label">Success Label</span></p>

<p><input type="text" placeholder="This is Input"></p>

<p><textarea placeholder="This is TextArea"></textarea></p>

<p><a href="#" class="button tiny">Tiny Button</a> <a href="#" class="button small">Small Button</a> <a href="#" class="button">Default Button</a> <a href="#" class="button large">Large Button</a></p>

<p><a href="#" class="button secondary">Secondary Button</a> <a href="#" class="button success">Success Button</a> <a href="#" class="button alert">Alert Button</a></p>

<p><a href="#" class="button radius">Radius Button</a> <a href="#" class="button round">Round Button</a> <a href="#" class="button disabled">Disabled Button</a></p>
