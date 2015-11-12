@extends('Master2')

@section('css')
 <link href="{{asset('css/simple-sidebar.css')}}" rel="stylesheet" type="text/css">

<link href="{{asset('css/style2.css')}}" rel="stylesheet" type="text/css">


@endsection
@section('script')





@endsection

@section('contenido')





<div class="row">
  <div id="page-content-wrapper">
    <div class="container-fluid2">
      
      <br/>
      <div class="col-md-8 col-xs-12  col-md-offset-4 col-sm-offset-2 col-xl-offset-1">
       <div class="row">
        <div class="col-md-5">
          <div class="panel">
            <header class="panel-heading">
              Escritores
            </header>

            <ul class="list-group teammates">
              <li class="list-group-item">
                <a href=""><img src="img/26115.jpg" width="50" height="50"></a>
                <span class="pull-right label label-danger inline m-t-15">Admin</span>
                <a href="">Damon Parker</a>
              </li>
              <li class="list-group-item">
                <a href=""><img src="img/26115.jpg"  width="50" height="50"></a>
                <span class="pull-right label label-info inline m-t-15">Member</span>
                <a href="">Joe Waston</a>
              </li>
              <li class="list-group-item">
                <a href=""><img src="img/26115.jpg"  width="50" height="50"></a>
                <span class="pull-right label label-warning inline m-t-15">Editor</span>
                <a href="">Jannie Dvis</a>
              </li>
              <li class="list-group-item">
                <a href=""><img src="img/26115.jpg"  width="50" height="50"></a>
                <span class="pull-right label label-warning inline m-t-15">Editor</span>
                <a href="">Emma Welson</a>
              </li>
              <li class="list-group-item">
                <a href=""><img src="img/26115.jpg"  width="50" height="50"></a>
                <span class="pull-right label label-success inline m-t-15">Subscriber</span>
                <a href="">Emma Welson</a>
              </li>
            </ul>
            <div class="panel-footer bg-white">
              <!-- <span class="pull-right badge badge-info">32</span> -->
              <button class="btn btn-primary btn-addon btn-sm">
                <i class="fa fa-plus"></i>
                Add Teammate
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>



@endsection


