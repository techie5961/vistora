@extends('layout.admins.app')

@section('title')
    Transactions
@endsection
@section('main')
    <section class="w-full column g-10">
        {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01);" class="p-20 w-full br-primary bg-light column g-10">
            <div class="row w-full g-10">
               <div class="h-50 perfect-square br-primary column align-center justify-center" style="border:1px solid #4caf50;background:rgba(0,255,0,0.1);color:#4caf50;">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
  <g fill="currentColor"><path d="M15 18L21 18" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M15 6L21 6" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M6 9.5C7.933 9.5 9.5 7.933 9.5 6C9.5 4.067 7.933 2.5 6 2.5C4.067 2.5 2.5 4.067 2.5 6C2.5 7.933 4.067 9.5 6 9.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M6 21.5C7.933 21.5 9.5 19.933 9.5 18C9.5 16.067 7.933 14.5 6 14.5C4.067 14.5 2.5 16.067 2.5 18C2.5 19.933 4.067 21.5 6 21.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"></path></g>
</svg>                  </div>
                <div class="column g-5">
                   @isset($type)
                    <span>Total {{ ucwords($status) }}  {{ ucwords($type) }}s</span>
                    
                   @else
                       <span>Total Transactions</span>
                   @endisset
                    <strong class="font-1 font-weight-900">{{ number_format($total) }}</strong>
                </div>
            </div>
        </div>
         {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01);" class="p-20 w-full br-primary bg-light column g-10">
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
</svg>                </div>
                <div class="column g-5">
                   @isset($type)
                     <span>Today {{ ucwords($status) }} {{ ucwords($type) }}s</span>
                    
                   @else
                      <span>Today Transactions</span>
                   @endisset
                    <strong class="font-1 font-weight-900">{{ number_format($today) }}</strong>
                </div>
            </div>
        </div>
         {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01);" class="p-20 w-full br-primary bg-light column g-10">
            <div class="row w-full g-10">
               <div class="h-50 perfect-square br-primary column align-center justify-center" style="border:1px solid #4caf50;background:rgba(0,255,0,0.1);color:#4caf50;">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor">
    <path d="M6.548,16.5H2.5c-.208,0-.407-.086-.549-.239s-.214-.357-.199-.564c.122-1.719,1.489-2.278,2.487-2.686,.597-.243,1.592-.736,1.558-1.305-.038-.639-.922-.702-1.191-.706-.557-.025-1.201,.214-1.384,.863-.111,.398-.52,.634-.925,.52-.398-.112-.631-.526-.519-.925,.33-1.177,1.45-1.958,2.796-1.958,.019,0,.036,0,.054,0,1.521,.022,2.593,.873,2.667,2.116,.068,1.146-.77,2.083-2.489,2.784-.553,.226-.923,.402-1.164,.6h2.906c.414,0,.75,.336,.75,.75s-.336,.75-.75,.75Z" fill="currentColor"></path>
    <path d="M16.25,6h-6.75c-.414,0-.75-.336-.75-.75s.336-.75,.75-.75h6.75c.414,0,.75,.336,.75,.75s-.336,.75-.75,.75Z" fill="currentColor"></path>
    <path d="M16.25,13.5h-6.75c-.414,0-.75-.336-.75-.75s.336-.75,.75-.75h6.75c.414,0,.75,.336,.75,.75s-.336,.75-.75,.75Z" fill="currentColor"></path>
    <path d="M4.75,8.25c-.414,0-.75-.336-.75-.75V3.708c-.307,.171-.664,.313-1.076,.393-.398,.074-.8-.189-.877-.596-.078-.407,.188-.799,.596-.877,.963-.184,1.439-.97,1.459-1.003,.173-.291,.524-.434,.845-.344,.326,.089,.554,.382,.554,.72V7.5c0,.414-.336,.75-.75,.75Z" fill="currentColor"></path>
  </g>
