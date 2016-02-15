      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
              <a href="/{{ session('app.alias') }}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>
            @if(  session('app.alias') == 'hhway')
              <li class="">
                <a href="/hhway/referrals">
                  <i class="fa fa-files-o"></i>
                  <span>Referrals</span>
                  <span class="label label-primary pull-right">4</span>
                </a>
              </li>
            @elseif(  session('app.alias') == 'wims')
              <li class="header">Inventory</li>
              <li><a href="/wims/items"><i class="fa fa-cube"></i> Item</a></li>
              <li><a href="/wims/items/category"><i class="fa fa-tags"></i> Item Category</a></li>
              <li><a href="/wims/items/uom"><i class="fa fa-tachometer"></i> Item UOM</a></li>
              <li class="">
                <a href="/wims/pr">
                  <i class="fa fa-files-o"></i>
                  <span>PR</span>
                  <span class="label label-primary pull-right">4</span>
                </a>
              </li>
              <li class="">
                <a href="/wims/po">
                  <i class="fa fa-files-o"></i>
                  <span>PO</span>
                  <span class="label label-primary pull-right">4</span>
                </a>
              </li>
            @else
              Auth::logout();
              return redirect('/');
            @endif
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>