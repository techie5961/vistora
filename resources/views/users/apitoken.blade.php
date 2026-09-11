@extends('layout.users.app')
@section('title')
    API Token
@endsection
@section('main')
    <section class="w-full column g-10">
        {{-- new --}}
        <div class="column w-full g-10px p-20px br-15px border-element align-center justify-center m-x-auto max-w-500px text-align-center">
                                     <img src="{{ asset('photos/IMG_1232.png') }}" alt="" class="h-70px">

          @if ((json_decode(Auth::guard('users')->user()->api_token ?? '{}')->status ?? '') == '')
             <strong class="font-size-1rem font-weight-900">API Token Required</strong>
            <span class="opacity-07">You need an active API Token to connect your account to the payment gateway and enable withdrawals.</span>
          @else
           <strong class="font-size-1rem font-weight-900">API Token Status</strong>
           @if ((json_decode(Auth::guard('users')->user()->api_token ?? '{}')->status ?? '') == 'pending')
             <div style="background:linear-gradient(to bottom,gold,rgb(124, 94, 19));border:1px solid gold;color:white" class="w-fit br-10px p-10px font-weight-900 uppercase m-x-auto no-select p-x-20px">Processing</div>  
           @endif
            @if ((json_decode(Auth::guard('users')->user()->api_token ?? '{}')->status ?? '') == 'rejected')
             <div style="background:linear-gradient(to bottom,red,rgb(87, 18, 18));border:1px solid red;color:white" class="w-fit br-10px p-10px font-weight-900 uppercase m-x-auto no-select p-x-20px">Rejected</div>  
           @endif
             @if ((json_decode(Auth::guard('users')->user()->api_token ?? '{}')->status ?? '') == 'active')
           <span class="font-1">{{ (json_decode(Auth::guard('users')->user()->api_token ?? '{}')->token ?? '') }}</span>
             <div style="background:linear-gradient(to bottom,rgb(0,255,0),#1a3f1b);border:1px solid rgb(0,255,0);color:white" class="w-fit br-10px p-10px font-weight-900 uppercase m-x-auto no-select p-x-20px">Active</div>  
           @endif
          @endif
              </div>
        @if ((json_decode(Auth::guard('users')->user()->api_token ?? '{}')->status ?? '') != 'active')
              {{-- new --}}
        <div class="row border-element c-primary g-10 w-full p-15 br-10">
           <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 9.5C12.8284 9.5 13.5 8.82843 13.5 8C13.5 7.17157 12.8284 6.5 12 6.5C11.1716 6.5 10.5 7.17157 10.5 8C10.5 8.82843 11.1716 9.5 12 9.5ZM14 15H13V10.5H10V12.5H11V15H10V17H14V15Z"></path></svg>

            <span>You need an active API Token to process withdrawals.</span>
        </div>
        @endif
      
        {{-- new --}}
        <div class="column w-full g-10px br-15px p-15px border-element">
            {{-- new row --}}
            <div class="row w-fit g-5">
               
                <strong class="desc font-weight-900 c-primary">
                    What is API Token?
                </strong>
            </div>
            <span class="opacity-07">API Token is a 16-digits secure token used to: </span>
            {{-- new row --}}
            <div class="border-element row align-center g-10px p-15px br-15px">
                {{-- new --}}
                <div class="h-40px no-shrink c-primary w-40px column align-center justify-center circle bg-primary-01">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
  <g fill="currentColor"><path d="M8 9.25305V5C8 2.79086 9.79086 1 12 1C14.2091 1 16 2.79086 16 5" stroke="currentColor" stroke-width="2" fill="none"></path> <path d="M8 9.25305V5C8 2.79086 9.79086 1 12 1C14.2091 1 16 2.79086 16 5" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" fill="none"></path> <path d="M8 9.25305V5C8 2.79086 9.79086 1 12 1C14.2091 1 16 2.79086 16 5" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" fill="none"></path> <path d="M8 9.25305V5C8 2.79086 9.79086 1 12 1C14.2091 1 16 2.79086 16 5" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" fill="none"></path> <path d="M12 22C15.866 22 19 18.866 19 15C19 11.134 15.866 8 12 8C8.13401 8 5 11.134 5 15C5 18.866 8.13401 22 12 22Z" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M12 14V16" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M12 14V16" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M12 14V16" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M12 14V16" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path></g>
</svg>
                </div>
                {{-- new column --}}
                <div class="column">
                    <strong class="font-size-1rem font-weight-900">Unlock Withdrawals</strong>
                    <span class="opacity-07">Connect to payment gateway securely.</span>
                </div>
            </div>
            {{-- new row --}}
            <div class="border-element row align-center g-10px p-15px br-15px">
                  {{-- new --}}
                <div class="h-40px no-shrink c-primary w-40px column align-center justify-center circle bg-primary-01">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor">
    <path d="M14.7505 7.25H9.49905L9.81065 1.9868C9.82325 1.7732 9.55085 1.6734 9.42255 1.8446L3.04965 10.3501C2.92615 10.5149 3.04376 10.75 3.24976 10.75H8.50115L8.18955 16.0132C8.17695 16.2268 8.44935 16.3266 8.57765 16.1554L14.9506 7.6499C15.0741 7.4851 14.9565 7.25 14.7505 7.25Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path>
  </g>
