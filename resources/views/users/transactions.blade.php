@extends('layout.users.app')
@section('title')
    Transactions
@endsection
@section('css')
    <style class="css">
        
        .trx-icon{
            height:50px;
            width:50px;
            border-radius: 50%;
            background:var(--rgt-01);
            display: flex;
            align-items:center;
            justify-content: center;
            color:var(--primary-light);

        }
        .trx-icon svg{
            height:20px;
            width:20px;
        }
    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
      <div x-data="{ 
        Open : false
       }" class="pos-relative no-select br-10px border-element m-left-auto">
        <div x-on:click="Open = !Open" class="p-10px row align-center justify-center g-5px br-10px">
            <span>{{ ucwords(request('class','All')) }} Transactions</span>
            <i x-bind:style="Open ? {
                'transform' : 'rotate(-180deg)'
            } : {
                'transform' : 'rotate(0deg)'
            }" class="transition-all">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 16L6 10H18L12 16Z"></path></svg>

            </i>
        </div>
        <div x-on:click.outside="Open = false" style="top:calc(100% + 10px)" x-show="Open" x-transition:enter.duration.500ms x-transition:leave.duration.500ms class="pos-absolute right-0 z-index-500 border-element br-15px backdrop-blur-50px">
            <div x-on:click="Vitecss.navigate('{{ url('users/transactions') }}')" class="w-full pointer p-x-15px p-10px row align-center g-10px">
                <span class="ws-nowrap">All Transactions</span>
            </div>
            <div x-on:click="Vitecss.navigate('{{ url('users/transactions?class=credit') }}')" class="w-full pointer p-x-15px p-10px row align-center g-10px">
                <span class="ws-nowrap">Credit Transactions</span>
            </div>
            <div x-on:click="Vitecss.navigate('{{ url('users/transactions?class=debit') }}')" class="w-full pointer p-x-15px p-10px row align-center g-10px">
                <span class="ws-nowrap">Debit Transactions</span>
            </div>
            
        </div>
      </div>
        @if ($trx->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No Transactions found'
            ])
        @else
              <strong class="desc font-weight-900">Transaction History</strong>
             <div class="grid w-full g-10 pc-grid-2">
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
              @if ($trx->lastPage() > 1)
                  @include('components.utilities',[
                    'paginate' => true,
                    'data' => $trx
                  ])
              @endif
        @endif
    </section>
@endsection