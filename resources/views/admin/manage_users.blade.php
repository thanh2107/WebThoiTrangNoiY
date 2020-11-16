
@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     Danh sách người dùng
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-4">
        <?php
        $message = Session::get('message');
        if($message){

          echo '<span class="alert alert-danger errorI">'.$message.'</span>';
          Session::put('message',null);
        }
        ?>
      </div>
      <div class="col-sm-3  searchGO">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            
            <th>Mã</th>
            <th>Tên người dùng</th>
            <th>Email</th>
            <th>SĐT</th>
            <th>Địa chỉ</th>
            <th>SL đơn hàng</th>
            <th>Cấp</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_users as $user)
          <?php
          $count_quality_order = 0;
          ?>
           @foreach($all_order as $order)
              @if($user->id == $order->id_user)
              <?php
              $count_quality_order +=1 ;
              ?>
              @endif
            @endforeach
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td><span class="text-ellipsis">{{$user->email}}</span></td>
            <td><span class="text-ellipsis">{{$user->phone}}</span></td>
            <td><span class="text-ellipsis">{{$user->address}}</span></td>
            <td><span class="text-ellipsis">{{$count_quality_order}}</span></td>
             <td>
              @if($user->level == 0 )
              <span class="text-ellipsis">Người dùng</span>
              @else
              <span class="text-ellipsis">Admin</span>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of {{count($all_users)}} items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
             {!!$all_users->render() !!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection