@extends('layout.admins.app')
@section('title')
  {{ ucwords($status) }}  Users
@endsection
@section('css')
    <style class="css">
    .balance-div{
        width:100%;
        display:flex;
        flex-direction:column;
        gap:4px;
        text-align:center;
        align-items:center;
        padding:10px;
        position: relative;
        border-radius:5px;
        background:var(--rgt-007);
        box-shadow:0 0 10px var(--rgt-01);
        border:1px solid var(--rgt-01);
        max-width:50%;

               
    }
    

    </style>
@endsection
@section('main')
    <section class="column g-10 w-full">
         {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="p-20 w-full br-primary bg-light column g-10">
            <div class="row w-full g-10">
               <div class="h-50 perfect-square br-primary column align-center justify-center" style="border:1px solid #4caf50;background:rgba(0,255,0,0.1);color:#4caf50;">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M16.494 11.3635C16.688 11.8785 16.381 12.4475 15.858 12.6225C14.9814 12.9153 13.8077 13.1965 12.4107 13.2436C12.3924 13.1857 12.3724 13.1278 12.3506 13.0698C11.7793 11.5536 10.6789 10.2859 9.2969 9.47266C8.65208 9.09318 11.7223 8.25153 12 8.25153C14.058 8.25153 15.809 9.54552 16.494 11.3635Z" fill="currentColor" fill-opacity="0.3" data-stroke="none" stroke="none"></path> <path d="M12 5.75C13.1046 5.75 14 4.85457 14 3.75C14 2.64543 13.1046 1.75 12 1.75C10.8954 1.75 10 2.64543 10 3.75C10 4.85457 10.8954 5.75 12 5.75Z" fill="currentColor" fill-opacity="0.3" data-stroke="none" stroke="none"></path> <path d="M5.75 8.25C6.85457 8.25 7.75 7.35457 7.75 6.25C7.75 5.14543 6.85457 4.25 5.75 4.25C4.64543 4.25 3.75 5.14543 3.75 6.25C3.75 7.35457 4.64543 8.25 5.75 8.25Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M9.60903 15.122C10.132 14.947 10.439 14.378 10.245 13.863C9.56003 12.045 7.80903 10.751 5.75103 10.751C3.69303 10.751 1.94203 12.045 1.25703 13.863C1.06303 14.379 1.37003 14.948 1.89303 15.122C2.85503 15.443 4.17403 15.75 5.75203 15.75C7.33003 15.75 8.64803 15.443 9.60903 15.122Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M12 5.75C13.1046 5.75 14 4.85457 14 3.75C14 2.64543 13.1046 1.75 12 1.75C10.8954 1.75 10 2.64543 10 3.75C10 4.85457 10.8954 5.75 12 5.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M13.154 13.1873C14.2224 13.0845 15.1437 12.8614 15.858 12.6226C16.381 12.4476 16.688 11.8785 16.494 11.3636C15.809 9.54552 14.058 8.25153 12 8.25153C11.1608 8.25153 10.379 8.47713 9.69287 8.85553" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path></g>
</svg>                 </div>
                <div class="column g-5">
                    <span>Total Users</span>
                    <strong class="font-1 font-weight-900">{{ number_format($total_users) }}</strong>
                </div>
            </div>
        </div>
          {{-- analytic --}}
        <div style="border:1px solid var(--primary-01)" class="p-20 w-full br-primary bg-light column g-10">
            <div class="row w-full g-10">
               <div class="h-50 perfect-square br-primary column align-center justify-center" style="border:1px solid #4caf50;background:rgba(0,255,0,0.1);color:#4caf50;">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.554137 13.5756C1.34525 11.476 3.36866 9.97803 5.74997 9.97803C8.13128 9.97803 10.1547 11.476 10.9458 13.5756C11.3059 14.5316 10.7272 15.5154 9.84596 15.8103C8.82613 16.1509 7.42657 16.477 5.75097 16.477C4.0754 16.477 2.67527 16.1511 1.65458 15.8105C0.771586 15.5163 0.194851 14.5312 0.554137 13.5756Z" fill="currentColor"></path> <path d="M12.5523 13.9774C13.9847 13.9162 15.1901 13.6251 16.096 13.3225C16.9772 13.0276 17.5559 12.0438 17.1958 11.0878C16.4047 8.98817 14.3813 7.49023 12 7.49023C10.5581 7.49023 9.24737 8.03945 8.26202 8.9389C10.147 9.65833 11.6398 11.1634 12.3495 13.0469C12.4675 13.3603 12.5329 13.6726 12.5523 13.9774Z" fill="currentColor"></path> <path d="M5.75 8.50049C6.99267 8.50049 8 7.49361 8 6.25049C8 5.00736 6.99267 4.00049 5.75 4.00049C4.50733 4.00049 3.5 5.00736 3.5 6.25049C3.5 7.49361 4.50733 8.50049 5.75 8.50049Z" fill="currentColor"></path> <path d="M12 6.00049C13.2427 6.00049 14.25 4.99361 14.25 3.75049C14.25 2.50736 13.2427 1.50049 12 1.50049C10.7573 1.50049 9.75 2.50736 9.75 3.75049C9.75 4.99361 10.7573 6.00049 12 6.00049Z" fill="currentColor"></path></g>
</svg>

                </div>
                <div class="column g-5">
                    <span>Active Users</span>
                    <strong class="font-1 font-weight-900">{{ number_format($active_users) }}</strong>
                </div>
            </div>
        </div>
        {{-- analytic --}}
        <div style="border:1px solid var(--primary-01)" class="p-20 w-full br-primary bg-light column g-10">
            <div class="row w-full g-10">
               <div class="h-50 perfect-square br-primary column align-center justify-center" style="border:1px solid #4caf50;background:rgba(0,255,0,0.1);color:#4caf50;">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor">
    <path d="M5.75,3.5c-.414,0-.75-.336-.75-.75V.75c0-.414,.336-.75,.75-.75s.75,.336,.75,.75V2.75c0,.414-.336,.75-.75,.75Z" fill="currentColor"></path>
    <path d="M12.25,3.5c-.414,0-.75-.336-.75-.75V.75c0-.414,.336-.75,.75-.75s.75,.336,.75,.75V2.75c0,.414-.336,.75-.75,.75Z" fill="currentColor"></path>
    <path d="M13.75,2H4.25c-1.517,0-2.75,1.233-2.75,2.75V13.25c0,1.517,1.233,2.75,2.75,2.75H13.75c1.517,0,2.75-1.233,2.75-2.75V4.75c0-1.517-1.233-2.75-2.75-2.75Zm0,12.5H4.25c-.689,0-1.25-.561-1.25-1.25V7H15v6.25c0,.689-.561,1.25-1.25,1.25Z" fill="currentColor"></path>
    <path d="M9,8.25c-.551,0-1,.449-1,1s.449,1,1,1,1-.449,1-1-.449-1-1-1Z" fill="currentColor"></path>
    <path d="M12.5,10.25c.551,0,1-.449,1-1s-.449-1-1-1-1,.449-1,1,.449,1,1,1Z" fill="currentColor"></path>
    <path d="M9,11.25c-.551,0-1,.449-1,1s.449,1,1,1,1-.449,1-1-.449-1-1-1Z" fill="currentColor"></path>
    <path d="M5.5,11.25c-.551,0-1,.449-1,1s.449,1,1,1,1-.449,1-1-.449-1-1-1Z" fill="currentColor"></path>
    <path d="M12.5,11.25c-.551,0-1,.449-1,1s.449,1,1,1,1-.449,1-1-.449-1-1-1Z" fill="currentColor"></path>
  </g>
</svg>
                </div>
                <div class="column g-5">
                    <span>Today's Signups</span>
                    <strong class="font-1 font-weight-900">{{ number_format($today_signups) }}</strong>
                </div>
            </div>
        </div>

         {{-- search --}}
        <div style="border:1px solid var(--rgt-01);" class="w-full search br-primary p-20 bg-light">
            <div class="cont">
                <span class="h-full perfect-square column align-center no-shrink justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M232.49,215.51,185,168a92.12,92.12,0,1,0-17,17l47.53,47.54a12,12,0,0,0,17-17ZM44,112a68,68,0,1,1,68,68A68.07,68.07,0,0,1,44,112Z"></path></svg>

                </span>
                <input oninput="Search(this,'{{ url('admins/search/users?key=') }}' + this.value)" type="search" placeholder="Search by User ID,Phone Number,Username..." class="inp input">
            </div>
            <div class="child">
              
                
            </div>
        </div>
       
        @if ($users->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No Users Found'
            ])
        @else
        
        
            <div class="w-full grid pc-grid-2 g-10">
                @foreach ($users as $data)
                  <div style="max-width:100%;border:1px solid var(--rgt-01);overflow:hidden;" class="w-full p-20px br-15px column g-10 bg-light">
                    {{-- new row --}}
                    <div class="row w-full g-10">
                        {{-- new --}}
                        <div class="h-50 bg-primary primary-text w-50 circle column align-center justify-center no-shrink no-select pointer-none">
                            @isset(Auth::guard('users')->user()->photo)
                                <img src="{{ asset('photos/users/'.$data->photo.'') }}" alt="" class="h-full w-full circle">
                          @else
                          <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z"></path></svg>

                                @endisset
                        </div>
                        {{-- new column --}}
                        <div class="column g-3">
                            <strong class="font-weight-900 font-size-1">{{ $data->username }}</strong>
                          {{-- new row --}}
                            <div class="w-full row opacity-07 align-center g-2">
                                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="14" width="14"><path d="M3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM12.0606 11.6829L5.64722 6.2377L4.35278 7.7623L12.0731 14.3171L19.6544 7.75616L18.3456 6.24384L12.0606 11.6829Z"></path></svg>
                                <small>{{ $data->email }}</small>
                            </div>
                            {{-- new row --}}
                             <div class="w-full row opacity-07 align-center g-2">
                            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="14" width="14"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM13 12V7H11V14H17V12H13Z"></path></svg>
                                <small>Registered: {{ $data->frame }}</small>
                            </div>

                        </div>
                        {{-- new --}}
                        <div class="status m-left-auto {{ $data->status == 'active' ? 'green' : 'red' }}">{{ $data->status }}</div>
                    </div>
                    <hr>
                    {{-- new row --}}
                    <div class="row w-full g-10 align-center">
                        <div style="" class="balance-div">
                            <small>Earning Balance</small>
                            <strong style="max-width:100%;" class="ws-nowrap font-weight-900 block text-overflow-ellipsis font-size-1">{{ $data->currency.number_format($data->main_balance,2) }}</strong>
                        </div>
                        <div class="balance-div">
                            <small>Referral balance</small>
                            <strong style="max-width:100%;" class="ws-nowrap font-weight-900 block text-overflow-ellipsis font-size-1">{{ $data->currency.number_format($data->affiliate_balance,2) }}</strong>
                        </div>
                    </div>
                    <hr>
                     {{-- new row --}}
                     <div class="row ws-nowrap text-overflow-ellipsis w-full align-center g-10">
                        <div class="row align-center g-4">
                            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="14" width="14"><path d="M17.0839 15.812C19.6827 13.0691 19.6379 8.73845 16.9497 6.05025C14.2161 3.31658 9.78392 3.31658 7.05025 6.05025C4.36205 8.73845 4.31734 13.0691 6.91612 15.812C7.97763 14.1228 9.8577 13 12 13C14.1423 13 16.0224 14.1228 17.0839 15.812ZM12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364L12 23.7279ZM12 12C10.3431 12 9 10.6569 9 9C9 7.34315 10.3431 6 12 6C13.6569 6 15 7.34315 15 9C15 10.6569 13.6569 12 12 12Z"></path></svg>

                        <span>User ID:</span>
                        </div>
                        <strong class="text-overflow-ellipsis"> {{ $data->uniqid }}</strong>
                    </div>
                     {{-- new row --}}
                     <div class="row ws-nowrap text-overflow-ellipsis w-full align-center g-10">
                        <div class="row align-center g-4">
