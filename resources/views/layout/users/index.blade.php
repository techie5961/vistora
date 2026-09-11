<!DOCTYPE html>
<html lang="en">
<head>
    {{-- include meta tags --}}
   @include('components.utilities',[
    'meta_tags' => true
   ])
{{-- include favicon --}}
@include('components.utilities',[
    'favicon' => true
])
{{-- include vite css --}}
@include('components.utilities',[
    'vite_css' => true
])
{{-- vite js --}}
 @include('components.utilities',[
    'vite_js' => true
  ])
{{-- yield css --}}
     @yield('css')
    <title>{{ config('app.name') }}: Multi Tasking platform</title>
  <style>
@font-face {
    font-family: 'Bricolage';
    src: url('{{ asset('vitecss/fonts/BricolageGrotesque-VariableFont_opsz,wdth,wght.ttf') }}') format('truetype');
    font-display: swap;
}
    body{
        position:relative;
        padding: 0 !important;
    }
    body::before{
       content:'';
       position: absolute;
       inset:0;
       background:var(--primary-005);
       z-index:100;
    }
    header{
        position:fixed;
        top:20px;
        left:20px;
        right:20px;
        border:1px solid rgba(255,255,255,0.05);
        padding:10px 20px;
        border-radius:1000px;
        background:rgb(0,0,0,0.1);
        display:flex;
        flex-direction: row;
        align-items:center;
        justify-content:space-between;
        z-index:3000;
        backdrop-filter: blur(100px);
        -webkit-backdrop-filter: blur(100px);
        max-width:1200px;
        margin:auto;
    }
    main{
        position:relative;
        z-index: 300;
        padding:0 !important;

    }
    .hero{
        background:linear-gradient(to bottom,#001b1f,#011316);
        padding-bottom:0 !important;
        overflow:hidden;
    }
    .alert{
        animation:float 10s ease infinite;
    }
    @keyframes float{
        0%,100%{
            transform:translateY(0);
        }
        50%{
            transform: translateY(20px)
        }
    }
    footer{
      position:relative;
      z-index:300;
      background:rgba(0,0,0,0.3);
    }
  </style>
</head>
<body x-data="{ 
    HeaderHeight : 0,
    MobileNav : false
 }">
    {{-- include general codes --}}
    @include('components.utilities',[
        'general_codes' => true
    ])
     {{-- include users only codes --}}
    @include('components.utilities',[
        'users_codes' => true
    ])
     {{-- include action loader for post requests,get requests and spa loading --}}
    @include('components.utilities',[
        'action_loader' => true
    ])
    {{-- header --}}
    <header>
        <div class="row align-center g-10px">
    <img src="{{ asset('logos/IMG_1596.png') }}" alt="" class="no-select no-pointer h-30px">
    <strong class="font-size-1rem fint-weight-900 no-select no-pointer">{{ config('app.name') }}</strong>
        </div>
       <template x-if="window.innerWidth > 799">
         {{-- new row --}}
        <div class="row align-center g-10px">
          {{-- new --}}
<div x-on:click="window.location.href='{{ url('terms') }}'" class="row p-10px pointer no-select align-center g-10px w-full">
  <span class="font-size-09rem ws-nowrap">Terms of Service</span>
</div>
{{-- new --}}
<div x-on:click="window.location.href='{{ url('privacy') }}'" class="row p-10px pointer no-select align-center g-10px w-full">
  <span class="font-size-09rem ws-nowrap">Privacy Policy</span>
</div>
        </div>
       </template>
    <div class="row align-center g-10px">
        <div class="bg-primary-01 p-10px p-x-20px br-1000px">Login</div>

        <template x-if="window.innerWidth > 799">
                  <div class="bg-primary c-black p-10px p-x-20px ws-nowrap br-1000px">Create Account</div>

        </template>
       <template x-if="window.innerWidth < 800">
         <div x-on:click="MobileNav = true;" class="p-10px circle column align-center justify-center bg-rgt-01">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 48 48">
  <g fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M2 25.5H46V22.5H2V25.5Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12.5H26V9.5H2V12.5Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M22 38.5H46V35.5H22V38.5Z" fill="currentColor"></path></g>
</svg>
        </div>
       </template>
    </div>
   
    </header>
    <template x-if="window.innerWidth < 800">
       {{-- nav --}}
    <nav x-on:click.outside="MobileNav = false;" x-transition:enter.duration.500ms x-transition:leave.duration.500ms x-show="MobileNav" style="background:rgba(0,0,0,0.1);border:1px solid rgba(255,255,255,0.05);backdrop-filter: blur(100px);-webkit-backdrop-filter:blur(100px);" class="column g-10px pos-fixed border-width-1px border-style-solid border-color-inherit transition-all br-25px p-20px bg-inherit top-20px z-index-5000 left-20px right-20px right-0 left-0">
<div class="row w-full align-center space-between">
  {{-- new row --}}
<div class="row align-center g-10px">
    <img src="{{ asset('logos/IMG_1596.png') }}" alt="" class="no-select no-pointer h-30px">
    <strong class="font-size-1rem fint-weight-900 no-select no-pointer">{{ config('app.name') }}</strong>
        </div>
    <div class="row align-center g-10px">
        <div class="bg-primary-01 p-10px p-x-20px br-1000px">Login</div>
        <div x-on:click="MobileNav = false;" class="p-10px circle column align-center justify-center bg-rgt-01">
           <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 12 12">
  <g fill="currentColor">
    <line x1="2.25" y1="9.75" x2="9.75" y2="2.25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
    <line x1="9.75" y1="9.75" x2="2.25" y2="2.25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
  </g>
