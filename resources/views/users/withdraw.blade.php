@extends('layout.users.app')
@section('title')
    Withdraw
@endsection

@section('main')
    <section x-data="{ 
        Wallets : {
            affiliate_balance : {
                Minimum : '&#8358;{{ number_format($finance_settings->withdrawal->affiliate_balance->minimum) }}',
                Key : 'Referral Wallet'
            },
            main_balance : {
                Minimum : '&#8358;{{ number_format($finance_settings->withdrawal->main_balance->minimum) }}',
                Key : 'Earning wallet'
            }
        },
        WalletSelected : false
     }" class="w-full column g-10">
        <div class="column w-full">
            <strong class="desc font-weight-900">Withdraw Funds</strong>
        <span>Easily cash out your funds into your local bank account, fast and easy</span>
        </div>
        <div class="w-full row g-10px p-15px br-15px border-element">
           {{-- new row --}}
            <div class="row w-full g-10px border-right-width-1px border-right-style-solid border-right-color-primary-05">
                <div class="border-element no-shrink c-primary column h-40px w-40px circle no-select align-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
  <g fill="currentColor">
    <path d="M15.6449 7.0522C15.474 6.7114 15.1317 6.5 14.7504 6.5H10.2948L10.559 2.0312C10.5844 1.6025 10.3305 1.2148 9.9272 1.0668C9.5244 0.920302 9.0791 1.0507 8.8222 1.3949L2.4492 9.9008C2.2207 10.206 2.185 10.6069 2.3554 10.9477C2.5258 11.2885 2.8686 11.4999 3.2494 11.4999H7.705L7.4408 15.9687C7.4154 16.3974 7.6693 16.7851 8.0726 16.9331C8.1825 16.9731 8.2957 16.9927 8.4076 16.9927C8.705 16.9927 8.9906 16.855 9.1776 16.605L15.5511 8.0991C15.7791 7.7944 15.8153 7.393 15.6449 7.0522Z" fill="currentColor"></path>
  </g>
</svg>
                </div>
                {{-- new column --}}
                <div class="column">
                    <strong class="font-weight-800">Instant Payouts</strong>
                    <small>Receive payment in seconds</small>
                </div>
            </div>
            
              {{-- new row --}}
            <div class="row w-full g-10px">
                <div class="border-element no-shrink c-primary column h-40px w-40px circle no-select align-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
  <g fill="currentColor">
    <path d="M14.783,2.813l-5.25-1.68c-.349-.112-.718-.111-1.066,0L3.216,2.813c-.728,.233-1.216,.903-1.216,1.667v6.52c0,3.508,4.946,5.379,6.46,5.869,.177,.057,.358,.086,.54,.086s.362-.028,.538-.085c1.516-.49,6.462-2.361,6.462-5.869V4.48c0-.764-.489-1.434-1.217-1.667Zm-2.681,4.389l-3.397,4.5c-.128,.169-.322,.276-.534,.295-.021,.002-.043,.003-.065,.003-.189,0-.372-.071-.511-.201l-1.609-1.5c-.303-.283-.32-.757-.038-1.06,.284-.303,.758-.319,1.06-.038l1.001,.933,2.896-3.836c.25-.33,.72-.396,1.051-.146,.331,.25,.396,.72,.146,1.051Z" fill="currentColor"></path>
  </g>
