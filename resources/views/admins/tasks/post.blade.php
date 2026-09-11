@extends('layout.admins.app')
@section('title')
    Post Task
@endsection
@section('main')
    <section class="w-full column g-10">
         <form x-data="{ 
            TaskTitle : '',
            TaskEarning : '',
            Earning : '',
            Title : ''
          }" action="{{ url('admins/post/task/process') }}" method="POST" x-on:submit="PostRequest($event,$el,function(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    
                    window.location.href=data.link;
                }
            })" class="w-full box-shadow bg-light br-10 p-15px br-15px column g-10px">
            <strong class="desc font-weight-900 c-primary">Post Task</strong>
            <div class="hr" style="border-color:var(--primary)" vitecss-type="solid"></div>
            {{-- csrf token --}}
            <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
            {{-- new input --}}
            <div class="column g-5 w-full">
              <div class="column w-full">
                <label>Task Category</label>
                <small class="opacity-07"><span class="font-weight-900">Note:</span> The category this task fall under</small>
              </div>
                <div class="cont">
                <select x-on:change="
                TaskTitle = $el.selectedOptions[0].dataset.title;
                TaskEarning = $el.selectedOptions[0].dataset.earning;
                Title = $el.selectedOptions[0].dataset.title;
                Earning = $el.selectedOptions[0].dataset.earning;
                " name="category" class="inp input required">
                    <option value="" selected disabled>Click to choose...</option>
                    @foreach ($categories as $data)
                       
                            <option data-earning="{{ $data->earning }}" data-title="{{ $data->name }}" value="{{ $data->id }}">{{ $data->name }}</option>
                      
                    @endforeach
                </select>
            </div>
            </div>
              {{-- new input --}}
            <div x-bind:class="TaskTitle == '' ? 'display-none' : ''" class="column g-5 w-full">
              <div class="column w-full">
                  <label>Task Title</label>
                <small class="opacity-07">Display Title of the task</small>
              </div>
                 <div class="cont">
               <input x-model="Title" name="title" type="text" placeholder="Enter task title" class="inp input required">
                 </div>
                  <label class="row align-center">
                    <input x-on:change="if($el.checked){
                        Title = TaskTitle
                        }" x-bind:checked="Title == TaskTitle ? true : false " style="transform:scale(0.7)" type="checkbox">
                    <span>Use category title</span>
                 </label>
                 </div>
                  {{-- new input --}}
            <div x-bind:class="TaskEarning == '' ? 'display-none' : ''" class="column g-5 w-full">
              <div class="column w-full">
                  <label>Task Earning</label>
                <small class="opacity-07">Amount each user earns after performing the task</small>
              </div>
                 <div class="cont">
                    <span class="row h-full w-fit p-left-10px no-shrink align-end justify-center no-select font-size-1rem">&#8358;</span>
               <input x-model="Earning" name="earning" type="number" inputmode="numeric" placeholder="Enter task earning" class="inp input required">
                 </div>
                 <label class="row align-center">
                    <input x-on:change="if($el.checked){
                         Earning = TaskEarning 
                    }" x-bind:checked="Earning == TaskEarning ? true : false " style="transform:scale(0.7)" type="checkbox">
                    <span>Use category earning</span>
                 </label>
                 </div>
             {{-- new input --}}
            <div class="column g-5 w-full">
              <div class="column w-full">
                <label>Task Link</label>
                <small class="opacity-07">Enter the link to the task</small>
              </div>
                <div class="cont">
               <input name="link" type="url" placeholder="Enter task link" class="inp input required">
                 </div>
                 </div>
                  {{-- new input --}}
            <div class="column g-5 w-full">
              <div class="column w-full">
                <label>Slots</label>
                <small class="opacity-07">The task is automatically removed from users dashboard if the slots limit is reached( <span class="font-weight-900">For Example, For a 100 slots task,the task is automatically removed when 100 users have performed  the task</span> ),you don't need to manually delete it</small>
              </div>
                <div class="cont">
               <input name="slots" type="number" inputmode="numeric" placeholder="I.e 100 slots" class="inp input required">
                 </div>
                 </div>
                   {{-- new input --}}
            <div class="column display-none g-5 w-full">
              <div class="column w-full">
                <label>Banner(Optional)</label>
              </div>
                <label style="padding:15px;" class="cont no-select column align-center justify-center h-150">
                    <span class="opacity-05">Upload banner( Tap to Upload )</span>
                    <img alt="" class="h-full max-w-full">
               <input x-on:change="PreviewPhoto($el,$el.closest('label'))" name="banner" type="file" accept="image/*" class="inp display-none input">
                 </label>
                 </div>
                   {{-- new input --}}
            <div class="column display-none g-5 w-full">
              <div class="column w-full">
                <label>Caption(Optional)</label>
              </div>
                <div class="cont">
              <textarea name="caption" placeholder="Enter caption..." class="inp no-resize input"></textarea>
                 </div>
                 </div>
                

                 {{-- submit btn --}}
                 <button class="post">Post Task Now</button>
           
        </form>
    </section>
@endsection
