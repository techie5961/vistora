@extends('layout.users.app')
@section('title')
    Dashboard
@endsection
@section('css')
    <style class="css">
      
        .communities{
            width:100%;
            border-radius:var(--br-primary);
            background: var(--primary);
            color:var(--primary-text);
            position: relative;
        }
        .communities::before{
            content:'';
            position:absolute;
            top:0;
            right:0;
            background:var(--primary-text);
            opacity:0.1;
            height:70%;
            aspect-ratio:1;
            border-radius:50%;
            transform: translateX(20%) translateY(-20%);
            
        }
        .communities::after{
            content:'';
            position:absolute;
            bottom:0;
            left:0;
            background:var(--primary-text);
            opacity:0.1;
            height:50%;
            aspect-ratio:1;
            border-radius:50%;
            transform: translateX(-20%) translateY(20%);
            
        }
        .communities > div{
            padding: 20px;
            display:flex;
            flex-direction: column;
            gap:10px;
            position:relative;
            z-index:100;

        }
        .post.join-telegram{
            background:linear-gradient(to right,rgb(2, 84, 117),rgb(0, 183, 255));
        }
        .quick-links > div > div{
            background:var(--primary) !important;
        }
        .balance-div,.border-element{
            background:linear-gradient(to bottom,var(--primary-01),var(--primary-005));
            position: relative;
        }
        .balance-div::before,.border-element::before{
            content: '';
            inset: 0;
            background:linear-gradient(to bottom,var(--primary-05),var(--primary-01));
            position: absolute;
            border-radius:inherit;
            padding:1px;
            mask:linear-gradient(white 0,white) content-box,linear-gradient(white 0,white);
            -webkit-mask:linear-gradient(white 0,white) content-box,linear-gradient(white 0,white);
            mask-composite: exclude;
            -webkit-mask-composite: xor;
            pointer-events: none;
        }
        
    </style>
@endsection
@section('main')