</svg>
                </div>
                {{-- new column --}}
                <div class="column">
                    <strong class="font-weight-800">100% Secure</strong>
                    <small>Your funds are 100% safe</small>
                </div>
            </div>
        </div>
        <div class="w-full br-15px p-15px column border-element g-10">
             <form action="{{ url('users/post/withdrawal/process') }}" method="POST" x-on:submit="PostRequest($event,$el,function(){
             })" class="w-full column g-10">
               

              
                {{-- csrf token --}}
              <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
                {{-- new input --}}
                <div class="column g-5 w-full">
                    <label>Select Wallet</label>
                    <div class="cont">

                        <select x-model="WalletSelected" name="wallet" class="inp input required">
                            <option value="" selected>Click to choose...</option>
                            @foreach ($wallets as $data)
                                  <option data-minimum="{{ $currency.number_format($finance_settings->withdrawal->{$data->key}->minimum) }}" data-maximum="{{ $currency.number_format($finance_settings->withdrawal->{$data->key}->maximum) }}" value="{{ $data->key }}">{{ $data->name }} - {{ $currency.number_format(Auth::guard('users')->user()->{$data->key},2) }}</option>
                            @endforeach
                            </select>                
                        </div>
                </div>
                

                 {{-- new input --}}
                <div class="column g-5 w-full">
                    <label>Withdrawal Amount</label>
                    <div class="cont">
                        
                        <input type="number" name="amount" placeholder="Enter withdrawal amount" class="inp input required">                
                        </div>
                </div>
                <div x-show="WalletSelected" style="background:rgba(0,255,0,0.1);color:rgb(0,255,0)" class="w-full bg-green-transparent c-green br-10px p-10px">
                    Minimum Withdrawal for <span x-text="Wallets[WalletSelected].Key"></span> = <span x-html="Wallets[WalletSelected].Minimum">&#8358;5,000</span>
                </div>
                @isset(Auth::guard('users')->user()->bank)
                      {{-- bank details --}}
               <div class="w-full border-element br-15px p-15px column g-10">
                 
                {{-- new row --}}
                <div class="row g-10px">
                        <span class="opacity-08">Account Number :</span><strong>{{ json_decode(Auth::guard('users')->user()->bank)->account_number }}</strong>
                    </div>
                    {{-- new row --}}
                      <div class="row g-10px">
                        <span class="opacity-08">Bank :</span><strong>{{ json_decode(Auth::guard('users')->user()->bank)->bank_name }}</strong>
                    </div>
                    {{-- new row --}}
                    <div class="row g-10px">
                        <span class="opacity-08">Account Name :</span><strong>{{ json_decode(Auth::guard('users')->user()->bank)->account_name }}</strong>
                    </div>
                    <div onclick="Redirect('{{ url('users/payout/settings') }}')" class="row p-5 align-center no-select c-primary justify-end g-5">
                        <span>
                            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.7574 2.99678L9.29145 10.4627L9.29886 14.7099L13.537 14.7024L21 7.23943V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99678C3 3.4445 3.44772 2.99678 4 2.99678H16.7574ZM20.4853 2.09729L21.8995 3.5115L12.7071 12.7039L11.2954 12.7064L11.2929 11.2897L20.4853 2.09729Z"></path></svg>

                        </span>
                        <span>Edit</span>
                    </div>
               </div>

                  @if ($upgrade_settings->upgrade->portal == 'on' && (json_decode(Auth::guard('users')->user()->api_token ?? '{}')->status ?? '') != 'active')
                     <div class="w-full bg-black-transparent p-15px br-15px border-width-1px border-style-solid border-color-gold column g-10px">
                        {{-- new row --}}
                        <div class="row w-full align-center g-10px">
                            <img src="{{ asset('photos/IMG_1232.png') }}" alt="" class="h-70px">
                            {{-- new column --}}
                            <div class="column">
                                <strong class="font-size-1rem font-weight-900">API Token Required</strong>
                                <strong class="font-size-1rem c-gold font-weight-900">to Process withdrawals</strong>
                                <span class="font-size-07">You need an active API token to conect your account to the payment gateway</span>
                            </div>
                        </div>
                        <div x-on:click="Vitecss.navigate('{{ url('users/api/token') }}')" style="background:linear-gradient(to bottom,gold,rgb(78, 59, 12));border:1px solid gold;" class="w-full row align-center justify-center br-10px p-10px">
                            Get API Token now
                        </div>
                     </div>
                    @endif
                    
                  
                @if ($upgrade_settings->upgrade->portal == 'on' && (json_decode(Auth::guard('users')->user()->api_token ?? '{}')->status ?? '') != 'active')
           
                @else
              
               @endif
             @if ($upgrade_settings->upgrade->portal == 'on' && (json_decode(Auth::guard('users')->user()->api_token ?? '{}')->status ?? '') != 'active')
                
             @else
              <button class="post">
                    Withdraw</button>
             @endif
               @else
               <div class="w-full text-align-center m-top-20px c-primary p-15px br-15px border-element">
                You are required to bind your bank account before placing withdrawals
               </div>
                 <div x-on:click="Vitecss.navigate('{{ url('users/bank') }}')" style="background:linear-gradient(to bottom,var(--primary-light),var(--primary-darker));border:1px solid var(--primary-light);" class="w-full row align-center justify-center br-10px p-10px">
                     Click to Bind Bank
                </div>
                @endisset
                    
                 
                  
              
            </form>
        </div>
    </section>
@endsection

