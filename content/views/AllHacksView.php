<div class="marg"></div>
<div class="content">
    <div class="container">
                <table>
                        <tr>
                        <th class="th1">№</th>
                        <th>Название хакатона</th>
                        <th>Ссылка</th>
                        <th>Начало регистрации</th>
                        <th>Конец регистрации</th>
                        <th>Начало хакатона</th>
                        <th>Конец хакатона</th>
                    </tr>
                    <? $check = ''?>
                    <? for ($i = 0; $i < count($queryArr['hacks']); $i++) : ?>
                    <tr>
                    <td><?= $queryArr['hacks'][$i]['Auto_int'] ?></td>
                        <td><?= $queryArr['hacks'][$i]['ChampName'] ?></td>
                        <td><a href="/champ/<?= $queryArr['hacks'][$i]['UrlName'] ?>">Ссылка на хакатон</a></td>
                        <td><?= $queryArr['hacks'][$i]['DateStartReg'] ?></td>
                        <td><?= $queryArr['hacks'][$i]['DateEndReg'] ?></td>
                        <td><?= $queryArr['hacks'][$i]['DateBeginChamp'] ?></td>
                        <td><?= $queryArr['hacks'][$i]['DateEndChamp'] ?></td>
                    </tr>
                    <? endfor; ?>
                </table>
                <?= (isset($queryArr['count']) && $queryArr['count'] > 50 && !($queryArr['count'] <= $queryArr['countCookie'])) ? "<a href= " . "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . " id=\"update\" onclick=\"updateList()\"><i class=\"fa fa-angle-double-down\" aria-hidden=\"true\" >" . "</i>" : '' ?>
        </div>
    </div>