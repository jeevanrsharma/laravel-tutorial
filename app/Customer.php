<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	//fillable example
	// protected $fillable = ['name','email','active'];

	//gaurded exampde - recommended
	protected $guarded = []; // empty means nor restriction and adding fileds will ignore those as opposite to fillable 
	protected $attributes = [
		'active' => 1
	];
	
	public function getActiveAttribute($attribute){

		return $this->activeOptions()[$attribute];
	}

	public function scopeActive($query){
		return $query->where('active', 1);
	}
	public function scopeInActive($query){
		return $query->where('active', 0);
	}
	 public function company(){
    	return $this->belongsTo(Company::class);
    }

    public function activeOptions(){
    	return [
			1 => 'Active',
			0 => 'In Active',
			2 => 'In Progress'
		];
    }
}
