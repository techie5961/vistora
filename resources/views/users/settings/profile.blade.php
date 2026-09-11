@extends('layout.users.app')
@section('title')
    Profile Settings
@endsection
@section('main')
    <section class="w-full column g-10">
       {{-- new --}}
       <div class="column">
        <strong class="desc font-weight-900">Profile Settings</strong>
        <span class="opacity-07">Manage and update your profile information</span>
       </div>
       {{-- details --}}
       <div class="w-full br-20px p-15px column border-element">
        <div class="row align-center g-10px w-full">
            {{-- photo --}}
             <div style="height:70px;width:70px;min-height:70px;min-width:70px;border:1px solid var(--primary);border-radius:50%;">
                @isset(Auth::guard('users')->user()->photo)
                    <img src="{{ asset('photos/users/'.Auth::guard('users')->user()->photo.'') }}" alt="" class="w-full h-full br-inherit">
                @else
                 <div class="h-full column align-center justify-center primary-text no-select desc w-full bg-primary br-inherit">{{ $initials }}</div>
               
                @endisset       
                </div>
                {{-- new column --}}
                <div class="column g-5px">
                    <strong class="font-size-1 font-weight-700">{{ ucwords(strtolower(Auth::guard('users')->user()->name)) }}</strong>
                    <div class="row align-center g-10px">
                        <span class="opacity-05">{{ '@'.strtolower(Auth::guard('users')->user()->username) }}</span>
                        <span class="c-primary column h-5px w-5px circle no-shrink bg-primary"></span>
                        <span class="c-primary">{{ ucwords(strtolower(Auth::guard('users')->user()->country)) }}</span>
                    </div>
                    </div>
        </div>
       </div>
       {{-- new --}}
       <div x-data="{ Link : '{{ url('users/security/settings') }}' }" x-on:click="Vitecss.navigate(Link)" class="w-full g-10px border-element br-20px p-15px align-center row space-between">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M9 16C9 16.5523 8.55229 17 8 17C7.44772 17 7 16.5523 7 16C7 15.4477 7.44772 15 8 15C8.55229 15 9 15.4477 9 16Z" fill="CurrentColor" "=""></path>
