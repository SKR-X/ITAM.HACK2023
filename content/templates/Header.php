<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ITAM.HACK</title>
  <script type="text/javascript" src="/app/JS/LangScript.js"></script>
  <link rel="stylesheet" type="text/css" href=<?= '/app/content/styles/' . $config['css'] . '.css' ?>>
  <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=800">
    <script type="text/javascript" src="/app/JS/Cookies.js"></script>
    <script type="text/javascript" src="/app/JS/MenuMobile.js"></script>
    <script type="text/javascript" src="/app/JS/Ajax.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
  <header>
    <div class="headercontent">
      <div class="hdrlogo"><a href="/" style="text-decoration: none; color: inherit; font-size:35px; font-weight: bold; cursor: pointer;">
          <label><label style="color:purple;">ITAM</label><label style="color:white;">.HACK</label></a></div>
        <div class="lang">
            <div class="dropdown" id="specmob">
                <div class="dropbtn" onclick="menu2()"><?= $lang['lang']['name'] ?></div>
                <div class="dropdown-content" id="cntmenu">
                    <span id="gb" onclick="setLang('gb')">EN</span><span id="ru" onclick="setLang('ru')">RU</span>
                </div>
            </div>
        </div>
    </div>
  </header>