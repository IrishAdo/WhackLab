<section class="block">
    <form name="iplookup" method="post">
        <label for="target">IP / Domain:</label>
        <input type="text" name="target">
        <label for="count" style="width:50px;">Count:</label>
        <input type="text" name="count" size="3" value="3" style="text-align: center;">
        <input type="submit" value="Go">
    </form>
    <hr>
    <?php if (isset($_REQUEST['target'])): ?>
        <?php
            $output = shell_exec("ping -c {$_REQUEST['count']} {$_REQUEST['target']}");
            if (empty($output)) {
                echo 'No output returned';
            } else {
                echo nl2br($output);
            }
        ?>
    <?php else: ?>
        Please enter an IP or a domain and a count value.
    <?php endif; ?>
</section>