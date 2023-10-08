// setup line chart
//set data '

const label = labels;

const data1 = {
  labels: label,
  datasets: [
    {
      label: "Patrons",
      data: patrons,
      fill: false,
      borderColor: "#2c9eea",
      tension: 0.1,
    },

    // {
    //     label: 'Books',
    //     data: books,
    //     fill: false,
    //     borderColor: '#FE00D0',
    //     tension: 0.1
    // }
  ],
};

const config = {
  type: "line",
  data: data1,
};

//render the chart
const lineChartView = new Chart(
  document.getElementById("chartLineView"),
  config
);

// document.querySelector('.label4').innerText= 'Total Books';
// document.querySelector('.label5').innerText= 'Borrowed Books';
// document.querySelector('.label6').innerText= 'TW Books';
