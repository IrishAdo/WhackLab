<?php
    if (!empty($_POST)) {
        $uid = $_POST['uid'];
        //$username = $_POST['username'];
        $realname = $_POST['realname'];
        $born = $_POST['born'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        $about = $_POST['about'];

        $query = <<<SQL
                  UPDATE users SET

                  realname='{$realname}',
                  born='{$born}',
                  email='{$email}',
                  website='{$website}',
                  about='{$about}'
                  WHERE id={$uid}
SQL;
        $db->query($query);
    }
?>
<section class="block">
    <a href="?action=view">View</a> | Edit
</section>

<section class="block">
    <form name="edit-profile" method="post">
        <label for="username">Username:</label>
        <input type="text" disabled id="username" value="<?php echo $user->username; ?>"><br />
        <label for="realname">Realname:</label>
        <input type="text" name="realname" id="realname" value="<?php echo $user->realname; ?>"><br />
        <label for="born">Born:</label>
        <input type="text" name="born" id="born" value="<?php echo $user->born; ?>"><br />
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="<?php echo $user->email; ?>"><br />
        <label for="website">Website:</label>
        <input type="text" name="website" id="website" value="<?php echo $user->website; ?>"><br />
        <label for="about">About:</label><br />
        <textarea name="about" id="about" rows="7" cols="80"><?php echo $user->about; ?></textarea><br />
        <input type="hidden" name="uid" value="<?php echo $_COOKIE['uid']; ?>">
        <input type="submit" value="Save">
    </form>
</section>