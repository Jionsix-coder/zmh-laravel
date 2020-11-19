@extends('layout')

@section('title', 'အာမခံ')

@section('extra-css')

@endsection

@section('content')
<div class="ps-breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('landing.page') }}">ပင်မ</a></li>
            <li>အာမခံ</li>
        </ul>
    </div>
</div>
<div class="col-md-12 discipline-box">
    <h2>Unicode (ယူနီကုဒ်)</h2>
    <ol>
        @foreach ($texts as $text)
            <li>
                <p>{!! $text->text !!}</p>
            </li>
        @endforeach
    </ol>
</div>
@endsection

@section('extra-js')

@endsection