<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 48 48">
  <g fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M4 10C4 6.68629 6.68629 4 10 4H19V7H10C8.34315 7 7 8.34315 7 10V19H4V10Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M4 38C4 41.3137 6.68629 44 10 44H19V41H10C8.34315 41 7 39.6569 7 38V29H4V38Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M38 4C41.3137 4 44 6.68629 44 10L44 19L41 19L41 10C41 8.34315 39.6569 7 38 7L29 7L29 4L38 4Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M38 44C41.3137 44 44 41.3137 44 38L44 29L41 29L41 38C41 39.6569 39.6569 41 38 41L29 41L29 44L38 44Z" fill="currentColor"></path> <path d="M20.2875 27.3462V28.8027C20.2875 29.1963 20.2197 29.5999 19.9445 29.8812C18.8541 30.9958 15.7643 32.2516 13.5002 33.0861C12.3055 33.5264 11.5 34.652 11.5 35.9252V37H36.5V35.9252C36.5 34.652 35.6945 33.5264 34.4998 33.0861C32.2357 32.2516 29.1459 30.9958 28.0555 29.8812C27.7803 29.5999 27.7125 29.1963 27.7125 28.8027V27.3462C29.1467 26.3678 30.1808 24.8323 30.4842 23.0186L31.2384 18.5114C31.9839 14.0559 28.5346 10 24 10C19.4654 10 16.0161 14.0559 16.7616 18.5114L17.5158 23.0186C17.8192 24.8323 18.8533 26.3678 20.2875 27.3462Z" fill="currentColor"></path></g>
