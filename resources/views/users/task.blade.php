@extends('layout.users.app')
@section('title')
  Perform Task
@endsection
@section('main')
    <section class="w-full column g-10">
        <strong class="title m-right-auto pc-m-x-auto">Perform Task</strong>
        <div class="w-full row g-10px br-15px border-element p-15px">
              <img src="{{ asset('tasks/categories/'.json_decode($task->category)->icon.'') }}" alt="" class="h-50px circle no-shrink no-select no-pointer">
            {{-- new column --}}
             <div class="column m-right-auto">
                <strong class="font-size-1rem font-weight-800">{{ $task->title }}</strong>
                <span class="font-weight-900 font-size-06 opacity-09">{{ number_format($task->slots) }} Total slots</span>
                <span class="font-weight-900 font-size-06 c-green" style="color:rgb(0,255,0)">&bull; {{ number_format($task->slots - $task->completed) }} slots available</span>
            </div>
                <strong style="color:rgb(0,255,0)" class="font-size-1rem m-y-auto font-weight-900">+&#8358;{{ number_format($task->earning,2) }}</strong>

            </div>
        {{-- banner --}}
        @isset($task->banner)
            <img onclick="Populate(this)" src="{{ asset('tasks/banners/'.$task->banner.'') }}" alt="" class="w-full max-h-200 m-x-auto max-w-500">

            @endisset
            {{-- caption --}}
            @isset($task->caption)
                <div class="column g-10 w-full">
                    <strong class="font-1 u">Task Caption</strong>
                    <div>{!! nl2br($task->caption) !!}</div>
                </div>
            @endisset
            {{-- instructions --}}
            <div class="column g-10px w-full">
                <strong class="font-size-1rem font-weight-900">Instructions</strong>
                <div class="bg-rgt-01 column g-5px br-10px p-15px br-15px">
                    {{-- new --}}
                    <div>1. Click the link below to perform the task</div>
                      {{-- new --}}
                    <div>2. Ensure you perform the task accordingly</div>
                     {{-- new --}}
                    <div>3. Take a screenshot showing you performed the task</div>
                     {{-- new --}}
                    <div>4. Submit the screenshot below and wait for confirmation.</div>
                </div>
            </div>
           {{-- link --}}
           <div class="w-full column g-10px">
            <div class="w-full no-select row align-center g-10px br-10px border-element p-10px">
                <i class="c-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
  <g fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.03166 6.54197C9.22575 6.9079 9.08644 7.36188 8.72052 7.55597C8.47184 7.68787 8.24717 7.85851 8.04832 8.05733C6.96021 9.14544 6.96021 10.9086 8.04832 11.9967L10.2233 14.1717C11.3114 15.2598 13.0746 15.2598 14.1627 14.1717C15.2507 13.0836 15.2608 11.3104 14.1727 10.2223L13.4103 9.45993C13.1174 9.16703 13.1174 8.69216 13.4103 8.39927C13.7032 8.10638 14.178 8.10638 14.4709 8.39927L15.2333 9.16167C16.9072 10.8356 16.9072 13.5484 15.2333 15.2223C13.5594 16.8962 10.8365 16.9062 9.16266 15.2323L6.98766 13.0573C5.31377 11.3834 5.31377 8.67056 6.98766 6.99667C7.29576 6.68747 7.64975 6.42597 8.01766 6.23083C8.38359 6.03674 8.83757 6.17604 9.03166 6.54197Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M2.77868 2.76766C4.45257 1.09376 7.16544 1.09376 8.83934 2.76766L11.0143 4.94266C12.6882 6.61655 12.6882 9.32942 11.0143 11.0033C10.7101 11.3075 10.3647 11.5674 9.98433 11.7692C9.6184 11.9633 9.16442 11.824 8.97033 11.458C8.77624 11.0921 8.91554 10.6381 9.28147 10.444C9.53006 10.3122 9.7549 10.1414 9.95368 9.94267C11.0418 8.85455 11.0418 7.09142 9.95368 6.00332L7.77868 3.82832C6.69057 2.74021 4.92744 2.74021 3.83934 3.82832C2.76193 4.90573 2.74775 6.69607 3.82934 7.77766L4.59174 8.54006C4.88463 8.83295 4.88463 9.30782 4.59174 9.60072C4.29884 9.89361 3.82397 9.89361 3.53108 9.60072L2.76868 8.83832C1.10903 7.17867 1.1232 4.42314 2.77868 2.76766Z" fill="currentColor"></path></g>
