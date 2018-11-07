@extends('layouts.app')
    @section('content')
        <div class="flex-center position-ref full-height">
            <div class="menu">
                <strong>売上CSV入出力</strong>
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
          <button type="button" class="btn btn-block btn-lg btn-outline-warning" data-toggle="modal" data-target="#uploadModal">CSVデータ　取込み</button>
          <br>
          <button type="button" class="btn btn-block btn-lg btn-outline-info" data-toggle="modal" data-target="#dawnloadModal">CSVデータ　出力</button>
        </div><!-- .form_action -->

        <!-- upload Modal -->
        <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="uploadModalCenterTitle">ファイルアップロード</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="csv_upload" method="post" enctype="multipart/form-data">
                   {{ csrf_field() }}
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="file">
                    <label class="custom-file-label" for="customFile">CSVファイルを選択</label>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="csv_upload" onclick="">アップロード</button>
              </div>
              </form>
            </div>
          </div>
        </div>


        <!-- dawnload Modal -->
        <div class="modal fade" id="dawnloadModal" tabindex="-1" role="dialog" aria-labelledby="dawnloadModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="dawnloadModalCenterTitle">ファイルダウンロード</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="csv_dawnload" method="post">
                   {{ csrf_field() }}
                  <div class="form-group">
                    <label for="startdate"></label>
                    <input type="date" id="startdate" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name="startdate">
                    <small id="passwordHelpInline" class="text-muted">
                      から
                    </small>
                  </div>
                  <div class="form-group">
                    <label for="enddate"></label>
                    <input type="date" id="enddate" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name="enddate">
                    <small id="passwordHelpInline" class="text-muted">
                      まで
                    </small>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="csv_dawnload" onclick="">ダウンロード</button>
              </div>
              </form>
            </div>
          </div>
        </div>
    @endsection