</svg>
                        <span>Full Name:</span>
                        </div>
                        <strong class="text-overflow-ellipsis"> {{ $data->name }}</strong>
                    </div>
                     {{-- new row --}}
                    <div class="row ws-nowrap text-overflow-ellipsis w-full align-center g-10">
                        <div class="row align-center g-4">

<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24">
  <g fill="currentColor">
    <path d="m12,11.882l11-5.5v-.382c0-1.654-1.346-3-3-3H4c-1.654,0-3,1.346-3,3v.382l11,5.5Z" fill="currentColor" stroke-width="0"></path>
    <path d="m12,14.118L1,8.618v9.382c0,1.654,1.346,3,3,3h16c1.654,0,3-1.346,3-3v-9.382l-11,5.5Z" stroke-width="0" fill="currentColor"></path>
  </g>
</svg>
                        <span>Email Address:</span>
                        </div>
                         <strong class="text-overflow-ellipsis"> {{ $data->email }}</strong>
                    </div>
                      {{-- new row --}}
                     <div class="row ws-nowrap text-overflow-ellipsis w-full align-center g-10">
                        <div class="row align-center g-4">

                            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="14" width="14"><path d="M21 16.42V19.9561C21 20.4811 20.5941 20.9167 20.0705 20.9537C19.6331 20.9846 19.2763 21 19 21C10.1634 21 3 13.8366 3 5C3 4.72371 3.01545 4.36687 3.04635 3.9295C3.08337 3.40588 3.51894 3 4.04386 3H7.5801C7.83678 3 8.05176 3.19442 8.07753 3.4498C8.10067 3.67907 8.12218 3.86314 8.14207 4.00202C8.34435 5.41472 8.75753 6.75936 9.3487 8.00303C9.44359 8.20265 9.38171 8.44159 9.20185 8.57006L7.04355 10.1118C8.35752 13.1811 10.8189 15.6425 13.8882 16.9565L15.4271 14.8019C15.5572 14.6199 15.799 14.5573 16.001 14.6532C17.2446 15.2439 18.5891 15.6566 20.0016 15.8584C20.1396 15.8782 20.3225 15.8995 20.5502 15.9225C20.8056 15.9483 21 16.1633 21 16.42Z"></path></svg>

                        <span>Phone Number:</span>
                        </div>
                        <strong class="text-overflow-ellipsis"> {{ $data->phone }}</strong>
                    </div>
                    
                     {{-- new row --}}
                     <div class="row ws-nowrap text-overflow-ellipsis w-full align-center g-10">
                        <div class="row align-center g-4">
