@extends('layouts.app')
    @section('content')
        <div class="flex-center position-ref full-height">
            <div class="menu">
                <strong>市場 新規登録</strong>
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
            <form method="POST" id="form" method="register_market">
                {{ csrf_field() }}
                <div class="form-row align-items-center">
                  <div class="col-sm-3 my-1">
                    <span>市場コード</span>
                    <label class="sr-only" for="market_no">市場コード</label>
                    <input type="number" class="form-control" id="market_no" placeholder="市場コード" name="market_no" required="">
                  </div>
                  <div class="col-sm-3 my-1">
                    <span>市場名</span>
                    <label class="sr-only" for="market_name">市場名</label>
                    <input type="text" class="form-control" id="market_name" placeholder="市場名" name="market_name" required="">
                  </div>
                </div><!--  // form-row align-items-center  -->
                <br>
                <div class="form-row align-items-center">
                  <div class="col-sm-3 my-1">
                    <span>手数料％</span>
                    <label class="sr-only" for="amount">手数料％</label>
                    <input type="number" class="form-control" id="amount" placeholder="手数料％" name="amount" step="0.1">
                  </div>
                  <div class="col-sm-3 my-1">
                    <span>通信費</span>
                    <label class="sr-only" for="communication_cost">通信費</label>
                    <input type="number" class="form-control" id="communication_cost" placeholder="通信費" name="communication_cost">
                  </div>
                  <div class="col-sm-3 my-1">
                    <span>郵便番号</span>
                    <label class="sr-only" for="post_no">郵便番号</label>
                    <input type="number" class="form-control" id="post_no" placeholder="郵便番号" name="post_no" maxlength="7" title="郵便番号は、-（ハイフンなし）７文字以内で記入してください。"> 
                  </div>
                </div><!--  // form-row align-items-center  -->
                <br>
                <div class="form-row align-items-center">
                  <div class="col-sm-3 my-1">
                    <span>住所</span>
                    <label class="sr-only" for="adress">住所</label>
                    <input type="text" class="form-control" id="adress" placeholder="住所" name="adress">
                  </div>
                  <div class="col-sm-3 my-1">
                    <span>TEL</span>
                    <label class="sr-only" for="tel">TEL</label>
                    <input type="tel" class="form-control" id="tel" placeholder="TEL" name="tel" title="電話番号は、-（ハイフンなし）15文字以内で記入してください。" maxlength="15">
                  </div>
                  <div class="col-sm-3 my-1">
                    <span>FAX</span>
                    <label class="sr-only" for="fax">FAX</label>
                    <input type="tel" class="form-control" id="fax" placeholder="FAX" name="fax" title="FAX番号は、-（ハイフンなし）15文字以内で記入してください。" maxlength="15">
                  </div>
                </div><!--  // form-row align-items-center  -->
                <br>
                <button type="submit" class="btn btn-primary btn-lg btn-block">登録</button>
            </form>
        </div><!-- .form_action -->
    @endsection

