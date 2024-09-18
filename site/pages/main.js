let xValues = [];
let yValues = [];
let barColor = "blue";
let attendance = document.getElementById('Attendance');
for (let i = attendance.rows.length-1; i > 0;i--){
    xValues.push(attendance.rows[i].cells[0].innerHTML);
    yValues.push(attendance.rows[i].cells[1].innerHTML);
}
Chart.defaults.global.defaultFontColor = '#000000';
new Chart("secondChart", {
    type: "bar",
    data: {
        labels: xValues,
        datasets: [{
            backgroundColor: barColor,
            data: yValues
        }]
    },
    options: {
        legend: {display: false},
        title: {
            display: true,
            text: "Overall Attendance",
        },
        scales: {
            yAxes: [{ticks: {min: 50, max:80}}],
        }
    }
});

xValues = [];
yValues = [];
let barColors =["red", "green","blue","orange","brown", "black", "pink", "purple","white", "grey"];
let populations = document.getElementById('Populations');
for (let i = populations.rows.length-1; i > 0;i--){
    xValues.push(populations.rows[i].cells[0].getElementsByTagName("a")[0].innerHTML);
    yValues.push(populations.rows[i].cells[1].innerHTML);
}

new Chart("firstChart", {
    type: "pie",
    color: "black",
    data: {
        labels: xValues,
        datasets: [{
            backgroundColor: barColors,
            data: yValues
        }]
    },
    options: {
        title: {
            display: true,
            text: "Populations"
        }
    }
});