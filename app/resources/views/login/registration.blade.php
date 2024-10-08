@extends('base')

@section('title', 'Registration')

@section('content')
      <div class="container">
            @if($errors->any())
                  <div class="alert alert-danger">
                        <ul>
                              @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                              @endforeach
                        </ul>
                  </div>
            @endif
            <form class="col-md-6" method="POST" action="{{route('registration.store')}}">
                  @csrf 
                  <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password1" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                        <label for="exampleInputPassword2">Confirm password</label>
                        <input type="password" name="password2" class="form-control" id="exampleInputPassword2" placeholder="Confirm password">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
            </form>
      </div>
@endsection
