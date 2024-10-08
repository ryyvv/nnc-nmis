@extends('layouts.app', [
'namePage' => 'NMIS',
'backgroundImage' => asset('assets') . "/img/background1.png",
])

@section('content')
{{-- <div class="panel-header panel-header-lg">
    <canvas id="bigDashboardChart"></canvas>
  </div> --}}
<div class="content">
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">National Nutrition Council</h5>
                    <h4 class="card-title">Sample graph</h4>
                    <div class="dropdown">
                        <button type="button"
                            class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret"
                            data-toggle="dropdown">
                            <i class="now-ui-icons loader_gear"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <a class="dropdown-item text-danger" href="#">Remove Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="lineChartExample"></canvas>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">National Nutrition Council</h5>
                    <h4 class="card-title">Sample graph</h4>
                    <div class="dropdown">
                        <button type="button"
                            class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret"
                            data-toggle="dropdown">
                            <i class="now-ui-icons loader_gear"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <a class="dropdown-item text-danger" href="#">Remove Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">National Nutrition Council</h5>
                    <h4 class="card-title">Budget Allocation</h4>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="barChartSimpleGradientsNumbers"></canvas>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="now-ui-icons ui-2_time-alarm"></i> ...
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card  card-tasks">
                <div class="card-header ">
                    <h5 class="card-category">Backend development</h5>
                    <h4 class="card-title">Sample list</h4>
                </div>
                <div class="card-body ">
                    <div class="table-full-width table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" checked>
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="text-left">Sign contract for "What are conference organizers afraid of?"
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title=""
                                            class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral"
                                            data-original-title="Edit Task">
                                            <i class="now-ui-icons ui-2_settings-90"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title=""
                                            class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral"
                                            data-original-title="Remove">
                                            <i class="now-ui-icons ui-1_simple-remove"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox">
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="text-left">Lines From Great Russian Literature? Or E-mails From My Boss?
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title=""
                                            class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral"
                                            data-original-title="Edit Task">
                                            <i class="now-ui-icons ui-2_settings-90"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title=""
                                            class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral"
                                            data-original-title="Remove">
                                            <i class="now-ui-icons ui-1_simple-remove"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" checked>
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="text-left">Flooded: One year later, assessing what was lost and what was
                                        found when a ravaging rain swept through metro Detroit
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title=""
                                            class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral"
                                            data-original-title="Edit Task">
                                            <i class="now-ui-icons ui-2_settings-90"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title=""
                                            class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral"
                                            data-original-title="Remove">
                                            <i class="now-ui-icons ui-1_simple-remove"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-category">All Persons List</h5>
                    <h4 class="card-title"> Sample list</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    Name
                                </th>
                                <th>
                                    Country
                                </th>
                                <th>
                                    City
                                </th>
                                <th class="text-right">
                                    Salary
                                </th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Dakota Rice
                                    </td>
                                    <td>
                                        Niger
                                    </td>
                                    <td>
                                        Oud-Turnhout
                                    </td>
                                    <td class="text-right">
                                        $36,738
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Minerva Hooper
                                    </td>
                                    <td>
                                        Curaçao
                                    </td>
                                    <td>
                                        Sinaai-Waas
                                    </td>
                                    <td class="text-right">
                                        $23,789
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Sage Rodriguez
                                    </td>
                                    <td>
                                        Netherlands
                                    </td>
                                    <td>
                                        Baileux
                                    </td>
                                    <td class="text-right">
                                        $56,142
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Doris Greene
                                    </td>
                                    <td>
                                        Malawi
                                    </td>
                                    <td>
                                        Feldkirchen in Kärnten
                                    </td>
                                    <td class="text-right">
                                        $63,542
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Mason Porter
                                    </td>
                                    <td>
                                        Chile
                                    </td>
                                    <td>
                                        Gloucester
                                    </td>
                                    <td class="text-right">
                                        $78,615
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">LNC Checklist</h5>
                    <h4 class="card-title">LNC Functionality</h4>
                </div>
                <div class="card-body">
                    <div>
                        <canvas id="lnc-functionality-chart"></canvas>
                    </div>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">LNC Checklist</h5>
                    <h4 class="card-title">LNC Functionality, per geographical level</h4>
                </div>
                <div class="card-body">
                    <div>
                        <canvas id="lnc-functionality-geographic-chart"></canvas>
                    </div>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">LNC Checklist</h5>
                    <h4 class="card-title">Provinces Indicator</h4>
                </div>
                <div class="card-body">
                    <canvas id="lnc-indicator-province-chart"></canvas>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">LNC Checklist</h5>
                    <h4 class="card-title">HUCs and ICCS Indicator</h4>
                </div>
                <div class="card-body">
                    <canvas id="lnc-indicator-huc&icc-chart"></canvas>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">LNC Checklist</h5>
                    <h4 class="card-title">Cities Indicator</h4>
                </div>
                <div class="card-body">
                    <canvas id="lnc-indicator-city-chart"></canvas>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">LNC Checklist</h5>
                    <h4 class="card-title">Municipalities Indicator</h4>
                </div>
                <div class="card-body">
                    <canvas id="lnc-indicator-mun-chart"></canvas>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">LNC Checklist</h5>
                    <h4 class="card-title">Submission Status</h4>
                </div>
                <div class="card-body">
                    <canvas id="lnc-submission-chart"></canvas>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @section('content')

