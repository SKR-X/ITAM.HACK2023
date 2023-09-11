<div class="content">
    <div class="div1">
        <div class="all">
            <h1>Моя команда</h1>
        </div>
        <div class="search">
            <label id="searchLabel">Поиск:</label><input autocomplete="off" type="text" oninput="getSportsmen(this,<?=$queryArr['id']?>)" id="searchInput">
        </div>
        <table id="table1">
            <tr id="head">
                <th id="FIO"><?= $lang['userPanel']['partFIO'] ?></th>
                <th id="date"><?= $lang['userPanel']['partDateBr'] ?></th>
                <th id="grade">Навык</th>
                <th class="check"></th>
            </tr>
            <? for ($i = 0; $i < count($queryArr['sportsmens']); $i++) : ?>
            <tr id=<?= $queryArr['sportsmens'][$i]['ParticipantId'] ?>>
                <td class="FIOSprt"><?= $queryArr['sportsmens'][$i]['FIO'] ?></td>
                <td class="dateBrSprt"><?= $queryArr['sportsmens'][$i]['DateBr'] ?></td>
                <td class="gradeSprt"><?= $queryArr['sportsmens'][$i]['Grade'] ?></td>
                <td><a class="editSprt" href="#" onClick="edit('<?= $queryArr['sportsmens'][$i]['ParticipantId'] ?>')">edit.</a><input autocomplete="off" class="sprt" onClick="sprt()" type="checkbox" form="form" name="<?= $queryArr['sportsmens'][$i]['ParticipantId'] ?>"></td>
                <td class="allInfoSprt"><?= $queryArr['sportsmens'][$i]['FIO'] ?>,<?= $queryArr['sportsmens'][$i]['DateBr'] ?>,<?= $queryArr['sportsmens'][$i]['Gender'] ?>,<?= $queryArr['sportsmens'][$i]['Grade'] ?>,<?= $queryArr['sportsmens'][$i]['Weight'] ?>,<?= $queryArr['sportsmens'][$i]['Kata'] ?>,<?= $queryArr['sportsmens'][$i]['Kumite'] ?>,<?= $queryArr['sportsmens'][$i]['ParticipantId'] ?>,<?= $queryArr['sportsmens'][$i]['Photo'] ?></td>
            </tr>
            <? endfor; ?>
        </table>
    </div>
    <div class="form">
        <div class="all">
            <h1>Зарегистрировать сокомандника</h1>
        </div>
        <form method="POST" action="/userpanel/CheckPostPanel" enctype="multipart/form-data">
        <div id="firstBlockForm">
                <label>Добавить по ID</label>
                <div id="fifthBlockForm">
                <input autocomplete="off" id="FIOInput" type="text" name="id" required>
                <input autocomplete="off" type="submit" class="enter" value="Добавить в команду" name="addNewOne">
            </div>
            </div>
        </form>
        <form id="form" method="POST" action="/userpanel/CheckPostPanel" enctype="multipart/form-data">
            <div id="firstBlockForm">
                <label><?= $lang['userPanel']['partFIO'] ?></label>
                <input autocomplete="off" id="FIOInput" type="text" name="FIO" required>
            </div>
            <div id="secondBlockForm">
                <div>
                    <label><?= $lang['userPanel']['partDateBr'] ?></label>
                    <input autocomplete="off" id="dateBr" name="DateBr" type="text" class="datepicker-here" data-language="<?= $lang['lang']['name'] ?>" readonly>
                </div>
                <div>
                    <label><?= $lang['userPanel']['partSex'] ?></label>
                    <select name="Gender">
                        <option value="Ч(M)"><?= $lang['userPanel']['partSexM'] ?></option>
                        <option value="Ж(F)"><?= $lang['userPanel']['partSexF'] ?></option>
                    </select>
                </div>
                <div>
                    <label>Навык</label>
                    <select name="Grade">
                        <option value="Backend">Backend</option>
                        <option value="Frontend">Frontend</option>
                        <option value="ML">ML</option>
                        <option value="Manager">Manager</option>
                    </select>
                </div>
                <div>
                    <label>ВУЗ</label>
                    <input autocomplete="off" type="text" name="Weight" required></input>
                </div>
            </div>
            <div id="redFile">
                <a href="#" onclick="showFileInput()">Edit photo</a>
            </div>
            <div id="thirdBlockForm">
                <label><?= $lang['userPanel']['partPhoto'] ?> - </label>
                <input autocomplete="off" type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                <input autocomplete="off" type="file" name="Photo">
            </div>
            <div id="fifthBlockForm">
                <input autocomplete="off" type="submit" class="enter" value="Добавить в команду" name="addNewOne" id="add">
                <input autocomplete="off" type="submit" class="enter" value="Зарегистрировать на турнир" name="moveSportsmen" id="move" disabled>
                <input autocomplete="off" type="submit" class="enter" value="Удалить из команды" name="delSprt" id="del1" disabled>
                <input autocomplete="off" type="submit" class="enter" value="Удалить из участия" name="delPrt" id="del2" disabled>
                <input autocomplete="off" type="button" class="enter" onclick="location.reload()" value="Отмена" name="redSprtCancel" id="cancel">
                <input autocomplete="off" type="submit" class="enter" value="<?= $lang['userPanel']['partRedSprt'] ?>" name="redSprt" id="red">
            </div>
            </form>
    </div>
    <div class="div1">
        <div class="all">
            <h1><?= $lang['userPanel']['partCur'] ?></h1>
        </div>
        <table id="table2">
            <tr id="head">
                <th class="fio"><?= $lang['userPanel']['partFIO'] ?></th>
                <th class="check"></th>
            </tr>
            <? for ($i = 0; $i < count($queryArr['participants']); $i++) : ?>
            <tr>
                <td><?= $queryArr['participants'][$i]['FIO'] ?></td>
                <td> <input autocomplete="off" class="prt" onClick="prt()" type="checkbox" form="form" name="<?= $queryArr['participants'][$i]['ParticipantId'] ?>"></td>
            </tr>
            <? endfor; ?>
        </table>
    </div>
</div>