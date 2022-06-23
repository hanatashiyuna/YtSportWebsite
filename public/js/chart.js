var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
        labels: ['Facebook', 'Instagram', 'Twitter', 'Youtube', 'Amazon'],
        datasets: [{
            label: 'Traffic Source',
            data: [1200, 1900, 2222, 3000, 2000],
            backgroundColor: [
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255, 0.6)'
            ],

        }]
    },
    options: {
        responsive: true,
    }
});

var earning = document.getElementById('earning').getContext('2d');
var myChart = new Chart(earning, {
    type: 'bar',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
            label: 'Viewer',
            data: [1406, 2507, 3000, 5000, 2000, 3000, 2222, 1200, 1900, 3000, 2000, 9000],
            backgroundColor: [
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255,0.6)',
                'rgba(255, 159, 64, 0.6)',
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255,0.6)',
                'rgba(255, 159, 64, 0.6)'
            ]
        }]
    },
    options: {
        responsive: true,
    }
});

function toggleMenu() {
    let toggle = document.querySelector('.toggle');
    let nav = document.querySelector('.nav');
    let main = document.querySelector('.main');
    toggle.classList.toggle('active');
    nav.classList.toggle('active');
    main.classList.toggle('active');

}

function toggleUserAppear() {
    let user = document.querySelector('.userCpg');
    let admin = document.querySelector('.adminCpg');
    admin.classList.remove('appear');
    user.classList.toggle('appear');
}

function toggleAdminAppear() {
    let user = document.querySelector('.userCpg');
    let admin = document.querySelector('.adminCpg');
    admin.classList.toggle('appear');
    user.classList.remove('appear');
}
