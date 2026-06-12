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
                data: yValues,
                borderWidth: 2,
                tension: 0.3,
                fill: false
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
                    title: {
                        display: true,
                        text: yLabel
                    }
                }
            }
        }
    });
}