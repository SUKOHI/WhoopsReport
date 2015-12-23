<!DOCTYPE html>
<html lang="{{ \App::getLocale() }}">
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>

<div class="modal-dialog">
    <h2>{{ trans('whoops-report::message.title') }}</h2>
    <div class="modal-content" style="background: #ECECEC;">
        <br>
        <div class="text-center">
            <span style="font-size:50px;color:#FFF;background:#2A80B9;border-radius: 50px;padding:15px;">
                <i class="fa fa-bug fa-lg"></i>
            </span>
        </div>
        <br>
        <div id="div-forms">
            <form action="{{ route('whoops-report') }}" method="post">
                <div class="modal-body">
                    <div>
                        <div class="glyphicon glyphicon-chevron-right"></div>
                        <span>{{ trans('whoops-report::message.description') }}</span>
                    </div>
                    <textarea id="bug_description" name="bug_description" class="form-control" rows="7"></textarea>
                </div>
                <div class="modal-footer">
                    <div>
                        <button id="submit_button" type="submit" class="btn btn-primary btn-lg btn-block">{{ trans('whoops-report::message.button') }}</button>
                    </div>
                </div>
                <input type="hidden" name="errors[message]" value="{{ $exception->getMessage() }}">
                <input type="hidden" name="errors[file]" value="{{ $exception->getFile() }}">
                <input type="hidden" name="errors[line]" value="{{ $exception->getLine() }}">
                <input type="hidden" name="errors[url]" value="{{ URL::full() }}">
                <input type="hidden" name="errors[code]" value="{{ $exception->getCode() }}">
                <input type="hidden" name="errors[method]" value="{{ Request::method() }}">
                <input type="hidden" name="errors[timestamp]" value="{{ time() }}">
                <input type="hidden" name="errors[referer]" value="{{ array_get($_SERVER, 'HTTP_REFERER', '(none)') }}">
                <input type="hidden" name="errors[user_agent]" value="{{ array_get($_SERVER, 'HTTP_USER_AGENT', '(none)') }}">
                {{ WhoopsReport::parameterToTag(Input::all(), [], 'params') }}
            </form>
        </div>
    </div>
</div>
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){

        $('#bug_description').focus();
        $('#submit_button').on('click', function(){

            return confirm('{{ trans('whoops-report::message.confirm') }}');

        });

    });
</script>
</body>
</html>