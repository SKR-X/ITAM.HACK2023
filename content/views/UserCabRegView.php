<?php $help = $lang['reg']['help'] ?>
<div class="content">
<h1>ВАШ ID = <?=$queryArr['id']?></h1>
<button href="#" onclick="newPass(this)">Set new password</button><br>
<button onclick="newInfo(this)">Set new coach info</button>
<div id="newPass"><form class="log" method="POST" action="/UserCabReg/CheckPost">
    <span>Your e-mail</span>
    <input name="email" type="email" required>
    <span>Your password</span>
    <input name="oldPass" type="text">
    <span>New password</span>
    <input name="newPass" type="text">
    <input type="submit" value="Set new password">
</form></div>
<div id="regDiv">
        <form method="POST" action="/UserCabReg/Result">
            <span><?= $lang['reg']['FIO'] ?> <sup>*</sup></span>
            <input autocomplete="off" type="text" name="UserName" value=<?=$queryArr['info']['UserName'];?> required>
            <span>E-Mail <sup>*</sup></span>
            <input autocomplete="off" type="email" name="UserEmail" value=<?=$queryArr['info']['UserEmail'];?> required>
            <span><?= $lang['reg']['country'] ?> <sup>*</sup></span>
            <select name="UserCountry" id="Country" onchange='getUpdates()' required>
                <option value=""> - </option>
                <? if ($lang['lang']['name'] == 'RU') : ?>
                    <? for ($i = 0; $i < count($queryArr['countries']); $i++) : ?>
                        <option value=<?= $queryArr['countries'][$i]['CountryId'] ?>>
                            <?= $queryArr['countries'][$i]['CountryNameRu']; ?>
                        </option>
                    <? endfor; ?>
                <? elseif ($lang['lang']['name'] == 'EN') : ?>
                    <? for ($i = 0; $i < count($queryArr['countries']); $i++) : ?>
                        <option value=<?= $queryArr['countries'][$i]['CountryId'] ?>>
                            <?= $queryArr['countries'][$i]['CountryNameEn']; ?>
                        </option>
                    <? endfor; ?>
                <? elseif ($lang['lang']['name'] == 'UA') : ?>
                    <? for ($i = 0; $i < count($queryArr['countries']); $i++) : ?>
                        <option value=<?= $queryArr['countries'][$i]['CountryId'] ?>>
                            <?= $queryArr['countries'][$i]['CountryNameUa']; ?>
                        </option>
                    <? endfor; ?>
                <? endif; ?>
            </select>
            <span><?= $lang['reg']['region'] ?></span> <a href="javascript://" id="RegionA" onclick="help('Region')" class="doJS"><?= $help ?></a>
            <select name="UserRegion" id="Region" onchange="getRegionUpdate()">
                <option value="">
                    -
                </option>
            </select>
            <input autocomplete="off" type="text" id="RegionInput" class="hide" oninput="getContextSearch('Region');">
            <div id="RegionContext"></div>
            <span><?= $lang['reg']['city'] ?> <sup>*</sup></span> <a href="javascript://" id="CityA" onclick="help('City')" class="doJS"><?= $help ?></a>
            <select name="UserCity" id="City" required>
                <option value="">
                    -
                </option>
            </select>
            <input autocomplete="off" type="text" id="CityInput" class="hide" oninput="getContextSearch('City');">
            <div id="CityContext"></div>
            <span> Информация о вас </span><br>
            <textarea name="info" placeholder="Я такой вот..."></textarea><br>
            <span> Дата рождения </span><br>
            <input autocomplete="off" id="dateBr" name="DateBr" type="text" class="datepicker-here" data-language="<?= $lang['lang']['name'] ?>" readonly>
            <label>ВУЗ</label>
                    <input autocomplete="off" name="Weight">
            <label>Пол</label>
            <select name="Gender">
                        <option value="Ч(M)"><?= $lang['userPanel']['partSexM'] ?></option>
                        <option value="Ж(F)"><?= $lang['userPanel']['partSexF'] ?></option>
                    </select>
            <label> Навык </label>
            <select name="Grade">
                        <option value="Backend">Backend</option>
                        <option value="Frontend">Frontend</option>
                        <option value="ML">ML</option>
                        <option value="Manager">Manager</option>
                    </select>
            <span>Your password <sup>*</sup></span>
            <input autocomplete="off" type="text" name="oldPass" required>
            <input autocomplete="off" type="submit" value="Set">
        </form>
    </div>
</div>
<div style="height: 500px;"></div>