<path d="M13 16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16C11 15.4477 11.4477 15 12 15C12.5523 15 13 15.4477 13 16Z" fill="CurrentColor" "=""></path>
<path d="M16 17C16.5523 17 17 16.5523 17 16C17 15.4477 16.5523 15 16 15C15.4477 15 15 15.4477 15 16C15 16.5523 15.4477 17 16 17Z" fill="CurrentColor" "=""></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.25 8V9.30277C5.02317 9.31872 4.80938 9.33948 4.60825 9.36652C3.70814 9.48754 2.95027 9.74643 2.34835 10.3483C1.74643 10.9503 1.48754 11.7081 1.36652 12.6082C1.24996 13.4752 1.24998 14.5775 1.25 15.9451V16.0549C1.24998 17.4225 1.24996 18.5248 1.36652 19.3918C1.48754 20.2919 1.74643 21.0497 2.34835 21.6516C2.95027 22.2536 3.70814 22.5125 4.60825 22.6335C5.47522 22.75 6.57754 22.75 7.94513 22.75H16.0549C17.4225 22.75 18.5248 22.75 19.3918 22.6335C20.2919 22.5125 21.0497 22.2536 21.6517 21.6516C22.2536 21.0497 22.5125 20.2919 22.6335 19.3918C22.75 18.5248 22.75 17.4225 22.75 16.0549V15.9451C22.75 14.5775 22.75 13.4752 22.6335 12.6082C22.5125 11.7081 22.2536 10.9503 21.6517 10.3483C21.0497 9.74643 20.2919 9.48754 19.3918 9.36652C19.1906 9.33948 18.9768 9.31872 18.75 9.30277V8C18.75 4.27208 15.7279 1.25 12 1.25C8.27208 1.25 5.25 4.27208 5.25 8ZM12 2.75C9.10051 2.75 6.75 5.10051 6.75 8V9.25344C7.12349 9.24999 7.52152 9.24999 7.94499 9.25H16.0549C16.4783 9.24999 16.8765 9.24999 17.25 9.25344V8C17.25 5.10051 14.8995 2.75 12 2.75ZM4.80812 10.8531C4.07435 10.9518 3.68577 11.1322 3.40901 11.409C3.13225 11.6858 2.9518 12.0743 2.85315 12.8081C2.75159 13.5635 2.75 14.5646 2.75 16C2.75 17.4354 2.75159 18.4365 2.85315 19.1919C2.9518 19.9257 3.13225 20.3142 3.40901 20.591C3.68577 20.8678 4.07435 21.0482 4.80812 21.1469C5.56347 21.2484 6.56459 21.25 8 21.25H16C17.4354 21.25 18.4365 21.2484 19.1919 21.1469C19.9257 21.0482 20.3142 20.8678 20.591 20.591C20.8678 20.3142 21.0482 19.9257 21.1469 19.1919C21.2484 18.4365 21.25 17.4354 21.25 16C21.25 14.5646 21.2484 13.5635 21.1469 12.8081C21.0482 12.0743 20.8678 11.6858 20.591 11.409C20.3142 11.1322 19.9257 10.9518 19.1919 10.8531C18.4365 10.7516 17.4354 10.75 16 10.75H8C6.56459 10.75 5.56347 10.7516 4.80812 10.8531Z" fill="CurrentColor" "=""></path>
</svg>

        <span class="m-right-auto">Security Settings</span>
        <i class="c-primary">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

        </i>
       </div>
       {{-- new --}}
       <div x-data="{ Link : '{{ url('users/bank') }}' }" x-on:click="Vitecss.navigate(Link)" class="w-full g-10px border-element br-20px p-15px align-center row space-between">
           <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M9.94358 3.25H14.0564C15.8942 3.24998 17.3498 3.24997 18.489 3.40314C19.6614 3.56076 20.6104 3.89288 21.3588 4.64124C22.1071 5.38961 22.4392 6.33856 22.5969 7.51098C22.6873 8.18385 22.7244 8.9671 22.7395 9.87428C22.7464 9.91516 22.75 9.95716 22.75 10C22.75 10.0353 22.7476 10.0699 22.7429 10.1039C22.75 10.6696 22.75 11.2818 22.75 11.9436V12.0564C22.75 13.8942 22.75 15.3498 22.5969 16.489C22.4392 17.6614 22.1071 18.6104 21.3588 19.3588C20.6104 20.1071 19.6614 20.4392 18.489 20.5969C17.3498 20.75 15.8942 20.75 14.0564 20.75H9.94359C8.10583 20.75 6.65019 20.75 5.51098 20.5969C4.33856 20.4392 3.38961 20.1071 2.64124 19.3588C1.89288 18.6104 1.56076 17.6614 1.40314 16.489C1.24997 15.3498 1.24998 13.8942 1.25 12.0564V11.9436C1.24999 11.2818 1.24999 10.6696 1.25714 10.1039C1.25243 10.0699 1.25 10.0352 1.25 10C1.25 9.95716 1.25359 9.91517 1.26049 9.87429C1.27564 8.96711 1.31267 8.18385 1.40314 7.51098C1.56076 6.33856 1.89288 5.38961 2.64124 4.64124C3.38961 3.89288 4.33856 3.56076 5.51098 3.40314C6.65019 3.24997 8.10582 3.24998 9.94358 3.25ZM2.75199 10.75C2.75009 11.1384 2.75 11.5541 2.75 12C2.75 13.9068 2.75159 15.2615 2.88976 16.2892C3.02502 17.2952 3.27869 17.8749 3.7019 18.2981C4.12511 18.7213 4.70476 18.975 5.71085 19.1102C6.73851 19.2484 8.09318 19.25 10 19.25H14C15.9068 19.25 17.2615 19.2484 18.2892 19.1102C19.2952 18.975 19.8749 18.7213 20.2981 18.2981C20.7213 17.8749 20.975 17.2952 21.1102 16.2892C21.2484 15.2615 21.25 13.9068 21.25 12C21.25 11.5541 21.2499 11.1384 21.248 10.75H2.75199ZM21.2239 9.25H2.77607C2.79564 8.66327 2.82987 8.15634 2.88976 7.71085C3.02502 6.70476 3.27869 6.12511 3.7019 5.7019C4.12511 5.27869 4.70476 5.02502 5.71085 4.88976C6.73851 4.75159 8.09318 4.75 10 4.75H14C15.9068 4.75 17.2615 4.75159 18.2892 4.88976C19.2952 5.02502 19.8749 5.27869 20.2981 5.7019C20.7213 6.12511 20.975 6.70476 21.1102 7.71085C21.1701 8.15634 21.2044 8.66327 21.2239 9.25ZM5.25 16C5.25 15.5858 5.58579 15.25 6 15.25H10C10.4142 15.25 10.75 15.5858 10.75 16C10.75 16.4142 10.4142 16.75 10 16.75H6C5.58579 16.75 5.25 16.4142 5.25 16ZM11.75 16C11.75 15.5858 12.0858 15.25 12.5 15.25H14C14.4142 15.25 14.75 15.5858 14.75 16C14.75 16.4142 14.4142 16.75 14 16.75H12.5C12.0858 16.75 11.75 16.4142 11.75 16Z" fill="CurrentColor" "=""></path>
