<?php

//********************************************************************
// do not edit this section

if(!defined("APPSDIR"))
    die("Direct access is not allowed!");

//********************************************************************


$page->addStylesheet("css/style.css");
//$page->addScript("scripts/appname.js");

$appsdir = APPSDIR;

$html = <<<HTMLCONTENT

    <section>
        <h2>How to write a Space API app?</h2>

        <p>
            It's very straightforward to create a new app to be integrated with <a href="http://%SITEURL%" target="_blank">%SITEURL%</a>. This guide will help you to dive into the necessary details and to get your first app quickly done.
        </p>

        <p class="spaceapi-box spaceapi-box-note">
            This guide is yet incomplete but it should give you already some useful information. It's best you clone from the <a href="https://github.com/SpaceApi/spaceapiapp_how-to-write-an-app-skeleton" target="_blank">app skeleton</a> repository. The whole website was developed by <a href="http://twitter.com/slopjong" target="_blank">@slopjong</a>, if you have questions just ask him for details.
        </p>

        <h3>Create the directory structure</h3>

        In the <em>app</em> directory create the files as shown below.

        <pre>
 skeleton
   |-- app.php<!--   |-- app.html-->
   |-- css
   |   `-- style.css
   |-- meta.json
   |-- scripts
   |   `-- appname.js
   `-- templates
       `-- appname.html
</pre>

        <table>
            <thead>
                <tr><th>File</th><th>Required</th><th>Description</th></tr>
            </thead>
            <tbody>
                <tr>
                    <td>app.php</td>
                    <td>yes <!--not always (see the note below)--></td>
                    <td>This file contains the main code to inject the content in the page as well as necessary javascript and stylesheets. In this file you define a class which must inherit from the <code>Page</code> class.</td>
                </tr>
                <!--
                <tr>
                    <td>app.html</td>
                    <td>not always (see the note below)</td>
                    <td>If your app is completely javascript-based this file contains the HTML to be rendered while including javascript and stylesheets on top of the page. the main code to inject the content in the page as well as necessary javascript and stylesheets. In this file you define a class which must inherit from the <code>Page</code> class.</td>
                </tr>
                -->
                <tr>
                    <td>meta.json</td>
                    <td>yes</td>
                    <td>This file contains meta information about the app itself but also about the developers and their home hackerspaces. Some of these information are displayed in the footer.</td>
                </tr>
                <tr>
                    <td>style.css</td>
                    <td>no</td>
                    <td>The place where you should put all your CSS rules. The template file or <em>app.php</em> should never contain any rules. This will allow your browser to make use of the cache on your next visit.</td>
                </tr>
                <tr>
                    <td>appname.js</td>
                    <td>no</td>
                    <td>If your app needs some javascript put it in this file for the same reason as you put your CSS rules in <em>style.css</em>. Browsers will cache it. Additionally this allows us to make use of the <a href="http://www.w3.org/TR/CSP/" target="_blank">Content Security Policy</a>.</td>
                </tr>
                <tr>
                    <td>appname.html</td>
                    <td>no</td>
                    <td>If your app consists a lot of HTML you are encouraged to outsource it. Add placeholders to your template file <em>appname.html</em> and use <code>str_replace</code> in <em>app.php</em> to render the actual app content. Afterwards call <code>\$this->addContent()</code> in <em>app.php</em> with the rendered template as the parameter.</td>
                </tr>
            </tbody>
            <tfoot>
                <tr><td colspan="3">Replace <em>appname</em> with something more meaningful, maybe your app name?</td></tr>
            </tfoot>
        </table>

        There are no strict rules how to structure your app but we recommend to use the one above. You are also given full freedom of how to template. Feel free to use your own templating style or to use a framework such as <a href="http://twig.sensiolabs.org/" target="_blank" rel="nofollow">Twig</a>, <a href="http://ellislab.com/codeigniter" target="_blank" rel="nofollow">CodeIgniter</a> or anything else with a small footprint.

        <h3>File contents</h3>

        <h4>meta.json</h4>

        <pre><code>{
    "App": "My app name",
    "Description": "Little description of this app.",
    "Authors": [
        {
            "Name": "John Doe",
            "Nickname": "johndoe",
            "Hackerspace": "johndoespace"
        }
    ],
    "License": "",
    "Created": "29.7.2013"
}
</code></pre>

        The field <em>Authors</em> is an array of objects, one object for each contributor. So if multiple people are working on the app, list them all.

        <h4>app.php</h4>

        <pre><code>&lt;?php