</svg>
        </div>
    </div>
</div>
{{-- hr --}}
<div class="hr" vitecss-type="solid"></div>
{{-- new --}}
<div x-on:click="window.location.href='{{ url('register') }}'" class="row p-10px pointer no-select align-center g-10px w-full">
  <span class="font-size-09rem">Create Account</span>
</div>
{{-- new --}}
<div x-on:click="window.location.href='{{ url('login') }}'" class="row p-10px pointer no-select align-center g-10px w-full">
  <span class="font-size-09rem">Sign In</span>
</div>
{{-- new --}}
<div x-on:click="window.location.href='{{ url('terms') }}'" class="row p-10px pointer no-select align-center g-10px w-full">
  <span class="font-size-09rem">Terms of Service</span>
</div>
{{-- new --}}
<div x-on:click="window.location.href='{{ url('privacy') }}'" class="row p-10px pointer no-select align-center g-10px w-full">
  <span class="font-size-09rem">Privacy Policy</span>
</div>
    </nav>
    </template>
   
   
    <main>
  <section style="padding:15px 7px 0 7px;" class="w-full column g-10px p-7px">
         <section x-init="
       $nextTick(() => {
        $el.style.paddingTop = (document.querySelector('header').offsetHeight + 15 + 30) + 'px'
       })
       " class="w-full p-15px text-align-center align-center hero br-25px column g-10px">
        <div style="font-family: Bricolage" class="font-size-2rem font-weight-700">
            <span>Turn your everyday </span><span class="c-primary">activities into rewards.</span>
        </div>
        <p class="font-size-09rem opacity-09">
             Complete simple tasks, stream music, claim daily rewards,
        explore opportunities and enjoy more ways to earn — all from one platform.
        </p>
        <button x-data="{ 
            Active : false
         }" x-bind:style="Active ? {
            transform : 'translateY(0px) scale(1)',
            opacity : '1'
         } : {
            transform : 'translateY(10px) scale(0.8)',
            opacity : '0'
         }" x-on:click="window.location.href='{{ url('register') }}'" x-intersect="Active = true" style="transition:all 1.5s ease;background:linear-gradient(to bottom,var(--primary),var(--primary-darker));border:1px solid var(--primary);color:white;box-shadow:0 0 15px var(--primary-05)" class="p-10px p-x-20px br-1000px">Get Started</button>
        <img x-intersect="Active = true;" x-data="{ 
            Active : false
         }" x-bind:style="Active ? {
            transform:'translateY(0)'
         } : {}" style="max-width:500px;margin-top:20px;transform:translateY(100%);border-radius:20px 20px 0 0;width:100%;transition:all 1.5s ease" src="{{ asset('banners/E06B3282-48B9-4F5A-8390-3AF05C8038AE-compressed.jpeg') }}" alt="" class="br-inherit no-select transition-slow m-top-auto h-full no-pointer w-full">
   
    </section>
    {{-- new section --}}
    <section style="grid-template-columns:repeat(auto-fit,minmax(min(100%,500px),1fr))" class="w-full m-top-10px g-10px grid pc-grid-2 p-15px">
        <span class="font-size-1rem">MULTIPLE WAYS OF EARNING, ALL IN ONE PLATFORM</span>
        <div x-data="{ 
            MarginTop : 0
         }" x-bind:style="{
            'margin-top' : MarginTop + 'px'
         }" class="pos-relative w-full bg-primary-01 border-width-1px border-style-solid border-color-primary-02 br-25px h-150px">
            <img x-data="{ 
                Active : false
             }" x-bind:style="Active ? {
                transform : 'translateY(0) translatex(-50%)'
             } : {
                transform : 'translateY(50%) translatex(-50%)'

             }" x-intersect="Active = true" x-init="$nextTick(() => {
                MarginTop = Math.abs($el.getBoundingClientRect().top - $el.closest('div').getBoundingClientRect().top);
            })" style="transition:all 1s ease;left:50%;transform:translateX(-50%)" src="{{ asset('banners/IMG_1608.png') }}" alt="" class="pos-absolute transition-all no-select no-pointer bottom-0 m-x-auto h-200px">
        </div>
        {{-- new element --}}
        <div style="padding:25px 25px 0 25px" class="w-full h-fit column g-30px bg-primary-01 br-25px">
            <div class="row w-fit p-5px p-x-15px g-10px br-1000px bg-white c-black align-center">
                <span>Your Security, Our Priority</span>
                <div class="column bg-primary-darker c-white h-25px w-25px circle no-shrink align-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 18 18">
  <g fill="currentColor">
    <path d="M14.783,2.813l-5.25-1.68c-.349-.112-.718-.111-1.066,0L3.216,2.813c-.728,.233-1.216,.903-1.216,1.667v6.52c0,3.508,4.946,5.379,6.46,5.869,.177,.057,.358,.086,.54,.086s.362-.028,.538-.085c1.516-.49,6.462-2.361,6.462-5.869V4.48c0-.764-.489-1.434-1.217-1.667Zm-2.681,4.389l-3.397,4.5c-.128,.169-.322,.276-.534,.295-.021,.002-.043,.003-.065,.003-.189,0-.372-.071-.511-.201l-1.609-1.5c-.303-.283-.32-.757-.038-1.06,.284-.303,.758-.319,1.06-.038l1.001,.933,2.896-3.836c.25-.33,.72-.396,1.051-.146,.331,.25,.396,.72,.146,1.051Z" fill="currentColor"></path>
  </g>
