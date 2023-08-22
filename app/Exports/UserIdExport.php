<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserIdExport implements FromCollection
{
    private $ids;
   public function __construct($ids)
    {
        $this->ids = $ids;
    }
    public function collection()
    {
        $users=User::select('id', 'name', 'email')->whereIn('id',$this->ids)->get();
        return $users;
    }
}