<section class="column w-full g-10">
    {{-- new row --}}
    <div class="column">
        <span class="font-size-1rem">Hello, {{ ucwords(strtolower(Auth::guard('users')->user()->name)) }}! 😊</span>
        <small>Here's what's happening today</small>
    </div>
    {{-- balance div --}}
    <div class="w-full balance-div p-15px br-20px column g-10px">
        <span class="opacity-07">
            Earning Balance
        </span>
        <strong style="font-family:Bricolage" class="font-size-2rem font-weight-900">
            &#8358;{{ number_format(Auth::guard('users')->user()->main_balance,2) }}
        </strong>
        {{-- new row --}}
        <div class="row w-full align-center g-10px">
            <div class="column g-5px">
                <small class="opacity-07">Referral Balance</small>
                <strong  style="font-family:Bricolage" class="font-weight-900 font-size-1 c-primary">
                      &#8358;{{ number_format(Auth::guard('users')->user()->affiliate_balance,2) }}
                </strong>
            </div>
            {{-- new --}}
            <div x-data="{  }" class="w-fit m-left-auto row align-center g-10px">
                <button x-on:click="Vitecss.navigate('{{ url('users/withdraw') }}')" style="font-size:0.7rem;background:linear-gradient(to bottom,var(--primary),var(--primary-darker));border:1px solid var(--primary-light);color:white;" class="p-10px p-x-10px br-10px w-fit">
                    Withdraw
                </button>
                   <button  x-on:click="Vitecss.navigate('{{ url('users/tasks') }}')" style="font-size:0.7rem;background:linear-gradient(to bottom,var(--primary-01),var(--primary-001));border:none;color:white;" class="p-10px border-element p-x-10px br-10px w-fit">
                   Earn More
                </button>
            </div>
        </div>
    </div>

    {{-- new element --}}
    <div x-data="{  }" class="w-full column border-element br-20px row p-15px g-10px">
        <strong class="font-weight-800 font-size-09">Quick Links</strong>
        <div class="row text-align-center align-center w-full g-10px space-between">
            <div class="w-full column g-5px border-width-1px border-style-solid border-color-primary-05 bg-primary-005 p-10px align-center justify-center br-10px">
             <i class="c-primary">
                 <svg width="30" height="30" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M12.3567 6.79173C12.7267 6.56855 13.3708 6.24675 13.9885 6.63333C14.621 7.02911 14.5877 7.76061 14.5333 8.18375C14.4717 8.66282 14.3017 9.29745 14.102 10.0425L14.0468 10.2485C14.0077 10.3943 13.977 10.5092 13.9531 10.6087C13.9409 10.6592 13.9318 10.7009 13.9249 10.7358C14.036 10.7768 14.1989 10.8232 14.4614 10.8935L14.5117 10.907C15.0041 11.0389 15.4487 11.158 15.7772 11.2971C16.1032 11.4352 16.5469 11.6869 16.6905 12.2181L16.6926 12.2258L16.6949 12.2343L16.6969 12.2423L16.6988 12.2502L16.7006 12.2582L16.7024 12.2663L16.7042 12.2749L16.7058 12.2829C16.8158 12.8294 16.5226 13.2517 16.281 13.5173C16.0319 13.7914 15.6621 14.0888 15.2547 14.4132L13.1952 16.0532C12.5818 16.5417 12.0622 16.9555 11.6433 17.2083C11.2733 17.4314 10.6292 17.7532 10.0114 17.3666C9.37896 16.9709 9.41224 16.2394 9.46664 15.8162C9.52824 15.3371 9.69834 14.7025 9.89803 13.9574L9.9532 13.7515C9.99228 13.6057 10.023 13.4908 10.0469 13.3913C10.0578 13.3462 10.0663 13.3081 10.0728 13.2756C9.96145 13.2288 9.79443 13.175 9.53863 13.1065C9.02039 12.9676 8.55593 12.8407 8.21199 12.6899C7.88373 12.5459 7.44693 12.2881 7.30504 11.7632L7.30294 11.7555L7.30071 11.747L7.29871 11.739L7.29681 11.7311L7.29498 11.7232L7.29321 11.7152L7.29141 11.7066L7.28984 11.6986C7.17835 11.1451 7.48144 10.7253 7.72358 10.466C7.96296 10.2096 8.3168 9.92793 8.70292 9.62054L10.8047 7.94679C11.4181 7.45826 11.9377 7.04446 12.3567 6.79173ZM11.6948 9.15552C12.2924 8.67962 12.709 8.34951 13.0223 8.14483C12.9602 8.50318 12.8283 9.00044 12.638 9.71067L12.5879 9.89758C12.5199 10.1509 12.4506 10.4095 12.4225 10.6334C12.3901 10.8924 12.397 11.21 12.5811 11.5221L12.5852 11.529L12.5894 11.5358C12.7747 11.8352 13.0461 11.9945 13.2842 12.0951C13.5095 12.1904 13.7886 12.2662 14.0731 12.3424C14.5276 12.4642 14.8372 12.5484 15.0552 12.6256C14.897 12.7756 14.6622 12.9675 14.3203 13.2398L12.3052 14.8445C11.7076 15.3204 11.291 15.6505 10.9776 15.8551C11.0398 15.4968 11.1717 14.9995 11.362 14.2893L11.4121 14.1025C11.4801 13.8492 11.5494 13.5905 11.5775 13.3666C11.6099 13.1076 11.603 12.79 11.4189 12.478L11.4161 12.4795C11.239 12.2074 10.9846 12.0448 10.7517 11.936C10.5148 11.8254 10.2304 11.7389 9.92686 11.6576C9.47254 11.5359 9.16106 11.4482 8.94371 11.3679C9.10378 11.2204 9.33829 11.0321 9.67973 10.7602L11.6948 9.15552Z" fill="CurrentColor" "=""></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75C17.1086 2.75 21.25 6.89137 21.25 12C21.25 17.1086 17.1086 21.25 12 21.25C6.89137 21.25 2.75 17.1086 2.75 12Z" fill="CurrentColor" "=""></path>
