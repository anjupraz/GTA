<?php

namespace App\Jobs;

use App\Enums\UserType;
use App\Mail\ContactMail;
use App\Model\Contact;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ContactJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $contact;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contact=$contact;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $userList=User::where([["role",UserType::Admin]])->get();
        $users=[];
        foreach($userList as $user){
            array_push($users,$user->email);
        }
        Mail::to($users)->queue(new ContactMail($this->contact));
    }
}
