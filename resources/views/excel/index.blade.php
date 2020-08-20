@extends('layouts.layout', ['title' => 'Информация о зачисленных'])

@section('content')

        @if(isset($_GET['search']))
            @if(count($posts)>0)
                <h2>Результаты поиска по запросу "<?=htmlspecialchars($_GET['search'])?>"</h2>
                <p class="lead">Всего найдено: {{ count($posts) }}</p>
            @else
                <h2>По запросу "<?=htmlspecialchars($_GET['search'])?>" ничего не найдено</h2>
                <a href="{{ route('post.index') }}" class="btn btn-outline-primary">Отоброзить все посты</a>
            @endif
        @endif
        <div class="row-12">

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p>Все прошло успешно!!!!</p>
            </div>
            <div class="card-btn">
                <a href="{{ route('post.index') }}" class="btn btn-outline-primary">На главную</a>
            </div>
@endsection