<div class="panel-header panel-header-sm">
</div>

@endsection --}}

@push('js')


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const createDoughnutChart = (ctxId, data, labels, centerText) => {
    const ctx = document.getElementById(ctxId).getContext('2d');
    const chartData = {
        datasets: [{
            data: data,
            backgroundColor: ['#55AD89', '#A9B5AE'],
            borderColor: '#FFFFFF',
            borderWidth: 2,
        }],
        labels: labels,
    };

    const options = {
        cutout: '60%',
        responsive: true,
        plugins: {
            tooltip: {
                enabled: true
            },
            legend: {
                display: true
            },
        },
    };

    const customPlugin = {
        id: 'textInsideSegments',
        afterDraw: (chart) => {
            const ctx = chart.ctx;
            chart.data.datasets.forEach((dataset, datasetIndex) => {
                const meta = chart.getDatasetMeta(datasetIndex);
                meta.data.forEach((element, index) => {
                    if (datasetIndex === 0 && dataset.data[index] !== null) {
                        ctx.font = '14px "Montserrat", "Helvetica Neue", Arial, sans-serif';
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'middle';
                        const position = element.tooltipPosition();
                        ctx.fillText(data[index] + '%', position.x, position.y);
                    }
                });
            });

            const centerX = (chart.chartArea.left + chart.chartArea.right) / 2;
            const centerY = (chart.chartArea.top + chart.chartArea.bottom) / 2;
            ctx.font = '24px "Montserrat", "Helvetica Neue", Arial, sans-serif';
            ctx.fillText(centerText, centerX, centerY);
        },
    };

    new Chart(ctx, {
        type: 'doughnut',
        data: chartData,
        options: options,
        plugins: [customPlugin],
    });
};

const createMultiDoughnutChart = (ctxId, lnc, centerText) => {
    const ctx = document.getElementById(ctxId).getContext('2d');

    const ppTotal = Object.values(lnc.pp).reduce((sum, value) => sum + Number(value), 0);
    const meTotal = Object.values(lnc.me).reduce((sum, value) => sum + Number(value), 0);


    const outerLabels = ['CD', ...Object.keys(lnc.pp), 'NSD', ...Object.keys(lnc.me)];
    const innerLabels = ['Capacity Development', 'Program Planning', 'Delivery of nutrition and related services',
        'Monitoring and Evaluation'
    ];

    const data = {
        datasets: [{
            data: [lnc.cd, ...Object.values(lnc.pp), lnc.nsd, ...Object.values(lnc.me), null, null,
                null, null
            ],
            backgroundColor: [
                '#FFAE34', ...Array(7).fill('#6388B4'), '#C3BC3F',
                ...Array(3).fill('#55AD89'), '#FFAE34', '#6388B4', '#C3BC3F', '#55AD89'
            ],
            borderColor: '#FFFFFF',
            borderWidth: 2,
        }, {
            data: [null, null, null, null, null, null, null, null, null, null, null, null, lnc.cd,
                ppTotal, lnc.nsd, meTotal
            ],

            backgroundColor: ['#FFAE34', '#6388B4', '#C3BC3F', '#55AD89'],
            borderWidth: 0,
        }],
        labels: [...outerLabels, ...innerLabels],
    };

    const options = {
        cutout: '40%',
        responsive: true,
        plugins: {
            tooltip: {
                enabled: true
            },
            legend: {
                onClick: null,
                display: true,
                labels: {
                    filter: (legendItem) => innerLabels.includes(legendItem.text),
                },
            },
        },
    };

    const customPlugin = {
        id: 'textInsideSegments',
        afterDraw: (chart) => {
            const ctx = chart.ctx;
            chart.data.datasets.forEach((dataset, datasetIndex) => {
                const meta = chart.getDatasetMeta(datasetIndex);
                meta.data.forEach((element, index) => {
                    if (datasetIndex === 0 && dataset.data[index] !== null) {
                        ctx.font =
                            'bold 14px "Montserrat", "Helvetica Neue", Arial, sans-serif';
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'middle';
                        const position = element.tooltipPosition();
                        ctx.fillText(outerLabels[index], position.x, position.y);
                    }
                });
            });

            const centerX = (chart.chartArea.left + chart.chartArea.right) / 2;
            const centerY = (chart.chartArea.top + chart.chartArea.bottom) / 2;
            ctx.font = 'bold 24px "Montserrat", "Helvetica Neue", Arial, sans-serif';
            ctx.fillText(centerText, centerX, centerY);
        },
    };

    new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options,
        plugins: [customPlugin],
    });
};

