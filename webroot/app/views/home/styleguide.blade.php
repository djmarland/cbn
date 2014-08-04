@extends('layouts.master')
@section('content')
    <h1>Styleguide</h1>

<div class="prose">
    <p>This styleguide lists all the components that make up this website. It is used in development to ensure everything is consistant and minimise redundancy.</p>

    <h2>Support</h2>
    <p>This website makes use of features to look great in the latest browsers, such as CSS alpha transparency, gradients and animation. However it is built with progressive enhancement in mind, and intended to be readable in all browsers. Internet Explorer 8 and below are not tested so may contain some layout issues due to their lack of modern features (such as <code>box-sizing</code>), but should still be readable.

    <h2>Main colour</h2>
    <p>The main highlight colour can be used in several ways</p>
    <p class="h-color">As a text colour</p>
    <code><pre>&lt;p class="h-color"&gt;As a text colour&lt;/p&gt;</pre></code>
    <p class="h-bg">As a background</p>
    <code><pre>&lt;p class="h-bg"&gt;As a background&lt;/p&gt;</pre></code>
    <p class="h-box">As a box (which sets inner colours)</p>
    <code><pre>&lt;p class="h-box"&gt;As a box (which sets inner colours)&lt;/p&gt;</pre></code>

    <h2>Links</h2>
    <p>This is a <a href="http://example.com/545665465">Standard Link</a></p>
    <p>This is a <a href="/styleguide">Visited Link</a></p>

    <h2>Grids</h2>
    <p>The grids are responsive, and as this site uses <code>box-sizing: border-box</code> it is simple. However as it uses <code>inline-block</code> care must be taken to eliminate white space between <code>.grid</code> elements.</p>

    <div class="grid"><div class="g g-1-1 g-m-1-2"><div class="h-box">Grid</div></div></div>
    <code><pre>&lt;div class="grid"&gt;&lt;div class="g g-1-1 g-m-1-2"&gt;Grid&lt;/div&gt;&lt;/div&gt;</pre></code>

    <p>The valid grid widths are the following fractions</p>

    <ul>
        <li><code>.g-1-1</code></li>
        <li><code>.g-1-2</code></li>
        <li><code>.g-1-3</code></li>
        <li><code>.g-2-3</code></li>
        <li><code>.g-1-4</code></li>
        <li><code>.g-3-4</code></li>
        <li><code>.g-1-6</code></li>
    </ul>

    <p>The grids have several different breakpoints. Many classes can be set to have a box change width at each breakpoint. They are set using <code>em</code> so will change depending on the browser zoom level, but generally correspond to:</p>

    <ul>
        <li>Unprefixed (All sizes) <code>.g-1-2</code></li>
        <li>Extra Small (320px+) <code>.g-xs-1-2</code></li>
        <li>Small (480px+) <code>.g-s-1-2</code></li>
        <li>Medium (600px+) <code>.g-m-1-2</code></li>
        <li>Large (768+) <code>.g-l-1-2</code></li>
        <li>Extra Large (976+) <code>.g-xl-1-2</code></li>
    </ul>

    <p>Example of a grid that collapses and reflows</p>

    <div class="grid"><!--
        --><div class="g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4"><div class="h-box spaced"><code>.g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4</code></div></div><!--
        --><div class="g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4"><div class="h-box spaced"><code>.g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4</code></div></div><!--
        --><div class="g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4"><div class="h-box spaced"><code>.g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4</code></div></div><!--
        --><div class="g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4"><div class="h-box spaced"><code>.g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4</code></div></div><!--
        --><div class="g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4"><div class="h-box spaced"><code>.g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4</code></div></div><!--
        --><div class="g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4"><div class="h-box spaced"><code>.g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4</code></div></div><!--
        --><div class="g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4"><div class="h-box spaced"><code>.g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4</code></div></div><!--
        --><div class="g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4"><div class="h-box spaced"><code>.g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4</code></div></div><!--
        --><div class="g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4"><div class="h-box spaced"><code>.g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4</code></div></div><!--
        --><div class="g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4"><div class="h-box spaced"><code>.g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4</code></div></div><!--
        --><div class="g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4"><div class="h-box spaced"><code>.g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4</code></div></div><!--
        --><div class="g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4"><div class="h-box spaced"><code>.g g-s-1-2 g-m-1-3 g-l-1-2 g-xl-1-4</code></div></div><!--
    --></div>

    <h2>Typography</h2>
    <p>The main content font is standard <code>sans-serif</code>, leaving it to the browser/device to render optimally. Headings are rendered using a web-font.</p>
    <p>The main window font size is the browser default, normally <code>16px</code>. This makes <code>1rem</code> = <code>16px</code>. Rems are used with pixel fallback.</p>

    <h3 class="a">Size A, also <code>&lt;h1&gt;</code></h3>
    <code><pre>&lt;p class="a"&gt;Size A&lt;/p&gt;</pre></code>
    <div class="a">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam fringilla orci et est rutrum, porttitor suscipit purus adipiscing. Sed vitae nisl eu risus cursus congue in et mauris. Ut semper nisi vel consequat tristique.</p>
        <p>In iaculis arcu nec nunc sodales, quis suscipit leo auctor. Vestibulum interdum rhoncus pretium. Praesent sollicitudin consequat lobortis. Nam et posuere erat. Fusce massa libero, posuere sit amet consequat eu, dignissim sed mauris. Donec sed velit pellentesque, aliquet lacus nec, gravida risus.</p>
    </div>

    <h3 class="b">Size B, also <code>&lt;h2&gt;</code></h3>
    <code><pre>&lt;p class="b"&gt;Size B&lt;/p&gt;</pre></code>
    <div class="b">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam fringilla orci et est rutrum, porttitor suscipit purus adipiscing. Sed vitae nisl eu risus cursus congue in et mauris. Ut semper nisi vel consequat tristique.</p>
        <p>In iaculis arcu nec nunc sodales, quis suscipit leo auctor. Vestibulum interdum rhoncus pretium. Praesent sollicitudin consequat lobortis. Nam et posuere erat. Fusce massa libero, posuere sit amet consequat eu, dignissim sed mauris. Donec sed velit pellentesque, aliquet lacus nec, gravida risus.</p>
    </div>

    <h3 class="c">Size C, also <code>&lt;h3&gt;</code></h3>
    <code><pre>&lt;p class="c"&gt;Size C&lt;/p&gt;</pre></code>
    <div class="c">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam fringilla orci et est rutrum, porttitor suscipit purus adipiscing. Sed vitae nisl eu risus cursus congue in et mauris. Ut semper nisi vel consequat tristique.</p>
        <p>In iaculis arcu nec nunc sodales, quis suscipit leo auctor. Vestibulum interdum rhoncus pretium. Praesent sollicitudin consequat lobortis. Nam et posuere erat. Fusce massa libero, posuere sit amet consequat eu, dignissim sed mauris. Donec sed velit pellentesque, aliquet lacus nec, gravida risus.</p>
    </div>

    <h3 class="d">Size D, also <code>&lt;h4&gt;</code></h3>
    <code><pre>&lt;p class="d"&gt;Size D&lt;/p&gt;</pre></code>
    <div class="d">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam fringilla orci et est rutrum, porttitor suscipit purus adipiscing. Sed vitae nisl eu risus cursus congue in et mauris. Ut semper nisi vel consequat tristique.</p>
        <p>In iaculis arcu nec nunc sodales, quis suscipit leo auctor. Vestibulum interdum rhoncus pretium. Praesent sollicitudin consequat lobortis. Nam et posuere erat. Fusce massa libero, posuere sit amet consequat eu, dignissim sed mauris. Donec sed velit pellentesque, aliquet lacus nec, gravida risus.</p>
    </div>

    <h3 class="e">Size E, also <code>&lt;h5&gt;</code>, <code>&lt;p&gt;</code> and <code>&lt;body&gt;</code></h3>
    <code><pre>&lt;p class="e"&gt;Size E&lt;/p&gt;</pre></code>
    <div class="e">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam fringilla orci et est rutrum, porttitor suscipit purus adipiscing. Sed vitae nisl eu risus cursus congue in et mauris. Ut semper nisi vel consequat tristique.</p>
        <p>In iaculis arcu nec nunc sodales, quis suscipit leo auctor. Vestibulum interdum rhoncus pretium. Praesent sollicitudin consequat lobortis. Nam et posuere erat. Fusce massa libero, posuere sit amet consequat eu, dignissim sed mauris. Donec sed velit pellentesque, aliquet lacus nec, gravida risus.</p>
    </div>

    <h3 class="f">Size F, also <code>&lt;h6&gt;</code> and <code>&lt;small&gt;</code></h3>
    <code><pre>&lt;p class="f"&gt;Size F&lt;/p&gt;</pre></code>
    <div class="f">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam fringilla orci et est rutrum, porttitor suscipit purus adipiscing. Sed vitae nisl eu risus cursus congue in et mauris. Ut semper nisi vel consequat tristique.</p>
        <p>In iaculis arcu nec nunc sodales, quis suscipit leo auctor. Vestibulum interdum rhoncus pretium. Praesent sollicitudin consequat lobortis. Nam et posuere erat. Fusce massa libero, posuere sit amet consequat eu, dignissim sed mauris. Donec sed velit pellentesque, aliquet lacus nec, gravida risus.</p>
    </div>


    <h2>Code blocks</h2>
    <p>A code block is displayed in monospace form as follows.</p>
    <code><pre>&lt;code&gt;&lt;/pre&gt;.selector { display: something }&lt;/pre&gt;&lt;/code&gt;</pre></code>

    <h2>Lists</h2>
    <p>A default unordered list will display as follows:</p>
    <ul>
        <li>Something</li>
        <li>Another thing</li>
        <li>A final thing</li>
    </ul>
    <code><pre>&lt;ul&gt;&lt;li&gt;Item&lt;/li&gt;&lt;li&gt;Item&lt;/li&gt;&lt;/ul&gt;</pre></code>

    <p>An unordered list inside an unordered list will display as follows:</p>
    <ul>
        <li>Item<ul>
        <li>Something</li>
        <li>Another thing</li>
        <li>A final thing</li>
    </ul></li>
        <li>Another thing</li>
        <li>A final thing</li>
    </ul>
    <code><pre>&lt;ul&gt;&lt;li&gt;Item&lt;&lt;ul&gt;&lt;li&gt;Item&lt;/li&gt;&lt;li&gt;Item&lt;/li&gt;&lt;/ul&gt;/li&gt;&lt;li&gt;Item&lt;/li&gt;&lt;/ul&gt;</pre></code>

    <p>A default ordered list will display as follows:</p>
    <ol>
        <li>Something</li>
        <li>Another thing</li>
        <li>A final thing</li>
    </ol>
    <code><pre>&lt;ol&gt;&lt;li&gt;Item&lt;/li&gt;&lt;li&gt;Item&lt;/li&gt;&lt;/ol&gt;</pre></code>

    <p>An ordered list inside an ordered list will display as follows:</p>
    <ol>
        <li>Item<ol>
        <li>Something</li>
        <li>Another thing</li>
        <li>A final thing</li>
    </ol></li>
        <li>Another thing</li>
        <li>A final thing</li>
    </ol>
    <code><pre>&lt;ol&gt;&lt;li&gt;Item&lt;&lt;ol&gt;&lt;li&gt;Item&lt;/li&gt;&lt;li&gt;Item&lt;/li&gt;&lt;/ol&gt;/li&gt;&lt;li&gt;Item&lt;/li&gt;&lt;/ol&gt;</pre></code>

    <p>An unstyled list:</p>
    <ul class="list--unstyled">
        <li>Something</li>
        <li>Another thing</li>
        <li>A final thing</li>
    </ul>
    <code><pre>&lt;ul class="list--unstyled"&gt;&lt;li&gt;Item&lt;/li&gt;&lt;li&gt;Item&lt;/li&gt;&lt;/ul&gt;</pre></code>

    <p>An inline list:</p>
    <ul class="list--inline">
        <li>Something</li>
        <li>Another thing</li>
        <li>A final thing</li>
    </ul>
    <code><pre>&lt;ul class="list--inline"&gt;&lt;li&gt;Item&lt;/li&gt;&lt;li&gt;Item&lt;/li&gt;&lt;/ul&gt;</pre></code>
</div>
@stop