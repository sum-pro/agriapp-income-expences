<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeExpense extends Model
{
    use HasFactory;

    protected $table = 'income_expense';
    protected $fillable = ['user_id','amount','type','balance','details','total_income','total_expense','date'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
