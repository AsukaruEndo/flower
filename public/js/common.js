// Ajax login
function makeOption(val){
    $option = $('<option>').val(val.id).text(val.charge_person_name);
    return $option;
}

function ajaxSelectOption(val){
    $('#exampleFormControlSelect2').children().remove();
    $.ajax({
                url: 'api/person_data',
                type : 'GET',
                dataType : 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    'office_name' : val,
                },
                success: function(data){
                    console.log(data.data);
                    $.each(data.data, function(key, value){
                        $option = makeOption(value);
                        $("#exampleFormControlSelect2").append($option);
                    })
                },
                error: function(){
                    console.log("読み込み失敗");
                }
            });
}

function selectboxChange() {
    target = document.getElementById("output");
    selindex = document.form1.exampleFormControlSelect1.selectedIndex;
    switch (selindex) {
        case 1:
           ajaxSelectOption(1)
        break;
        case 2:
            ajaxSelectOption(2)
        break;
        case 3:
            ajaxSelectOption(3)
        break;
        case 4:
            ajaxSelectOption(4)
        break;
        case 5:
            ajaxSelectOption(5)
        break;
    }
}

// menu_system　フォームのとび先を指定
function submitAction(url) {
    console.log(url);
    $('form').attr('action', url);
    $('form').submit();
}


// 品種マスタ 削除アラート
function delete_alert(ids){
    // 「OK」時の処理開始 ＋ 確認ダイアログの表示
    if(window.confirm('削除しますか？削除しても開発元に問い合わせることで削除前の状態に戻すことができます。')){
        $.ajax({
            url : 'master_kind_flowers_delete',
            type: 'GET',
            dataType : 'json',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                'delete_id': ids,
            },
            success : function(){
                location.reload();
                console.log('update');
            },
            error : function(){
                location.reload();
                console.log('falase');
            }
        }); // ajax 
    } // alert
}

// 品種マスタ　update
function tr_update(val){
        var id = val;
        var kind_code = $("#kind_code").val();
        var kind_name = $("#kind_name").val();
        $.ajax({
            url : 'update_master_kind_flower',
            type : 'POST',
            dataType : 'json',
            headers :{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                'id': id,
                'kind_code' : kind_code,
                'kind_name' : kind_name
            },
            success : function() {
                console.log('update is success');
                location.reload();
            },
            error : function() {
                console.log('update is false');
                location.reload();
            }
        }); // ajax
}

// 品種マスタ
function change_kind(arg) {
        var txt = $('[name=office_name_kind] option:selected').val();
        $("#sample").empty();
        $.ajax({
            url: 'master_kind_flowers',
            type: 'GET',
            dataType: 'json',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                'office_name': txt,
            },
            success: function(data){
                    var table = $("<table class='nop'>")
                    var tbody = $("<tbody><tr><th>品種コード</th><th>品種名</th><th>ソートキー</th><th></th></tr>")
                    table.append(tbody);
                    if ( !data ) {
                        var option = tbody.append("<tr><td>データーがありません</td><td>データーがありません</td><td>データーがありません</td></tr>");
                    }else{
                        $.each(data.data, function(key, value){
                            var button = "<td><button id='on" + value.id + "' type='button' class='btn btn-danger' onClick='delete_alert(" + value.id + ")'>削除</button></td>";
                            var option = tbody.append(
                                "<tr onClick='tr_update(" + value.id + ")' data-target='#exampleModal' data-toggle='modal'><td align='right'>" + value.kind_code + 
                                "</td><td align='left'>" + value.kind_name + 
                                "</td><td align='right'>" + value.kind_sort_key + 
                                "</td>"+ button + "</tr>");
                        })
                    }
                    $("#sample").append(table);
                },
            error: function(){
                console.log("読み込み失敗");

            }
        });

}



// 担当者マスタ 削除アラート
function delete_peerson_alert(ids){
    // 「OK」時の処理開始 ＋ 確認ダイアログの表示
    if(window.confirm('削除しますか？削除しても開発元に問い合わせることで削除前の状態に戻すことができます。')){
        $.ajax({
            url : 'master_person_delete',
            type: 'GET',
            dataType : 'json',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                'delete_id': ids,
            },
            success : function(){
                location.reload();
                console.log('update');
            },
            error : function(){
                location.reload();
                console.log('falase');
            }
        }); // ajax 
    } // alert
}

// 担当者マスタ　update
function tr_update_person(val){
        var id = val;
        var charge_person_no = $("#charge_person_no").val();
        var charge_person_name = $("#charge_person_name").val();
        var password = $("#password").val();
        $.ajax({
            url : 'update_master_person',
            type : 'POST',
            dataType : 'json',
            headers :{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                'id': id,
                'charge_person_no' : charge_person_no,
                'charge_person_name' :charge_person_name,
                'password': password 
            },
            success : function() {
                console.log('update is success');
                location.reload();
            },
            error : function() {
                console.log('update is false');
                location.reload();
            }
        }); // ajax
}