</svg>
             </i>

                <small>Claim</small>
            </div>
             <div x-on:click="Vitecss.navigate('{{ url('users/tasks') }}')" class="w-full column g-5px border-width-1px border-style-solid border-color-primary-05 bg-primary-005 p-10px align-center justify-center br-10px">
             <i class="c-primary">
                <svg width="30" height="30" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M20.5277 10.3733C20.157 9.73139 19.4777 9.52036 18.8292 9.42968C18.1755 9.33827 17.3006 9.3383 16.2424 9.33834L16.1822 9.33834C15.5521 9.33834 15.1402 9.33212 14.84 9.2904C14.5686 9.25266 14.4823 9.1968 14.4455 9.16422C14.4185 9.13611 14.3704 9.07038 14.3377 8.83341C14.2991 8.554 14.2974 8.17086 14.2974 7.55679V7.1823C14.2975 5.59478 14.2975 4.32304 14.1753 3.41636C14.0606 2.56529 13.788 1.60945 12.8438 1.3201C11.9162 1.03584 11.1382 1.64539 10.5335 2.27381C9.88924 2.94325 9.12395 3.9787 8.16577 5.27514L5.02878 9.51945C4.41844 10.3452 3.90966 11.0335 3.6065 11.6027C3.30262 12.1733 3.08146 12.8507 3.41853 13.5265L3.41971 13.529L3.42326 13.5363L3.4273 13.5443L3.43127 13.5519L3.43562 13.5601L3.44004 13.5682L3.44423 13.5758L3.44866 13.5835L3.45271 13.5904L3.4542 13.5929C3.8217 14.2294 4.49806 14.4522 5.15242 14.5521C5.82674 14.655 6.72653 14.6616 7.81777 14.6616C8.45438 14.6616 8.8603 14.6631 9.15842 14.7011C9.42177 14.7347 9.50053 14.7864 9.53429 14.8163C9.5642 14.8475 9.61664 14.9205 9.65362 15.166C9.69594 15.4471 9.70258 15.8361 9.70257 16.4432L9.70256 16.8175C9.70252 18.4051 9.70248 19.6769 9.82465 20.5836C9.93932 21.4346 10.2119 22.3905 11.1561 22.6798C12.0837 22.9641 12.8617 22.3546 13.4665 21.7261C14.1107 21.0567 14.876 20.0212 15.8342 18.7248L18.9336 14.5314C19.5644 13.678 20.0832 12.965 20.3891 12.3716C20.6885 11.7908 20.8974 11.1094 20.5634 10.4398L20.5623 10.4374L20.5587 10.4301L20.5546 10.4221L20.5507 10.4144L20.5463 10.4062L20.5418 10.398L20.5376 10.3904L20.5332 10.3827L20.5291 10.3757L20.5277 10.3733ZM11.6143 3.31392C11.0463 3.90411 10.3386 4.85903 9.33482 6.21708L6.27268 10.3601C5.61499 11.25 5.17495 11.8487 4.93044 12.3078C4.81142 12.5313 4.76674 12.6722 4.75402 12.7576C4.74617 12.8103 4.75096 12.8341 4.75724 12.8493C4.78143 12.885 4.88645 12.9941 5.37881 13.0693C5.91671 13.1514 6.69014 13.1616 7.81777 13.1616L7.86374 13.1616C8.44088 13.1616 8.94374 13.1616 9.34812 13.2131C9.7813 13.2684 10.2116 13.3939 10.5679 13.729L10.5737 13.7345L10.5794 13.7401C10.9294 14.0837 11.0717 14.5097 11.1369 14.9427C11.1992 15.3565 11.2026 15.8656 11.2026 16.4432L11.2026 16.7528C11.2025 18.4197 11.2042 19.5892 11.3112 20.3833C11.3645 20.7787 11.4362 21.0106 11.5048 21.1401C11.5562 21.2372 11.5858 21.2435 11.5941 21.2453L11.5956 21.2457L11.5971 21.2462C11.6076 21.2498 11.6445 21.2625 11.7581 21.2053C11.9001 21.1339 12.103 20.9798 12.3857 20.686C12.9536 20.0958 13.6614 19.1409 14.6652 17.7828L17.7273 13.6399C18.3813 12.7551 18.817 12.1476 19.0559 11.6842C19.2606 11.2871 19.2383 11.1526 19.2247 11.1169C19.2022 11.0841 19.1014 10.9823 18.6215 10.9152C18.0844 10.8401 17.3159 10.8383 16.1822 10.8383C15.5794 10.8383 15.0565 10.8349 14.6335 10.7761C14.1966 10.7154 13.7653 10.5839 13.4122 10.2517L13.4063 10.2462L13.4006 10.2406C13.0474 9.89394 12.9112 9.46849 12.8518 9.03862C12.7974 8.6443 12.7974 8.15598 12.7974 7.60514L12.7974 7.24709C12.7974 5.5802 12.7957 4.41074 12.6887 3.61668C12.6355 3.22128 12.5638 2.98935 12.4952 2.85983C12.4437 2.76277 12.4141 2.75641 12.4058 2.75463L12.4043 2.75427L12.4028 2.75377C12.3924 2.75015 12.3555 2.73743 12.2418 2.79463C12.0998 2.86608 11.897 3.02017 11.6143 3.31392Z" fill="CurrentColor" "=""></path>