</svg>
                </div>
            </div>
            {{-- new --}}
            <img src="{{ asset('banners/IMG_1616.png') }}" alt="" class="m-x-auto no-select no-pointer w-half">
        </div>
         {{-- new element --}}
        <div class="w-full h-fit column p-25px g-10px bg-rgt-01 br-25px">
          <div class="column w-full">
             <strong x-data="{ 
                Users : 0,
                TotalUsers : 200
              }" x-intersect="
              let Interval=setInterval(() => {
                Users++;
                if(Users >= TotalUsers){
                    clearInterval(Interval);
                }
              }, 10);
              " class="font-size-2rem font-weight-900"><span x-text="Users"></span>K+</strong>
            <span class="font-weight-700">Active Users</span>
          </div>
          <div class="w-full m-bottom-25px no-select alert p-15px br-15px c-black bg-white row g-10px">
            <div class="h-50px w-50px no-shrink bg-primary-02 column align-center justify-center br-10px">
                <img src="{{ asset('logos/IMG_1596.png') }}" alt="" class="h-30px no-select no-shrink">
            </div>
            <div class="column overflow-hidden flex-auto">
                <strong class="font-weight-700 font-size-1rem">{{ config('app.name') }}</strong>
                <span>You have received a payment of <br> &#8358;183,000 from Vistora Inc.</span>
            </div>
          </div>
        </div>
    </section>
    {{-- new section --}}
    <section id="features" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,400px),1fr));" class="w-full p-y-35px overflow-hidden bg-rgt-005 border-width-1px border-style-solid border-color-rgt-01  br-25px p-15px grid place-center g-10px">
        <strong class="font-size-1-5rem grid-full m-x-auto font-weight-800">Powerful Features</strong>
    {{-- new --}}
    <div x-data="{ 
        Active : false
     }" x-bind:style="Active ? {
        'transform' : 'translateY(0)'
     } : { 
        'transform' : 'translateY(30px)'
     }" x-intersect="Active = true;" style="transition:all 1s ease;" class="w-full br-20px p-20px column g-15px bg-primary-01">
        <div class="h-50px w-50px circle column align-center justify-center c-white bg-primary-03">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 18 18">
  <g fill="currentColor">
    <path d="M14.7505 7.25H9.49905L9.81065 1.9868C9.82325 1.7732 9.55085 1.6734 9.42255 1.8446L3.04965 10.3501C2.92615 10.5149 3.04376 10.75 3.24976 10.75H8.50115L8.18955 16.0132C8.17695 16.2268 8.44935 16.3266 8.57765 16.1554L14.9506 7.6499C15.0741 7.4851 14.9565 7.25 14.7505 7.25Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path>
  </g>
</svg>
        </div>
        <strong style="font-family:Bricolage;" class="font-size-1-3rem">Instant Withdrawals</strong>
        <span class="font-size-09rem opacity-08">Withdraw any amount from your balance anytime, anywhere and get credited into your bank account instantly.</span>
    </div>
      {{-- new --}}
    <div x-data="{ 
        Active : false
     }" x-bind:style="Active ? {
        'transform' : 'translateY(0)'
     } : { 
        'transform' : 'translateY(30px)'
     }" x-intersect="Active = true;" style="transition:all 1s ease;" class="w-full br-20px p-20px column g-15px bg-primary-01">
        <div class="h-50px w-50px circle column align-center justify-center c-white bg-primary-03">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
  <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt">
    <path d="m12,2c5.523,0,10,4.477,10,10s-4.477,10-10,10c-.685,0-1.354-.069-2-.2" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <path d="m6.122,3.91c.554-.403,1.136-.74,1.736-1.014" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <path d="m2.489,8.91c.212-.651.484-1.266.808-1.84" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <path d="m2.489,15.09c-.212-.651-.353-1.309-.428-1.964" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <path d="m6.122,20.09c-.554-.403-1.055-.851-1.501-1.337" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <polyline points="7 13 10 16 17 8" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></polyline>
  </g>
</svg>
        </div>
        <strong style="font-family:Bricolage;" class="font-size-1-3rem">Daily Tasks</strong>
        <span class="font-size-09rem opacity-08"> Complete simple tasks and activities available
                on your dashboard and earn rewards for your effort.</span>
    </div>
      {{-- new --}}
    <div x-data="{ 
        Active : false
     }" x-bind:style="Active ? {
        'transform' : 'translateY(0)'
     } : { 
        'transform' : 'translateY(30px)'
     }" x-intersect="Active = true;" style="transition:all 1s ease;" class="w-full br-20px p-20px column g-15px bg-primary-01">
        <div class="h-50px w-50px circle column align-center justify-center c-white bg-primary-03">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
  <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt"><path d="M10.007 19.8269C6.87421 17.7082 2 13.3984 2 9.378C2 6.408 4.41 4 7.384 4C9.344 4 10.81 5.226 12 6.606C13.192 5.228 14.656 4 16.616 4C19.588 4 22 6.408 22 9.378C22 9.48376 21.9966 9.58973 21.99 9.69585" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M22 14V14C21.0044 13.6681 20.0576 13.205 19.1844 12.6229L19 12.5V19.5V19" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M16.5 22C17.8807 22 19 20.8807 19 19.5C19 18.1193 17.8807 17 16.5 17C15.1193 17 14 18.1193 14 19.5C14 20.8807 15.1193 22 16.5 22Z" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path></g>
