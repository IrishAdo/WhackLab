<section class="block">
    <form name="iplookup" method="post">
        <label for="target">IP / Domain:</label>
        <input type="text" name="target">
        <label for="count">Count:</label>
        <input type="text" name="count" size="3" value="3" style="text-align: center;">
        <input type="submit" value="Go">
    </form>
    <hr>
    <?php if (isset($_POST['target'])): ?>
        <?php
        $target = $_POST['target'];
        $count = $_POST['count'];

        $isIp = false;
        $isDomain = false;
        $errors = array();

        if (preg_match('/(;|\||&&)/', $target)) {
            $errors[] = 'Invalid IP or domain';
        }

        if (!preg_match('/^\d+$/', $count)) {
            $errors[] = 'Count must be a number';
        } else {
            if (($count == 0) || ($count > 15)) {
                $errors[] = 'Count must be between 1 and 15';
            }
        }



        if (!empty($errors)) {
            echo "<strong>Errors:</strong><br />\n";
            foreach ($errors as $error) {
                echo "&bull; {$error}<br />\n";
            }
        } else {
            $output = shell_exec("ping -c {$count} {$target}");
            if (empty($output)) {
                echo "Unable to ping '{$target}'";
            } else {
                echo nl2br($output);
            }
        }
        ?>
    <?php else: ?>
        Please enter an IP or a domain and a count value.
    <?php endif; ?>
</section>