</svg>

             </i>

                <small>Tasks</small>
            </div>
             <div x-on:click="Vitecss.navigate('{{ url('users/stream') }}')" class="w-full column g-5px border-width-1px border-style-solid border-color-primary-05 bg-primary-005 p-10px align-center justify-center br-10px">
             <i class="c-primary">
                <svg width="30" height="30" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M13 4.25C13.4142 4.25 13.75 4.58579 13.75 5C13.75 5.69036 14.3096 6.25 15 6.25C15.4142 6.25 15.75 6.58579 15.75 7C15.75 7.41421 15.4142 7.75 15 7.75C14.5499 7.75 14.125 7.64186 13.75 7.45015V10.5C13.75 11.7426 12.7426 12.75 11.5 12.75C10.2574 12.75 9.25 11.7426 9.25 10.5C9.25 9.25736 10.2574 8.25 11.5 8.25C11.763 8.25 12.0154 8.29512 12.25 8.37803V5C12.25 4.58579 12.5858 4.25 13 4.25ZM12.25 10.5C12.25 10.0858 11.9142 9.75 11.5 9.75C11.0858 9.75 10.75 10.0858 10.75 10.5C10.75 10.9142 11.0858 11.25 11.5 11.25C11.9142 11.25 12.25 10.9142 12.25 10.5Z" fill="CurrentColor" "=""></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M7.4984 1.60719C8.66129 1.41099 10.1724 1.25 12.0002 1.25C13.8279 1.25 15.339 1.41099 16.5019 1.60719L16.6368 1.62983C17.647 1.79893 18.4866 1.93949 19.1432 2.74808C19.5643 3.26668 19.7001 3.82713 19.7314 4.45323L20.2231 4.61712C20.6862 4.77147 21.0921 4.90675 21.4142 5.05656C21.7623 5.21852 22.0814 5.42714 22.3253 5.76555C22.5692 6.10396 22.6662 6.47262 22.7097 6.85411C22.75 7.20701 22.75 7.63488 22.7499 8.12306L22.7499 8.26828C22.7499 8.67007 22.75 9.02499 22.7203 9.32179C22.6881 9.64348 22.6169 9.95621 22.4391 10.2584C22.2613 10.5607 22.0225 10.7748 21.7569 10.9591C21.5118 11.1292 21.2016 11.3015 20.8503 11.4966L18.2097 12.9637C17.6703 14.025 16.9292 14.9713 15.9101 15.6548C15.0354 16.2414 13.9881 16.6128 12.75 16.7187V18.75H14.1802C15.0144 18.75 15.7326 19.3388 15.8962 20.1568L16.1149 21.25H18C18.4142 21.25 18.75 21.5858 18.75 22C18.75 22.4142 18.4142 22.75 18 22.75H6C5.58579 22.75 5.25 22.4142 5.25 22C5.25 21.5858 5.58579 21.25 6 21.25H7.88515L8.10379 20.1568C8.26739 19.3388 8.98562 18.75 9.81981 18.75H11.25V16.7187C10.012 16.6127 8.9648 16.2414 8.09017 15.6548C7.07115 14.9713 6.33018 14.0252 5.79078 12.964L3.14962 11.4966C2.79836 11.3015 2.48813 11.1292 2.24307 10.9591C1.97748 10.7748 1.73867 10.5607 1.56083 10.2584C1.38299 9.95621 1.3118 9.64348 1.27965 9.32179C1.24999 9.02497 1.25 8.67008 1.25001 8.26827L1.25 8.12304C1.24996 7.63488 1.24992 7.20701 1.2902 6.85411C1.33375 6.47262 1.43076 6.10396 1.67466 5.76555C1.91857 5.42714 2.23762 5.21852 2.58577 5.05656C2.90781 4.90675 3.31373 4.77147 3.77686 4.61712L4.26891 4.4531C4.30023 3.82706 4.43608 3.26664 4.85712 2.74808C5.51366 1.93949 6.35333 1.79893 7.36355 1.62983L7.4984 1.60719ZM9.41486 21.25H14.5852L14.4253 20.451C14.402 20.3341 14.2994 20.25 14.1802 20.25H9.81981C9.70064 20.25 9.59804 20.3341 9.57467 20.451L9.41486 21.25ZM4.3021 6.02318C4.37367 7.54348 4.5454 9.22376 4.97298 10.7937L3.90729 10.2016C3.51814 9.98542 3.27447 9.84906 3.09829 9.72679C2.93588 9.61407 2.88298 9.54762 2.85363 9.49774C2.82428 9.44786 2.79187 9.36934 2.77221 9.17263C2.75089 8.95925 2.75002 8.68002 2.75001 8.23484L2.75001 8.16231C2.74999 7.62323 2.75111 7.28191 2.78053 7.02422C2.80775 6.7857 2.85231 6.69703 2.89154 6.6426C2.93077 6.58817 3.0008 6.51786 3.21847 6.4166C3.45362 6.3072 3.77708 6.19819 4.28849 6.02772L4.3021 6.02318ZM19.0274 10.7934L20.0927 10.2016C20.4818 9.98542 20.7255 9.84906 20.9016 9.72679C21.0641 9.61407 21.117 9.54762 21.1463 9.49774C21.1757 9.44786 21.2081 9.36934 21.2277 9.17263C21.2491 8.95925 21.2499 8.68002 21.2499 8.23484L21.2499 8.16231C21.25 7.62323 21.2488 7.28191 21.2194 7.02422C21.1922 6.7857 21.1476 6.69703 21.1084 6.6426C21.0692 6.58817 20.9991 6.51786 20.7815 6.4166C20.5463 6.3072 20.2229 6.19819 19.7115 6.02772L19.6982 6.0233C19.6266 7.54349 19.4549 9.22363 19.0274 10.7934ZM12.0002 2.75C10.2608 2.75 8.83319 2.90319 7.74796 3.08629C6.54104 3.28992 6.28751 3.3661 6.02161 3.69358C5.75956 4.01632 5.73468 4.32156 5.78848 5.67672C5.87815 7.93537 6.1761 10.3727 7.09884 12.2264C7.55432 13.1414 8.14983 13.8887 8.92569 14.409C9.69656 14.9261 10.6911 15.25 12.0002 15.25C13.3092 15.25 14.3037 14.9261 15.0746 14.409C15.8505 13.8887 16.446 13.1414 16.9015 12.2264C17.8242 10.3727 18.1222 7.93537 18.2118 5.67672C18.2656 4.32156 18.2407 4.01632 17.9787 3.69358C17.7128 3.3661 17.4593 3.28992 16.2524 3.08629C15.1671 2.90319 13.7395 2.75 12.0002 2.75Z" fill="CurrentColor" "=""></path>
