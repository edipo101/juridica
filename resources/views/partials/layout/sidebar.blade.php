  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('img/avatar/'.auth()->user()->avatar.'.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{auth()->user()->first_name.' '.auth()->user()->first_surname}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="{{!Route::is('home') ?: 'active'}}">
          <a href="{{route('home')}}"><i class="fa fa-dashboard"></i> <span>Inicio</span></a>
        </li>
        
        <!------------------------------------------------------------------------------------------------------
        MÓDULO DE TRÁMITES
        Descripcion: Permite la gestion de trámites...
         -->
        <li class="header">Bandeja de documentos</li>
        <li class="">
          <a href="{{route('denunciations.index')}}"><i class="fa fa-external-link"></i> <span>Documentos jurídicos</span></a>
        </li>
        <li class="">
          <a href="#"><i class="fa fa-external-link"></i> <span>Notificaciones</span></a>
        </li>
        <li class="">
          <a href="#"><i class="fa fa-external-link"></i> <span>Procesos asignados</span></a>
        </li>

        <li class="header">Configuración</li>
        <li class="">
          <a href="#"><i class="fa fa-users"></i> <span>Configuración</span></a>
        </li>

        @if (auth()->user()->profile_id == 1)
        <li class="{{!Route::is('users.index') ?: 'active'}}">
          <a href="{{route('users.index')}}"><i class="fa fa-users"></i> <span>Usuarios</span></a>
        </li>
        @endif

        <li class="{{!Route::is('users.profile') ?: 'active'}}">
          <a href="{{route('users.profile')}}"><i class="fa fa-user"></i> <span>Mi perfil</span></a>
        </li>

        <li class="{{!Route::is('tasks.index') ?: 'active'}}" onclick="logout();">
            <a href="#"><i class="fa fa-sign-out"></i> <span>Salir</span></a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
</aside>