<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 18 18">
  <g fill="currentColor">
    <path d="M9.47,9.97l-1.025,1.025-1.439-1.44,1.025-1.025c.293-.293,.293-.768,0-1.061s-.768-.293-1.061,0l-1.025,1.025-.311-.311c-.682-.683-1.793-.683-2.475,0l-.28,.28c-.89,.889-1.379,2.071-1.379,3.328,0,1.003,.323,1.95,.9,2.747l-1.181,1.181c-.293,.293-.293,.768,0,1.061,.146,.146,.338,.22,.53,.22s.384-.073,.53-.22l1.181-1.181c.796,.577,1.743,.9,2.746,.9,1.258,0,2.439-.49,3.328-1.379l.28-.28c.683-.682,.683-1.792,0-2.475l-.311-.311,1.025-1.025c.293-.293,.293-.768,0-1.061s-.768-.293-1.061,0Z" fill="currentColor"></path>
    <path d="M15.72,1.22l-1.181,1.181c-.796-.577-1.743-.9-2.746-.9-1.258,0-2.439,.49-3.328,1.379l-.28,.28c-.683,.682-.683,1.792,0,2.475l4.182,4.182c.341,.341,.789,.512,1.237,.512s.896-.17,1.237-.512l.28-.28c.89-.889,1.379-2.071,1.379-3.328,0-1.003-.323-1.95-.9-2.747l1.181-1.181c.293-.293,.293-.768,0-1.061s-.768-.293-1.061,0Z" fill="currentColor"></path>
  </g>