</svg>
                </div>
                {{-- new column --}}
                <div class="column">
                    <strong class="font-size-1rem font-weight-900">Instant Processing</strong>
                    <span class="opacity-07">Token allows automated payouts.</span>
                </div>
            </div>
             {{-- new row --}}
            <div class="border-element row align-center g-10px p-15px br-15px">
                {{-- new --}}
                  <div class="h-40px no-shrink c-primary w-40px column align-center justify-center circle bg-primary-01">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
  <g fill="currentColor"><path d="M20.3777 12.9014L21 4.5L20.4499 4.445C17.508 4.1508 14.6445 3.32223 12 2C9.35553 3.32223 6.49199 4.1508 3.55006 4.44499L3 4.5L3.62236 12.9014C3.85658 16.0632 5.73712 18.8685 8.57285 20.2864L12.0001 22L15.4272 20.2864C18.263 18.8685 20.1435 16.0632 20.3777 12.9014Z" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M9 12L11 14L16 9" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M9 12L11 14L16 9" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M9 12L11 14L16 9" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M9 12L11 14L16 9" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path></g>
</svg>
                </div>
                {{-- new column --}}
                <div class="column">
                    <strong class="font-size-1rem font-weight-900">Secure Transaction</strong>
                    <span class="opacity-07">Verified token for safe transfers.</span>
                </div>
            </div>
        </div>
        
        @if ((json_decode(Auth::guard('users')->user()->api_token ?? '{}')->status ?? 'rejected') != 'pending' && (json_decode(Auth::guard('users')->user()->api_token ?? '{}')->status ?? '') != 'active' )
             {{-- new --}}
        <div class="column g-10px p-15px border-element br-15px">
             {{-- new row --}}
            <div class="row w-fit g-5">
                
                <strong class="desc m-bottom-20px font-weight-900 c-primary">
                    Account Details
                </strong>
            </div>
            <div class="w-full row align-center space-between g-10px p-15px br-15px b-10px border-element">
            <span class="opacity-08">Account Number:</span>
           <div x-data="{ 
            Copied : false
            }" class="row align-center g-5px">
             <span class="font-weight-800 font-size-1rem">{{ $bank->account_number }}</span>
             <svg x-on:click="
             copy('{{ $bank->account_number }}');
             Copied = true;
             setTimeout(() => {
                Copied = false;
             }, 2000);
             " x-show="!Copied" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20">
  <g fill="currentColor">
    <path d="m13,7h2c1.105,0,2,.895,2,2v6c0,1.105-.895,2-2,2h-6c-1.105,0-2-.895-2-2v-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
    <rect x="3" y="3" width="10" height="10" rx="2" ry="2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
  </g>
</svg>
<svg x-show="Copied" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
  <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt">
    <circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></circle>
    <polyline points="7 13 10 16 17 8" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></polyline>
  </g>
</svg>

           </div>
            </div>
            <div class="w-full row align-center space-between g-10px p-15px br-15px b-10px border-element">
            <span class="opacity-08">Bank:</span>
            <span class=" font-weight-800 font-size-1rem">{{ $bank->bank_name }}</span>
            </div>
             <div class="w-full row align-center space-between g-10px p-15px br-15px b-10px border-element">
            <span class="opacity-08">Account Name:</span>
            <span class="font-weight-800 font-size-1rem">{{ $bank->account_name }}</span>
            </div>
           
            
            
        </div>

        {{-- new --}}
        <div class="column bg-rgt-01 br-15px p-15px column g-5px">
          {{-- new row --}}
          <div class="row align-center g-5">
           
            <strong class="font-size-1rem m-bottom-10px font-weight-900">Payment Instructions</strong>
          </div>
          {{-- new --}}
             <div>1. Pay exactly <strong style="color:rgb(0,255,0)" class="font-weight-900"> {{ $currency.number_format($settings->upgrade->fee,2) }}</strong> to the account details above to generate your token.</div>
          {{-- new --}}
             <div>2. Upload clear screenshot of the receipt.</div>
             {{-- new --}}
             <div>3. Submit & wait for few minutes, your API Token would be generated and withdrawals would be accessible.</div>
          {{-- new --}}
             <div>4. Uploading invalid proof might lead to account suspension.</div>
        </div> 
        
     
            
         {{-- form --}}
         <form action="{{ url('users/post/recharge/process') }}" x-on:submit="PostRequest($event,$el,function(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                Redirect('{{ url()->current() }}')
            }
        })" class="">
         {{-- new row --}}
            <div class="row m-top-10px w-full g-10px">
               
                <strong class="font-weight-900 font-size-1rem">
                Upload Screenshot
                </strong>
            </div>
           {{-- csrf token --}}
           <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
       {{-- amount --}}
       <input type="hidden" class="inp c-black input" name="amount" value="{{ $settings->upgrade->fee }}">
        
       {{-- new input --}}
           
            <label style="display:flex;flex-direction:column;gap:10px;padding:15px;text-align-center;align-items:center;justify-content:center;gap:0;" class="cont m-top-10px h-150px">
                <span>TAP TO UPLOAD</span>
                <span class="opacity-07">JPG, PNG, WEBP ( Max: 10MB )</span>
                 <input x-on:change="PreviewPhoto($el,$el.closest('label'))" type="file" accept="image/*" name="receipt" class="inp display-none required input">
                </label>
           
        
     
     
        <button class="post">I Have made the payment</button>
        </form>
        @endif
       
      
    </section>
@endsection