</svg>


        <span class="m-right-auto">Payout Settings</span>
        <i class="c-primary">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

        </i>
       </div>
       {{-- new --}}
       <form x-on:submit="
       PostRequest($event,$el,function(response){
        let data=JSON.parse(response);
        if(data.status == 'success'){
            Vitecss.navigate('{{ url()->current() }}')
        }
       })
       " method="POST" action="{{ url('users/post/update/profile/process') }}" class="w-full column p-15px br-20px g-10px border-element">
       {{-- csrf token --}}
       <input type="hidden" class="inp input required" name="_token" value="{{ @csrf_token() }}">
       {{-- new --}}
        <label style="display:flex;flex-direction:column;padding:15px;align-items:center;justify-content:center;gap:5px;color:var(--rgt-07);" class="cont no-select w-full h-150px">
            <input name="photo" accept="image/*" x-on:change="
                PreviewPhoto($el,$el.closest('label'));
                if($el.files.length > 0){
                    $el.classList.add('input');
                }else{
                    $el.classList.remove('input');
                }
                " type="file" class="display-none inp">
            <span>Tap to select profile picture</span>
            <span>JPG,PNG (Max:5MB)</span>

        </label>
        {{-- new input --}}
        <div class="column g-5px w-full">
            <label>Full Name</label>
            <div class="cont">
                <input type="text" class="inp input required" name="full_name" value="{{ Auth::guard('users')->user()->name }}">
            </div>
        </div>
         {{-- new input --}}
        <div class="column g-5px w-full">
            <label>Phone Number</label>
            <div class="cont">
                <input type="number" inputmode="numeric" class="inp input required" name="phone_number" value="{{ Auth::guard('users')->user()->phone }}">
            </div>
        </div>
         {{-- new input --}}
        <div class="column no-pointer g-5px w-full">
            <label>Email</label>
            <div class="cont">
                <input type="email" readonly class="inp c-rgt-05 input required" name="email" value="{{ Auth::guard('users')->user()->email }}">
            </div>
        </div>
          {{-- new input --}}
        <div class="column g-5px no-pointer w-full">
            <label>Username</label>
            <div class="cont">
                <input type="text" readonly class="inp c-rgt-05 input required" name="username" value="{{ Auth::guard('users')->user()->username }}">
            </div>
        </div>
         {{-- new input --}}
        <div class="column g-5px no-pointer w-full">
            <label>Country</label>
            <div class="cont">
                <input readonly type="text" class="inp c-rgt-05 input required" name="country" value="{{ Auth::guard('users')->user()->country }}">
            </div>
        </div>
        {{-- post btn --}}
        <button class="post">Update Profile</button>
       </form>
      

  
    </section>
   
@endsection
