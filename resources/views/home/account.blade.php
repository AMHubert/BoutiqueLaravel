@extends('shared.layout')
@section('content')
<section class="container-fluid my-3">
    <div class="row">
        <div class="offset-1 col-5">
            <div class="card">
                <h5 class="card-header">Mes Informations</h5>
                <div class="card-body">
                    <form action="{{route('user.changeinfo')}}" method="post">
                    @csrf
                        <div class="row">
                            <div class="col-6"><label for="name">Nom *</label></div>
                            <div class="col-6"><input type="text" id="name" name="name" class="form-control"
                                    value="{{$user->name}}"></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><label for="email">Email *</label></div>
                            <div class="col-6"><input type="email" id="email" name="email" class="form-control"
                                    value="{{$user->email}}"></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><label for="pass">Pass *</label></div>
                            <div class="col-6"><input type="password" id="pass" name="pass" class="form-control"
                                    placeholder="******"></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><label for="newpass">Retapez votre pass *</label></div>
                            <div class="col-6"><input type="password" id="newpass" name="newpass" class="form-control"
                                    placeholder="******"></div>
                        </div>
                        <div class="row">
                            <div class="offset-6 col-6">
                                <input type="submit" class="btn btn-outline-primary" value="Modifier">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-5"></div>
    </div>
</section>
@endsection
