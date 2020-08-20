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
            <p>1.Введите в первую ячейку английским шрифтом две буквы серии своего паспорта (ОБРАЗЕЦ: ВМ, НВ, КВ...);</p>
            <p>2. Введите во вторую ячейку все цифры своего номера паспорта (ОБРАЗЕЦ: 2365478);</p>
                <form method="get" >
                    @csrf
                    <div class="form-group">
                        <label for="seriya">Серия паспорта:</label>
                        <input type="text" name="seriya" size="30" class="form-control" placeholder="Введите Серию  паспорта">
                    </div>
                    <div class="form-group">
                    <label for="nomer">Номер паспорта:</label>
                    <input type="INT" name="nomer" size="30" class="form-control" placeholder="Введите номер паспорта">
                    </div>
                    <input id="submit" type="submit" value="Найти и вывести" class="btn btn-outline-success"><br/>
                </form>

        </div>
    @if($user)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p>Пользователь: {{$user->seriya}} {{$user->nomer}}</p>
                <p><i>Контактные данные</i></p> <p>ФИО: {{$user->fio}}</p>
                <p>Специальность: {{$user->special}}</p>
                <p><b>Форма обучения:</b>{{$user->status}}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    @endif
    @if($message)
        <div class="row">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{$message}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
        </div>
    @endif
        <p align="justify">Справки по тел.: <br/>
            деканат факультета ветеринарной медицины  (8-0212) 53-80-89, 53-80-68.<br/>
            деканат биотехнологического факультета 53-80-91.</p>
        <p align="center"><b>Памятка первокурснику</b></p>



        <p>Приступая к обучению студенту необходимо иметь:</p>
        <ul>
            <li> рабочую (теплую) верхнюю одежду и сапоги (для участия в сельхозработах);</li>
            <li> белый халат и шапочку.</li>
        </ul>
        <p align="justify">При поселении в общежитие не разрешается привозить и эксплуатировать электроприборы (электрочайник, кипятильник, электроплитка, электрообогреватель).</p>

        <p align="justify">Разрешается использовать холодильники не старше 10 лет.</p>

        <p align="justify">Содержание домашних животных в общежитиях УО ВГАВМ запрещено.</p>
@endsection
