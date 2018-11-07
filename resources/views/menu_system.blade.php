@extends('layouts.app')
    @section('content')
        <div class="flex-center position-ref full-height">
            <div class="menu">
                <strong>新出荷報告書作成システム　MENU</strong>
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
            <form method="POST" id="form">
                {{ csrf_field() }}
                <!-- date -->
                <div class="date">
                 日付 : 
                    <label for="inputDate" class="sr-only">日付</label>
                    <input type="date" class="form-control" id="date" placeholder="日付を選択" name="date" required="">
                </div>
                <!-- office -->
                <div class="office">
                 事業所選択 
                    <label for="inputDate" class="sr-only">事業所選択</label>
                    <select class="form-control" name="office" required="" title="事業所を選択してください。">
                        <!-- roop -->
                        <option>----</option>
                        @foreach ($offices as $off)
                        <option>{{ $off->office_name }}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="clear"></div>

                <div class="flex-center position-ref full-height">
                <div class="menu">
                    <strong class="left">入力画面</strong>
                </div><!-- .menu -->
                </div><!-- flex-center position-ref full-height -->
                
                <div class="Button">
                    <div class="Button_left">
                        <button type="button" class="btn btn-outline-success btn-lg btn-block" onclick="submitAction('number_of_production')">生産数入力</button>
                        <button type="button" class="btn btn-outline-success btn-lg btn-block" onclick="submitAction('sharing')">市場毎分配</button>
                        <a href="master_csv"><button type="button" class="btn btn-outline-warning btn-lg btn-block">売上CSV入出力</button></a>
                        <button type="button" class="btn btn-outline-warning btn-lg btn-block">金額入力</button>
                    </div>
                    <div class="Button_right">
                        <a href="master_kind"><button type="button" class="btn btn-outline-danger btn-lg btn-block">品種マスタ</button></a>
                        <a href="master_market"><button type="button" class="btn btn-outline-danger btn-lg btn-block">市場マスタ</button></a>
                        <a href="master_person"><button type="button" class="btn btn-outline-danger btn-lg btn-block">担当者マスタ</button></a>
                        <a href="master_box"><button type="button" class="btn btn-outline-danger btn-lg btn-block">箱マスタ</button></a>
                    </div>
                    <div class="clear"></div>
                </div><!-- .Button -->
                <div class="menu">
                    <strong class="left
                    ">各種帳票</strong>
                </div><!-- .menu -->
                <div class="Button">
                    <div style="margin-top: 12px;">
                        <button type="button" class="btn btn-outline-info btn-lg btn-block">出荷集計表</button>
                        <button type="button" class="btn btn-outline-info btn-lg btn-block">前年対比表</button>
                        <button type="button" class="btn btn-outline-info btn-lg btn-block">請求書</button>
                    </div>
                </div>

            </form>
        </div><!-- .form_action -->
    @endsection
