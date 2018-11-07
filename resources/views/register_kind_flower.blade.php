@extends('layouts.app')
    @section('content')
        <div class="flex-center position-ref full-height">
            <div class="menu">
                <strong>品種 新規登録</strong>
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
            <form method="POST" id="form" method="register_person">
                {{ csrf_field() }}
                <!-- 事業所選択 -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">事業所選択</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="office_no">
                      <option value="---">---</option>
                      <option value="1">成安事業所</option>
                      <option value="2">渋江事業所</option>
                      <option value="3">天童事業所</option>
                      <option value="4">あじさい事業所</option>
                    </select>
                </div>
                <div class="form-row align-items-center">
                  <div class="col-sm-3 my-1">
                    <span>品種コード</span>
                    <label class="sr-only" for="kind_code">品種コード</label>
                    <input type="text" class="form-control" id="kind_code" placeholder="品種コード" name="kind_code">
                  </div>
                  <div class="col-sm-3 my-1">
                    <span>品種名</span>
                    <label class="sr-only" for="kind_name">品種名</label>
                    <input type="text" class="form-control" id="kind_name" placeholder="品種名" name="kind_name">
                  </div>
                  <div class="col-sm-3 my-1">
                    <span>ソートキー</span>
                    <label class="sr-only" for="kind_sort_key">ソートキー</label>
                    <input type="text" class="form-control" id="kind_sort_key" placeholder="ソートキー" name="kind_sort_key">
                  </div>
                </div><!--  // form-row align-items-center  -->
                <br>
                <button type="submit" class="btn btn-primary btn-lg btn-block">登録</button>
            </form>
        </div><!-- .form_action -->
    @endsection