</svg>
        </div>
        <strong style="font-family:Bricolage;" class="font-size-1-3rem">Stream & Earn</strong>
        <span class="font-size-09rem opacity-08">
             Discover music and participate in streaming
                activities while earning rewards along the way.
        </span>
    </div>
     {{-- new --}}
    <div x-data="{ 
        Active : false
     }" x-bind:style="Active ? {
        'transform' : 'translateY(0)'
     } : { 
        'transform' : 'translateY(30px)'
     }" x-intersect="Active = true;" style="transition:all 1s ease;" class="w-full br-20px p-20px column g-15px bg-primary-01">
        <div class="h-50px w-50px circle column align-center justify-center c-white bg-primary-03">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 32 32">
  <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt">
    <path d="m13,29h-6c-1.657,0-3-1.343-3-3v-9" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <path d="m28,17v9c0,1.657-1.343,3-3,3h-6" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <rect x="2" y="8" width="28" height="5" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></rect>
    <path d="m7,5c0-1.657,1.343-3,3-3,4.438,0,6,6,6,6h-6c-1.657,0-3-1.343-3-3Z" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <path d="m25,5c0-1.657-1.343-3-3-3-4.438,0-6,6-6,6h6c1.657,0,3-1.343,3-3Z" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <polyline points="19 8 19 29 13 29 13 8" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></polyline>
  </g>
</svg>
        </div>
        <strong style="font-family:Bricolage;" class="font-size-1-3rem">Daily Rewards</strong>
        <span class="font-size-09rem opacity-08">
           Come back every day to claim available rewards
                and keep your earning streak going.
        </span>
    </div>
      {{-- new --}}
    <div x-data="{ 
        Active : false
     }" x-bind:style="Active ? {
        'transform' : 'translateY(0)'
     } : { 
        'transform' : 'translateY(30px)'
     }" x-intersect="Active = true;" style="transition:all 1s ease;" class="w-full br-20px p-20px column g-15px bg-primary-01">
        <div class="h-50px w-50px circle column align-center justify-center c-white bg-primary-03">
         <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 18 18">
  <g fill="currentColor">
    <line x1="12.345" y1="11.75" x2="15.25" y2="11.75" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
    <path d="M8.779,4.67l-.231-.313c-.283-.382-.73-.608-1.206-.608h-1.458c-.388,0-.761,.151-1.041,.42l-1.867,1.8c-.07,.067-.148,.123-.232,.167" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
    <path d="M2.75,11.75h1.26c.303,0,.59,.138,.78,.374l1.083,1.349c.596,.742,1.632,.962,2.478,.525l3.274-1.693c1.111-.574,1.428-2.016,.661-3.003l-1.648-2.122" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
    <path d="M15.258,6.138c-.085-.044-.163-.1-.233-.168l-1.867-1.8c-.28-.269-.653-.42-1.041-.42h-1.807c-.404,0-.791,.163-1.074,.453l-2.495,2.558c-.498,.51-.493,1.326,.011,1.83h0c.447,.447,1.15,.508,1.668,.145l2.83-1.985" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
    <path d="M.75,5.25H1.75c.552,0,1,.448,1,1v6c0,.552-.448,1-1,1H.75" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
    <path d="M17.25,5.25h-1c-.552,0-1,.448-1,1v6c0,.552,.448,1,1,1h1" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
  </g>
</svg>
        </div>
        <strong style="font-family:Bricolage;" class="font-size-1-3rem">Free Loan Opportunities</strong>
        <span class="font-size-09rem opacity-08">
          Access available loan opportunities and discover
                financial features designed to support your goals.
        </span>
    </div>
       {{-- new --}}
    <div x-data="{ 
        Active : false
     }" x-bind:style="Active ? {
        'transform' : 'translateY(0)'
     } : { 
        'transform' : 'translateY(30px)'
     }" x-intersect="Active = true;" style="transition:all 1s ease;" class="w-full br-20px p-20px column g-15px bg-primary-01">
        <div class="h-50px w-50px circle column align-center justify-center c-white bg-primary-03">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 18 18">
  <g fill="currentColor">
    <path d="m6.5805,10.1511c-.212.1106-.4596.1106-.6716,0-1.1205-.5845-4.6589-2.7028-4.6589-6.147-.0057-1.513,1.2154-2.7448,2.7306-2.7541.9107.0114,1.7578.471,2.2645,1.2275.506-.7565,1.3531-1.2161,2.2645-1.2275,1.5144.0093,2.7362,1.2411,2.7305,2.7541,0,1.6738-.8358,3.0345-1.8238,4.0581l-.2913-.6193c-.293-.626-1.037-.896-1.663-.603-.625.292-.896,1.036-.604,1.661l.5503,1.1724c-.3332.2104-.6215.37-.8278.4777Z" fill="currentColor" fill-rule="evenodd" opacity=".3" stroke-width="0"></path>
    <path d="m16.75,14.725c0-2.059-.236-3.639-1-4.223-.875-.669-3.152-.838-5.295-.232l-1.33-2.827c-.293-.626-1.037-.896-1.663-.603-.625.292-.896,1.036-.604,1.661l2.561,5.456-2.724-.501c-.587-.108-1.167.224-1.371.785-.232.637.098,1.34.736,1.569l2.616.941" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
    <path d="m11.1077,5.1111c.0826-.3533.1423-.717.1423-1.1052.006-1.5139-1.217-2.7468-2.733-2.7559-.912.012-1.76.4709-2.267,1.229-.507-.7571-1.355-1.217-2.267-1.229-1.516.009-2.739,1.2419-2.733,2.7559,0,2.0918,1.3028,3.686,2.579,4.7529" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
  </g>
