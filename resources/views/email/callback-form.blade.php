@php
    /* @var \App\Services\Dto\Forms\CallbackFormsDto $params */
@endphp
<html lang="ru">
<head>
    <title>Обратная форма</title>
</head>
<body>
<p>{{$params->getUrl()}}</p>
@if($params->getNameForm())
    <p>Форма: {{$params->getNameForm()}}</p>
@endif
<p>Имя: {{ $params->getName() }}</p>
<p>Телефон: {{ $params->getPhone()  }}</p>
@if($params->getEmail())
    <p>Почта: {{ $params->getEmail() }}</p>
@endif
</body>
</html>