You need to set a lang file at "app/lang/packages/{{ \App::getLocale() }}/whoops-report/message.php"'.
<br><br>

&lt;?php<br><br>

return [<br>
@foreach(WhoopsReport::messages() as $key => $value)
&nbsp;&nbsp;&nbsp;&nbsp;'{{ $key }}' => '{{ $value }}',<br>
@endforeach
];