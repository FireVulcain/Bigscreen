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

    let div = document.createElement("div");
    div.setAttribute("class", "col-md-6");
    let canvas = document.createElement("canvas");
    canvas.id = "radarChart";

    document
        .getElementById("chartsElements")
        .appendChild(div)
        .appendChild(canvas);

    let ctx = document.getElementById("radarChart").getContext("2d");
    let radarChart = new Chart(ctx, {
        type: "radar",
        data: {
            labels: datasLabel,
            datasets: [
                {
                    label: "Résultats qualité ",
                    backgroundColor: "rgba(129,181,198,0.2)",
                    borderColor: "rgba(129,181,198,1)",
                    pointBackgroundColor: "rgba(129,181,198,1)",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(129,181,198,1)",
                    data: datasValue
                }
            ]
        },
        options: {
            maintainAspectRatio: true,
            scale: {
                ticks: {
                    beginAtZero: true,
                    max: 5,
                    stepSize: 1
                }
            }
        }
    });
}