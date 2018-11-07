@extends('layouts.app')
    @section('content')
        <div class="flex-center position-ref full-height">
            <div class="menu">
                <strong>担当者 新規登録</strong>
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
                    <select class="form-control" id="exampleFormControlSelect1" name="office_name_kind">
                      <option value="---">---</option>
                      <option value="1">成安事業所</option>
                      <option value="2">渋江事業所</option>
                      <option value="3">天童事業所</option>
                      <option value="4">あじさい事業所</option>
                    </select>
                </div>
                <div class="form-row align-items-center">
                  <div class="col-sm-3 my-1">
                    <span>担当者コード</span>
                    <label class="sr-only" for="charge_person_no">担当者コード</label>
                    <input type="text" class="form-control" id="charge_person_no" placeholder="担当者コード" name="charge_person_no">
                  </div>
                  <div class="col-sm-3 my-1">
                    <span>担当者名</span>
                    <label class="sr-only" for="charge_person_name">担当者名</label>
                    <input type="text" class="form-control" id="charge_person_name" placeholder="担当者名" name="charge_person_name">
                  </div>
                  <div class="col-sm-3 my-1">
                    <span>パスワード</span>
                    <label class="sr-only" for="password">パスワード</label>
                    <input type="password" class="form-control" id="password" placeholder="password" name="password">
                  </div>
                </div><!--  // form-row align-items-center  -->
                <br>
                <button type="submit" class="btn btn-primary btn-lg btn-block">登録</button>
            </form>
        </div><!-- .form_action -->
    @endsection

