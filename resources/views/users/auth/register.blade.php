@extends('layout.users.auth')
@section('title')
    Register
@endsection
@section('main')
    
        <form x-data="{ 
            Checked : false
         }" action="{{ url('users/post/register/process') }}" method="POST" onsubmit="PostRequest(event,this,Completed)">
             {{-- logo --}}
            <div class="w-full column g-10 align-center text-center p-20">
                  <img onclick="window.location.href='{{ url('/') }}'" style="width:50%;" src="{{ asset(config('settings.logo')) }}" alt="Site Logo">
             {{-- new --}}
           <strong class="font-size-1-5rem font-weight-900">Create Account</strong>
           <span class="opacity-07">Please fill in your details for free.</span>
             
            </div>
            </div>
         
        {{-- container --}}
            <div class="w-full column g-10px p-20px">
           
       {{-- csrf token --}}
       <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
       <div class="row align-center g-10 w-full">

        {{-- new input --}}
        <div class="column g-2px w-full">
            <label>First Name</label>
            <div class="cont w-full">

                <input name="first_name" placeholder="E.g David" type="text" class="inp input required">
            </div>
        </div>
         {{-- new input --}}
        <div class="column g-2px w-full">
            <label>Last Name</label>
            <div class="cont w-full">
                <input name="last_name" readonly autocomplete="off" onfocus="this.removeAttribute('readonly')" placeholder="E.g James" type="text" class="inp input required">
            </div>
        </div>
       </div>

          {{-- new input --}}
        <div class="column g-2px w-full">
            <label>Username</label>
            <div class="cont w-full">

                <input name="username" readonly autocomplete="off" onfocus="this.removeAttribute('readonly')" placeholder="Enter your username" type="text" class="inp input required">
            </div>
        </div>

        {{-- new input --}}
        <div class="column g-2px w-full">
            <label>Email Address</label>
            <div class="cont w-full">

                <input name="email" readonly autocomplete="off" onfocus="this.removeAttribute('readonly')" placeholder="E.g you@gmail.com" type="email" class="inp input required">
            </div>
        </div>
         {{-- new input --}}
        <div class="column g-2px w-full">
            <label>Phone Number</label>
            <div class="cont w-full">

                <input name="phone" readonly autocomplete="off" onfocus="this.removeAttribute('readonly')" placeholder="E.g 09012345678" type="number" class="inp input required">
            </div>
        </div>
         {{-- new input --}}
        <div class="column g-2px w-full">
            <label>Referral(optional)</label>
            <div class="cont w-full">

                <input value="{{ $ref }}" name="ref" readonly autocomplete="off" onfocus="this.removeAttribute('readonly')" placeholder="Enter referral code" type="text" class="inp input">
            </div>
        </div>
         {{-- new input --}}
        <div class="column g-2px w-full">
            <label>Password</label>
            <div class="cont w-full">

                <input name="password" readonly autocomplete="new-password" onfocus="this.removeAttribute('readonly')" placeholder="Enter password" type="password" class="inp input required">
            </div>
        </div>
         {{-- new input --}}
        <div class="column g-2px w-full">
            <label>Confirm Password</label>
            <div class="cont w-full">

                <input name="confirm_password" readonly autocomplete="new-password" onfocus="this.removeAttribute('readonly')" placeholder="Retype password" type="password" class="inp input required">
            </div>
        </div>
        {{-- agree prompt --}}
        <label x-on:click="Checked = !Checked" class="w-ful g-5px row no-select align-center g-2px">
           <div x-transition:enter.duration.500ms x-transition:leave.duration.500ms x-bind:class="Checked ? 'bg-primary primary-text' : ''" class="h-15px column align-center justify-center perfect-square no-shrink no-select pointer border-width-1px border-style-solid border-color-rgt-01">
<svg x-show="Checked" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="10" width="10"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>

           </div>
            <span>I agree to {{ config('app.name') }} <a class="no-u c-primary bold" href="{{ url('terms') }}">Terms</a> and <a class="no-u c-primary bold" href="{{ url('privacy') }}">Privacy Policy</a></span>
        </label>
        {{-- submit btn --}}
        <button x-on:click="
        if(!Checked){
            CreateNotify('info','You must agree to our terms and privacy');
            $event.preventDefault();
        }
        " class="post">
            
            Create Account
        </button>
           
        </div> 
          {{-- new row --}}
          <div class="text-center m-bottom-20 w-full">
            Already have an account? <a onclick="Vitecss.navigate('{{ url('login') }}')" class="pc-pointer font-weight-600 no-u c-primary no-select">Sign in here</a>
          </div>
        </form>
    
@endsection
@section('js')
    <script class="js">
      
            function Completed(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    window.location.href='{{ url('users/login') }}'
                }
            }
        
    </script>
@endsection