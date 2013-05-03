    <aside>
        <header>Main Menu</header>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="vulnmap.php">Vulnmap</a></li>
        </ul>

        <?php if ($user->isLoggedIn()): ?>
        <header>User menu</header>
        <ul>
            <li><a href="profile.php">Profile</a></li>
            <!--<li><a href="mailbox.php">Mailbox</a></li>-->
        </ul>
        <?php endif; ?>
        <header>Tools</header>
        <ul>
            <li id="last-nav-item"><a href="ping.php">Ping</a></li>
        </ul>
    </aside>