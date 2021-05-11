<ul class="sidebar-menu">
    <li class="header">Navegación</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="active"><a href="#"><i class="fa fa-dashboard"></i> <span>Inicio</span></a></li>

    <li class="treeview">
      <a href="#"><i class="fa fa-bars"></i> <span>Blog</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
      <ul class="treeview-animated-list mb-3">
        <li><a  href="{{ route('admin.posts,index') }}"><i class="fa fa-eye"></i>Ver todos los post</a></li>
        <li><a href="#"><i class="fa fa-pencil"></i>Crear un Post</a></li>
      </ul>
    </li>
  </ul><!-- /.sidebar-menu -->
</section>