// 担当者マスタ
function change_person(arg) {
        var txt = $('[name=office_name_kind] option:selected').val();
        $("#sample").empty();
        $.ajax({
            url: 'master_person_serch',
            type: 'GET',
            dataType: 'json',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                'office_no': txt,
            },
            success: function(data){
                    var table = $("<table class='nop'>")
                    var tbody = $("<tbody><tr><th>担当者コード</th><th>担当名</th><th>パスワード</th><th></th></tr>")
                    table.append(tbody);
                    if ( !data ) {
                        var option = tbody.append("<tr><td>データーがありません</td><td>データーがありません</td><td>データーがありません</td></tr>");
                    }else{
                        $.each(data.data, function(key, value){
                            var button = "<td><button id='on" + value.id + "' type='button' class='btn btn-danger' onClick='delete_peerson_alert(" + value.id + ")'>削除</button></td>";
                            var option = tbody.append(
                                "<tr onClick='tr_update_person(" + value.id + ")' data-target='#exampleModal' data-toggle='modal'><td align='right'>" + value.charge_person_no + 
                                "</td><td align='left'>" + value.charge_person_name + 
                                "</td><td align='right'>" + value.password + 
                                "</td>"+ button + "</tr>");
                        })
                    }
                    $("#sample").append(table);
                },
            error: function(){
                console.log("読み込み失敗");

            }
        });
}

// 箱マスタ 削除アラート
function delete_box_alert(ids){
    // 「OK」時の処理開始 ＋ 確認ダイアログの表示
    if(window.confirm('削除しますか？削除しても開発元に問い合わせることで削除前の状態に戻すことができます。')){
        $.ajax({
            url : 'master_box_delete',
            type: 'GET',
            dataType : 'json',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                'delete_id': ids,
            },
            success : function(){
                location.reload();
                console.log('update');
            },
            error : function(){
                location.reload();
                console.log('falase');
            }
        }); // ajax 
    } // alert
}

// 箱Ⓜスタ　更新
function tr_update_box(id, box_no, box_name, size, box_cost, summary, classification){
        $('#box_no').val(box_no);
        $('#box_name').val(box_name);
        $('#size').val(size);
        $('#box_cost').val(box_cost);
        $('#summary').val(summary);
        $('#classification').val(classification);
        // updateボタンが押されたとくの処理
        $('#update_box_button').on('click',function() {
            var box_no = $("#box_no").val();
            var box_name = $("#box_name").val();
            var size = $('#size').val();
            var box_cost = $('#box_cost').val();
            var summary = $('#summary').val();
            var classification = $('#classification').val();
            $.ajax({
            url : 'update_master_box',
            type : 'POST',
            dataType : 'json',
            headers :{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                'id': id,
                'box_no' : box_no,
                'box_name' : box_name,
                'size' : size,
                'box_cost' : box_cost,
                'summary' : summary,
                'classification' : classification,
            },
            success : function() {
                console.log('update is success');
                location.reload();
            },
            error : function() {
                console.log('update is false');
                location.reload();
            }
            }); // ajax
        }); // push button 
}

// 市場マスタ　削除
// 市場マスタ 削除アラート
function delete_master_alert(ids){
    // 「OK」時の処理開始 ＋ 確認ダイアログの表示
    if(window.confirm('削除しますか？削除しても開発元に問い合わせることで削除前の状態に戻すことができます。')){
        $.ajax({
            url : 'master_master_delete',
            type: 'GET',
            dataType : 'json',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                'delete_id': ids,
            },
            success : function(){
                location.reload();
                console.log('update');
            },
            error : function(){
                location.reload();
                console.log('falase');
            }
        }); // ajax 
    } // alert
}


// 市場マスタ　更新
function tr_update_market(id, market_no, market_name, amount, communication_cost, post_no, adress, tel, fax){
        $('#market_no').val(market_no);
        $('#market_name').val(market_name);
        $('#amount').val(amount);
        $('#communication_cost').val(communication_cost);
        if (post_no.length == 6) {
            $('#post_no').val(0 + post_no);
        }else{
            $('#post_no').val(post_no);
        }
        $('#adress').val(adress);
        $('#tel').val(tel);
        $('#fax').val(fax);
        // updateボタンが押されたとくの処理
        $('#update_market_button').on('click',function() {
            var market_no = $("#market_no").val();
            var market_name = $("#market_name").val();
            var amount = $('#amount').val();
            var communication_cost = $('#communication_cost').val();
            var post_no = $('#post_no').val();
            var adress = $('#adress').val();
            var tel = $('#tel').val();
            var fax = $('#fax').val();
            $.ajax({
            url : 'update_master_market',
            type : 'POST',
            dataType : 'json',
            headers :{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                'id': id,
                'market_no' : market_no,
                'market_name' : market_name,
                'amount' : amount,
                'communication_cost' : communication_cost,
                'post_no' : post_no,
                'adress' : adress,
                'tel' : tel,
                'fax' : fax
            },
            success : function() {
                console.log('update is success');
                location.reload();
            },
            error : function() {
                console.log('update is false');
                location.reload();
            }
            }); // ajax
        }); // push button 
}


// 送料設定　登録
function insert_postage(market_id) {
            $('#postage_insert').on('click',function() {
                var all_val = $('#postageModalForm').serialize();
            $.ajax({
            url : 'insert_postage',
            type : 'POST',
            dataType : 'json',
            headers :{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                'market_id': market_id,
                'all_val' : all_val,
            },
            success : function() {
                console.log('update is success');
                location.reload();
            },
            error : function() {
                console.log('update is false');
                location.reload();
            }
            }); // ajax
        }); // push button 
}

// CSV upload
function csv_upload() {
    var file = $('customFile').val();
    console
    $.ajax({
            url : 'csv_upload',
            type : 'POST',
            dataType : 'json',
            headers :{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                'file': file,
            },
            success : function() {
                console.log('update is success');
                location.reload();
            },
            error : function() {
                console.log('update is false');
                location.reload();
            }
            }); // ajax
}