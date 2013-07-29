<?php

//********************************************************************
// do not edit this section

if(!defined("APPSDIR"))
    die("Direct access is not allowed!");

$app_dir = realpath(dirname(__FILE__));
// remove the full path of the document root
$app_dir = str_replace(ROOTDIR, "", $app_dir);

$page->setActivePage(basename($app_dir));

//********************************************************************


$page->addStylesheet("$app_dir/css/style.css");
//$page->addScript("$app_dir/scripts/appname.js");

$html = <<<HTML

    <section>
        <h2>How to write a Space API app?</h2>

        It's very straight forward to create a new app to be integrated with <a href="http://spaceapi.net" target="_blank">spaceapi.net</a>. This guide will help you to dive into the necessary details and to get your first app quickly done.

        <h3>1. Create the directory structure</h3>

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

        There are no strict rules how to structure your app but we recommend to use the one above. You are also given full freedom of how to template. Feel free to use your own templating style or to use a framework such as <a href="http://ellislab.com/codeigniter" target="_blank" rel="nofollow">CodeIgniter</a> or anything else with a small footprint.

        <!--<p class="spaceapi-box spaceapi-box-note"></p>-->

        <h3>5. Worthwhile readings</h3>

        You might be interested into some security topics.

        <ul>
            <li><a href="http://www.coverity.com/srl/a-guide-to-fixing-xss-for-devs.html">A practical guide to fixing XSS for developers</a></li>
        </ul>

    </section>
HTML;

$page->addContent($html);