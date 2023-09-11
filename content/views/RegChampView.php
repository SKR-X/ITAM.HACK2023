<?php $help = $lang['reg']['help'] ?>
<div class="content">
    <div class="regdiv">
        <form method="POST" action="/registerchamp/result">
            <span><?= $lang['reg']['FIO'] ?> <sup>*</sup></span>
            <input autocomplete="off" type="text" name="UserName" required>
            <span>E-Mail <sup>*</sup></span>
            <input autocomplete="off" type="email" name="UserEmail" required>
            <br>
            <input autocomplete="off" type="submit" value=<?= $lang['reg']['done'] ?>>
        </form>
    </div>
</div>