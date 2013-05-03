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
        $username = strip_tags($username);
        $username = preg_replace('/[^\p{L}\d+-_]+/i', '', $username);

        try {
            $query = "SELECT * FROM users WHERE username=:username";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':username', $username);
            if (!$stmt->execute()) {
                $message = 'Wrong username and/or password';
            } else {
                $user = $stmt->fetchObject('stdClass');
                if (crypt($password, $user->password_strong) != $user->password_strong) {
                    $message = 'Wrong username and/or password';
                } else {
                    $fingerprint = hash('sha512', $user->id.$_SERVER['USER_AGENT'].$_SERVER['REMOTE_ADDR'].$user->username);
                    $_SESSION['fingerprint'] = $fingerprint;
                    setcookie('username', base64_encode($user->username), null, null, null, false, true);
                    setcookie('uid', base64_encode($user->id), null, null, null, false, true);
                    $status = true;
                }
            }
        } catch (PDOException $e) {
            $hasError = true;
        }
    }
}
?>

<?php if (isset($message)): ?>
    <section class="block">
        <?php echo $message; ?>
    </section>
<?php endif; ?>

<script type="text/javascript">
    var validateForm = function() {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        if ((!username.match(/^([\u0000-\u0080]+|[\w\d]+)$/g)) || (!password.match(/^([\u0000-\u0080]+|[\d\w\W]+)$/g))) {
            alert('Error');
            return false;
        }
    }
</script>

<?php if (!status): ?>
<section class="block">
    <form name="login" method="post" onsubmit="return validateForm()">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username"><br />
        <label for="password">Password:</label>
        <input type="password" name="password" id="password"><br />
        <input type="submit" value="Login">
    </form>
</section>
<?php else: ?>
<section class="block">
    <a href="profile.php">Login successful. Go to your profile</a>
</section>
<?php endif; ?>