<!DOCTYPE html>
<html lang="{{ \App::getLocale() }}">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Error: {{ $errors['message'] }} (Code: {{ $errors['code'] }})</h2>
<div>
    <div style="padding:10px 15px;border:5px solid #eee;background:#fafafa;">
        {{ $bug_description }}
        <form action="{{ $errors['url'] }}" method="{{ $errors['method'] }}" target="_blank">
            {{ WhoopsReport::parameterToTag($params) }}
            <br>
            <button type="submit">Reproduce the bug</button>
        </form>
    </div>
    <ul>
        <li>File: {{ $errors['file'] }} (Line: {{ $errors['line'] }})</li>
        <li>URL: {{ $errors['url'] }} (Method: {{ $errors['method'] }})</li>
        <li>Time: {{ \Carbon\Carbon::createFromTimestamp($errors['timestamp']) }} (Timestamp: {{ $errors['timestamp'] }}, Timezone: {{ Config::get('app.timezone') }})</li>
        <li>Referer: {{ $errors['referer'] }}</li>
        <li>
            User agent: {{ $errors['user_agent'] }}
            <form action="http://www.useragentstring.com/index.php" method="post" target="_blank" style="float:right;">
                <input type="hidden" name="uas" value="{{ $errors['user_agent'] }}">
                <button>Check</button>
            </form>
        </li>
    </ul>
    Reported by Whoops Report (<a href="//github.com/SUKOHI" target="_blank">SUKOHI</a>)
</div>
</body>
</html>