const createBarChart = (ctxId, labels, datasets, options) => {
    const ctx = document.getElementById(ctxId).getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: datasets
        },
        options: options,
    });
};

const lnc_province = {
    cd: '{{ $lncTotals["totalProvinceCDCount"] }}',
    pp: {
        PP1A: '{{ $lncTotals["totalProvincePP1ACount"] }}',
        PP1B: '{{ $lncTotals["totalProvincePP1BCount"] }}',
        PP2A: '{{ $lncTotals["totalProvincePP2ACount"] }}',
        PP2B: '{{ $lncTotals["totalProvincePP2BCount"] }}',
        PP3A: '{{ $lncTotals["totalProvincePP3ACount"] }}',
        PP3B: '{{ $lncTotals["totalProvincePP3BCount"] }}',
        PP4A: '{{ $lncTotals["totalProvincePP4ACount"] }}'
    },
    nsd: '{{ $lncTotals["totalProvinceNSDCount"] }}',
    me: {
        ME1: '{{ $lncTotals["totalProvinceME1Count"] }}',
        ME2: '{{ $lncTotals["totalProvinceME2Count"] }}',
        ME3: '{{ $lncTotals["totalProvinceME3Count"] }}'
    },
};
const lnc_huc_icc = {
    cd: '{{ $lncTotals["totalHUC&ICCCDCount"] }}',
    pp: {
        PP1A: '{{ $lncTotals["totalHUC&ICCPP1ACount"] }}',
        PP1B: '{{ $lncTotals["totalHUC&ICCPP1BCount"] }}',
        PP2A: '{{ $lncTotals["totalHUC&ICCPP2ACount"] }}',
        PP2B: '{{ $lncTotals["totalHUC&ICCPP2BCount"] }}',
        PP3A: '{{ $lncTotals["totalHUC&ICCPP3ACount"] }}',
        PP3B: '{{ $lncTotals["totalHUC&ICCPP3BCount"] }}',
        PP4A: '{{ $lncTotals["totalHUC&ICCPP4ACount"] }}'
    },
    nsd: '{{ $lncTotals["totalHUC&ICCNSDCount"] }}',
    me: {
        ME1: '{{ $lncTotals["totalHUC&ICCME1Count"] }}',
        ME2: '{{ $lncTotals["totalHUC&ICCME2Count"] }}',
        ME3: '{{ $lncTotals["totalHUC&ICCME3Count"] }}'
    },
};
const lnc_city = {
    cd: '{{ $lncTotals["totalCCCDCount"] }}',
    pp: {
        PP1A: '{{ $lncTotals["totalCCPP1ACount"] }}',
        PP1B: '{{ $lncTotals["totalCCPP1BCount"] }}',
        PP2A: '{{ $lncTotals["totalCCPP2ACount"] }}',
        PP2B: '{{ $lncTotals["totalCCPP2BCount"] }}',
        PP3A: '{{ $lncTotals["totalCCPP3ACount"] }}',
        PP3B: '{{ $lncTotals["totalCCPP3BCount"] }}',
        PP4A: '{{ $lncTotals["totalCCPP4ACount"] }}'
    },
    nsd: '{{ $lncTotals["totalCCNSDCount"] }}',
    me: {
        ME1: '{{ $lncTotals["totalCCME1Count"] }}',
        ME2: '{{ $lncTotals["totalCCME2Count"] }}',
        ME3: '{{ $lncTotals["totalCCME3Count"] }}'
    },
};

