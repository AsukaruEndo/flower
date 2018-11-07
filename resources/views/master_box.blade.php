@extends('layouts.app')
    @section('content')
        <div class="flex-center position-ref full-height">
            <div class="menu">
                <strong>箱マスタ画面</strong>
            </div><!-- .menu -->
        </div><!-- flex-center position-ref full-height -->
        <div class="form_action">
          <div style="float: right;">
            <a href="register_box" target="_blank">
              <button type="button" class="btn btn-warning" style="color: #29088A;">新規登録</button>
            </a>
          </div>
          <div class="clear"></div>
          <table class="nop">
            <tbody>
              <tr>
                <th>箱コード</th>
                <th>箱　名</th>
                <th>寸法（以下）</th>
                <th>箱代</th>
                <th>摘要</th>
                <th>区分</th>
                <th></th>
              </tr>
              @foreach($box as $box)
                <tr data-target='#exampleModal' data-toggle='modal' data-id="{{ $box->id }}" 
                  onclick="tr_update_box( {{ $box->id }}, {{ $box->box_no }}, '{{ $box->box_name }}', {{ $box->size }}, {{ $box->box_cost }}, '{{ $box->summary }}', '{{ $box->classification }}' )" >
                  <td class="box_no">{{ $box->box_no }}</td>
                  <td>{{ $box->box_name }}</td>
                  <td>{{ $box->size }}</td>
                  <td>{{ $box->box_cost }}</td>
                  <td>{{ $box->summary }}</td>
                  <td>{{ $box->classification }}</td>
                  <td><button type="button" class="btn btn-danger" onclick="delete_box_alert({{ $box->id }})">削除</button></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div><!-- .form_action -->





      <!-- モーダルウィンドウの中身 -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">箱情報を変更</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              <form method="POST">
                <div class="form-group">
                  <label for="box_no" class="col-form-label">箱コード</label>
                  <input type="text" class="form-control" id="box_no" name="box_no" value=" ">
                </div>
                <div class="form-group">
                  <label for="box_name" class="col-form-label">箱名</label>
                  <input type="text" class="form-control" id="box_name" name="box_name" value=" ">
                </div>
                <div class="form-group">
                  <label for="size" class="col-form-label">寸法（以下）</label>
                  <input type="text" class="form-control" id="size" name="size" value=" ">
                </div>                  
                <div class="form-group">
                  <label for="box_cost" class="col-form-label">箱代</label>
                  <input type="text" class="form-control" id="box_cost" name="box_cost" value=" ">
                </div>
                <div class="form-group">
                  <label for="summary" class="col-form-label">摘要</label>
                  <input type="text" class="form-control" id="summary" name="summary" value=" ">
                </div>
                <div class="form-group">
                  <label for="classification" class="col-form-label">区分</label>
                  <input type="text" class="form-control" id="classification" name="classification" value=" ">
                </div>
              </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                <button type="button" class="btn btn-primary" id="update_box_button">箱情報を更新する</button>
              </div>
          </div>
        </div>
    </div>
    @endsection

