@extends('layout.admins.app')
@section('title')
    Bank Settings
@endsection
@section('main')
    <section class="w-full column g-10">
        {{-- settings form --}}
        <form onsubmit="PostRequest(event,this)" action="{{ url('admins/post/bank/settings/process') }}" class="w-full box-shadow bg-light br-15px column g-10px p-15px">
           {{-- title --}}
            <div class="row c-primary align-center g-10">
                <span class="h-fit row">
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 18 18">
  <g fill="currentColor">
    <path d="M4.75,17.5c-.414,0-.75-.336-.75-.75v-1.5c0-.414,.336-.75,.75-.75s.75,.336,.75,.75v1.5c0,.414-.336,.75-.75,.75Z" fill="currentColor"></path>
    <path d="M13.25,17.5c-.414,0-.75-.336-.75-.75v-1.5c0-.414,.336-.75,.75-.75s.75,.336,.75,.75v1.5c0,.414-.336,.75-.75,.75Z" fill="currentColor"></path>
    <path d="M13.25,2H4.75c-1.517,0-2.75,1.233-2.75,2.75v.25h-.25c-.414,0-.75,.336-.75,.75s.336,.75,.75,.75h.25v1.75h-.25c-.414,0-.75,.336-.75,.75s.336,.75,.75,.75h.25v1.75h-.25c-.414,0-.75,.336-.75,.75s.336,.75,.75,.75h.25v.25c0,1.517,1.233,2.75,2.75,2.75H13.25c1.517,0,2.75-1.233,2.75-2.75V4.75c0-1.517-1.233-2.75-2.75-2.75Zm-3.5,7.851v1.649c0,.414-.336,.75-.75,.75s-.75-.336-.75-.75v-1.649c-.732-.297-1.25-1.014-1.25-1.851,0-1.103,.897-2,2-2s2,.897,2,2c0,.837-.518,1.554-1.25,1.851Z" fill="currentColor"></path>
  </g>
</svg>                </span>
                <strong class="desc font-weight-900">Bank Settings</strong>
            </div>
            <div class="hr" vitecss-type="solid" style="border-color: var(--primary)"></div>
            {{-- csrf token --}}
            <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
            {{-- new input --}}
            <div class="w-full column g-5">
                <label class="column g-2">
                    <label>Account Number</label>
                <small class="opacity-07">Enter 10 digits account number</small>
                </label>
                <div class="cont">
                    <input value="{{ $bank->account_number ?? '' }}" name="account_number" type="number" placeholder="E.g 3002829943" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="w-full column g-5">
                <label class="column g-2">
                    <label>Bank Name</label>
                <small class="opacity-07">Enter name of bank attached to the account</small>
                </label>
                <div class="cont">
                    <input value="{{ $bank->bank_name ?? '' }}" name="bank_name" type="text" placeholder="E.g Kuda MFB" class="inp input required">
                </div>
            </div>
            {{-- new input --}}
            <div class="w-full column g-5">
                <label class="column g-2">
                    <label>Account Name</label>
                <small class="opacity-07">Enter the name on the account</small>
                </label>
                <div class="cont">
                    <input value="{{ $bank->account_name ?? '' }}" name="account_name" type="text" placeholder="E.g Dev Techie Innovations" class="inp input required">
                </div>
            </div>
            <div style="background:rgba(218, 165, 32,0.2);color:rgb(97, 71, 5)" class="w-full br-5 p-10 column g-5">
                {{-- <strong class="font-1">Note</strong> --}}
                <span>This is the bank in which all API token deposits on the platform would go into.Endeavour to double check the details before submitting to avoid loss of funds.You can always update the details anytime.</span>
            </div>
            <button class="post">Save</button>
        </form>
    </section>
@endsection