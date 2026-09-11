@extends('layout.users.app')
@section('title')
    Security Settings
@endsection
@section('main')
<section class="w-full column g-10px">
    <div class="column">
        <strong class="desc font-weight-900">Security Settings</strong>
        <span>Quickly update your account password if you feel there was any leak</span>
    </div>
    <form action="{{ url('users/post/update/password/process') }}" x-on:submit="PostRequest($event,$el,function(response){
      let data=JSON.parse(response);
                if(data.status == 'success'){
                   Redirect('{{ $url_current }}');
                }
    })" style="border:1px solid var(--rgt-005)" class="w-full column g-10px p-15px br-20px border-element">
        
     {{-- csrf token --}}
     <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
       
        {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Current Password</label>
            <div class="cont">
             
                <input placeholder="Current password" type="password" name="current_password" class="inp input required">
            </div>
        </div>
        {{-- new input --}}
        <div class="column g-5 w-full">
            <label>New Password</label>
            <div class="cont">

                <input placeholder="New password" type="password" name="new_password" class="inp input required">
            </div>
        </div>
        {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Confirm Password</label>
            <div class="cont">

                <input placeholder="Confirm new password" type="password" name="confirm_password" class="inp input required">
            </div>
        </div>
       
        {{-- submit btn --}}
        <button class="post">
            Update Password
        </button>
    </form>
</section>
@endsection