</svg>
                </i>
                <span class="ws-nowrap text-overflow-ellipsis">{{ $task->link }}</span>
            </div>
           </div>
           <div x-on:click="window.open('{{ $task->link }}')" style="border:1px solid var(--primary);background:linear-gradient(to bottom,var(--primary),var(--primary-darker))" class="w-full br-10px row p-10px align-center g-10px justify-center no-select pointer">
           <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
  <g fill="currentColor"><path d="M4.25 6C4.664 6 5 5.66 5 5.25C5 4.84 4.664 4.5 4.25 4.5C3.836 4.5 3.5 4.84 3.5 5.25C3.5 5.66 3.836 6 4.25 6Z" fill="currentColor" data-stroke="none" stroke="none"></path> <path d="M6.75 6C7.164 6 7.5 5.66 7.5 5.25C7.5 4.84 7.164 4.5 6.75 4.5C6.336 4.5 6 4.84 6 5.25C6 5.66 6.336 6 6.75 6Z" fill="currentColor" data-stroke="none" stroke="none"></path> <path d="M1.75 7.75H16.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M16.25 9.44788V4.75C16.25 3.65 15.355 2.75 14.25 2.75H3.75C2.645 2.75 1.75 3.65 1.75 4.75V13.25C1.75 14.35 2.645 15.25 3.75 15.25H9.0779" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M11.126 10.7701L17.066 12.94C17.316 13.0301 17.309 13.39 17.055 13.4699L14.336 14.3399L13.466 17.0601C13.385 17.3101 13.028 17.32 12.937 17.07L10.767 11.13C10.685 10.9 10.902 10.69 11.126 10.7701Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path></g>
</svg>
            Open Link
           </div>
            {{-- screenshot --}}
            <form x-data="{  }" enctype="multipart/form-data" action="{{ url('users/post/task/complete/process') }}" method="POST" x-on:submit="PostRequest($event,$el,function(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                Redirect('{{ url('users/tasks') }}')
            }
        })" class="column p-top-10 g-10 w-full">
                {{-- csrf token --}}
                <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
                {{-- task id --}}
                <input type="hidden" class="inp input" name="id" value="{{ $task->id }}">
                <strong class="font-weight-900 font-size-1rem">Upload screenshot</strong>
                {{-- new input --}}
                <label style="padding:15px;border:1px solid var(--primary-02);display:flex;flex-direction:column;gap:5px;display:flex;flex-direction:column;gap:10px;align-items:center;justify-content:center;" class="m-x-auto bg-light cont max-w-500 h-150 br-15px p-20" style="border:1px solid var(--rgt-01)">
                    <span class="opacity-07">Tap to upload screenshot</span>
                    <span class="opacity-07">JPG, PNG, WEBP ( MAX:10MB )</span>
                    <input name="screenshot" x-on:change="PreviewPhoto($el,$el.closest('label'))" class="display-none required inp input" type="file" accept="image/*">
                </label>
                   
            <button class="post">
             Submit Screenshot
            </button>
            </form>
           

    </section>

    @isset($task->banner)
        <section class="populate">
            <div class="child">
                <div class="row w-full align-center g-10 space-between">
                    <strong class="font-1"></strong>
                  <div onclick="this.closest('.populate').classList.remove('active')" class="w-fit br-1000 p-5 p-x-10 no-select pointer" style="background:var(--rgb-07);color:var(--rgt-10)">Close</div>
                </div>
                <img src="{{ asset('tasks/banners/'.$task->banner.'') }}" alt="" class="w-full max-w-500">
            </div>

        </section>
    @endisset
@endsection
