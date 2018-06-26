@extends('layout.user')
@section('content')
<div class="panel-body">
    @if($result=='success')
    <h4>Поздравляем! Квест выполнен успешно!</h4>
    @elseif($result=='timeend')
    <h4>Квест провален, время вышло!</h4>
    @else
    <h4>Квест провален!</h4>
    @endif
    <a href="{{route('quest.all')}}">
        <button type="submit" class="btn btn-success">
            <i class="fa fa-mail-reply"> Перейти ко всем квестам</i> 
        </button>
    </a>
</div>
@endsection
