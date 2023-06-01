<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('storage/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Embryo Planet</span>
  </a>
  @php
  $user = auth()->user();
  @endphp
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('storage/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ $user->name }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @php
        $menuItems = [
          [ 
            'prefix'=> 'aboutus',
            'route' => 'aboutus.index',
            'title' => 'About Us',
          ],
          [ 
            'prefix'=> 'businessGroup',
            'route' => 'businessGroup.index',
            'title' => 'Our Business',
          ],
          [ 
            'prefix'=> 'knowledge',
            'route' => 'knowledge.index',
            'title' => 'News',
          ],
          [  
            'prefix'=> 'workwithus',
            'route' => 'workwithus.index',
            'title' => 'Career',
          ],
          [ 
            'prefix'=> 'contactus',
            'route' => 'contactus.indexContact',
            'title' => 'ContactUs',
          ],
          [ 'prefix'=> 'mainpage',
            'route' => 'mainpage.index',
            'title' => 'Home',
          ],
          [ 'prefix'=> 'OverView',
            'route' => 'overview.index',
            'title' => 'About us - Brief',
          ],
        ];
        $menuItemsIR = [
          [
            'prefix'=>'IRBasicInfo',
            'route' => 'IRBasicInfo.index',
            'title' => 'IR Basic Info',
          ],
          [
            'prefix'=>'IRFinancial',
            'route' => 'IRFinancial.index',
            'title' => 'IR Financial',
          ],
          [ 
            'prefix' =>'IRAnalysis',
            'route' => 'IRAnalysis.index',
            'title' => 'IR Analysis',
          ],
          [  
            'prefix'=> 'IRShareHolders',
            'route' => 'shareholder.index',
            'title' => 'IR Shareholder Structure',
          ],
          
        ];
        @endphp
        <li class="nav-item  info{{ Request::is('IR*') ? ' menu-open' : '' }}">
          <a href="#" class="nav-link{{ Request::is('IR*') ? ' active' : '' }}">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              IR Pages
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @foreach ($menuItemsIR as $menuItemIR)
            <li class="nav-item">                                        
              <a href="{{ route($menuItemIR['route']) }}" class="nav-link {{ Request::is($menuItemIR['prefix'].'*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>{{$menuItemIR['title']}}</p>
              </a>
            </li>
            @endforeach
          </ul>
        </li>
        @foreach ($menuItems as $menuItem)
        <li class="nav-item">
          <a href="{{ route($menuItem['route']) }}" class="nav-link {{ Request::is($menuItem['prefix'].'*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-edit"></i>
            <p>{{ $menuItem['title'] }}</p>
          </a>
        </li>
        @endforeach
     
      
      </ul>
     
      
    </nav>
  </div>
</aside>
