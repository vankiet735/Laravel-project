<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;
class NguoiChoi extends Authenticatable implements JWTSubject
{
	use SoftDeletes;
     protected $table='nguoi_choi';
     protected $hidden=['mat_khau'];
     public function getPasswordAttribute(){
     	return $this->mat_khau;
     }
     public function getJWTIdentifier(){
     	return $this->getKey();
     }
     public function getJWTCustomClaims(){
     	return [];
     }	
}
