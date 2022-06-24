@extends('admin.manager')

@section('content-admin')
<div class="details" style="grid-template-columns: 1fr; margin-top: 25px;">
@hasanyrole('admin')
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Tài Khoản</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <td>Email</td>
                    <td>Tên</td>
                    <td>Vai Trò</td>
                    <td>Phân Quyền</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                <tr>
                    <td>{{$user->email}}</td>
                    <td>{{$user->name}}</td>
                    <td>
                        @foreach ($user->roles as $key => $role_name)
                            <span style="background-color: aqua; padding: 5px; border-radius: 10px;">{{ $role_name->name }}</span>
                        @endforeach
                    </td>
                    @hasanyrole('admin')
                    <td class="cols-permission">
                        <form action="" method="POST">
                            @csrf
                            <select name="permission" id="permission" class="cols-permission">
                                @foreach ($role as $key => $value)
                                <option  value="{{ $value->name }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                            <button>Phân Quyền</button>
                        </form>
                    </td>
                    @endhasanyrole
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <h1 style="display: flex; justify-self: center; align-items: center; color: #03a9f4;">Bạn không có quyền hạn để vào đây!</h1>
@endhasanyrole
</div>

@yield('decentralization')
@endsection
