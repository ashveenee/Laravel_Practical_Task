<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Mail\Mailable;

class SuccessMail extends Mailable
{
    use HasFactory;

    public function __construct($data)
    {
        $this->data = $data;
    }
 
    public function build()
    {
       return $this->markdown('admin.mail')
            ->subject($this->data['subjectContent']);
            
    }
}
