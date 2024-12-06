<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;


class create_order extends Model
{
    use HasFactory; 

protected $fillable = [ 
'project_name', 
'project_description', 
'Total_cost', 
'project_status'
]; 

}