</svg>
        </div>
        <strong style="font-family:Bricolage;" class="font-size-1-3rem">Refer & Earn</strong>
        <span class="font-size-09rem opacity-08">
           Invite friends to Vistora and earn rewards
                through our referral programme.
        </span>
    </div>
     {{-- new --}}
    <div x-data="{ 
        Active : false
     }" x-bind:style="Active ? {
        'transform' : 'translateY(0)'
     } : { 
        'transform' : 'translateY(30px)'
     }" x-intersect="Active = true;" style="transition:all 1s ease;" class="w-full br-20px p-20px column g-15px bg-primary-01">
        <div class="h-50px w-50px circle column align-center justify-center c-white bg-primary-03">
         <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
  <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt">
    <line x1="12" y1="3.25" x2="12" y2="6" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></line>
    <line x1="18.894" y1="6.106" x2="16.95" y2="8.05" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></line>
    <line x1="21.75" y1="13" x2="19" y2="13" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></line>
    <line x1="2.25" y1="13" x2="5" y2="13" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></line>
    <line x1="12" y1="13" x2="5" y2="6" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></line>
    <path d="m2.696,9.353c-.444,1.131-.696,2.359-.696,3.647,0,3.277,1.583,6.176,4.018,8h11.964c2.435-1.824,4.018-4.723,4.018-8,0-5.523-4.477-10-10-10-1.289,0-2.516.252-3.647.696" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <circle cx="12" cy="13" r="1" fill="currentColor" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></circle>
  </g>
