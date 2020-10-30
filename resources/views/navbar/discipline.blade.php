@extends('navbar.navbarlayout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 discipline-box">
                <h2>Unicode (ယူနီကုဒ်)</h2>
                <ol>
                    @foreach ($texts as $text)
                        <li>
                            <p>{{ $text->text }}</p>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
@endsection

