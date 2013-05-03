<?php include('header.php'); ?>

    <section class="block">
        <h1>:: Vulnerability Map</h1>
    </section>

    <section class="block">
        <p>The vulnerability map shows you a list of pages categorised by type vulnerability.</p>
        <strong>:: Table of Content ::</strong>
        <ul>
            <li><a href="#cmdi">Command Injection</a></li>
            <li><a href="#xss">Cross-Site Scripting</a></li>
            <li><a href="#sqli">SQL Injection</a></li>
        </ul>

        <a name="cmdi"></a>
        <strong>Command Injection</strong>
        <ul>
            <li><a href="ping.php">Ping</a></li>
        </ul>

        <a name="xss"></a>
        <strong>Cross-Site Scripting</strong>
        <ul>
            <li><a href="login.php">Login</a></li>
        </ul>

        <a name="sqli"></a>
        <strong>SQL Injection</strong>
        <ul>
            <li><a href="login.php">Login</a></li>
        </ul>

    </section>

<?php include('footer.php'); ?>