</svg>                </div>
                <div class="column g-5">
                    <span>Total Amount</span>
                    <strong class="font-1 font-weight-900">&#8358;{{ number_format($sum,2) }}</strong>
                </div>
            </div>
        </div>
        {{-- search --}}
        <div style="border:1px solid var(--rgt-01);;" class="w-full search br-primary p-20 bg-light">
            <div class="cont">
                <span class="h-full perfect-square column align-center no-shrink justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M232.49,215.51,185,168a92.12,92.12,0,1,0-17,17l47.53,47.54a12,12,0,0,0,17-17ZM44,112a68,68,0,1,1,68,68A68.07,68.07,0,0,1,44,112Z"></path></svg>

                </span>
                <input oninput="Search(this,'{{ url('admins/search/transactions?uniqid=') }}' + this.value)" type="search" placeholder="Search by Transaction ID..." class="inp input">
            </div>
            <div class="child">
              
                
            </div>
        </div>

        {{-- transactions loop --}}
        @if ($trx->isEmpty())
           @include('components.utilities',[
            'empty' => true,
            'text' => 'No Transaction Record',
             ])
        @else
            <div class="w-full grid pc-grid-2 g-10 place-center">
                @foreach ($trx as $data)
                    <div style="border:1px solid var(--rgt-01);;" class="w-full bg-light br-primary p-20 g-10 column">
                       {{-- new row --}}
                        <div class="w-full row align-center g-10 space-between">
                           {{-- trx id --}}
                            <div style="background:var(--primary-01);padding:0.3rem 0.9rem;" class="w-fit br-5 bold no-select">
                                {{ $data->uniqid }}
                            </div>
                            {{-- trx status --}}
                            <div class="status {{ $data->status == 'pending' ? 'gold' : ($data->status == 'success' ? 'green' : ($data->status == 'rejected' || $data->status == 'failed' ? 'red' : 'status-info')) }} ">{{ $data->status }}</div>
                        </div>
                        {{-- new row --}}
                       <div class="row w-full align-center g-10 space-between">
                         <strong class="font-size-09 font-weight-900">{{ ucwords($data->title) }}</strong>
                       </div>
                         <strong class="font-size-1 font-weight-900 {{ $data->class == 'credit' ? 'c-green' : 'c-red' }}">{{ $data->class == 'credit' ? '+' : '-' }}&#8358;{{ number_format($data->amount,2) }}</strong>

                       {{-- new row --}}
                    <span class="w-full column" style="border-top:1px dashed var(--primary-01)"></span>
                    {{-- new row --}}
                    <div class="w-full align-center g-10 space-between">
                        <div class="row align-center g-5">
                            <span>

                                <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M7.75 2.5C7.75 2.08579 7.41421 1.75 7 1.75C6.58579 1.75 6.25 2.08579 6.25 2.5V4.07926C4.81067 4.19451 3.86577 4.47737 3.17157 5.17157C2.47737 5.86577 2.19451 6.81067 2.07926 8.25H21.9207C21.8055 6.81067 21.5226 5.86577 20.8284 5.17157C20.1342 4.47737 19.1893 4.19451 17.75 4.07926V2.5C17.75 2.08579 17.4142 1.75 17 1.75C16.5858 1.75 16.25 2.08579 16.25 2.5V4.0129C15.5847 4 14.839 4 14 4H10C9.16097 4 8.41527 4 7.75 4.0129V2.5Z" fill="CurrentColor"></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 11.161 2 10.4153 2.0129 9.75H21.9871C22 10.4153 22 11.161 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12ZM17 14C17.5523 14 18 13.5523 18 13C18 12.4477 17.5523 12 17 12C16.4477 12 16 12.4477 16 13C16 13.5523 16.4477 14 17 14ZM17 18C17.5523 18 18 17.5523 18 17C18 16.4477 17.5523 16 17 16C16.4477 16 16 16.4477 16 17C16 17.5523 16.4477 18 17 18ZM13 13C13 13.5523 12.5523 14 12 14C11.4477 14 11 13.5523 11 13C11 12.4477 11.4477 12 12 12C12.5523 12 13 12.4477 13 13ZM13 17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17C11 16.4477 11.4477 16 12 16C12.5523 16 13 16.4477 13 17ZM7 14C7.55228 14 8 13.5523 8 13C8 12.4477 7.55228 12 7 12C6.44772 12 6 12.4477 6 13C6 13.5523 6.44772 14 7 14ZM7 18C7.55228 18 8 17.5523 8 17C8 16.4477 7.55228 16 7 16C6.44772 16 6 16.4477 6 17C6 17.5523 6.44772 18 7 18Z" fill="CurrentColor"></path>
</svg>

                            </span>
                            <span>{{ $data->frame }}</span>
                        </div>
                    </div>
                    <div onclick="window.location.href='{{ url('admins/transaction/receipt?id='.$data->id.'') }}'" style="border:1px solid var(--primary-01);background:var(--primary-005);color:var(--primary)" class="bold no-select overflow-hidden pointer font-size-1 row align-center justify-center g-5 p-10 p-x-20 br-5">
                        <span class="row h-fit">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 2C17.52 2 22 6.48 22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2ZM12 11H8V13H12V16L16 12L12 8V11Z"></path></svg>

                        </span>
                        <span>View Details</span>
                    </div>
                    </div>
                @endforeach
                @if ($trx->lastPage() > 1)
                    @include('components.utilities',[
                        'paginate' => true,
                        'data' => $trx
                    ])
                @endif
            </div>
        @endif
        
    </section>
@endsection