if(!defined("APPSDIR"))
    die("Direct access is not allowed!");


// inject your stylesheet if you need it
//\$page->addStylesheet("css/style.css");

// inject your javascript if you need it
//\$page->addScript("scripts/appname.js");

// you can use a heredoc or a nowdoc to write your page content
\$html = &lt;&lt;&lt;HTML

    &lt;section>
        &lt;h2>Hello World!&lt;/h2>
        It's very straightforward to create a new app. Just have a look at the documentation or at existing apps.
    &lt;/section>

HTML;

\$page->addContent(\$html);
</code></pre>

        <h3>Placeholders</h3>

        You can use the following placeholders in your HTML.

        <table>
            <thead>
                <tr>
                    <th>Placeholder</th><th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>&#37;SITEURL&#37;</td><td>This placeholder will be replaced with %SITEURL%.</td>
                </tr>
                <tr>
                    <td>&#37;APPDIR&#37;</td><td>This value will be replaced with the full path to your app directory.</code>.</td>
                </tr>
            </tbody>
        </table>

        <h3>PHP constants</h3>

        The following constants are available.

        <table>
            <thead>
                <tr>
                    <th>Constant</th><th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        SPECSDIR</td><td>The directory with the specification files, one for each version. These are all JSONs and are provided throuth URLs like <a href="http://%SITEURL%/specs/0.13" target="_blank">%SITEURL%/specs/0.13</a> while 0.13 is the version number, leaded by a zero and a dot.
                        <pre><code> specs
   |-- changelog
   `-- versions
       |-- 11.json
       |-- 12.json
       |-- 13.json
       |-- 8.json
       `-- 9.json</code></pre>
                        If you need a specs file, just execute something like <code>\$specs = file_get_contents(SPECSDIR . '13.json');</code>.
                    </td>
                </tr>
                <tr>
                    <td>DIRECTORY</td><td>Keeps the <a href="http://%SITEURL%/directory.json" target="_blank">directory</a>. With <code>file_get_contents(DIRECTORY)</code> you read the directory directly from the file system and save an HTTP request.</td>
                </tr>
                <tr>
                    <td>STATUSCACHEDIR</td><td>The directory where all cached endpoint JSONs are kept.
                    <pre><code>status
   |-- 091_labs.json
   |-- ace_monster_toys.json
   |-- ackspace.json
   |-- backspace.json
   |-- bitlair.json
   |-- cccfr.json
   |-- chaos_darmstadt.json
   |-- chaos_inkl_.json
   |-- ...
</code></pre>Instead of crawling all the JSONs from the endpoints you can use these cached files, which are updated every day. This helps to reduce HTTP requests and thus you minimize execution time and bandwidth.

To read a cached endpoint file just use something like <pre><code>\$filename = NiceFileName::get('"Laboratorio Hacker de Campinas');
\$endpoint = file_get_contents(STATUSCACHEDIR . \$filename . '.json');</code></pre>

The class <em>NiceFileName</em> provides the <em>get</em> method which maps the original space name to the file name. The space names themselves can be taken from the directory, where they're the keys for the endpoint URLs.
</td>
                </tr>
            </tbody>
        </table>

        <h3>Worthwhile readings</h3>

        You might be interested into some security topics.

        <ul>
            <li><a href="http://www.coverity.com/srl/a-guide-to-fixing-xss-for-devs.html">A practical guide to fixing XSS for developers</a></li>
        </ul>

    </section>
HTMLCONTENT;

$page->addContent($html);