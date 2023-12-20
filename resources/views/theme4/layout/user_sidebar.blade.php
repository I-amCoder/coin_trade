<div class="d-sidebar">
    <ul class="d-sidebar-menu">
      <li class="{{singleMenu('user.dashboard')}}">
        <a href="{{ route('user.dashboard') }}"><i data-feather="home"></i> {{ __('Dashboard') }}</a>
      </li>

      <li class="has_submenu {{arrayMenu(['user.investmentplan','user.invest.log'])}}">
        <a href="#0"><i data-feather="zap"></i> {{ __('Investment') }}</a>
        <ul class="submenu">
          <li class="{{singleMenu('user.investmentplan')}}">
            <a href="{{ route('user.investmentplan') }}"><i data-feather="chevrons-right"></i></i> {{ __('Investment Plans') }}</a>
          </li>
          <li class="{{singleMenu('user.invest.log')}}">
            <a href="{{ route('user.invest.log') }}"><i data-feather="chevrons-right"></i> {{ __('Invest Log') }}</a>
          </li>
        </ul> 
      </li>

      <li class="has_submenu {{arrayMenu(['user.deposit','user.deposit.log'])}}">
        <a href="#0"><i data-feather="briefcase"></i> {{ __('Deposit') }}</a>
        <ul class="submenu">
          <li class="{{singleMenu('user.deposit')}}">
            <a href="{{ route('user.deposit') }}"><i data-feather="chevrons-right"></i> {{ __('Deposit') }}</a>
          </li>
          <li class="{{singleMenu('user.deposit.log')}}">
            <a href="{{ route('user.deposit.log') }}"><i data-feather="chevrons-right"></i> {{ __('Deposit Log') }}</a>
          </li>
        </ul>
      </li>

      <li class="has_submenu {{arrayMenu(['user.withdraw','user.withdraw.*'])}}">
        <a href="#0"><i data-feather="credit-card"></i> {{ __('Withdraw') }}</a>
        <ul class="submenu">
          <li class="{{singleMenu('user.withdraw')}}">
            <a href="{{ route('user.withdraw') }}"><i data-feather="chevrons-right"></i> {{ __('Withdraw') }}</a>
          </li>
          <li class="{{singleMenu('user.withdraw.*')}}">
            <a href="{{ route('user.withdraw.all') }}"><i data-feather="chevrons-right"></i> {{ __('Withdraw Log') }}</a>
          </li>
        </ul>
      </li>

      <li class="{{singleMenu('user.transfer_money')}}">
        <a href="{{ route('user.transfer_money') }}"><i data-feather="repeat"></i> {{ __('Transfer Money') }}</a>
      </li>

       <li class="{{activeMenu(route('user.money.log'))}}">
            <a href="{{ route('user.money.log') }}">
            <i data-feather="file-text"></i>
                {{ __('Money Transfer Log') }}
            </a>
        </li>


      <li class="{{singleMenu('user.interest.log')}}">
        <a href="{{ route('user.interest.log') }}"><i data-feather="file-text"></i> {{ __('Interest Log') }}</a>
      </li>
      <li class="{{singleMenu('user.transaction.log')}}">
        <a href="{{ route('user.transaction.log') }}"><i data-feather="file-text"></i> {{ __('Transaction Log') }}</a>
      </li>
      <li class="{{singleMenu('user.commision')}}">
        <a href="{{ route('user.commision') }}"><i data-feather="file-text"></i> {{ __('Refferal Log') }}</a>
      </li>
      
      <li class="{{singleMenu('user.2fa')}}">
        <a href="{{ route('user.2fa') }}"><i data-feather="shield"></i> {{ __('2FA') }}</a>
      </li>
      <li class="{{singleMenu('user.ticket.index')}}">
        <a href="{{ route('user.ticket.index') }}"><i data-feather="life-buoy"></i> {{ __('Support') }}</a>
      </li>
      <li>
        <a href="{{ route('user.logout') }}"><i data-feather="log-out"></i> {{ __('Logout') }}</a>
      </li>
    </ul>
    <div class="d-plan-notice mt-4 mx-3">
        <p class="mb-0">{{ __('Your Current Plan') }}
            -{{ isset($currentPlan->plan->plan_name) ? $currentPlan->plan->plan_name : 'N/A' }}</p>
        <a href="{{ route('user.investmentplan') }}">{{ __('Update Plan') }} <i class="fas fa-arrow-up"></i></a>
    </div>
</div>


<!-- mobile bottom menu start -->
<div class="mobile-bottom-menu-wrapper">
  <ul class="mobile-bottom-menu">
    <li>
      <a href="{{ route('user.deposit') }}" class="{{ activeMenu(route('user.deposit')) }}">
        <i class="fas fa-chart-line"></i>
        <span>{{ __('Trading') }}</span>
      </a>
    </li>
    <li>
      <a href="{{ route('user.investmentplan') }}" class="{{ activeMenu(route('user.investmentplan')) }}">
        <i class="fas fa-sort-amount-up"></i>
        <span>{{ __('Invest') }}</span>
      </a>
    </li>
    <li>
      <a href="{{ route('user.dashboard') }}" class="{{ activeMenu(route('user.dashboard')) }}">
        <i class="fas fa-wallet"></i>
        <span>{{ __('Wallet') }}</span>
      </a>
    </li>
    <li>
      <a href="{{ route('user.withdraw') }}" class="{{ activeMenu(route('user.withdraw')) }}">
        <i class="bi bi-cash-coin"></i>
        <span>{{ __('Withdraw') }}</span>
      </a>
    </li>
    <li>
      <a href="{{ route('user.ticket.index') }}" class="{{ activeMenu(route('user.ticket.index')) }}">
        <i class="fas fa-headset"></i>
        <span>{{ __('Support') }}</span>
      </a>
    </li>
  </ul>
</div>
<!-- mobile bottom menu end -->