@extends('layout.users.app')
@section('title')
    Daily Tasks
@endsection

@section('main')
    <section class="w-full column g-10">
       
        @if ($tasks->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No Task Available'
            ])
        @else
         <div class="column">
            <strong class="desc font-weight-900">Daily Tasks</strong>
        <span class="opacity-07">Earn real cash for completing tasks daily</span>
        </div>
        <div class="grid pc-grid-2 g-10 place-center w-full">
            @foreach ($tasks as $data)
            <div class="w-full border-element space-between row g-10px p-15px br-15px">
              <img src="{{ asset('tasks/categories/'.$data->category->icon.'') }}" alt="" class="h-40px circle no-shrink no-select no-pointer">
            {{-- new column --}}
            <div class="column m-right-auto">
                <strong class="font-size-1rem font-weight-800">{{ $data->title }}</strong>
                <span class="font-weight-900 font-size-06 opacity-09">{{ number_format($data->slots) }} Total slots</span>
                <span class="font-weight-900 font-size-06 c-green" style="color:rgb(0,255,0)">&bull; {{ number_format($data->slots - $data->completed) }} slots available</span>
            </div>
            {{-- new column --}}
            <div class="column g-5px align-end">
                <strong style="color:rgb(0,255,0)" class="font-size-1rem font-weight-900">&#8358;{{ number_format($data->earning,2) }}</strong>
           <button x-on:click="Vitecss.navigate('{{ url('users/task?id='.$data->id.'') }}')" style="background:linear-gradient(to bottom,var(--primary),var(--primary-darker));border:1px solid var(--primary-light);color:white;" class="p-5px font-weight-800 font-size-07rem no-select p-x-10px br-1000px">Perform Task</button>
            </div>
            </div>


           
        @endforeach
        </div>
            @if ($tasks->lastPage() > 1)
                @include('components.utilities',[
                    'paginate' => true,
                    'data' => $tasks
                ])
            @endif
        @endif
    </section>
@endsection