</svg>
        </div>
        <strong style="font-family:Bricolage;" class="font-size-1-3rem">Simple & Fast</strong>
        <span class="font-size-09rem opacity-08">
          Everything is designed to be simple, fast and
                easy to understand, even if you're just getting started.
        </span>
    </div>
    </section>
  </section>
    <img x-show="window.innerWidth < 800" src="{{ asset('banners/3fdf5297-26a9-4948-a6f6-fba5c3923fc3.jpeg') }}" alt="" class="w-full m-top-20px m-x-auto max-h-4f00px no-select no-pointer">
    <img x-show="window.innerWidth > 799" src="{{ asset('banners/E06B3282-48B9-4F5A-8390-3AF05C8038AE-compressed.jpeg') }}" alt="" class="w-full m-top-20px m-x-auto max-h-4f00px no-select no-pointer">
    <div style="grid-template-columns:repeat(auto-fit,minmax(min(100%,400px),1fr))" class="grid w-full g-10px">
       <div class="w-full column g-10px">
         <div class="p-15px column g-10px w-full">
        <strong style="font-family: Bricolage;" class="font-size-1-3rem">Instant Loans</strong>
        <span class="opacity-08 font-size-09rem">Borrow up to ₦10,000,000 with quick approvals, secure data, flexible repayment plans, and 24/7 support.</span>
    </div>
    <img src="{{ asset('banners/92d29183-dfe5-45fc-b30d-5036cf98bc2c.jpeg') }}" alt="" class="w-full m-x-auto no-select no-pointer">
   
       </div>
 
   <div style="width:min(100%,400px)" class="w-full p-15px column g-10px">
     <img style="width:min(100%,400px)" src="{{ asset('banners/d13c8959-ca8f-4549-8cb8-1c9e2aee6876.jpeg') }}" alt="" class="w-full m-top-20px m-x-auto no-select no-pointer">
   <div class="p-15px column g-10px w-full">
        <strong style="font-family: Bricolage;" class="font-size-1-3rem">Music Streaming</strong>
        <span class="opacity-08 font-size-09rem">Stream millions of songs in high quality, listen offline, and access top platforms like Spotify, Apple Music, and Audiomack while earning.</span>
    </div>
   </div>
    </div>
  <section style="padding:15px 7px 0 7px;" class="w-full column g-10px p-7px">

      {{-- new section --}}
    <section id="reviews" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,400px),1fr));" class="w-full p-y-35px overflow-hidden br-25px p-15px grid place-center g-10px">
        <strong class="font-size-1-5rem grid-full m-x-auto font-weight-800">The Vistora Experience</strong>
        <span class="grid-full opacity-07 m-x-auto">What our community says</span>
   {{-- new --}}
        <div class="w-full column g-10px bg-rgt-005 p-15px br-20px">
   <i class="opacity-05">
    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4.58341 17.3211C3.55316 16.2274 3 15 3 13.0103C3 9.51086 5.45651 6.37366 9.03059 4.82318L9.92328 6.20079C6.58804 8.00539 5.93618 10.346 5.67564 11.822C6.21263 11.5443 6.91558 11.4466 7.60471 11.5105C9.40908 11.6778 10.8312 13.159 10.8312 15C10.8312 16.933 9.26416 18.5 7.33116 18.5C6.2581 18.5 5.23196 18.0095 4.58341 17.3211ZM14.5834 17.3211C13.5532 16.2274 13 15 13 13.0103C13 9.51086 15.4565 6.37366 19.0306 4.82318L19.9233 6.20079C16.588 8.00539 15.9362 10.346 15.6756 11.822C16.2126 11.5443 16.9156 11.4466 17.6047 11.5105C19.4091 11.6778 20.8312 13.159 20.8312 15C20.8312 16.933 19.2642 18.5 17.3312 18.5C16.2581 18.5 15.232 18.0095 14.5834 17.3211Z"></path></svg>

   </i>
    <p class="opacity-07 font-size-09rem">
        I like having different activities available
                from one dashboard instead of jumping between
                different platforms.
    </p>
    <div class="column w-full">
        <strong style="font-family:Bricolage;" class="font-size-1-3rem">Chinedu Caleb</strong>
    <small class="opacity-05">Vistora Member</small>
    </div>
   </div>
    {{-- new --}}
        <div class="w-full column g-10px bg-rgt-005 p-15px br-20px">
   <i class="opacity-05">
    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4.58341 17.3211C3.55316 16.2274 3 15 3 13.0103C3 9.51086 5.45651 6.37366 9.03059 4.82318L9.92328 6.20079C6.58804 8.00539 5.93618 10.346 5.67564 11.822C6.21263 11.5443 6.91558 11.4466 7.60471 11.5105C9.40908 11.6778 10.8312 13.159 10.8312 15C10.8312 16.933 9.26416 18.5 7.33116 18.5C6.2581 18.5 5.23196 18.0095 4.58341 17.3211ZM14.5834 17.3211C13.5532 16.2274 13 15 13 13.0103C13 9.51086 15.4565 6.37366 19.0306 4.82318L19.9233 6.20079C16.588 8.00539 15.9362 10.346 15.6756 11.822C16.2126 11.5443 16.9156 11.4466 17.6047 11.5105C19.4091 11.6778 20.8312 13.159 20.8312 15C20.8312 16.933 19.2642 18.5 17.3312 18.5C16.2581 18.5 15.232 18.0095 14.5834 17.3211Z"></path></svg>

   </i>
    <p class="opacity-07 font-size-09rem">
      The daily activities make it easy for me to
                check in and see what opportunities are available.
    </p>
    <div class="column w-full">
        <strong style="font-family:Bricolage;" class="font-size-1-3rem">Amarachi Alachu</strong>
    <small class="opacity-05">Vistora Member</small>
    </div>
   </div>
    {{-- new --}}
        <div class="w-full column g-10px bg-rgt-005 p-15px br-20px">
   <i class="opacity-05">
    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4.58341 17.3211C3.55316 16.2274 3 15 3 13.0103C3 9.51086 5.45651 6.37366 9.03059 4.82318L9.92328 6.20079C6.58804 8.00539 5.93618 10.346 5.67564 11.822C6.21263 11.5443 6.91558 11.4466 7.60471 11.5105C9.40908 11.6778 10.8312 13.159 10.8312 15C10.8312 16.933 9.26416 18.5 7.33116 18.5C6.2581 18.5 5.23196 18.0095 4.58341 17.3211ZM14.5834 17.3211C13.5532 16.2274 13 15 13 13.0103C13 9.51086 15.4565 6.37366 19.0306 4.82318L19.9233 6.20079C16.588 8.00539 15.9362 10.346 15.6756 11.822C16.2126 11.5443 16.9156 11.4466 17.6047 11.5105C19.4091 11.6778 20.8312 13.159 20.8312 15C20.8312 16.933 19.2642 18.5 17.3312 18.5C16.2581 18.5 15.232 18.0095 14.5834 17.3211Z"></path></svg>

   </i>
    <p class="opacity-07 font-size-09rem">
     Everything is straightforward. I can see my
                activities and rewards directly from my dashboard.
    </p>
    <div class="column w-full">
        <strong style="font-family:Bricolage;" class="font-size-1-3rem">Tunde Elegbede</strong>
    <small class="opacity-05">Vistora Member</small>
    </div>
   </div>
   
    </section>
      {{-- new section --}}
    <section id="faqs" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,400px),1fr));" class="w-full p-y-35px overflow-hidden br-25px p-15px grid place-center g-10px">
        <strong class="font-size-1-5rem grid-full m-x-auto font-weight-800">Frequently asked questions</strong>
        <span class="grid-full opacity-07 m-x-auto">Everything you need to know before getting started.</span>
   {{-- new --}}
   <div x-data="{ 
        Expanded : false
     }" x-on:click="Expanded = !Expanded" class="w-full br-15px p-15px column bg-rgt-005 g-10px">
        <strong class="font-weight-800 font-size-1rem">How do I create an account?</strong>
        <span x-transition:enter.duration.500ms x-transition:leave.duration.500ms x-on:click.stop="" x-show="Expanded" class="opacity-07"> Click the Get Started button, complete the
                registration process and follow the instructions
                to activate your account.
            </span>
    </div>
    {{-- new --}}
   <div x-data="{ 
        Expanded : false
     }" x-on:click="Expanded = !Expanded" class="w-full br-15px p-15px column bg-rgt-005 g-10px">
        <strong class="font-weight-800 font-size-1rem">Does it cost anything to register?</strong>
        <span x-transition:enter.duration.500ms x-transition:leave.duration.500ms x-on:click.stop="" x-show="Expanded" class="opacity-07">
               No. Creating a Vistora account is free.
            </span>
    </div>
      {{-- new --}}
   <div x-data="{ 
        Expanded : false
     }" x-on:click="Expanded = !Expanded" class="w-full br-15px p-15px column bg-rgt-005 g-10px">
        <strong class="font-weight-800 font-size-1rem">How can I earn?</strong>
        <span x-transition:enter.duration.500ms x-transition:leave.duration.500ms x-on:click.stop="" x-show="Expanded" class="opacity-07">
              Depending on availability, you can participate
                in tasks, streaming activities, daily claims,
                referrals and other opportunities provided on
                the platform.
            </span>
    </div>
     {{-- new --}}
   <div x-data="{ 
        Expanded : false
     }" x-on:click="Expanded = !Expanded" class="w-full br-15px p-15px column bg-rgt-005 g-10px">
        <strong class="font-weight-800 font-size-1rem">Can I use Vistora on my phone?</strong>
        <span x-transition:enter.duration.500ms x-transition:leave.duration.500ms x-on:click.stop="" x-show="Expanded" class="opacity-07">
              Yes. Vistora is designed to work across mobile
                phones, tablets and desktop devices.
            </span>
    </div>
      {{-- new --}}
   <div x-data="{ 
        Expanded : false
     }" x-on:click="Expanded = !Expanded" class="w-full br-15px p-15px column bg-rgt-005 g-10px">
        <strong class="font-weight-800 font-size-1rem">How do I receive my rewards?</strong>
        <span x-transition:enter.duration.500ms x-transition:leave.duration.500ms x-on:click.stop="" x-show="Expanded" class="opacity-07">
              Eligible rewards are credited to your Vistora
                account according to the rules and requirements
                of the particular activity.
            </span>
    </div>
    </section>
  </section>
