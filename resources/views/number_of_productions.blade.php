@extends('layouts.app')
    @section('tables')
        <div class="flex-center position-ref full-height">
            <div class="menu">
                <strong>生産数入力</strong>
            </div><!-- .menu -->
        </div><!-- flex-center position-ref full-height -->
        <div class="form_action">
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
            <div class="table_left_join">
                <form method="POST" id="form">
                {{ csrf_field() }}
                <div class="form-row align-items-center">
                    <table class="nop">
                        <tbody>
                        <tr>
                            <th>品種</th>
                            <th>等級</th>
                            <th>入本数</th>
                            <th>箱数</th>
                            <th>摘要</th>
                            <th>削除</th>
                        </tr>
                        @foreach($rows as $row)
                        <tr class="OverFlowScroll" style="overflow-y: scroll;border-bottom: 2px dotted orange;"> 
                            <td class="kind_name_{{ $row['flower_id'] }}" style="background-color: #EFFBF5;">
                                {{ $row['kind_name'] }}
                            </td>
                            <td>
                                <textarea  rows="2" name="grade" class="form-control" id="grade_{{ $row['flower_id'] }}">{!! $row['grade'] !!}</textarea>
                            </td>
                            <td>
                                <textarea  rows="2" name="flower_number" class="form-control flower_number" id="flower_number">{!! $row['flower_number'] !!}</textarea>
                            </td>
                            <td>
                                <label class="sr-only" for="box_number">box_number</label>
                                <input type="number" name="box_number" value="{!! $row['box_number'] !!}" class="form-control" id="box_number">
                            </td>
                            <td>
                                <label class="sr-only" for="summary">summary</label>
                                <input type="text" name="summary" value="{{ $row['summary'] }}" autocomplete="on" class="form-control" id="summary" list="datalist">
                                <datalist id="datalist">
                                    <option value="葉に難あり">葉に難あり</option>
                                    <option value="花に難あり">花に難あり</option>
                                    <option value="新品種">新品種</option>
                                    <option value="網付き">網付き</option>
                                    <option value="葉に少々難あり">葉に少々難あり</option>
                                    <option value="染色（アヴァランチェ）">染色（アヴァランチェ）</option>
                                </datalist>
                            </td>
                            <td>
                                <input type="hidden" name="{{ $row['id'] }}">
                                <a href="delete_flower"><button type="button" class="btn btn-danger">削除</button></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- Bootstrap form design -->
                </div><!-- // table_left_join -->
                <button type="submit" class="btn btn-outline-info btn-lg btn-block" style="margin-top: 12px;">保存</button>
            </form>
            <div class="clear"></div>
        </div><!-- .form_action -->
        <div class="countNumber">{{ $countData }}</div>
        <script type="text/javascript">
                
                for (var i = 1; i <= {{ $countData }}; i++) {
                    var data = ".kind_name_" + i;
                    var l = $(data);
                    var n = "kind_name_" + i;
                    if ( l.length < 5 ) {
                         var pea = $(data).last().parent();
                         console.log(pea);
                         var line = '<tr style="overflow-y: scroll;border-bottom: 2px dotted orange;">' + 
                            '<td><textarea  rows="2" name="grade" class="form-control" id="grade"></textarea></td>' + 
                            '<td><textarea  rows="2" name="flower_number" class="form-control flower_number" id="flower_number"></textarea></td>' + 
                            '<td><label class="sr-only" for="box_number">box_number</label><input type="number" name="box_number" value="" class="form-control" id="box_number"></td>'+
                            '<td><label class="sr-only" for="summary">summary</label><input type="text" name="summary" value="" autocomplete="on" class="form-control" id="summary" list="datalist"><datalist id="datalist"><option value="葉に難あり">葉に難あり</option><option value="花に難あり">花に難あり</option><option value="新品種">新品種</option><option value="網付き">網付き</option><option value="葉に少々難あり">葉に少々難あり</option><option value="染色（アヴァランチェ）">染色（アヴァランチェ）</option></datalist></td><td><a href="delete_flower"><button type="button" class="btn btn-danger">削除</button></a></td></tr>';
                         pea.after(line);
                     }
                    l.eq(0).attr('rowspan', '5');
                    for (var r = 1; r < l.length; r++) {
                        l.eq(r).hide();
                    }
                    // 高さを取得してスクロールバーを表示
                    var height_data = l.eq(0).height();
                    if ( height_data > 400) {
                        $( l.eq(0) ).css({'height': height_data, 'overflow-y': 'scroll'});
                    }
                }
        </script>
    @endsection
