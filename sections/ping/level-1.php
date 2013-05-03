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
        $target = explode(';', $_POST['target']);
        $count = $_POST['count'];

        if (empty($target[0])) {
            echo 'Invalid IP or domain';
        } else {
            $output = shell_exec("ping -c {$count} {$target[0]}");
            if (empty($output)) {
                echo 'No output returned';
            } else {
                echo nl2br($output);
            }
        }
        ?>
    <?php else: ?>
        Please enter an IP or a domain and a count value.
    <?php endif; ?>
</section>