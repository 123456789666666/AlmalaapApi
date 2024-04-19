<?php

namespace App\Services;

use App\Models\Customers;
use Illuminate\Http\Request;

class BookingQuery {
    protected $safeParms = [
        'id' => ['eq', 'gt', 'lt'],
        'customer_id' => ['eq', 'gt', 'lt'],
        'room_id' => ['eq', 'gt', 'lt'],
        'booking_date' => ['eq', 'gt', 'lt'],
        'start_time' => ['eq', 'gt', 'lt'],
        'end_time' => ['eq', 'gt', 'lt'],
    ];
    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<',
    ];
    public function transform(Request $request){
        $eloQuery = [];

        foreach($this->safeParms as $parm => $operators){
              $query = $request->query($parm);

              if(!isset($query)){
                    continue;
              }

              $column = $parm;

              foreach($operators as $operator){
                    if(isset($query[$operator])){
                          $eloQuery[] = [$parm, $this->operatorMap[$operator], $query[$operator]];
                    }
              }
        }

        return $eloQuery;
  }
}