</main>
<footer style="grid-template-columns: repeat(auto-fit,minmax(min(100%,400px),1fr))" class="p-15px grid w-full g-20px">
 <div class="column w-full g-20px">
   <img src="{{ asset(config('settings.logo')) }}" alt="" class="w-150px  no-select no-pointer">
  <span class="opacity-09">
    A simple platform connecting people with tasks, entertainment, rewards and other online opportunities.
Platform
  </span>
  {{-- new row --}}
  <div class="row w-full align-center g-10px">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
  <g fill="currentColor">
    <path d="M16,2c-7.732,0-14,6.268-14,14,0,6.566,4.52,12.075,10.618,13.588v-9.31h-2.887v-4.278h2.887v-1.843c0-4.765,2.156-6.974,6.835-6.974,.887,0,2.417,.174,3.043,.348v3.878c-.33-.035-.904-.052-1.617-.052-2.296,0-3.183,.87-3.183,3.13v1.513h4.573l-.786,4.278h-3.787v9.619c6.932-.837,12.304-6.74,12.304-13.897,0-7.732-6.268-14-14-14Z"></path>
  </g>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
  <g fill="currentColor">
    <path d="M18.42,14.009L27.891,3h-2.244l-8.224,9.559L10.855,3H3.28l9.932,14.455L3.28,29h2.244l8.684-10.095,6.936,10.095h7.576l-10.301-14.991h0Zm-3.074,3.573l-1.006-1.439L6.333,4.69h3.447l6.462,9.243,1.006,1.439,8.4,12.015h-3.447l-6.854-9.804h0Z"></path>
  </g>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
  <g fill="currentColor">
    <path d="M10.202,2.098c-1.49,.07-2.507,.308-3.396,.657-.92,.359-1.7,.84-2.477,1.619-.776,.779-1.254,1.56-1.61,2.481-.345,.891-.578,1.909-.644,3.4-.066,1.49-.08,1.97-.073,5.771s.024,4.278,.096,5.772c.071,1.489,.308,2.506,.657,3.396,.359,.92,.84,1.7,1.619,2.477,.779,.776,1.559,1.253,2.483,1.61,.89,.344,1.909,.579,3.399,.644,1.49,.065,1.97,.08,5.771,.073,3.801-.007,4.279-.024,5.773-.095s2.505-.309,3.395-.657c.92-.36,1.701-.84,2.477-1.62s1.254-1.561,1.609-2.483c.345-.89,.579-1.909,.644-3.398,.065-1.494,.081-1.971,.073-5.773s-.024-4.278-.095-5.771-.308-2.507-.657-3.397c-.36-.92-.84-1.7-1.619-2.477s-1.561-1.254-2.483-1.609c-.891-.345-1.909-.58-3.399-.644s-1.97-.081-5.772-.074-4.278,.024-5.771,.096m.164,25.309c-1.365-.059-2.106-.286-2.6-.476-.654-.252-1.12-.557-1.612-1.044s-.795-.955-1.05-1.608c-.192-.494-.423-1.234-.487-2.599-.069-1.475-.084-1.918-.092-5.656s.006-4.18,.071-5.656c.058-1.364,.286-2.106,.476-2.6,.252-.655,.556-1.12,1.044-1.612s.955-.795,1.608-1.05c.493-.193,1.234-.422,2.598-.487,1.476-.07,1.919-.084,5.656-.092,3.737-.008,4.181,.006,5.658,.071,1.364,.059,2.106,.285,2.599,.476,.654,.252,1.12,.555,1.612,1.044s.795,.954,1.051,1.609c.193,.492,.422,1.232,.486,2.597,.07,1.476,.086,1.919,.093,5.656,.007,3.737-.006,4.181-.071,5.656-.06,1.365-.286,2.106-.476,2.601-.252,.654-.556,1.12-1.045,1.612s-.955,.795-1.608,1.05c-.493,.192-1.234,.422-2.597,.487-1.476,.069-1.919,.084-5.657,.092s-4.18-.007-5.656-.071M21.779,8.517c.002,.928,.755,1.679,1.683,1.677s1.679-.755,1.677-1.683c-.002-.928-.755-1.679-1.683-1.677,0,0,0,0,0,0-.928,.002-1.678,.755-1.677,1.683m-12.967,7.496c.008,3.97,3.232,7.182,7.202,7.174s7.183-3.232,7.176-7.202c-.008-3.97-3.233-7.183-7.203-7.175s-7.182,3.233-7.174,7.203m2.522-.005c-.005-2.577,2.08-4.671,4.658-4.676,2.577-.005,4.671,2.08,4.676,4.658,.005,2.577-2.08,4.671-4.658,4.676-2.577,.005-4.671-2.079-4.676-4.656h0"></path>
  </g>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
  <g fill="currentColor">
    <path d="M16,2c-7.732,0-14,6.268-14,14s6.268,14,14,14,14-6.268,14-14S23.732,2,16,2Zm6.489,9.521c-.211,2.214-1.122,7.586-1.586,10.065-.196,1.049-.583,1.401-.957,1.435-.813,.075-1.43-.537-2.218-1.053-1.232-.808-1.928-1.311-3.124-2.099-1.382-.911-.486-1.412,.302-2.23,.206-.214,3.788-3.472,3.858-3.768,.009-.037,.017-.175-.065-.248-.082-.073-.203-.048-.29-.028-.124,.028-2.092,1.329-5.905,3.903-.559,.384-1.065,.571-1.518,.561-.5-.011-1.461-.283-2.176-.515-.877-.285-1.574-.436-1.513-.92,.032-.252,.379-.51,1.042-.773,4.081-1.778,6.803-2.95,8.164-3.517,3.888-1.617,4.696-1.898,5.222-1.907,.116-.002,.375,.027,.543,.163,.142,.115,.181,.27,.199,.379,.019,.109,.042,.357,.023,.551Z" fill-rule="evenodd"></path>
  </g>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
  <g fill="currentColor">
    <path d="M25.873,6.069c-2.619-2.623-6.103-4.067-9.814-4.069C8.411,2,2.186,8.224,2.184,15.874c-.001,2.446,.638,4.833,1.852,6.936l-1.969,7.19,7.355-1.929c2.026,1.106,4.308,1.688,6.63,1.689h.006c7.647,0,13.872-6.224,13.874-13.874,.001-3.708-1.44-7.193-4.06-9.815h0Zm-9.814,21.347h-.005c-2.069,0-4.099-.557-5.87-1.607l-.421-.25-4.365,1.145,1.165-4.256-.274-.436c-1.154-1.836-1.764-3.958-1.763-6.137,.003-6.358,5.176-11.531,11.537-11.531,3.08,.001,5.975,1.202,8.153,3.382,2.177,2.179,3.376,5.077,3.374,8.158-.003,6.359-5.176,11.532-11.532,11.532h0Zm6.325-8.636c-.347-.174-2.051-1.012-2.369-1.128-.318-.116-.549-.174-.78,.174-.231,.347-.895,1.128-1.098,1.359-.202,.232-.405,.26-.751,.086-.347-.174-1.464-.54-2.788-1.72-1.03-.919-1.726-2.054-1.929-2.402-.202-.347-.021-.535,.152-.707,.156-.156,.347-.405,.52-.607,.174-.202,.231-.347,.347-.578,.116-.232,.058-.434-.029-.607-.087-.174-.78-1.88-1.069-2.574-.281-.676-.567-.584-.78-.595-.202-.01-.433-.012-.665-.012s-.607,.086-.925,.434c-.318,.347-1.213,1.186-1.213,2.892s1.242,3.355,1.416,3.587c.174,.232,2.445,3.733,5.922,5.235,.827,.357,1.473,.571,1.977,.73,.83,.264,1.586,.227,2.183,.138,.666-.1,2.051-.839,2.34-1.649,.289-.81,.289-1.504,.202-1.649s-.318-.232-.665-.405h0Z" fill-rule="evenodd"></path>
  </g>
