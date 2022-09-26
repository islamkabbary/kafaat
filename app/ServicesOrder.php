<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class ServicesOrder extends Model
{
  protected $table = 'services_orders';
  protected $fillable = ['service_id' , 'full_name' , 'email' , 'phone' , 'content'];

  public function service(){
      return $this->belongsTo('App\Service' , 'service_id');
  }
}