</svg>

             </i>

                <small>Music</small>
            </div>
             <div  x-on:click="Vitecss.navigate('{{ url('users/withdraw') }}')" class="w-full column g-5px border-width-1px border-style-solid border-color-primary-05 bg-primary-005 p-10px align-center justify-center br-10px">
             <i class="c-primary">
              <svg width="30" height="30" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M20.9235 11.7502C20.9032 11.75 20.8766 11.75 20.8333 11.75H18.2308C16.8074 11.75 15.75 12.8087 15.75 14C15.75 15.1913 16.8074 16.25 18.2308 16.25H20.8333C20.8766 16.25 20.9032 16.25 20.9235 16.2498C20.9427 16.2496 20.948 16.2492 20.948 16.2492C21.154 16.2367 21.2427 16.0976 21.2495 16.0139C21.2495 16.0139 21.2497 16.0077 21.2498 15.9986C21.25 15.9808 21.25 15.9572 21.25 15.9167V12.0833C21.25 12.0609 21.25 12.0437 21.25 12.0297C21.2499 12.0185 21.2499 12.0093 21.2498 12.0014C21.2497 11.9924 21.2495 11.9861 21.2495 11.9861C21.2427 11.9024 21.154 11.7633 20.9479 11.7508C20.9479 11.7508 20.943 11.7504 20.9235 11.7502ZM20.8499 10.25C20.9163 10.25 20.9803 10.2499 21.0391 10.2535C21.9104 10.3066 22.681 10.9638 22.7458 11.8818C22.7501 11.942 22.75 12.0069 22.75 12.067C22.75 12.0725 22.75 12.0779 22.75 12.0833V15.9167C22.75 15.9221 22.75 15.9275 22.75 15.933C22.75 15.9931 22.7501 16.058 22.7458 16.1182C22.681 17.0362 21.9104 17.6934 21.0391 17.7465C20.9803 17.7501 20.9163 17.75 20.8499 17.75C20.8444 17.75 20.8389 17.75 20.8333 17.75H18.2308C16.0856 17.75 14.25 16.1224 14.25 14C14.25 11.8776 16.0856 10.25 18.2308 10.25H20.8333C20.8389 10.25 20.8444 10.25 20.8499 10.25Z" fill="CurrentColor" "=""></path>
