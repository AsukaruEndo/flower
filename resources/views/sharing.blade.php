@extends('layouts.app')
    @section('tables')
        <div class="flex-center position-ref full-height">
            <div class="menu">
                <strong>市場毎分配</strong>
            </div><!-- .menu -->
        </div><!-- flex-center position-ref full-height -->
        <div class="form_action">
             @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
            @endif
            <input type="submit" name="update" value="保存">
            <button> 全体印字</button>
            <div class="office_name" style="float: left;">
               {{ $office_name }}
            </div>
            <div class="date" style="float: left;margin-left: 22px;">
                {{ $date }}
            </div>
            <div class="user_name" style="float: right;">
                担当者：{{ $user_name }}
            </div>
            <div class="clear"></div>
        </div><!-- .form_action -->

        <!-- table -->
        <div class="contents">　市場毎分配　</div>
        <div class="form_action">
            <!-- header_table -->
            <div id="header_table">
            <table class="nop left_table" id="left_table">
                <tbody>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>枠なし印字</th>
                    </tr>
                    <tr>
                        <td>品種名</td>
                        <td>等級</td>
                        <td>入本数</td>
                        <td>箱数</td>
                        <td>残箱数</td>
                    </tr>
                </tbody>
            </table>
            <table class="nop" id="right_table">
                <tbody>
                    <tr>
                        @foreach($market as $m)
                         <th>{{ $m['id'] }}</th>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach($market as $m)
                         <th class="line_hight"><p class="hei">{{ $m['market_name'] }}</p></th>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            </div><!-- // header_table -->
                  <div class="clear"></div>

        <!-- under_table -->
        <div id="under_table">
            <table class="nop" id="under_table_left">
                <tbody>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>枠あり印字</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td id="sum_box">{{ $countBox }}</td>
                        <td id="sum_zan_box"></td>
                    </tr>
                    @foreach($flower_numbers as $flower_number)
                        <tr>
                            <td>
                                {{ $flower_number['kind_name'] }}
                            </td>
                            <td>
                                {{ $flower_number['grade'] }}
                            </td>
                            <td>
                                {{ $flower_number['flower_number'] }}
                            </td>
                            <td>
                                <span class="sum_box_data">{{ $flower_number['box_number'] }}</span>
                            </td>
                            <td class="zan">
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="" id="under_right_table">
                <tr>
                    @foreach($market as $m)
                        <th>{{ $m['id'] }}</th>
                    @endforeach
                </tr>
                <tr>
                    @foreach($market as $m)
                        <td>{{ $m['market_no'] }}</td>
                    @endforeach
                </tr>
            </table>
            <!-- box_table -->
            <table class="" width="100%">
                @foreach($boxes as $box)
                <tr>
                    <td>{{ $box["box_name"] }}</td>
                </tr>
                @endforeach
            </table>
            <!--// box_table-->
        </div><!-- // under_table -->
        <div class="clear"></div>
        <div id="dataSet"></div>
     </div><!-- // form_action -->
     <script type="text/javascript">
        // データー整形
                var data = [];
        var app = @json($json);
        for (var i = 0; i < app.length; i++) {
            var sas = [];
            var sample = Object.entries(app[i]);
            for (var k = 0; k < sample.length; k++) {
                var indata = sample[k][1];
                sas.push(indata);
            }
            data.push(sas);
        }

        //　データー出力
            var container = document.getElementById('dataSet');
            var hot = new Handsontable(container, {
              data: data,
              width: '100%',
              rowHeaders: false,
              colHeaders: false,
              colWidths : [80],
              filters: true,
              dropdownMenu: true
            });
        // 残箱数の計算
        var zan = $('.zan').text();
        console.log(zan);
        var zan_sum = 0;
        for (var i = 0; i < zan.length; i++) {
            var  zan_sum = zan_sum + zan[i];
        }
        if (zan_sum == NaN){
            $('.sum_zan_box').text(0);
        } else {
            $('.sum_zan_box').text(zan_sum);
        }
        $("#hot-display-license-info").hide();
     </script>
    @endsection
