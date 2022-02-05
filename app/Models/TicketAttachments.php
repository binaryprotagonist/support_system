<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tickets;

class TicketAttachments extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'attachment',
        'created_at',
        'updated_at',
    ];

    protected $appends = ['filePath'];

    public function ticket(){
        return $this->belongsTo(Tickets::class,'ticket_id','id');
    }

    public function getFileAttribute($file){
        return $file;
    }

    public function getFilePathAttribute(){
        if($this->file && file_exists('public/ticket_attachments/' . $this->file)){
            return asset('/public/ticket_attachments/' . $this->file);
        }
        return false;
    }
}