<path d="M19 14C19 14.5523 18.5523 15 18 15C17.4477 15 17 14.5523 17 14C17 13.4477 17.4477 13 18 13C18.5523 13 19 13.4477 19 14Z" fill="CurrentColor" "=""></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M20.8499 10.25C20.9163 10.25 20.9803 10.2499 21.0391 10.2535C21.2645 10.2672 21.4832 10.3214 21.6847 10.4101C21.5777 8.80363 21.2831 7.56563 20.3588 6.64124C19.6104 5.89288 18.6614 5.56076 17.489 5.40313L17.4467 5.39754C17.4362 5.38977 17.4255 5.38223 17.4145 5.37492L13.679 2.89806C12.3758 2.03398 10.6242 2.03398 9.32102 2.89806L5.58554 5.37492C5.57453 5.38223 5.56377 5.38977 5.55327 5.39754L5.51098 5.40313C4.33856 5.56076 3.38961 5.89288 2.64124 6.64124C1.89288 7.38961 1.56076 8.33856 1.40314 9.51098C1.24997 10.6502 1.24998 12.1058 1.25 13.9436V14.0564C1.24998 15.8942 1.24997 17.3498 1.40314 18.489C1.56076 19.6614 1.89288 20.6104 2.64124 21.3588C3.38961 22.1071 4.33856 22.4392 5.51098 22.5969C6.65019 22.75 8.10583 22.75 9.94359 22.75H13.0564C14.8942 22.75 16.3498 22.75 17.489 22.5969C18.6614 22.4392 19.6104 22.1071 20.3588 21.3588C21.2831 20.4344 21.5777 19.1964 21.6847 17.5899C21.4832 17.6786 21.2645 17.7328 21.0391 17.7465C20.9803 17.7501 20.9163 17.75 20.8499 17.75L20.8333 17.75H20.1679C20.0541 19.0915 19.7966 19.7996 19.2981 20.2981C18.8749 20.7213 18.2952 20.975 17.2892 21.1102C16.2615 21.2484 14.9068 21.25 13 21.25H10C8.09318 21.25 6.73851 21.2484 5.71085 21.1102C4.70476 20.975 4.12511 20.7213 3.7019 20.2981C3.27869 19.8749 3.02502 19.2952 2.88976 18.2892C2.75159 17.2615 2.75 15.9068 2.75 14C2.75 12.0932 2.75159 10.7385 2.88976 9.71085C3.02502 8.70476 3.27869 8.12511 3.7019 7.7019C4.12511 7.27869 4.70476 7.02502 5.71085 6.88976C6.73851 6.75159 8.09318 6.75 10 6.75H13C14.9068 6.75 16.2615 6.75159 17.2892 6.88976C18.2952 7.02502 18.8749 7.27869 19.2981 7.7019C19.7966 8.20043 20.0541 8.90854 20.1679 10.25H20.8333L20.8499 10.25ZM9.94358 5.25H13.0564C13.5729 5.24999 14.0592 5.24999 14.5168 5.25339L12.8501 4.14821C12.0493 3.61726 10.9507 3.61726 10.15 4.14821L8.48318 5.25339C8.94077 5.24999 9.42708 5.24999 9.94358 5.25Z" fill="CurrentColor" "=""></path>
<path d="M6 9.25C5.58579 9.25 5.25 9.58579 5.25 10C5.25 10.4142 5.58579 10.75 6 10.75H10C10.4142 10.75 10.75 10.4142 10.75 10C10.75 9.58579 10.4142 9.25 10 9.25H6Z" fill="CurrentColor" "=""></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M19 14C19 14.5523 18.5523 15 18 15C17.4477 15 17 14.5523 17 14C17 13.4477 17.4477 13 18 13C18.5523 13 19 13.4477 19 14Z" fill="CurrentColor" "=""></path>
</svg>

             </i>

                <small>Withdraw</small>
            </div>
        </div>
    </div>
  
   

      {{-- refer section --}}
      <div x-data="{ 
        Link : '{{ url('users/register?ref='.Auth::guard('users')->user()->uniqid.'') }}',
        Copied : false
       }" class="w-full column g-10px p-15px br-15px border-element">
        <div class="column g-2px">
            <strong class="font-weight-800 font-size-09">Invite Link</strong>
        <small>Invite Friends, Earn rewards</small>
        <div class="row align-center g-10px w-full">
            <div class="p-x-10px row align-center h-40px ws-nowrap text-overflow-ellipsis br-10px w-full border-style-solid border-width-1px border-color-rgt-01">
           <span x-text="Link" class="ws-nowrap text-overflow-ellipsis"></span>
            </div>
            <div x-on:click="
            copy(Link);
            Copied =true;
            setTimeout(() => {
               Copied = false; 
            }, 2000);
            " class="w-40px column align-center justify-center h-40px no-shrink br-10px bg-primary-dark primfary-text">
