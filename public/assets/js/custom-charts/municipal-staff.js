const lncBarChart = {
    chart: null,

    init() {
        const ctx = document
            .getElementById("lnc-functionality-chart")
            .getContext("2d");
        this.chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: [
                    "Non-Functional",
                    "Partially Functional",
                    "Substantially Functional",
                    "Fully Functional",
                ],
                datasets: [
                    {
                        data: [0, 0, 0, 0],
                        backgroundColor: [
                            "#607D8B",
                            "#03A9F4",
                            "#FF9800",
                            "#FFC107",
                        ],
                        borderWidth: 2,
                    },
                ],
            },
            options: {
                indexAxis: "y",
                scales: {
                    x: {
                        beginAtZero: true,
                    },
                },
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        enabled: true,
                    },
                },
            },
        });
    },

    updateChartData(newData) {
        if (this.chart) {
            this.chart.data.datasets[0].data = newData;
            this.chart.update();
        }
    },
};

const lncPerGeographicBarChart = {
    chart: null,
    init() {
        const ctx = document
            .getElementById("lnc-functionality-geographic-chart")
            .getContext("2d");
        this.chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Prov", "HUC", "ICC", "City", "Mun"],
                datasets: [
                    {
                        label: "Fully Functional",
                        data: [0, 0, 0, 0, 0],
                        backgroundColor: "#FFC107",
                    },
                    {
                        label: "Substantially Functional",
                        data: [0, 0, 0, 0, 0],
                        backgroundColor: "#FF9800",
                    },
                    {
                        label: "Partially Functional",
                        data: [0, 0, 0, 0, 0],
                        backgroundColor: "#03A9F4",
                    },
                    {
                        label: "Non-Functional",
                        data: [0, 0, 0, 0, 0],
                        backgroundColor: "#607D8B",
                    },
                ],
            },
            options: {
                scales: {
                    x: {
                        stacked: false,
                    },
                    y: {
                        beginAtZero: true,
                    },
                },
                plugins: {
                    legend: {
                        display: true,
                    },
                    tooltip: {
                        enabled: true,
                    },
                },
            },
        });
    },

    updateChartData(newData) {
        if (this.chart) {
            this.chart.data.datasets.forEach((dataset, index) => {
                dataset.data = newData[index];
            });
            this.chart.update();
        }
    },
};

lncBarChart.init();
lncPerGeographicBarChart.init();

$.ajax({
    url: "/CMSDashboard/lnc/chart",
    type: "GET",
    dataType: "json",
    success: function (response) {
        console.log(response);
        if (!response) return;

        const data = [
            response.grandTotalNonFunctional,
            response.grandTotalPartiallyFunctional,
            response.grandTotalSubstantiallyFunctional,
            response.grandTotalFullyFunctional,
        ];

        const newData = [
            [
                response.totalProvinceFullyFunctional,
                response.totalHUCFullyFunctional,
                response.totalICCFullyFunctional,
                response.totalCCFullyFunctional,
                response.totalMunicipalityFullyFunctional,
            ],
            [
                response.totalProvinceSubstantiallyFunctional,
                response.totalHUCSubstantiallyFunctional,
                response.totalICCSubstantiallyFunctional,
                response.totalCCSubstantiallyFunctional,
                response.totalMunicipalitySubstantiallyFunctional,
            ],
            [
                response.totalProvincePartiallyFunctional,
                response.totalHUCPartiallyFunctional,
                response.totalICCPartiallyFunctional,
                response.totalCCPartiallyFunctional,
                response.totalMunicipalityPartiallyFunctional,
            ],
            [
                response.totalProvinceNonFunctional,
                response.totalHUCNonFunctional,
                response.totalICCNonFunctional,
                response.totalCCNonFunctional,
                response.totalMunicipalityNonFunctional,
            ],
        ];

        lncBarChart.updateChartData(data);
        lncPerGeographicBarChart.updateChartData(newData);
    },
    error: function (xhr, status, error) {
        console.error("Error fetching data:", error);
    },
});
