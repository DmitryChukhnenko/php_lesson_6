@extends('base')

@section('title', 'Change password')

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
            <form class="col-md-6" method="POST" action="{{route('changepassword.post')}}">
                  @csrf 
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
