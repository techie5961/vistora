<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class AdminsPostRequestController extends Controller
{
    // login
    public function Login(){
         
        if(!DB::table('admins')->where('tag',request('id'))->exists()){
            return response()->json([
                'message' => 'Admin not found',
                'status' => 'error'
            ]);
        }
       $admin= DB::table('admins')->where('tag',request('id'))->first();
       if(!Hash::check(request('password'),$admin->password)){
        return response()->json([
            'message' => 'Incorrect password',
            'status' => 'error'
        ]);
       }
       Auth::guard('admins')->loginUsingId($admin->id,true);
       return response()->json([
        'message' => 'Login successfull,redirecting....',
        'status' => 'success'
       ]);
    }

    // credit user
    public function CreditUser(){
        $user=DB::table('users')->where('id',request('user_id'))->first();
        DB::table('users')->where('id',request('user_id'))->update([
            request('wallet') => DB::raw(''.request('wallet').'  + '.request('amount').''),
            'updated' => Carbon::now()
        ]);
        
        if(request()->has('title')){
             DB::table('transactions')->insert([
    'uniqid' => strtoupper(Str::random(10)),
    'user_id' => request('user_id'),
    'title' => ucwords(strtolower(request('title'))),
    'class' => 'credit',
    'type' => 'credit_alert',
    'amount' => request('amount'),
    'wallet' => json_encode([
        'from' => 'admin',
        'to' => request('wallet'),

    ]),
     'json' => json_encode([
    'balance' => [
        'before' => $user->{request('wallet')},
        'after' => $user->{request('wallet')} + request('amount')
    ],
    'primary_wallet' => collect(Wallets())->where('key',request('wallet'))->first()->name

    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
   
        }

         return response()->json([
        'message' => 'User Creditted Successfully',
        'status' => 'success'
    ]);
    }

    // debit user
    public function DebitUser(){
        $user=DB::table('users')->where('id',request('user_id'))->first();
        DB::table('users')->where('id',request('user_id'))->update([
            request('wallet') => DB::raw(''.request('wallet').'  - '.request('amount').''),
            'updated' => Carbon::now()
        ]);
        
        if(request()->has('title')){
             DB::table('transactions')->insert([
    'uniqid' => strtoupper(Str::random(10)),
    'user_id' => request('user_id'),
    'title' => ucwords(strtolower(request('title'))),
    'class' => 'debit',
    'type' => 'debit_alert',
    'amount' => request('amount'),
    'wallet' => json_encode([
        'from' => request('wallet'),
        'to' => '',

    ]),
     'json' => json_encode([
    'balance' => [
        'before' => $user->{request('wallet')},
        'after' => $user->{request('wallet')} - request('amount')
    ],
    'primary_wallet' => collect(Wallets())->where('key',request('wallet'))->first()->name

    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
   
        }

         return response()->json([
        'message' => 'User Creditted Successfully',
        'status' => 'success'
    ]);
    }
    // general settings
    public function GeneralSettings(){
        $message='General settings updated success';
        $key='general_settings';
        $value=[
        'email_verification' => request('email_verification'),
        'maintenance_mode' => request('maintenance_mode'),
        'welcome_bonus' => request('welcome_bonus'),
        'referral_commission' => request('referral_commission'),
        'task' => [
            'penalty' => request('task_penalty')
        ]
        ];
       if(DB::table('settings')->where('key',$key)->exists()){
     DB::table('settings')->where('key',$key)->update([
             'value' => json_encode($value),
            'updated' => Carbon::now()
        ]);
       }else{
         DB::table('settings')->insert([
            'key' => $key,
            'value' => json_encode($value),
            'status' => 'active',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
       }
        

        return response()->json([
            'message' => $message,
            'status' => 'success'
        ]);
    }
     // finance settings
    public function FinanceSettings(){
        $message='Finance settings updated success';
        $key='finance_settings';
        $value=[
        'withdrawal' => [
            'fee' => request('withdrawal_fee'),
            'count' => request('withdrawal_count'),
            'affiliate_balance' => [
                'portal' => request('affiliate_wallet_withdrawal_portal','off'),
                'minimum' => request('affiliate_wallet_minimum_withdrawal',0),
                'maximum' => request('affiliate_wallet_maximum_withdrawal',0)
            ],
            'main_balance' => [
                'portal' => request('main_wallet_withdrawal_portal','off'),
                'minimum' => request('main_wallet_minimum_withdrawal',0),
                'maximum' => request('main_wallet_maximum_withdrawal',0)
            ]
        ],
            'vtu' => [
                'portal' => request('vtu_portal')
            ]
        ];
       if(DB::table('settings')->where('key',$key)->exists()){
     DB::table('settings')->where('key',$key)->update([
             'value' => json_encode($value),
            'updated' => Carbon::now()
        ]);
       }else{
         DB::table('settings')->insert([
            'key' => $key,
            'value' => json_encode($value),
            'status' => 'active',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
       }
        

        return response()->json([
            'message' => $message,
            'status' => 'success'
        ]);
    }
     // social settings
    public function SocialSettings(){
        $message='Social settings updated success';
        $key='social_settings';
        $value=[
        'whatsapp_community' => request('whatsapp_community') ?? '',
        'telegram_community' => request('telegram_community') ?? '',
        'site_notification' => request('site_notification') ?? '',
        'advert' => [
            'telegram' => request('telegram_advert_link') ?? null,
            'whatsapp' => request('whatsapp_advert_link') ?? null
        ]
        ];
       if(DB::table('settings')->where('key',$key)->exists()){
     DB::table('settings')->where('key',$key)->update([
             'value' => json_encode($value),
            'updated' => Carbon::now()
        ]);
       }else{
         DB::table('settings')->insert([
            'key' => $key,
            'value' => json_encode($value),
            'status' => 'active',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
       }
        

        return response()->json([
            'message' => $message,
            'status' => 'success'
        ]);
    }

    // bank settings
    public function BankSettings(){
        $message='Bank settings updated success';
        $key='bank_settings';
        $value=[
        'account_number' => request('account_number') ?? '',
        'bank_name' => request('bank_name') ?? '',
        'account_name' => request('account_name') ?? ''
        ];
       if(DB::table('settings')->where('key',$key)->exists()){
     DB::table('settings')->where('key',$key)->update([
             'value' => json_encode($value),
            'updated' => Carbon::now()
        ]);
       }else{
         DB::table('settings')->insert([
            'key' => $key,
            'value' => json_encode($value),
            'status' => 'active',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
       }
        

        return response()->json([
            'message' => $message,
            'status' => 'success'
        ]);
    }
     // upgrade settings
    public function UpgradeSettings(){
        $message='Upgrade settings updated success';
        $key='upgrade_settings';
        $value=[
        'upgrade' => [
           
            'fee' => request('upgrade_fee'),
            'cashback' => request('cashback'),
            'portal' => request('upgrade_portal')
        ]
        ];
       if(DB::table('settings')->where('key',$key)->exists()){
     DB::table('settings')->where('key',$key)->update([
             'value' => json_encode($value),
            'updated' => Carbon::now()
        ]);
       }else{
         DB::table('settings')->insert([
            'key' => $key,
            'value' => json_encode($value),
            'status' => 'active',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
       }
        

        return response()->json([
            'message' => $message,
            'status' => 'success'
        ]);
    }

    // add task category
    public function AddTaskCategory(){
        $validator=Validator::make(request()->all(),[
            'icon' => 'required|image|mimes:jpg,png,webp|max:5048',
            'name' => 'required|string',
            'earning' => 'required|numeric',
            'platform' => 'required|string'
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 'error'
            ]);
        }
        $icon=strtolower(GenerateID().'.'.request()->file('icon')->getClientOriginalExtension());
        request()->file('icon')->move(public_path('tasks/categories'),$icon);
        DB::table('task_categories')->insert([
            'uniqid' => GenerateID(),
            'icon' => $icon,
            'name' => request('name'),
            'earning' => request('earning'),
            'platform' => request('platform'),
            'status' => 'active',
            'updated' => Carbon::now(),
            'date' => carbon::now()
        ]);
        return response()->json([
            'message' => 'Category added successfully',
            'status' => 'success'
        ]);
    }

    // edit task category
    public function EditTaskCategory(){
         $validator=Validator::make(request()->all(),[
            'name' => 'required|string',
            'earning' => 'required|numeric',
            'platform' => 'required|string'
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 'error'
            ]);
        }
        if(request()->hasFile('icon')){
        $icon=strtolower(GenerateID().'.'.request()->file('icon')->getClientOriginalExtension());
        request()->file('icon')->move(public_path('tasks/categories'),$icon);

        }else{
            $icon=DB::table('task_categories')->where('id',request('id'))->first()->icon;
        }
         DB::table('task_categories')->where('id',request('id'))->update([
            'icon' => $icon,
            'name' => request('name'),
            'earning' => request('earning'),
            'platform' => request('platform'),
            'updated' => Carbon::now(),
        ]);
        return response()->json([
            'message' => 'Saved',
            'status' => 'success'
        ]);
    }

    // post task
    public function PostTask(){
       $validator=Validator::make(request()->all(),[
            'category' => 'required|numeric|exists:task_categories,id',
            'title' => 'required|string',
            'earning' => 'required|numeric',
            'link' => 'required|url',
            'slots' => 'required|numeric',
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 'error'
            ]);
        }
        $category=request('category');
        $category=DB::table('task_categories')->where('id',$category)->first();

    if(request()->hasFile('banner')){
        $name=time().'.'.request()->file('banner')->getClientOriginalExtension();
        request()->file('banner')->move(public_path('tasks/banners'),$name);
    }
    DB::table('tasks')->insert([
        'uniqid' => GenerateID(),
        'user_id' => 0,
        'category' => json_encode($category),
        'title' => request('title'),
        'earning' => request('earning'),
        'slots' => request('slots'),
        'completed' => 0,
        'link' => request('link'),
        'caption' => request('caption') ?? null,
        'banner' => $name ?? null,
        'status' => 'active',
        'updated' => Carbon::now(),
        'date' => Carbon::now()
    ]);
        return response()->json([
            'link' => url('admins/tasks/manage'),
            'message' => 'Task posted successfully',
            'status' => 'success'
        ]);
    }

    // delete task
    public function DeleteTask(){
      
        DB::table('tasks')->where('id',request('id'))->delete();
         return response()->json([
                'message' => 'Task deleted successfully',
                'status' => 'success'
            ]);
    }

    // edit task
    public function EditTask(){
         $validator=Validator::make(request()->all(),[
            'category' => 'required|numeric|exists:task_categories,id',
            'title' => 'required|string',
            'earning' => 'required|numeric',
            'link' => 'required|url',
            'slots' => 'required|numeric',
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 'error'
            ]);
        }
        $category=request('category');
        $category=DB::table('task_categories')->where('id',$category)->first();
        $banner=DB::table('tasks')->where('id',request('id'))->first()->banner;

    if(request()->hasFile('banner')){
        $banner=time().'.'.request()->file('banner')->getClientOriginalExtension();
        request()->file('banner')->move(public_path('tasks/banners'),$banner);
    }
    
    DB::table('tasks')->where('id',request('id'))->update([
        'user_id' => 0,
        'category' => json_encode($category),
        'title' => request('title'),
        'earning' => request('earning'),
        'slots' => request('slots'),
        'completed' => 0,
        'link' => request('link'),
        'caption' => request('caption') ?? null,
        'banner' => $banner ?? null,
        'updated' => Carbon::now(),
        
    ]);
        return response()->json([
            'link' => url('admins/tasks/manage'),
            'message' => 'Saved',
            'status' => 'success'
        ]);
    }
    // approve task
    public function ApproveTask(){
        $task=DB::table('task_proofs')->where('id',request('id'))->first();
        $reward=json_decode(json_decode($task->task)->type)->earning;
        $user=DB::table('users')->where('id',$task->user_id)->first();
        if($task->status == 'pending'){
            DB::table('users')->where('id',$user->id)->increment('main_balance',$reward);
                 DB::table('transactions')->insert([
                         'uniqid' => GenerateID(),
                'user_id' => $user->id,
                'title' => 'Task Reward',
                'class' => 'credit',
                'type' => 'task_reward',
                'amount' => $reward,
                'fee' => 0,
               'wallet' => json_encode([
                'from' => 'Task',
                'to' => 'main_balance',

                ]),
                'data' => json_encode([
                    'Task Performed' => json_decode(json_decode($task->task)->type)->name
                ]),
                'json' => json_encode([
                'balance' => [
                'before' => $user->main_balance,
                'after' => $user->main_balance + $reward 
                ],
                'primary_wallet' => 'Main Wallet'

            ]),
    
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);

    DB::table('task_proofs')->where('id',request('id'))->update([
        'status' => 'approved',
        'updated' => Carbon::now()
    ]);
   
        }
         return response()->json([
        'message' => 'Task approved successfully',
        'status' => 'success'
    ]);
    }
    // reject task
    public function RejectTask(){
       
         DB::table('task_proofs')->where('id',request('id'))->update([
        'status' => 'rejected',
        'updated' => Carbon::now()
    ]);
   
         return response()->json([
        'message' => 'Task rejected successfully',
        'status' => 'success'
    ]);
    }
    // penalise task
    public function PenaliseTask(){
        $task=DB::table('task_proofs')->where('id',request('id'))->first();
        $user=DB::table('users')->where('id',$task->user_id)->first();
        DB::table('users')->where('id',$task->user_id)->update([
            'main_balance' => DB::raw('main_balance - '.request('amount').''),
            'updated' => Carbon::now()
        ]);

        DB::table('transactions')->insert([
                'uniqid' => GenerateID(),
                'user_id' => $user->id,
                'title' => 'Task Penalty',
                'class' => 'debit',
                'type' => 'task_penalty',
                'amount' => request('amount'),
                'fee' => 0,
               'wallet' => json_encode([
                'from' => 'main_balance',
                'to' => 'Task',

                ]),
                'data' => json_encode([
                    'Task Penalised' => json_decode(json_decode($task->task)->type)->name
                ]),
                'json' => json_encode([
                'balance' => [
                'before' => $user->main_balance,
                'after' => $user->main_balance - request('amount')
                ],
                'primary_wallet' => 'Main Wallet'

            ]),
    
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
    DB::table('task_proofs')->where('id',request('id'))->update([
        'status' => 'penalised',
        'updated' => Carbon::now()
    ]);
    return response()->json([
        'message' => 'Task penalised succesfully',
        'status' => 'success'
    ]);

    }

    // approve all pending task
    public function ApproveAllPendingTask(){
        DB::table('task_proofs')->orderBy('date','desc')->where('status','pending')->chunk(50,function($all){
            foreach($all as $each){
                $id=$each->id;
                DB::transaction(function() use($id){
                      $task=DB::table('task_proofs')->where('id',$id)->first();
        $reward=json_decode(json_decode($task->task)->type)->earning;
        $user=DB::table('users')->where('id',$task->user_id)->first();
        
            DB::table('users')->where('id',$user->id)->increment('main_balance',$reward);
                 DB::table('transactions')->insert([
                         'uniqid' => GenerateID(),
                'user_id' => $user->id,
                'title' => 'Task Reward',
                'class' => 'credit',
                'type' => 'task_reward',
                'amount' => $reward,
                'fee' => 0,
               'wallet' => json_encode([
                'from' => 'Task',
                'to' => 'main_balance',

                ]),
                'data' => json_encode([
                    'Task Performed' => json_decode(json_decode($task->task)->type)->name
                ]),
                'json' => json_encode([
                'balance' => [
                'before' => $user->main_balance,
                'after' => $user->main_balance + $reward 
                ],
                'primary_wallet' => 'Main Wallet'

            ]),
    
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);

    DB::table('task_proofs')->where('id',$id)->update([
        'status' => 'approved',
        'updated' => Carbon::now()
    ]);
   
        
                });
         }
        });
        return response()->json([
            'message' => 'All pending tasks approved successfully',
            'status' => 'success'
        ]);
    }

    // reject all pending task
    public function RejectAllPendingTask(){
    DB::table('task_proofs')->orderBy('date','desc')->where('status','pending')->chunk(50,function($all){
            foreach($all as $each){
                $id=$each->id;
                DB::transaction(function() use($id){
                     DB::table('task_proofs')->where('id',$id)->update([
        'status' => 'rejected',
        'updated' => Carbon::now()
    ]);
                });
         }
        });
        return response()->json([
            'message' => 'All pending tasks rejected successfully',
            'status' => 'success'
        ]);
    }

    // create gift code
    public function CreateGiftCode(){
        $value=request('value');
        $limit=request('limit');
        DB::table('gift_codes')->insert([
            'uniqid' => GenerateID(),
            'code' => 'GCD'.GenerateID(),
            'value' => $value,
            'limit' => $limit,
            'status' => 'active',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Gift code created successfully',
            'status' => 'success'
        ]);
    }
     // edit gift code
    public function EditGiftCode(){
        $value=request('value');
        $limit=request('limit');
        DB::table('gift_codes')->where('id',request('id'))->update([
            'value' => $value,
            'limit' => $limit,
            'updated' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Gift code editted successfully',
            'status' => 'success'
        ]);
    }

    // add product
    public function AddProduct(){
        $name=request('name');
        $category=request('category');
        $price=request('price');
        $location=request('location');
        $address=request('address') ?? null;
        $photo=strtolower(GenerateID()).'.'.request()->file('photo')->getClientOriginalExtension();
        request()->file('photo')->move(public_path('photos/marketplace'),$photo);
        DB::table('products')->insert([
            'uniqid' => GenerateID(),
            'name' => $name,
            'photo' => $photo,
            'category' => $category,
            'price' => $price,
            'location' => $location,
            'address' => $address,
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);

        return response()->json([
            'message' => 'Product added successfully',
            'status' => 'success'
        ]);
    }

    // add product
    public function EditProduct(){
        $product=DB::table('products')->where('id',request('id'))->first();
        $name=request('name');
        $category=request('category');
        $price=request('price');
        $location=request('location');
        $address=request('address') ?? null;
        $photo=$product->photo;
        if(request()->hasFile('photo')){
     $photo=strtolower(GenerateID()).'.'.request()->file('photo')->getClientOriginalExtension();
        request()->file('photo')->move(public_path('photos/marketplace'),$photo);
        }
       
        DB::table('products')->where('id',request('id'))->update([
            'name' => $name,
            'photo' => $photo,
            'category' => $category,
            'price' => $price,
            'location' => $location,
            'address' => $address,
            'updated' => Carbon::now()
        ]);

        return response()->json([
            'message' => 'Product editted successfully',
            'status' => 'success'
        ]);
    }

    // confirm delivery
    public function ConfirmDelivery(){
           DB::table('purchased_products')->where('id',request('id'))->update([
            'status->seller' => 'delivered'
        ]);
        return response()->json([
            'message' => 'Item marked as delivered successfully',
            'status' => 'success'
        ]);
    }

    // upload track
    public function EditTrack(){
        $tx=false;
        $track=DB::table('tracklist')->where('id',request('id'))->first();
        $banner=$track->banner;
        $audio=$track->audio;
        if(request()->hasFile('banner')){
       $banner=strtolower(GenerateID()).'.'.request()->file('banner')->getClientOriginalExtension();
    $size=request()->file('banner')->getSize()/1024;
    $size=$size/1024;
    if($size > 5){
        return response()->json([
            'message' => 'Max upload size for banner is 5MB',
            'status' => 'warning'
        ]);
    }
     request()->file('banner')->move(public_path('tracks/banners'),$banner);
        }
     if(request()->hasFile('audio')){
     $audio=GenerateID().'.'.request()->file('audio')->getClientOriginalExtension();
    
   
    request()->file('audio')->move(public_path('tracks/audios'),$audio);
     }
   
    $tx=DB::transaction(function() use($banner,$audio){
            DB::table('tracklist')->where('id',request('id'))->update([
                'banner' => $banner,
                'audio' => $audio,
                'name' => request('name'),
                'artist' => request('artist'),
                'reward' => request('reward'),
                'updated' => Carbon::now()
            ]);
            return true;
    });
    
        if($tx){
      return response()->json([
            'message' => 'Track Editted successfully',
            'status' => 'success'
        ]);
        }
      
    }

    // upload track
    public function UploadTrack(){
        $tx=false;
        $banner=strtolower(GenerateID()).'.'.request()->file('banner')->getClientOriginalExtension();
    $size=request()->file('banner')->getSize()/1024;
    $size=$size/1024;
    $audio=GenerateID().'.'.request()->file('audio')->getClientOriginalExtension();
    if($size > 5){
        return response()->json([
            'message' => 'Max upload size for banner is 5MB',
            'status' => 'warning'
        ]);
    }
    request()->file('banner')->move(public_path('tracks/banners'),$banner);
    request()->file('audio')->move(public_path('tracks/audios'),$audio);
    $tx=DB::transaction(function() use($banner,$audio){
            DB::table('tracklist')->insert([
                'uniqid' => GenerateID(),
                'banner' => $banner,
                'audio' => $audio,
                'name' => request('name'),
                'artist' => request('artist'),
                'reward' => request('reward'),
                'status' => 'active',
                'updated' => Carbon::now(),
                'date' => Carbon::now()
            ]);
            return true;
    });
    
        if($tx){
      return response()->json([
            'message' => 'Track uploaded successfully',
            'status' => 'success'
        ]);
        }
      
    }
     // reset user password
    public function ResetUserPassword(){
        $validator=Validator::make(request()->all(),[
            'user_id' => 'required|numeric|exists:users,id'
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 'error'
            ]);
        }

        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'password' => Hash::make('123456')
        ]);
        return response()->json([
            'message' => 'User pasword reset successfully',
            'status' => 'success'
        ]);
    }
}
