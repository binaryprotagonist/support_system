<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            @if(Auth::user()->is_admin==0)
            <li>
                <a href="{{  route('home')  }}" class="active"><i class="fa fa-dashboard fa-fw"></i>
                    {{__('Dashboard') }}</a>
            </li>
            <li>
                <a href="{{ route('client.ticket.add') }}"><i class="fa fa-ticket fa-fw"></i> {{__('Add Ticket') }}</a>
            </li>
            <li>
                <a href="{{ route('client.ticket') }}"><i class="fa fa-table fa-fw"></i> {{__('All Ticket') }}</a>
            </li>
            @endif
            @if(Auth::user()->is_admin==1)
            <li>
                <a href="{{ route('support.home') }}" class="active"><i class="fa fa-dashboard fa-fw"></i>
                    {{__('Dashboard') }}</a>
            </li>
            <li>
                <a href="{{ route('support.ticket') }}"><i class="fa fa-table fa-fw"></i> {{__('All Ticket') }}</a>
            </li>
            @endif
        </ul>
    </div>
</div>