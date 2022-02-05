<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\TaskStatus;
use App\Models\TicketAttachments;
use App\Models\Tickets;


class Tickets extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'status',
        'client_id',
        'assigned_to',
        'created_at',
        'updated_at',
    ];

    public function ticket_client(){
        return $this->belongsTo(User::class,'client_id','id');
    }

    public function ticket_assigned_to(){
        return $this->belongsTo(User::class,'assigned_to','id');
    }

    public function ticket_status(){
        return $this->belongsTo(TaskStatus::class,'status','id');
    }

    public function ticketAttachments(){
        return $this->hasMany(TicketAttachments::class,'ticket_id','id');
    }
}
