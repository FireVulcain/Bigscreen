/**
 * Generate pie charts
 * @param {array} datas
 */
function generatePieCharts(datas) {
    let colors = [
        "#3E95CD",
        "#8E5EA2",
        "#3CBA9F",
        "#E8C3B9",
        "#C45850",
        "#DBB4DA",
        "#BED905",
        "#93A806",
        "#720017",
        "#03353E"
    ];

    for (let i = 0; i < datas.length; i++) {
        let datasLabel = [];
        let datasValue = [];
        Object.keys(datas[i]).map((key) => {
            datasLabel.push(key);
        });
        Object.values(datas[i]).map((value) => {
            datasValue.push(value);
        });

        let chartContainer = document.createElement("div");
        chartContainer.setAttribute("class", "col-md-6 chart_container");

        let canvas = document.createElement("canvas");
        canvas.id = "data_" + i;

        document
            .getElementById("chartsElements")
            .appendChild(chartContainer)
            .appendChild(canvas);

        let ctx = document.getElementById("data_" + i).getContext("2d");
        new Chart(ctx, {
            type: "pie",
            data: {
                datasets: [
                    {
                        data: datasValue,
                        backgroundColor: colors
                    }
                ],
                labels: datasLabel
            },
            options: {
                responsive: true,
                elements: {
                    arc: {
                        borderWidth: 1,
                        borderColor: "#454d55"
                    }
                },
                legend: {
                    labels: {
                        fontColor: "white",
                        fontSize: 14
                    }
                }
            }
        });
    }
}
