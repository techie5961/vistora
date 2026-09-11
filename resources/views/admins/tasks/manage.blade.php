@extends('layout.admins.app')
@section('title')
    Manage Tasks
@endsection

@section('main')
    <section x-data="{ 
        Modal : false,
        DeleteID : ''
     }" x-init="
     if(Modal){
        document.body.classList.add('overflow-hidden');
     }else{
        document.body.classList.remove('overflow-hidden');
     }
     " class="column w-full g-10">
     <span x-text="Caption"></span>
          {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="analytic br-primary bg-light w-full p-20 row g-10">
            <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
  <g fill="currentColor">
    <rect x="17" y="4" width="13" height="2" fill="currentColor" stroke-width="0"></rect>
    <rect x="17" y="10" width="13" height="2" fill="currentColor" stroke-width="0"></rect>
    <rect x="17" y="20" width="13" height="2" fill="currentColor" stroke-width="0"></rect>
    <rect x="17" y="26" width="13" height="2" fill="currentColor" stroke-width="0"></rect>
    <rect x="2" y="2" width="12" height="12" rx="2.5" ry="2.5" stroke-width="0" fill="currentColor"></rect>
    <rect x="2" y="18" width="12" height="12" rx="2.5" ry="2.5" stroke-width="0" fill="currentColor"></rect>
  </g>
</svg>
            </div>
            <div class="column g-5">
                <span>Total Tasks</span>
                <strong class="desc font-weight-900">{{ number_format($total) }}</strong>
            </div>
        </div>
         {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="analytic br-primary bg-light w-full p-20 row g-10">
            <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
  <g fill="currentColor">
    <rect x="10" y="5" width="13" height="2" stroke-width="0" fill="currentColor"></rect>
    <rect x="10" y="10" width="13" height="2" stroke-width="0" fill="currentColor"></rect>
    <circle cx="4.5" cy="5.5" r="3.5" fill="currentColor" stroke-width="0"></circle>
    <circle cx="4.5" cy="15.5" r="3.5" fill="currentColor" stroke-width="0"></circle>
    <rect x="10" y="15" width="13" height="2" stroke-width="0" fill="currentColor"></rect>
    <rect x="10" y="20" width="13" height="2" stroke-width="0" fill="currentColor"></rect>
  </g>
</svg>
            </div>
            <div class="column g-5">
                <span>Active Tasks</span>
                <strong class="desc font-weight-900">{{ number_format($total_active) }}</strong>
            </div>
        </div>
         {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="analytic br-primary bg-light w-full p-20 row g-10">
            <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
  <g fill="currentColor">
    <polyline points="3 6 4.5 7.5 8 3.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline>
    <rect x="3" y="12" width="4" height="4" rx="1" ry="1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill="currentColor"></rect>
    <line x1="11" y1="6" x2="17" y2="6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
    <line x1="11" y1="14" x2="17" y2="14" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
  </g>
</svg>
            </div>
            <div class="column g-5">
                <span>Completed Tasks</span>
                <strong class="desc font-weight-900">{{ number_format($total_completed) }}</strong>
            </div>
        </div>
        @if ($tasks->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No Task available'
            ])
        @else
            <div class="grid pc-grid-2 w-full place-center g-10">
                @foreach ($tasks as $data)
                    <div x-data="{ 
                        Caption : false
                     }" style="border:1px solid var(--rgt-01)" class="column w-full g-10 br-primary p-20 bg-light">
                             {{--new row  --}}
                             <div class="row flex-wrap w-full align-center space-between">
                            <div class="row align-center g-5px">
                                <img src="{{ asset('tasks/categories/'.$data->category->icon.'') }}" alt="" class="h-40px no-select no-shrink">
                                  
                                <div style="background:var(--primary-01)" class="w-fit row align-center g-5 no-select br-5 p-5 p-x-10">
                                {{ $data->uniqid }}
                                <svg onclick="copy('{{ $data->uniqid }}')" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>

                            </div>
                            </div>

                            <div class="status {{ $data->status == 'active' ? 'green' : ($data->status == 'completed' ? 'primary' : 'red') }}">{{ $data->status }}</div>
                             </div>
                             {{-- new row --}}
                             <div style="border-bottom:1px dashed var(--rgt-01)" class="column p-bottom-10">
                                <strong class="font-weight-900 font-1">{{ $data->title }}</strong>
                           {{-- poster --}}
                                <div class="column m-top-10 g-2">
                            
                          
                        </div>
                            </div>
                             
                             {{-- new row --}}
                             <div class="row w-full g-10 space-between">
                                {{-- new item --}}
                                <div class="column g-5 text-start">
                                    <small>Posted</small>
                                    <strong class="font-weight-900">{{ $data->frame }}</strong>
                                </div>
                                {{-- new item --}}
                                 <div class="column g-5 text-end">
                                    <small>Earning per user</small>
                                    <strong class="font-weight-900">{{ $currency }}{{ number_format($data->earning,2) }}</strong>
                                </div>
                             </div>
                              {{-- new row --}}
                             <div class="row w-full g-10 space-between">
                                {{-- new item --}}
                                <div class="column g-5 text-start">
                                    <small>Total Slots</small>
                                    <strong class="font-weight-900">{{ number_format($data->slots) }} Users</strong>
                                </div>
                                {{-- new item --}}
                                 <div class="column g-5 text-end">
                                    <small>Completed Slots</small>
                                    <strong class="font-weight-900">{{ number_format($data->completed) }}</strong>
                                </div>
                             </div>
                              {{-- new row --}}
                             <div style="border-bottom:1px dashed var(--rgt-01);padding-bottom:10px;" class="row w-full g-10 space-between">
                                {{-- new item --}}
                                <div class="column g-5 text-start">
                                    <small>Task Banner</small>
                                 @isset($data->banner)
                                        <a href="{{ asset('tasks/banners/'.$data->banner.'') }}" target="_blank" class="c-primary font-weight-900 no-select row align-center g-5">
                                        Click to View
                                       <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M10 6V8H5V19H16V14H18V20C18 20.5523 17.5523 21 17 21H4C3.44772 21 3 20.5523 3 20V7C3 6.44772 3.44772 6 4 6H10ZM21 3V12L17.206 8.207L11.2071 14.2071L9.79289 12.7929L15.792 6.793L12 3H21Z"></path></svg>

                                    </a>
                                    @else
                                       <a class="c-primary no-select row align-center g-5">No Banner Attached
                                    </a>
                                 @endisset
                                </div>
                                {{-- new item --}}
                                 <div class="column g-5 text-end">
                                    <small class="no-select">Task Caption</small>
                                    <div x-on:click="
                                    Caption = true;
                                    " >
                                        <strong class="no-select font-weight-900">View caption</strong>
                                    </div>
                                      

                                </div>
                             </div>
                             <div x-transition:enter.duration.500ms x-transition:leave.duration.500ms x-on:click.outside="Caption = false;" x-show="Caption" class="w-full">
                                {!! nl2br($data->caption ?? 'No caption attached') !!}
                             </div>
                             {{-- new row --}}
                             <div class="row align-center w-full space-between">
                                <button onclick="window.open('{{ $data->link }}')" class="btn-blue-3d">
                                    Visit Task Link
                                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10 6V8H5V19H16V14H18V20C18 20.5523 17.5523 21 17 21H4C3.44772 21 3 20.5523 3 20V7C3 6.44772 3.44772 6 4 6H10ZM21 3V12L17.206 8.207L11.2071 14.2071L9.79289 12.7929L15.792 6.793L12 3H21Z"></path></svg>

                                </button>
                                  <button onclick="window.location.href='{{ url('admins/task/proofs?task_id='.$data->id.'') }}'" class="btn-primary-3d">
                                   View Proofs
                                  <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 10C14.2091 10 16 8.20914 16 6 16 3.79086 14.2091 2 12 2 9.79086 2 8 3.79086 8 6 8 8.20914 9.79086 10 12 10ZM5.5 13C6.88071 13 8 11.8807 8 10.5 8 9.11929 6.88071 8 5.5 8 4.11929 8 3 9.11929 3 10.5 3 11.8807 4.11929 13 5.5 13ZM21 10.5C21 11.8807 19.8807 13 18.5 13 17.1193 13 16 11.8807 16 10.5 16 9.11929 17.1193 8 18.5 8 19.8807 8 21 9.11929 21 10.5ZM12 11C14.7614 11 17 13.2386 17 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5 15.9999C5 15.307 5.10067 14.6376 5.28818 14.0056L5.11864 14.0204C3.36503 14.2104 2 15.6958 2 17.4999V21.9999H5V15.9999ZM22 21.9999V17.4999C22 15.6378 20.5459 14.1153 18.7118 14.0056 18.8993 14.6376 19 15.307 19 15.9999V21.9999H22Z"></path></svg>
                                </button>
                             </div>
                              {{-- new row --}}
                             <div class="row align-center w-full space-between">
                                <button onclick="window.location.href='{{ url('admins/task/edit?id='.$data->id.'') }}'" class="btn-green-3d">
                               <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.7574 2.99678L9.29145 10.4627L9.29886 14.7099L13.537 14.7024L21 7.23943V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99678C3 3.4445 3.44772 2.99678 4 2.99678H16.7574ZM20.4853 2.09729L21.8995 3.5115L12.7071 12.7039L11.2954 12.7064L11.2929 11.2897L20.4853 2.09729Z"></path></svg>
                               
                                    Edit
                                    
                                </button>
                                  <button x-on:click="
                                  DeleteID = {{ $data->id }}; 
                                  Modal = true;" class="btn-red-3d">
                                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8ZM7 5V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V5H22V7H2V5H7ZM9 4V5H15V4H9ZM9 12V18H11V12H9ZM13 12V18H15V12H13Z"></path></svg>

                                   Delete
                                     </button>
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
          
    <section x-show="Modal" x-transition:enter-start="fade-enter" x-transition:enter-end="fade-enter-end" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end" onclick="this.classList.remove('active')" class="pos-fixed transition-all p-20px column align-center justify-center inset-0 bg-black-transparent z-index-4000">
        <div x-on:click.outside="Modal = false;" onclick="event.stopPropagation()" class="column max-w-500 align-center justify-center br-15px p-15px bg">
            <div class="w-50 perfect-square circle column no-shrink align-center justify-center bg-red c-white">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M7 6V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7ZM13.4142 13.9997L15.182 12.232L13.7678 10.8178L12 12.5855L10.2322 10.8178L8.81802 12.232L10.5858 13.9997L8.81802 15.7675L10.2322 17.1817L12 15.4139L13.7678 17.1817L15.182 15.7675L13.4142 13.9997ZM9 4V6H15V4H9Z"></path></svg>

            </div>
            <strong class="desc font-weight-900">Delete this task</strong>
            <span class="text-center">Are you sure you want to delete this task? this action is irreversible</span>
            {{-- form --}}
            <form method="POST" action="{{ url('admins/post/task/delete/process') }}" onsubmit="PostRequest(event,this,Deleted,'Deleting...')" class="w-full column g-10">
              
              {{-- task id --}}
              <input x-bind:value="DeleteID" type="hidden" class="inp input" value="0" name="id">
              {{-- csrf token --}}
              <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
                <div class="w-full row align-center g-10px">
                <button style="height:40px;" class="post">Yes Delete</button>

                </div>
            </form>
        </div>

    </section>
      
    </section>
@endsection
@section('js')
    <script class="js">
        function Deleted(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                window.location.reload();
            }
        }
        function ViewCaption(element){
                let is_shown=element.querySelector('.child').classList.contains('active') ? true : false;
                let captions=document.querySelectorAll('.caption .child');
                captions.forEach((caption)=>{
                    caption.classList.remove('active');
                });
                if(is_shown){
                    element.querySelector('.child').classList.remove('active');
                }else{
                    element.querySelector('.child').classList.add('active');
                }
                
        }
        function Toggle(element){
            if(element.closest('.toggle').classList.contains('active')){
                element.closest('.toggle').classList.remove('active');
                document.querySelector('input[name=refund]').value='no';
            }else{
                 element.closest('.toggle').classList.add('active');
                document.querySelector('input[name=refund]').value='yes';
            }
        }

        function ShowDeletePrompt(task_id,user_id){
         try{
               document.querySelector('.modal.delete input[name=id]').value=task_id;
             document.querySelector('.modal.delete input[name=refund]').value='no';
            document.querySelector('.modal.delete form .toggle').classList.remove('active');
             document.querySelector('.modal.delete').classList.add('active');
            
            if(user_id != 0){
                document.querySelector('.modal.active form .refund-policy').classList.remove('display-none');
            }else{
                document.querySelector('.modal.active form .refund-policy').classList.add('display-none');
            }
         }catch(error){
            alert(error.stack)
         }
               
        }
    </script>
@endsection