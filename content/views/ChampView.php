
<? if (isset($queryArr['champInfo'][0]['ChampName'])) : ?>
<div class="content">
    <div class="container">
        <? if (isset($queryArr['posts'])) : ?>
            <div class="marg"></div>
                    <? for ($i = 0; $i < count($queryArr['posts']); $i++) : ?>
                    <tr>
                        <h1 style="background-color: black;"><?= $queryArr['posts'][$i]['Header'] ?></h1><br>
                        <p><?= $queryArr['posts'][$i]['Info'] ?></p><br>
                        <img src="/app/content/images/post.jpg" style="width: 500px;height:500px;">
                        <p><?= $queryArr['posts'][$i]['Date'] ?></p>
                    </tr>
                
                    <? endfor; ?>
                <? else : ?>
                    <div class="marg"></div>
<div class="content">
    <div class="container">
                <table>
                    <? $check = ''?>
                    <? for ($i = 0; $i < count($queryArr['participants']); $i++) : ?>
                    <? if ($queryArr['participants'][$i]['Club']!=$check): ?>
                        <tr><td><h1>Команда <?=$queryArr['participants'][$i]['Club']?></h1></td></tr>
                        <tr>
                        <th class="th1">№</th>
                        <th><?= $lang['champ']['partFIO'] ?></th>
                        <th>Навык</th>
                        <th>ВУЗ</th>
                    </tr>
                    <?endif;?>
                    <?$check = $queryArr['participants'][$i]['Club'];?>
                    <tr>
                    <td><?= $queryArr['participants'][$i]['ParticipantId'] ?></td>
                        <td><?= $queryArr['participants'][$i]['FIO'] ?></td>
                        <?php $id = $queryArr['participants'][$i]['CountryId'] ?>
                        <td><?= $queryArr['participants'][$i]['Grade'] ?></td>
                        <td><?= $queryArr['participants'][$i]['Weight'] ?></td>
                    </tr>
                    <? endfor; ?>
                </table>
                <?= (isset($queryArr['count']) && $queryArr['count'] > 50 && !($queryArr['count'] <= $queryArr['countCookie'])) ? "<a href= " . "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . " id=\"update\" onclick=\"updateList()\"><i class=\"fa fa-angle-double-down\" aria-hidden=\"true\" >" . "</i>" : '' ?>
        </div>
    </div>
                <? endif; ?>
                <?= (isset($queryArr['count']) && $queryArr['count'] > 50 && !($queryArr['count'] <= $queryArr['countCookie'])) ? "<a href= " . "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . " id=\"update\" onclick=\"updateList()\"><i class=\"fa fa-angle-double-down\" aria-hidden=\"true\" >" . "</i>" : '' ?>
        </div>
    </div>
    <? else : ?>
    <div class="content"> <a href="/"><?= $lang['404err']['onMain'] ?></a></div>
    <? endif; ?>