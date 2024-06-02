@extends('layout.app')

@section('title', 'Dashboard')

@section('header')
    @include('layout.header')
@endsection

@section('lateral')
    @include('layout.lateral')
@endsection

@section('content')
<div class="container-xl px-4 mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="me-4 mb-3 mb-sm-0">
                <h1 class="mb-0">{{ $getRecord->first()->subsidiaries_name }}</h1>
                <div class="small">
                    <span class="fw-500 text-primary">{{ $diaDaSemanaPorExtenso }}</span>
                    &middot; {{ $dataPorExtenso }} &middot; {{ $hora }}

                </div>
            </div>
            <!-- Date range picker example-->
            <div class="input-group input-group-joined border-0 shadow" style="width: 16.5rem">
                <span class="input-group-text"><i data-feather="calendar"></i></span>
                <input class="form-control ps-0 pointer" id="litepickerRangePlugin" placeholder="Select date range..." />
            </div>
        </div>


        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <!-- Dashboard info widget 1-->
                <div class="card border-start-lg border-start-success h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small fw-bold text-success mb-1">Entradas (mensais)</div>
                                <div class="h5">R$ {{ number_format($valorEndrada, 2, ',', '.') }}</div>
                                <div class="text-xs fw-bold text-success d-inline-flex align-items-center">
                                    <i class="me-1" data-feather="trending-up"></i>
                                    12%
                                </div>
                            </div>
                            <div class="ms-2"><i class="fas fa-dollar-sign fa-2x text-gray-200"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <!-- Dashboard info widget 2-->
                <div class="card border-start-lg border-start-danger h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small fw-bold text-danger mb-1">Saídas (mensais)</div>
                                <div class="h5">R$ {{ number_format($valorSaida, 2, ',', '.') }}</div>
                                <div class="text-xs fw-bold text-danger d-inline-flex align-items-center">
                                    <i class="me-1" data-feather="trending-down"></i>
                                    3%
                                </div>
                            </div>
                            <div class="ms-2"><i class="fas fa-tag fa-2x text-gray-200"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <!-- Dashboard info widget 3-->
                <div class="card border-start-lg border-start-warning h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small fw-bold text-warning mb-1">Conta Bancária</div>
                                <div class="h5">R$ 11,291</div>
                                <div class="text-xs fw-bold text-warning d-inline-flex align-items-center">
                                    <i class="me-1" data-feather="trending-up"></i>
                                    12%
                                </div>
                            </div>
                            <div class="ms-2"><i class="fas fa-mouse-pointer fa-2x text-gray-200"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <!-- Dashboard info widget 4-->
                <div class="card border-start-lg border-start-info h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small fw-bold text-info mb-1">Conta Poupança</div>
                                <div class="h5">R$ 1,23</div>
                                <div class="text-xs fw-bold text-danger d-inline-flex align-items-center">
                                    <i class="me-1" data-feather="trending-down"></i>
                                    1%
                                </div>
                            </div>
                            <div class="ms-2"><i class="fas fa-percentage fa-2x text-gray-200"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 mb-4">
                <!-- Dashboard example card 1-->
                <a class="card lift h-100" href="{{ route('user.caixa.index') }}">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    class="feather feather-package feather-xl text-primary mb-3"
                                    viewBox="-0.835 -0.835 40 40" id="Receipt-Register-Print-1--Streamline-Ultimate"
                                    height="40" width="40">
                                    <desc>Receipt Register Print 1 Streamline Icon: https://streamlinehq.com</desc>
                                    <path fill="#78eb7b"
                                        d="M29.546041666666667 0.7985416666666667h-7.9854166666666675c-0.882069125 0 -1.5970833333333334 0.7150381645833334 -1.5970833333333334 1.5970833333333334v1.5970833333333334c0 0.8820371833333334 0.7150142083333334 1.5970833333333334 1.5970833333333334 1.5970833333333334h7.9854166666666675c0.882069125 0 1.5970833333333334 -0.71504615 1.5970833333333334 -1.5970833333333334v-1.5970833333333334c0 -0.88204516875 -0.7150142083333334 -1.5970833333333334 -1.5970833333333334 -1.5970833333333334Z"
                                        stroke-width="1.67"></path>
                                    <path fill="#c9f7ca"
                                        d="M21.560625 0.7985416666666667c-0.4235465 0 -0.8298445 0.16826390875000002 -1.129297625 0.46777452875000003C20.13187425 1.5658284125000002 19.963541666666668 1.9720465583333333 19.963541666666668 2.395625v1.5970833333333334c0 0.4235784416666667 0.16833258333333334 0.8297965875 0.4677857083333333 1.1293135958333334 0.299453125 0.2995010375 0.705751125 0.4677697375 1.129297625 0.4677697375h1.7120733333333336l4.79125 -4.79125H21.560625Z"
                                        stroke-width="1.67"></path>
                                    <path fill="#e3e3e3"
                                        d="M8.783958333333334 13.575208333333334h-1.2632929166666669c-0.3309635791666667 0.0003194166666666667 -0.6536542666666667 0.10345905833333334 -0.9234495541666667 0.29515697083333337 -0.2697952875 0.1916819416666667 -0.4733755 0.46246742083333336 -0.5826000291666668 0.7748888625000001L0.7985416666666667 29.546041666666667h36.73291666666667l-5.043589166666667 -15.970833333333335H8.783958333333334Z"
                                        stroke-width="1.67"></path>
                                    <path fill="#ffffff"
                                        d="M32.48786916666667 13.575208333333334H7.520665416666667c-0.3309635791666667 0.0003194166666666667 -0.6536542666666667 0.10345905833333334 -0.9234495541666667 0.29515697083333337 -0.2697952875 0.1916819416666667 -0.4733755 0.46246742083333336 -0.5826000291666668 0.7748888625000001L0.7985416666666667 29.546041666666667l31.6893275 -15.970833333333335Z"
                                        stroke-width="1.67"></path>
                                    <path fill="#b2b2b2"
                                        d="M37.53145833333333 29.546041666666667H0.7985416666666667v6.388333333333334c0 0.4235465 0.16826390875000002 0.8298445 0.46777452875000003 1.129297625 0.29951221708333337 0.299453125 0.7057303629166667 0.4677857083333333 1.1293088045833335 0.4677857083333333h33.53875c0.4235465 0 0.8298445 -0.16833258333333334 1.129297625 -0.4677857083333333s0.4677857083333333 -0.705751125 0.4677857083333333 -1.129297625v-6.388333333333334Z"
                                        stroke-width="1.67"></path>
                                    <path fill="#808080"
                                        d="M35.934375 34.337291666666665h-33.53875c-0.4235784416666667 0 -0.8297965875 -0.16833258333333334 -1.1293088045833335 -0.4677857083333333C0.9668055754166668 33.570052833333335 0.7985416666666667 33.163754833333336 0.7985416666666667 32.740208333333335v3.194166666666667c0 0.4235465 0.16826390875000002 0.8298445 0.46777452875000003 1.129297625 0.29951221708333337 0.299453125 0.7057303629166667 0.4677857083333333 1.1293088045833335 0.4677857083333333h33.53875c0.4235465 0 0.8298445 -0.16833258333333334 1.129297625 -0.4677857083333333s0.4677857083333333 -0.705751125 0.4677857083333333 -1.129297625v-3.194166666666667c0 0.4235465 -0.16833258333333334 0.8298445 -0.4677857083333333 1.129297625s-0.705751125 0.4677857083333333 -1.129297625 0.4677857083333333Z"
                                        stroke-width="1.67"></path>
                                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M37.53145833333333 29.546041666666667H0.7985416666666667v6.388333333333334c0 0.4235465 0.16826390875000002 0.8298445 0.46777452875000003 1.129297625 0.29951221708333337 0.299453125 0.7057303629166667 0.4677857083333333 1.1293088045833335 0.4677857083333333h33.53875c0.4235465 0 0.8298445 -0.16833258333333334 1.129297625 -0.4677857083333333s0.4677857083333333 -0.705751125 0.4677857083333333 -1.129297625v-6.388333333333334Z"
                                        stroke-width="1.67"></path>
                                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.783958333333334 13.575208333333334h-1.2632929166666669c-0.3309635791666667 0.0003194166666666667 -0.6536542666666667 0.10345905833333334 -0.9234495541666667 0.29515697083333337 -0.2697952875 0.1916819416666667 -0.4733755 0.46246742083333336 -0.5826000291666668 0.7748888625000001L0.7985416666666667 29.546041666666667h36.73291666666667l-2.9306479166666666 -9.28065125"
                                        stroke-width="1.67"></path>
                                    <path fill="#ffffff" stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.575208333333334 16.769375h-4.79125v-7.9854166666666675l2.395625 1.5970833333333334 2.395625 -1.5970833333333334v7.9854166666666675Z"
                                        stroke-width="1.67"></path>
                                    <path fill="#e3e3e3" stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M32.740208333333335 16.769375h-14.373750000000001v-4.79125c0 -0.4235784416666667 0.16833258333333334 -0.8297965875 0.4677857083333333 -1.1293135958333334 0.299453125 -0.2995010375 0.705751125 -0.4677697375 1.129297625 -0.4677697375h11.179583333333333c0.4235465 0 0.8298445 0.1682687 1.129297625 0.4677697375 0.299453125 0.2995170083333334 0.4677857083333333 0.7057351541666667 0.4677857083333333 1.1293135958333334v4.79125Z"
                                        stroke-width="1.67"></path>
                                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M29.546041666666667 0.7985416666666667h-7.9854166666666675c-0.882069125 0 -1.5970833333333334 0.7150381645833334 -1.5970833333333334 1.5970833333333334v1.5970833333333334c0 0.8820371833333334 0.7150142083333334 1.5970833333333334 1.5970833333333334 1.5970833333333334h7.9854166666666675c0.882069125 0 1.5970833333333334 -0.71504615 1.5970833333333334 -1.5970833333333334v-1.5970833333333334c0 -0.88204516875 -0.7150142083333334 -1.5970833333333334 -1.5970833333333334 -1.5970833333333334Z"
                                        stroke-width="1.67"></path>
                                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.575208333333334 13.575208333333334h4.79125" stroke-width="1.67"></path>
                                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M7.9854166666666675 16.769375h6.388333333333334" stroke-width="1.67"></path>
                                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M25.553333333333335 5.589791666666667v4.79125" stroke-width="1.67"></path>
                                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.970833333333335 34.337291666666665h6.388333333333334" stroke-width="1.67">
                                    </path>
                                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M7.186875000000001 24.75479166666667h1.5970833333333334" stroke-width="1.67">
                                    </path>
                                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.978125 24.75479166666667h1.5970833333333334" stroke-width="1.67"></path>
                                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.769375 24.75479166666667h1.5970833333333334" stroke-width="1.67"></path>
                                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.978125 21.560625h1.5970833333333334" stroke-width="1.67"></path>
                                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.769375 21.560625h1.5970833333333334" stroke-width="1.67"></path>
                                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M23.95625 24.75479166666667h1.5970833333333334" stroke-width="1.67"></path>
                                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M23.95625 21.560625h1.5970833333333334" stroke-width="1.67"></path>
                                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M28.747500000000002 24.75479166666667h1.5970833333333334" stroke-width="1.67">
                                    </path>
                                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M28.747500000000002 21.560625h1.5970833333333334" stroke-width="1.67"></path>
                                </svg>
                                <h5>Movimentação de Caixa</h5>
                                <div class="text-muted small">Entradas e saídas do caixa da fraternidade</div>
                            </div>
                            <img src="/assets/img/illustrations/browser-stats.svg" alt="..." style="width: 8rem">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 mb-4">
                <!-- Dashboard example card 3-->
                <a class="card lift h-100" href="{{route('user.banco.index')}}">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-0.835 -0.835 40 40"
                                    class="feather feather-package feather-xl text-primary mb-3"
                                    id="Official-Building-3--Streamline-Ultimate" height="40" width="40">
                                    <desc>Official Building 3 Streamline Icon: https://streamlinehq.com</desc>
                                    <path fill="#b2b2b2"
                                        d="m2.395625 37.47076916666667 1.4150158333333334 -4.251435833333334c0.0529433125 -0.1589097916666667 0.15453378333333334 -0.2972172083333333 0.2903816916666667 -0.39527812500000004 0.13586387916666667 -0.09790120833333334 0.29910176666666666 -0.15076466666666666 0.46663580833333335 -0.150924375h29.194683333333337c0.16753404166666666 0.00015970833333333334 0.3307559583333334 0.05302316666666667 0.46666775000000005 0.150924375 0.13575208333333336 0.09806091666666668 0.23748629166666668 0.23636833333333332 0.29034975 0.39527812500000004l1.4150158333333334 4.2450475"
                                        stroke-width="1.67"></path>
                                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="m2.395625 37.47076916666667 1.4150158333333334 -4.251435833333334c0.0529433125 -0.1589097916666667 0.15453378333333334 -0.2972172083333333 0.2903816916666667 -0.39527812500000004 0.13586387916666667 -0.09790120833333334 0.29910176666666666 -0.15076466666666666 0.46663580833333335 -0.150924375h29.194683333333337c0.16753404166666666 0.00015970833333333334 0.3307559583333334 0.05302316666666667 0.46666775000000005 0.150924375 0.13575208333333336 0.09806091666666668 0.23748629166666668 0.23636833333333332 0.29034975 0.39527812500000004l1.4150158333333334 4.2450475"
                                        stroke-width="1.67"></path>
                                    <path fill="#b2b2b2"
                                        d="M32.740208333333335 15.111618470833333h-4.788055833333334V32.679519166666665H32.740208333333335V15.111618470833333Z"
                                        stroke-width="1.67"></path>
                                    <path fill="#b2b2b2"
                                        d="M21.560625 15.111618470833333h-4.79125V32.679519166666665h4.79125V15.111618470833333Z"
                                        stroke-width="1.67"></path>
                                    <path fill="#b2b2b2"
                                        d="M10.384235833333333 15.111618470833333H5.589791666666667V32.679519166666665h4.794444166666667V15.111618470833333Z"
                                        stroke-width="1.67"></path>
                                    <path fill="#808080"
                                        d="M32.740208333333335 15.111618470833333h-4.788055833333334V19.963541666666668H32.740208333333335V15.111618470833333Z"
                                        stroke-width="1.67"></path>
                                    <path fill="#808080"
                                        d="M21.560625 15.111618470833333h-4.79125V19.963541666666668h4.79125V15.111618470833333Z"
                                        stroke-width="1.67"></path>
                                    <path fill="#808080"
                                        d="M10.384235833333333 15.111618470833333H5.589791666666667V19.963541666666668h4.794444166666667V15.111618470833333Z"
                                        stroke-width="1.67"></path>
                                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M32.740208333333335 15.111618470833333h-4.788055833333334V32.679519166666665H32.740208333333335V15.111618470833333Z"
                                        stroke-width="1.67"></path>
                                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.560625 15.111618470833333h-4.79125V32.679519166666665h4.79125V15.111618470833333Z"
                                        stroke-width="1.67"></path>
                                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.384235833333333 15.111618470833333H5.589791666666667V32.679519166666665h4.794444166666667V15.111618470833333Z"
                                        stroke-width="1.67"></path>
                                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M37.53145833333333 37.47076916666667H0.7985416666666667" stroke-width="1.67">
                                    </path>
                                    <path fill="#e3e3e3" stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="m35.72675416666667 10.9400048625 -1.2137833333333334 3.625379166666667c-0.053182875000000004 0.15732867916666668 -0.15395883333333335 0.29416677916666667 -0.28859295833333337 0.3914930375 -0.13447441666666668 0.09732625833333335 -0.2959395416666667 0.1502855416666667 -0.46203620833333336 0.15151529583333334H4.567658333333333c-0.16604875416666667 -0.0012297541666666666 -0.3275777625 -0.0541890375 -0.46211606250000004 -0.15151529583333334 -0.13452232916666668 -0.09732625833333335 -0.2353781416666667 -0.23416435833333335 -0.2885131041666667 -0.3914930375l-1.2137833333333334 -3.625379166666667c-0.0359822875 -0.10139882083333335 -0.05032409583333334 -0.2092179166666667 -0.042067175 -0.316509975 0.008256920833333334 -0.10727608749999999 0.03890495 -0.21164548333333333 0.08997967500000001 -0.306352525h33.027683333333336c0.05110666666666667 0.09470704166666667 0.08177066666666667 0.1990764375 0.08991579166666668 0.306352525 0.008304833333333334 0.10729205833333334 -0.006068916666666667 0.21511115416666668 -0.04200329166666667 0.316509975v0Z"
                                        stroke-width="1.67"></path>
                                    <path fill="#ffffff" stroke="#191919" stroke-linecap="round" stroke-linejoin="round"
                                        d="M35.67884166666667 10.3171423625H2.6511583333333335c0.07206040000000001 -0.13608747083333333 0.18334516666666667 -0.2473722375 0.3194166666666667 -0.3194166666666667L18.765729166666667 0.958230835c0.12361425 -0.06296820458333333 0.26048429166666665 -0.09579146125 0.39927083333333335 -0.09579146125s0.27565658333333337 0.03282325666666667 0.39927083333333335 0.09579146125l15.795154166666668 9.039494860833335c0.1360715 0.07204442916666666 0.24738820833333336 0.18332919583333335 0.3194166666666667 0.3194166666666667v0Z"
                                        stroke-width="1.67"></path>
                                </svg>
                                <h5>Movimentação Bancária</h5>
                                <div class="text-muted small">Entradas e saídas da conta bancária</div>
                            </div>
                            <img src="/assets/img/illustrations/windows.svg" alt="..." style="width: 8rem">
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 mb-4">
                <!-- Dashboard example card 2-->
                <a class="card lift h-100" href="#!">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-book feather-xl text-secondary mb-3">
                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                </svg>
                                <h5>Documentation</h5>
                                <div class="text-muted small">To keep you on track when working with our toolkit</div>
                            </div>
                            <img src="/assets/img/illustrations/processing.svg" alt="..." style="width: 8rem">
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-12">
                <!-- Tabbed dashboard card example-->
                <div class="card mb-4">
                    <div class="card-header border-bottom">
                        <!-- Dashboard card navigation-->
                        <ul class="nav nav-tabs card-header-tabs" id="dashboardNav" role="tablist">
                            <li class="nav-item me-1"><a class="nav-link active" id="overview-pill" href="#overview"
                                    data-bs-toggle="tab" role="tab" aria-controls="overview"
                                    aria-selected="true">Overview</a></li>
                            <li class="nav-item"><a class="nav-link" id="activities-pill" href="#activities"
                                    data-bs-toggle="tab" role="tab" aria-controls="activities"
                                    aria-selected="false">Activities</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="dashboardNavContent">
                            <!-- Dashboard Tab Pane 1-->
                            <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                aria-labelledby="overview-pill">
                                <div class="chart-area mb-4 mb-lg-0" style="height: 20rem"><canvas id="myAreaChart"
                                        width="100%" height="30"></canvas></div>
                            </div>
                            <!-- Dashboard Tab Pane 2-->
                            <div class="tab-pane fade" id="activities" role="tabpanel"
                                aria-labelledby="activities-pill">
                                <table id="datatablesSimple" class="display nowrap">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Event</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Date</th>
                                            <th>Event</th>
                                            <th>Time</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>01/13/20</td>
                                            <td>
                                                <i class="me-2 text-green" data-feather="zap"></i>
                                                Server online
                                            </td>
                                            <td>1:21 AM</td>
                                        </tr>
                                        <tr>
                                            <td>01/13/20</td>
                                            <td>
                                                <i class="me-2 text-red" data-feather="zap-off"></i>
                                                Server restarted
                                            </td>
                                            <td>1:00 AM</td>
                                        </tr>
                                        <tr>
                                            <td>01/12/20</td>
                                            <td>
                                                <i class="me-2 text-purple" data-feather="shopping-cart"></i>
                                                New order placed! Order #
                                                <a href="#!">1126550</a>
                                            </td>
                                            <td>5:45 AM</td>
                                        </tr>
                                        <tr>
                                            <td>01/12/20</td>
                                            <td>
                                                <i class="me-2 text-blue" data-feather="user"></i>
                                                Valerie Luna submitted
                                                <a href="#!">quarter four report</a>
                                            </td>
                                            <td>4:23 PM</td>
                                        </tr>
                                        <tr>
                                            <td>01/12/20</td>
                                            <td>
                                                <i class="me-2 text-yellow" data-feather="database"></i>
                                                Database backup created
                                            </td>
                                            <td>3:51 AM</td>
                                        </tr>
                                        <tr>
                                            <td>01/12/20</td>
                                            <td>
                                                <i class="me-2 text-purple" data-feather="shopping-cart"></i>
                                                New order placed! Order #
                                                <a href="#!">1126549</a>
                                            </td>
                                            <td>1:22 AM</td>
                                        </tr>
                                        <tr>
                                            <td>01/11/20</td>
                                            <td>
                                                <i class="me-2 text-blue" data-feather="user-plus"></i>
                                                New user created:
                                                <a href="#!">Sam Malone</a>
                                            </td>
                                            <td>4:18 PM</td>
                                        </tr>
                                        <tr>
                                            <td>01/11/20</td>
                                            <td>
                                                <i class="me-2 text-purple" data-feather="shopping-cart"></i>
                                                New order placed! Order #
                                                <a href="#!">1126548</a>
                                            </td>
                                            <td>4:02 PM</td>
                                        </tr>
                                        <tr>
                                            <td>01/11/20</td>
                                            <td>
                                                <i class="me-2 text-purple" data-feather="shopping-cart"></i>
                                                New order placed! Order #
                                                <a href="#!">1126547</a>
                                            </td>
                                            <td>3:47 PM</td>
                                        </tr>
                                        <tr>
                                            <td>01/11/20</td>
                                            <td>
                                                <i class="me-2 text-green" data-feather="zap"></i>
                                                Server online
                                            </td>
                                            <td>1:19 AM</td>
                                        </tr>
                                        <tr>
                                            <td>01/11/20</td>
                                            <td>
                                                <i class="me-2 text-red" data-feather="zap-off"></i>
                                                Server restarted
                                            </td>
                                            <td>1:00 AM</td>
                                        </tr>
                                        <tr>
                                            <td>01/10/20</td>
                                            <td>
                                                <i class="me-2 text-purple" data-feather="shopping-cart"></i>
                                                New order placed! Order #
                                                <a href="#!">1126547</a>
                                            </td>
                                            <td>5:31 PM</td>
                                        </tr>
                                        <tr>
                                            <td>01/10/20</td>
                                            <td>
                                                <i class="me-2 text-purple" data-feather="shopping-cart"></i>
                                                New order placed! Order #
                                                <a href="#!">1126546</a>
                                            </td>
                                            <td>12:13 PM</td>
                                        </tr>
                                        <tr>
                                            <td>01/10/20</td>
                                            <td>
                                                <i class="me-2 text-blue" data-feather="user"></i>
                                                Diane Chambers submitted
                                                <a href="#!">quarter four report</a>
                                            </td>
                                            <td>10:56 AM</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
    @section('footer')
        @include('layout.footer')
    @endsection
@endsection
