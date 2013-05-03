<section class="block">
    View | <a href="?action=edit">Edit</a>
</section>

<section class="block">
    <span class="label">Username:</span> <?php echo $user->username; ?><br />
    <span class="label">Real name:</span> <?php echo $user->realname; ?><br />
    <span class="label">Born:</span> <?php echo $user->born; ?><br />
    <span class="label">Email:</span> <?php echo $user->email; ?><br />
    <span class="label">Website:</span> <?php echo $user->website; ?><br />
    <span class="label">About:</span><br />
    <?php echo $user->about; ?>
</section>