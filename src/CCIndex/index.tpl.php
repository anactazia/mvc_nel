<h1>Index Controller</h1>
<p>Welcome to Nel index controller.</p>

<h2>Download</h2>
<p>You can download Nel from github.</p>
<blockquote>
<code>git clone git://github.com/anactazia/mvc_nel.git</code>
</blockquote>
<p>You can review its source directly on github: <a href='https://github.com/anactazia/mvc_nel'>https://github.com/anactazia/mvc_nel</a></p>

<h2>Installation</h2>
<p>First you have to make the data-directory writable. This is the place where Nel needs
to be able to write and create files.</p>
<blockquote>
<code>cd mvc_nel; chmod 777 site/data</code>
</blockquote>
<p>Then change RewriteBase in the .htaccess file so that it points to your own base directory.</p>
<blockquote>
<code>(Example: RewriteBase /~anza13/phpmvc/me/kmom07/nel/mvc_nel/)</code>
</blockquote>
<p>Nel has some modules that need to be initialised. You can do this through a
controller. Point your browser to the following link.</p>
<blockquote>
<a href='<?=create_url('module/install')?>'>module/install</a>
</blockquote>
<p>Congratulations, you now have your own website!.</p>