</svg>
  </div>
  {{-- new --}}
  <div class="column g-5px">
    <span class="font-size-1rem uppercase">SECURITY</span>
    <img src="{{ asset('banners/IMG_1629-compressed.jpeg') }}" style="border:4px solid rgb(2, 87, 2)" alt="" class="w-100px br-10px no-select no-pointer">
  </div>
 </div>
  {{-- new --}}
  <div class="column g-10px">
    <span class="font-size-1rem uppercase">COMPANY</span>
    <a href="#features" class="no-u c-text opacity-08 no-select pointer">Features</a>
    <a href="#reviews" class="no-u c-text opacity-08 no-select pointer">Reviews</a>
    <a href="#faqs" class="no-u c-text opacity-08 no-select pointer">FAQs</a>
  </div>
  {{-- new --}}
  <div class="column g-10px">
    <span class="font-size-1rem uppercase">AUTH</span>
    <a href="{{ url('register') }}" class="no-u c-text opacity-08 no-select pointer">Register</a>
    <a href="{{ url('login') }}" class="no-u c-text opacity-08 no-select pointer">Log In</a>
  </div>
  {{-- new --}}
  <div class="column g-10px">
    <span class="font-size-1rem uppercase">SUPPORT</span>
    <a href="{{ url('privacy') }}" class="no-u c-text opacity-08 no-select pointer">Privacy Policy</a>
    <a href="{{ url('terms') }}" class="no-u c-text opacity-08 no-select pointer">Terms of Service</a>
  </div>
  <div class="hr grid-full" vitecss-type="solid"></div>
  <div  class="column grid-full w-full g-20px">
<span class="opacity-07">
    Vistora is a modern online platform built to bring people closer to tasks, entertainment, rewards, and a variety of digital opportunities. It provides a simple and convenient space where users can discover new activities, engage online, and unlock rewarding opportunities.
  
</span>
<span class="font-size-09rem opacity-08">
    © 2026 Vistora. All rights reserved.
  
</span>
  </div>
</footer>
  
 
  {{-- yield js --}}
    @yield('js')
</body>
</html>