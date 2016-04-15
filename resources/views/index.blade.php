@extends('layouts.app')

@section('header')
    <div class="header-title" style="border-bottom: 1px solid #eee; margin-bottom: 20px;">
        <div class="container">
            <div class="row" style="width: 400px; display: inline-block;">
                <h1 class="page-title " style="text-decoration: underline;">
                    Shop			</h1>
            </div>

            <div class="pull-right" style="margin-top: 30px; display: inline-block">
                <br><ol class="breadcrumb breadcrumb-arrow pull-right"><li class="active"><a>Shop</a></li></ol>		</div>
        </div>
    </div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
