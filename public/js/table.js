// テーブル表示
	var kind = $('.kind_name');
	if ( kind.text() > 1 ) {
		kind.eq(0).attr('rowspan="5"');
		for (var i = 1; i < kind.length; i++) {
			kind.eq(i).hide();
		}
	}


// 配列にして
var kind = $('.kind_name');
var t = kind.text();
var kindArray = t.split();
// 空白を削除
var x = $.unique(kindArray);
