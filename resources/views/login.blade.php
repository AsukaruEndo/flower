<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- google jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <title>WEBSYSTEM</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="css/main.css">

        <!-- Ajax -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .login{
                background-color: #FBEFFB;
                border: 0.7px solid #F6CED8;
                border-radius: 12px;
                padding: 12px;
            }
        </style>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript">
            // Ajax
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
                                    console.log("読み込み失敗")
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

                // select option

                
        </script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <form action="login" method="POST" name="form1">
                {{ csrf_field() }}
                <div class="login">
                    @if (session('message'))
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="alert alert-warning">
                                {{ session('message') }}
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">事業所選択</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="office_name" onchange="selectboxChange();" required="">
                          <option value="---">---</option>
                          <option value="成安事業所">成安事業所</option>
                          <option value="渋江事業所">渋江事業所</option>
                          <option value="天童事業所">天童事業所</option>
                          <option value="あじさい事業所">あじさい事業所</option>
                          <option value="管理者">管理者</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">担当者</label>
                        <select class="form-control" id="exampleFormControlSelect2" name="office_person" required="">
                          <option>--選択してください。--</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">パスワード</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass" required="">
                    </div>
                    <button type="submit" class="btn btn-outline-info btn-primary btn-lg btn-block">ログイン</button>
                </div>
            </form>
            <div id="output"></div>
        </div>
    </body>
</html>