/**
 * Generate radar charts
 * @param {object} datas
 */

function generateRadarCharts(datas) {
    let datasLabel = [];
    let datasValue = [];
    Object.keys(datas).map((key) => {
        datasLabel.push(key);
    });
    Object.values(datas).map((value) => {
        datasValue.push(value);
    });

    let chartContainer = document.createElement("div");
    chartContainer.setAttribute("class", "col-md-6 chart_container");

    let canvas = document.createElement("canvas");
    canvas.id = "radarChart";

    document
        .getElementById("chartsElements")
        .appendChild(chartContainer)
        .appendChild(canvas);

    let ctx = document.getElementById("radarChart").getContext("2d");
    new Chart(ctx, {
        type: "radar",
        data: {
            labels: datasLabel,
            datasets: [
                {
                    label: "Résultats qualité",
                    fill: true,
                    backgroundColor: "rgba(255,99,132,0.2)",
                    borderColor: "rgba(255,99,132,1)",
                    borderWidth: 1,
                    pointBorderColor: "#fff",
                    pointBackgroundColor: "rgba(255,99,132,1)",
                    pointBorderColor: "#fff",
                    data: datasValue
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            scale: {
                ticks: {
                    beginAtZero: true,
                    max: 5,
                    stepSize: 1,
                    backdropColor: "#37404a",
                    fontColor: "white"
                },
                pointLabels: {
                    fontColor: "#FFF"
                }
            },
            legend: {
                labels: {
                    fontColor: "white",
                    fontSize: 18
                }
            }
        }
    });
}
