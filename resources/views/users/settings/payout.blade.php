@extends('layout.users.app')
@section('title')
    Payout Settings
@endsection
@section('main')
    <section x-data="{ 
        Bank : {
            Name : '',
            Code : ''
        },
        AccountNumber : '',
        AccountName : '',
        BankOverlay : false,
        Verifying : false,
        VerifyError : false
     }" x-init="$watch('AccountNumber', (value) => {
        if(value.length == 10 && Bank.Code != ''){
            AccountName = '';
            VerifyError=false;
            Verifying = true;
            SendPostRequest('{{ url('users/post/verify/bank/process') }}',{
                '_token' : '{{ @csrf_token() }}',
                'account_number' : AccountNumber,
                'bank_code' : Bank.Code
            },function(response){
                Verifying = false;
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    AccountName = data.message;
                }else{
                    VerifyError=data.message;
                }
            });
        }
     });

     $watch('Bank.Code', (value) => {
        if(AccountNumber.length == 10 && value != ''){
            AccountName = '';
           VerifyError=false;
            Verifying = true;
            SendPostRequest('{{ url('users/post/verify/bank/process') }}',{
                '_token' : '{{ @csrf_token() }}',
                'account_number' : AccountNumber,
                'bank_code' : Bank.Code
            },function(response){
                Verifying = false;
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    AccountName = data.message;
                }else{
                    VerifyError=data.message;
                }
            });
        }
     })
     
     " class="w-full column g-10px">
    
        <div class="column w-full">
            <strong class="desc font-weight-900">Payout Settings</strong>
        </div>
       
        <form method="POST" x-bind:class="Verifying ? 'no-pointer' : ''" action="{{ url('users/post/update/payout/process') }}" x-on:submit="PostRequest($event,$el,function(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                Vitecss.navigate('{{ url()->current() }}');
            }
        },'Saving...')" style="border:1px solid var(--rgt-005)" class="border-element g-10px column br-15px p-15px">
       
     {{-- csrf token --}}
     <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
    {{-- bank code --}}
     <input x-model="Bank.Code" type="hidden" name="bank_code" class="inp required input">
         {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Account Number</label>
            <div class="cont">

                <input x-model="AccountNumber" placeholder="Enter 10 digits account number" inputmode="numeric" type="number" name="account_number" class="inp input required">
            </div>
        </div>
     {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Bank Name</label>
           <div class="w-full pos-relative">
             <div x-on:click="BankOverlay = !BankOverlay" class="cont">
                <input type="hidden" class="inp input required" name="bank_name" x-model="Bank.Name">
               <div class="row w-full align-center space-between g-10px">
                 <span x-show="Bank.Name == ''" class="c-rgt-05 p-10px">Select bank</span>
                 <span x-show="Bank.Name != ''" class="p-10px" x-text="Bank.Name"></span>
                <i class="p-10px c-rgt-05">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M18.2072 9.0428 12.0001 2.83569 5.793 9.0428 7.20721 10.457 12.0001 5.66412 16.793 10.457 18.2072 9.0428ZM5.79285 14.9572 12 21.1643 18.2071 14.9572 16.7928 13.543 12 18.3359 7.20706 13.543 5.79285 14.9572Z"></path></svg>

                </i>
               </div>
            
            </div>
            {{-- new  --}}
            <div x-data="{ 
                SearchKey : '',
                Height : '50vh'
             }" x-on:click.outside="BankOverlay = false" x-show="BankOverlay" x-transition:enter.duration.500ms x-transition:leave.duration.500ms style="top:calc(100% + 0px);max-width:80%;max-height:50vh;" class="pos-absolute no-select overflow-hidden p-y-5px border-element br-15px z-index-1000 backdrop-blur-50px">
                <div x-ref="SearchBox" class="w-full pos-sticky top-0 p-10px">
                    <input x-init="
                    $watch('BankOverlay', (value) => {
                        if(!value){
                            SearchKey = '';
                        }
                    })
                    " x-model="SearchKey" placeholder="Search by bank name..." type="search" class="w-full bg-black-transparent br-10px border-width-1px border-style-solid border-color-primary-05 h-40px">
                </div>
                <div x-init="
                $watch('BankOverlay', (value) => {
                    if(value){
                        $nextTick(() => {
                            Height = `calc(50vh - ${$refs.SearchBox.offsetHeight + 'px'})`
                        })
                    }
                })
                " x-bind:style="{
                    'max-height' : Height
                }" x- class="column p-bottom-10px w-full overflow-auto">
               
                @foreach (json_decode(file_get_contents(database_path('data/korapayBanks.json'))) as $data)
                    <div x-on:click="
                    Bank.Name = '{{ $data->name }}';
                    Bank.Code = '{{ $data->code }}';
                    BankOverlay = false;
                    " x-on:touchstart="$el.classList.add('bg-black-light')" x-on:touchend="$el.classList.remove('bg-black-light')" x-on:mouseover="$el.classList.add('bg-black-light')" x-on:mouseleave="$el.classList.remove('bg-black-light')" x-bind:class="'{{ $data->name }}'.includes(SearchKey) ? '' : 'display-none'" class="row w-full p-10px p-x-15px">
                        <span>{{ $data->name }}</span>
                    </div>
                @endforeach
               </div>
            </div>
           </div>
        </div>
        <div x-show="Verifying" style="background:rgba(0,255,0,0.1);color:rgb(0,255,0)" class="w-fit m-left-auto no-select h-fit row g-5px p-5px p-x-10px br-5px">
            <i>
                <?xml version="1.0" encoding="utf-8"?><svg height="12" width="12" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2400 2400" xml:space="preserve"><g stroke-width="200" stroke-linecap="round" stroke="currentColor" fill="none" id="spinner"><line x1="1200" y1="600" x2="1200" y2="100"/><line opacity="0.5" x1="1200" y1="2300" x2="1200" y2="1800"/><line opacity="0.917" x1="900" y1="680.4" x2="650" y2="247.4"/><line opacity="0.417" x1="1750" y1="2152.6" x2="1500" y2="1719.6"/><line opacity="0.833" x1="680.4" y1="900" x2="247.4" y2="650"/><line opacity="0.333" x1="2152.6" y1="1750" x2="1719.6" y2="1500"/><line opacity="0.75" x1="600" y1="1200" x2="100" y2="1200"/><line opacity="0.25" x1="2300" y1="1200" x2="1800" y2="1200"/><line opacity="0.667" x1="680.4" y1="1500" x2="247.4" y2="1750"/><line opacity="0.167" x1="2152.6" y1="650" x2="1719.6" y2="900"/><line opacity="0.583" x1="900" y1="1719.6" x2="650" y2="2152.6"/><line opacity="0.083" x1="1750" y1="247.4" x2="1500" y2="680.4"/><animateTransform attributeName="transform" attributeType="XML" type="rotate" keyTimes="0;0.08333;0.16667;0.25;0.33333;0.41667;0.5;0.58333;0.66667;0.75;0.83333;0.91667" values="0 1199 1199;30 1199 1199;60 1199 1199;90 1199 1199;120 1199 1199;150 1199 1199;180 1199 1199;210 1199 1199;240 1199 1199;270 1199 1199;300 1199 1199;330 1199 1199" dur="0.83333s" begin="0s" repeatCount="indefinite" calcMode="discrete"/></g></svg>

            </i>
            <span class="font-size-07">verifying...</span>
        </div>
        {{-- verify error --}}
        <div x-show="VerifyError" x-text="VerifyError" style="background:rgb(255, 215, 0,0.1);color:gold;" class="w-full p-10px br-5px no-select bg-red-transparent c-red">
        </div>
       
        {{-- new input --}}
        <div x-show="AccountName !== ''" class="column g-5 w-full">
            <label>Account Name</label>
            <div class="cont">

                <input readonly x-model="AccountName" placeholder="Enter account name" type="text" name="account_name" class="inp input required">
            </div>
        </div>

        {{-- submit btn --}}
        <button class="post">
            Save
        </button>
    </form>
      @isset(Auth::guard('users')->user()->bank)
      <strong class="font-size-1rem font-weight-900">Current Payout Details</strong>
         <div class="w-full border-element br-15px p-15px column no-select no-pointer g-10px">
            {{-- new row --}}
            <div class="w-full row align-center g-10px space-between">
                <img src="{{ asset('photos/master-card-removebg-preview.png') }}" alt="" class="h-30px">
                <img src="{{ asset('photos/chip-logo-removebg-preview.png') }}" alt="" class="h-40px">
            </div>
            {{-- new row --}}
            <strong class="font-size-1rem">{{ json_decode(Auth::guard('users')->user()->bank)->account_name }}</strong>
            <strong class="opacity-08">{{ json_decode(Auth::guard('users')->user()->bank)->bank_name }}</strong>
            <strong class="font-size-1rem">{{ substr(json_decode(Auth::guard('users')->user()->bank)->account_number,0,3).'****'.substr(json_decode(Auth::guard('users')->user()->bank)->account_number,8,2) }}</strong>
         </div>
     @endisset
    </section>
@endsection