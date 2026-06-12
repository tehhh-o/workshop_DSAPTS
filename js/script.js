const charts = {};

function makeGraph({
    id,
    type,
    title,
    xLabel,
    yLabel,
    xValues,
    yValues,
    label
}) {
    const ctx = document.getElementById(id);

    if (charts[id]) {
        charts[id].destroy();
    }

    charts[id] = new Chart(ctx, {
        type: type,
        data: {
            labels: xValues,
            datasets: [{
                label: label,
                data: xValues.map((x, i) => ({
                    x: x,
                    y: yValues[i]
                }))
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: title
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: xLabel
                    }
                },
                y: {
                    type: 'linear',
                    min: 0,
                    max: 4,
                    ticks: {
                        stepSize: 0.5
                    },
                    title: {
                        display: true,
                        text: yLabel
                    }
                }
            }
        }
    });
}