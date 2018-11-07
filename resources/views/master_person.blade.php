@extends('layouts.app')
    @section('content')
        <div class="flex-center position-ref full-height">
            <div class="menu">
                <strong>担当者マスタ画面</strong>
            </div><!-- .menu -->
        </div><!-- flex-center position-ref full-height -->
        <div class="form_action">
          <div style="float: right;">
            <a href="register_person" target="_blank">
              <button type="button" class="btn btn-warning" style="color: #29088A;">新規登録</button>
            </a>
        </div>
        <div class="clear"></div>
        @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
        @endif
            <form method="POST" id="form">
                {{ csrf_field() }}
                <!-- 事業所選択 -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">事業所選択</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="office_name_kind" onchange="change_person()">
                      <option value="---">---</option>
                      <option value="1">成安事業所</option>
                      <option value="2">渋江事業所</option>
                      <option value="3">天童事業所</option>
                      <option value="4">あじさい事業所</option>
                    </select>
                </div>
            </form>
        </div><!-- .form_action -->
        <div class="form_action">
		    	<div id="sample"></div>
    	</div><!-- .form_action -->
    	<!-- モーダルウィンドウの中身 -->
    	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    		<div class="modal-dialog" role="document">
    			<div class="modal-content">
    				<div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">担当者情報を変更</h5>
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
			            	<label for="charge_person_no" class="col-form-label">担当者コード</label>
			            	<input type="text" class="form-control" id="charge_person_no" name="charge_person_no">
			          	</div>
			          	<div class="form-group">
			            	<label for="charge_person_name" class="col-form-label">担当者名</label>
			            	<input type="text" class="form-control" id="charge_person_name" name="charge_person_name">
			          	</div>
                  <div class="form-group">
                    <label for="password" class="col-form-label">パスワード</label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
			        </form>
			      	</div>
			        <div class="modal-footer">
			        	<button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
			       		<button type="button" class="btn btn-primary" id="update_person">担当者情報を更新する</button>
			      	</div>
	    		</div>
  			</div>
		</div>
    @endsection

