@extends('layouts.app')
    @section('content')
        <div class="flex-center position-ref full-height">
            <div class="menu">
                <strong>箱 新規登録</strong>
            </div><!-- .menu -->
        </div><!-- flex-center position-ref full-height -->
        <div class="form_action" style="width: 60%;">
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
            <form method="POST" id="form" method="register_box">
                {{ csrf_field() }}
                <div class="form-row align-items-center">
                  <div class="col-sm-3 my-1">
                    <span>箱コード</span>
                    <label class="sr-only" for="box_no">箱コード</label>
                    <input type="text" class="form-control" id="box_no" placeholder="箱コード" name="box_no">
                  </div>
                  <div class="col-sm-3 my-1">
                    <span>箱　名</span>
                    <label class="sr-only" for="box_name">箱　名</label>
                    <input type="text" class="form-control" id="box_name" placeholder="箱　名" name="box_name">
                  </div>
                  <div class="col-sm-3 my-1">
                    <span>寸法（以下）</span>
                    <label class="sr-only" for="size">寸法（以下）</label>
                    <input type="text" class="form-control" id="size" placeholder="寸法（以下）" name="size">
                  </div>
                </div><!--  // form-row align-items-center  -->
                <br>
                <div class="form-row align-items-center">
                  <div class="col-sm-3 my-1">
                    <span>箱代</span>
                    <label class="sr-only" for="box_cost">箱代</label>
                    <input type="text" class="form-control" id="box_cost" placeholder="箱代" name="box_cost">
                  </div>
                  <div class="col-sm-3 my-1">
                    <span>摘要</span>
                    <label class="sr-only" for="summary">摘要</label>
                    <input type="text" class="form-control" id="summary" placeholder="摘要" name="summary">
                  </div>
                  <div class="col-sm-3 my-1">
                    <span>区分</span>
                    <label class="sr-only" for="classification">区分</label>
                    <input type="text" class="form-control" id="classification" placeholder="区分" name="classification">
                  </div>
                </div><!--  // form-row align-items-center  -->
                <br>
                <button type="submit" class="btn btn-primary btn-lg btn-block">登録</button>
            </form>
        </div><!-- .form_action -->
    @endsection

