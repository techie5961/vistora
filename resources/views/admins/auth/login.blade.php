@extends('layout.admins.auth')
@section('title')
    Login
@endsection
@section('main')
    <section class="w-full flex-auto align-center justify-center column g-10">
        {{-- form --}}
        <form method="POST" onsubmit="PostRequest(event,this,MyFunc.LoggedIn)" action="{{ url('admins/post/login/process') }}" class="w-full align-center column g-10 br-15px p-20px box-shadow bg-light max-w-500">
        {{-- logo image --}}
            <img style="filter:drop-shadow(0 0 10px var(--primary))" src="{{ asset(config('settings.logo')) }}" alt="Site Logo" class="h-50px">
            <strong class="font-1-5 font-weight-900">Admin Login</strong>
          {{-- csrf token --}}
          <input type="hidden" value="{{ @csrf_token() }}" name="_token" class="inp input">
            {{-- new input column --}}
            <div class="column g-5 w-full">
                <label>Admin Tag</label>
            <div class="cont">
                <input  name="id" readonly autocomplete="off" onfocus="this.removeAttribute('readonly')"  placeholder="Enter Admin Tag" type="text" class="inp input required">
            </div>
            </div>
             {{-- new input column --}}
            <div class="column g-5 w-full">
                <label>Password</label>
            <div class="cont">
                <input name="password" readonly autocomplete="new-password" onfocus="this.removeAttribute('readonly')" placeholder="Enter account password" type="password" class="inp input required">
            </div>
            </div>
           
            {{-- submit button --}}
            <button class="post">Login Safely</button>
           
        </form>
    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
            LoggedIn : function(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    window.location.href='{{ url('admins/dashboard') }}';
                }
            }
        }
    </script>
@endsection