<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'username',
        'email',
        'phone',
        'password',
        'date',
        'avatar',
        'role',
        'status',
        'created_at',
        'updated_at'
    ];

    public function saveNew($params)
    {
        $data = array_merge(
            $params['cols'],
            [
                'password' => Hash::make($params['cols']['password']),
            ]
        );

        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }

    public function loadOne($id, $params = [])
    {
        $query = DB::table($this->table)->where('id', '=', $id);
        $obj = $query->first();
        return $obj;
    }

    public function saveUpdate($params)
    {
        if (empty($params['cols']['id'])) {
            Session::push('errors', 'không xác định bản ghi cập nhập');
        }

        $dataUpdate = [];
        foreach ($params['cols'] as $colName => $val) {
            if ($colName == 'id') continue;
            $dataUpdate[$colName] = (strlen($val) == 0) ? null : $val;
        }
        $res = DB::table($this->table)
            ->where('id', $params['cols']['id'])
            ->update($dataUpdate);
        return $res;
    }

    //thêm user in client
    public function saveNewUser($params)
    {
        $data = array_merge(
            $params['cols'],
            [
                'password' => Hash::make($params['cols']['password']),
                'phone' => '0956334678',
                'status' => 1,
                'role' => 4,
                'created_at' => now(), // Thêm ngày và giờ tạo bản ghi
                // Thêm dữ liệu của các trường khác tại đây
            ]
        );

        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
