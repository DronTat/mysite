@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@</span>
                    </div>
                    <input type="text" class="form-control" id="email" placeholder="example@example.com" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-sm-5">
                <div id="dropZone">
                    <label for="uploadFile" class="btn btn-primary">
                        <i>Выберите файл</i>
                        <input type="file" id="uploadFile" name="attachments[]" style="display: none">
                    </label>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label for="description">Краткое описание</label>
                    <textarea class="form-control" id="description" rows="3"></textarea>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <div id="preview"></div>
                </div>
            </div>
        </div>
        <button class="btn btn-success"  id="upload" style="width: 100%">Загрузить</button>
        <div class="alert" role="alert" style="margin: 7px 0; display: none">
            Это основное уведомление — check it out!
        </div>
        <div class="progress" style="margin: 7px 0">
            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 0%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
@endsection
