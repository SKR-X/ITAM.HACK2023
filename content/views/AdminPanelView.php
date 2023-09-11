<div class="content">
    <div class="editpages">
        <form method="POST" action="/admin/checkPostPanel">
            <p> Create ChampPage: </p><br>
            <input autocomplete="off" type="text" name="urlName" placeholder="urlName" required><br><br>
            <input autocomplete="off" type="text" name="champName" placeholder="Название чемпионата" required><br><br>
            <input autocomplete="off" id="dateBr" name="startReg" type="text" class="datepicker-here" placeholder="Начало регистрации" data-language="<?= $lang['lang']['name'] ?>" readonly><br><br>
            <input autocomplete="off" id="dateBr" name="endReg" type="text" class="datepicker-here" placeholder="Конец регистрации" data-language="<?= $lang['lang']['name'] ?>" readonly><br><br>
            <input autocomplete="off" id="dateBr" name="start" type="text" class="datepicker-here" placeholder="Начало хакатона" data-language="<?= $lang['lang']['name'] ?>" readonly><br><br>
            <input autocomplete="off" id="dateBr" name="end" type="text" class="datepicker-here" placeholder="Конец хакатона" data-language="<?= $lang['lang']['name'] ?>" readonly><br><br>
            <input autocomplete="off" type="submit" name="CreatePage" value="Create">
        </form>
        <br>
        <form method="POST" action="/admin/checkPostPanel">
            <p> Delete ChampPage: </p><br>
            <input autocomplete="off" type="text" name="urlNameDel" placeholder="urlName" required><br><br>
            <input autocomplete="off" type="submit" name="DelPage" value="Delete">
        </form>
        <br>
        <form method="POST" action="/admin/checkPostPanel">
            <p> Создать пост: </p><br>
            <input autocomplete="off" type="text" name="champUrl" placeholder="Соревнование" required><br><br>
            <input autocomplete="off" type="text" name="header" placeholder="Заголовок" required><br><br>
            <textarea autocomplete="off" type="text" name="info" placeholder="Инфо" required></textarea><br><br>
            <input autocomplete="off" type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                <input autocomplete="off" type="file" name="Photo"><br><br>
            <input autocomplete="off" type="submit" name="CreatePost" value="Create">
        </form>
        <br>
        <form method="POST" action="/admin/checkPostPanel">
            <p> Дать награду: </p><br>
            <input autocomplete="off" type="text" name="id" placeholder="ID" required><br><br>
            <textarea autocomplete="off" type="text" name="info" placeholder="Инфо" required></textarea><br><br>
            <input autocomplete="off" type="submit" name="AddMedal" value="Create">
        </form>
        <!-- <p>cup_brovary</p>
        <form method="POST" action="/upload/cup_brovary" enctype="multipart/form-data">
        <input autocomplete="off" type="hidden" name="MAX_FILE_SIZE" value="3000000" />
            <input autocomplete="off" type="text" placeholder="Title" name="Title"><br><br>
            <input autocomplete="off" type="text" placeholder="url" name="url"><br><br>
            <input autocomplete="off" type="text" placeholder="int" name="CurrFight"><br><br>
            <input autocomplete="off" type="text" placeholder="Tatami" name="Tatami"><br><br>
            <input autocomplete="off" type="file" name="file"><br><br>
            <input autocomplete="off" type="submit"><br>
        </form> -->
    </div>
</div>