var onlineUserButton = document.getElementById('onlineUserButton');
var dashContainer3 = document.getElementById('dashContainer3');
let container_onlineUsers = document.getElementById('container_onlineUsers');
let librarianDashboard = document.getElementById('librarianDashboard');
//set the data to the chart
const data ={
    datasets: [{
    label: 'Books',
    data: marks,
    borderWidth: 1,
    backgroundColor:['#FE0808','#FE00D0','#9999CC','#F9F871']
  }]
};

//set configuration
const con ={
    type: 'doughnut',
    data,
    options: {
        legend: {
        position: 'left',
        },
    }
};

//render the chart
const chartView =new Chart(
    document.getElementById('chartView'),
    con
);
document.querySelector('.label1').innerText= labels[0];
document.querySelector('.label2').innerText= labels[1];
document.querySelector('.label3').innerText= labels[2];
document.querySelector('.label4').innerText= labels[3];

document.getElementById('color1').style.backgroundColor = chartView.data.datasets[0].backgroundColor[0];
document.getElementById('color2').style.backgroundColor = chartView.data.datasets[0].backgroundColor[1];
document.getElementById('color3').style.backgroundColor = chartView.data.datasets[0].backgroundColor[2];
document.getElementById('color4').style.backgroundColor = chartView.data.datasets[0].backgroundColor[3];
// setup line chart
//set data 
const label = categories;
    const data1 = {
    labels: label,
    datasets: [{
        label: 'Total Book',
        data: totalBook,
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
    },
    
    {
        label: 'Borrowed Book',
        data: issueBook,
        fill: false,
        borderColor: '#00B46E',
        tension: 0.1
    },
    {
        label: 'Temporary Withdrawal Book',
        data: twBook,
        fill: false,
        borderColor: '#9780FF',
        tension: 0.1
    }
    
],
    
    };

    const config = {
    type: 'line',
    data: data1,
    options:{
        plugins:{
            legend:{
                display:false
            },
            scales: {
                xAxes: [{
                  display: false
                }],
                yAxes: [{
                  display: false
                }]
              }
        }
    }
}

//render the chart
const lineChartView =new Chart(
    document.getElementById('chartLineView'),
    config
);

// document.querySelector('.label4').innerText= 'Total Books';
// document.querySelector('.label5').innerText= 'Borrowed Books';
// document.querySelector('.label6').innerText= 'TW Books';

onlineUserButton.addEventListener('click',function click1(){
    if(container_onlineUsers.className === 'container_onlineUsers'){
        container_onlineUsers.classList.remove( 'container_onlineUsers');
        container_onlineUsers.classList.add( 'container_onlineUsers_view');
        console.log('awa');
        // librarianDashboard.classList.add('baground_filter');
    }
    else{
        container_onlineUsers.classList.remove('container_onlineUsers_view'); 
        container_onlineUsers.classList.add('container_onlineUsers'); 
        // librarianDashboard.classList.remove('baground_filter');
    }
    
    
})


