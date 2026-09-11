@extends('layout.users.auth')
@section('title')
    Login
@endsection
@section('main')
    
        <form action="{{ url('users/post/login/process') }}" method="POST" onsubmit="PostRequest(event,this,Completed)">
            {{-- logo --}}
            <div class="w-full column g-10 align-center text-center p-20">
                  <img onclick="window.location.href='{{ url('/') }}'" style="width:50%;" src="{{ asset(config('settings.logo')) }}" alt="Site Logo">
           {{-- new --}}
           <strong class="desc font-weight-900">Welcome Back</strong>
           <span class="opacity-07">Sign in to your {{ config('app.name') }} account</span>
            </div>
           
        {{-- container --}}
            <div class="w-full column g-10px p-20px">
               {{-- csrf token --}}
       <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
      

        {{-- new input --}}
        <div class="column g-2px w-full">
            <label>Username</label>
            <div class="cont w-full">
                <input name="username" readonly autocomplete="off" onfocus="this.removeAttribute('readonly')" placeholder="Registered username" type="text" class="inp input required">
            </div>
        </div>
        
         {{-- new input --}}
        <div class="column g-2px w-full">
            <label>Password</label>
            <div class="cont w-full">
                
                <input name="password" readonly autocomplete="new-password" onfocus="this.removeAttribute('readonly')" placeholder="Account password" type="password" class="inp input required">
            </div>
            <span onclick="Vitecss.navigate('{{ url('users/forgot/password') }}')" class="block m-left-auto c-primary no-select pointer">Forgot Password?</span>
        </div>
       
        
        {{-- submit btn --}}
        <button class="post">

            Sign In
        </button>
          </div> 
          {{-- new row --}}
          <div class="text-center m-bottom-20 w-full">
            Don't have an account? <a onclick="Vitecss.navigate('{{ url('register') }}')" class="pc-pointer font-weight-600 no-u c-primary no-select">Create one for free</a>
          </div>
         </form>
    
@endsection
@section('js')
    <script class="js">
      
           function  Completed(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    window.location.href='{{ url('users/dashboard') }}'
                    // Vitecss.navigate('{{ url('users/dashboard') }}')
                }
            }
        
    </script>
@endsection