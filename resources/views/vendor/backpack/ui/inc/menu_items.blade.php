{{-- This file is used for menu items by any Backpack v6 theme --}}
{{--<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>--}}

<x-backpack::menu-item title="Users" icon="la la-user" :link="backpack_url('user')" />
<x-backpack::menu-item title="Polls" icon="la la-poll" :link="backpack_url('poll')" />
<x-backpack::menu-item title="Orders" icon="la la-boxes" :link="backpack_url('order')" />
<x-backpack::menu-item title="News" icon="la la-newspaper" :link="backpack_url('news')" />
<x-backpack::menu-item title="Messages" icon="la la-envelope" :link="backpack_url('message')" />