</svg>

                        <span>API Token:</span>
                        </div>
                        @isset($data->api_token)
                        <strong class="text-overflow-ellipsis"> {{ $data->api_token }}</strong>
                            @else
                        <i class="text-overflow-ellipsis opacity-07 font-weight-400">NULL</i>

                        @endisset
                    </div>
                     {{-- new row --}}
                     <div class="row ws-nowrap text-overflow-ellipsis w-full align-center g-10">
                        <div class="row align-center g-4">
                            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="14" width="14"><path d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z"></path></svg>

                        <span>Account Type:</span>
                        </div>
                        <strong class="text-overflow-ellipsis"> {{ ucwords($data->type) }}</strong>
                    </div>
                   
                     {{-- new row --}}
                     <div class="row ws-nowrap text-overflow-ellipsis w-full align-center g-10">
                        <div class="row align-center g-4">

<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="14" width="14"><path d="M2.04932 12.9999H7.52725C7.70624 16.2688 8.7574 19.3053 10.452 21.8809C5.98761 21.1871 2.5001 17.5402 2.04932 12.9999ZM2.04932 10.9999C2.5001 6.45968 5.98761 2.81276 10.452 2.11902C8.7574 4.69456 7.70624 7.73111 7.52725 10.9999H2.04932ZM21.9506 10.9999H16.4726C16.2936 7.73111 15.2425 4.69456 13.5479 2.11902C18.0123 2.81276 21.4998 6.45968 21.9506 10.9999ZM21.9506 12.9999C21.4998 17.5402 18.0123 21.1871 13.5479 21.8809C15.2425 19.3053 16.2936 16.2688 16.4726 12.9999H21.9506ZM9.53068 12.9999H14.4692C14.2976 15.7828 13.4146 18.3732 11.9999 20.5915C10.5852 18.3732 9.70229 15.7828 9.53068 12.9999ZM9.53068 10.9999C9.70229 8.21709 10.5852 5.62672 11.9999 3.40841C13.4146 5.62672 14.2976 8.21709 14.4692 10.9999H9.53068Z"></path></svg>

                        <span>Country:</span>
                        </div>
                        <strong class="text-overflow-ellipsis"> {{ ucwords($data->country) }}</strong>
                    </div>

                      {{-- new row --}}
                     <div class="row ws-nowrap text-overflow-ellipsis w-full align-center g-10">
                        <div class="row align-center g-4">

