<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Central Dispatch Fetcher</title>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap-docs.css"  />
        <script src="/js/jquery.min.js"></script>
        <style>
            html { background: #dfdfdf;}
            body { background: white; width: 94%; margin: auto; padding: 5px;}
        </style>
    </head>
    <body>
    <?php
        
        $prev_values = explode("\n", file_get_contents(__DIR__ . '/prev_values.ini'));

        $session_value = trim(isset($prev_values[0]) ? $prev_values[0] : 'session id');
        $csrf_token_value = trim(isset($prev_values[1]) ? $prev_values[1] : 'CSRF token');

        if (isset($_POST['update_button'])) {
            $csrf_token_value = (isset($_POST['csrf_token_value']) ? $_POST['csrf_token_value'] : $csrf_token_value);
            $session_value = (isset($_POST['session_value']) ? $_POST['session_value'] : $session_value);

            file_put_contents(__DIR__ . '/prev_values.ini', implode("\n", [$session_value, $csrf_token_value]));
            echo '<div>Saved!</div>';
        } 
    ?>
    <form name='session_form' id='session_form' method='POST' action='/set_cookie.php'>
        <div>
            <label for='session'>PHPSESSID: </label>
            <input name='session_value' id='session' value='<?= $session_value ?>' style='width: 550px;'>
        </div>
        <div>
            <label for='csrf_token'>CSRF_TOKEN: </label>
            <input name='csrf_token_value' id='csrf_token' value='<?= $csrf_token_value ?>' style='width: 550px;'>
        </div>
        <div>
            <input type='submit' value='Submit' name='update_button'>
        </div>
    </form>

    </body>
</html>