<?php
$hasError = false;
$status = false;
if (isset($_POST) && !empty($_POST)) {
    // Make sure $username and $password is set
    $username = (isset($_POST['username'])) ? $_POST['username'] : '';
    $password = (isset($_POST['password'])) ? $_POST['password'] : '';

    if (empty($username) || empty($password)) {
        $message = 'You must fill out username and password';
    } else {
        // Remove spaces from username. This should eliminate all SQL injection possibilities right?
        $username = str_replace(' ', '', $username);
        $password = md5($password);

        try {
            $query = "SELECT * FROM users WHERE username='{$username}' AND password_weak='{$password}'";
            $result = $db->query($query);
            if (false !== ($user = $result->fetchObject('stdClass'))) {
                setcookie('username', $user->username);
                setcookie('uid', $user->id);
                $status = true;
            } else {
                $message = 'Wrong username or password';
            }
        } catch (PDOException $e) {
            $hasError = true;
        }
    }
}
?>

<?php if ($hasError): ?>
    <section class="block">
        <strong>File:</strong> <?php echo $e->getFile(); ?><br />
        <strong>Line:</strong> <?php echo $e->getLine(); ?><br />
        <strong>Code:</strong> <?php echo $e->getCode(); ?><br />
        <strong>Message:</strong> <?php echo $e->getMessage(); ?><br />
        <strong>Query:</strong> <?php echo $query; ?>
    </section>
<?php endif; ?>

<?php if (isset($message)): ?>
    <section class="block">
        <?php echo $message; ?>
    </section>
<?php endif; ?>

<script type="text/javascript">
    var validateForm = function() {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        if (username.match(/\s+/) || password.match(/\s+/)) {
            alert('Invalid username or password format');
            return false;
        }
    }
</script>

<section class="block">
    <?php if (!$status): ?>
        <form name="login" method="post" onsubmit="return validateForm()">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username"><br />
            <label for="password">Password:</label>
            <input type="password" name="password" id="password"><br />
            <input type="submit" value="Login">
        </form>
    <?php else: ?>
        <a href="profile.php">Login successful! Click here to go to your profile</a>
    <?php endif; ?>
</section>