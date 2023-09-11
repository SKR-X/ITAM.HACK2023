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
                        <th>Медали</th>
                    </tr>
                    <?endif;?>
                    <?$check = $queryArr['participants'][$i]['Club'];?>
                    <tr>
                    <td><?= $queryArr['participants'][$i]['ParticipantId'] ?></td>
                        <td><?= $queryArr['participants'][$i]['FIO'] ?></td>
                        <?php $id = $queryArr['participants'][$i]['CountryId'] ?>
                        <td><?= $queryArr['participants'][$i]['Grade'] ?></td>
                        <td><?= $queryArr['participants'][$i]['Weight'] ?></td>
                        <td><?= $queryArr['participants'][$i]['Medals'] ?></td>
                    </tr>
                    <? endfor; ?>
                </table>
                <?= (isset($queryArr['count']) && $queryArr['count'] > 50 && !($queryArr['count'] <= $queryArr['countCookie'])) ? "<a href= " . "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . " id=\"update\" onclick=\"updateList()\"><i class=\"fa fa-angle-double-down\" aria-hidden=\"true\" >" . "</i>" : '' ?>
        </div>
    </div>