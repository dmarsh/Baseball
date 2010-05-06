<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Baseball</title>
         <link rel="stylesheet" type="text/css" href="/gamechanger/css/reset.css"/>
        <link rel="stylesheet" type="text/css" href="/gamechanger/css/main.css"/>  
        <script type="text/javascript" src="/gamechanger/javascript/jquery1.4.2.min.js"></script>
        <script type="text/javascript" src="/gamechanger/javascript/gamechanger.js"></script>

    </head>
    <body>
        <div class="wrapper">
            <h1>Baseball Game for GameChanger</h1>
            <h2>Runners on 1st and 2nd.</h2>
            <form id="baseballForm" method="POST" action="/gamechanger/baseball.php">
                <ul>
                    <li>
                        <label for="balls">Balls</label>
                        <select id="balls" name="balls">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </li>
                    <li>
                        <label for="strikes">Strikes</label>
                        <select id="strikes" name="strikes">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </li>
                    <li>
                        <label for="outs">Outs</label>
                        <select id="outs" name="outs">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </li>
                </ul>
                <p class="clear"><input id="randomPlay" type="submit" value="Randomize a Play"/></p>
            </form>
            <div id="formData">&nbsp;</div>
        </div>
    </body>
</html>