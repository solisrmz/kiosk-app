@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@switch(Auth()->user()->role)
    @case('admin')
        @php( $dashboard_url = 'admin' )
        @break
    @case('docente')
        @php( $dashboard_url = 'docente' )
        @break
    @case('asesor')
        @php( $dashboard_url = 'asesor' )
        @break
    @case('director')
        @php( $dashboard_url = 'direccion-academica' )
        @break
    @case('consulta')
        @php( $dashboard_url = 'consulta' )
        @break
@endswitch

<a href="{{ $dashboard_url }}"
    @if($layoutHelper->isLayoutTopnavEnabled())
        class="navbar-brand {{ config('adminlte.classes_brand') }}"
    @else
        class="brand-link {{ config('adminlte.classes_brand') }}"
    @endif>

    {{-- Small brand logo --}}
    <img src="{{ asset(config('adminlte.logo_img', 'vendor/adminlte/dist/img/AdminLTELogo.png')) }}"
         alt="{{ config('adminlte.logo_img_alt', 'AdminLTE') }}"
         class="{{ config('adminlte.logo_img_class', 'brand-image img-circle elevation-3') }}"
         style="opacity:.8">

    {{-- Brand text --}}
    <span class="brand-text font-weight-light {{ config('adminlte.classes_brand_text') }}">
        {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
    </span>

</a>
