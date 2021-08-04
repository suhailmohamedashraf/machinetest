<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Designation;

class employee extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'photo',
        'designation',
    ];

    public function designations(){
       return  $this->belongsTo(Designation::class,'designation_id','id');
    }

}
