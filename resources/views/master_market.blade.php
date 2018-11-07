@extends('layouts.app')
    @section('content')
        <div class="flex-center position-ref full-height">
            <div class="menu">
                <strong>市場マスタ画面</strong>
            </div><!-- .menu -->
        </div><!-- flex-center position-ref full-height -->
        <div class="form_action">
          <div style="float: right;">
            <a href="register_market" target="_blank">
              <button type="button" class="btn btn-warning" style="color: #29088A;">新規登録</button>
            </a>
          </div>
          <div class="clear"></div>
          <table class="nop">
            <tbody>
              <tr>
                <th>市場コード</th>
                <th>市場名</th>
                <th>送料</th>
                <th>手数料％</th>
                <th>通信費</th>
                <th>郵便番号</th>
                <th>住所</th>
                <th>TEL</th>
                <th>FAX</th>
                <th></th>
              </tr>
              @foreach($market as $market)
                <tr>
                  <td class="market_no" data-target='#exampleModal' data-toggle='modal' data-id="{{ $market->id }}" 
                  onclick="tr_update_market( {{ $market->id }}, {{ $market->market_no }}, '{{ $market->market_name }}', '{{ $market->amount }}', '{{ $market->communication_cost }}', '{{ $market->post_no }}', '{{ $market->adress }}', '{{ $market->tel }}', '{{ $market->fax }}' )" > {{ $market->market_no }} </td>
                  <td> {{ $market->market_name }} </td>
                  <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#postageModal" onclick="insert_postage( {{ $market->id }} )">設定</button> </td>
                  <td> {{ $market->amount }} </td>
                  <td> {{ $market->communication_cost }} </td>
                  @if (strlen($market->post_no) == 6)
                  <td> 0{{ $market->post_no }} </td>
                  @else
                  <td> {{ $market->post_no }} </td>
                  @endif
                  <td> {{ $market->adress }} </td>
                  @if($market->tel)
                  <td> <a href="tel:0{{ $market->tel }}">{{ $market->tel }}</a> </td>
                  @else
                  <td></td>
                  @endif
                  @if($market->fax)
                  <td> {{ $market->fax }} </td>
                  @else
                  <td></td>
                  @endif
                  <td> <button type="button" class="btn btn-danger" onclick="delete_master_alert({{ $market->id }})">削除</button></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div><!-- .form_action -->





      <!-- モーダルウィンドウの中身 -->
      <!-- データ更新モーダルウィンドウ -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">市場情報を変更</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form method="POST">
                <div class="form-row align-items-center">
                  @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                  <div class="col-sm-3 my-1">
                    <span>市場コード</span>
                    <label class="sr-only" for="market_no">市場コード</label>
                    <input type="number" class="form-control" id="market_no" placeholder="code" name="market_no" required="">
                  </div>
                  <div class="col-7">
                    <span>市場名</span>
                    <label class="sr-only" for="market_name">市場名</label>
                    <input type="text" class="form-control" id="market_name" placeholder="name" name="market_name" required="">
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
                    <input type="number" class="form-control" id="post_no" placeholder="郵便番号" name="post_no" maxlength="12" title="郵便番号は、-（ハイフンなし）７文字以内で記入してください。">
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
                    <input type="tel" class="form-control" id="tel" placeholder="TEL" name="tel" maxlength="15" title="電話番号は、-（ハイフンなし）15文字以内で記入してください。">
                  </div>
                  <div class="col-sm-3 my-1">
                    <span>FAX</span>
                    <label class="sr-only" for="fax">FAX</label>
                    <input type="tel" class="form-control" id="fax" placeholder="FAX" name="fax"  maxlength="15" title="FAX番号は、-（ハイフンなし）15文字以内で記入してください。">
                  </div>
                </div><!--  // form-row align-items-center  -->
              </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                <button type="button" class="btn btn-primary" id="update_market_button">市場情報を更新する</button>
              </div>
          </div>
        </div>
    </div>

    <!-- 送料設定モーダルウィンドウ -->
      <div class="modal fade" id="postageModal" tabindex="-1" role="dialog" aria-labelledby="postageModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postageModal">送料を設定</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form method="POST" action="insert_postage" id="postageModalForm">
                <div class="form-row">
                  <div class="col-7">
                    箱名
                  </div>
                  <div class="col">
                    送料
                  </div>
                </div>

                <div class="form-row">
                  @foreach($box as $box)
                  <div class="col-7" style="margin-top: 12px;">
                    {{ $box->id }}. {{ $box->box_name }}
                  </div>
                  <div class="col" style="margin-top: 12px;">
                    <input type="number" class="form-control" id="postage" name="{{ $box->id }}" placeholder="{{ $box->box_name }}の送料">
                  </div>
                  <hr>
                  @endforeach
                </div>
              </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                <button type="submit" class="btn btn-primary" id="postage_insert">決定</button>
              </div>
          </div>
        </div>
    </div>
    @endsection