const lnc_mun = {
    cd: '{{ $lncTotals["totalMunicipalityCDCount"] }}',
    pp: {
        PP1A: '{{ $lncTotals["totalMunicipalityPP1ACount"] }}',
        PP1B: '{{ $lncTotals["totalMunicipalityPP1BCount"] }}',
        PP2A: '{{ $lncTotals["totalMunicipalityPP2ACount"] }}',
        PP2B: '{{ $lncTotals["totalMunicipalityPP2BCount"] }}',
        PP3A: '{{ $lncTotals["totalMunicipalityPP3ACount"] }}',
        PP3B: '{{ $lncTotals["totalMunicipalityPP3BCount"] }}',
        PP4A: '{{ $lncTotals["totalMunicipalityPP4ACount"] }}'
    },
    nsd: '{{ $lncTotals["totalMunicipalityNSDCount"] }}',
    me: {
        ME1: '{{ $lncTotals["totalMunicipalityME1Count"] }}',
        ME2: '{{ $lncTotals["totalMunicipalityME2Count"] }}',
        ME3: '{{ $lncTotals["totalMunicipalityME3Count"] }}'
    },
};

createMultiDoughnutChart('lnc-indicator-province-chart', lnc_province, "Provinces");
createMultiDoughnutChart('lnc-indicator-huc&icc-chart', lnc_huc_icc, "HUCs and ICCs");
createMultiDoughnutChart('lnc-indicator-city-chart', lnc_city, "Cities");
createMultiDoughnutChart('lnc-indicator-mun-chart', lnc_city, "Municipalities");
createDoughnutChart('lnc-submission-chart', [70, 30], ['With Submission', 'No Submission'], 'Submissions');
createBarChart('lnc-functionality-chart',
    ['Non-Functional', 'Partially Functional', 'Substantially Functional', 'Fully Functional'],
    [{
        data: [
            '{{ $lncTotals["grandTotalNonFunctional"] }}',
            '{{ $lncTotals["grandTotalPartiallyFunctional"] }}',
            '{{ $lncTotals["grandTotalSubstantiallyFunctional"] }}',
            '{{ $lncTotals["grandTotalFullyFunctional"] }}'
        ],
        backgroundColor: 'rgba(128, 0, 64, 0.7)',
        borderColor: 'rgba(128, 0, 64, 1)',
        borderWidth: 2,
    }], {
        indexAxis: 'y',
        scales: {
            x: {
                beginAtZero: true
            }
        },
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                enabled: true
            }
        },
    }
);

createBarChart('lnc-functionality-geographic-chart',
    ['Prov', 'HUC', 'ICC', 'City', 'Mun'],
    [{
            label: 'Fully Functional',
            data: ['{{ $lncTotals["totalProvinceFullyFunctional"] }}',
                '{{ $lncTotals["totalHUCFullyFunctional"] }}',
                '{{ $lncTotals["totalICCFullyFunctional"] }}',
                '{{ $lncTotals["totalCCFullyFunctional"] }}',
                '{{ $lncTotals["totalMunicipalityFullyFunctional"] }}'
            ],
            backgroundColor: '#FFC107'
        },
        {
            label: 'Substantially Functional',
            data: ['{{ $lncTotals["totalProvinceSubstantiallyFunctional"] }}',
                '{{ $lncTotals["totalHUCSubstantiallyFunctional"] }}',
                '{{ $lncTotals["totalICCSubstantiallyFunctional"] }}',
                '{{ $lncTotals["totalCCSubstantiallyFunctional"] }}',
                '{{ $lncTotals["totalMunicipalitySubstantiallyFunctional"] }}'
            ],
            backgroundColor: '#FF9800'
        },
        {
            label: 'Partially Functional',
            data: ['{{ $lncTotals["totalProvincePartiallyFunctional"] }}',
                '{{ $lncTotals["totalHUCPartiallyFunctional"] }}',
                '{{ $lncTotals["totalICCPartiallyFunctional"] }}',
                '{{ $lncTotals["totalCCPartiallyFunctional"] }}',
                '{{ $lncTotals["totalMunicipalityPartiallyFunctional"] }}'
            ],
            backgroundColor: '#03A9F4'
        },
        {
            label: 'Non-Functional',
            data: ['{{ $lncTotals["totalProvinceNonFunctional"] }}',
                '{{ $lncTotals["totalHUCNonFunctional"] }}',
                '{{ $lncTotals["totalICCNonFunctional"] }}',
                '{{ $lncTotals["totalCCNonFunctional"] }}',
                '{{ $lncTotals["totalMunicipalityNonFunctional"] }}'
            ],
            backgroundColor: '#607D8B'
        },
    ], {
        scales: {
            x: {
                stacked: false
            },
            y: {
                beginAtZero: true
            },
        },
        plugins: {
            legend: {
                display: true
            },
            tooltip: {
                enabled: true
            },
        },
    }
);
</script>

<script>
$(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    demo.checkFullPageBackgroundImage();
    demo.initDashboardPageCharts();
});
</script>
@endpush