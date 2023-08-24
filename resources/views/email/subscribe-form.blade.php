@php
    /* @var \App\Services\Dto\Forms\SubscribeDto $dto */
@endphp
<html lang="ru">
<head>
    <title>Новая подписка с сайта</title>
</head>
<body>
<p>{{$dto->getUrl()}}</p>
@if($dto->getNameForm())
    <p>Форма: {{$dto->getNameForm()}}</p>
@endif
<p>Почта: {{ $dto->getEmail() }}</p>
</body>
</html>