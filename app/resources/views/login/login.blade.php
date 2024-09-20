@extends('base')

@section('title', 'Login')

@section('content')
      <div class="container">
            @if (session('status'))
                  <div class="alert alert-sucess">
                        {{session('status')}}
                  </div>
            @endif
            @if($errors->any())
                  <div class="alert alert-danger">
                        <ul>
                              @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                              @endforeach
                        </ul>
                  </div>
            @endif
            <form class="col-md-6" method="POST" action="{{route('login.post')}}">
                  @csrf 
                  <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <button onclick="{{route('login.forgotPassword')}}"></button>
      </div>
@endsection
