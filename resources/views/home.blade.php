@extends('layouts.app')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-start mb-3">
                <h4 class="breadcrumb-wrapper">
                    Panel de control
                </h4>
            </div>
            <div class="col-sm-6 col-lg-4 mb-4">
                <div class="card card-border-shadow-success h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-success"><i class="bx bx-check"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">
                                {{ $approved }}
                            </h4>
                        </div>
                        <p class="mb-1">Consignas aprobadas</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 mb-4">
                <div class="card card-border-shadow-warning h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-warning"><i class="bx bx-file"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $pendings }}</h4>
                        </div>
                        <p class="mb-1">Consignas sin archivos</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 mb-4">
                <div class="card card-border-shadow-danger h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-danger"><i class="bx bx-error-circle"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $cancels }}</h4>
                        </div>
                        <p class="mb-1">Consignas canceladas</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mx-auto mb-3">
                            <img src="{{ Auth::user()->avatar }}" alt="Avatar Image" class="rounded-circle object-fit-cover" width="100px" height="100px">
                        </div>
                        <h5 class="mb-1 card-title">
                            {{ Auth::user()->name }}
                        </h5>
                        <span>
                            {{ Auth::user()->roles->first()->name }}
                        </span>
                        <div class="d-flex align-items-center justify-content-center my-3 gap-2">
                            <span class="badge bg-label-success">Bienvenido de vuelta</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{ route('duties.index') }}" class="btn btn-primary d-flex align-items-center">
                                <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                                Ir a consignas
                            </a>
                        </div>
                    </div>
                </div>
              </div>
            <div class="col-md-8 col-12">
                <div class="card">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">Gráfica de consignas</h5>
                  </div>
                  <div class="card-body">
                    <div id="duties"></div>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script>
        (function () {

            const totalDuties = @json($totalDuties);
            const incidents = @json($incidents);

            let cardColor, headingColor, labelColor, borderColor, legendColor, radialTrackColor;
        
            if (isDarkStyle) {
                cardColor = config.colors_dark.cardColor;
                headingColor = config.colors_dark.headingColor;
                labelColor = config.colors_dark.textMuted;
                legendColor = config.colors_dark.bodyColor;
                borderColor = config.colors_dark.borderColor;
                radialTrackColor = '#36435C';
            } else {
                cardColor = config.colors.cardColor;
                headingColor = config.colors.headingColor;
                labelColor = config.colors.textMuted;
                legendColor = config.colors.bodyColor;
                borderColor = config.colors.borderColor;
                radialTrackColor = config.colors_label.secondary;
            }
        
            // Color constant
            const chartColors = {
                column: {
                    series1: '#826af9',
                    series2: '#d2b0ff',
                    bg: '#f8d3ff'
                },
                donut: {
                    series1: '#ff5b5c',
                    series2: '#39da8a',
                    series3: '#826bf8',
                    series4: '#2b9bf4'
                },
                area: {
                    series1: '#29dac7',
                    series2: '#60f2ca',
                    series3: '#a5f8cd'
                }
            };
        
            const radialBarChartEl = document.querySelector('#duties'),
            radialBarChartConfig = {
                chart: {
                    height: 380,
                    fontFamily: 'IBM Plex Sans',
                    type: 'radialBar'
                },
                colors: [chartColors.donut.series1, chartColors.donut.series2, chartColors.donut.series4],
                plotOptions: {
                    radialBar: {
                        size: 185,
                        hollow: {
                            size: '40%'
                        },
                        track: {
                            margin: 10,
                            background: radialTrackColor
                        },
                        dataLabels: {
                            name: {
                                fontSize: '2rem',
                                fontFamily: 'IBM Plex Sans'
                            },
                            value: {
                                fontSize: '1.2rem',
                                color: legendColor,
                                fontFamily: 'IBM Plex Sans',
                                formatter: function (val) {
                                    return parseInt(val);
                                }
                            },
                            total: {
                                show: true,
                                fontSize: '1.3rem',
                                color: headingColor,
                                label: 'Resultados',
                                formatter: function (val) {
                                    return val[0];
                                }
                            }
                        }
                    }
                },
                grid: {
                    borderColor: borderColor,
                    padding: {
                        top: -25,
                        bottom: -20
                    }
                },
                legend: {
                    show: true,
                    position: 'bottom',
                    labels: {
                        colors: legendColor,
                        useSeriesColors: false
                    }
                },
                stroke: {
                    lineCap: 'round'
                },
                series: [incidents, totalDuties],
                labels: ['Incidencias', 'Consignas']
            };
            if (typeof radialBarChartEl !== undefined && radialBarChartEl !== null) {
                const radialChart = new ApexCharts(radialBarChartEl, radialBarChartConfig);
                radialChart.render();
            }
        })();
    </script>    
@endsection