<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="14" width="14"><path d="M19.2914 5.99994H20.0002C20.5525 5.99994 21.0002 6.44766 21.0002 6.99994V13.9999C21.0002 14.5522 20.5525 14.9999 20.0002 14.9999H18.0002L13.8319 9.16427C13.3345 8.46797 12.4493 8.16522 11.6297 8.41109L9.14444 9.15668C8.43971 9.3681 7.6758 9.17551 7.15553 8.65524L6.86277 8.36247C6.41655 7.91626 6.49011 7.17336 7.01517 6.82332L12.4162 3.22262C13.0752 2.78333 13.9312 2.77422 14.5994 3.1994L18.7546 5.8436C18.915 5.94571 19.1013 5.99994 19.2914 5.99994ZM5.02708 14.2947L3.41132 15.7085C2.93991 16.1209 2.95945 16.8603 3.45201 17.2474L8.59277 21.2865C9.07284 21.6637 9.77592 21.5264 10.0788 20.9963L10.7827 19.7645C11.2127 19.012 11.1091 18.0682 10.5261 17.4269L7.82397 14.4545C7.09091 13.6481 5.84722 13.5771 5.02708 14.2947ZM7.04557 5H3C2.44772 5 2 5.44772 2 6V13.5158C2 13.9242 2.12475 14.3173 2.35019 14.6464C2.3741 14.6238 2.39856 14.6015 2.42357 14.5796L4.03933 13.1658C5.47457 11.91 7.65103 12.0343 8.93388 13.4455L11.6361 16.4179C12.6563 17.5401 12.8376 19.1918 12.0851 20.5087L11.4308 21.6538C11.9937 21.8671 12.635 21.819 13.169 21.4986L17.5782 18.8531C18.0786 18.5528 18.2166 17.8896 17.8776 17.4146L12.6109 10.0361C12.4865 9.86205 12.2652 9.78636 12.0603 9.84783L9.57505 10.5934C8.34176 10.9634 7.00492 10.6264 6.09446 9.7159L5.80169 9.42313C4.68615 8.30759 4.87005 6.45035 6.18271 5.57524L7.04557 5Z"></path></svg>

                        <span>Referred By:</span>
                        </div>
                        <strong onclick="window.location.href='{{ url('admins/user?id='.$data->ref_id ?? ''.'') }}'" class="text-overflow-ellipsis {{ ($data->ref ?? 'none') == 'none' ? 'no-pointer no-select' : 'c-primary u no-select pointer' }}"> {{ ucwords($data->ref ?? 'none') }}</strong>
                    </div>
                        {{-- new row --}}
                     <div class="row ws-nowrap text-overflow-ellipsis w-full align-center g-10">
                        <div class="row align-center g-4">

<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="14" width="14"><path d="M12 10C14.2091 10 16 8.20914 16 6 16 3.79086 14.2091 2 12 2 9.79086 2 8 3.79086 8 6 8 8.20914 9.79086 10 12 10ZM5.5 13C6.88071 13 8 11.8807 8 10.5 8 9.11929 6.88071 8 5.5 8 4.11929 8 3 9.11929 3 10.5 3 11.8807 4.11929 13 5.5 13ZM21 10.5C21 11.8807 19.8807 13 18.5 13 17.1193 13 16 11.8807 16 10.5 16 9.11929 17.1193 8 18.5 8 19.8807 8 21 9.11929 21 10.5ZM12 11C14.7614 11 17 13.2386 17 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5 15.9999C5 15.307 5.10067 14.6376 5.28818 14.0056L5.11864 14.0204C3.36503 14.2104 2 15.6958 2 17.4999V21.9999H5V15.9999ZM22 21.9999V17.4999C22 15.6378 20.5459 14.1153 18.7118 14.0056 18.8993 14.6376 19 15.307 19 15.9999V21.9999H22Z"></path></svg>

                        <span>Total Downlines:</span>
                        </div>
                        <strong class="text-overflow-ellipsis"> {{ number_format($data->downlines) }}</strong>
                    </div>
                    <a href="{{ url('admins/user?id='.$data->id.'') }}" class="c-primary no-select">Click to View More...</a>
                    
                  </div>
                @endforeach
            </div>
             @if ($users->lastPage() > 1)
                    @include('components.utilities',[
                        'paginate' => true,
                        'data' => $users
                    ])
                @endif
        @endif
    </section>
    
   
@endsection
@section('js')
    <script class="js">
        function Completed(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                window.location.reload();
            }
        }
    </script>
@endsection