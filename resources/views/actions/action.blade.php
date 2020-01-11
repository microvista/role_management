<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@include('include/header')

<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href='{{URL("plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}'>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('include/navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('include/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Actions</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Actions</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Role Actions</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#ID</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Enabled</th>
                  <th>Under Maitenance</th>
                  <th>Created On</th>
                </tr>
                </thead>
                <tbody>
                @if (!empty($actions)) 
                  @foreach ($actions as $action)
                    <tr>
                      <th>{{$action->id}}</th>
                      <th>{{$action->name}}</th>
                      <th>{{$action->description}}</th>
                      <th>@if ($action->is_enabled == 1) {{'Yes'}} @else {{'No'}} @endif</th>
                      <th>@if ($action->is_under_maintenance == 1) {{'Yes'}} @else {{'No'}} @endif</th>
                      <th>{{ Carbon\Carbon::parse($action->created_at)->format('d-m-Y') }}</th>
                    </tr>
                  @endforeach
                @endif
                </tbody>
                <tfoot>
                <tr>
                  <th>#ID</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Enabled</th>
                  <th>Under Maitenance</th>
                  <th>Created On</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('include/sidebar')
  <!-- Main Footer -->  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('include/common_scripts')

<!-- DataTables -->
<script src='{{URL("plugins/datatables/jquery.dataTables.js")}}'></script>
<script src='{{URl("plugins/datatables-bs4/js/dataTables.bootstrap4.js")}}'></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>