<svg x-show="!Copied" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
  <g fill="currentColor">
    <path d="m13,7h2c1.105,0,2,.895,2,2v6c0,1.105-.895,2-2,2h-6c-1.105,0-2-.895-2-2v-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
    <rect x="3" y="3" width="10" height="10" rx="2" ry="2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill="currentColor"></rect>
  </g>
</svg>
<svg x-show="Copied" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>

            </div>
        </div>
        </div>
        
      </div>
      {{-- socials --}}
      <div class="w-full border-element p-15px br-15px column g-10px">
        <span>Join our official socials & communities to get instant updates and connect with other earners</span>
      {{-- new row --}}
      <div class="row w-full align-center space-between g-10px">
        <button x-data="{ 
            Link : '{{ $social_settings->whatsapp_community ?? '' }}'
         }" x-on:click="window.open(Link)" style="background:linear-gradient(#25d366,green);border:1px solid #02fd5e" class="btn-whatsapp br-10px p-10px w-full">
            Join Whatsapp
        </button>
         <button x-data="{ 
            Link : '{{ $social_settings->telegram_community ?? '' }}'
          }" x-on:click="window.open(Link)" style="background:linear-gradient(#0088cc,#01517c);border:1px solid #02abff" class="btn-whatsapp br-10px p-10px w-full">
            Join Telegram
        </button>
      </div>
    </div>
       @if (!$trx->isEmpty())
       
        {{-- recent transactions --}}
      <div class="column w-full g-10px">
       <div class="w-full row align-center g-10px space-between">
         <strong class="font-size-1">Recent Transactions</strong>
         <span x-data="{ 
            Link : '{{ url('users/transactions') }}'
          }" x-on:click="Vitecss.navigate(Link)" class="font-weight-800 c-primary no-select no-select pointer">View All</span>
       </div>
      <div style="grid-template-columns: repeat(auto-fit,minmax(100%,400px),1fr)" class="w-full grid place-center g-10px">
          @foreach ($trx as $data)
            <div class="w-full row border-element g-10px br-15px p-15px">
               @if ($data->class == 'debit')
                    <div style="background:linear-gradient(to bottom,red,rgb(133, 2, 2));border:1px solid rgb(248, 37, 37);color:white" class="w-40px h-40px perfect-square no-shrink circle column align-center justify-center">
                   <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.0001 7.82843V20H11.0001V7.82843L5.63614 13.1924L4.22192 11.7782L12.0001 4L19.7783 11.7782L18.3641 13.1924L13.0001 7.82843Z"></path></svg>

                </div>
               @else
                    <div style="background:linear-gradient(to bottom,#4caf50,green);border:1px solid rgb(0, 255, 0);color:white" class="w-40px h-40px perfect-square no-shrink circle column align-center justify-center">
                   <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.0001 16.1716L18.3641 10.8076L19.7783 12.2218L12.0001 20L4.22192 12.2218L5.63614 10.8076L11.0001 16.1716V4H13.0001V16.1716Z"></path></svg>

                </div>
               @endif
               {{-- new column --}}
               <div class="column m-right-auto g-5px">
                <strong class="font-weight-800">{{ $data->title }}</strong>
                <small class="opacity-07">{{ $data->frame }}</small>
               </div>
                {{-- new column --}}
               <div class="column text align-end g-5px">
                <strong style="color:{{ $data->class == 'debit' ? 'red' : 'rgb(0,255,0)' }}" class="font-size-1 ws-nowrap font-weight-900">{{ $data->class == 'debit' ? '-' : '+' }}&#8358;{{ number_format($data->amount,2) }}</strong>
                <div class="status {{ $data->status == 'success' ? 'green' : ($data->status == 'pending' ? 'gold' : 'red') }}">{{ $data->status }}</div>
               </div>
            </div>
        @endforeach
      </div>
     </div>
        @endif
   
</section>
@endsection
